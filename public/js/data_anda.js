document.getElementById('toggle-icon').addEventListener('click', function() {
    var tableContainer = document.getElementById('table-container');
    var icon = document.getElementById('toggle-icon');

    if (tableContainer.style.display === 'none') {
        tableContainer.style.display = 'block';
        icon.classList.remove('bi-caret-down');
        icon.classList.add('bi-caret-up');
    } else {
        tableContainer.style.display = 'none';
        icon.classList.remove('bi-caret-up');
        icon.classList.add('bi-caret-down');
    }
});