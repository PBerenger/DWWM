const tableau1 = [1, 2, 3, 4, 5];
tableau1.forEach(Element => {
    console.log(Element);
})

// tableau vide et ajout d'éléments----------------


const tableau2 = [];
tableau2.push(10, 20, 30);
tableau2.shift();

console.log(tableau2)


// --------------------------------------------------

let changecolor = document.querySelector("h1");
changecolor.style.color = "red";



// exercice obj et manip----------------------------
// -------------------------------------------------


const person = {
    nom : 'Alice',
    age : '25',
    ville : 'Paris',  
};

console.log(person.nom);


// --------------------------------------------------

const banque = {
    solde : 1000,
    titulaire : 'JD',
}

banque.solde = banque.solde + 500;

console.log(banque)

