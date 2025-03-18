<? const TITULO ='Finances';?>
<?php include "components/_header.php"; ?>


<h2>Resultados Finances</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead> Order 1
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Costo de compra</th>
            <th>Vendido</th>
            <th>Ganancia</th>
        </tr>
        </thead>
            <?php include 'components/_resultados.php'?>
    </table>
</div>


<?php include "components/_footer.php"; ?>