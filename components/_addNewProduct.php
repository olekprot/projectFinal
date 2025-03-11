<?php
    include "_config.php";
    if (isset($_GET['submitButton'])) {
        $nombre = $_GET['nombre'];
        $code = $_GET['code'];
        $price = $_GET['price'];
        $image = $_GET['image'];
        $quantity = $_GET['quantity'];
        $size = $_GET['size'];

      
        $sql = "INSERT INTO allproducts (nombre, code, price, quantity, size, image) VALUES ('$nombre', '$code', '$price', '$quantity','$size', '$image')";
        mysqli_query($conn, $sql);
        echo "Add New Producto".$nombre;
        echo '<a href="../index.php">Volver</a>';

        mysqli_close($conn);
    }


?>