function dropdown() {
    let userMenuToggle = document.querySelector('.dropdown-toggle');
    let userMenu = document.querySelector('.dropdown');

    userMenuToggle.addEventListener("click", function() {
        console.log(userMenuToggle);
        userMenu.classList.toggle('dropdown__visible');
    }, true);
}

window.onload = dropdown;