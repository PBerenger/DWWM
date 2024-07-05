let group_form = document.querySelector(".group-form");
let input = group_form.password;
let long = document.querySelector(".long");
let minusc = document.querySelector(".minusc");
let majusc = document.querySelector(".majusc");
let spec = document.querySelector(".spec");
let chiffre = document.querySelector(".chiffre");
let corresp = document.querySelector(".corresp");

console.log(long);


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
