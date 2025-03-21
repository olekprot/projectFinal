<? const TITULO ='Lista de los ordenes';?>
<?php include "components/_header.php"; ?>

<h2><?=TITULO?></h2>
<?php include 'components/_cardListOrderes.php'?>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Nombre del orden</th>
            <th>Fecha del orden</th>
            <th>Precio de envio</th>
            <th>Informacion</th>
        </tr>
        </thead>
            <?php include 'components/_ordersList.php'?>
    </table>
</div>


<?php include "components/_footer.php"; ?>


