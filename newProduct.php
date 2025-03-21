<? const TITULO ='Product nuevo';?>
<?php include "components/_config.php"; ?>
<?php include "components/_header.php"; ?>
<?php 
    $sql = "SHOW TABLES";
    $result = $conn->query($sql);
    $tables = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0]; // Guardar el nombre de la tabla
        }
    } else {
        $tables[] = "No hay tablas disponibles.";
    }
?>
<div id="feedback-form">
    <h2 class="header">New Product</h2>
    <div>
        <form action="components/_addNewProduct.php" method="get">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="code" placeholder="Code" required>
            <input type="text" name="size" placeholder="Talla" required>
            <input type="number" name="quantity" placeholder="Cantidad" required>
            <input type="number" name="price" placeholder="Precio" required>
            <input type="text" name="image" placeholder="Imagine" required>
                       
            <div class="box">
                <select name="order" id="order"  required>
                    <?php foreach ($tables as $tableName): ?>
                        <?php if ($tableName !== 'listaOrderes'): ?>
                            <option value="<?php echo $tableName; ?>"><?php echo $tableName; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>          
            <input class="mas-btn" type="submit" value="Agregar nuevo producto" name="submitButton">
        </form>
    </div>
</div>
        
<?php include "components/_footer.php"; ?>
