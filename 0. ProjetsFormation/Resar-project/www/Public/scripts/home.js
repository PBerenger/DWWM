window.addEventListener('scroll', function () {
    const homeTop = document.querySelector('.home-top');
    const searchBar = document.querySelector('.search-bar');

    if (window.scrollY > 40) {  // Quand l'utilisateur fait défiler plus de 40px
        homeTop.classList.add('hidden');  // Cache la section home-top
        searchBar.classList.add('active');  // Fait glisser la barre de recherche dans la vue
    } else {
        homeTop.classList.remove('hidden');  // Affiche la section home-top
        searchBar.classList.remove('active');  // Fait glisser la barre de recherche hors de la vue
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const sliderContainer = document.querySelector('.slider-container');
    const prevButton = document.querySelector('.slider-prev');
    const nextButton = document.querySelector('.slider-next');
    let currentIndex = 0;  // Indice du restaurant actuellement affiché
    const totalRestaurants = document.querySelectorAll('.home-restaurant-slide').length;

    // Fonction pour faire défiler à gauche
    function goToPrevSlide() {
        if (currentIndex === 0) {
            currentIndex = totalRestaurants - 1;  // Revenir à la fin du slider
        } else {
            currentIndex--;
        }
        updateSliderPosition();
    }

    // Fonction pour faire défiler à droite
    function goToNextSlide() {
        if (currentIndex === totalRestaurants - 1) {
            currentIndex = 0;  // Revenir au début du slider
        } else {
            currentIndex++;
        }
        updateSliderPosition();
    }

    // Mettre à jour la position du slider
    function updateSliderPosition() {
        const offset = -currentIndex * 100;  // Décalage basé sur l'indice actuel
        sliderContainer.style.transform = `translateX(${offset}%)`;
    }

    // Ajouter les événements sur les boutons
    prevButton.addEventListener('click', goToPrevSlide);
    nextButton.addEventListener('click', goToNextSlide);

    // Défilement automatique toutes les 5 secondes
    setInterval(goToNextSlide, 10000);  // Appelle la fonction goToNextSlide toutes les 5000ms (5 secondes)

    // Ajouter l'événement de clic sur chaque restaurant du slider
    const restaurantSlides = document.querySelectorAll('.home-restaurant-slide');
    restaurantSlides.forEach(slide => {
        slide.addEventListener('click', () => {
            // Récupérer l'ID du restaurant à partir de l'élément HTML (assume que l'ID est stocké en tant qu'attribut de données)
            const restaurantId = slide.getAttribute('data-restaurant-id');
            // Rediriger vers la page de détails du restaurant
            window.location.href = `index.php?page=restaurant-details&id=${encodeURIComponent(restaurantId)}`;
        });
    });
});


