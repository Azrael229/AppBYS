


btn_frm_nvo_dia.addEventListener("click", ()=>{
    
    fetch("insertar_dia.php", {
        method: "POST",
        body: new FormData(frm_nuevo_dia)
        
    }).then(response  => response.text()).then(response =>{
        
        

        if (response == "false") {
            alert ("Ingresa una fecha");           
        }
        else{
            location.reload();  
            // console.log(response);        
        };       
    })
});



function escribir_fecha_modal(ID){
    // let input_fecha =document.getElementById("input_fecha");
    let span_fecha =document.getElementById("span_fecha_modal");
        
    // console.log(ID);

    fetch("reqUnaFecha.php",{
        method: "POST",
        body: ID

    }).then(response  => response.json()).then(response => {
        // console.log(response);
        // span_fecha pinta en el modal la fecha, response.fecha toma la fecha de la respuesta json 
        span_fecha.innerHTML = response.fecha;
    })

};






