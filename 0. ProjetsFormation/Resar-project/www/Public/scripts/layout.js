const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

// Attendre que le DOM soit complètement chargé
document.addEventListener('DOMContentLoaded', () => {
    // Vérifier si le mode sombre est déjà activé dans le localStorage
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
    }

    // Ajouter l'événement pour basculer entre les modes clair/sombre
    darkModeToggle.addEventListener('click', () => {
        // Toggle de la classe 'dark-mode' sur le body
        body.classList.toggle('dark-mode');

        // Sauvegarder l'état dans le localStorage pour conserver le mode entre les sessions
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.removeItem('darkMode');
        }
    });
});

//---------------------------------------------------------------------------

const button = document.getElementById("dark-mode-toggle");

button.addEventListener("click", () => {
    // Vérifie si l'icône actuelle est la lune
    if (button.textContent === "☀️") {
        button.textContent = "🌙"; // Change pour le soleil
    } else {
        button.textContent = "☀️"; // Sinon, remets la lune
    }
});