function effects() {
    let form = document.querySelector('.banner__form');
    let input = document.querySelector('.banner__input');

    input.addEventListener("click", function() {
        form.classList.add('banner__input--focused');
    }, true);

    input.addEventListener("blur", function() {
        form.classList.remove('banner__input--focused');
    }, true);
}

window.onload = effects;