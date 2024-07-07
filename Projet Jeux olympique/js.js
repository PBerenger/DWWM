let group_form = document.querySelector(".group-form");
let input = group_form.password;
let long = document.querySelector(".long");
let minusc = document.querySelector(".minusc");
let majusc = document.querySelector(".majusc");
let spec = document.querySelector(".spec");
let chiffre = document.querySelector(".chiffre");
let corresp = document.querySelector(".corresp");

// afficher information du mot de passe 
document.addEventListener("DOMContentLoaded", function() {
    const passwordField = document.getElementById("passwordField");
    const validator = document.getElementById("validator");

    passwordField.addEventListener("mouseover", function() {
        validator.style.display = "block";
    });

    passwordField.addEventListener("mouseout", function() {
        validator.style.display = "none";
    });

    // Optionnel : Pour positionner le validator près du champ de mot de passe
    passwordField.addEventListener("mousemove", function(event) {
        validator.style.top = (event.clientY + 10) + 'px';
        validator.style.left = (event.clientX + 10) + 'px';
    });
});

// form inscription_passwordCondition
document.getElementById('showConditionsButton').addEventListener('click', function() {
    var conditions = document.getElementById('passwordConditions');
    if (conditions.style.display === 'block') {
        conditions.style.display = 'none';
    } else {
        conditions.style.display = 'block';
    }
});

// annimations des boutons
document.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionne tous les liens dans le div#connectionContent
    const links = document.querySelectorAll('#connectionContent a');

    links.forEach(link => {
        // Ajoute l'événement mouseover pour changer la couleur au survol
        link.addEventListener('mouseover', function() {
            this.style.backgroundColor = 'lightblue';
            this.style.color = 'white';
        });

        // Ajoute l'événement mouseout pour réinitialiser la couleur après le survol
        link.addEventListener('mouseout', function() {
            this.style.backgroundColor = '';
            this.style.color = 'black';
        });

        // Ajoute l'événement mousedown pour changer la couleur au clic
        link.addEventListener('mousedown', function() {
            this.style.backgroundColor = 'darkblue';
            this.style.color = 'white';
        });

        // Ajoute l'événement mouseup pour réinitialiser la couleur après le clic
        link.addEventListener('mouseup', function() {
            this.style.backgroundColor = 'lightblue';
            this.style.color = 'white';
        });
    });
});
