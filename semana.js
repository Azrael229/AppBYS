


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






function add_act_gast(){
    alert("click");
}



