fetch("https://www.themoviedb.org/")
.then(response => response.json())
.then(data => {
    console.log(data);

})