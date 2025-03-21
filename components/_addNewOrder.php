<?php include "_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre_order = $_POST['nombre_order']; // nombre del orden nuevo
    $date_order = $_POST['date_order'];
    $delivery_order = $_POST['delivery_order'];

    // Validar los datos
    $nombre_order = mysqli_real_escape_string($conn, $nombre_order);
    $date_order = mysqli_real_escape_string($conn, $date_order);
    $delivery_order = mysqli_real_escape_string($conn, $delivery_order);

    // Crear nueva tabla
    $create_table_sql = "CREATE TABLE `$nombre_order` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        price FLOAT(50) NOT NULL,
        size FLOAT(50),
        quantity INT(50),
        code VARCHAR(50),
        image VARCHAR(350)
    )";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "La tabla `$nombre_order` creada exitosamente.<br>";
    } else {
        echo "Error al crear la tabla: " . $conn->error . "<br>";
        exit;
    }

    // Agregar datos a una tabla `listaOrderes`
    $insert_data_sql = "INSERT INTO listaOrderes (nombre_order, date_order, delivery_order) 
                        VALUES ('$nombre_order', '$date_order', '$delivery_order')";

    if ($conn->query($insert_data_sql) === TRUE) {
        echo "Los datos se han agregado a la tabla `listaOrderes`.";
        echo '<br><a href="../index.php">Volver</a>';
    } else {
        echo "Error al agregar los datos: " . $conn->error;
        echo '<br><a href="../index.php">Volver</a>';
    }

    // Cerrar la conexión
    $conn->close();
}
?>
