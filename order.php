<? const TITULO ='Orden';?>
<?php include "components/_header.php"; ?>

    


<?php include 'components/_cardList.php'?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Talla</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Precio total</th>
        </tr>
        </thead>
            <?php include 'components/_infoOrder.php'?>
    </div>
</div>


<?php include "components/_footer.php"; ?>