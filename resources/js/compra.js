$(document).on("ready",inicio);
function inicio(){
        
        
        tabladetallecompra(); 
        tablatotales();
        
}

function imprimir_compra(){
    var estafh = new Date();
    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}
/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
/* recibe Date y devuelve en formato dd/mm/YYYY hh:mm:ss ampm */
function formatofecha_hora_ampm(string){
    var mifh = new Date(string);
    var info = "";
    var am_pm = mifh.getHours() >= 12 ? "p.m." : "a.m.";
    var hours = mifh.getHours() > 12 ? mifh.getHours() - 12 : mifh.getHours();
    if(string != null){
       info = aumentar_cero(mifh.getDate())+"/"+aumentar_cero((mifh.getMonth()+1))+"/"+mifh.getFullYear()+" "+aumentar_cero(hours)+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds())+" "+am_pm;
   }
    return info;
}

function borrartodo(){
    var base_url = document.getElementById('base_url').value;
    var compra_id = document.getElementById('compra_idie').value;
    var controlador = base_url+'compra/borrartodo/';
    $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id},
           success:function(respuesta){  
                tabladetallecompra(); 
                },
        
    });
}  


function pasardetalle(e,compra_id,producto_id) {

  tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==13){ 


            detallecompra(compra_id,producto_id);
                      
                      

        }
}

function actualizadetalle(e,detalle_id,producto_id,compra_id) {

  tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==13){ 
             
            editadetalle(detalle_id,producto_id,compra_id);            

        }
}


