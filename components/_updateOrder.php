<?php
include "../components/_config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['tableName'])) {
    $id = $_POST['id'];
    $tableName = $_POST['tableName'];
    $nombre = $_POST['nombre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Проверяем существование таблицы
    $query = "SHOW TABLES LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $tableName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Ошибка: Таблица '{$tableName}' не существует.";
        exit;
    }

    // Обновление данных
    $updateQuery = "UPDATE `$tableName` SET nombre = ?, price = ?, quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sdii", $nombre, $price, $quantity, $id);

    if ($stmt->execute()) {
        echo "Запись успешно обновлена.";
    } else {
        echo "Ошибка при обновлении записи: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Некорректный запрос.";
}

$conn->close();
?>
