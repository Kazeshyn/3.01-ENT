const burgerMenu = document.querySelector('#button');
const navList = document.querySelector('#menu');

burgerMenu.addEventListener('click', function () {
    navList.classList.toggle('menuon');
});