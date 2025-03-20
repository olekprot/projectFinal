<?php include_once "components/_config.php"; 

$sql = "SELECT nombre_order, date_order, delivery_order FROM listaOrderes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="card_container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card-order">';
            echo '<p> Nombre del orden: <b>' . htmlspecialchars($row['nombre_order']) . '</b></p>';
            echo '<p> Fecha de entrega: <b>' . htmlspecialchars($row['date_order']) . '</b></p>';
            echo '<p> Precio de envio: <b>' . htmlspecialchars($row['delivery_order']) . 'euro </b></p>';
            echo '<a class="mas-btn" href="order.php?nombre_order=' . urlencode($row['nombre_order']) . '">Mas informacion</a>';

        echo '</div>';

    }
    echo '</div>';
} else {
    echo '<h3>No hay ordenes.</h3>';
}

$conn->close();
?>