  $(document).on("ready",inicio);
function inicio(){
     
        
        planilla_usuario(); 
     
        
} 


function planilla_usuario()
{   
      
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"salario/planilla_usuario";
  
    $.ajax({url: controlador,
           type:"POST",
           data:{},
          
           success:function(resul){     
              
                            
                $("#pillados").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                   
                    var total = Number(0);
                    
                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#pillados").html("Registros Encontrados: "+n+"");
                   
                    html = "";
                    for (var i = 0; i < n ; i++){
                        
                       
                        total += Number(registros[i]["salario_loquidopagable"]);
                        
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["personal_nombre"]+"</b></td>";
                        html += "<td align='center'>"+registros[i]["personal_sexo"]+"</td>";  
                        html += "<td align='center'>"+moment(registros[i]["personal_fechanac"]).format('DD/MM/YYYY')+"</td>";
                        html += "<td align='center'>"+registros[i]["contrato_cargo"]+"</td>";  
                        html += "<td align='right'>"+Number(registros[i]["contrato_sueldo"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_ganado"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_bonoant"]).toFixed(2)+"</td>";
                        html += "<td align='right'><input size='2' id='salario_horasext"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_horasext"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_bonohoras"]).toFixed(2)+"</td>";
                        html += "<td align='right'><input size='2' id='salario_produccion"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_produccion"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'><input size='2' id='salario_dominical"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_dominical"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'><input size='2' id='salario_otrobono"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_otrobono"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_totalganado"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_afp"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_solidario"]).toFixed(2)+"</td>";
                        html += "<td align='right'><input size='2' id='salario_iva"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_iva"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'><input size='2' id='salario_ant"+registros[i]["salario_id"]+"' value='"+Number(registros[i]["salario_ant"]).toFixed(2)+"' onkeyup='calcular(event,"+registros[i]["salario_id"]+")' /></td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_totaldescuento"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["salario_loquidopagable"]).toFixed(2)+"</td>";                       
                    } 
                        html += "<tr>";                        
                        html += "<th colspan='4' align='right'><b>TOTAL</b></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<th></th>";
                        html += "<td align='right'>"+Number(total).toFixed(2)+"</td>";
                        
                        html += "</tr>";
                   
                   $("#tablaresultados").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }
        
    });   

} 

function calcular(e,salario_id)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla==13){
        calcularfila(salario_id);
    }
}



function calcularfila(salario_id)
{
    var base_url = document.getElementById("base_url").value;
    var horas = document.getElementById("salario_horasext"+salario_id).value;
    var produccion = document.getElementById("salario_produccion"+salario_id).value;
    var dominical = document.getElementById("salario_dominical"+salario_id).value;
    var otro = document.getElementById("salario_otrobono"+salario_id).value;
    var iva = document.getElementById("salario_iva"+salario_id).value;
    var anticipo = document.getElementById("salario_ant"+salario_id).value;
    var controlador = base_url+"salario/actualizar/"+salario_id;
    
    $.ajax({url: controlador,
            type: "POST",
            data:{horas:horas,produccion:produccion,dominical:dominical,otro:otro,iva:iva,anticipo:anticipo}, 
            success:function(resultado){
                planilla_usuario();
              /*var registros =  JSON.parse(resultado);
                $("#generar_nit").val(registros["cliente_nit"]);
                $("#generar_razon").val(registros["cliente_razon"]);
                $("#generar_detalle").val("PRODUCTOS VARIOS");
                $("#generar_venta_id").val(registros["venta_id"]);
                $("#generar_monto").val(Number(registros["venta_total"]).toFixed(2));
                $("#generar_credito").val(credito_id);*/
          
                //$("#boton_modal_factura").click();
            },
            error:function(resultado){
                alert("Ingrese una cantidad correcta");
            },
        
        
    }) 
}

function busqueda_planilla()
{
    var base_url = document.getElementById("base_url").value;
    var ano = document.getElementById("ano").value;
    var mes = document.getElementById("mes").value;
    var controlador = base_url+"salario/busqueda_planilla/";
    
    $.ajax({url: controlador,
            type: "POST",
            data:{ano:ano,mes:mes}, 
            success:function(resultado){
               var registros =  JSON.parse(resultado);
                if (registros != ''){
                    alert('Ya existe una planilla procesada para '+mes+' en gestion '+ano);
                    $("#mes").val('');
                }else{
                   
                }
            },
            error:function(resultado){
                
            },
        
        
    }) 
}

function procesar_planilla()
{
    var base_url = document.getElementById("base_url").value;
    var ano = document.getElementById("ano").value;
    var mes = document.getElementById("mes").value;
    var smn = document.getElementById("smn").value;
    var fecha = document.getElementById("planilla_fecha").value;
    var controlador = base_url+"salario/procesar_planilla/";
    document.getElementById('boton').disabled=true;
    if(ano!='' && mes!='' && smn!='' && planilla_fecha!=''){
    $.ajax({url: controlador,
            type: "POST",
            data:{ano:ano,mes:mes,smn:smn,fecha:fecha}, 
            success:function(resultado){
                document.getElementById('boton').disabled=true;
                window.location.href= base_url+'personal';
            },
            error:function(resultado){
                document.getElementById('boton').disabled=false;
            },
        
        
    })

}else{
    document.getElementById('boton').disabled=false;
    alert('Debe llenar todos los campos');
}

}

