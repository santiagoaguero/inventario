const formAgg = document.querySelectorAll(".formAgregarProd");


function enviarForm(evt){
    evt.preventDefault();

    let data = new FormData(this);

    let method = this.getAttribute("method");
    let action = this.getAttribute("action");

    let encabezado= new Headers();

    let config = {
        method: method,
        headers: encabezado,
        mode: "cors",
        cache: "no-cache",
        body: data
    }

    fetch(action, config)
    .then(response => response.text())
    .then(response => {
        let contenedor = document.querySelector(".form-rest");
        contenedor.innerHTML = response;
    } );
}

formAgg.forEach(form =>{
    form.addEventListener("submit", enviarForm)
});