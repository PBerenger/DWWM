// Stats persos

let tab = [
    {
        nomClasse: "Guerrier",
        pv: 100,
        atq: 20,
        imgJ1: "img/boar.webp",
        imgJ2 : "img/boar2.webp"

    },
    {
        nomClasse: "Guerisseur",
        pv: 70,
        atq: 30,
        imgJ1: "img/bear.webp",
        imgJ2 : "img/bear2.webp"
    },
    {
        nomClasse: "Magicien",
        pv: 50,
        atq: 40,
        imgJ1: "img/wolf.webp",
        imgJ2 : "img/wolf2.webp"
    }
]


//menuSelection accueil et retour
let start = document.querySelector(".start");
let selectionPersonnages = document.querySelector(".selectionPersonnages")

start.addEventListener('click', () => {
    selectionPersonnages.style.display = "block";

    document.querySelector(".accueil").style.display = "none";
}
);


let boutonMenu = document.querySelector(".boutonMenu")
let retourMenu = document.querySelector(".retourMenu")
let accueil = document.querySelector(".accueil")

boutonMenu.addEventListener('click', () => {
    document.querySelector(".accueil").style.display = "block";
    document.querySelector(".selectionPersonnages").style.display = "none";
});


// Règles du jeux

const btnRegles = document.querySelector(".regles");
const reglesDuJeu = document.querySelector("#reglesDuJeu");

btnRegles.addEventListener('click', () => {
    reglesDuJeu.style.display = "block";
});

const quitRegles = document.querySelector(".quitRegles");

quitRegles.addEventListener('click', () => {
    document.querySelector("#reglesDuJeu").style.display = "none";
});

window.onclick = function (event) {
    if (event.target == reglesDuJeu) {
        reglesDuJeu.style.display = "none";
    }
}



// JOUEUR 1

let guerrierG = document.querySelector(".guerrierG")
let changeAvatar1 = document.querySelector("#imgJoueur1")
let ready1 = document.querySelector(".ready1")


guerrierG.addEventListener('click', (event) => {
    document.getElementById("imgJoueur1").src = 'img/boar.webp'
    ready1.style.backgroundColor = "white"

    if (ready1.disabled) {
        ready1.disabled = false
    }
});


let guerisseurG = document.querySelector(".guerisseurG")
let changeAvatar2 = document.querySelector("#imgJoueur1")

guerisseurG.addEventListener('click', () => {
    document.getElementById("imgJoueur1").src = 'img/bear.webp'
    ready1.style.backgroundColor = "white"

    if (ready1.disabled) {
        ready1.disabled = false
    }
});

let magicienG = document.querySelector(".magicienG")
let changeAvatar3 = document.querySelector("#imgJoueur1")

magicienG.addEventListener('click', () => {
    document.getElementById("imgJoueur1").src = 'img/wolf.webp'
    ready1.style.backgroundColor = "white"

    if (ready1.disabled) {
        ready1.disabled = false
    }
});

// Ready to fight Bleu

// btnPretActifG.addEventListener('click', () => {
//     document.querySelector(".fighterGauche").style.display = "block"
//     const btnJoueur1 = document.querySelector(".selection.button") 
// })


// JOUEUR 2

let guerrierD = document.querySelector(".guerrierD")
let changeAvatar4 = document.querySelector("#imgJoueur2")
let ready2 = document.querySelector(".ready2")

guerrierD.addEventListener('click', () => {
    document.getElementById("imgJoueur2").src = 'img/boar2.webp'
    ready2.style.backgroundColor = "white"

    if (ready2.disabled) {
        ready2.disabled = false
    }
});

let guerisseurD = document.querySelector(".guerisseurD")
let changeAvatar5 = document.querySelector("#imgJoueur2")

guerisseurD.addEventListener('click', () => {
    document.getElementById("imgJoueur2").src = 'img/bear2.webp'
    ready2.style.backgroundColor = "white"

    if (ready2.disabled) {
        ready2.disabled = false
    }
});

let magicienD = document.querySelector(".magicienD")
let changeAvatar6 = document.querySelector("#imgJoueur2")

magicienD.addEventListener('click', () => {
    document.getElementById("imgJoueur2").src = 'img/wolf2.webp'
    ready2.style.backgroundColor = "white"

    if (ready2.disabled) {
        ready2.disabled = false
    }
});

// Ready to fight Rouge

// btnPretActifD.addEventListener('click', () => {
//     document.querySelector(".fighterDroite").style.display = "block"
// })


