<?php
include "_config.php";

$sql = "SELECT nombre_order, date_order, delivery_order FROM listaOrderes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
            echo '<td>' . htmlspecialchars($row['nombre_order']) . '</td>';
            echo '<td>' . htmlspecialchars($row['date_order']) . '</td>';
            echo '<td>' . htmlspecialchars($row['delivery_order']) . '</td>';
            echo '<td> <a href="order.php?id=' . urlencode($row['nombre_order']) . '">Mas informacion</a></td>';

        echo '</tr>';

    }
    echo '</tbody>';
} else {
    echo '<tr><td colspan="3">No hay ordenes.</td></tr>';
}

$conn->close();
?>
