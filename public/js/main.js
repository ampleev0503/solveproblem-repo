function front() {
    dropdown();
    accordion();
}

function dropdown() {
    let userMenuToggle = document.querySelector('.dropdown-toggle');
    let userMenu = document.querySelector('.dropdown');
    let anyElement = document.querySelector('*');

    userMenuToggle.addEventListener("click", function() {
        userMenu.classList.add('dropdown__visible');
    }, true);

    anyElement.addEventListener("click", function() {
        userMenu.classList.remove('dropdown__visible');
    }, true);
}

function accordion() {
    let subsectionHeader = document.querySelectorAll('.subsection__header .subsection__left');
    let subsectionContent = document.querySelectorAll('.subsection__content');
    let arrow = document.querySelectorAll('.icon-down-open-mini');

    for (let i = 0; i < subsectionHeader.length; i++) {
        subsectionHeader[i].addEventListener("click", function() {
            subsectionContent[i].classList.toggle('subsection__content--visible');
            arrow[i].classList.toggle('icon-down-open-mini');
            arrow[i].classList.toggle('icon-up-open-mini');
        }, true);
    }
}

window.onload = front;