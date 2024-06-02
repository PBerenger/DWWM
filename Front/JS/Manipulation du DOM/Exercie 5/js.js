const allBtn = document.querySelectorAll('button');

allBtn.forEach( element => {
    element.addEventListener('click', (event) => {
        console.log(event.target.id)
    })
})