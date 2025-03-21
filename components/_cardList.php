<?php include "components/_config.php"; 

    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    // El nombre de la tabla a excluir
    $excludeTable = "listaOrderes";

    if ($result->num_rows > 0) {
        echo '<div class="card_container">';
        // Lista de nombres de tablas
        while ($row = $result->fetch_array()) {
            $tableName = $row[0]; // nombre de la tabla

            // Excluimos la tabla requerida
            if ($tableName === $excludeTable) {
                continue; // Proxima iteración
            }
            $query = "SELECT * FROM `$tableName`";
            $tableResult = $conn->query($query);
            
            if ($tableResult->num_rows > 0) {
                // Datas del table
                while ($data = $tableResult->fetch_assoc()) {
                    echo '
                    <div class="card-product-container">
                        <div class="card-product">
                            <img src="'.$data['image'].'">
                            <div class="card-product-list">
                                <p> Nombre:<b> '.$data['nombre'].'</b></p>
                                <p> Codigo:<b> '.$data['code'].'</b></p>
                                <p> Talla:<b> '.$data['size'].'</b></p>
                                <p> Precio:<b> '.$data['price'].' euro</b></p>
                                <p> Cantidad:<b> '.$data['quantity'].'</b></p>
                                <p> Suma:<b> '.$data['price']*$data['quantity'].' euro</b></p> 
                                <p>Nombre del orden:<b> '.$tableName.'</b></p>
                            </div>
                        </div>
                    </div>';
                }
            }
        }
        echo '</div>';
    } else {
        echo "No hay datos en la base de datos.";
    }
    $conn->close();
?>