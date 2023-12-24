<?php
// index.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// Verificar si es una solicitud GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener parámetros de la URL
    http_response_code(200);
    echo json_encode(array('data' => 'Paso validacion GET'));
} else {
    // Si la solicitud no es GET, devolver un error
    http_response_code(405);
    echo json_encode(array('error' => 'Método no permitido'));
}
