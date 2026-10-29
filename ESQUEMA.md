# Esquema Programático - Curso de PHP Intermedio

Este documento detalla la estructura modular, los objetivos específicos y los archivos asociados para el nivel intermedio del curso de PHP.

---

## 🔒 Módulo 1: Seguridad y Autenticación Web
* **Objetivo:** Implementar estándares modernos de seguridad para la protección de credenciales y datos de usuario.
* **Temas Clave:**
  * Descarte de métodos obsoletos (MD5, SHA1).
  * Uso de `password_hash()` con algoritmos seguros (`PASSWORD_DEFAULT`).
  * Validación de credenciales mediante `password_verify()`.
* **Archivo Asociado:** `01_seguridad_passwords.php`

---

## 🗄️ Módulo 2: Base de Datos Avanzada con MySQLi (Seguridad y Persistencia)
* **Objetivo:** Blindar las interacciones con la base de datos contra ataques de Inyección SQL y garantizar la consistencia en operaciones transaccionales complejas.
* **Temas Clave:**
  * Consultas preparadas (`Prepared Statements`): Preparar, Vincular (`bind_param`) y Ejecutar.
  * Gestión de estados de conexión y manejo de errores.
  * Transacciones de bases de datos: Desactivación de `autocommit`, aplicación de `mysqli_commit()` y reversión con `mysqli_rollback()`.
* **Archivos Asociados:** 
  * `02_consultas_preparadas.php`
  * `04_transacciones.php`

---

## ⚡ Módulo 3: Programación Asíncrona y Endpoints JSON
* **Objetivo:** Preparar a PHP para actuar como backend de servicios web ligeros orientados a arquitecturas dinámicas con JavaScript (AJAX).
* **Temas Clave:**
  * Modificación de cabeceras HTTP (`Content-Type: application/json`).
  * Estructuración de arreglos asociativos para respuesta de estado, códigos y datos.
  * Serialización de datos con `json_encode()` y manejo de opciones (`JSON_UNESCAPED_UNICODE`).
* **Archivo Asociado:** `03_endpoint_json.php`

---

## 📋 Metodología de Evaluación y Práctica
1. Cada módulo incluye un archivo ejecutable autocontenido con comentarios explicativos detallados.
2. Se fomenta el uso de entornos locales limpios bajo XAMPP y la validación de buenas prácticas de código limpio y estructurado.