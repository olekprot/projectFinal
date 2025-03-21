<?php 
    const TITULO ='Project Final Protyniak';

    /* WEB CONNECTION*/
    
    $host ='localhost';
    $user ='myprotyniac4';
    $pass ='H6f4C2XB';
    $dbna ='tiendazaya';

    // Connect
    $conn = mysqli_connect($host, $user, $pass, $dbna);

    if ($conn->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }





?>