'use strict';

const unliked = [...document.querySelectorAll('.unliked')];
const liked = [...document.querySelectorAll('.liked')];

unliked.forEach(unlike => {
    unlike.addEventListener('click', event => {
        const id = event.target.dataset.id;
        const liked = document.querySelector(`.liked[data-id="${id}"]`);
        console.log(liked);
        liked.classList.remove('hidden');
        unlike.classList.add('hidden');
    });
});

liked.forEach(like => {
    like.addEventListener('click', event => {
        const id = event.target.dataset.id;
        const unliked = document.querySelector(`.unliked[data-id="${id}"]`);
        console.log(liked);
        unliked.classList.remove('hidden');
        like.classList.add('hidden');
    });
});