function tabladetallecompra(){
     var controlador = "";
     //var limite = 1000;
     var base_url = document.getElementById('base_url').value;
     var compra_id = document.getElementById('compra_idie').value;
     var bandera = document.getElementById('bandera').value;
     var modificar_detalle = document.getElementById('modificar_detalle').value;
     var eliminar_detalle = document.getElementById('eliminar_detalle').value;
     controlador = base_url+'compra/detallecompra/';

     $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id},
           success:function(respuesta){     
               
                                     
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){                   
                   
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                    var total_detalle = Number(0);
                    var cantidad = Number(0);
                    var subtotal = Number(0);
                    var descuento = Number(0);
                    var descglo = Number(0);
                    var descuentosum = Number(0);
                    html = "";
                   /*if (n <= limite) x = n; 
                   else x = limite;*/
                    
                    for (var i = 0; i < n ; i++){
                        
                        //var suma = Number(registros[i]["detallecomp_total"]);
                        descuento += Number(registros[i]["detallecomp_descuento"]);
                        descglo += Number(registros[i]["detallecomp_descglobal"]);
                        subtotal += Number(registros[i]["detallecomp_subtotal"]);
                        cantidad += Number(registros[i]["detallecomp_cantidad"]);
                        
                        descuentosum += Number(registros[i]["detallecomp_descuento"])*Number(registros[i]["detallecomp_cantidad"]);
                        total_detalle += Number(registros[i]["detallecomp_subtotal"])-(Number(registros[i]["detallecomp_descuento"])*Number(registros[i]["detallecomp_cantidad"]));
                        if (esMobil()){

                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td colspan='2' style=''><a href='"+base_url+"producto/edit/"+registros[i]["producto_id"]+"' target='_blank' class='btn btn-info btn-xs' title='Modificar Producto'><span class='fas fa-edit'></span></a><b>"+registros[i]["producto_nombre"]+" / </b>";
                        
                        html += "<b>"+registros[i]["detallecomp_unidad"]+"</b>";                                            
                        html += "<br>"+registros[i]["detallecomp_codigo"]+"<br>";
                        if (registros[i]["detallecomp_fechavencimiento"]!='0000-00-00'&&registros[i]["detallecomp_fechavencimiento"]!=null) {
                        html += "Venc:"+moment(registros[i]["detallecomp_fechavencimiento"]).format('DD/MM/YYYY')+"";
                        }
                        html += "</td><td><input id='compra_identi'  name='compra_id' type='hidden' class='form-control' value='"+compra_id+"'>";
                        html += "<input id='producto_identi'  name='producto_id' type='hidden' class='form-control' value='"+registros[i]["producto_id"]+"'>" ;
                        
                        html += "<input  class='input-sm' style=' width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_precio"+registros[i]["detallecomp_id"]+"'  name='producto_precio"+registros[i]["producto_id"]+"' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")'  class='form-control'  value='"+Number(registros[i]["detallecomp_precio"]).toFixed(2)+"'  ></td>"; 
                        html += "<td><input  class='input-sm' style=' width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_costo"+registros[i]["detallecomp_id"]+"'  name='producto_costo"+registros[i]["producto_id"]+"' type='text' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' class='form-control' value='"+Number(registros[i]["detallecomp_costo"]).toFixed(2)+"' ></td>";
                        html += "<td><input  class='input-sm' style='width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_cantidad"+registros[i]["detallecomp_id"]+"'  name='cantidad' type='text' autocomplete='off' value='"+registros[i]["detallecomp_cantidad"]+"' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' >";
                        html += "<input id='detallecomp_id'  name='detallecomp_id' type='hidden' class='form-control' value='"+registros[i]["detallecomp_id"]+"'>";
                       
                        html += "<td style='text-align:center;'>"+Number(registros[i]["detallecomp_subtotal"]).toFixed(2)+"</b></td>";
                        html += "<td><input  class='input-sm' style='width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_descuento"+registros[i]["detallecomp_id"]+"'  name='descuento'  type='text' autocomplete='off' class='form-control' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' value='"+Number(registros[i]["detallecomp_descuento"]).toFixed(2)+"' >";
                       
                        html += "</td>";

                        html += "<td>"+Number(registros[i]["detallecomp_descglobal"]).toFixed(2)+"</td>";
                        html += "<td><center>";
                        html += "<span class='badge badge-success'>";
                        html += "<font size='1'> <b>"+Number(registros[i]["detallecomp_total"]).toFixed(2)+"</b> <br>";
                        html += "</span></center></td>";
                        ////////////////////////////formu////////////////
                        html += "<td style='padding-left:4px; padding-right:4px;'>";
                        if(modificar_detalle == 1){
                            html += "<button type='button' onclick='editadetalle("+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' class='btn btn-success btn-xs'><span class='fa fa-save'></span></button>";
                        }
                        html += "</td>";
                        ////////////////////////////////fin fotmu//////////////////////
                        //html += "<td><form action='"+base_url+"detalle_compra/quitar/"+registros[i]["detallecomp_id"]+"/"+compra_id+"'  method='POST' class='form'>";
                        //html += "<input id='bandera' class='form-control' name='bandera' type='hidden' value='"+bandera+"' />";
                        //html += "<button type='submit' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>";
                        html += "<td style='padding-left:4px; padding-right:4px;'>";
                        if(eliminar_detalle == 1){
                            html += "<button type='button' onclick='quitardetalle("+registros[i]["detallecomp_id"]+")' class='btn btn-danger btn-xs'><span class='fa fa-times'></span></button>";
                        }
                        //html += "</form></td>";
                        html += "</td>";
                        html += "<tr>";


                     }else{



                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td style='width:140px;'><a href='"+base_url+"producto/edit/"+registros[i]["producto_id"]+"' target='_blank' class='btn btn-info btn-xs' title='Modificar Producto'><span class='fas fa-edit'></span></a><b>"+registros[i]["producto_nombre"]+" / </b>";
                        
                        html += "<b>"+registros[i]["detallecomp_unidad"]+"</td>";                                            
                        html += "<td style='text-align:center;'>"+registros[i]["detallecomp_codigo"]+"<br><font size='1'>";
                        if (registros[i]["detallecomp_fechavencimiento"]!='0000-00-00'&&registros[i]["detallecomp_fechavencimiento"]!=null) {
                        html += "Venc:"+moment(registros[i]["detallecomp_fechavencimiento"]).format('DD/MM/YYYY')+"";
                        }
                        html += "</td><td><input id='compra_identi'  name='compra_id' type='hidden' class='form-control' value='"+compra_id+"'>";
                        html += "<input id='producto_identi'  name='producto_id' type='hidden' class='form-control' value='"+registros[i]["producto_id"]+"'>" ;
                        
                        html += "<input  class='input-sm' style='width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_precio"+registros[i]["detallecomp_id"]+"'  name='producto_precio"+registros[i]["producto_id"]+"' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")'  class='form-control'  value='"+Number(registros[i]["detallecomp_precio"]).toFixed(2)+"'  ></td>"; 
                        html += "<td><input  class='input-sm' style='width:100%;padding-left:0px; padding-right:0px;' id='detallecomp_costo"+registros[i]["detallecomp_id"]+"'  name='producto_costo"+registros[i]["producto_id"]+"' type='text' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' class='form-control' value='"+Number(registros[i]["detallecomp_costo"]).toFixed(2)+"' ></td>";
                        html += "<td style='padding-left:0px; padding-right:0px;'><input  class='input-sm' style='width:65px;' id='detallecomp_cantidad"+registros[i]["detallecomp_id"]+"'  name='cantidad' type='text' autocomplete='off' class='form-control' value='"+registros[i]["detallecomp_cantidad"]+"' type='text' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' >";
                        html += "<input id='detallecomp_id'  name='detallecomp_id' type='hidden' class='form-control' value='"+registros[i]["detallecomp_id"]+"'>";
                       
                        html += "<td style='text-align:center;'>"+Number(registros[i]["detallecomp_subtotal"]).toFixed(2)+"</b></td>";
                        html += "<td><input  class='input-sm' style='width:55px;' id='detallecomp_descuento"+registros[i]["detallecomp_id"]+"'  name='descuento'  type='text' autocomplete='off' class='form-control' onkeypress='actualizadetalle(event,"+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' value='"+Number(registros[i]["detallecomp_descuento"]).toFixed(2)+"' >";
                       
                        
                       
                  
                        html += "</td>";

                        html += "<td>"+Number(registros[i]["detallecomp_descglobal"]).toFixed(2)+"</td>";
                        html += "<td><center>";
                        html += "<span class='badge badge-success'>";
                        html += "<font size='2'> <b>"+Number(registros[i]["detallecomp_total"]).toFixed(2)+"</b> <br>";
                        html += "</span></center></td>";
                        ////////////////////////////formu////////////////
                        html += "<td style='padding-left:4px; padding-right:4px;'>";
                        if(modificar_detalle == 1){
                            html += "<button type='button' onclick='editadetalle("+registros[i]["detallecomp_id"]+","+registros[i]["producto_id"]+","+compra_id+")' class='btn btn-success btn-xs'><span class='fa fa-save'></span></button>";
                        }
                        html += "</td>";
                        ////////////////////////////////fin fotmu//////////////////////
                        //html += "<td><form action='"+base_url+"detalle_compra/quitar/"+registros[i]["detallecomp_id"]+"/"+compra_id+"'  method='POST' class='form'>";
                        //html += "<input id='bandera' class='form-control' name='bandera' type='hidden' value='"+bandera+"' />";
                        //html += "<button type='submit' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button>";
                        html += "<td style='padding-left:4px; padding-right:4px;'>";
                        if(eliminar_detalle == 1){
                            html += "<button type='button' onclick='quitardetalle("+registros[i]["detallecomp_id"]+")' class='btn btn-danger btn-xs'><span class='fa fa-times'></span></button>";
                        }
                        //html += "</form></td>";
                        html += "</td>";
                        html += "<tr>";
                     }
                    }
                    
                    html += "<th colspan='6' ><b>TOTAL</b></th>";
                    html += "<th align='right'><b>"+Number(subtotal).toFixed(2)+"</b></th>";
                    html += "<th align='right'><b>"+Number(descuentosum).toFixed(2)+"</b></th>";
                    html += "<th align='right'><b>"+Number(descglo).toFixed(2)+"</b></th>";
                    html += "<th align='right'><b>"+Number(total_detalle).toFixed(2)+"</b></th>";
                    html += "<th colspan='2'></th>";
                    html += "</tr>";

                   $("#detallecompringa").html(html);
                   tablatotales(total_detalle,descuentosum,subtotal);
                   
                }

        },
        error:function(respuesta){
          
        }
        
    });
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

