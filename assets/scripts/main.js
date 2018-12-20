'use strict';

const hamburgerIcon = document.querySelector('.hamburger-nav');
const hamburgerMenu = document.querySelector('.navbar-nav');

hamburgerIcon.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('burger-nav-visible');
    // hamburgerMenu.classList.toggle('change-to-cross');
});
