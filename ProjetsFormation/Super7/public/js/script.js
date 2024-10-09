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
document.addEventListener("DOMContentLoaded", function () {
    let passwordInput = document.getElementById("passwordSaisie");
    let mdpContainer = document.getElementById("mdpContainer");
    let timeoutId;
    
    passwordInput.addEventListener("blur", function () {
        timeoutId = setTimeout(function () {
            mdpContainer.classList.remove("visible");
        }, 200);
    });
    
    passwordInput.addEventListener("focus", function () {
        clearTimeout(timeoutId);
        mdpContainer.classList.add("visible");
        verifPassword();
    });
    
    
    passwordInput.addEventListener("input", verifPassword);
    
    function verifPassword() {
        let password = passwordInput.value;
        
        let regexMajuscule = /[A-Z]/;
        let regexMinuscule = /[a-z]/;
        let regexNombre = /[0-9]/;
        let regexSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/;
        
        let longueurMDP = document.getElementById("longueurMDP");
        let majusculeMDP = document.getElementById("majuscule");
        let minusculeMDP = document.getElementById("minuscule");
        let nombreMDP = document.getElementById("nombre");
        let specialCharMDP = document.getElementById("specialChar");
        
        longueurMDP.className = password.length >= 8 ? "valid" : "invalid";
        majusculeMDP.className = regexMajuscule.test(password) ? "valid" : "invalid";
        minusculeMDP.className = regexMinuscule.test(password) ? "valid" : "invalid";
        nombreMDP.className = regexNombre.test(password) ? "valid" : "invalid";
        specialCharMDP.className = regexSpecialChar.test(password) ? "valid" : "invalid";
    }
});

// Afficher le mot de passe
document.addEventListener('DOMContentLoaded', (event) => {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.querySelector('input[name="password"]'); // Cibler le bon champ de mot de passe
    
    togglePassword.addEventListener('click', () => {
        // Vérifier le type actuel du champ de mot de passe
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Mettre à jour l'image de l'icône
        const img = togglePassword.querySelector('img');
        if (type === 'password') {
            img.src = '../public/img/eyesSee.png';
            console
        } else {
            img.src = '../public/img/eyesNotSee.png';
        }
    });
});


// Vérification des Password avant soumission
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


//------------------------------------------------------------------------------------------------
// Button upload img

const fileUpload = document.getElementById('file-upload');
const fileName = document.getElementById('file-name');

fileUpload.addEventListener('change', function () {
    fileName.textContent = this.files[0].name; // Affiche le nom du fichier sélectionné
});


//------------------------------------------------------------------------------------------------
// Afficher les informations

// Masquer toutes les sections
function showResult(section) {
    // Masquer toutes les sections
    const sections = document.querySelectorAll('.resAll');
    sections.forEach((sec) => {
        sec.style.display = 'none';
    });
    
    // Afficher la section sélectionnée
    const selectedSection = document.querySelector('.' + section);
    if (selectedSection) {
        selectedSection.style.display = 'block';
    }
}


//------------------------------------------------------------------------------------------------
// redimentionner titre
function resizeTitle() {
    const title = document.querySelector('.titreInfos');
    title.style.fontSize = '2em';
    const para = document.querySelector('.selectInfos');
    para.style.marginBottom = '50px';
}

// Confirmation pour refaire le questionnaire
function confirmRefaireQuestionnaire() {
    return confirm("Êtes-vous sûr de vouloir refaire le questionnaire ?\nToutes vos réponses précédentes seront effacées.");
}
