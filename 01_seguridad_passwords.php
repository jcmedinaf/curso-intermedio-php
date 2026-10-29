<?php
/**
 * Módulo 1: Seguridad y Autenticación
 * Lección: Hash y Verificación segura de contraseñas con password_hash()
 */

echo "<h2>Seguridad en el Manejo de Contraseñas</h2>";

// Contraseña introducida por el usuario en un formulario de registro
$passwordPlano = "MiClaveSuperSecreta2026*";

// 1. Generar el hash seguro utilizando BCRYPT por defecto (o Argon2)
$passwordHash = password_hash($passwordPlano, PASSWORD_DEFAULT);

echo "Contraseña en texto plano: " . htmlspecialchars($passwordPlano) . "<br>";
echo "Hash generado para la base de datos: <code>" . $passwordHash . "</code><br><br>";

// 2. Simulación de inicio de sesión (Verificación)
$intentoLogin = "MiClaveSuperSecreta2026*"; // Prueba cambiando esto por una clave incorrecta

if (password_verify($intentoLogin, $passwordHash)) {
    echo "<strong style='color: green;'>¡Acceso concedido! La contraseña coincide con el registro.</strong>";
} else {
    echo "<strong style='color: red;'>Acceso denegado: Credenciales inválidas.</strong>";
}
?>