<!-- bikin 2 div, 1 container hitam and putih
 php bakal loop data berdasarkan container
 bikin "card"  -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TKUISA's Inventory</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search"/>
        <script src="script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="side_bar">
                <div class="side_top">
                    <img src="image/main_logo.png" alt="TKUISA LOGO">
                    <p class="med_button">Inventory</p>
                    <button class="med_button" id="addBtn">Add Item</button>
                </div>

                <div class="side_bottom">
                    <p id="side_bottom_upper">coded and designed by</p>
                    <p id="Bold">ASEP STROBERI</p>
                </div>
            </div>

            <div class="main">
                <div class="top_segment">
                    <div class="search_bar">
                        <span class="material-symbols-outlined">search</span>
                        <input class="search_input" type="search" placeholder="Search for an item"/>
                    </div>
                    <button class="log_out">Log Out</button>
                </div>

                <div class="bottom_segment">
                    <div id="card-title">
                        <p>Number</p>
                        <p>Image</p>
                        <p>Remarks</p>
                        <p>Code</p>
                        <p>Quantity</p>
                    </div>

                    <div class="popup" id="addPopup">
                        <div class="popup_content">
                            <div class="popup_header">
                                <h2>Add New Items</h2>
                                <span class="popup_close" id="closePopupBtn">&times;</span>
                            </div>

                            <form method="POST" enctype="multipart/form-data" action="add.php">
                                <div class="form_group">
                                    <label for="name">Item Name *</label>
                                    <input type="text" id="productName" name="product_remarks" required>
                                </div>

                                <div class="form_group">
                                    <label for="name">Item Code *</label>
                                    <input type="text" id="productCode" name="product_code" required>
                                </div>

                                <div class="form_group">
                                    <label for="name">Quantity *</label>
                                    <input type="number" id="productQuantity" name="product_quantity" id="quant" min="1" required>
                                </div>

                                <div class="form_group">
                                    <label for="name">Image *</label>
                                    <input type="file" id="productImage" name="product_image" required>
                                </div>

                                <div class="add_popup_actions">
                                    <button type="button" class="btn cancel_btn" id="cancelBtn" name="cancel">Cancel</button>
                                    <button type="submit" class="btn add_btn" name="add">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                        include('connect.php');
                    ?>

                    <?php 
                        $sql = "SELECT * FROM items"; 
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()){
                                $count++; ?>

                                <table>
                                    <tr>
                                        <th><?php echo $count ?></th>
                                        <th>
                                            <div class="img-container">
                                                <img src="image/<?php echo $row["product_image"] ?>" width="80" alt="Image">
                                            </div>
                                        </th>
                                        <th><?php echo $row["product_remarks"] ?></th>
                                        <th><?php echo $row["product_code"] ?></th>
                                        <th><?php echo $row["product_quantity"] ?></th>
                                        <th>
                                            <button onclick="if (confirm('Are you sure you want to delete this item?')) { window.location.href = 'delete.php?id=<?php echo $row['id']; ?>'; }">Delete</button>
                                        </th>
                                        <th>
                                            <button onclick="window.location.href = 'edit.php?id=<?php echo $row['id'] ?>';">Edit</button>
                                        </th>
                                    </tr>
                                </table>

                    <?php
                            }   
                        }   
                    ?>
                </div>
            </div>
        </div>
        <script>
            const addPopup = document.getElementById("addPopup");
            const openPopupBtn = document.getElementById("addBtn");
            const closePopupBtn = document.getElementById("closePopupBtn");
            const cancelBtn = document.getElementById("cancelBtn");
            const form = document.querySelector("form");
            const bottomSegment = document.querySelector(".bottom_segment");

            openPopupBtn.onclick = () => {
            addPopup.style.display = "block";
            };

            closePopupBtn.onclick = () => {
            addPopup.style.display = "none";
            };

            cancelBtn.onclick = () => {
            addPopup.style.display = "none";
            };

            window.onclick = (e) => {
            if (e.target === addPopup) {
                addPopup.style.display = "none";
            }
            };

            form.addEventListener("submit", function (e) {
            e.preventDefault();

            const itemName = document.getElementById("productName").value;
            const itemCode = document.getElementById("productCode").value;
            const quantity = document.getElementById("productQuantity").value;
            const imageInput = document.getElementById("productImage");
            const imageFile = imageInput.files[0];

            if (!itemName || !itemCode || !quantity || !imageFile) {
                alert("Please fill in all fields.");
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                const imageUrl = event.target.result;

                const newTable = document.createElement("table");
                newTable.innerHTML = `
                <tr>
                    <th>New</th>
                    <th>
                    <div class="img-container">
                        <img src="${imageUrl}" width="80" alt="Image">
                    </div>
                    </th>
                    <th>${itemName}</th>
                    <th>${itemCode}</th>
                    <th>${quantity}</th>
                    <th><button onclick="alert('Delete action here')">Delete</button></th>
                    <th><button onclick="alert('Edit action here')">Edit</button></th>
                </tr>
                `;

                bottomSegment.appendChild(newTable);
                form.reset();
                addPopup.style.display = "none";
            };

            reader.readAsDataURL(imageFile);
            });
        </script>
    </body>
</html>