function tablatotales(total_detalle,descuento,subtotal)
{

     var parcial = Number(subtotal-descuento);
     var globaly = Number(document.getElementById('compra_descglobal').value);
     var totalfinal = Number(total_detalle-globaly);
    $('#compra_subtotal').val(subtotal.toFixed(2));
   $('#compra_descuento').val(descuento.toFixed(2));
   $('#compra_total').val(parcial.toFixed(2));
    $("#compra_totalfinal").val(totalfinal.toFixed(2));
    $("#credito_monto").val(totalfinal.toFixed(2));
    //$("#venta_glogal").val(globaly);
     

     html = "";
     html += "<table><tr><td>Sub Total Bs:</td><td></td>";
     html += "<td style='text-align: right;'>"+subtotal.toFixed(2)+"</td>";
     html += "</tr><tr>";
     html += "<td>Descuento:</td><td></td>";
     html += "<td style='text-align: right;'>"+descuento.toFixed(2)+"</td>";
     html += "</tr><tr>";
     html += "<td>Descuento Global:</td><td style='width: 30px;'></td>";
     html += "<td style='text-align: right;'>"+globaly.toFixed(2)+"</td>";
     html += "</tr>";
     html += "<tr>";
     html += "<th><b>TOTAL FINAL:</b></th><td></td>";
     html += "<th style='text-align: right;'><b>"+totalfinal.toFixed(2)+"</b></th>";
     html += "</tr></table>";
 


    $("#detalleco").html(html); 
}


function detallecompra(compra_id,producto_id){
       
        var controlador = "";
        if(document.getElementById("agrupar").checked==true){
        var agrupar = 1; } else{
        var agrupar = 0;
        }
        var cantidad = document.getElementById('cantidaddetalle'+producto_id).value; 
        var descuento = document.getElementById('descuentodetalle'+producto_id).value;
        var producto_costo = document.getElementById('producto_costodetalle'+producto_id).value;
        var producto_precio = document.getElementById('producto_preciodetalle'+producto_id).value;
        var producto_fechavenc = document.getElementById('detallecomp_fechavencimiento'+producto_id).value;
        var producto_factor = document.getElementById('select_factor'+producto_id).value;
     

    var base_url = document.getElementById('base_url').value;
    
    controlador = base_url+'compra/ingresarproducto/';
  
     document.getElementById('producto'+producto_id).style.display = 'none';
     
    $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id, producto_id:producto_id, cantidad:cantidad, descuento:descuento, producto_costo:producto_costo, producto_precio:producto_precio, agrupar:agrupar, producto_fechavenc:producto_fechavenc,producto_factor:producto_factor},
           success:function(respuesta){     
               
                tabladetallecompra(); 
                
                                                         
                
        }
        
    });

}
 
function quitardetalle(detallecomp_id){


    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'compra/quitar/'+detallecomp_id;

    $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(respuesta){
                tabladetallecompra();
            }        
    });

}   

function editadetalle(detallecomp_id,producto_id,compra_id){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'compra/updateDetalle/';
    var costo = document.getElementById('detallecomp_costo'+detallecomp_id).value;
    var precio = document.getElementById('detallecomp_precio'+detallecomp_id).value;
    var cantidad = document.getElementById('detallecomp_cantidad'+detallecomp_id).value;
    var descuento = document.getElementById('detallecomp_descuento'+detallecomp_id).value;
    
    
    $.ajax({url: controlador,
            type:"POST",
            data:{detallecomp_id:detallecomp_id,costo:costo,precio:precio,cantidad:cantidad,descuento:descuento,producto_id:producto_id,compra_id:compra_id},
            success:function(respuesta){
                //alert(detallecomp_id);
                tabladetallecompra();
            }        
    });

} 
      
