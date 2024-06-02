let pages
fetch("https://rickandmortyapi.com/api/character?page=1")
.then(response => response.json())
.then(data => {
    pages = data.info.pages
})


setTimeout(() => {
    for (let index = 1; index <= pages; index++) {
        fetch('https://rickandmortyapi.com/api/character?page' + index)
        .then(response => response.json())
        .then(data => {
            data.results.forEach(element => {
                
                const cardNameImg = document.createElement('div');
                cardNameImg.style.width = "350px";
                cardNameImg.style.height = "50vh";
                cardNameImg.style.backgroundColor = "beige";
                cardNameImg.style.textAlign = "center";
                cardNameImg.style.border = "4px solid black";
                cardNameImg.style.borderRadius = "30px";
                cardNameImg.style.marginBottom = "10px";
                document.body.appendChild(cardNameImg);

                const namePersos = document.createElement('h3');
                namePersos.textContent = element.name;
                cardNameImg.appendChild(namePersos);

                const imgPersos = document.createElement('img');
                imgPersos.src = element.image;
                cardNameImg.appendChild(imgPersos);

                console.log(element.name, element.image);
            });
        })  
    }
}, 2000)
