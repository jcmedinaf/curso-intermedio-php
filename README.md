# Curso de PHP Intermedio

Repositorio oficial para el desarrollo del **Curso de PHP Intermedio**, diseñado bajo un enfoque de programación estructurada robusta, buenas prácticas de desarrollo, seguridad web y persistencia avanzada de datos con `mysqli`, sin depender de frameworks pesados.

## 🎯 Objetivos del Curso
* Consolidar el dominio de la seguridad en aplicaciones web (hashing de contraseñas, prevención de inyección SQL y control de sesiones).
* Implementar consultas preparadas (`Prepared Statements`) eficientes con MySQLi.
* Garantizar la integridad de los datos mediante el manejo de transacciones (`Commit` y `Rollback`).
* Conectar el backend de PHP con interfaces dinámicas mediante respuestas estructuradas en formato JSON (AJAX / Fetch API).

## 🛠️ Entorno de Requerimientos
* **Servidor Web / Entorno:** XAMPP o similar (Apache + MySQL / MariaDB).
* **Versión de PHP:** PHP 8.0 o superior recomendado.
* **Base de Datos:** MySQL / MariaDB.

## 📂 Estructura del Repositorio
Los archivos están numerados secuencialmente para guiar el orden lógico de estudio:
````
| Orden | Archivo | Descripción Principal |
| :---: | :--- | :--- |
| 01 | `01_seguridad_passwords.php` | Hashing seguro y verificación con `password_hash()` y `password_verify()`. |
| 02 | `02_consultas_preparadas.php` | Prevención de Inyección SQL utilizando `mysqli` con sentencias preparadas. |
| 03 | `03_endpoint_json.php` | Estructuración de respuestas del servidor en formato JSON para AJAX. |
| 04 | `04_transacciones.php` | Control de transacciones con `commit` y `rollback` para inventarios y ventas. |
| - | `README.md` | Documentación general e instrucciones del curso. |
| - | `ESQUEMA.md` | Contenido programático desglosado por módulos y objetivos. |
````
---
*Autor: Juan Carlos Medina*