<?php
include "../components/_config.php"; 

// Compruebe que se pasa el parámetro id
if (isset($_GET['nombre_order'])) {
    $tableName = $_GET['nombre_order'];

    // Ejecutamos una consulta para obtener datos de la tabla
    $query = "SELECT * FROM `$tableName`";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo '<h3>Nombre de la tabla: '.$tableName.'</h3>';
            while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                        <td><img src="' . htmlspecialchars($row['image']) . '" alt="Image"></td>
                        <td>' . htmlspecialchars($row['nombre']) . '</td>
                        <td>' . htmlspecialchars($row['code']) . '</td>
                        <td>' . htmlspecialchars($row['size']) . '</td>
                        <td>' . htmlspecialchars($row['price']) . '</td>
                        <td>' . htmlspecialchars($row['quantity']) . '</td>
                        <td>' . htmlspecialchars($row['price'] * $row['quantity']) . '</td>
                        <td>
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
                        </td>
                        <td>
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
                        </td>         
                    </tr>';
        }
        echo '</tbody></table>
        </div>';
    } else {
        echo '<p>No hay datos en la tabla: ' . htmlspecialchars($tableName) . '</p>';
    }
} else {
    echo '<p>¡No se pasó el parámetro id!</p>';
}

$conn->close();
?>

