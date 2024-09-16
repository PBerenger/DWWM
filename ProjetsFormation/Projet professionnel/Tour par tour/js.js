// Stats persos
let tab = [
    {
        nomClasse: "Guerrier",
        pv: 100,
        atq: 20,
        imgJ1: "img/boar.webp",
        imgJ2: "img/boar2.webp"
    },
    {
        nomClasse: "Guerisseur",
        pv: 70,
        atq: 30,
        imgJ1: "img/bear.webp",
        imgJ2: "img/bear2.webp"
    },
    {
        nomClasse: "Magicien",
        pv: 50,
        atq: 40,
        imgJ1: "img/wolf.webp",
        imgJ2: "img/wolf2.webp"
    }
];

// menuSelection accueil et retour
let start = document.querySelector(".start");
let selectionPersonnages = document.querySelector(".selectionPersonnages");
let boutonMenu = document.querySelector(".boutonMenu");
let retourMenu = document.querySelector(".retourMenu");
let accueil = document.querySelector(".accueil");

start.addEventListener('click', () => {
    selectionPersonnages.style.display = "block";
    accueil.style.display = "none";
});

boutonMenu.addEventListener('click', () => {
    accueil.style.display = "block";
    selectionPersonnages.style.display = "none";
});

// Règles du jeu
const btnRegles = document.querySelector(".regles");
const reglesDuJeu = document.querySelector("#reglesDuJeu");
const quitRegles = document.querySelector(".quitRegles");

btnRegles.addEventListener('click', () => {
    reglesDuJeu.style.display = "block";
});

quitRegles.addEventListener('click', () => {
    reglesDuJeu.style.display = "none";
});

window.onclick = function (event) {
    if (event.target == reglesDuJeu) {
        reglesDuJeu.style.display = "none";
    }
};

// Fonction pour changer l'avatar et l'état du bouton
function changerAvatar(joueur, avatarSrc, readyButton) {
    document.getElementById(joueur).src = avatarSrc;
    readyButton.style.backgroundColor = "white";
    readyButton.disabled = false;
}

// JOUEUR 1
let guerrierG = document.querySelector(".guerrierG");
let guerisseurG = document.querySelector(".guerisseurG");
let magicienG = document.querySelector(".magicienG");
let ready1 = document.querySelector(".ready1");

guerrierG.addEventListener('click', () => changerAvatar("imgJoueur1", 'img/boar.webp', ready1));
guerisseurG.addEventListener('click', () => changerAvatar("imgJoueur1", 'img/bear.webp', ready1));
magicienG.addEventListener('click', () => changerAvatar("imgJoueur1", 'img/wolf.webp', ready1));

// JOUEUR 2
let guerrierD = document.querySelector(".guerrierD");
let guerisseurD = document.querySelector(".guerisseurD");
let magicienD = document.querySelector(".magicienD");
let ready2 = document.querySelector(".ready2");

guerrierD.addEventListener('click', () => changerAvatar("imgJoueur2", 'img/boar2.webp', ready2));
guerisseurD.addEventListener('click', () => changerAvatar("imgJoueur2", 'img/bear2.webp', ready2));
magicienD.addEventListener('click', () => changerAvatar("imgJoueur2", 'img/wolf2.webp', ready2));

// Variables pour gérer le jeu
let joueur1, joueur2;
let tourJoueur1 = true; // Indique si c'est au tour du joueur 1 de jouer
let gameOver = false;

// Variables de l'interface
let areneDeCombat = document.querySelector(".areneDeCombat");
let btnFight = document.querySelector("#btnFight");
let btnAttaqueJ1 = document.querySelector(".joueur1 #btnAttaque");
let btnAttaqueJ2 = document.querySelector(".joueur2 #btnAttaque");
let btnReset = document.querySelector("#btnReset");

