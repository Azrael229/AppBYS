

// evento click que envia por medio de un post a PHP el formulario con la fecha nueva que se registrará en la base de datos.
btn_frm_nvo_dia.addEventListener("click", ()=>{
    
    let form = document.getElementById("frm_nuevo_dia");
    // console.log(form);

    fetch("insertar_dia.php", {
        method: "POST",
        body: new FormData(form)
        
    }).then(response  => response.text()).then(response =>{
        
        if (response == "false") {
            alert ("Ingresa una fecha");           
        }
        else{
            location.reload();  
            // console.log(response);        
        };       
    });
});


//esta funcion envia el ID de la fecha de la card a php para consultar el registo y escribe la fecha en el encabezado del modal cuando se hace click en Actividades de alguna card para agregar uan actividad,,, el objetivo es que el usuario vea en el modal el dia en el que va a agregar una actividad por medio de un formulario.
function escribir_fecha_modal(ID){

    let input_id_fecha =document.getElementById("id_fecha");
    let span_fecha =document.getElementById("span_fecha_modal");

    // el ID del dia, se lo pasa al input id_fecha, para despues enviarlo a la base de datos, con el registro de la nueva actividad
    input_id_fecha.value = ID;

    // console.log(ID);

    fetch("reqUnaFecha.php",{
        method: "POST",
        body: ID

    }).then(response  => response.json()).then(response => {
        // console.log(response);
        // span_fecha pinta en el modal la fecha, response.fecha toma la fecha de la respuesta json 
        span_fecha.innerHTML = response.fecha;
    });

};




btn_frm_add_actividad.addEventListener("click", ()=>{
     
    let form = document.getElementById("frm_nueva_actividad");
    
    
    fetch("insertar_actividad.php", {
        method: "POST",
        body: new FormData(form)
        
    }).then(response  => response.text()).then(response =>{

        console.log(response);
        
        if (response == "ok") {
            // alert ("Actividad Agregada");   
            location.reload();        
        }
        else{
            alert ("error");        
            location.reload();  
        };       
    })

});



