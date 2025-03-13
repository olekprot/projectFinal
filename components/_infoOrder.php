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
                        <<td>
                        <!-- Кнопка "Удалить" -->
                        <form action="components/_deleteProduct.php" method="POST" style="display:inline;">
                            <input type="hidden" name="tableName" value="' . htmlspecialchars($tableName) . '">
                            <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                            <button type="submit" style="background-color:red; color:white; border:none; cursor:pointer;">Borrar</button>
                        </form>
                        
                        <!-- Кнопка "Изменить" -->
                        <a href="components/_editProduct.php?tableName=' . urlencode($tableName) . '&id=' . urlencode($row['id']) . '" style="background-color:blue; color:white; padding:5px; text-decoration:none; border-radius:3px;">Cambiar</a>
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

