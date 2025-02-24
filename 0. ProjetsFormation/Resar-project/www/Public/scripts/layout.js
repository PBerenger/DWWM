// dark mode

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