function modificarproveedores(compra_id,proveedor_id){
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'compra/modificarproveedor/';
    var nit = document.getElementById('proveedor_nit'+proveedor_id).value;
    var razon = document.getElementById('proveedor_razon'+proveedor_id).value;
    var codigo = document.getElementById('proveedor_codigo'+proveedor_id).value;
    var autorizacion = document.getElementById('proveedor_autorizacion'+proveedor_id).value;
    
    
    $.ajax({url: controlador,
            type:"POST",
            data:{proveedor_id:proveedor_id,nit:nit,razon:razon,codigo:codigo,autorizacion:autorizacion},
            success:function(respuesta){
                //alert(detallecomp_id);
                cambiarproveedores(compra_id,proveedor_id);
            }        
    });

} 
function cambiarproveedores(compra_id,proveedor_id) {
     
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+'proveedor/cambiarproveedor/';
    var limite = 500;
    //var nit = document.getElementById('proveedor_nit'+proveedor_id).value;
               // var razon_social = document.getElementById('proveedor_razon'+proveedor_id).value;
                //var codigo_control = document.getElementById('proveedor_codigo'+proveedor_id).value;
                //var autorzacion = document.getElementById('proveedor_autorizacion'+proveedor_id).value;
               
    $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id,proveedor_id:proveedor_id},
           success:function(respuesta){ 
               var registros =  JSON.parse(respuesta);
              if (registros != null){
                var n = registros.length;
                var p = 0;
               
               html = "";   
               html2 = "";   

                
             
                    html = registros[p]['proveedor_nombre'];
                     $("#provedordecompra").html(html);

                    html = "<input id='prove_id' type='hidden' value='"+proveedor_id+"'>";
                     $("#prove_iden").html(html);

                    html = registros[p]['proveedor_codigo'];
                     $("#provedorcodigo").html(html);
                  
                     html = "<a  href='#' data-toggle='modal' data-target='#modalcobrar' class='btn btn-xs btn-success' ><i class='fas fa-money-bill-alt'></i> Finalizar compra</a>";
                     var html5 = "<a href='#' data-toggle='modal' data-target='#modalcobrar' class='btn btn-app bg-success' style='width: 90px !important; height: 90px !important;'><i class='fas fa-money-bill-alt'></i><br>Finalizar<br>Compra<br></a>";
                    $("#provedorboton").html(html);
                    $("#provedorboton2").html(html5);

                    html2 += registros[p]['proveedor_autorizacion'];
                    var html3 = registros[p]['proveedor_nit'];
                    var html4 = registros[p]['proveedor_razon'];
                    $("#autori").val(html2); 
                    $("#factura_nit").val(html3); 
                    $("#factura_razonsocial").val(html4); 
                    

            } else{
                    html = "<a  onclick='myFunction()' href='#' class='btn btn-xs btn-success' ><i class='fas fa-money-bill-alt'></i> Finalizar compra </a>";
                    var html5 = "<a onclick='myFunction()' class='btn btn-app bg-success' style='width: 90px !important; height: 90px !important;'><i class='fas fa-money-bill-alt'></i><br>Finalizar<br>Compra<br></a>";
                        $("#provedorboton").html(html);
                        $("#provedorboton2").html(html5);
                        }
             },
            error:function(respuesta){
           html = "";
           $("#provedordecompra").html(html);
          
} 
            });   

 

}

function crearproveedor(compra_id) {
     
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+'proveedor/rapido/';
    var limite = 500;
    
                var proveedor_nombre = document.getElementById('proveedor_nombre1').value;

                var proveedor_nit = document.getElementById('proveedor_nit').value;
                var proveedor_razon = document.getElementById('proveedor_razon').value;
                var proveedor_codigo = document.getElementById('proveedor_codigo1').value;
                var proveedor_autorizacion = document.getElementById('proveedor_autorizacion').value;
                var proveedor_contacto = document.getElementById('proveedor_contacto').value;
                var proveedor_direccion = document.getElementById('proveedor_direccion').value;
                var proveedor_telefono = document.getElementById('proveedor_telefono').value;
                 var proveedor_telefono2 = document.getElementById('proveedor_telefono2').value;
                var categoriaprov_id = document.getElementById('categoriaprov_id').value;
                
            $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id,proveedor_nombre:proveedor_nombre,proveedor_nit:proveedor_nit,proveedor_razon:proveedor_razon,proveedor_codigo:proveedor_codigo,proveedor_autorizacion:proveedor_autorizacion,proveedor_contacto:proveedor_contacto,proveedor_direccion:proveedor_direccion,proveedor_telefono:proveedor_telefono,proveedor_telefono2:proveedor_telefono2,categoriaprov_id:categoriaprov_id},
           success:function(respuesta){ 
                var registros =  JSON.parse(respuesta);
                 if (registros != null){
                 var n = registros.length;
                var p = 0;
                var proveedor_id = registros[p]['proveedor_id']; 
                   html = "";   

                
             
                    html1 = registros[p]['proveedor_nombre'];
                     $("#provedordecompra").html(html1);

                    html2 = "<input id='prove_id' type='hidden' value='"+proveedor_id+"'>";
                     $("#prove_iden").html(html2);

                    html3 = registros[p]['proveedor_codigo'];
                     $("#provedorcodigo").html(html3);
                  
                     html4 = "<a  href='#' data-toggle='modal' data-target='#modalcobrar' class='btn btn-xs btn-success' ><i class='fas fa-money-bill-alt'></i> Finalizar compra</a>";
                    $("#provedorboton").html(html4);
                    var html5 = "<a href='#' data-toggle='modal' data-target='#modalcobrar' class='btn btn-app bg-success' style='width: 90px !important; height: 90px !important;'><i class='fas fa-money-bill-alt'></i><br>Finalizar<br>Compra</a>";
                     $("#provedorboton2").html(html5);
                     $("#modalproveedor").modal('hide');
                     $("#proveedor_nombre1").val('');
                     $("#proveedor_codigo1").val('');
                     $("#categoriaprov_id").val('');
                     $("#proveedor_razon").val('');
            } else{
                    
                    html4 = "<a onclick='myFunction()' href='#' class='btn btn-xs btn-success'><i class='fas fa-money-bill-alt'></i> Finalizar compra </a>";
                        $("#provedorboton").html(html4);
                    var html5 = "<a onclick='myFunction()' class='btn btn-app bg-success' style='width: 90px !important; height: 90px !important;'><i class='fas fa-money-bill-alt'></i><br>Finalizar<br>Compra</a>";

                        $("#provedorboton2").html(html5);
                        $("#mensaje").html("<br> Debe ingresar un Nombre unico y seleccionar categoria");

                        }
             },

              
 error:function(respuesta){
           html = "";
           $("#provedordecompra").html(html);
          
} 
            });   

 

}

