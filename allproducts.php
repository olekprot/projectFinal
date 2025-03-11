
<?php include "components/_config.php"; 


$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // List of tables
    while ($row = $result->fetch_array()) {
        $tableName = $row[0]; // Name of table
        // Get data from table
        $query = "SELECT * FROM `$tableName`";
        $tableResult = $conn->query($query);

        if ($tableResult->num_rows > 0) {
            // Datas from table
            while ($data = $tableResult->fetch_assoc()) {
              echo '<tr>
              <td><img src="'.$row['image'].'"></td>
              <td>'.$data['nombre'].'</td>
              <td>'.$data['code'].'</td>
              <td>'.$data['size'].'</td>
              <td>'.$data['price'].'</td>
              <td>'.$data['quantity'].'</td>
              <td>'.$data['price']*$data['quantity'].'</td>
              <td><input type="number" id="sell_price"></td>
              </tr>';
            }
            echo '<tbody>';
        } else {
            echo "Table $tableName está vacía.<br>";
        }
    }
} else {
    echo "No hay datos en la base de datos.";
}


?>