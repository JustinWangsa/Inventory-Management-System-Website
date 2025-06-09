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

const editPopup = document.getElementById("editPopup");
const closeEditPopupBtn = document.getElementById("closeEditPopupBtn");
const cancelEditBtn = document.getElementById("cancelEditBtn");
const editForm = document.getElementById("editForm");

let currentEditRow = null;
let currentImage = "";

bottomSegment.addEventListener("click", function (e) {
  if (e.target.classList.contains("edit-btn")) {
    const row = e.target.closest("tr");
    currentEditRow = row;

    const cells = row.querySelectorAll("th");
    currentImage = cells[1].querySelector("img").src;

    document.getElementById("editName").value = cells[2].textContent;
    document.getElementById("editCode").value = cells[3].textContent;
    document.getElementById("editQuantity").value = cells[4].textContent;

    editPopup.style.display = "block";
  }
});

closeEditPopupBtn.onclick = () => {
  editPopup.style.display = "none";
};

cancelEditBtn.onclick = () => {
  editPopup.style.display = "none";
};

window.onclick = (e) => {
  if (e.target === editPopup) {
    editPopup.style.display = "none";
  }
};

editForm.addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("editName").value;
  const code = document.getElementById("editCode").value;
  const quantity = document.getElementById("editQuantity").value;
  const newImage = document.getElementById("editImage").files[0];

  const updateRow = (imgSrc) => {
    const cells = currentEditRow.querySelectorAll("th");
    cells[1].querySelector("img").src = imgSrc;
    cells[2].textContent = name;
    cells[3].textContent = code;
    cells[4].textContent = quantity;
    editPopup.style.display = "none";
  };

  if (newImage) {
    const reader = new FileReader();
    reader.onload = (event) => updateRow(event.target.result);
    reader.readAsDataURL(newImage);
  } else {
    updateRow(currentImage);
  }
});