function validacompra(e,opcion) {
  tecla = (document.all) ? e.keyCode : e.which;
   
    if (tecla==13){ 
    
        if (opcion==1){             
            buscarcliente();            
        }

        if (opcion==2){   
            $("#telefono").val(''); //si la tecla proviene del input telefono
           document.getElementById('telefono').focus();           
        } 
        if (opcion==3){   //si la tecla proviene del input codigo de barras
            buscarporcodigo();           
        } 
        if (opcion==4){   //si la tecla proviene del
 
            compraproveedor(1);           
        } 
        
    } 

    
}
function compravalidar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){ 
    
       
            tablaresultados(1);           
        
        
    } 

    
}
function compraproducto(e,opcion) {
  tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){ 
    
        if (opcion==1){             
            buscarcliente();            
        }

        if (opcion==2){   
            $("#telefono").val(''); //si la tecla proviene del input telefono
           document.getElementById('telefono').focus();           
        } 
        if (opcion==3){   //si la tecla proviene del input codigo de barras
            buscarporcodigo();           
        } 
        if (opcion==4){   //si la tecla proviene del 
       
            tablareproducto(1);  
           
        } 
        
    } 

    
}



   function reporte_compras()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var opcion      = document.getElementById('select_compra').value;
 
    

    if (opcion == 1)
    {
        filtro = " and date(compra_fecha) = date(now())";
        mostrar_ocultar_buscador("ocultar");

               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(compra_fecha) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(compra_fecha) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");

            }

    
    if (opcion == 4) 
    {   filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");

    }
    
    if (opcion == 5) {

        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }

    reportefechadecompra(filtro);
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function mostrar_radio(){
     var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var opcionradio      = document.getElementById('tipotrans').value;
     if (opcionradio == 2) {

       document.getElementById('radio').style.display = 'none';
       document.getElementById('credin').style.display = 'block';
       document.getElementById('compra_caja0').checked = true;
       
    }
     else{
        document.getElementById('radio').style.display = 'block';
        document.getElementById('credin').style.display = 'none';}
}



function buscar_reporte_fecha()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var tipotrans_id = document.getElementById('tipotrans_id').value;
    
    filtro = " and date(compra_fecha) >= '"+fecha_desde+"'  and  date(compra_fecha) <='"+fecha_hasta+
            "' and c.tipotrans_id = "+tipotrans_id;
    reportefechadecompra(filtro);

    
}

function buscar_reporte_proveedor()
{

    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var proveedor_id = document.getElementById('proveedor_id').value;
    
   if (fecha_desde =='' && fecha_hasta ==''){

    filtro =  " and p.proveedor_nombre = '"+proveedor_id+"' "
    reportefechadecompra(filtro);
    }else{ 
    filtro = " and date(compra_fecha) >= '"+fecha_desde+"'  and  date(compra_fecha) <='"+fecha_hasta+
            "' and p.proveedor_nombre = '"+proveedor_id+"' "
    reportefechadecompra(filtro);
}
}
function buscar_reporte_producto(producto_id)
{

    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra";
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    //var producto_id = document.getElementById('producto_id').value;
    
   if (fecha_desde =='' && fecha_hasta ==''){

    filtro =  " and dc.producto_id = "+producto_id+" "
    reportefechadecompra(filtro);
    }else{ 
    filtro = " and date(compra_fecha) >= '"+fecha_desde+"'  and  date(compra_fecha) <='"+fecha_hasta+
            "' and dc.producto_id = "+producto_id+" "
    reportefechadecompra(filtro);
}
}

//Selecciona los datos del nit

//muestra la tabla de productos disponibles para la venta
  function convertDateFormat(string) {
        var info = string.split('-').reverse().join('/');
        return info;
   }



