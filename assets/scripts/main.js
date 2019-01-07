'use strict';

//Hamburger menu
const hamburgerIcon = document.querySelector('.hamburger-nav');
const hamburgerMenu = document.querySelector('.navbar-nav');

// toggling hamburger menu
hamburgerIcon.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('burger-nav-visible');
    // hamburgerMenu.classList.toggle('change-to-cross');
});

const smallPosts = [...document.querySelectorAll('.small-post')];
const editForms = [...document.querySelectorAll('.edit-form')];
const postButtons = [...document.querySelectorAll('.post-buttons')];
const editButtons = [...document.querySelectorAll('.edit-btn')];
// const hearts = document.querySelectorAll('.not-liked');
// const description = document.querySelectorAll('.description');

// function for closing big post and removing all added classes
//to start from new when opening post again

function exit() {
    const exit = document.querySelector('.exit');
    exit.classList.remove('hidden');
    exit.addEventListener('click', () => {
        smallPosts.forEach(smallPost => {
            smallPost.classList.remove('big-post');
        });
        exit.classList.add('hidden');

        editForms.forEach(editForm => {
            editForm.classList.add('hidden');
        });

        postButtons.forEach(postButton => {
            postButton.classList.remove('hidden');
        });
    });
}

// when clicking on a small post, make it bigger and show details about post
smallPosts.forEach(smallPost => {
    smallPost.addEventListener('click', () => {
        smallPost.classList.add('big-post');
        exit();
    });
});

// if user wants to edit post and clicks button edit form appears
editButtons.forEach(editButton => {
    editButton.addEventListener('click', event => {
        const id = event.target.dataset.id;
        const editForm = document.querySelector(`.edit-form[data-id="${id}"]`);
        const postButtons = document.querySelector(
            `.post-buttons[data-id="${id}"]`
        );
        editForm.classList.remove('hidden');
        postButtons.classList.add('hidden');

        const cancel = document.querySelector(`.cancel-btn[data-id="${id}"]`);
        cancel.addEventListener('click', () => {
            editForm.classList.add('hidden');
            postButtons.classList.remove('hidden');
        });
        exit();
    });
});

// hearts.forEach(heart => {
//     heart.addEventListener('click', () => {
//         heart.classList.add('hidden');
//         const liked = document.querySelectorAll('.liked');
//         liked.classList.remove('hidden');
//         liked.forEach(like => {
//             like.classList.remove('hidden');
//             like.addEventListener('click', () => {
//                 like.classList.add('hidden');
//                 heart.classList.remove('hidden');
//             });
//         });
//     });
// });
