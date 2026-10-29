<?php
/**
 * Módulo 3: Base de Datos Avanzada con MySQLi
 * Lección: Manejo de Transacciones (Commit y Rollback) para garantizar integridad
 */

echo "<h2>Simulación de Venta con Transacción Segura</h2>";

// Datos de conexión
$host = "localhost";
$user = "root";
$pass = "";
$db   = "curso_php_intermedio";

// Establecer conexión con mysqli procedural
$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8");

// Datos simulados de la venta
$idProducto = 3;
$cantidadVendida = 2;
$idUsuario = 1;
$totalVenta = 31.00;
$idVentaGenerado=0;

// 1. DESACTIVAR EL AUTO-COMMIT
// A partir de aquí, los cambios quedan en espera temporal en la sesión
mysqli_autocommit($conexion, false);

$transaccionExitosa = true;
$mensajeError = "";

// --- PASO A: Insertar la venta en la tabla 'ventas' ---
$sqlVenta = "INSERT INTO ventas (id_usuario, total, fecha) VALUES (?, ?, NOW())";
$stmtVenta = mysqli_prepare($conexion, $sqlVenta);

if ($stmtVenta) {
    mysqli_stmt_bind_param($stmtVenta, "id", $idUsuario, $totalVenta);
    
    if (!mysqli_stmt_execute($stmtVenta)) {
        $transaccionExitosa = false;
        $mensajeError = "Error al registrar la cabecera de la venta: " . mysqli_stmt_error($stmtVenta);
    }
    
    // Obtenemos el ID generado para la venta actual (si fuera necesario para el detalle)
    $idVentaGenerado = mysqli_insert_id($conexion);
    mysqli_stmt_close($stmtVenta);
} else {
    $transaccionExitosa = false;
    $mensajeError = "Error al preparar la consulta de venta.";
}

// --- PASO B: Actualizar el inventario (descontar stock) ---
// Simulamos validar que hay stock suficiente antes de restar
$sqlStock = "UPDATE productos SET stock = stock - ? WHERE id = ? AND stock >= ?";
$stmtStock = mysqli_prepare($conexion, $sqlStock);

if ($stmtStock) {
    mysqli_stmt_bind_param($stmtStock, "iii", $cantidadVendida, $idProducto, $cantidadVendida);
    
    if (!mysqli_stmt_execute($stmtStock)) {
        $transaccionExitosa = false;
        $mensajeError = "Error al actualizar el inventario: " . mysqli_stmt_error($stmtStock);
    }
    
    // Verificamos si realmente se afectó alguna fila (por ejemplo, si no había stock suficiente)
    if (mysqli_stmt_affected_rows($stmtStock) <= 0) {
        $transaccionExitosa = false;
        $mensajeError = "Stock insuficiente o producto no encontrado.";
    }
    
    mysqli_stmt_close($stmtStock);
} else {
    $transaccionExitosa = false;
    $mensajeError = "Error al preparar la consulta de inventario.";
}

// --- PASO C: Decidir si aplicamos (COMMIT) o revertimos (ROLLBACK) ---
if ($transaccionExitosa) {
    // Si todo salió bien, guardamos los cambios definitivamente
    mysqli_commit($conexion);
    echo "<p style='color: green; font-weight: bold;'>¡Transacción exitosa! Venta registrada y stock actualizado correctamente. (ID de venta: $idVentaGenerado)</p>";
} else {
    // Si algo falló en el paso A o B, revertimos todo al estado original
    mysqli_rollback($conexion);
    echo "<p style='color: red; font-weight: bold;'>Transacción cancelada (ROLLBACK aplicado). Motivo: " . htmlspecialchars($mensajeError) . "</p>";
}

// Reactivar el auto-commit por buenas prácticas
mysqli_autocommit($conexion, true);

// Cerrar conexión
mysqli_close($conexion);
?>