function cambiarFecha()
{
    var base_url = document.getElementById('base_url').value;
    var compra_id = document.getElementById('compra_id').value;
    var fecha = document.getElementById('fechac').value;
    var hora = document.getElementById('horac').value;
    var controlador = base_url+"compra/cambiarfecha";
   
     
    $.ajax({url: controlador,
           type:"POST",
           data:{compra_id:compra_id,fecha:fecha,hora:hora},
          
           success:function(resul){
            var registros =  JSON.parse(resul);
                
                html = "";   

                    html = registros[0]['compra_fecha'];
                     $("#fechacompra").html(html);
                
       },
            error:function(resul){
           html = "mal";
           $("#fechacompra").html(html);
          
} 
            });   

 

}
//Tabla resultados de la busqueda
function tablaresultados(opcion)
{   
    var controlador = "";
    var parametro = "";
    var compra_id = document.getElementById('compra_id').value;
    var limite = 100;
    var base_url = document.getElementById('base_url').value;
    var bandera = document.getElementById('bandera').value;
    
    if (opcion == 1){
        controlador = base_url+'compra/buscarcompra/';
        parametro = document.getElementById('comprar').value    
       
    }
    
    if (opcion == 2){
        controlador = base_url+'venta/buscarcategorias/';
        parametro = document.getElementById('categoria_prod').value;
    }
    

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
               
                            
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   
                   
                    var cont = 0;
                    var cant_total = 0;
                    var total_detalle = 0;
                    var n = registros.length; //tama«Ðo del arreglo de la consulta
                    $("#encontrados").val("- "+n+" -");
                    html = "";
                   if (n <= limite) x = n; 
                   else x = limite;
                    
                    for (var i = 0; i < x ; i++){
                       
                        html += "<tr id='producto"+registros[i]["producto_id"]+"' style='display:'>";
                       // "echo form_open('cotizacion/insertarproducto/')"; 
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        //html += "<form action='"+base_url+"compra/ingresarproducto/'  method='POST' class='form'>";
                        html += "<div clas='row'>";                                            
                        html += "<div class='container' hidden>";
                        html += "<input id='compra_id'  name='compra_id' type='text' class='form-control' value='"+compra_id+"'>";
                        html += "<input id='producto_iddetalle'  name='producto_id' type='text' class='form-control' value='"+registros[i]["producto_id"]+"'>";
                        html += "<input id='descripcion'  name='descripcion' type='text' class='form-control' value='"+registros[i]["producto_nombre"]+","+registros[i]["producto_marca"]+","+registros[i]["producto_industria"]+"'>";
                        html += "<input id='detalle_costo'  name='detalle_costo' type='text' class='form-control' value='"+registros[i]["producto_costo"]+"'>";
                        //html += "<input id='producto_codigue'  name='producto_codigo' type='hidden' class='form-control' value='"+registros[i]["producto_codigo"]+"'>";
                        //html += "<input id='producto_unidade'  name='producto_unidad' type='hidden' class='form-control' value='"+registros[i]["producto_unidad"]+"'>";
                        html += "</div>";
                            
                        html += "<div class='col-md-12' style='padding-left: 0px;'>";

                        html += "<b><font size=2>"+registros[i]["producto_nombre"]+"    ("+registros[i]["producto_codigo"]+")</b>  <span class='btn bg-purple btn-xs' >"+Number(registros[i]["existencia"]).toFixed(2)+"</span>";
//                        html += " <span class='btn btn-danger btn-xs' style='font-size:10px; face=arial narrow;' title='Historial de precios de compra'><i class='fa fa-book'></i> </span>";

                       
                        html += " <span data-toggle='modal' data-target='#modalhistorial' class='btn btn-xs bg-navy' onclick='mostrar_historial("+registros[i].producto_id+")'  title='Historial de precios de compra'>";
                        html += "<i class='fa fa-book'></i>";
                        html += "</span>";
                        
                        
                        html += "   <select class='btn bg-warning btn-xs'  id='select_factor"+registros[i]["producto_id"]+"' onchange='mostrar_saldo("+registros[i]["existencia"]+","+registros[i]["producto_id"]+")'>";
                        html += "       <option value='1'>";
                        precio_unidad = registros[i]["producto_precio"];
                        html += "           "+registros[i]["producto_unidad"]+" Bs : "+precio_unidad.fixed(2)+"";
                        html += "       </option>";
                        
                        if(registros[i]["producto_factor"]>0){
                            precio_factor = parseFloat(registros[i]["producto_preciofactor"]);
                            precio_factorcant = parseFloat(registros[i]["producto_preciofactor"]) * parseFloat(registros[i]["producto_factor"]);

                            html += "       <option value='"+registros[i]["producto_factor"]+"'>";
                            html += "           "+registros[i]["producto_unidadfactor"]+" Bs: "+precio_factor.toFixed(2)+"/"+precio_factorcant.toFixed(2);
                            html += "       </option>";
                        }
                            if(registros[i]["producto_factor1"]>0){
                            precio_factor = parseFloat(registros[i]["producto_preciofactor1"]);
                            precio_factorcant = parseFloat(registros[i]["producto_preciofactor1"]) * parseFloat(registros[i]["producto_factor1"]);

                            html += "       <option value='"+registros[i]["producto_factor1"]+"'>";
                            html += "           "+registros[i]["producto_unidadfactor1"]+" Bs: "+precio_factor.toFixed(2)+"/"+precio_factorcant.toFixed(2);
                            html += "       </option>";
                        }

                            if(registros[i]["producto_factor2"]>0){
                            precio_factor = parseFloat(registros[i]["producto_preciofactor2"]);
                            precio_factorcant = parseFloat(registros[i]["producto_preciofactor2"]) * parseFloat(registros[i]["producto_factor2"]);

                            html += "       <option value='"+registros[i]["producto_factor2"]+"'>";
                            html += "           "+registros[i]["producto_unidadfactor2"]+" Bs: "+precio_factor.toFixed(2)+"/"+precio_factorcant.toFixed(2);
                            html += "       </option>";
                        }

                        if(registros[i]["producto_factor3"]>0){
                            precio_factor = parseFloat(registros[i]["producto_preciofactor3"]);
                            precio_factorcant = parseFloat(registros[i]["producto_preciofactor3"]) * parseFloat(registros[i]["producto_factor3"]);

                            html += "       <option value='"+registros[i]["producto_factor3"]+"'>";
                            html += "           "+registros[i]["producto_unidadfactor3"]+" Bs: "+precio_factor.toFixed(2)+"/"+precio_factorcant.toFixed(2);
                            html += "       </option>";
                        }

                        if(registros[i]["producto_factor4"]>0){
                            precio_factor = parseFloat(registros[i]["producto_preciofactor4"]);
                            precio_factorcant = parseFloat(registros[i]["producto_preciofactor4"]) * parseFloat(registros[i]["producto_factor4"]);

                            html += "       <option value='"+registros[i]["producto_factor4"]+"'>";
                            html += "           "+registros[i]["producto_unidadfactor4"]+" Bs: "+precio_factor.toFixed(2)+"/"+precio_factorcant.toFixed(2);
                            html += "       </option>";
                        }
                        
                        
                        
                        html += "   </select>";
                        
                        html += "   <br>";
                        if (esMobil()){
                            html += "<div align='right'>";

                            html += "<div class='col-md-2' style='padding-left: 0px;'>";
                            html += "Costo Bs: <input class='input-sm' id='producto_costodetalle"+registros[i]["producto_id"]+"'  style='width: 100px; background-color: lightgrey' autocomplete='off' name='producto_costo' type='number' step='0.01' class='form-control' value='"+registros[i]["producto_ultimocosto"]+"' > </div>";
                            html += "<div class='col-md-2' style='padding-left: 0px;' >";
                            html += "Prec.Venta Bs: <input class='input-sm' id='producto_preciodetalle"+registros[i]["producto_id"]+"'  style='width: 100px; background-color: lightgrey' autocomplete='off' name='producto_precio' type='number' step='0.01' class='form-control' value='"+registros[i]["producto_precio"]+"' ></div>";
                            html += "<div class='col-md-2' style='padding-left: 0px;' >";
                            html += "Desc.Unit. Bs: <input class='input-sm' id='descuentodetalle"+registros[i]["producto_id"]+"'  style='width: 100px; background-color: lightgrey' autocomplete='off'  name='descuento' type='number' class='form-control' value='0.00' step='.01' required ></div>";
                            html += "<div class='col-md-2'style='padding-left: 0px;'  >";
                            html += "Cantidad: <input class='input-sm ' id='cantidaddetalle"+registros[i]["producto_id"]+"' style='width: 100px;' name='cantidad' type='number' autocomplete='off' class='form-control' placeholder='cantidad' required value='1'> </div>";
                            html += "<div class='col-md-2' style='padding-left: 0px;' >";
                            html += "Fecha Venc.:<input class='input-sm ' type='date' id='detallecomp_fechavencimiento"+registros[i]["producto_id"]+"' style='width: 100px;padding-left: 0px;' name='detallecomp_fechavencimiento'  class='form-control' ></div>";
                            html += "</div>";
                            
                        }
                        else{
                        html += "<div class='row'>";    
                        html += "<div class='col-md-2' style='padding-left: 0px;' >";
                        html += "<label  class='control-label' style='margin-bottom :0px'>PREC. </label><input class='input-sm' style='padding-left: 1px;width:70px' id='producto_preciodetalle"+registros[i]["producto_id"]+"'   autocomplete='off' name='producto_precio' type='number' step='0.01' class='form-control' value='"+registros[i]["producto_precio"]+"' ></div>";
                        html += "<div class='col-md-2' style='padding-left: 0px;'>";
                        html += "<label  class='control-label' style='margin-bottom :0px'>COSTO </label><input class='input-sm' style='padding-left: 1px;width:70px' id='producto_costodetalle"+registros[i]["producto_id"]+"'   autocomplete='off' name='producto_costo' type='number' step='0.01' class='form-control' value='"+registros[i]["producto_ultimocosto"]+"' > </div>";
                        html += "<div class='col-md-2' style='padding-left: 0px;' >";
                        html += "<label  class='control-label' style='margin-bottom :0px'>DESC. </label><input class='input-sm' style='padding-left: 1px;width:70px' id='descuentodetalle"+registros[i]["producto_id"]+"' min='0' autocomplete='off' name='descuento' type='number' class='form-control' value='0.00' step='.01' required ></div>";
                        html += "<div class='col-md-2'style='padding-left: 0px;'  >";
                        html += "<label  class='control-label' style='margin-bottom :0px'>CANT. </label><input class='input-sm' style='padding-left: 1px; width:70px' id='cantidaddetalle"+registros[i]["producto_id"]+"'  name='cantidad' type='number' autocomplete='off' onclick='this.select()' onkeypress='pasardetalle(event,"+compra_id+","+registros[i]["producto_id"]+")' class='form-control' placeholder='cantidad' required value='1'> </div>";
                        html += "<div class='col-md-2' style='padding-left: 0px;' >";
                        html += "<label  class='control-label' style='margin-bottom :0px'>FEC.VENC. </label><input class='input-sm btn-info' style='padding-left: 1px; width:120px' type='date' id='detallecomp_fechavencimiento"+registros[i]["producto_id"]+"'  name='detallecomp_fechavencimiento'  class='form-control' ></div></td>";
                        html += "</div>";
                       }
                        
                       
                       
                       if (esMobil()){
                            html += "<div class='col-md-2' style='padding-right: 0px;' >";
                            html += "<button type='button' onclick='detallecompra("+compra_id+","+registros[i]["producto_id"]+")' class='btn btn-success btn-block'><i class='fa fa-cart-arrow-down'></i> Añadir</button>";
                      
                            
                       }
                       else{
                            html += "<td style='padding :0px'><div>";                      
                            html += "<label  class='control-label' style='margin-bottom :0px'>AÑADIR</label><button type='button' onclick='detallecompra("+compra_id+","+registros[i]["producto_id"]+")' class='btn btn-success'><i class='fa fa-cart-arrow-down'></i></button></div>";
                        }
                       //html += "<a href=''  onclick='submit()' class='btn btn-danger'><span class='fa fa-cart-arrow-down'></span></a>";
                        
                       // html += "</div>";
                        html += "</div>";
                        html += "</div>";
                       // html += "</form>";
                        html += "</td>";
                      //  "echo form_close()";
                       
                        html += "</tr>";

                   }   
                   $("#tablaresultados").html(html);
                   
            }
                
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        }
        
    });   

} 

