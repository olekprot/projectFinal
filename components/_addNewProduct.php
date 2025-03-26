<?php
    include "_config.php";
    $TITULO = 'Añadir nuevo producto ';


    if (isset($_GET['submitButton'])) {
        // Obtener datos del formulario
        $nombre = $_GET['nombre'];
        $code = $_GET['code'];
        $price = $_GET['price'];
        $image = $_GET['image'];
        $quantity = $_GET['quantity'];
        $size = $_GET['size'];
        $table = $_GET['order']; // Get table

        // Validar los datos
        $table = mysqli_real_escape_string($conn, $table);
        $nombre = mysqli_real_escape_string($conn, $nombre);
        $code = mysqli_real_escape_string($conn, $code);
        $price = mysqli_real_escape_string($conn, $price);
        $image = mysqli_real_escape_string($conn, $image);
        $quantity = mysqli_real_escape_string($conn, $quantity);
        $size = mysqli_real_escape_string($conn, $size);

        // sql
        $sql = "INSERT INTO `$table` (nombre, code, price, quantity, size, image) 
                VALUES ('$nombre', '$code', '$price', '$quantity', '$size', '$image')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Product '$nombre' add at the table - '$table'.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        echo '<br><a href="../index.php">Volver</a>';

        // Cerrar la conexión
        mysqli_close($conn);
    }
    
?>