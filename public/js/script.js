// Sidebar Toggle for Mobile
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const ordersNav = document.getElementById('orders-nav');
const ordersTable = document.getElementById('orders-table');

if (menuToggle && sidebar && overlay) {
    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });
}

// Show Orders Table When "Orders" is Clicked
if (ordersNav) {
    ordersNav.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = ordersNav.querySelector('a').href;
    });
}

// Edit Modal Functions
function openEditModal(orderId, product, customerType, paymentType, quantity, dateTime, status) {
    const modal = document.getElementById('edit-modal');
    const form = document.getElementById('edit-order-form');

    form.action = `/orders/${orderId}`;

    document.getElementById('edit-order-id').value = orderId;

    const productMap = { 'Laptop': '1', 'Mouse': '2' };
    const customerTypeMap = { 'Regular': '1', 'Premium': '2' };
    const paymentTypeMap = { 'Credit Card': '1', 'Cash': '2' };

    document.getElementById('edit-product').value = productMap[product] || '';
    document.getElementById('edit-customer-type').value = customerTypeMap[customerType] || '';
    document.getElementById('edit-payment-type').value = paymentTypeMap[paymentType] || '';
    document.getElementById('edit-order-quantity').value = quantity;

    // Format the dateTime for datetime-local input (YYYY-MM-DDThh:mm)
    const date = new Date(dateTime);
    const formattedDateTime = date.toISOString().slice(0, 16);
    document.getElementById('edit-order-date-time').value = formattedDateTime;

    document.getElementById('edit-order-status').value = status;

    modal.style.display = 'block';
}

function closeEditModal() {
    const modal = document.getElementById('edit-modal');
    modal.style.display = 'none';
}

// Add New Order Modal Functions
function openAddModal() {
    const modal = document.getElementById('add-modal');
    document.getElementById('add-order-form').reset();
    modal.style.display = 'block';
}

function closeAddModal() {
    const modal = document.getElementById('add-modal');
    modal.style.display = 'none';
}

// Close Modals When Clicking Outside
window.addEventListener('click', (e) => {
    const editModal = document.getElementById('edit-modal');
    const addModal = document.getElementById('add-modal');
    if (e.target === editModal) {
        closeEditModal();
    }
    if (e.target === addModal) {
        closeAddModal();
    }
});

// User Dropdown Toggle
const userMenu = document.getElementById('user-menu');
const userDropdown = document.getElementById('user-dropdown');

if (userMenu && userDropdown) {
    userMenu.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.style.display = userDropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', (e) => {
        if (!userMenu.contains(e.target)) {
            userDropdown.style.display = 'none';
        }
    });
}

// Search Functionality
const searchBar = document.getElementById('search-bar');
if (searchBar) {
    searchBar.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const query = searchBar.value.trim();
            if (query) {
                window.location.href = `/orders?search=${encodeURIComponent(query)}`;
            }
        }
    });
}

// Language Selector
const languageSelect = document.getElementById('language-select');
if (languageSelect) {
    languageSelect.addEventListener('change', (e) => {
        const lang = e.target.value;
        window.location.href = `/set-language/${lang}`;
    });
}

// Notification Functionality (Simulated)
const notificationIcon = document.getElementById('notification-icon');
const notificationCount = document.getElementById('notification-count');
if (notificationIcon && notificationCount) {
    // Simulate fetching notification count (e.g., from an API)
    let count = 3; // Example: 3 unread notifications
    notificationCount.textContent = count;
    if (count === 0) {
        notificationCount.style.display = 'none';
    }

    notificationIcon.addEventListener('click', () => {
        alert('You have ' + count + ' unread notifications.');
        // In a real app, you would redirect to a notifications page or show a dropdown
    });
}

// Handle Form Submissions with AJAX
document.addEventListener('DOMContentLoaded', () => {
    const editForm = document.getElementById('edit-order-form');
    const addForm = document.getElementById('add-order-form');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (editForm) {
        editForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(editForm);
            fetch(editForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    window.location.reload();
                } else {
                    alert(data.error || 'Error updating order');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the order: ' + error.message);
            });
        });
    }

    if (addForm) {
        addForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(addForm);
            fetch(addForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    window.location.reload();
                } else {
                    alert(data.error || 'Error adding order');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the order: ' + error.message);
            });
        });
    }
});