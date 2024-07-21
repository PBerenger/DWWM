// Ralentissement de rotating-image NE FONCTIONNE PAS !!!

const rotatingImage = document.querySelector('.rotating-image');
    let lastRotation = 0;

    rotatingImage.addEventListener('mouseenter', () => {
        rotatingImage.style.transition = 'none'; 
    });

    rotatingImage.addEventListener('mouseleave', () => {
        rotatingImage.style.transition = 'transform 5s ease-out'; // Apply transition for stopping
        const computedStyle = window.getComputedStyle(rotatingImage);
        const transform = computedStyle.transform;
        const matrix = new DOMMatrix(transform);
        lastRotation = Math.atan2(matrix.b, matrix.a) * (180 / Math.PI); // Get the last rotation degree
        rotatingImage.style.transform = `rotate(${lastRotation}deg)`;
        rotatingImage.classList.add('stop-spin');
        setTimeout(() => {
            rotatingImage.style.transition = 'none';
            rotatingImage.style.transform = 'rotate(0deg)';
            setTimeout(() => {
                rotatingImage.classList.remove('stop-spin');
            }, 5000); // Delay to match the transition duration
        }, 5000); // Match the duration of the transition
    });