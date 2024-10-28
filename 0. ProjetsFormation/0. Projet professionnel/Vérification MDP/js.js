function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strengthMessage = document.getElementById('strengthMessage');
    const progressBar = document.getElementById('progressBar');
    
    const lengthCondition = document.getElementById('length');
    const uppercaseCondition = document.getElementById('uppercase');
    const lowercaseCondition = document.getElementById('lowercase');
    const numberCondition = document.getElementById('number');
    const specialCondition = document.getElementById('special');

    let strength = 0;

    // Vérification des conditions
    if (password.length >= 8) {
        strength++;
        lengthCondition.classList.replace('invalid', 'valid');
    } else {
        lengthCondition.classList.replace('valid', 'invalid');
    }

    if (/[A-Z]/.test(password)) {
        strength++;
        uppercaseCondition.classList.replace('invalid', 'valid');
    } else {
        uppercaseCondition.classList.replace('valid', 'invalid');
    }

    if (/[a-z]/.test(password)) {
        strength++;
        lowercaseCondition.classList.replace('invalid', 'valid');
    } else {
        lowercaseCondition.classList.replace('valid', 'invalid');
    }

    if (/[0-9]/.test(password)) {
        strength++;
        numberCondition.classList.replace('invalid', 'valid');
    } else {
        numberCondition.classList.replace('valid', 'invalid');
    }

    if (/[\W_]/.test(password)) {
        strength++;
        specialCondition.classList.replace('invalid', 'valid');
    } else {
        specialCondition.classList.replace('valid', 'invalid');
    }

    // Mise à jour de la barre de progression
    const progress = (strength / 5) * 100;
    progressBar.style.width = progress + '%';

    // Changement de couleur de la barre en fonction de la force
    if (strength <= 2) {
        progressBar.style.backgroundColor = 'red';
        strengthMessage.textContent = 'Faible';
        strengthMessage.className = 'weak';
    } else if (strength === 3 || strength === 4) {
        progressBar.style.backgroundColor = 'orange';
        strengthMessage.textContent = 'Moyen';
        strengthMessage.className = 'medium';
    } else {
        progressBar.style.backgroundColor = 'green';
        strengthMessage.textContent = 'Fort';
        strengthMessage.className = 'strong';
    }
}