document.querySelector('.search_input').addEventListener('input', function() {
  const filter = this.value.toLowerCase();
  const rows = document.querySelectorAll('tbody tr');

  rows.forEach(row => {
    const remarks = row.cells[2].textContent.toLowerCase();
    row.style.display = remarks.includes(filter) ? '' : 'none';
  });
});