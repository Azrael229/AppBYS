
function seleccionar_sem(ID){

    console.log(ID);
    // alert ("hola")

    // var url = "selec_sem.php";
    // fetch(url, {
    //     method: "POST",
    //     body: ID
    // }).then(resp => resp.text()).then(resp =>{
    //     console.log(resp);
    // });

}


// funcion click en boton formulario que agrega semana a base de datos 
btnformArchSem.addEventListener("click", ()=>{
    fetch("insertSemana.php", {
        method: "POST",
        body: new FormData(frmArchSem)
    }).then(response  => response.text()).then(response =>{
        if (response == "false") {
            alert ("Ingresa un mumero de semana");
            
        }
        else{
            location.reload();
            
        };
        
    })

});