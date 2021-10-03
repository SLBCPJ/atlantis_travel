function agregartablaclientes() {
    var clientid = $("#ciudades").val();//para mostrar el value
    var textocliente = $("#ciudades option:selected").text();//mostrar el usuario seleccionado
    
    $("#listadodeclientes").append(
        "<tr id='tr"+clientid+"'><td><input type='hidden' name='ciudades_id[]' value='"+clientid+"'>"+clientid+"</td><td><input type='hidden' name='nombre_ciud[]' value='"+textocliente+"'>"+textocliente+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+clientid+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
}


function agregarpaquetes() {
    var paqu_id = $("#paquetes").val();//para mostrar el value
    var textopaquete = $("#paquetes option:selected").text();//mostrar el paquete seleccionado
    
    $("#listadodepaquetes").append(
        "<tr id='tr"+paqu_id+"'><td><input type='hidden' name='Paquetes_id[]' value='"+paqu_id+"'>"+paqu_id+"</td><td><input type='hidden' name='nombre_paquete[]' value='"+textopaquete+"'>"+textopaquete+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+paqu_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
}
function agregartransportes() {
    var trans_id = $("#transportes").val();//para mostrar el value
    var textotransportes = $("#transportes option:selected").text();//mostrar el transporte seleccionado
    
    $("#listadodetransportes").append(
        "<tr id='tr"+trans_id+"'><td><input type='hidden' name='Transportes_id[]' value='"+trans_id+"'>"+trans_id+"</td><td><input type='hidden' name='nombre_transportes[]' value='"+textotransportes+"'>"+textotransportes+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+trans_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
} 
function agregarservicios() {
    var servis_id = $("#servicios").val();//para mostrar el value
    var textoservicios = $("#servicios option:selected").text();//mostrar el transporte seleccionado
    
    $("#listadodeservicios").append(
        "<tr id='tr"+servis_id+"'><td><input type='hidden' name='Servicios_id[]' value='"+servis_id+"'>"+servis_id+"</td><td><input type='hidden' name='nombre_servicios[]' value='"+textoservicios+"'>"+textoservicios+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+servis_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
}
function agregarhospedajes() {
    var hosp_id = $("#hospedajes").val();//para mostrar el value
    var textohospedajes = $("#hospedajes option:selected").text();//mostrar el transporte seleccionado
    
    $("#listadodehospedajes").append(
        "<tr id='tr"+hosp_id+"'><td><input type='hidden' name='Hospedajes_id[]' value='"+hosp_id+"'>"+hosp_id+"</td><td><input type='hidden' name='nombre_hospedajes[]' value='"+textohospedajes+"'>"+textohospedajes+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+hosp_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
}
function agregarhospedajes2() {
    var hosp_id = $("#hospedajes").val();//para mostrar el value
    var textohospedajes = $("#hospedajes option:selected").text();//mostrar el transporte seleccionado
    
    $("#listadodehospedajes").append(
        "<tr id='tr"+hosp_id+"'><td><input type='hidden' name='Hospedajes_id[]' value='"+hosp_id+"'>"+hosp_id+"</td><td><input type='hidden' name='nombre_hospedajes[]' value='"+textohospedajes+"'>"+textohospedajes+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+hosp_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
    );
       
}  
// function agregarservicios2() {
//     var servis_id = $("#servicios").val();//para mostrar el value
//     var textoservicios = $("#servicios option:selected").text();//mostrar el transporte seleccionado
    
//     $("#listadodeservicios").append(
//         "<tr id='tr"+servis_id+"'><td><input type='hidden' name='Servicios_id[]' value='"+servis_id+"'>"+servis_id+"</td><td><input type='hidden' name='nombre_servicios[]' value='"+textoservicios+"'>"+textoservicios+"</td><td>"+"<button type='button' class='btn btn-info' onclick='$("+'"'+"#tr"+servis_id+'"'+").remove()'>Borrar</button>"+"</td></tr>"
//     );
       
// }