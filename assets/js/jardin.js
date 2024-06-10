const parcelleFull = document.querySelectorAll('.parcelle-full');

parcelleFull.forEach((element) => {
    const parentParcelleContainer = element.closest('.parcelle-container');

    if (parentParcelleContainer) {
        parentParcelleContainer.classList.add('full-unshow');
    }

    const show = document.getElementById('show');
    show.addEventListener('change', function() {
        if (this.checked) {
            parentParcelleContainer.classList.remove('full-unshow');
            parentParcelleContainer.classList.add('full-show');
        } else {
            parentParcelleContainer.classList.remove('full-show');
            parentParcelleContainer.classList.add('full-unshow');
        }
    });
});
