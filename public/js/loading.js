document.addEventListener('DOMContentLoaded', function() {
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    // Show the loading overlay
    loadingOverlay.classList.remove('hidden');
    
    // Hide the loading overlay after 3 seconds
    setTimeout(function() {
        loadingOverlay.classList.add('hidden');
    }, 1000); // 3000 milliseconds = 3 seconds
});