$(document).on("ready",inicio);
function inicio(){
        
    buscar_compras();
        
}

function buscar_compras()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var opcion      = document.getElementById('select_compra').value;
 
    

    if (opcion == 1)
    {
        filtro = " and date(compra_fecha) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('Del Dia');
               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(compra_fecha) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('De Ayer');
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(compra_fecha) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('De la Semana');
            }

    
    if (opcion == 4) 
    {   filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");

    }
    
    if (opcion == 5) {

        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }

    fechadecompra(filtro);
}

function buscar_por_fecha()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
   var tipotrans_id = document.getElementById('tipotrans_id').value;

   var fecha1 = "Desde: "+moment(fecha_desde).format('DD/MM/YYYY');
   var fecha2 = "Hasta: "+moment(fecha_hasta).format('DD/MM/YYYY');
   var tipotrans = $('select[name="tipo_transa"] option:selected').text();
   var tipo = "Tipo: "+tipotrans;
    if (tipotrans_id==0) {
         filtro = " and date(compra_fecha) >= '"+fecha_desde+"'  and  date(compra_fecha) <='"+fecha_hasta+"' ";
         $("#busquedaavanzada").html(fecha1+" "+fecha2);
    } else {
    filtro = " and date(compra_fecha) >= '"+fecha_desde+"'  and  date(compra_fecha) <='"+fecha_hasta+
            "' and c.tipotrans_id = "+tipotrans_id;
             $("#busquedaavanzada").html(fecha1+" "+fecha2+" "+tipo);
        }
    fechadecompra(filtro);

    
}

function fechadecompra(filtro)
{   
      
   var base_url    = document.getElementById('base_url').value;
   var controlador = base_url+"compra/buscarfecha";
   

    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
          
           success:function(resul){     
              
                            
                $("#pillados").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    
                    var cont = 0;
                    var total = Number(0);
                    var total_detalle = 0;
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+" ");
                   
                    html = "";
                 
                    
                    for (var i = 0; i < n ; i++){
                        
                        var suma = Number(registros[i]["compra_totalfinal"]);
                        var total = Number(suma+total);
                        var caja = registros[i]["compra_caja"];
                        var bandera = 1;
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["proveedor_nombre"]+"</b> ["+registros[i]["proveedor_id"]+"]<br>";
                        
                        if (registros[i]["tipotrans_nombre"]=='CREDITO') {
                        html += "<span class='badge badge-secondary'>"+registros[i]["tipotrans_nombre"]+"</span></br>";
                        } else {
                        html += "<span class='badge badge-primary'>"+registros[i]["tipotrans_nombre"]+"</span></br>";
                        }
                        if (caja==1) {  
                        html += "<span class='btn-warning btn-xs'>Pago con Caja</span>";  } 
                        if (caja==2) {  
                        html += "<span class='btn-warning btn-xs'>Orden de pago</span>";  }
                        if (caja==0) {  
                        html += "<span class='btn-warning btn-xs'>Otro</span>";  }
                        html += "</td><td align='center'><b>"+registros[i]["compra_id"]+"</b></td>";                                           
                        html += "<td align='right' > Subtotal:"+numberFormat(Number(registros[i]["compra_subtotal"]).toFixed(2))+"<br>Desc: "+Number(registros[i]["compra_descuento"]).toFixed(2)+"<br> DescGlobal: "+Number(registros[i]["compra_descglobal"]).toFixed(2)+"<br>";
                        html += "<b>Total:"+numberFormat(Number(registros[i]["compra_totalfinal"]).toFixed(2))+"</b></td>";
                        html += "<td  align='center'>"+moment(registros[i]["compra_fecha"]).format('DD/MM/YYYY')+"<br>"+registros[i]['compra_hora']+"</td>" ;
                        
                        html += "<td  align='center' style='background: #"+registros[i]["estado_color"]+"'>"+registros[i]["estado_descripcion"]+"<br>";
                        /*if (Number(registros[i]["compra_placamovil"])==1) {  
                        html += "<span class='btn-danger btn-xs'>NO FINALIZADO</span>";  }  */
                        html += "<td>"+registros[i]["usuario_nombre"]+"</td><td class='no-print'>";
                        /*if (Number(registros[i]["compra_placamovil"])==1) {
                        html += "<a href='#' data-toggle='modal' data-target='#cambi"+registros[i]["compra_id"]+"' class='btn btn-info btn-xs' title='Modificar Compra'><i class='fas fa-edit'></i></a>";
                        html += "<div class='modal fade' id='cambi"+registros[i]["compra_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
                        html += "<div class='modal-dialog' style='border: 1px;' role='document'>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                        html += "<div class='form'><center><H4> Desea continuar con esta compra? </H4></center></div>";
                        html += "<div class='modal-footer'>";
                        html += "<a  href='"+base_url+"compra/edit/"+registros[i]["compra_id"]+"/1'  class='btn btn-md btn-success'><i class='fa fa-sign-out '></i> Si, continuar con la compra</a>";
                        html += " <a  href='"+base_url+"compra/borrarauxycopiar/"+registros[i]["compra_id"]+"'  class='btn btn-md btn-danger' ><i class='fa fa-sign-in '></i> No, borrar datos y rehacer la compra</a>";
                        html += "</div> </div></div></div></div>";
                        } else {
                        
                        }*/
                        html += "<a href='"+base_url+"compra/nota/"+registros[i]["compra_id"]+"' target='_blank' class='btn btn-success btn-xs' title='Nota de Compra'><span class='fa fa-print'></span></a>";
                        if (Number(registros[i]["elestado"])==1) {
                        html += " <a href='"+base_url+"compra/borrarauxycopiar/"+registros[i]["compra_id"]+"'  class='btn btn-info btn-xs' title='Modificar Compra'><span class='fas fa-edit'></span></a>";
                        html += " <a href='#' data-toggle='modal' data-target='#anularmodal"+registros[i]["compra_id"]+"' class='btn btn-xs btn-danger' title='Anular Compra' ><i class='fa fa-ban'></i></a>";
                        /*****modal anula compra ***/
                        }
                        html += "  <div class='modal fade' id='anularmodal"+registros[i]["compra_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";

                        html += "          <div class='modal-dialog' role='document'>";
                        html += "            <div class='modal-content'>";
                        html += "              <div class='modal-header bg-danger'>";
                        html += "                <h4><b>ADVERTENCIA </b></h4> ";
                        html += "              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        html += "                    <span aria-hidden='true'>x</span>";
                        html += "                </button>";
                        html += "              </div>";
                        html += "              <div class='modal-body' align='center'>";
                                       
                                 
                        html += "               <h4> Desea anular la compra No.: <b>"+registros[i]["compra_id"]+"? </b></4><br>";
                        html += "               <h4> Esta compra puede tener una orden de Pago, tomar en cuenta. </4></div>";
                                  
                        html += "              <div class='modal-footer' align='right'>";

                        html += "            <a href='"+base_url+"compra/anular/"+registros[i]["compra_id"]+"' class='btn btn-warning' >";
                        html += "              <i class='fa fa-check'></i>   Anular";
                        html += "            </a> ";
                        html += "            <button class='btn btn-danger' data-dismiss='modal'>";
                        html += "                <i class='fa fa-times'></i>   Cancelar";
                        html += "            </button>                   ";
                        html += "        </div>";
                        html += "            </div>";
                        html += "          </div>";
                        html += "        </div>";

                        //fin modaaaaaaaaaaaaaaaal//
                        html += "</td>";
                       
                       
                        html += "</tr>";
                       
                   }
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td align='right'><b>TOTAL</b></td>";
                        html += "<td align='right'><font size='4'><b>"+numberFormat(Number(total).toFixed(2))+"</b></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "</tr>";
                   
                   $("#fechadecompra").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#fechadecompra").html(html);
        }
        
    });   

} 


