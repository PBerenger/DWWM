// document.addEventListener('keydown', (event) => console.log(event));


// 1 : sélectionner element - 2 : changer style

// const rectangle1 = document.querySelector(".rectangle1");


// rectangle1.addEventListener('click', (event) => {
//     event.target.style.backgroundColor = "yellow";
//     const body = document.querySelector("body");
//     body.style.backgroundColor = "salmon";
    
//     console.log(event);
// });
// document.querySelector(".rectangle2").addEventListener('click', event => {
//     event.target.style.backgroundColor = "blue";
// });
// document.querySelector(".rectangle3").addEventListener('click', event => {
//     event.target.style.backgroundColor = "red";
// });
// document.querySelector(".rectangle4").addEventListener('click', event => {
//     event.target.style.backgroundColor = "green";
// });


 const formes = document.querySelectorAll(".forme")

 formes.forEach((element) => {
    element.addEventListener('click', (event) => {
        formes.forEach((propos) => {
            propos.style.backgroundColor = "";
            propos.textContent = "";
        })
        element.style.backgroundColor = "salmon";
        element.textContent = "c'est moche" + "	\ud83e\udd22";
    })
});