document.addEventListener('DOMContentLoaded', function () {
    const bouttonMenu = document.querySelector('#menuResto');
    const modal = document.querySelector('.modal');

    bouttonMenu.addEventListener('click', function () {
        modal.classList.toggle('modalOn');
    });
});