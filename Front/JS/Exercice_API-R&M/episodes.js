let pages
fetch("https://rickandmortyapi.com/api/episode?page=1")
.then(response => response.json())
.then(data => {
    pages = data.info.pages
})


setTimeout(() => {
    for (let index = 1; index <= pages; index++) {
        fetch('https://rickandmortyapi.com/api/episode?page' + index)
        // fetch(`https://rickandmortyapi.com/api/character?page${index}`) PEUT ÊTRE ECRIS DE CETTE MANIERE
        .then(response => response.json())
        .then(data => {
            data.results.forEach(element => {
                
                const cardEpNameCreat = document.createElement('div');
                cardEpNameCreat.style.width = "350px";
                cardEpNameCreat.style.height = "50vh";
                cardEpNameCreat.style.backgroundColor = "beige";
                cardEpNameCreat.style.textAlign = "center";
                cardEpNameCreat.style.border = "4px solid black";
                cardEpNameCreat.style.borderRadius = "30px";
                cardEpNameCreat.style.marginBottom = "10px";
                document.body.appendChild(cardEpNameCreat);

                const idEp = document.createElement('h3');
                idEp.textContent = "Numéros de l'épisode :" + " " + element.id;
                cardEpNameCreat.appendChild(idEp);

                const nameEp = document.createElement('h4');
                nameEp.textContent = "Nom de l'épisode :" + " " + element.name;
                cardEpNameCreat.appendChild(nameEp);
                
                const createdEp = document.createElement('h5');
                createdEp.textContent = "Date de sortie de l'épisode :" + " " + element.air_date;
                cardEpNameCreat.appendChild(createdEp);

                console.log(element);
            });
        })  
    }
}, 2000)
