let data = {
    "id": "0001",
    "type": "gateau",
    "nom": "donuts",
    "price": 0.55,
    "nappages":
    {
        "nappage":
            [
                { "id": "1001", "type": "Chocolat" },
                { "id": "1002", "type": "Fraise" },
                { "id": "1003", "type": "Framboise" },
                { "id": "1004", "type": "Vanille" }
            ]
    },

    "topping":
        [
            { "id": "5001", "type": "Sans Topping" },
            { "id": "5002", "type": "Perles de sucre" },
            { "id": "5003", "type": "Copos de coco" },
            { "id": "5004", "type": "Billes de chocolat" },
            { "id": "5005", "type": "Vermisselles de chocolat" },
        ]
}

// créer la card et remplacer les body des appendChild par "card"
const card = document.createElement("div");
card.style.width = "300px";
card.style.height = "45vh";
card.style.backgroundColor = "beige";
card.style.textAlign = "center";
card.style.border = "4px solid black";
card.style.borderRadius = "30px";
document.body.appendChild(card)


// TITRE de la card
let titreH1 = document.createElement("h1");
let nomPatisserie = data.type + " " + data.nom;
titreH1.textContent = nomPatisserie;
card.appendChild(titreH1);

// PRIX de la card
let prixPar = document.createElement("p");
let price = data.price + "" + "Euros";
prixPar.textContent = price;
card.appendChild(prixPar);

const br = document.createElement("br")
card.appendChild(br)

// NAPPAGES de la card
let nappageTab = data.nappages.nappage;
nappageTab.forEach(element=> {
    let nappagesPar = document.createElement("p")
    nappagesPar.textContent = element.type
    card.appendChild(nappagesPar);
    });



// FORMULAIRES liés à la card
const formNapp = document.createElement('form')
document.body.appendChild(formNapp)

data.nappages.nappage.forEach(element => {
    const inputRadio = document.createElement('input');
    inputRadio.type = "radio";
    formNapp.appendChild(inputRadio);
    
    inputRadio.name = "nappage";
    inputRadio.value = element.type;
    
    const label1 = document.createElement('label');
    label1.innerHTML = element.type;
    formNapp.appendChild(label1);
})


const formTopp = document.createElement('form')
document.body.appendChild(formTopp)

data.topping.forEach(element => {
    const inputRadio = document.createElement('input');
    inputRadio.type = "radio";
    formTopp.appendChild(inputRadio);
    
    inputRadio.name = "topping"
    inputRadio.value = element.type;

    const label2 = document.createElement('label');
    label2.innerHTML = element.type;
    formTopp.appendChild(label2);
})

const butValider = document.createElement('button')
document.body.appendChild(butValider)
butValider.textContent = "Valider";

butValider.addEventListener('click', () => {
    const nappageSelection = document.querySelector('input[name="nappage"]:checked')
    const toppingSelection = document.querySelector('input[name="topping"]:checked')
    console.log(nappageSelection.value);
    console.log(toppingSelection.value);

    const resultat = document.createElement('p')
    resultat.textContent = nappageSelection.value + " " + "-" + " " + toppingSelection.value;
    document.body.appendChild(resultat)

})