// Boutton : lancer le jeu

let joueur1;
let joueur2;
let btnFight = document.querySelector("#btnFight");
let areneDeCombat = document.querySelector(".areneDeCombat");

guerrierG.addEventListener('click', () => {
    guerrierG.style.backgroundColor = "yellow";
    guerisseurG.style.backgroundColor = "";
    magicienG.style.backgroundColor = "";
    
    joueur1 = Object.assign({}, tab[0])
    const imgPersoJou1 = document.querySelector('.imgPersoJou1')
    imgPersoJou1.src = joueur1.imgJ1;
    const statistiquesJ1 = document.querySelector('.statistiquesJ1')
    statistiquesJ1.innerHTML = `<p>Statistiques du personnage :<br>PV : ${joueur1.pv} <br>Att : ${joueur1.atq} </p>`;
})
guerisseurG.addEventListener('click', () => {
    guerrierG.style.backgroundColor = "";
    guerisseurG.style.backgroundColor = "yellow";
    magicienG.style.backgroundColor = "";
    
    joueur1 = Object.assign({}, tab[1])
    const imgPersoJou1 = document.querySelector('.imgPersoJou1')
    imgPersoJou1.src = joueur1.imgJ1
    const statistiquesJ1 = document.querySelector('.statistiquesJ1')
    statistiquesJ1.innerHTML = `<p>Statistiques du personnage :<br>PV : ${joueur1.pv} <br>Att : ${joueur1.atq} </p>`;
})
magicienG.addEventListener('click', () => {
    guerrierG.style.backgroundColor = "";
    guerisseurG.style.backgroundColor = "";
    magicienG.style.backgroundColor = "yellow";
    
    joueur1 = Object.assign({}, tab[2])
    const imgPersoJou1 = document.querySelector('.imgPersoJou1')
    imgPersoJou1.src = joueur1.imgJ1
    const statistiquesJ1 = document.querySelector('.statistiquesJ1')
    statistiquesJ1.innerHTML = `<p>Statistiques du personnage :<br>PV : ${joueur1.pv} <br>Att : ${joueur1.atq} </p>`;
})

// joueur 2
guerrierD.addEventListener('click', () => {
    guerrierD.style.backgroundColor = "yellow";
    guerisseurD.style.backgroundColor = "";
    magicienD.style.backgroundColor = "";
    
    joueur2 = Object.assign({}, tab[0])
    const imgPersoJou2 = document.querySelector('.imgPersoJou2')
    imgPersoJou2.src = joueur2.imgJ2

    const pvJ2 = document.querySelector('#pvJ2')
    pvJ2.textContent = joueur2.pv
    const attJ2 = document.querySelector('#attJ2')
    attJ2.textContent = joueur2.atq

})
guerisseurD.addEventListener('click', () => {
    guerrierD.style.backgroundColor = "";
    guerisseurD.style.backgroundColor = "yellow";
    magicienD.style.backgroundColor = "";
    
    joueur2 = Object.assign({}, tab[1])
    const imgPersoJou2 = document.querySelector('.imgPersoJou2')
    imgPersoJou2.src = joueur2.imgJ2

    const pvJ2 = document.querySelector('#pvJ2')
    pvJ2.textContent = joueur2.pv
    const attJ2 = document.querySelector('#attJ2')
    attJ2.textContent = joueur2.atq
})
magicienD.addEventListener('click', () => {
    guerrierD.style.backgroundColor = "";
    guerisseurD.style.backgroundColor = "";
    magicienD.style.backgroundColor = "yellow";
    
    joueur2 = Object.assign({}, tab[2])
    const imgPersoJou2 = document.querySelector('.imgPersoJou2')
    imgPersoJou2.src = joueur2.imgJ2

    const pvJ2 = document.querySelector('#pvJ2')
    pvJ2.textContent = joueur2.pv
    const attJ2 = document.querySelector('#attJ2')
    attJ2.textContent = joueur2.atq
})



//sélectionner l'arène

btnFight.addEventListener('click', () => {
    if (joueur1 == undefined) {
        return
    }
    if (joueur2 == undefined) {
        return
    }
    areneDeCombat.style.display = "block";
    selectionPersonnages.style.display = "none"
    
    const nomClasse1 = document.querySelector(".nomClasse1");
    const nomClasse2 = document.querySelector(".nomClasse2");
    nomClasse1.textContent = joueur1.nomClasse;
    nomClasse2.textContent = joueur2.nomClasse;



});
