    $(document).on("ready",inicio);
function inicio(){
      filtro = " ";   
        
        fechadeinscripcion(filtro); 
     
        
} 

function buscar_inscripciones()
{
   
    var opcion      = document.getElementById('select_inscripcion').value;
 
    

    if (opcion == 1)
    {
        filtro = " and date(inscripcion_fechaini) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        fechadeinscripcion(filtro);

               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(inscripcion_fechaini) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        fechadeinscripcion(filtro);
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(inscripcion_fechaini) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");
        fechadeinscripcion(filtro);
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

function buscar_por_fechas()
{
    
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
   
    filtro = " and date(inscripcion_fechaini) >= '"+fecha_desde+"'  and  date(inscripcion_fechaini) <='"+fecha_hasta+"' ";
    
    fechadeinscripcion(filtro);
    
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function fechadeinscripcion(filtro)
{   
      
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"inscripcion/buscarfecha";
   var estado_id = document.getElementById('estado_id').value;
   if (estado_id==1) {
       var estado = " and date(inscripcion_fechaini) <= date(now()) and date(inscripcion_fechafin) >= date(now())";
   }else{
       var estado = " and date(inscripcion_fechafin) <= date(now()) ";
   }
    
    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro,estado:estado},
          
           success:function(resul){     
              
                            
                $("#pillados").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                   
                    var cont = 0;
                    var total = Number(0);
                    
                    var n = registros.length; //tama単o del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+"");
                   
                    html = "";
                
                    for (var i = 0; i < n ; i++){
                        
                        var suma = Number(registros[i]["inscripcion_monto"]);
                        var total = Number(suma+total);
                        
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["cliente_nombre"]+"</b><br>";
                        html += registros[i]["cliente_celular"]+"</td>";
                        html += "<td>"+registros[i]["serviciote_nombre"]+"<br>Meses: "+ registros[i]["serviciote_duracion"]+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["inscripcion_fechaini"]).format('DD/MM/YYYY')+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["inscripcion_fechafin"]).format('DD/MM/YYYY')+"</td>"; 
                        html += "<td align='right'>"+Number(registros[i]["inscripcion_monto"]).toFixed(2)+"</td>"; 
                         
                        html += "<td>"+registros[i]["usuario_nombre"]+"</td>"; 
                        html += "<td  class='no-print'><a  onclick='reinscribir("+registros[i]["inscripcion_id"]+")' title='Reinscribir' data-toggle='modal' data-target='#reincribir"+registros[i]['inscripcion_id']+"' class='btn bg-primary btn-xs'><span class='fas fa-file-prescription'></a>";
                       // html += " <a href='"+base_url+"inscripcion/imprimir/"+registros[i]["inscripcion_id"]+"' title='Carta' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-print'></a>";
                        //html += " <a href='"+base_url+"inscripcion/imprimir/"+registros[i]["inscripcion_id"]+"' title='Carta' target='_blank' class='btn btn-danger btn-xs'><span class='fa fa-ban'></a>";
                       
                        /*
                        if (registros[i]["factura_id"]>0) {
                        html += "<a href='"+base_url+"factura/imprimir_factura_id/"+registros[i]["factura_id"]+"/2' title='Factura' target='_blank' class='btn btn-warning btn-xs'><span class='fa fa-list'></a>";
                        }*/
                        //html += " <a href='"+base_url+"inscripcion/edit/"+registros[i]["inscripcion_id"]+"'  class='btn btn-info btn-xs'><span class='fas fa-edit'></a>";
                        html += " <a class='btn bg-danger btn-xs' data-toggle='modal' data-target='#myModal"+registros[i]['inscripcion_id']+"' title='Eliminar'><span class='fas fa-ban'></span></a>";
                        html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                        html += "<div class='modal fade' id='myModal"+registros[i]['inscripcion_id']+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]['inscripcion_id']+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b> <span class='fa fa-trash'></span></b>";
                        html += "Desea eliminar la inscripcion de <b># "+registros[i]["cliente_nombre"]+"?</b>";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"inscripcion/remove/"+registros[i]["inscripcion_id"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += " <a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        html += "<!------------------------ INICIO modal para reincribir ------------------->";
                        html += "<div class='modal fade' id='reincribir"+registros[i]['inscripcion_id']+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]['inscripcion_id']+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<h4> Reincribir a: "+registros[i]["cliente_nombre"]+"</h4>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                      
                        html += "<div id='reinscripcion"+registros[i]['inscripcion_id']+"'></div>";
                        html += "</div>";
                        
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para reincribir ------------------->";
                        html += "</td>";
                        
                        html += "</tr>";
                    } 
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td align='right'><b>TOTAL</b></td>";
                        html += "<td align='right'><font size='4'><b>"+Number(total).toFixed(2)+"</b></font></td>";
                        html += "<td></td>";
                       
                        html += "<td></td>";
                        html += "</tr>";
                   
                   $("#inscritos").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#inscritos").html(html);
        }
        
    });   

}

