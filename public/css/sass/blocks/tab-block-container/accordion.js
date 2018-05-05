function accordion() {
    let subsectionHeader = document.querySelectorAll('.subsection__header');
    let subsectionContent = document.querySelectorAll('.subsection__content');
    let arrow = document.querySelectorAll('.icon-down-open-mini');
    console.log(arrow[1]);
    console.log(subsectionHeader);

    for (let i = 0; i < subsectionHeader.length; i++) {
        subsectionHeader[i].addEventListener("click", function() {
            subsectionContent[i].classList.toggle('subsection__content--visible');
            arrow[i].classList.toggle('icon-down-open-mini');
            arrow[i].classList.toggle('icon-up-open-mini');
        }, true);
    }
}

window.onload = accordion;