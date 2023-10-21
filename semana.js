


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

    }).then(response => response.json()).then(response => {
        //console.log(response);
        // span_fecha pinta en el modal la fecha, response.fecha toma la fecha de la respuesta json 
        span_fecha.innerHTML = response.fecha;
    });

};



// evento click del boton del modal formulario Nueva Actividad
    btn_frm_add_actividad.addEventListener("click", ()=>{
        
        let form = document.getElementById("frm_nueva_actividad");
        
        
        fetch("insertar_actividad.php", {
            method: "POST",
            body: new FormData(form)
            
        }).then(response  => response.text()).then(response =>{

            //console.log(response);
            
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


// evento click del boton del modal formulario Nuevo Gasto
btn_frm_add_gasto.addEventListener("click", ()=>{
     
    let form = document.getElementById("frm_nuevo_gasto");
    
    
    fetch("insertar_gasto.php", {
        method: "POST",
        body: new FormData(form)
        
    }).then(response  => response.text()).then(response =>{

        //console.log(response);
        
        if (response == "ok") {
            // alert ("Gasto Agregado");   
            location.reload();        
        }
        else{
            alert ("error: vuelve a intentarlo");        
            location.reload();  
        };       
    })

});



function escribir_fecha_modal2(ID){

    let input_id_fecha2 =document.getElementById("id_fecha2");
    let span_fecha2 =document.getElementById("span_fecha_modal2");

    // el ID del dia, se lo pasa al input id_fecha, para despues enviarlo a la base de datos, con el registro de la nueva actividad
    input_id_fecha2.value = ID;

    //console.log(ID);

    fetch("reqUnaFecha.php",{
        method: "POST",
        body: ID

    }).then(response => response.json()).then(response => {
        //console.log(response);
        // span_fecha pinta en el modal la fecha, response.fecha toma la fecha de la respuesta json 
        span_fecha2.innerHTML = response.fecha;
    });

};


function idfecha_modahoraios(ID){

    let input_idfecha = document.getElementById("id_fecha_horarios");
    let span_fecha_modhoraios =document.getElementById("sp_fech_horario");

    // el ID del dia, se lo pasa al input id_fecha, para despues enviarlo a la base de datos, con el registro de la nueva actividad
    
    input_idfecha.value = ID;
    // console.log(ID);
    
    
    fetch("reqUnaFecha.php",{
        method: "POST",
        body: ID

    }).then(response => response.json()).then(response => {
        //console.log(response);
        // span_fecha pinta en el modal la fecha, response.fecha toma la fecha de la respuesta json 
        span_fecha_modhoraios.innerHTML = response.fecha;
    });

};