function compraproveedor(e)
{   
     tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){ 
    var controlador = "";
    var parametro = "";
   
    var base_url = document.getElementById('base_url').value;
    
   
        controlador = base_url+'compra/buscarprove/';
        parametro = document.getElementById('comprar').value; 
       
    
    }

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
               
                            
                
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   
                   
                    var cont = 0;
                    var total = Number(0);
                    var total_detalle = 0;
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+" ");
                    html = "";
                  
                    
                     for (var i = 0; i < n ; i++){
                        
                        var suma = Number(registros[i]["compra_totalfinal"]);
                        var total = Number(suma+total);
                        var caja = registros[i]["compra_caja"];
                        var bandera = 1;
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["proveedor_nombre"]+"</b> ["+registros[i]["proveedor_id"]+"]<br>";
                        if (registros[i]["tipotrans_nombre"]=='CREDITO') {
                        html += "<span class='badge badge-secondary'>"+registros[i]["tipotrans_nombre"]+"</span></br>";
                        } else {
                        html += "<span class='badge badge-primary'>"+registros[i]["tipotrans_nombre"]+"</span></br>";
                        }
                         
                        if (caja==1) {  
                        html += "<span class='btn-warning btn-xs'>Pago con Caja</span>";  } 
                        if (caja==2) {  
                        html += "<span class='btn-warning btn-xs'>Orden de pago</span>";  }
                        if (caja==0) {  
                        html += "<span class='btn-warning btn-xs'>Otro</span>";  }
                        html += "</td><td align='center'>"+registros[i]["compra_id"]+"</b></td>";                                          
                        html += "<td align='right'> Subtotal:"+numberFormat(Number(registros[i]["compra_subtotal"]).toFixed(2))+"<br>Desc: "+Number(registros[i]["compra_descuento"]).toFixed(2)+"<br> DescGlobal: "+Number(registros[i]["compra_descglobal"]).toFixed(2)+"<br>";
                        html += "<b>Total:"+numberFormat(Number(registros[i]["compra_totalfinal"]).toFixed(2))+"</b></td>";
                        html += "<td  align='center'>"+moment(registros[i]["compra_fecha"]).format('DD/MM/YYYY')+"<br>"+registros[i]['compra_hora']+"</td>" ;
                        
                        html += "<td  align='center' style='background: #"+registros[i]["estado_color"]+"'>"+registros[i]["estado_descripcion"]+"<br>";
                       /*if (Number(registros[i]["compra_placamovil"])==1) {  
                        html += "<span class='btn-danger btn-xs'>NO FINALIZADO</span>";  }  */
                        html += "<td>"+registros[i]["usuario_nombre"]+"</td><td class='no-print'>";
                        /*if (Number(registros[i]["compra_placamovil"])==1) {
                        html += "<a href='#' data-toggle='modal' data-target='#cambi"+registros[i]["compra_id"]+"' class='btn btn-info btn-xs' title='Modificar Compra'><i class='fas fa-edit'></i></a>";
                        html += "<div class='modal fade' id='cambi"+registros[i]["compra_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
                        html += "<div class='modal-dialog' style='border: 1px;' role='document'>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                        html += "<div class='form'><center><H4> Desea continuar con esta compra? </H4></center></div>";
                        html += "<div class='modal-footer'>";
                        html += "<a  href='"+base_url+"compra/edit/"+registros[i]["compra_id"]+"/1'  class='btn btn-md btn-success'><i class='fa fa-sign-out '></i> Si, continuar con la compra</a>";
                        html += " <a  href='"+base_url+"compra/borrarauxycopiar/"+registros[i]["compra_id"]+"'  class='btn btn-md btn-danger' ><i class='fa fa-sign-in '></i> No, borrar datos y rehacer la compra</a>";
                        html += "</div> </div></div></div></div>";
                        } else {
                        
                        }*/
                        html += "<a href='"+base_url+"compra/nota/"+registros[i]["compra_id"]+"' target='_blank' class='btn btn-success btn-xs' title='Nota de Compra'><span class='fa fa-print'></span></a>";

                        if (Number(registros[i]["elestado"])==1) {
                        html += " <a href='"+base_url+"compra/borrarauxycopiar/"+registros[i]["compra_id"]+"'  class='btn btn-info btn-xs' title='Modificar Compra'><span class='fas fa-edit'></span></a>";
                        html += " <a href='#' data-toggle='modal' data-target='#anularmodal"+registros[i]["compra_id"]+"' class='btn btn-xs btn-danger' title='Anular Compra' ><i class='fa fa-ban'></i></a>";
                        }
                        /*****modal anula compra ***/
                        html += "  <div class='modal fade' id='anularmodal"+registros[i]["compra_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";

                        html += "          <div class='modal-dialog' role='document'>";
                        html += "            <div class='modal-content'>";
                        html += "              <div class='modal-header bg-danger'>";
                        html += "                <h4><b>ADVERTENCIA </b></h4> ";
                        html += "              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        html += "                    <span aria-hidden='true'>x</span>";
                        html += "                </button>";
                        html += "              </div>";
                        html += "              <div class='modal-body' align='center'>";
                                       
                                 
                        html += "               <h4> Desea anular la compra No.: <b>"+registros[i]["compra_id"]+" </b>?</4><br>";
                        html += "               <h4> Esta compra puede tener una orden de Pago, tomar en cuenta. </4></div>";
                                  
                        html += "              <div class='modal-footer' align='right'>";

                        html += "            <a href='"+base_url+"compra/anular/"+registros[i]["compra_id"]+"' class='btn btn-warning' >";
                        html += "              <i class='fa fa-check'></i>   Anular";
                        html += "            </a> ";
                        html += "            <button class='btn btn-danger' data-dismiss='modal'>";
                        html += "                <i class='fa fa-times'></i>   Cancelar";
                        html += "            </button>                   ";
                        html += "        </div>";
                        html += "            </div>";
                        html += "          </div>";
                        html += "        </div>";

                        //fin modaaaaaaaaaaaaaaaal//
                        html += "</td>";
                       
                       
                        html += "</tr>";
                       
                   }
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td align='right'><b>TOTAL</b></td>";
                        html += "<td align='right'><font size='4'><b>"+numberFormat(Number(total).toFixed(2))+"</b></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "</tr>";
                   
                   $("#fechadecompra").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#fechadecompra").html(html);
        }
        
    });   

} 

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\,/g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\,/g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(".")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf("."));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ",": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(".")>=0)
            resultado+=numero.substring(numero.indexOf("."));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
}

function imprimir_compra(){
    var estafh = new Date();
    $('#fhimpresion').html(moment(estafh).format('DD/MM/YYYY'));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}
