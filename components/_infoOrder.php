<?php
include "../components/_config.php"; 

// Compruebe que se pasa el parámetro id
if (isset($_GET['id'])) {
    $tableName = $_GET['id'];

    // Ejecutamos una consulta para obtener datos de la tabla
    $query = "SELECT * FROM `$tableName`";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
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
                        <a href="#" class="edit-btn" 
                           data-id="' . $row['id'] . '" 
                           data-nombre="' . htmlspecialchars($row['nombre']) . '" 
                           data-code="' . htmlspecialchars($row['code']) . '" 
                           data-size="' . htmlspecialchars($row['size']) . '" 
                           data-price="' . htmlspecialchars($row['price']) . '" 
                           data-quantity="' . htmlspecialchars($row['quantity']) . '" 
                           data-image="' . htmlspecialchars($row['image']) . '"
                           data-table="' . htmlspecialchars($tableName) . '">
                           Cambiar
                        </a>
                        <div id="editModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border-radius: 5px; z-index: 1000;">
                            <button id="closeModal" style="float: right;">x</button>
                            <div id="feedback-form">
                            <form id="editForm">
                                
                            </form>
                            </div>
                        </div>
                        <div id="modalBackdrop" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>
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

