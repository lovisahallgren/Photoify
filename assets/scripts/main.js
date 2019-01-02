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
const description = document.querySelectorAll('.description');
const editButtons = document.querySelectorAll('.edit-btn');
const hearts = document.querySelectorAll('.not-liked');

smallPosts.forEach(smallPost => {
    smallPost.addEventListener('click', () => {
        smallPost.classList.add('big-post');
        const exits = document.querySelector('.exit');
        exits.classList.remove('hidden');
        exits.addEventListener('click', () => {
            smallPost.classList.remove('big-post');
            exits.classList.add('hidden');
        });
    });
});

hearts.forEach(heart => {
    heart.addEventListener('click', () => {
        heart.classList.add('hidden');
        const liked = document.querySelectorAll('.liked');
        liked.forEach(like => {
            like.classList.remove('hidden');
            like.addEventListener('click', () => {
                like.classList.add('hidden');
                heart.classList.remove('hidden');
            });
        });
    });
});

editButtons.forEach(editButton => {
    editButton.addEventListener('click', () => {
        const editForms = document.querySelectorAll('.edit-form');
        editForms.forEach(editForm => {
            editForm.classList.add('edit-form-visible');
            const hideBtns = document.querySelectorAll('.post-buttons');
            hideBtns.forEach(hideBtn => {
                hideBtn.classList.add('hidden');
            });
            const cancelBtns = document.querySelectorAll('.cancel-btn');
            cancelBtns.forEach(cancelBtn => {
                cancelBtn.addEventListener('click', () => {
                    editForm.classList.remove('edit-form-visible');
                    const hideBtns = document.querySelectorAll('.post-buttons');
                    hideBtns.forEach(hideBtn => {
                        hideBtn.classList.remove('hidden');
                    });
                });
            });
        });
    });
});
