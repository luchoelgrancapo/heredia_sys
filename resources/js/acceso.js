    $(document).on("ready",inicio);
function inicio(){
     buscar_accesos();
        
} 

function buscar_accesos()
{
   
    var opcion      = document.getElementById('select_inscripcion').value;
 
    

    if (opcion == 1)
    {
        filtro = " and date(acceso_ingreso) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        fechaingresos(filtro);

               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(acceso_ingreso) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        fechaingresos(filtro);
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(acceso_ingreso) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");
        fechaingresos(filtro);
            }

    
    if (opcion == 4) 
    {   filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");

    }
    
    if (opcion == 5) {

        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }

    
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function fechaingresos(filtro)
{   
      
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"acceso/buscarfecha";
   //var estado_id = document.getElementById('estado_id').value;

   $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
          
           success:function(resul){     
              
                            
                $("#pillados").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                   
                    var n = registros.length; //tama単o del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+"");
                   
                    html = "";
                
                    for (var i = 0; i < n ; i++){
                        
                        
                        
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["cliente_nombre"]+"</b><br>"+registros[i]["cliente_ci"]+"</td>";
                    
                        html += "<td>"+registros[i]["acceso_estado"]+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["acceso_ingreso"]).format('DD/MM/YYYY H:m:s')+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["acceso_salida"]).format('DD/MM/YYYY H:m:s')+"</td>"; 
                        
                        html += "<td  class='no-print'><a title='Eliminar' href='"+base_url+"acceso/remove/"+registros[i]['acceso_id']+"' class='btn bg-danger btn-xs'><span class='fa fa-trash'></a>";
                       
                        html += "</td>";
                        
                        html += "</tr>";
                    } 
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                    
                        html += "<td align='right'><b>TOTAL</b></td>";
                        html += "<td align='right'><font size='4'><b>"+Number(n)+"</b></font></td>";
                        html += "<td></td>";
                       
                        html += "<td></td>";
                        html += "</tr>";
                   
                   $("#ingresos").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#ingresos").html(html);
        }
        
    });   

}

function accesor(e) {

  var codigo = 	document.getElementById('codigo').value;
  tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13&&codigo!=''){
        add_acceso(codigo);
    }
}

function add_acceso(codigo)
{
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"acceso/nuevo";
   //var servicio = document.getElementById('serviciote_id').value;
   //var fecha_inicio = document.getElementById('inscripcion_fechaini').value;
//var inicio = new Date(fecha_inicio);//moment(fecha_inicio).format('YYYY-MM-DD');

       $.ajax({url: controlador,
           type:"POST",
           data:{codigo:codigo},
          
           success:function(resul){     
              
                            
               var registros =  JSON.parse(resul);
               //alert(inicio);
               if (registros != null){
                  
                   buscar_accesos();
                              
                   
            }else{
            	alert("Este codigo no tiene permiso de ingresar");
            }
                
        },
        error:function(resul){
           alert("Este codigo no tiene permiso de ingresar");
          
        }
            
        
    });
}
