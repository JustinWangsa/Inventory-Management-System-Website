<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory</title>
    </head>
    
    <body>

        <div class="inventory_table">

            <table>

                <tr class="information">
                    <th scope="col">Number</th>
                    <th scope="col">Image</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Code</th>
                    <th scope="col">Quantity</th>
                </tr>
            
                <body>
                    <form method="POST" class="form-inline" enctype="multipart/form-data" action="add.php">

                        
                            <label for="name">Product image</label>
                            <input type="file" class="form-control" name="product_image" required>
                        
                            <label for="name">Product remarks</label>
                            <input type="text" class="form-control" name="product_remarks" required>

                            <label for="name">code</label>
                            <input type="text" class="form-control" name="product_code" required>

                            <label for="name">Quantity</label>
                            <input type="number" class="form-control" name="product_quantity" id="quant" min="1" max="" required>

                        <button type="submit" class="btn btn-primary ms-3 mt-3" name="add">Add item</button>

                    </form>
                </body>

                <body>

                    <?php
                        include('connect.php');
                    ?>

                    
                    <!-- row table function -->
                    <?php 
                
                    $sql = "SELECT * FROM items"; 
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) 
                        {
                            $count = $count + 1;
                    ?>
                    <tr>
                        <th>
                            <?php echo $count ?>
                        </th>
                        <th>
                            <img src="image/<?php echo $row["product_image"]; ?>" width="80" alt="Image">
                        </th>
                        <th>
                            <?php echo $row["product_remarks"] ?>
                        </th>
                        <th>
                            <?php echo $row["product_code"] ?>
                        </th>
                        <th>
                            <?php echo $row["product_quantity"] ?>
                        </th>
                    <?php
                        }
                    }
                    ?>


                </body>
                
                

            </table>

        </div>

        
    </body>

</html>