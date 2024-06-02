//-querySelector

const btnEnvoyer = document.querySelector("#btnEnvoyer")
const inpNom = document.querySelector("#nom")
const inpPrenom = document.querySelector("#prenom")
const inpTel = document.querySelector("#telephone")
const inpMess = document.querySelector("#message")
const formulaire = document.querySelector("#formulaire")

// Récupérer les valeures du formulaire grâce au type 'submit' - ajouter les valeur de chaque case - déclaration variable avec dedans objet (avant les ':' = clef, après ':' value)
formulaire.addEventListener('submit', (event) => {
    event.preventDefault();
    
    valNom = nom.value
    valPrenom = prenom.value
    valTel = telephone.value
    valMessage = message.value

    let objectToSend = {
        nom : valNom,
        prenom : valPrenom,
        number : valTel,
        message : valMessage
    }

    console.log(objectToSend);
});





