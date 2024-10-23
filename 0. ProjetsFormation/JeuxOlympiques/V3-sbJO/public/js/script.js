// Ralentissement de rotating-image

const rotatingImage = document.querySelector('.rotating-image');
let lastRotation = 0;

rotatingImage.addEventListener('mouseenter', () => {
    rotatingImage.style.transition = 'none';
});

rotatingImage.addEventListener('mouseleave', () => {
    rotatingImage.style.transition = 'transform 0s ease-out';
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




// Afficher contenu
document.getElementById('passwordSaisie').addEventListener('focus', function () {
    document.getElementById('mdpContainer').style.display = 'block';
});

document.getElementById('passwordSaisie').addEventListener('blur', function () {
    setTimeout(function () {
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

// Sélectionner par colonnes athlètes
function sortTable(columnIndex) {
    var table = document.getElementById("athletesTable");
    var rows = table.rows;
    var switching = true;
    var shouldSwitch, i;
    var dir = "asc";
    var switchcount = 0;

    while (switching) {
        switching = false;
        var rowsArray = Array.from(rows).slice(1);

        for (i = 0; i < (rowsArray.length - 1); i++) {
            shouldSwitch = false;
            var x = rowsArray[i].getElementsByTagName("TD")[columnIndex];
            var y = rowsArray[i + 1].getElementsByTagName("TD")[columnIndex];

            if (dir === "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

// 'type search'' tableau athletes
function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toLowerCase();
    table = document.getElementById('athletesTable');
    tr = table.getElementsByTagName('tr');

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        td = tr[i].getElementsByTagName('td')[0, 1]; // We are filtering by the first column (Nom)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}

// Select pays
function sortByCountry() {
    var select, filter, table, tr, td, i;
    select = document.getElementById('countrySelect');
    filter = select.value;
    table = document.getElementById('athletesTable');
    tr = table.getElementsByTagName('tr');

    // Loop through all table rows, and show/hide based on selected country
    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        td = tr[i].getElementsByTagName('td')[4]; // We are sorting by the fifth column (Pays)
        if (td) {
            if (filter === "" || td.textContent === filter) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}