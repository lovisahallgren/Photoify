'use strict';

//Hamburger menu
const menuIcon = document.querySelector('.menu-icon');
const closeMenu = document.querySelector('.close-menu');
const hamburgerMenu = document.querySelector('.navbar-nav');

// toggling hamburger menu
menuIcon.addEventListener('click', () => {
    hamburgerMenu.classList.remove('hidden');
    closeMenu.classList.remove('hidden');
    menuIcon.classList.add('hidden');
});

closeMenu.addEventListener('click', () => {
    hamburgerMenu.classList.add('hidden');
    closeMenu.classList.add('hidden');
    menuIcon.classList.remove('hidden');
});
