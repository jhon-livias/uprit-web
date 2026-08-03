/**
 * Menú móvil UPRIT — independiente de app.js para garantizar funcionamiento
 * en todas las páginas aunque falle la inicialización del theme.
 */
(function () {
    'use strict';

    function initMobileMenu() {
        var menu = document.querySelector('.popup-mobile-menu');
        var openBtn = document.querySelector('.hamberger-button');
        var closeBtn = menu ? menu.querySelector('.close-button') : null;

        if (!menu || !openBtn) {
            return;
        }

        // Evita doble toggle si app.js también enlazó el botón
        var freshOpenBtn = openBtn.cloneNode(true);
        openBtn.parentNode.replaceChild(freshOpenBtn, openBtn);
        openBtn = freshOpenBtn;

        if (closeBtn) {
            var freshCloseBtn = closeBtn.cloneNode(true);
            closeBtn.parentNode.replaceChild(freshCloseBtn, closeBtn);
            closeBtn = freshCloseBtn;
        }

        var dropdownLinks = menu.querySelectorAll('.mainmenu .has-droupdown > a');

        function setSubmenuState(link, open) {
            var submenu = link.parentElement.querySelector(':scope > .submenu');

            link.classList.toggle('open', open);

            if (submenu) {
                submenu.style.display = open ? 'block' : 'none';
            }
        }

        function resetSubmenus() {
            menu.querySelectorAll('.has-droupdown > a.open').forEach(function (link) {
                setSubmenuState(link, false);
            });
        }

        function openMenu() {
            menu.classList.add('active');
            document.body.classList.add('mobile-menu-open');
            menu.setAttribute('aria-hidden', 'false');
            openBtn.setAttribute('aria-expanded', 'true');
        }

        function closeMenu() {
            menu.classList.remove('active');
            document.body.classList.remove('mobile-menu-open');
            menu.setAttribute('aria-hidden', 'true');
            openBtn.setAttribute('aria-expanded', 'false');
            resetSubmenus();
        }

        openBtn.setAttribute('aria-expanded', 'false');
        openBtn.setAttribute('aria-controls', 'mobile-navigation');

        openBtn.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (menu.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', function (event) {
                event.preventDefault();
                closeMenu();
            });
        }

        menu.addEventListener('click', function (event) {
            if (event.target === menu) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && menu.classList.contains('active')) {
                closeMenu();
            }
        });

        dropdownLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                var submenu = link.parentElement.querySelector(':scope > .submenu');

                if (!submenu) {
                    return;
                }

                event.preventDefault();
                event.stopImmediatePropagation();

                var isOpen = link.classList.contains('open');
                var parentList = link.parentElement.parentElement;

                if (parentList) {
                    parentList.querySelectorAll(':scope > .has-droupdown > a.open').forEach(function (siblingLink) {
                        if (siblingLink !== link) {
                            setSubmenuState(siblingLink, false);
                        }
                    });
                }

                setSubmenuState(link, !isOpen);
            }, true);
        });

        menu.querySelectorAll('.mainmenu a[href]:not([href="#"])').forEach(function (link) {
            link.addEventListener('click', function () {
                closeMenu();
            });
        });

        document.addEventListener('click', function (event) {
            var trigger = event.target.closest('[data-postula-trigger]');

            if (!trigger || !menu.contains(trigger) || !menu.classList.contains('active')) {
                return;
            }

            closeMenu();
        }, true);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileMenu);
    } else {
        initMobileMenu();
    }
})();
