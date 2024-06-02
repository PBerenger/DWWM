let pages
fetch("https://rickandmortyapi.com/api/location?=page1")
.then(response => response.json())
.then(data => {
    pages = data.info.pages
})


setTimeout(() => {
    for (let index = 1; index <= pages; index++) {
        fetch('https://rickandmortyapi.com/api/location?page' + index)
        .then(response => response.json())
        .then(data => {
            data.results.forEach(element => {
                
                const cardNameType = document.createElement('div');
                cardNameType.style.width = "350px";
                cardNameType.style.height = "50vh";
                cardNameType.style.backgroundColor = "beige";
                cardNameType.style.textAlign = "center";
                cardNameType.style.border = "4px solid black";
                cardNameType.style.borderRadius = "30px";
                cardNameType.style.marginBottom = "10px";
                document.body.appendChild(cardNameType);
                
                const namePlanet = document.createElement('h3');
                namePlanet.textContent = "Nom : " + " " + element.name;
                cardNameType.appendChild(namePlanet);
                
                const typePlanet = document.createElement('h4');
                typePlanet.textContent = "Type :" + " " + element.type;
                cardNameType.appendChild(typePlanet);

                console.log(element);
            });
        })  
    }
}, 2000)