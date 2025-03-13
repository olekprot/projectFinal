<?php
include "../components/_config.php";

// Comprobando si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tableName = $_POST['tableName'] ?? '';
    
    // Comprobación de la corrección del nombre de la tabla
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
        die("Nombre de tabla no válido!");
    }
    //Obtención de datos de una solicitud POST
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $code = $_POST['code'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    
    // Actualización de datos
    $stmt = $conn->prepare("UPDATE `$tableName` SET nombre = ?, code = ?, size = ?, price = ?, quantity = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssdiss", $nombre, $code, $size, $price, $quantity, $image, $id);

    if ($stmt->execute()) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Un error ocurrió al actualizar los datos: " . $stmt->error;
    }


    $stmt->close();
    $conn->close();
} else {
    echo "No corresponde la solicitud.";
}
?>
