document.addEventListener('DOMContentLoaded', function() {
    const notification = document.getElementById('notification');
    if (notification) {
        // Show the notification
        notification.style.display = 'block';
        notification.style.opacity = 1;

        // Hide the notification after 2 seconds
        setTimeout(function() {
            notification.style.opacity = 0;
            setTimeout(function() {
                notification.style.display = 'none';
            }, 500); // Wait for opacity transition to finish
        }, 4000); // 4 seconds
    }
});
