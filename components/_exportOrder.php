<?php
include "../components/_config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Comprueba si se han pasado los parámetros
    $tableName = $_POST['tableName'] ?? '';
    $format = $_POST['format'] ?? '';

    if (empty($tableName) || empty($format)) {
        die("No se especificó ningún nombre de tabla ni formato de archivo. `$tableName` `$format`");
    }

    // Comprobación de la existencia de una tabla
    $stmt = $conn->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?");
    $databaseName = 'tiendazaya'; // Nombre de la basa de datos
    $stmt->bind_param("ss", $databaseName, $tableName);
    $stmt->execute();
    $stmt->bind_result($tableExists);
    $stmt->fetch();
    $stmt->close();

    if ($tableExists == 0) {
        die("La tabla especificada no existe en la base de datos.");
    }

    // Ejecutamos una consulta a la tabla
    $query = "SELECT * FROM `$tableName`";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        die("La tabla está vacía o no hay datos disponibles.");
    }

    // Generar un archivo dependiendo del formato
    switch ($format) {
        case 'csv':
            // Encabezados para descargar archivos CSV
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $tableName . '_data.csv"');
            
            $output = fopen('php://output', 'w');
            
            // Escribimos los títulos
            $columns = $result->fetch_fields();
            $headers = [];
            foreach ($columns as $column) {
                $headers[] = $column->name;
            }
            fputcsv($output, $headers);
            
            // Escribimos líneas
            while ($row = $result->fetch_assoc()) {
                fputcsv($output, $row);
            }

            fclose($output);
            break;

        case 'json':
            // Titulos JSON
            header('Content-Type: application/json; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $tableName . '_data.json"');
            
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        default:
            die("Formato no compatible.");
    }

    $conn->close();
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => "El metodo de solicitud no es correcto."]);
}
?>
