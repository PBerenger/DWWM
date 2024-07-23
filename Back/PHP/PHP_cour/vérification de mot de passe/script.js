
function verifPassword(){
    let password = document.getElementById("passwordSaisie").value;

    let regexMajuscule = /[A-Z]/;
    let regexMinuscule = /[a-z]/;
    let regexNombre = /[0-9]/;
    let regexSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;

    let longueurMDP = document.getElementById("longueurMDP");
    let majusculeMDP = document.getElementById("majuscule");
    let minusculeMDP = document.getElementById("minuscule");
    let nombreMDP = document.getElementById("nombre");
    let specialCharMDP = document.getElementById("specialChar");

    longueurMDP.className = password.length >=8 ? "valid" : "invalid";
    majusculeMDP.className = regexMajuscule.test(password) ? "valid" : "invalid";
    minusculeMDP.className = regexMinuscule.test(password) ? "valid" : "invalid";
    nombreMDP.className = regexNombre.test(password) ? "valid" : "invalid";
    specialCharMDP.className = regexSpecialChar.test(password) ? "valid" : "invalid";

}

// Afficher contenu
// JavaScript to show/hide the mdpContainer
document.getElementById('passwordSaisie').addEventListener('focus', function() {
    document.getElementById('mdpContainer').style.display = 'block';
});

document.getElementById('passwordSaisie').addEventListener('blur', function() {
    // Use a timeout to allow for click events on the mdpContainer itself
    setTimeout(function() {
        document.getElementById('mdpContainer').style.display = 'none';
    }, 200);
});

// Example verifPassword function (you can expand this as needed)
function verifPassword() {
    // Your password verification logic here
}

// Afficher le mot de passe
document.addEventListener('DOMContentLoaded', (event) => {
    const togglePassword = document.getElementById('togglePassword');
    const passwordSaisie = document.getElementById('passwordSaisie');

    togglePassword.addEventListener('click', () => {
        const type = passwordSaisie.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordSaisie.setAttribute('type', type);
        
        togglePassword.querySelector('img').src = type === 'password' ? 'eyesOpen.png' : 'eyesClose.png';
    });
});