//tabla de reportes de producto 
function tablareproducto(opcion)
{   
    var controlador = "";
    var parametro = "";
    
    var limite = 100;
    var base_url = document.getElementById('base_url').value;
   
    
    if (opcion == 1){
        controlador = base_url+'compra/buscarcompra/';
        parametro = document.getElementById('comprar').value    
       
    }
    
    if (opcion == 2){
        controlador = base_url+'venta/buscarcategorias/';
        parametro = document.getElementById('categoria_prod').value;
    }
    

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
               
                            
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   
                   
                    var cont = 0;
                    var cant_total = 0;
                    var total_detalle = 0;
                    var n = registros.length; //tama«Ðo del arreglo de la consulta
                    $("#encontrados").val("- "+n+" -");
                    html = "";
                   if (n <= limite) x = n; 
                   else x = limite;
                    
                    for (var i = 0; i < x ; i++){
                       
                        html += "<tr>";
                       // "echo form_open('cotizacion/insertarproducto/')"; 
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        
                        html += "<div clas='row'>";                                            
                        
                        html += "<b>"+registros[i]["producto_id"]+"</b>";
                        html += "<input id='producto_id'  name='producto_id' type='hidden' class='form-control' value='"+registros[i]["producto_id"]+"'>";
                        html += "</td>";
                        html += "</div>";   
                        html += "<div class='col-md-12'>";
                        html += "<td>";
                        html += "<b>"+registros[i]["producto_nombre"]+"</b>";
                        
                        html += "<td>";

                        html += "<button type='button' onclick='buscar_reporte_producto("+registros[i]["producto_id"]+")' class='btn btn-primary'><i class='fa fa-file'></i> Ver Reporte</button>";
                        
                        
                        
                        html += "</div>";
                        html += "</div>";
                      
                        html += "</td>";
                      
                       
                        html += "</tr>";

                   }
                 
                   
                   $("#tablareproducto").html(html);
                   
            }
                
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablareproducto").html(html);
        }
        
    });    

} 
function reportefechadecompra(filtro)
{   
      
   var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"compra/buscarrepofecha";
   
     
    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
          
           success:function(report){     
              
                            
                $("#enco").val("- 0 -");
               var registros =  JSON.parse(report);
           
               if (registros != null){
                   
                    
                    var cant = Number(0);
                    var total = Number(0);
                    var total_detalle = 0;
                    var n = registros.length; //tama«Ðo del arreglo de la consulta
                    $("#pillados").val("- "+n+" ");
                   
                    html = "";
                   
                   
                    for (var i = 0; i < n ; i++){
                        
                        cant += Number(registros[i]["detallecomp_cantidad"]);
                        var suma = Number(registros[i]["detallecomp_total"]);
                        var total = Number(suma+total);
                        //var bandera = 1;
                        html += "<tr>";
                      
                        html += "<td align='center'>"+(i+1)+"</td>";
                        
                        
                        html += "<td> "+registros[i]["producto_nombre"]+" </td>";                                            
                        html += "<td align='center'> "+registros[i]["producto_codigo"]+" </td>";
                        html += "<td align='center'> "+registros[i]["compra_id"]+" </td>";  
                         html += "<td align='center'> "+registros[i]["tipotrans_nombre"]+" </td>";  
                        html += "<td align='center'> "+registros[i]["producto_unidad"]+" </td>";                                                                                    
                        html += "<td>"+convertDateFormat(registros[i]["compra_fecha"])+""+registros[i]['compra_hora']+"</td>" ;                                          
                        html += "<td align='right'> "+registros[i]["detallecomp_cantidad"]+" </td>"; 
                        html += "<td align='right'> "+Number(registros[i]["detallecomp_costo"]).toFixed(2)+" </td>"; 
                        html += "<td align='right'><b>"+Number(registros[i]["detallecomp_total"]).toFixed(2)+"</b></td>";
                        
                        
                        html += "<td  align='center'>"+registros[i]["usuario_nombre"]+"</td>"; 
                       // html += "<td><a href='"+base_url+"compra/pdf/"+registros[i]["compra_id"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-print'> </a>";
                       // html += "<form action='"+base_url+"compra/edit/"+registros[i]["compra_id"]+"/"+bandera+"/'  method='POST' class='form'>";
                       // html += "<input type='hidden' id='bandera' name='bandera' value='1'>";
                       // html += "<button class='btn btn-info btn-xs' type='submit'><span class='fas fa-edit'> </button>";
                      //  html += "</form></td>";
                       
                       
                        html += "</tr>";
                       
                   }
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<th align='right'><b>TOTAL:</b></td>";
                        html += "<th align='right'><b>"+Number(cant).toFixed(2)+"</b></th>";
                        html += "<td></td>";
                        html += "<th align='right'><b>"+Number(total).toFixed(2)+"</b></th>";
                        html += "<td></td>";
                       
                        html += "</tr>";
                   
                   $("#reportefechadecompra").html(html);
                   
            }
                
        },
        error:function(result){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#reportefechadecompra").html(html);
        }
        
    });   

} 

