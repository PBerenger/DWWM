let bonjour = document.querySelector("div");
let bonjA = "bonjour Alice";
bonjour.textContent = bonjA;

let divInBjr = document.createElement("p");
bonjour.appendChild(divInBjr)
divInBjr.innerHTML = "<span>quequ</span> hello piqrfqueshd b  iohstiu g";


console.log(divInBjr);