function vencimiento()
{
  filtro = " and date(inscripcion_fechafin) <= date_add(date(now()), INTERVAL +5 DAY)";   
        
  fechadeinscripcion(filtro); 
} 

function calcular_fecha()
{
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"inscripcion/calcular_fecha";
   var servicio = document.getElementById('serviciote_id').value;
   var fecha_inicio = document.getElementById('inscripcion_fechaini').value;
   var inicio = new Date(fecha_inicio);//moment(fecha_inicio).format('YYYY-MM-DD');

       $.ajax({url: controlador,
           type:"POST",
           data:{servicio:servicio},
          
           success:function(resul){     
              
                            
               var registros =  JSON.parse(resul);
               //alert(inicio);
               if (registros != null){
                  var meses = Number(registros['serviciote_duracion']);
                  $("#periodo").val(meses); 
                  $("#inscripcion_monto").val(registros['serviciote_precio']); 
                  var fecha_fin = moment(inicio.setMonth(inicio.getMonth() + meses)).format('YYYY-MM-DD');
                  $("#inscripcion_fechafin").val(fecha_fin); 
                   
                              
                   
            }
                
        },
        error:function(resul){
           alert("Algo salio mal...!!!");
          
        }
        
    });
}

function calcularfin()
{
   var periodo = document.getElementById('periodo').value;
   if (periodo=='') {
       alert('Primero debe seleccionar un servicio');
   } else {
   var fecha_inicio = document.getElementById('inscripcion_fechaini').value;
   var inicio = new Date(fecha_inicio);//moment
   var fecha_fin = moment(inicio.setMonth(inicio.getMonth() + Number(periodo))).format('YYYY-MM-DD');
   $("#inscripcion_fechafin").val(fecha_fin);     
   }
   
}


