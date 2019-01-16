'use strict';

const smallPosts = [...document.querySelectorAll('.small-post')];
const footer = document.querySelector('footer');
const editForms = [...document.querySelectorAll('.edit-form')];
const deleteForms = [...document.querySelectorAll('.delete-form')];
const postButtons = [...document.querySelectorAll('.post-buttons')];
const editButtons = [...document.querySelectorAll('.edit-post-btn')];
const deleteButtons = [...document.querySelectorAll('.delete-post-btn')];
const uploadPosts = [...document.querySelectorAll('.upload-post')];
const deleteAccountButtons = [
    ...document.querySelectorAll('.delete-account-btn'),
];

// when clicking on a small post, make it bigger and show details about post
smallPosts.forEach(smallPost => {
    smallPost.addEventListener('click', () => {
        smallPost.classList.add('big-post');
        footer.classList.add('hidden');
        exit();
    });
});

// if user wants to edit post and clicks button, edit form appears
editButtons.forEach(editButton => {
    editButton.addEventListener('click', event => {
        const id = event.target.dataset.id;
        const editForm = document.querySelector(`.edit-form[data-id="${id}"]`);
        const postButtons = document.querySelector(
            `.post-buttons[data-id="${id}"]`
        );
        editForm.classList.remove('hidden');
        postButtons.classList.add('hidden');

        const cancel = document.querySelector(
            `.cancel-edit-btn[data-id="${id}"]`
        );
        cancel.addEventListener('click', () => {
            editForm.classList.add('hidden');
            postButtons.classList.remove('hidden');
        });
        exit();
    });
});

//if user wants to delete post and clicks button, popup appears to confirm action
deleteButtons.forEach(deleteButton => {
    deleteButton.addEventListener('click', event => {
        const id = event.target.dataset.id;
        const deleteForm = document.querySelector(
            `.delete-form[data-id="${id}"]`
        );
        const postButtons = document.querySelector(
            `.post-buttons[data-id="${id}"]`
        );
        deleteForm.classList.remove('hidden');
        postButtons.classList.add('hidden');

        const cancel = document.querySelector(
            `.cancel-delete-btn[data-id="${id}"]`
        );
        cancel.addEventListener('click', () => {
            deleteForm.classList.add('hidden');
            postButtons.classList.remove('hidden');
        });
        exit();
    });
});

//if user wants to delete account and clicks button, popup appears to confirm action
deleteAccountButtons.forEach(deleteAccount => {
    deleteAccount.addEventListener('click', () => {
        const deleteAccountForm = document.querySelector(
            '.confirm-delete-account'
        );
        deleteAccountForm.classList.remove('hidden');
        deleteAccount.classList.add('hidden');

        const cancel = document.querySelector('.cancel-delete-btn');

        cancel.addEventListener('click', () => {
            deleteAccountForm.classList.add('hidden');
            deleteAccount.classList.remove('hidden');
        });
    });
});
