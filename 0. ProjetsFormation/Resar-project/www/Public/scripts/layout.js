console.log("layout.js chargé !");

document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const darkModeToggle = document.getElementById("dark-mode-toggle");
    const openRegister = document.querySelector(".open-register");
    const closeRegister = document.getElementById("close-register");
    const registerMenu = document.getElementById("register-menu");

    // Mode sombre
    if (darkModeToggle) {
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            darkModeToggle.textContent = "🌙";
        }

        darkModeToggle.addEventListener("click", () => {
            body.classList.toggle('dark-mode');

            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                darkModeToggle.textContent = "🌙";
            } else {
                localStorage.removeItem('darkMode');
                darkModeToggle.textContent = "☀️";
            }
        });
    }

    // Menu latéral
    if (openRegister && registerMenu) {
        openRegister.addEventListener("click", () => {
            registerMenu.classList.add("active");
        });
    }    

    if (closeRegister && registerMenu) {
        closeRegister.addEventListener("click", () => {
            registerMenu.classList.remove("active");
        });
    }
});

// // Barre de force
// document.addEventListener("DOMContentLoaded", function () {
//     const passwordInput = document.getElementById("password");
//     const strengthBar = document.getElementById("strength-bar");
//     const strengthText = document.getElementById("strength-text");
//     const registerBtn = document.getElementById("register-btn");

//     passwordInput.addEventListener("input", function () {
//         let password = passwordInput.value;
//         let strength = checkPasswordStrength(password);

//         strengthBar.style.width = strength.percentage;
//         strengthBar.style.background = strength.color;
//         strengthText.textContent = strength.label;

//         // Activer/désactiver le bouton d'inscription
//         registerBtn.disabled = (strength.label === "Faible");
//     });

//     function checkPasswordStrength(password) {
//         let strength = 0;

//         if (password.length >= 6) strength++;
//         if (password.match(/[A-Z]/)) strength++;
//         if (password.match(/[0-9]/)) strength++;
//         if (password.match(/[\W]/)) strength++;

//         if (strength === 0) {
//             return { label: "Faible", percentage: "10%", color: "red" };
//         } else if (strength <= 2) {
//             return { label: "Moyen", percentage: "50%", color: "orange" };
//         } else {
//             return { label: "Fort", percentage: "100%", color: "green" };
//         }
//     }
// });


