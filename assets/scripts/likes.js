'use strict';

const [...likeForms] = document.querySelectorAll('.like-form');
const [...likeButtons] = document.querySelectorAll('.like-button');

likeForms.forEach(likeForm => {
    likeForm.addEventListener('submit', event => {
        event.preventDefault();

        const formData = new FormData(likeForm);

        fetch('app/posts/likes.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(json => {
                let like = document.querySelector(
                    `.likes-post${likeForm[0].value}`
                );
                like.innerText = json;
                if (likeForm[1].value === 'like') {
                    likeForm[1].value = 'unlike';
                } else {
                    likeForm[1].value = 'like';
                }
            });
    });
});

likeButtons.forEach(likeButton => {
    likeButton.addEventListener('click', () => {
        let btnId = likeButton.dataset.id;
        let [...likeButtonHearts] = document.querySelectorAll(
            `.like-button-${btnId}`
        );
        likeButtonHearts.forEach(likeButtonHeart => {
            likeButtonHeart.classList.toggle('hidden');
        });
    });
});
