function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const body = document.body;
    if (sidebar.style.right === '0px') {
        sidebar.style.display = 'none';
        sidebar.style.right = '-100%';
        body.classList.remove('sidebar-open');
    } else {
        sidebar.style.right = '0px';
        sidebar.style.display = 'block';
        body.classList.add('sidebar-open');
    }
}

function fechar() {
    sidebar.style.right = '-100%';
    sidebar.style.display = 'none';
}