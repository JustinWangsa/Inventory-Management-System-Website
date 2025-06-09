document.addEventListener("DOMContentLoaded", () => {
  const addPopup = document.getElementById("addPopup");
  const openPopupBtn = document.getElementById("addBtn");
  const closePopupBtn = document.getElementById("closePopupBtn");
  const cancelBtn = document.getElementById("cancelBtn");
  const form = document.querySelector("form");

  openPopupBtn.onclick = () => addPopup.style.display = "block";
  closePopupBtn.onclick = () => addPopup.style.display = "none";
  cancelBtn.onclick = () => addPopup.style.display = "none";

  window.addEventListener('click', (e) => {
    if (e.target === addPopup) addPopup.style.display = "none";
  });

  document.querySelector('.search_input').addEventListener('input', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
      const remarks = row.cells[2].textContent.toLowerCase();
      row.style.display = remarks.includes(filter) ? '' : 'none';
    });
  });

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
      const tbody = document.querySelector('tbody');

      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>New</td>
        <td><img src="${imageUrl}" width="80" alt="Image" /></td>
        <td>${itemName}</td>
        <td>${itemCode}</td>
        <td>${quantity}</td>
        <td><button onclick="alert('Delete action here')">Delete</button></td>
        <td><button onclick="alert('Edit action here')">Edit</button></td>
      `;

      tbody.appendChild(newRow);
      form.reset();
      addPopup.style.display = "none";
    };

    reader.readAsDataURL(imageFile);
  });
});
