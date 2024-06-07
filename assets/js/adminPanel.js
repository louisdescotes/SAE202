const setView = (view) => {
    const views = document.querySelectorAll('.view');
    const buttons = document.querySelectorAll('.view-button');
    
    views.forEach((v) => {
        v.style.display = 'none';
    });
    
    document.querySelector(`.view.${view}`).style.display = 'block';
    
    buttons.forEach((button) => {
        if (button.dataset.view === view) {
            button.classList.add('button-primary');
            button.classList.remove('button-secondary');
        } else {
            button.classList.add('button-secondary');
            button.classList.remove('button-primary');
        }
    });
};

setView('Users');
