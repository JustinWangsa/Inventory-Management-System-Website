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
        <!-- <script src="script.js"></script> -->
        <!-- <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

            * {
                margin: 0;
                padding: 0;
                font-family: "Inter";
            }

            body {
                background-color: #f0f0eb;
                height: 100vh;
            }


            .container {
                display: flex;
                height: 100vh;
            }

            .side_bar {
                --bottom_margin: 30px;

                width: 200px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                padding: 30px 30px 20px 30px;
            }

            .side_top {
                display: flex;
                flex-direction: column;
                justify-content: start;
                align-items: center;
            }

            .side_top img {
                width: 200px;
                margin-bottom: var(--bottom_margin);
            }

            .med_button {
                padding: 8px 50px;
                color: #ffffff;
                background: #570000;
                border: 0;
                outline: none;
                cursor: pointer;
                font-size: 15px;
                font-weight: 700;
                border-radius: 30px;
                margin-bottom: var(--bottom_margin);
            }

            .side_bottom {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .side_bottom p{
                opacity: 10%;
                margin: 0;
            }

            #Bold {
                font-weight: bold;
            }

            .main {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding-right: 30px;
                overflow-x: auto;
            }

            .top_segment {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin-right: 30px;
            }

            .search_bar {
                --padding: 10px;

                width: max-content;
                display: flex;
                align-items: center;
                padding: var(--padding);
                border-radius: 28px;
                background-color: #ffffff;
                margin: 20px 0;
                width: 600px;
            }

            .search_input {
                font-size: 16px;
                color: #737373;
                margin-left: var(--padding);
                outline: none;
                border: none;
                background: transparent;
                flex: 1;
            }

            .log_out {
                height: fit-content;
                padding: 8px 35px;
                color: #ffffff;
                background: #570000;
                border: 0;
                outline: none;
                cursor: pointer;
                font-size: 15px;
                font-weight: 700;
                border-radius: 30px;
            }

            .bottom_segment {
                display: flex;
                flex-direction: column;
            }

            #card-title {
                background-color: #D9D9D9;
                color:  #000;
                display: grid;
                grid-template-columns: 1fr 2fr 2fr 2fr 1fr;
                padding: 10px;
                font-weight: bold;
                text-align: center;
                border-radius: 30px 30px 0 0;
            }

            #card-title p {
                margin: 0;
            }

            .popup {
                display: none;
                position: fixed;
                z-index: 999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .popup_content {
                background-color: #ffffff;
                margin: 10% auto;
                padding: 20px;
                border-radius: 10px;
                width: 50%;
            }

            .popup_header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }

            .popup_close {
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }

            .form_group {
                margin-bottom: 15px;
            }

            .form_group label {
                display: block;
                margin-bottom: 5px;
            }

            .form_group input[type="text"],
            .form_group input[type="number"],
            .form_group input[type="file"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .add_popup_actions {
                text-align: right;
            }

            .btn {
                padding: 8px 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .cancel_btn {
                background-color: #ccc;
                margin-right: 10px;
            }

            .add_btn {
                background-color: #7d1b1b;
                color: #ffffff;
            }
        </style> -->
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
<<<<<<< HEAD
                        <span class="material-symbols-outlined">search</span>
                        <input class="search_input" type="search" placeholder="Search for an item"/>
=======
                    <input type="search" id= "Search" placeholder="Search for an item" onkeyup="myFunction()"/>






>>>>>>> 75ecea568353b0d1214b9ed43b7108e9b32bc3b9
                    </div>
                    <button class="log_out">Log Out</button>
                </div>

<<<<<<< HEAD
                <div class="bottom_segment">
                    <div id="card-title">
                        <p>Number</p>
                        <p>Image</p>
                        <p>Remarks</p>
                        <p>Code</p>
                        <p>Quantity</p>
                    </div>
=======
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
                    <form method="POST" id= "Table" class="" enctype="multipart/form-data" action="add.php">
>>>>>>> 75ecea568353b0d1214b9ed43b7108e9b32bc3b9


                    <div class="popup" id="addPopup">
                        <div class="popup_content">
                            <div class="popup_header">
                                <h2>Add New Items</h2>
                                <span class="popup_close" id="closePopupBtn">&times;</span>
                            </div>

                            <div class="popup_form">
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
                                        <input type="number" id="productQuantity" name="product_quantity" id="quant" min="1" max="" required>
                                    </div>

                                    <div class="form_image">
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
                             <div class="img-container">
                                <img src="image/<?php echo $row["product_image"]; ?>" width="80" alt="Image">
                             </div>
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
                                    onclick="if (confirm('Are you sure you want to delete this item?')) { window.location.href = 'delete.php?id=<?php echo $row['id']; ?>'; }">Delete</button>
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