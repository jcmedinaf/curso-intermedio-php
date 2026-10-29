<?php
/**
 * Módulo 4: Programación Asíncrona y AJAX con PHP
 * Lección: Estructuración y Salida de Endpoints en formato JSON
 */

// Indicar explícitamente que la respuesta será un JSON con codificación UTF-8
header('Content-Type: application/json; charset=utf-8');

// Simulamos la obtención de datos (por ejemplo, desde una consulta a base de datos)
$catalogoProductos = [
    ["id" => 1, "nombre" => "Agua Mineral 500ml", "precio" => 1.50, "stock" => 45],
    ["id" => 2, "nombre" => "Bidón de Agua 19L", "precio" => 4.00, "stock" => 12],
    ["id" => 3, "nombre" => "Filtro de Cerámica", "precio" => 15.50, "stock" => 8]
];

// Estructurar la respuesta del servidor
$respuesta = [
    "estado" => "success",
    "codigo" => 200,
    "mensaje" => "Catálogo obtenido exitosamente",
    "total" => count($catalogoProductos),
    "datos" => $catalogoProductos
];

// Convertir el arreglo asociativo a una cadena JSON limpia y retornarla
echo json_encode($respuesta, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
exit;
?>