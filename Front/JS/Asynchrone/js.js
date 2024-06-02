const butBase = document.querySelector("button")

butBase.addEventListener('click', () => { 
    const divRectangleRed = document.createElement("div")
    divRectangleRed.style.background = "red";
    divRectangleRed.style.height = "200px";
    divRectangleRed.style.width = "500px";
    document.body.appendChild(divRectangleRed);



    divRectangleRed.addEventListener('click', () => {
    suppRect(divRectangleRed);
    });
    
    setTimeout(() => {
        const divRectangleBlue = document.createElement("div")
        divRectangleBlue.style.background = "blue"
        divRectangleBlue.style.height = "200px";
        divRectangleBlue.style.width = "500px";
        document.body.appendChild(divRectangleBlue);


        divRectangleBlue.addEventListener('click', () => {
        suppRect(divRectangleBlue);
        });
        
    }, 5000);
});


function suppRect(rectangle) {
    rectangle.remove();
};