  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>TKUISA's Inventory</title>
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style.php">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap"/>

  </head>

  <body>
    <div class="container">
      <div class="side_bar">
        <div class="side_top">
          <img src="image/main_logo.png" alt="TKUISA LOGO" />
          <p class="med_button">Inventory</p>
          <button class="med_button" id="addBtn">Add Item</button>
        </div>

        <div class="side_bottom">
          <p>coded and designed by</p>
          <p id="Bold">ASEP STROBERI</p>
        </div>
      </div>

      <div class="main">
        <div class="top_segment">
          <div class="search_bar">
            <span class="material-symbols-outlined">search</span>
            <input class="search_input" type="search" placeholder="Search for an item" />
          </div>
          <button class="log_out">Log Out</button>
        </div>

        <div class="bottom_segment">
          <table class="table">
            <thead>
              <tr class="table_head">
                <th>No</th>
                <th>Image</th>
                <th>Remarks</th>
                <th>Code</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include('connect.php');
                $sql = "SELECT * FROM items";
                $result = $conn->query($sql);
                $count = 1;
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td><img src='image/" . $row["product_image"] . "' width='80' alt='Image'></td>";
                    echo "<td>" . $row["product_remarks"] . "</td>";
                    echo "<td>" . $row["product_code"] . "</td>";
                    echo "<td>" . $row["product_quantity"] . "</td>";
                    echo "<td>
                    <button onclick=\"if(confirm('Delete this item?')) window.location.href='delete.php?id=" . $row["id"] . "';\">Delete</button>
                    <button class='editBtn' 
                        data-id='" . $row["id"] . "'
                        data-remarks='" . htmlspecialchars($row["product_remarks"], ENT_QUOTES) . "'
                        data-code='" . $row["product_code"] . "'
                        data-quantity='" . $row["product_quantity"] . "'
                    >Edit</button>
                    </td>";
                    echo "</tr>";
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </body>

    <script>
      const addPopup = document.getElementById("addPopup");
      const openPopupBtn = document.getElementById("addBtn");
      const closePopupBtn = document.getElementById("closePopupBtn");
      const cancelBtn = document.getElementById("cancelBtn");

      openPopupBtn.onclick = () => addPopup.style.display = "block";
      closePopupBtn.onclick = () => addPopup.style.display = "none";
      cancelBtn.onclick = () => addPopup.style.display = "none";

      window.onclick = (e) => {
        if (e.target === addPopup) addPopup.style.display = "none";
      };

      const editPopup = document.getElementById("editPopup");
      const closeEditPopupBtn = document.getElementById("closeEditPopupBtn");
      const cancelEditBtn = document.getElementById("cancelEditBtn");

      document.querySelectorAll(".editBtn").forEach(btn => {
        btn.addEventListener("click", () => {
          document.getElementById("editId").value = btn.dataset.id;
          document.getElementById("editRemarks").value = btn.dataset.remarks;
          document.getElementById("editCode").value = btn.dataset.code;
          document.getElementById("editQuantity").value = btn.dataset.quantity;
          editPopup.style.display = "block";
        });
      });

      closeEditPopupBtn.onclick = () => editPopup.style.display = "none";
      cancelEditBtn.onclick = () => editPopup.style.display = "none";

      window.onclick = (e) => {
        if (e.target === addPopup) addPopup.style.display = "none";
        if (e.target === editPopup) editPopup.style.display = "none";
      };
    </script>

    <div class="popup" id="addPopup">
      <div class="popup_content">
        <div class="popup_header">
          <h2>Add New Items</h2>
          <span class="popup_close" id="closePopupBtn">&times;</span>
        </div>

        <form method="POST" enctype="multipart/form-data" action="add.php">
          <div class="form_group">
            <label for="productName">Item Name *</label>
            <input type="text" id="productName" name="product_remarks" required />
          </div>

          <div class="form_group">
            <label for="productCode">Item Code *</label>
            <input type="text" id="productCode" name="product_code" required />
          </div>

          <div class="form_group">
            <label for="productQuantity">Quantity *</label>
            <input type="number" id="productQuantity" name="product_quantity" min="1" required />
          </div>

          <div class="form_group">
            <label for="productImage">Image *</label>
            <input type="file" id="productImage" name="product_image" required />
          </div>

          <div class="add_popup_actions">
            <button type="button" class="btn cancel_btn" id="cancelBtn">Cancel</button>
            <button type="submit" class="btn add_btn" name="add">Add</button>
          </div>
        </form>
      </div>
    </div>

    <div class="popup" id="editPopup">
      <div class="popup_content">
        <div class="popup_header">
          <h2>Edit Item</h2>
          <span class="popup_close" id="closeEditPopupBtn">&times;</span>
        </div>

        <form method="POST" enctype="multipart/form-data" action="update.php">
          <input type="hidden" id="editId" name="id" />
          <div class="form_group">
            <label for="editRemarks">Item Name *</label>
            <input type="text" id="editRemarks" name="product_remarks" required />
          </div>

          <div class="form_group">
            <label for="editCode">Item Code *</label>
            <input type="text" id="editCode" name="product_code" required />
          </div>

          <div class="form_group">
            <label for="editQuantity">Quantity *</label>
            <input type="number" id="editQuantity" name="product_quantity" min="1" required />
          </div>

          <div class="form_group">
            <label for="editImage">Change Image (optional)</label>
            <input type="file" id="editImage" name="product_image" />
          </div>
          
          <div class="add_popup_actions">
            <button type="button" class="btn cancel_btn" id="cancelEditBtn">Cancel</button>
            <button type="submit" class="btn add_btn" name="update">Update</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>


