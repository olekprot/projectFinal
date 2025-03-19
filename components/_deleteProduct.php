<?php
include "../components/_config.php";



if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $tableName = $_GET['tableName'] ?? '';
    $id = $_GET['id'] ?? '';

    if (!empty($id) && !empty($tableName)) {
        // Comprobación de la corrección del nombre de la tabla
        $allowedTables = ['order1', 'orden2', 'order5']; // Lista de las tablas
        if (!in_array($tableName, $allowedTables)) {
            echo "Nombre de la tabla no es coorecta!";
            exit;
        }

        // Выполняем удаление
        $stmt = $conn->prepare("DELETE FROM `$tableName` WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Элемент успешно удалён из таблицы $tableName!";
        } else {
            echo "Ошибка при удалении элемента: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID de elemento o nombre de tabla no especificado.";
        echo "ID =: " . $id . ", nombre de la tabla =: " . $tableName;
    }

    $conn->close();
} else {
    echo "El metodo de solicitud no es correcto.";
}
?>
