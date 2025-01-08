function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}

document.getElementById('dropdown-button').addEventListener('click', function () {
    const menu = document.getElementById('dropdown-menu');
    const expanded = this.getAttribute('aria-expanded') === 'true';
    menu.classList.toggle('hidden');
    this.setAttribute('aria-expanded', !expanded);
});

document.getElementById('dropdown-nav').addEventListener('click', function () {
    const menu = document.getElementById('dropdown-menu1');
    const expanded = this.getAttribute('aria-expanded') === 'true';
    menu.classList.toggle('hidden');
    this.setAttribute('aria-expanded', !expanded);
});


function toggleSidebar() {
    const sidebar = document.getElementById('filter-sidebar');
    sidebar.classList.toggle('hidden');
}


function toggleDropdown(category) {
    const dropdown = document.getElementById(`${category}-dropdown`);
    const arrow = document.getElementById(`${category}-arrow`);
    dropdown.classList.toggle('hidden');
    arrow.textContent = dropdown.classList.contains('hidden') ? '▼' : '▲';
}

document.getElementById('description-tab').addEventListener('click', () => {
    document.getElementById('description-content').classList.remove('hidden');
    document.getElementById('reviews-content').classList.add('hidden');
});

document.getElementById('reviews-tab').addEventListener('click', () => {
    document.getElementById('description-content').classList.add('hidden');
    document.getElementById('reviews-content').classList.remove('hidden');
});


function openEditModal(id) {
    console.log(`Opening modal for product ID: ${id}`); // Debugging log
    $('#editModal').removeClass('hidden');

    // Fetch product details using AJAX
    $.get(`/admin/editproduct/${id}`, function (product) {
        console.log("Product fetched:", product); // Debugging log
        $('#editProductForm').attr('action', `/admin/updateproduct/${id}`);
        $('#editName').val(product.name);
        $('#editCategory').val(product.category);
        $('#editPrice').val(product.price);
        $('#editStock').val(product.stock);
    }).fail(function () {
        alert('Failed to fetch product details!');
    });

    $('#editModal').on('click', function (e) {
        console.log('Background clicked', e.target.id); // Debugging
        if (e.target.id === 'editModal') {
            $(this).addClass('hidden');
        }
    });
    
    $('#closeModalButton').on('click', function () {
        console.log('Close button clicked'); // Debugging
        $('#editModal').addClass('hidden');
    });
    
}

document.addEventListener('DOMContentLoaded', () => {
    // Dropdown Menu Logic
    const dropdownNav = document.getElementById('dropdown-nav');
    const dropdownMenu = document.getElementById('dropdown-menu1');

    if (dropdownNav && dropdownMenu) {
        dropdownNav.addEventListener('click', () => {
            const isExpanded = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', !isExpanded);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!dropdownNav.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    }

    // Mobile Menu Logic
    const toggleMobileMenu = () => {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
        }
    };

    const mobileMenuButton = document.querySelector('.md\\:hidden button');
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', toggleMobileMenu);
    }
});




