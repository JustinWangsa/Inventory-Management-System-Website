<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TKUISA's Inventory</title>
        <link href="style.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="container">

            <div class="side_bar">

                <div class="side_top">
                    <img src="image/main_logo.png" alt="TKUISA LOGO">
                    <p class="med_button">Inventory</p>
                    <button class="med_button">Add Item</button>
                </div>

                <div class="side_bottom">
                    <p id="side_bottom_upper">coded and designed by</p>
                    <p id="Bold">ASEP STROBERI</p>
                </div>

            </div>

            <div class="main">

                <div class="top_segment">
                    <div class="search_bar">
                    <input type="search" placeholder="Search for an item"/>
                    </div>
                    <button class="log_out">Log Out</button>
                </div>

                <table>
                    <tr class="">
                        <th scope="col">Number</th>
                        <th scope="col">Image</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Code</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </table>
                <div class="popup">
                    <form method="POST" class="" enctype="multipart/form-data" action="add.php">

                        
                            <label for="name">Product image</label>
                            <input type="file" name="product_image" required>
                        
                            <label for="name">Product remarks</label>
                            <input type="text" name="product_remarks" required>

                            <label for="name">code</label>
                            <input type="text" name="product_code" required>

                            <label for="name">Quantity</label>
                            <input type="number" name="product_quantity" id="quant" min="1" max="" required>

                        <button type="submit" class="" name="add">Add item</button>

                    </form>
                </div>
                <?php
                    include('connect.php');
                ?>

                <!-- row table function -->
                <?php 
                    $sql = "SELECT * FROM items"; 
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            $count = $count + 1;
                ?>

                <table>
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
                        <th>
                            <button 
                                onclick="if (confirm('Are you sure you want to delete this item?')) { window.location.href = 'delete.php?id=<?php echo $row['id']; ?>'; }">
                                Delete
                            </button>
                        </th>
                        <th>
                            <button class=""
                                onclick="window.location.href = 'edit.php?id=<?php echo $row['id'] ?>';">
                                Edit
                            </button>
                        </th>
                    </tr>    
                    <?php
                        }   
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>