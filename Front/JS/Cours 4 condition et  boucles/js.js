// exrecice 1

let agenow = 16;

    if (agenow < 18){
        console.log("mineur");
    }

    else{
        console.log("majeur");
    }


// exercice 2

// for (let i = 2; i <= 20; i++) {
//     if (i % 2 == 0) {
//       console.log(i);
//     }
//   }
//   for (let i = 2; i <= 20; i++) {


//     for (let i = 2; i < 20; i += 2) {
//         console.log(i);
        
//     }
    
//     for (let p = 1; p <= 20; p++) {
//         if (p % 2 === 0){
//             console.log(p);
//         }
        
//     }
//   }

// exercice 3


const randomNumber = Math.floor((Math.random() * 100) + 1)

let inputUser = prompt("Veuillez entrer une valeur entre 1 et 100")

while (isNaN(inputUser)){
    inputUser = prompt("Veuillez entrer un nombre entre 1 et 100")
}  

while (inputUser != randomNumber){
    if (inputUser > randomNumber){
        inputUser = prompt("Le nombre est trop haut")
    }
    
    if (inputUser < randomNumber){
        inputUser = prompt("le nombre est trop bas")
    }

    if (inputUser == randomNumber){
        console.log("c'est gagné");
    }

}






