'use strict';

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

        deleteForms.forEach(deleteForm => {
            deleteForm.classList.add('hidden');
        });

        postButtons.forEach(postButton => {
            postButton.classList.remove('hidden');
        });
        footer.classList.remove('hidden');
    });
}
