<?php include "components/_config.php"; 

    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    // El nombre de la tabla a excluir
    $excludeTable = "listaOrderes";

    if ($result->num_rows > 0) {
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
                echo '<tbody>';
                while ($data = $tableResult->fetch_assoc()) {
                    echo '<tr>
                        <td><img src="'.$data['image'].'"></td>
                        <td>'.$data['nombre'].'</td>
                        <td>'.$data['code'].'</td>
                        <td>'.$data['size'].'</td>
                        <td>'.$data['price'].'</td>
                        <td>'.$data['quantity'].'</td>
                        <td>'.$data['price']*$data['quantity'].'</td>
                        <td>'.$tableName.'</td>
                    </tr>';
                }
                echo '</tbody>';
            }
        }
    } else {
        echo "No hay datos en la base de datos.";
    }

?>