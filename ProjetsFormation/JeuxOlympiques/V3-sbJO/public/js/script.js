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
document.addEventListener("DOMContentLoaded", function() {
    let passwordInput = document.getElementById("passwordSaisie");
    let mdpContainer = document.getElementById("mdpContainer");

    passwordInput.addEventListener("focus", function() {
        mdpContainer.classList.add("visible");
        verifPassword();
    });
    
    passwordInput.addEventListener("blur", function() {
        // Ajoute un délai pour que le conteneur reste visible
        // un petit moment après avoir quitté le champ de saisie.
        setTimeout(function() {
            mdpContainer.classList.remove("visible");
        }, 200);
    });

    passwordInput.addEventListener("input", verifPassword);

    function verifPassword(){
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
    const passwordInput = document.querySelector('input[name="password"]'); // Cibler le bon champ de mot de passe

    togglePassword.addEventListener('click', () => {
        // Vérifier le type actuel du champ de mot de passe
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Mettre à jour l'image de l'icône
        const img = togglePassword.querySelector('img');
        if (type === 'password') {
            img.src = '../public/images/all/eyesOpen.png';
        } else {
            img.src = '../public/images/all/eyesClose.png';
        }
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


// Tableau des scores

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchCount = 0;
    table = document.getElementById("scoreTable");
    switching = true;
    // Initial direction is ascending
    dir = "asc"; 

    // Loop until no switching is needed
    while (switching) {
        // Start by saying: no switching is done
        switching = false;
        rows = table.getElementsByTagName("TR");
        
        // Loop through all table rows (except the first, which is the header)
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            
            // Determine if we should switch the rows
            if (dir === "asc") {
                if (n === 1) { // If the column is "Score" (numeric)
                    if (Number(x.innerHTML) < Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else { // If the column is "Name" (text)
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            } else if (dir === "desc") {
                if (n === 1) { // If the column is "Score" (numeric)
                    if (Number(x.innerHTML) > Number(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                } else { // If the column is "Name" (text)
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }

        if (shouldSwitch) {
            // Perform the switch
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchCount++;
        } else {
            // If no switching has been done and direction is "asc", set direction to "desc" and run the loop again
            if (switchCount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
