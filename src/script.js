// search function
document.querySelector(".search_input").addEventListener("input", function () {
  const filter = this.value.toLowerCase();
  const rows = document.querySelectorAll("tbody tr");

  rows.forEach((row) => {
    const remarks = row.cells[2].textContent.toLowerCase();
    row.style.display = remarks.includes(filter) ? "" : "none";
  });
});

// const addPopup = document.getElementById("addPopup");
// const openPopupBtn = document.getElementById("addBtn");
// const closePopupBtn = document.getElementById("closePopupBtn");
// const cancelBtn = document.getElementById("cancelBtn");
// const form = document.querySelector("form");
// const bottomSegment = document.querySelector(".bottom_segment");

// const editPopup = document.getElementById("editPopup");
// const closeEditPopupBtn = document.getElementById("closeEditPopupBtn");
// const cancelEditBtn = document.getElementById("cancelEditBtn");

// document.querySelectorAll(".editBtn").forEach((btn) => {
//   btn.addEventListener("click", () => {
//     document.getElementById("editId").value = btn.dataset.id;
//     document.getElementById("editRemarks").value = btn.dataset.remarks;
//     document.getElementById("editCode").value = btn.dataset.code;
//     document.getElementById("editQuantity").value = btn.dataset.quantity;
//     editPopup.style.display = "block";
//   });
// });

// form.addEventListener("submit", function (e) {
//   e.preventDefault();

//   const itemName = document.getElementById("productName").value;
//   const itemCode = document.getElementById("productCode").value;
//   const quantity = document.getElementById("productQuantity").value;
//   const imageInput = document.getElementById("productImage");
//   const imageFile = imageInput.files[0];

//   if (!itemName || !itemCode || !quantity || !imageFile) {
//     alert("Please fill in all fields.");
//     return;
//   }

//   const reader = new FileReader();
//   reader.onload = function (event) {
//     const imageUrl = event.target.result;
//     const tbody = document.querySelector("tbody");

//     const newRow = document.createElement("tr");
//     newRow.innerHTML = `
//         <td>New</td>
//         <td><img src="${imageUrl}" width="80" alt="Image" /></td>
//         <td>${itemName}</td>
//         <td>${itemCode}</td>
//         <td>${quantity}</td>
//         <td><button onclick="alert('Delete action here')">Delete</button></td>
//         <td><button onclick="alert('Edit action here')">Edit</button></td>
//       `;

//     tbody.appendChild(newRow);
//     form.reset();
//     addPopup.style.display = "none";
//   };

//   reader.readAsDataURL(imageFile);
// });

// closeEditPopupBtn.onclick = () => (editPopup.style.display = "none");
// cancelEditBtn.onclick = () => (editPopup.style.display = "none");

// window.onclick = (e) => {
//   if (e.target === addPopup) addPopup.style.display = "none";
//   if (e.target === editPopup) editPopup.style.display = "none";
// };

// openPopupBtn.onclick = () => {
//   addPopup.style.display = "block";
// };

// closePopupBtn.onclick = () => {
//   addPopup.style.display = "none";
// };

// cancelBtn.onclick = () => {
//   addPopup.style.display = "none";
// };

// window.onclick = (e) => {
//   if (e.target === addPopup) {
//     addPopup.style.display = "none";
//   }
// };

// form.addEventListener("submit", function (e) {
//   e.preventDefault();

//   const itemName = document.getElementById("productName").value;
//   const itemCode = document.getElementById("productCode").value;
//   const quantity = document.getElementById("productQuantity").value;
//   const imageInput = document.getElementById("productImage");
//   const imageFile = imageInput.files[0];

//   if (!itemName || !itemCode || !quantity || !imageFile) {
//     alert("Please fill in all fields.");
//     return;
//   }

//   const reader = new FileReader();
//   reader.onload = function (event) {
//     const imageUrl = event.target.result;

//     const newTable = document.createElement("table");
//     newTable.innerHTML = `
//                 <tr>
//                     <th>New</th>
//                     <th>
//                     <div class="img-container">
//                         <img src="${imageUrl}" width="80" alt="Image">
//                     </div>
//                     </th>
//                     <th>${itemName}</th>
//                     <th>${itemCode}</th>
//                     <th>${quantity}</th>
//                     <th><button onclick="alert('Delete action here')">Delete</button></th>
//                     <th><button onclick="alert('Edit action here')">Edit</button></th>
//                 </tr>
//                 `;

//     bottomSegment.appendChild(newTable);
//     form.reset();
//     addPopup.style.display = "none";
//   };

//   reader.readAsDataURL(imageFile);
// });

const addPopup = document.getElementById("addPopup");
const openPopupBtn = document.getElementById("addBtn");
const closePopupBtn = document.getElementById("closePopupBtn");
const cancelBtn = document.getElementById("cancelBtn");

openPopupBtn.onclick = () => (addPopup.style.display = "block");
closePopupBtn.onclick = () => (addPopup.style.display = "none");
cancelBtn.onclick = () => (addPopup.style.display = "none");

window.onclick = (e) => {
  if (e.target === addPopup) addPopup.style.display = "none";
};

const editPopup = document.getElementById("editPopup");
const closeEditPopupBtn = document.getElementById("closeEditPopupBtn");
const cancelEditBtn = document.getElementById("cancelEditBtn");

document.querySelectorAll(".editBtn").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.getElementById("editId").value = btn.dataset.id;
    document.getElementById("editRemarks").value = btn.dataset.remarks;
    document.getElementById("editCode").value = btn.dataset.code;
    document.getElementById("editQuantity").value = btn.dataset.quantity;
    editPopup.style.display = "block";
  });
});

closeEditPopupBtn.onclick = () => (editPopup.style.display = "none");
cancelEditBtn.onclick = () => (editPopup.style.display = "none");

window.onclick = (e) => {
  if (e.target === addPopup) addPopup.style.display = "none";
  if (e.target === editPopup) editPopup.style.display = "none";
};
