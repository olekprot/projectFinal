<?php
include "../components/_config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'] ?? '';

    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM order1 WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Элемент успешно удалён!";
        } else {
            echo "Ошибка при удалении элемента: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID элемента не указан.";
    }

    $conn->close();
} else {
    echo "Некорректный метод запроса.";
}
?>
