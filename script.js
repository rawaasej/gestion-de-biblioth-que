const menuicon = document.querySelector('.menu-icon');
const sidebar = document.querySelector('#sidebar');

menuicon.addEventListener('click', togglesidebar);

function togglesidebar() {
    if (sidebar.classList.contains('sidebar-responsive')) {
        sidebar.classList.remove('sidebar-responsive');
        menuicon.querySelector('span').innerText =
            'keyboard_double_arrow_right';
    } else {
        sidebar.classList.add('sidebar-responsive');
        menuicon.querySelector('span').innerText = 'menu';
    }
}

