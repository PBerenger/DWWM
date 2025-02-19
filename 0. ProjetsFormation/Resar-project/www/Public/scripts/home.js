// Search-bar

document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.querySelector(".search-bar");
    let lastScrollTop = 0;

    window.addEventListener("scroll", function () {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // Scroll vers le bas : afficher la barre de recherche
            searchBar.classList.add("active");
        } else if (scrollTop === 0) {
            // Retour en haut de la page : cacher la barre
            searchBar.classList.remove("active");
        }

        lastScrollTop = scrollTop;
    });
});

//----------------------------------------------------------------------------
//slider

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


