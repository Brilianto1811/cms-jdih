document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const submenuToggles = document.querySelectorAll('.submenu-toggle');
    const currentPath = window.location.pathname;

    const menuMapping = {
        '/berita/index.html': ['menu-berita', 'sidebar-berita'],
        '/infografis/index.html': ['menu-infografis', 'sidebar-infografis'],
        '/galeri/index.html': ['menu-galeri', 'sidebar-galeri'],
        '/agenda-akd/index.html': ['menu-agenda', 'sidebar-agenda'],
        '/dokumen/index.html': ['menu-dokumen', 'sidebar-dokumen'],
        '/kategori/index.html': ['menu-kategori', 'sidebar-kategori'],
        '/survey/index.html': ['menu-survey', 'sidebar-survey'],
        '/opini/index.html': ['menu-opini', 'sidebar-opini'],
        '/joke-receh/index.html': ['menu-joke', 'sidebar-joke'],
    };

    for (const [path, ids] of Object.entries(menuMapping)) {
        if (currentPath.includes(path)) {
            ids.forEach(id => {
                const menuItem = document.getElementById(id);
                if (menuItem) {
                    menuItem.classList.add('active');
                }
            });
        }
    }

    if (hamburger && sidebar) {
        hamburger.addEventListener('click', function () {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    if (closeSidebar && sidebar) {
        closeSidebar.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
        });
    }

    if (submenuToggles) {
        submenuToggles.forEach((toggle) => {
            toggle.addEventListener('click', function () {
                const submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle('hidden');
                    const icon = this.querySelector('.submenu-icon');
                    if (icon) {
                        icon.textContent = submenu.classList.contains('hidden') ? '▼' : '▲';
                    }
                }
            });
        });
    }
});
