document.addEventListener('DOMContentLoaded', () => {
    const notificationButton = document.getElementById('notification-button');
    const notificationDropdown = document.getElementById('notification-dropdown');

    if (notificationButton && notificationDropdown) {
        notificationButton.addEventListener('click', () => {
            notificationDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!notificationDropdown.contains(event.target) && !notificationButton.contains(event.target)) {
                notificationDropdown.classList.add('hidden');
            }
        });

        notificationButton.addEventListener('click', () => {
            fetch('/notifications/read', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                }
            }).then(response => {
                if (response.ok) {
                    const badge = notificationButton.querySelector('span');
                    if (badge) badge.remove();
                }
            });
        });
    }
});
