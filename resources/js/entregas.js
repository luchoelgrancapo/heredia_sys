function mostrardetalle(venta_id)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'detalle_venta/ver_detalle/';
    
    $.ajax({url: controlador,
            type:"POST",
            data:{venta_id:venta_id},
            success:function(respuesta){
                 var registros =  JSON.parse(respuesta);
                 var n = registros.length;
                 var html = "";
                 for (var i = 0; i < n ; i++){
                 
                
                    html += "<tr>";
                    html += "<td>";
                    html += i+1;
                    html += "</td>";
                     html += "<td>";
                    html += registros[i]["producto_nombre"];
                    html += "</td>";
                    html += "<td>";
                    html += registros[i]["detalleven_cantidad"];
                    html += "</td>";
                   
                    
                    html += "</tr>";
                   
                 }
                 $("#detallepago").html(html);
                 $("#exampleModal").modal();

            }        
    });
}