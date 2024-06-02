// Exercice 1 -------------------------------------------------

// let button = document.querySelector("Button") //selection de la balise
// console.log(button);
// let p = document.querySelector("#monParagraphe"); // selection de l'id

// button.addEventListener("click", function(){
//     p.textContent = "hello, world";
// });


// Exercice 2-3-4----------------------------------------------

let button = document.querySelector("Button");
let paragraphe = document.querySelector("#monParagraphe");
let ul = document.querySelector("#ul1");


console.log(ul);

button.addEventListener("click", function () {
    paragraphe.style.color = "red";

    let nouvli1 = document.createElement("li");
    nouvli1.textContent = 'Nouvel Elément';
    ul.appendChild(nouvli1)
    console.log("texte ajouté");

    if (ul.children.length > 0) {
        ul.removeChild(ul.firstElementChild)
    }

});