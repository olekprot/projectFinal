<?php
include "../components/_config.php";

if (isset($_GET['id'], $_GET['tableName'])) {
    $id = $_GET['id'];
    $tableName = $_GET['tableName'];

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

    // Получение данных записи
    $selectQuery = "SELECT * FROM `$tableName` WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<form id="edit-form">
                <input type="hidden" name="id" value="' . htmlspecialchars($id) . '">
                <input type="hidden" name="tableName" value="' . htmlspecialchars($tableName) . '">
                <p>Название: <input type="text" name="nombre" value="' . htmlspecialchars($row['nombre']) . '"></p>
                <p>Цена: <input type="text" name="price" value="' . htmlspecialchars($row['price']) . '"></p>
                <p>Количество: <input type="text" name="quantity" value="' . htmlspecialchars($row['quantity']) . '"></p>
                <button type="submit">Сохранить</button>
            </form>';
    } else {
        echo "Запись не найдена.";
    }

    $stmt->close();
} else {
    echo "Некорректные параметры.";
}

$conn->close();
?>