// Sélection des personnages pour Joueur 1
document.querySelector('.guerrierG').addEventListener('click', () => {
    joueur1 = Object.assign({}, tab[0]); // Guerrier
    document.getElementById('imgJoueur1').src = joueur1.imgJ1;
    document.querySelector('.statistiquesJ1').innerHTML = `<p>PV : ${joueur1.pv}<br>Att : ${joueur1.atq}</p>`;
});
document.querySelector('.guerisseurG').addEventListener('click', () => {
    joueur1 = Object.assign({}, tab[1]); // Guérisseur
    document.getElementById('imgJoueur1').src = joueur1.imgJ1;
    document.querySelector('.statistiquesJ1').innerHTML = `<p>PV : ${joueur1.pv}<br>Att : ${joueur1.atq}</p>`;
});
document.querySelector('.magicienG').addEventListener('click', () => {
    joueur1 = Object.assign({}, tab[2]); // Magicien
    document.getElementById('imgJoueur1').src = joueur1.imgJ1;
    document.querySelector('.statistiquesJ1').innerHTML = `<p>PV : ${joueur1.pv}<br>Att : ${joueur1.atq}</p>`;
});

// Sélection des personnages pour Joueur 2
document.querySelector('.guerrierD').addEventListener('click', () => {
    joueur2 = Object.assign({}, tab[0]); // Guerrier
    document.getElementById('imgJoueur2').src = joueur2.imgJ2;
    document.querySelector('.statistiquesJ2').innerHTML = `<p>PV : ${joueur2.pv}<br>Att : ${joueur2.atq}</p>`;
});
document.querySelector('.guerisseurD').addEventListener('click', () => {
    joueur2 = Object.assign({}, tab[1]); // Guérisseur
    document.getElementById('imgJoueur2').src = joueur2.imgJ2;
    document.querySelector('.statistiquesJ2').innerHTML = `<p>PV : ${joueur2.pv}<br>Att : ${joueur2.atq}</p>`;
});
document.querySelector('.magicienD').addEventListener('click', () => {
    joueur2 = Object.assign({}, tab[2]); // Magicien
    document.getElementById('imgJoueur2').src = joueur2.imgJ2;
    document.querySelector('.statistiquesJ2').innerHTML = `<p>PV : ${joueur2.pv}<br>Att : ${joueur2.atq}</p>`;
});

// Lancer le combat
btnFight.addEventListener('click', () => {
    if (!joueur1 || !joueur2) return; // Ne pas démarrer sans joueurs
    areneDeCombat.style.display = "block";
    selectionPersonnages.style.display = "none";
    document.querySelector(".nomClasse1").textContent = joueur1.nomClasse;
    document.querySelector(".nomClasse2").textContent = joueur2.nomClasse;
});

// Fonction d'attaque
function attaque(joueurAttaquant, joueurDefenseur) {
    if (gameOver) return;

    let degats = Math.floor(Math.random() * joueurAttaquant.atq) + 1;
    joueurDefenseur.pv -= degats;

    // Mettre à jour l'affichage des PV
    if (tourJoueur1) {
        document.querySelector(`#pvJ2`).textContent = joueur2.pv;
    } else {
        document.querySelector(`#pvJ1`).textContent = joueur1.pv;
    }

    // Vérifier si le défenseur est KO
    if (joueurDefenseur.pv <= 0) {
        gameOver = true;
        alert(`${joueurAttaquant.nomClasse} a gagné !`);
    }
}

// Gestion des tours
function tourDeJeu() {
    if (tourJoueur1) {
        attaque(joueur1, joueur2);
    } else {
        attaque(joueur2, joueur1);
    }

    // Alterner les tours
    tourJoueur1 = !tourJoueur1;
}

// Bouton attaque pour chaque joueur
btnAttaqueJ1.addEventListener('click', () => {
    if (!gameOver && tourJoueur1) {
        attaque(joueur1, joueur2);
        tourDeJeu();
    }
});

btnAttaqueJ2.addEventListener('click', () => {
    if (!gameOver && !tourJoueur1) {
        attaque(joueur2, joueur1);
        tourDeJeu();
    }
});

// Réinitialisation du jeu
btnReset.addEventListener('click', () => {
    if (joueur1 && joueur2) {
        joueur1.pv = tab.find(classe => classe.nomClasse === joueur1.nomClasse).pv;
        joueur2.pv = tab.find(classe => classe.nomClasse === joueur2.nomClasse).pv;
        gameOver = false;
        tourJoueur1 = true;
        document.querySelector(`#pvJ1`).textContent = joueur1.pv;
        document.querySelector(`#pvJ2`).textContent = joueur2.pv;
    }
});
