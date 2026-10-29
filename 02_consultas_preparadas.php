<?php
/**
 * Módulo 3: Base de Datos Avanzada con MySQLi
 * Lección: Consultas Preparadas (Prepared Statements) para evitar Inyección SQL
 */

echo "<h2>Consultas Seguras con MySQLi (Prepared Statements)</h2>";

// Datos de conexión
$host = "localhost";
$user = "root";
$pass = "";
$db   = "curso_php_intermedio";

// Establecer conexión utilizando mysqli orientado a procedimientos
$conexion = mysqli_connect($host, $user, $pass, $db);

// Validar conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Configurar juego de caracteres UTF-8
mysqli_set_charset($conexion, "utf8");

// Simulamos un dato recibido por el usuario (ej. desde un buscador o formulario)
$rolBusqueda = "Administrador";

// 1. Preparar la sentencia SQL utilizando marcadores de posición (?)
$sql = "SELECT id, nombre, email, rol FROM usuarios WHERE rol = ?";

if ($stmt = mysqli_prepare($conexion, $sql)) {
    
    // 2. Vincular los parámetros ("s" indica que es de tipo string)
    mysqli_stmt_bind_param($stmt, "s", $rolBusqueda);
    
    // 3. Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // 4. Obtener los resultados
    $resultado = mysqli_stmt_get_result($stmt);
    
    echo "Resultados para el rol: <strong>" . htmlspecialchars($rolBusqueda) . "</strong><br><br>";
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "ID: " . $fila['id'] . " | Nombre: " . $fila['nombre'] . " | Email: " . $fila['email'] . "<br>";
    }
    
    // 5. Cerrar la sentencia
    mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión general
mysqli_close($conexion);
?>