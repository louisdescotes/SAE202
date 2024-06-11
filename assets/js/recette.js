const openMenus = document.querySelectorAll('.open_menu');
const recetteMenus = document.querySelectorAll('.recette_menu');

openMenus.forEach((openMenu, index) => {
    openMenu.addEventListener('click', () => {
        recetteMenus[index].classList.toggle('active');
    });
});