function reinscribir(inscripcion)
{
  var base_url    = document.getElementById('base_url').value;
  var controlador = base_url+"inscripcion/reinscripcion/"+inscripcion;
  $.ajax({url: controlador,
           type:"POST",
           data:{},
          
           success:function(resul){     
              
                            
               var resultados =  JSON.parse(resul);
               var registros = resultados.inscripcion;
               var servicio = resultados.servicios;
               var n = servicio.length; //tama単o del arreglo de la consulta
               //var fechaini = registros["inscripcion_fechaini"];
               var fecha_fin = registros["inscripcion_fechafin"]; 
               var periodo = registros["serviciote_duracion"]; 
               var inicio = new Date(fecha_fin);//moment
               var hoy = new Date();
               alert(hoy);
               alert(inicio);
               if (hoy.getMonth() + 1 <= inicio) {
                var fecha_ini = moment(inicio.setDate(inicio.getDate() + 2 )).format('YYYY-MM-DD'); 
              }else{
                var fecha_ini = moment(hoy).format('YYYY-MM-DD');
              }
               
               var inicio2 = new Date(fecha_ini);//moment
               var fecha_fin = moment(inicio2.setMonth(inicio2.getMonth() + Number(periodo))).format('YYYY-MM-DD');
               
                    
               //alert(inicio);
               if (registros != null){
                        html = "";

                        html += "<!------------------------------------------------------------------->";
                        html += "<form action='inscripcion/add' method='POST' ";
                        html += "<div class='row'>";
                        html += "<div class='col-md-6'>";
                        html += "<label for='serviciote_id' class='control-label'>Servicio</label>";
                        html += "<div class='form-group'>";
                        html += "<select name='serviciote_id' class='form-control' id='serviciote_id' onchange='calcular_fecha()'' required>";
                        for (var i = 0; i < n ; i++){
                        html += "<option value='"+servicio[i]['serviciote_id']+"' ";
                        if(servicio[i]['serviciote_id']==registros['serviciote_id'])  {
                        html += "selected";
                        } 
                        html += ">"+servicio[i]['serviciote_nombre']+" Meses: "+servicio[i]['serviciote_duracion']+"</option>"
                        }
                        html += "<input type='hidden' value='"+periodo+"' class='form-control' id='periodo' />";
                        html += "<input type='hidden' name='cliente_id' value='"+registros['cliente_id']+"' class='form-control' id='cliente_id' />";
                        html += "</div></div>";
                        html += "<div class='col-md-6'>";
                        html += "<label for='inscripcion_monto' class='control-label'>Monto</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='number' min='0' step='any' required name='inscripcion_monto' value='"+registros["inscripcion_monto"]+"' class='form-control' id='inscripcion_monto' />";
                        html += "</div></div>";
                        html += "<div class='col-md-6'>";
                        html += "<label for='inscripcion_fechaini' class='control-label'>Fecha Inicio</label>";
                        html += "<div class='form-group'>";
                        html += "<input onchange='calcularfin()' type='date' required name='inscripcion_fechaini' value='"+fecha_ini+"' class='form-control' id='inscripcion_fechaini' />";
                        html += "</div></div>";
                        html += "<div class='col-md-6'>";
                        html += "<label for='inscripcion_fechafin' class='control-label'>Fecha Fin</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='date' name='inscripcion_fechafin' readonly value='"+fecha_fin+"' class='form-control' id='inscripcion_fechafin' />";
                        html += "</div></div>";
                        html += "</div>";
                        html += "<!------------------------------------------------------------------->";  
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<button type='submit' class='btn btn-success'><span class='fa fa-check'></span> Si </button>";
                        html += " <a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div></form>";
                              
                   $('#reinscripcion'+registros['inscripcion_id']).html(html);
            }
                
        },
        error:function(resul){
           alert("Algo salio mal...!!!");
          
        }
        
    });

}

function insvalidar(e) {

  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){ 
            buscarcliente();            
    }     
}


function buscarcliente(){

   var base_url = document.getElementById('base_url').value;
   var cliente_ci = document.getElementById('cliente_ci').value;
   var controlador = base_url+'inscripcion/buscarcliente'; 

    $.ajax({url:controlador,

            type:"POST",

            data:{cliente_ci:cliente_ci},

            success:function(respuesta){

                var registros = eval(respuesta);
                
                if (registros[0]!=null){
                    
                    $("#cliente_nombre").val(registros[0]["cliente_nombre"]);
                    $("#cliente_celular").val(registros[0]["cliente_celular"]);
                    $("#cliente_id").val(registros[0]["cliente_id"]);                  

                }

                else

                {
                    alert('No existe un cliente con ese C.I.');
                    document.getElementById('cliente_ci').focus();
                    $("#cliente_nombre").val("");
                    $("#cliente_celular").val("");
                    $("#cliente_id").val('');
                }
            },

            error:function(respuesta){      

              alert('No existe un cliente con ese C.I.');

                document.getElementById('cliente_ci').focus();

                $("#cliente_id").val('');

            }                

    });
  }