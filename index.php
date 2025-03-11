
<?php include_once 'components/_config.php' ?>
<?php include 'components/_header.php' ?>

<h2>Responsive Table</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Code</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Price total</th>
            <th>Sell Price</th>
        </tr>
        </thead>
            <?php include 'allproducts.php'?>
    </table>
</div>

<?php include 'components/_footer.php' ?>
