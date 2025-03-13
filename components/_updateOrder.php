<?php
include "../components/_config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Проверяем, была ли форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из POST-запроса
    $id = $_POST['id']; // Убедитесь, что поле id передается
    $nombre = $_POST['nombre'];
    $code = $_POST['code'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    
    // Обновляем данные в базе данных
    $stmt = $conn->prepare("UPDATE order1 SET nombre = ?, code = ?, size = ?, price = ?, quantity = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssdiss", $nombre, $code, $size, $price, $quantity, $image, $id);

    if ($stmt->execute()) {
        echo "Данные успешно обновлены!";
    } else {
        echo "Ошибка обновления данных: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
} else {
    echo "Некорректный метод запроса.";
}
?>
