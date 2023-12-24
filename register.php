<?php
// index.php

// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "6013078080";
$database = "veterinaria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Configurar CORS y encabezados JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// Verificar si es una solicitud GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM servicio";
    $result = $conn->query($query);
    if ($result) {
        // Obtener los resultados
        $data = array();
        while ($row = $result->fetch_assoc()) {
            // Agregar cada fila de resultados al array de datos
            $data[] = $row;
        }

        // Liberar el conjunto de resultados
        $result->free();

        // Enviar solo los datos como JSON
        http_response_code(200);
        echo json_encode(array('data' => $data));
    } else {
        http_response_code(405);
        echo json_encode(array('error' => 'Error en la consulta'));
    }
} else {
    // Si la solicitud no es GET, devolver un error
    http_response_code(405);
    echo json_encode(array('error' => 'Método no permitido'));
}
// Cerrar conexión al finalizar operaciones en la base de datos
$conn->close();
