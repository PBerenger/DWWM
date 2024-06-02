const rectangle = document.querySelector(".rectangle")
const button = document.querySelector("#button")
const suiveur = document.querySelector("#suiveur")


button.addEventListener('click', () => {
    suiveur.style.display = "block";
});

rectangle.addEventListener('mousemove', (event) => {
    suiveur.style.left = event.clientX + 'px';
    suiveur.style.top = event.clientY + 'px';

});





