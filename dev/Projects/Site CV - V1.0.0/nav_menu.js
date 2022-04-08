let menu = document.querySelector("#menu-nav");
let buttonMenu = document.querySelector("#btn-menu");
let grpMenu = document.querySelector("#grp-btn-menu");
let textMenu = document.querySelector("#btn-text-menu");

let isMenuOpen;

function initMenu() {
    buttonMenu.style.display = 'flex';
    grpMenu.style.display = 'flex';
    closeMenu();
}
function closeMenu() {
    menu.style.display = 'none';
    textMenu.innerText = 'Menu';
    isMenuOpen = false;
}

function openMenu() {
    menu.style.display = 'flex';
    textMenu.innerText = 'Fermer';
    isMenuOpen = true;
}

function toggleMenu() {
    if (isMenuOpen) {
        closeMenu();
    }
    else {
        openMenu();
    }
}

initMenu();