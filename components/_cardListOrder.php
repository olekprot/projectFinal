<?php include_once "components/_config.php";

if (isset($_GET['nombre_order'])) {
    $tableName = $_GET['nombre_order'];

    // Ejecutamos una consulta para obtener datos de la tabla
    $query = "SELECT * FROM `$tableName`";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo '<h3>Nombre de la tabla: '.$tableName.'</h3>';
        echo '<div class="table-container-download">';
            echo '<div class="form-container">';
                echo '<form action="components\_exportOrder.php" method="POST">
                        <input type="hidden" name="tableName" value="'. htmlspecialchars($tableName) . '">
                        <label for="format">Seleccionar formato:</label>
                        <select name="format" id="format" required>
                            <option value="csv">CSV</option>
                            <option value="json">JSON</option>
                        </select>
                        <input class="download-btn" type="submit" value="Descargar">
                    </form>';
                echo '</div>';
        echo '</div>';
        echo '<div class="card_container">';
            while ($row = $result->fetch_assoc()) {
                    echo ' <div class="card-product-container">
                    
    
                            <div class="card-product">
                                <img src="'.$row['image'].'">
                                <div class="card-product-list">
                                    <p> Nombre:<b> '.$row['nombre'].'</b></p>
                                    <p> Codigo:<b> '.$row['code'].'</b></p>
                                    <p> Talla:<b> '.$row['size'].'</b></p>
                                    <p> Precio:<b> '.$row['price'].' euro</b></p>
                                    <p> Cantidad:<b> '.$row['quantity'].'</b></p>
                                    <p> Suma:<b> '.$row['price']*$row['quantity'].' euro</b></p> 
                                </div> 
                            </div>
                            <div class="button_mobile">
                                <button class="edit-btn" 
                                    data-id="' . $row['id'] . '" 
                                    data-nombre="' . htmlspecialchars($row['nombre']) . '" 
                                    data-code="' . htmlspecialchars($row['code']) . '" 
                                    data-size="' . htmlspecialchars($row['size']) . '" 
                                    data-price="' . htmlspecialchars($row['price']) . '" 
                                    data-quantity="' . htmlspecialchars($row['quantity']) . '" 
                                    data-image="' . htmlspecialchars($row['image']) . '"
                                    data-table="' . htmlspecialchars($tableName) . '">
                                    Cambiar
                                </button>
                                <div id="editModal">
                                    <button id="closeModal">x</button>
                                    <div id="feedback-form">
                                        <form id="editForm"></form>
                                    </div>
                                </div>
                                <div id="modalBackdrop"></div>
                                
                                <form id="deleteForm" action="components/_deleteProduct.php" method="get">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="hidden" name="tableName" value="' . htmlspecialchars($tableName) . '">
                                    <input class="delete-btn" type="submit" value="Borrar">
                                </form>
                                <div id="deleteModal">
                                    <p>¿Está seguro que desea eliminar este elemento?</p>
                                    <button id="confirmDelete">Si</button>
                                    <button id="cancelDelete">No</button>
                                </div>
                                <div id="modalBackdrop"></div>
                        </div>

                </div>';                     
        }
        echo '</div>
        </div>';
    } else {
        echo '<p>No hay datos en la tabla: ' . htmlspecialchars($tableName) . '</p>';
    }
} else {
    echo '<p>¡No se pasó el parámetro id!</p>';
}

$conn->close();

?>