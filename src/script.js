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