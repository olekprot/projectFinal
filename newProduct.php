<?php include "components/_config.php"; ?>
<?php include "components/_header.php"; ?>


            <div id="feedback-form">
                <h2 class="header">Add New Product</h2>
                <div>
                    <form action="components/_addNewProduct.php" method="get">
                        <input type="text" name="nombre" placeholder="Name" required></input>
                        <input type="text" name="code" placeholder="Code" required></input>
                        <input type="text" name="size" placeholder="Size" required></input>
                        <input type="number" name="quantity" placeholder="Quantity" required></input>
                        <input type="number" name="price" placeholder="Price" required></input>
                        <input type="text" name="image" placeholder="Image"required ></input>
                        <input class="button -sun" type="submit" value="Add New" name="submitButton">
                    </form>   
                </div>
            </div> 
        
<?php include "components/_footer.php"; ?>
