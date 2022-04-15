let menu = document.querySelector("#menu-nav");
let buttonMenu = document.querySelector("#btn-menu");
let grpBtnMenu = document.querySelector("#grp-btn-menu");
let textMenu = document.querySelector("#btn-text-menu");
let iconMenu = document.querySelector("#icon-menu");
let header = document.querySelector("header");
const maxWidthHideMenu = 600;

let isMenuOpen;

function redimensionnement() {
    if("matchMedia" in window) {
      if(window.matchMedia("(min-width:"+ maxWidthHideMenu +"px)").matches) {
        grpBtnMenu.style.display = 'none';
        menu.style.display = 'flex';
      } else {
        grpBtnMenu.style.display = 'block';
        closeMenu();
      }
      setAnchor();
    }
  }


function initMenu() {
    buttonMenu.style.display = 'flex';
    grpBtnMenu.style.display = 'flex';
    window.addEventListener('resize', redimensionnement, false);

    redimensionnement();
    setAnchor();
}

function closeMenu() {
    menu.style.display = 'none';
    textMenu.innerText = 'Ouvrir le menu';
    iconMenu.src = 'img/open-menu.svg';
    grpBtnMenu.style.marginBottom = "0px";

    setAnchor();

    isMenuOpen = false;
}

function openMenu() {
    menu.style.display = 'flex';
    textMenu.innerText = 'Fermer le menu';
    iconMenu.src = 'img/close-menu.svg';
    grpBtnMenu.style.marginBottom = "21px";

    setAnchor();

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

function setAnchor() {
    let anchors = document.getElementsByClassName("goto");
    for (let anchor of anchors) {
        anchor.style.marginTop = "-" + header.offsetHeight + "px";
        anchor.style.position = "absolute"; 
    }   
}
initMenu();