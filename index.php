<? const TITULO ='Inicio';?>
<?php include_once 'components/_config.php' ?>
<?php include 'components/_header.php' ?>


<h1>Sistema de control de inventario</h1>
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
            <th>Nombre del order</th>
        </tr>
        </thead>
            <?php include 'components/_allproducts.php'?>
    </table>
</div>

<?php include 'components/_footer.php' ?>
