<? const TITULO ='Orden nuevo';?>
<?php include "components/_config.php"; ?>
<?php include "components/_header.php"; ?>

            <div id="feedback-form">
                <h2 class="header">Nuevo orden</h2>
                <div>
                    <form action="components/_addNewOrder.php" method="post">
                        <input type="text" name="nombre_order" placeholder="Nombre del orden" required></input>
                        <input type="date" name="date_order" placeholder="Fecha del orden" required></input>
                        <input type="number" name="delivery_order" placeholder="Precio de envio" required></input>
                        <input class="mas-btn" type="submit" value="Agregar nuevo orden" name="submitButton">
                    </form>   
                </div>
            </div> 
        
<?php include "components/_footer.php"; ?>
