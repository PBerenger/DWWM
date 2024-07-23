// Ralentissement de rotating-image

const rotatingImage = document.querySelector('.rotating-image');
    let lastRotation = 0;

    rotatingImage.addEventListener('mouseenter', () => {
        rotatingImage.style.transition = 'none'; 
    });

    rotatingImage.addEventListener('mouseleave', () => {
        rotatingImage.style.transition = 'transform 5s ease-out';
        const computedStyle = window.getComputedStyle(rotatingImage);
        const transform = computedStyle.transform;
        const matrix = new DOMMatrix(transform);
        rotatingImage.style.transform = `rotate(${360}deg)`;
        rotatingImage.classList.add('stop-spin');
        setTimeout(() => {
            rotatingImage.style.transition = 'none';
            rotatingImage.style.transform = 'rotate(0deg)';
            setTimeout(() => {
                rotatingImage.classList.remove('stop-spin');
            }, 5000);
        }, 5000);
    });

//------------------------------------------------------------------------------------------------

// Erreur si personne sélectionné DELETE
function validateForm() {
    var checkboxes = document.querySelectorAll('#deleteForm input[type="checkbox"]');
    var checked = Array.from(checkboxes).some(checkbox => checkbox.checked);

    if (!checked) {
        alert('Veuillez sélectionner au moins un utilisateur.');
        return false; // Empêche l'envoi du formulaire
    }

    return confirm('Voulez-vous vraiment supprimer les utilisateurs sélectionnés ?');
}

// Désélectionner toutes les cases DELETE
function deselectAll() {
    // Sélectionner toutes les cases à cocher dans le formulaire
    const checkboxes = document.querySelectorAll('#deleteForm input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false; // Désélectionner chaque case à cocher
    });
}

//------------------------------------------------------------------------------------------------

// Condition PSW
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
document.getElementById('passwordSaisie').addEventListener('focus', function() {
    document.getElementById('mdpContainer').style.display = 'block';
});

document.getElementById('passwordSaisie').addEventListener('blur', function() {
    setTimeout(function() {
        document.getElementById('mdpContainer').style.display = 'none';
    }, 200);
});
function verifPassword() {
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


// Vérification des PSW avant soumission
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const password = document.querySelector('input[name="password"]');
    const confirmPassword = document.querySelector('input[name="confirm_password"]');
    
    form.addEventListener('submit', function (event) {
        if (password.value !== confirmPassword.value) {
            alert('Les mots de passe ne correspondent pas.');
            event.preventDefault();
        }
    });
});
