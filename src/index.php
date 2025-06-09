<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TKUISA's Inventory</title>
  <link href="style.css" rel="stylesheet"/>
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
        <table>
          <thead>
            <tr>
              <th>No.</th>
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

    <!-- <section id="About" class="about">
        <h2>About Us</h2>
        <div class="main">
            <img src="/image/wp4.jpg" alt="">
            <div class="about-text">
                <p>Welcome to our recipe playground where kitchen disasters turn into delicious masterpieces (eventually). Whether you're a seasoned chef or someone who just Googled "how to boil water," you're in the right place. We’ve got comfort food for your soul, fusion recipes to impress your date, and step-by-step guides so simple even your cat could follow (but please don’t let your cat cook). So grab your apron, pretend you're on a cooking show, and let’s whip up something amazing or at least edible. </p>
            </div>
        </div>
    </section>
    <div id="Recipes" class="recipe">
        <h2>Featured Recipes</h2>
        <div class="box">
            
            <div class="card">
                <img src="/image/stinky_tofu_1.jpeg" alt="Stinky Tofu">
                <div class="content">
                    <h3>臭豆腐</h3>
                    <P>臭豆腐 also known as "stinky tofu"</P>
                    <button  onclick="window.location.href='HTML/recipe1.html'">View Recipe</button>
                </div>
            </div>
            
            <div class="card">
                <img src="/image/popcorn_chicken.jpg" alt="popcorn chicken">
                <div class="content">
                    <h3>鹹酥雞</h3>
                    <P>鹹酥雞 also known as "Popcorn Chicken"</P>
                    <button onclick="window.location.href='HTML/bertrand.html'">View Recipe</button>
                </div>
            </div>
            
            <div class="card">
                <img src="/image/jipai.jpg" alt="jipai">
                <div class="content">
                    <h3>雞排</h3>
                    <P>雞排 also known as "Taiwanese Fried Chicken"</P>
                    <button onclick="window.location.href='/HTML/recipe3.html'">View Recipe</button>
                </div>
            </div>
            
            <div class="card">
                <img src="/image/yehu.jpg" alt="Sweet Potato Balls">
                <div class="content">
                    <h3>地瓜球</h3>
                    <P>地瓜球 also known as "Sweet Potato Balls"</P>
                    <button onclick="window.location.href='/HTML/yehuda.html'">View Recipe</button>
                </div>
            </div>
            
            <div class="card">
                <img class="jeffta" src="/image/jeffta.jpg" alt="">
                <div class="content">
                    <h3>蚵仔煎</h3>
                    <P>蚵仔煎 also known as  "Oyster Omelette"</P>
                    <button onclick="window.location.href='/HTML/jeffta.html'">View Recipe</button>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div> -->

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
</body>
</html>
