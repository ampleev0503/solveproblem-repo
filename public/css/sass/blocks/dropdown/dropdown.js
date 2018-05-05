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

window.onload = dropdown;