<?php
include "../components/_config.php"; // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Проверяем, переданы ли параметры
    $tableName = $_POST['tableName'] ?? '';
    $format = $_POST['format'] ?? '';

    if (empty($tableName) || empty($format)) {
        die("Не указано имя таблицы или формат файла. `$tableName` `$format`");
    }

    // Проверяем существование таблицы
    $stmt = $conn->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?");
    $databaseName = 'tiendazaya'; // Nombre de la basa de datos
    $stmt->bind_param("ss", $databaseName, $tableName);
    $stmt->execute();
    $stmt->bind_result($tableExists);
    $stmt->fetch();
    $stmt->close();

    if ($tableExists == 0) {
        die("Указанная таблица не существует в базе данных.");
    }

    // Выполняем запрос к таблице
    $query = "SELECT * FROM `$tableName`";
    $result = $conn->query($query);

    if (!$result || $result->num_rows == 0) {
        die("Таблица пуста или данные недоступны.");
    }

    // Генерируем файл в зависимости от формата
    switch ($format) {
        case 'csv':
            // Заголовки для скачивания файла CSV
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $tableName . '_data.csv"');
            
            $output = fopen('php://output', 'w');
            
            // Записываем заголовки
            $columns = $result->fetch_fields();
            $headers = [];
            foreach ($columns as $column) {
                $headers[] = $column->name;
            }
            fputcsv($output, $headers);
            
            // Записываем строки
            while ($row = $result->fetch_assoc()) {
                fputcsv($output, $row);
            }

            fclose($output);
            break;

        case 'json':
            // Заголовки для JSON
            header('Content-Type: application/json; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $tableName . '_data.json"');
            
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            break;

        default:
            die("Неподдерживаемый формат.");
    }

    $conn->close();
    exit;
} else {
    echo json_encode(['status' => 'error', 'message' => "El metodo de solicitud no es correcto."]);
}
?>
