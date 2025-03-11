
<?php include "components/_config.php"; 

$sql = "SELECT * FROM order1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<tbody>'; // Start the unordered list
    while($row = $result->fetch_assoc()) {
      echo '<tr>
                <td><img src="'.$row['image'].'"></td>
                <td>'.$row['nombre'].'</td>
                <td>'.$row['code'].'</td>
                <td>'.$row['size'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['quantity'].'</td>
                <td>'.$row['price']*$row['quantity'].'</td>
                <td><input type="number" id="sell_price"></td>
           </tr>';
    }
    echo '<tbody>'; // End the unordered list
  } else {
    echo "0 results";
  }

?>