function select_unidad(){
               var unidad    = document.getElementById('producto_unidad').value;
               html2 = "";  
               html2 += "<label for='unidad_compra' class='control-label'>Unidad Compra</label>";
               html2 += "<div class='form-group'>";   
               html2 += "<select name='unidad_compra' class='form-control' id='unidad_compra' >";
               html2 += "<option value='1'>"+unidad+"</option>";
               html2 += "</select></div>";
                   
               $("#select_unidad").html(html2);
}

function unidad_factor(){
               var unidad    = document.getElementById('producto_unidad').value;
               var unidad_factor    = document.getElementById('producto_unidadfactor').value;
               var factor    = document.getElementById('producto_factor').value;
               var precio_factor    = document.getElementById('producto_preciofactor').value;
               if (unidad_factor=='' || factor=='' || precio_factor=='') {
                alert('Debe llenar los datos de factor');
               
               }else{
                html2 = "";  
               html2 += "<label for='unidad_compra' class='control-label'>Unidad Compra</label>";
               html2 += "<div class='form-group'>";   
               html2 += "<select name='unidad_compra' class='form-control' id='unidad_compra' >";
               html2 += "<option value='1'>"+unidad+"</option>";
               html2 += "<option value='"+factor+"'>"+unidad_factor+"</option>";
               html2 += "</select></div>";
                   
               $("#select_unidad").html(html2);
               }
               
}

function esMobil(){
    
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };    

    return isMobile.any();
    
}


function formato_fecha(string){
    var info = "";
    if(string != null){
       info = string.split('-').reverse().join('/');
   }
    return info;
}

function mostrar_historial(producto_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"compra/historial_compras";
    
    html = "";
    
    $.ajax({url:controlador,
           type:"POST",
           data:{producto_id,producto_id},
           success:function(resultado){
               
               var reg = JSON.parse(resultado);
               var tam = reg.length;
               
               //alert(reg.length);
                html = "";               
                html += "<table class='table' id='mitabla'>";
                html += "<tr>";
                html += "<th>#</th>";
                html += "<th>Proveedor</th>";
                html += "<th>Costo</th>";
                html += "<th>Fecha</th>";
                html += "</tr>";
                
               if (tam>0){
                   for(i=0;i<tam;i++){
                     
                    html += "<tr>";
                     html += "<td>"+(i+1)+"</td>";
                     html += "<td>"+reg[i].proveedor_nombre+"</td>";
                     html += "<td><b>"+Number(reg[i].detallecomp_costo).toFixed(2)+"</b></td>";
                     html += "<td>"+formato_fecha(reg[i].compra_fecha)+"</td>";
                    html += "</tr>";
                       
                   }
               }
                html += "</table>";
                $("#tabla_historial").html(html);
               
           },
    });
    
}

function ocultar_busqueda(){
    var html = "";
    
    $("#tablaresultados").html("");
}