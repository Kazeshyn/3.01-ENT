const sideButton = document.querySelector('#sidebar');
const navSide = document.querySelector('#menuside');
const sideContent = document.querySelector('#infoside');
const generateElements = document.querySelectorAll('#generateElement');

sideButton.addEventListener('click', function () {
    navSide.classList.toggle('openedside');
    sideContent.classList.toggle('infosideon');
    sideButton.classList.toggle('openedsidebutton');

    // Itérer sur tous les éléments de generateElements
    generateElements.forEach(element => {
        element.classList.toggle('sideelementon');
    });
});