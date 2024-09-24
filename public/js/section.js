function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(function(section) {
        section.style.display = 'none';
    });
    // Show the selected section
    document.getElementById(sectionId).style.display = 'block';
}