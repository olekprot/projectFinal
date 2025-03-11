<?php
    const SITENAME = 'Project Final Protyniak';
    const TITULO = 'Project Final Protyniak';
    function titulo($siteTitulo = true){
        if(defined('TITULO')){
            echo TITULO." - ";
        }
        if(defined('SITENAME') && $siteTitulo){
            echo " - ";
        }
        if($siteTitulo){
            SITENAME;
        }
       
    }



    //Connection to DB
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