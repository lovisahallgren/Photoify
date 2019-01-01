'use strict';

//Hamburger menu
const hamburgerIcon = document.querySelector('.hamburger-nav');
const hamburgerMenu = document.querySelector('.navbar-nav');

hamburgerIcon.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('burger-nav-visible');
    // hamburgerMenu.classList.toggle('change-to-cross');
});

// Images on profile
const smallPosts = document.querySelectorAll('.small-post');

smallPosts.forEach(smallPost => {
    smallPost.addEventListener('click', () => {
        smallPost.classList.add('big-post');
    });
});
