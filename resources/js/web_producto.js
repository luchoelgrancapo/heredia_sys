//Tabla resultados de la busqueda en el web de producto

$(document).on("ready",inicio);
function inicio(){
//var findIP = new Promise(r=>{var w=window,a=new (w.RTCPeerConnection||w.mozRTCPeerConnection||w.webkitRTCPeerConnection)({iceServers:[]}),b=()=>{};a.createDataChannel("");a.createOffer(c=>a.setLocalDescription(c,b,b),b);a.onicecandidate=c=>{try{c.candidate.candidate.match(/([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g).forEach(r)}catch(e){}}})
//findIP.then(ip => $('#myip').val(ip)).catch(e => console.error(e)); 
//$.getJSON('https://api.ipify.org?format=jsonp&callback=?', function(obj) {
//$("#seip").val((JSON.stringify(obj.ip)).replace(/['"]+/g, ''));    
//darip();
//});
 
    var UID = Math.floor(Math.random() * 999999999);    ////
 
    if (detectCookie('codigo_usuario')){
        UID = getCookie('codigo_usuario');
    }
    else
    {
        setCookie('codigo_usuario', UID, 30);

    }
        $('#seip').val(UID);/////
        darip();
 
    
  

}


function darip(){
    
    var seip = document.getElementById('seip').value;
    var myip = document.getElementById('myip').value; 
    var losip = myip+seip;

    ///$('#miip').val(losip);
   
    $('#miip').val(seip); ////
    
}
 

function registrarcli(){
    document.getElementById('registrarcli').style.display = 'block';
    document.getElementById('inisesion').style.display = 'none';

//    document.getElementById('boton_sesion').class = "btn btn-primary";
//    document.getElementById('boton_registro').class = "btn btn-dafault";
    $('#boton_sesion').removeClass("btn btn-primary").addClass("btn btn-default");
    $('#boton_registro').removeClass("btn btn-default").addClass("btn btn-primary");
    
    
}

function inisesion(){
    
    document.getElementById('inisesion').style.display = 'block';
    document.getElementById('registrarcli').style.display = 'none';
    
    
//
//    document.getElementById('boton_sesion').class = "btn btn-default";
//    document.getElementById('boton_registro').class = "btn btn-primary";
    
    $('#boton_sesion').removeClass("btn btn-default").addClass("btn btn-primary");
    $('#boton_registro').removeClass("btn btn-primary").addClass("btn btn-default");
    
    $('#modalCliente').on('shown.bs.modal', function() {
        $('#cliente_login').focus();      
    });
    
    
}

function buscarpro(e){
    tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){
        buscar_producto();
    }
}

function buscar_producto()
{
    var base_url = document.getElementById('base_url').value;
    var idioma_id = document.getElementById('idioma_id').value;
    controlador = base_url+'website/webbuscar_productos/';
    parametro = document.getElementById('parabuscar').value;
    
    if(parametro != ""){
        
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
        $.ajax({url: controlador,
            type:"POST",
            data:{parametro:parametro},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                
                mostrar_tabla_resultados(respuesta,1);
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
                $("#boton_buscar_prod").focus();
                                
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablaresultados").html(html);
            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }
        
        });
    }
    
    html = "<option value='0' selected>SUB CATEGORIAS</option>"                     

   $("#select_subcategoria").html(html);

}


function buscar_por_categoria(categoria_id)
{
    var base_url = document.getElementById('base_url').value;
    var idioma_id = document.getElementById('idioma_id').value;
    var controlador = base_url+'website/webbuscar_categoria/'+categoria_id;
    
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
        //Realiza la busqueda por categoria y la dibuja
        $.ajax({url: controlador,
            type:"POST",
            data:{categoria_id:categoria_id},
            success:function(respuesta){
                
                    
                    mostrar_tabla_resultados(respuesta,1);
                    
                        
                    document.getElementById('loader').style.display = 'none';
                
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablaresultados").html(html);
            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }
        
        });
        
      
        //Busca la subcategoria y la redibuja en el select
        var controlador = base_url+'website/obtener_subcategoria/'+categoria_id;
        $.ajax({url: controlador,
            type:"POST",
            data:{categoria_id:categoria_id},
            success:function(respuesta){
                                                        
                 html = "";
                 subcat = JSON.parse(respuesta);
                 cant = subcat.length;
                 
                html += "<option value='0' selected>SUB CATEGORIAS</option>"                     
                 for(i=0;i<cant;i++){
                     html += "<option value='"+subcat[i]["subcategoria_id"]+"'>"+subcat[i]["subcategoria_nombre"]+"</option>"                     
                 }
                 
               $("#select_subcategoria").html(html);
                    
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "<option value='0' selected>SUB CATEGORIAS</option>";
               $("#select_subcategoria").html(html);
            },
            complete: function (jqXHR, textStatus) {
               
                //tabla_inventario();
            }
        
        });

}

function buscar_por_subcategoria(subcategoria_id)
{
    var base_url = document.getElementById('base_url').value;
    var idioma_id = document.getElementById('idioma_id').value;
    var controlador = base_url+'website/webbuscar_subcategoria/'+subcategoria_id;
    
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    
        //alert(controlador);
        $.ajax({url: controlador,
            type:"POST",
            data:{subcategoria_id:subcategoria_id},
            success:function(respuesta){
                                   
                    mostrar_tabla_resultados(respuesta,1);
                    document.getElementById('loader').style.display = 'none';
                
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablaresultados").html(html);
            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }
        
        });

}

function mostrar_tabla_resultados(respuesta,pag){
        var borrar = "";//esto aumenteeeeeee//  
        $("#tablaresultados").html(borrar);  
        var objeto = respuesta;
        var registros = JSON.parse(respuesta);
        var base_url = document.getElementById('base_url').value;
        
        var n = registros.length; //tamaño del arreglo de la consulta
        var ancho_imagen = 240;  
        var alto_imagen = 240; 
        var idioma_id = document.getElementById('idioma_id').value;
        
        var bloque = 12; 
    
        var cadena = "";
        var nombre = "";
        var mimagen = "";
        var paginas = 0;
        var desde = 0;
        var hasta = 0;
        //$("#encontrados").val("- "+n+" -");

        html = "";

        if(n>0){
            
            //cantidad de paginas
            paginas =  Number(n) / Number(bloque); 
            paginas =  parseInt(paginas);
            
            if (n % bloque>0){
                paginas++;
                        
                        
            }
            desde = (pag * bloque) - bloque;
            hasta = (pag * bloque);

            if (pag == paginas){
                hasta = n;
            }
            //alert(desde+" "+hasta);
            //fin cantidad de paginas
                    
//            for (var i = 0; i < bloque ; i++){

            for (var i = desde; i < hasta ; i++){

                mimagen = "";
                
                if(registros[i]["producto_foto"] != null && registros[i]["producto_foto"] !=""){
                   
                    mimagen += "<img src='"+base_url+"resources/images/productos/"+registros[i]["producto_foto"]+"' alt=''/>";
//                    mimagen += "<img src='"+base_url+"resources/images/productos/thumb_"+registros[i]["producto_foto"]+"' class='img img-circle' width='"+ancho_imagen+"' height='"+alto_imagen+"' />";
                    
                }else{
                    
                    mimagen += "<img src='"+base_url+"resources/images/productos/producto.jpg'  alt=''/>";
                   
                }
                
                cadena = registros[i]["producto_nombre"];
                nombre = "";
                if(cadena.length>150){
                    nombre = cadena.substr(0, 20)+"...";
                }else{
                    nombre = registros[i]["producto_nombre"];
                }
                
                html += "<div class='col-md-3 col-xs-6'>";
                html += "<div class='product'>";
                html += "<div class='product-img'>";
                html += mimagen;
                html += "</div>";
                html += "<div class='product-body'>";
                html += "<p class='product-category'></p><h3  class='product-name' title='"+cadena+"'>"+nombre+"</h3>";
                html += "<h4 class='product-price'>Bs. "+Number(registros[i]["producto_precio"]).toFixed(2)+"</h4>";
                html += "<div class='product-rating'>";
                html += "</div>";
                html += "<a href='"+base_url+"website/single/"+registros[i]["producto_id"]+"'><div class='product-btns'>";
                html += "<button class='quick-view' tabindex='0'><i class='fa fa-eye'></i><span class='tooltipp'> Ver más</span></button>";
                html += "</div></a>";
                html += "</div>";
                html += "<div class='add-to-cart'>";
                
                html += "<input type='hidden' name='cmd' value='_cart'>";
                html += "<input type='hidden' name='add' id='cantidad"+registros[i]["producto_id"]+"' value='1'>";  
                html += "<input type='hidden' name='business' value=' '>";
                html += "<input type='hidden' name='item_name' value='"+registros[i]["producto_nombre"]+"'>";
                html += "<input type='hidden' name='amount' id='producto_precio"+registros[i]["producto_id"]+"' value='"+registros[i]["producto_precio"]+"'>";
                html += "<input type='hidden' name='costo' id='producto_costo"+registros[i]["producto_id"]+"' value='"+registros[i]["producto_costo"]+"'>";
                html += "<input type='hidden' name='discount_amount' id='descuento"+registros[i]["producto_id"]+"' value='0.00'>";
                html += "<input type='hidden' name='currency_code' value='USD'>";
                html += "<input type='hidden' name='return' value=' '>";
                html += "<input type='hidden' name='cancel_return' value=' '>";
                //html += "<input type='button' value='Añadir al pedido' onclick='insertar("+registros[i]["producto_id"]+")'  class='button'>";
                
                if (Number(registros[i]["existencia"])>0){
                    html += "<button type='button' onclick='insertar("+registros[i]["producto_id"]+")'  class='add-to-cart-btn'><fa class='fa fa-cart-plus'></fa> AGREGAR AL CARRRITO</button>";
                }
                else{
                    //html += "<button type='button' class='btn btn-sm btn-danger' style='background:red;'><fa class='fa fa-frown-o'></fa> AGOTADO</button>";
                    html += "<button type='button' class='btn btn-sm btn-danger' disabled>AGOTADO</button>";
                }
                //html += "<input type='button' name='submit' data-toggle='modal' data-target='#modalCart' value='Añadir al pedido' class='button'>";
              
                html += "</div>";
                html += "</div>";

                html += "</div>";
                html += "</div>";
                
                
                if ((i+1) % 4 ==0) {
                html += "<div class='clearfix visible-sm visible-xs'> </div>";
                }

           }

           if (paginas>1){
                
                html += "<div class='container'>";
                html += "<div class='col-md-12'>";
                html += "<div class='pull-right'>";
                html += "<div class='btn-group' role='group' aria-label='Button group with nested dropdown'>";
                                

                html += "<select type='button' name='oferta' class='btn btn-danger btn-sm' id='oferta' onchange='mostrar_tabla_resultados("+JSON.stringify(respuesta)+",this.value)'>";
                for (i=1; i<=paginas; i++){                    
                    if (pag==i){
                        seleccionado = "selected";
                    }else{
                        seleccionado = "";                        
                    }
                    
                    html += "<option value='"+i+"' "+seleccionado+">Página: "+i+"</option>";
                }
                html += "</select>";
                                
                html += "</div>";
                html += "</div>";
                
                //botones
//                html += "<button type='button' class='btn btn-primary' onclick='mostrar_tabla_resultados("+JSON.stringify(respuesta)+","+1+")'> >| </button>"
//                for (i=1; i<=paginas; i++){                    
//                    html += "<button type='button' class='btn btn-primary' onclick='mostrar_tabla_resultados("+JSON.stringify(respuesta)+","+i+")'>"+i+"</button>"                                
//                }
                // fin botones
                
               
               
           }

           $("#tablaresultados").html(html);
        }
}


function buscar_categoria(categoria)
{
    var base_url = document.getElementById('base_url').value;
    var idioma_id = document.getElementById('idioma_id').value;
    var controlador = base_url+'website/webbuscar_categoria/'+categoria;
    
    if(categoria != ""){
        document.getElementById('loader1').style.display = 'block'; //muestra el bloque del loader
        $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(respuesta){
                //$("#encontrados").val("- 0 -");
                var registros =  JSON.parse(respuesta);
                if(registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    html = "";
                    html2 = "";
                    html2 += "<b>"+registros[0]["categoria_nombre"]+"<b>";

                    for (var i = 0; i < n ; i++){
                        var mimagen = "";
                        if(registros[i]["producto_foto"] != null && registros[i]["producto_foto"] !=""){
                            mimagen += "<a href='website/single/"+registros[i]["producto_id"]+"'>";
                            mimagen += "<img src='"+base_url+"resources/images/productos/thumb_"+registros[i]["producto_foto"]+"' class='img img-circle' width='50' height='50' />";
                            mimagen += "</a>";
                        }else{
                            mimagen += "<a href='website/single/"+registros[i]["producto_id"]+"'>";
                            mimagen += "<img src='"+base_url+"resources/images/productos/thumb_image.png' class='img img-circle' width='50' height='50' />";
                            mimagen += "</a>";
                        }
                        var cadena = registros[i]["producto_nombre"];
                        var nombre = "";
                        if(cadena.length>22){
                            nombre = cadena.substr(0, 20)+"...";
                        }else{
                            nombre = registros[i]["producto_nombre"];
                        }
                            
                        html += "<div class='col-md-3 top_brand_left-1'>";
                        html += "<div class='hover14 column'>";
                        html += "<div class='agile_top_brand_left_grid'>";
                        /*html += "<div class='agile_top_brand_left_grid_pos'>";
                        html += "<img src='"+base_url+"images/offer.png"+"' alt=' ' class='img-responsive'>";
                        html += "</div>";*/
                        html += "<div class='agile_top_brand_left_grid1'>";
                        html += "<figure>";
                        html += "<div class='snipcart-item block'>";
                        html += "<div class='snipcart-thumb'>";
                        html += mimagen;
                        html += "<a href='website/single/"+registros[i]["producto_id"]+"'><p><b><div class='text-center' title='"+cadena+"'>"+nombre+"</div></b></p></a>";
                        /*html += "<div class='stars'>";
                        html += "<i class='fa fa-star blue-star' aria-hidden='true'></i>";
                        html += "<i class='fa fa-star blue-star' aria-hidden='true'></i>";
                        html += "<i class='fa fa-star blue-star' aria-hidden='true'></i>";
                        html += "<i class='fa fa-star blue-star' aria-hidden='true'></i>";
                        html += "<i class='fa fa-star gray-star' aria-hidden='true'></i>";
                        html += "</div>";*/
                        html += "<h4> Bs. "+Number(registros[i]["producto_precio"]).toFixed(2)+"</h4>";
                        html += "</div>";
                        html += "<div class='snipcart-details top_brand_home_details'>";
                        html += "<form action='#' method='post'>";
                        html += "<fieldset>";
                        html += "<input type='hidden' name='cmd' value='_cart'>";
                        html += "<input type='hidden' name='add' id='cantidad"+registros[i]["producto_id"]+"' value='1'>";  
                        html += "<input type='hidden' name='business' value=' '>";
                        html += "<input type='hidden' name='item_name' value='"+registros[i]["producto_nombre"]+"'>";
                        html += "<input type='hidden' name='amount' id='producto_precio"+registros[i]["producto_id"]+"' value='"+registros[i]["producto_precio"]+"'>";
                        html += "<input type='hidden' name='costo' id='producto_costo"+registros[i]["producto_id"]+"' value='"+registros[i]["producto_costo"]+"'>";
                        html += "<input type='hidden' name='discount_amount' id='descuento"+registros[i]["producto_id"]+"' value='0.00'>";
                        html += "<input type='hidden' name='currency_code' value='USD'>";
                        html += "<input type='hidden' name='return' value=' '>";
                        html += "<input type='hidden' name='cancel_return' value=' '>";
                        html += "<input type='button' value='Añadir al pedido' onclick='insertar("+registros[i]["producto_id"]+")'  class='button'>";
                        html += "</fieldset>";
                        html += "</form>";
                        html += "</div>";
                        html += "</div>";
                        html += "</figure>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        
                   }
                   
                   $("#la_categoria").html(html2);
                   $("#tablacategorias").html(html);
                   document.getElementById('loader1').style.display = 'none';
                }
                document.getElementById('loader1').style.display = 'none'; //ocultar el bloque del loader
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablacategorias").html(html);
            },
            complete: function (jqXHR, textStatus) {
                document.getElementById('loader1').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }
        
        });
    }

}

function insertar(producto_id){
       
        var cliente_id = document.getElementById('cliente').value;
        //var myip = document.getElementById('miip').value; 
        var cantidad = document.getElementById('cantidad'+producto_id).value; 
        var descuento = document.getElementById('descuento'+producto_id).value;
        //var producto_costo = document.getElementById('producto_costo'+producto_id).value;
        var producto_precio = document.getElementById('producto_precio'+producto_id).value;
        //var descripcion = document.getElementById('descripcion'+producto_id).value
        var base_url = document.getElementById('base_url').value;
    
        var controlador = base_url+'website/insertarproducto/';
        var dia= new Date().getDay();
        //alert(dia);
  if (dia!=1) {
        if(cliente_id==0){
            var cliente = document.getElementById('miip').value;
        }else{
            var cliente = document.getElementById('cliente').value;
        }

    
    $.ajax({url: controlador,
           type:"POST",
           data:{producto_id:producto_id, cantidad:cantidad, descuento:descuento, producto_precio:producto_precio, cliente:cliente},
           success:function(respuesta){     
              tablacarrito(); 
         }
    });

}else{
    alert('Disculpe las molestias, hoy no tenemos atención.')
}

}

function cantimas(e,producto_id){
   
   tecla = (document.all) ? e.keyCode : e.which; 
   
   if (tecla==13){ 
        cantidar(producto_id);
   }
}


function cantidar(producto_id){
       
   
        var cantidad = document.getElementById('carrito_cantidad'+producto_id).value; 
        var descuento = 0; //document.getElementById('carrito_descuento'+producto_id).value;
        //var producto_costo = document.getElementById('producto_costo'+producto_id).value;
        var producto_precio = document.getElementById('carrito_precio'+producto_id).value;
        //var descripcion = document.getElementById('descripcion'+producto_id).value
        var base_url = document.getElementById('base_url').value;
    
        var controlador = base_url+'website/cantidad/';
   
   
    $.ajax({url: controlador,
           type:"POST",
           data:{producto_id:producto_id, cantidad:cantidad, descuento:descuento, producto_precio:producto_precio},
           success:function(respuesta){     
              tablacarrito(); 
              $('#'+'carrito_cantidad'+producto_id).focus();
         }
    });

}

function quitarcarrito(producto_id){
       
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'website/quitar/';
    
    $.ajax({url: controlador,
           type:"POST",
           data:{producto_id:producto_id},
           success:function(respuesta){     
              tablacarrito(); 
         }
    });

}


function tablacarrito(){
    
    
    
    var modulorestaurante = document.getElementById('restaurante').value;
    var cliente_id = document.getElementById('cliente').value;
    if(cliente_id==0){
        var cliente = document.getElementById('miip').value;
    }else{
        var cliente = document.getElementById('cliente').value;
    }
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'website/carrito/';
    var escarrito=document.getElementById('escarrito').value;
    if (escarrito==1) {
    var estilo = "style='padding:0;'";     
    } else {
    var estilo = "style='padding:5px;'";        
    }
    
      $.ajax({url: controlador,
           type:"POST",
           data:{cliente:cliente},
           success:function(respuesta){ 

     var registros =  JSON.parse(respuesta);
                
               if (registros != null){                   
                   
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var total_detalle = Number(0);
                    var suma = Number(0);
                    var subtotal = Number(0);
                    var descuento = Number(0);
                    html = "";
                    
                    
                    for (var i = 0; i < n ; i++){
                        
                        suma += Number(registros[i]["carrito_total"]);
                        descuento += Number(registros[i]["carrito_descuento"]);
                        subtotal += Number(registros[i]["carrito_subtotal"]);
                        total_detalle = Number(subtotal);

                        html += "<tr "+estilo+">";
                        if (escarrito>0) {
                            if(registros[i]["producto_foto"] != null && registros[i]["producto_foto"] !=""){
                            
                            var mimagen = "<img src='"+base_url+"resources/images/productos/thumb_"+registros[i]["producto_foto"]+"' class='img img-circle' width='50' height='50' />";
                           
                        }else{
                            
                            var mimagen = "<img src='"+base_url+"resources/images/productos/thumb_image.png' class='img img-circle' width='50' height='50' />";
                         
                        }
                        html += "<td "+estilo+">"+mimagen+"</td>";
                        }
//                        html += "<td "+estilo+"><center>"+(i+1)+"</center></td>";
                        html += "<td "+estilo+">"+registros[i]["producto_nombre"];
                        if (registros[i]["categoria_id"]==2 && modulorestaurante==1) {

                         var selec=''; var selec1=''; var selec2=''; var selec3=''; 
                         var selected=''; var selected1=''; var selected2=''; var selec3='';  
                         html += "<br> <div class='col-md-6' style='font-size:9pt'>";  
                         html += "<label id='carrito_preferencias'>Guarnición</label>";  
                         html += "<select id='carrito_preferencia"+registros[i]['carrito_id']+"' onchange='preferir("+registros[i]['carrito_id']+")'>";
                         html += "<option value=''>Seleccionar</option> ";
                         html += "<option value='Papa Frita' ";
                         if(registros[i]['carrito_preferencia']=='Papa Frita'){   selec='selected'; } 
                         html += " "+selec+">Papa Frita</option>";
                        html += "<option  value='Yuca Frita'";
                         if(registros[i]['carrito_preferencia']=='Yuca Frita'){   selec1='selected'; } 
                        html += " "+selec1+" >Yuca Frita</option>";
                        html += "<option  value='Arroz con Queso' ";
                        if(registros[i]['carrito_preferencia']=='Arroz con Queso'){   selec2='selected'; } 
                        html += " "+selec2+" >Arroz con Queso</option>";
                        html += "<option  value='Ensalada'";
                        if(registros[i]['carrito_preferencia']=='Ensalada'){   selec3='selected'; } 
                        html += " "+selec3+" >Ensalada</option>";   
                        html += "</select>";   
                        html += "</div></div>";   
                        html += "<div class='col-md-6' style='font-size:9pt'>";   
                        html += "<label id='carrito_nombreenvases"+registros[i]['carrito_id']+"'>Cocción de Carne</label>";   
                         html += "<select id='carrito_nombreenvase"+registros[i]['carrito_id']+"' onchange='envase("+registros[i]['carrito_id']+")'>";
                         html += "<option value=''>Seleccionar</option> ";
                         html += "<option value='Termino Bien Cocido' ";
                         if(registros[i]['carrito_nombreenvase']=='Termino Bien Cocido'){   selected='selected'; } 
                         html += " "+selected+">Termino Bien Cocido</option>";
                        html += "<option  value='Termino 3 / 4' ";
                        if(registros[i]['carrito_nombreenvase']=='Termino 3 / 4'){  selected1='selected'; }
                        html += " "+selected1+">Termino 3 / 4</option>";
                        html += "<option  value='Termino Medio' ";
                        if(registros[i]['carrito_nombreenvase']=='Termino Medio'){  selected2='selected'; }
                        html += " "+selected2+">Termino Medio</option>"; 
                        html += "</select>";   
                        html += "</div></div>";   
                        /*html += "<br> <div class='col-md-6' style='font-size:7pt'> ";
                    html += "<label for='detalleven_preferencia' class='control-label'><u>Guarnición</u></label>";
                    html += "<div class='form-group'>";
                    html += "<label><input type='radio'  name='detalleven_preferencia' value='Papa Frita'>Papa Frita</label><br>";
                    html += "<label><input type='radio'  name='detalleven_preferencia'  value='Yuca Frita'>Yuca Frita</label><br>";
                    html += "<label><input type='radio'  name='detalleven_preferencia'  value='Arroz cn Queso'>Arroz con Queso</label><br>";
                    html += "<label><input type='radio'  name='detalleven_preferencia'  value='Ensalada'>Ensalada</label><br>";
                                                
                    html += "</div></div><div class='col-md-6' style='font-size:7pt'> ";
                    html += "<label for='detalleven_nombreenvase' class='control-label'><u>Cocción de Carne</u></label>";
                    html += "<div class='form-group'>";
                    html += "<label><input type='radio'  name='detalleven_nombreenvase' value='Termino Bien Cocido'>Termino Bien Cocido</label><br>";
                    html += "<label><input type='radio'  name='detalleven_nombreenvase'  value='Termino 3 / 4'>Termino 3/4</label><br>";
                    html += "<label><input type='radio'  name='detalleven_nombreenvase'  value='Termino Medio'>Termino Medio</label><br>";
                                                
                    html += "</div></div>"; */  
                        }
                        html += " <input id='producto_id'  name='producto_id' type='hidden' class='form-control' value='"+registros[i]["producto_id"]+"'></td>";
                        html += "<td align='right' style='padding-top:0; padding-bottom:0;'>"+Number(registros[i]["carrito_precio"]).toFixed(2)+"<input type='hidden' id='carrito_precio"+registros[i]["producto_id"]+"' name='producto_precio' type='text' size='3' class='form-control'  value='"+registros[i]["carrito_precio"]+"' ></td> ";
                        

                        step = "step = '"+registros[i]["producto_unidadentera"]+"'";
                        //alert "+step+" (step);

                        html += "<td align='center' "+estilo+"><input  type='number'  min='"+registros[i]["producto_unidadentera"]+"' onkeypress='cantimas(event,"+registros[i]["producto_id"]+")' onchange='cantidar("+registros[i]["producto_id"]+")' id='carrito_cantidad"+registros[i]["producto_id"]+"' autocomplete='off' name='cantidad' class='btn btn-primary' value='"+registros[i]["carrito_cantidad"]+"' style='padding:0; width:60px;' required>";
                       
                        html += "<input id='carrito_id'  name='carrito_id' type='hidden' class='form-control' value='"+registros[i]["carrito_id"]+"'></td>";
//                        html += "<td align='right' "+estilo+">"+Number(registros[i]["carrito_descuento"]).toFixed(2)+" <input type='hidden' id='carrito_descuento"+registros[i]["producto_id"]+"' name='descuento' size='3' type='text' class='form-control' value='"+registros[i]["carrito_descuento"]+"' ></td>";
//                        html += "<td align='right'><center><span class='badge badge-success'><font size='4'> <b>"+Number(registros[i]["carrito_total"]).toFixed(2)+"</b></font></span></center></td>";
                        html += "<td align='right' style='padding-top:0; padding-bottom:0;'>"+Number(registros[i]["carrito_total"]).toFixed(2)+"</td>";
                        html += "<td "+estilo+"><button class='btn btn-danger btn-xs' onclick='quitarcarrito("+registros[i]["producto_id"]+")'><i class='fa fa-times' style='color: white'> </i></button> </td>";

                       
//                        html += "<td align='right' style='padding-top:0; padding-buttom:0;'>"+Number(registros[i]["carrito_total"]).toFixed(2)+"</td>";
                        html += "</tr>";
                       
                       }
                       html += "<tr style='color: white; background: #1E1F29; padding: 0;'>";
                       if (escarrito>0) {
                        html += "<td></td>";
                        }
                       html += "<td colspan='2' style='padding:0;'><center><b><font size='3'>TOTAL Bs.</b></font></center></td>";
//                       html += "<td></td>";
                       html += "<td colspan='2' align='right' style='padding:0;'><font size='3'><b>"+Number(suma).toFixed(2)+"</b></font></td>";
                       html += "<td style='padding:0;'></td>";
                       html += "</tr>";
                       $("#carritos").html(html);
                       $("#modalCart").modal();
                       $("#venta_subtotal").val(subtotal);
                       $("#venta_descuento").val(subtotal-suma);
                       $("#venta_total").val(suma);
                       
          }  
        },
        error:function(respuesta){
          
       
   }

});
}

function realizarcompra(){

    var cliente = document.getElementById('cliente').value; 
    var total = document.getElementById('venta_total').value; 

    if (Number(total)>0){
    
    
            if (cliente==0) {
                $("#modalCliente").modal();  
            }else{

                var base_url = document.getElementById('base_url').value;
                var controlador = base_url+'website/getcliente/';

              $.ajax({url: controlador,
                   type:"POST",
                   data:{cliente:cliente},
                   success:function(respuesta){

                        var registros =  JSON.parse(respuesta);

                            if (registros != null){ 
                                $("#venta_nit").val(registros["cliente_nit"]);
                                $("#venta_razon").val(registros["cliente_razon"]);
                                $("#venta_telefono").val(registros["cliente_telefono"]);
                                $("#venta_direccion").val(registros["cliente_direccion"]);
                                $("#venta_celular").val(registros["cliente_celular"]);
                                $("#venta_latitud").val(registros["cliente_latitud"]);
                                $("#venta_longitud").val(registros["cliente_longitud"]);


                             $("#modalFinalizar").modal();  
                             initotroMap();
                         
                         }   
                    },
                    error:function(respuesta){

                        alert("Datos incorrectos, vuelva a intentar");
                    }

                });

            }
    }
    else{
       // write("No tiene productos seleccionados");
        html = "";
        html += "<b>No tiene producto seleccionados</b>";
        html += "<br> Debe añadir productos al carrito <fa class='fa fa-cart-arrow-down'></fa> ";
        
        $("#mensaje_advertencia").html(html);
        $("#boton_modal_mensaje").click();
    }
}

function sesion(){

    var login = document.getElementById('cliente_login').value; 
    var clave = document.getElementById('cliente_clave').value; 
    var ipe = document.getElementById('miip').value; 
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'website/sesioncliente/';
 
      $.ajax({url: controlador,
           type:"POST",
           data:{login:login,clave:clave,ipe:ipe},
           success:function(respuesta){ 
               location.reload();
               
    },
        error:function(respuesta){
          
       alert("Datos incorrectos, vuelva a intentar");
   }

});


}



function venta_online(){

        var cliente = document.getElementById('cliente').value; 
        //para actualizar cliente
        var nit = document.getElementById('venta_nit').value; 
        var razon = document.getElementById('venta_razon').value; 
        var telefono = document.getElementById('venta_telefono').value; 
        var direccion = document.getElementById('venta_direccion').value; 
        //para crear la venta
        var forma = document.getElementById('metodo_pago').value; 
        var tipo_servicio = document.getElementById('metodo_envio').value; 
        var subtotal = document.getElementById('venta_subtotal').value; 
        var descuento = document.getElementById('venta_descuento').value;  
        var total = document.getElementById('venta_total').value; 
        var latitud = document.getElementById('venta_latitud').value; 
        var longitud = document.getElementById('venta_longitud').value; 
        var glosa = document.getElementById('venta_glosa').value; 

        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'website/venta_online/';
 
      $.ajax({url: controlador,
           type:"POST",
           data:{cliente:cliente,nit:nit,razon:razon,telefono:telefono,direccion:direccion,forma:forma,tipo_servicio:tipo_servicio,
               subtotal:subtotal,descuento:descuento,total:total,longitud:longitud,latitud:latitud,glosa:glosa},
           success:function(respuesta){
           alert("Su compra fue realizada con éxito");
           location.reload();
         
    },
        error:function(respuesta){
          
       alert("OCURRIO UN ERROR, vuelva a intentar");
   }

});
      
    
}

function cerrarsesion(){
     //location.reload();
       var base_url = document.getElementById('base_url').value;
       var cliente_id = document.getElementById('cliente').value;
//        var controlador = base_url+'website/venta_online/';
        setCookie('codigo_usuario', cliente_id, 30);
        top.location = base_url;
        
     
}

function buscarseguimiento(){
    
     var orden = document.getElementById('orden').value; 
     var venta = document.getElementById('transaccion').value;
     var base_url = document.getElementById('base_url').value;
     var controlador = base_url+'seguimiento/buscarseguimiento/';
     var loca = base_url+"seguimiento/seguimiento/"+orden+"/"+venta;
     
     if (orden!="" && venta!=""){

        $.ajax({url: controlador,
              type:"POST",
              data:{orden:orden,venta:venta},
              success:function(respuesta){
              location.href=loca;

       },
           error:function(respuesta){

          alert("La ORDEN o el CÓDIGO no existen..!");
      }

       });
    }
    else{
        alert("Uno de los campos ORDEN/CÓDIGO estan vacios.\nVerifique y vuelva a intentar por favor...!")
    }
        
}



function getUserIP(callback) { //  onNewIp - your listener function for new IPs
    //compatibility for firefox and chrome
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
    }),
    noop = function() {},
    localIPs = {},
    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
    key;
 
    function iterateIP(ip) {
        if (!localIPs[ip]) {
            callback(ip);
        }
        localIPs[ip] = true;
    }
 
     //create a bogus data channel
    pc.createDataChannel("");
 
    // create offer and set local description
    pc.createOffer().then(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });
 
        pc.setLocalDescription(sdp, noop, noop);
    }).catch(function(reason) {
        // An error occurred, so handle the failure to connect
    });
 
    //listen for candidate events
    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
}

getUserIP(function(miip){
    document.getElementById("miip").innerHTML="Tu dirección IP es: "+miip;
});

 

// - crear cookies, modificar cookie
    //función que crea una cookie y asigna información y fecha de caducidad.
        //función copiada de https://www.w3schools.com/js/js_cookies.asp
        function setCookie(cname, cvalue, exdays) {
                    var d = new Date();

                    d.setTime(d.getTime() + (exdays*24*60*60*1000));
                    var expires = "expires="+ d.toUTCString();

                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }

// - eliminar cookies
    //función que dado el nombre de una cookie (cname) la elimina. 
        
        function removeCookie(cname){
            setCookie(cname,"",-1);
        }
        
// - leer cookies
    //función que dado el nombre de una cookie (cname) devuelve su contenido.

        //función copiada de https://www.w3schools.com/js/js_cookies.asp
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        
// - detectar cookie
        //función que dado el nombre de una cookie (cname) devuelve true si existe y tiene contenido y false si no existe o existe pero no contiene contenido.
            function detectCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0 && (name.length != c.length))  {
                    return true;
                }
            }
            return false;
        }
        
function saltar_input(e,opc){
    
    tecla = (document.all) ? e.keyCode : e.which;
  
    if (opc==1){
        
        if (tecla==13){ 
            $("#cliente_clave").focus();
        }        
    }
     
    if (opc==2){
        
        if (tecla==13){ 
            $("#boton_login").click();
        }        
    }
    
    
    
}

function registrarcliente()
{
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'website/registrarclienteonline';
    document.getElementById('loader1').style.display = 'block';
    var cliente_id = 0; //document.getElementById('cliente_id').value;
    
    var nit = 0;  //document.getElementById('nit').value;
    var razon = 'SIN NOMBRE'; //document.getElementById('razon_social').value;
    var telefono = 0; //document.getElementById('telefono').value;    
    var tipocliente_id = 1; //document.getElementById('tipocliente_id').value;
    
    var cliente_nombre = "";
    cliente_nombre = document.getElementById('cliente_nombre').value;
    var cliente_ci = 0; // document.getElementById('cliente_ci').value;
    var cliente_nombrenegocio = '-'; //document.getElementById('cliente_nombrenegocio').value;    
    var cliente_codigo = Math.floor(Math.random() * 999999999); //document.getElementById('cliente_codigo').value;
    
    var cliente_direccion = document.getElementById('cliente_direccion').value;
    var cliente_departamento = '-';//document.getElementById('cliente_departamento').value;
    var cliente_celular = "";
    cliente_celular = document.getElementById('cliente_celular').value;
    
    var zona_id = 1; //document.getElementById('zona_id').value;
    
    var cliente_email = document.getElementById('cliente_email').value;
   
    var cliente_clave = "";
    cliente_clave = document.getElementById('cliente_clavereg').value;
    
    var cliente_repeticion = "";
    cliente_repeticion = document.getElementById('cliente_repeticion').value;
    
    
    
//    alert(nit+","+razon+","+telefono+","+ cliente_nombre+","+ tipocliente_id+","+cliente_nombre+","+ cliente_ci+","+
//    cliente_nombrenegocio+","+ cliente_codigo+","+cliente_direccion+","+ cliente_departamento+","+ cliente_celular+","+ zona_id+","+cliente_email+","+cliente_clave);

    var error = 0;
    
    html = "";        
    $("#mensaje_lognombre").html(html); 
    $("#mensaje_logcelular").html(html); 
    $("#mensaje_logdireccion").html(html); 
    $("#mensaje_logemail").html(html); 
    $("#mensaje_logclave").html(html); 
    $("#mensaje_logrepetir").html(html); 
    
    
    if (cliente_nombre.length >4){
        
        if( cliente_celular.length > 5){
            
        
        if( cliente_direccion.length > 5){
                
            if(email_valido(cliente_email)){
                
            
                if(email_norepetido(cliente_email)){
                
                    
                    if(cliente_clave.length>4){
                
                    if(cliente_clave == cliente_repeticion){
                            
                                

                                    $.ajax({url: controlador,
                                            type:"POST",
                                            data:{nit:nit,razon:razon,telefono:telefono,cliente_id:cliente_id, cliente_nombre:cliente_nombre, tipocliente_id:tipocliente_id,
                                                        cliente_nombre:cliente_nombre, cliente_ci:cliente_ci,cliente_nombrenegocio:cliente_nombrenegocio, cliente_codigo:cliente_codigo,
                                                        cliente_direccion:cliente_direccion, cliente_departamento:cliente_departamento, cliente_celular:cliente_celular, zona_id:zona_id,
                                                        cliente_email:cliente_email, cliente_clave:cliente_clave},
                                            success:function(respuesta){  
                                                    document.getElementById('loader1').style.display = 'none';
                                                    html = "";
                                                    html += "<center>";
                                                    html += "<b>NOTIFICACIÓN</b>";
                                                    html += "<br>";
                                                    html += "<br>Tu usuario fue registrado correctamente.";
                                                    html += "<br>Te enviamos la confirmación a tu correo electrónico para activar tu cuenta.";
                                                    html += "<br>Revisa tu bandeja de entrada o carpeta de correos no deseado(spam).";
                                                    html += "</br>";
                                                    html += "<button class='btn btn-danger' type='button' data-dismiss='modal' style='width: 120px;'><fa class='fa fa-times'></fa> Cerrar</button>";
                                                    html += "</center>";

                                                    $("#registrarcli").html(html);


//                                                    alert ("correo electronico enviado");
//                                                
//                                                
//                                                var registro = JSON.parse(respuesta);
//
//                                                cliente_id = registro[0]["cliente_id"];
//
//                                                alert("jejej: "+cliente_id);
//                                                //registrarventa(cliente_id);

                                            },
                                            error: function(respuesta){
                                //                cliente_id = 0;            
                                //                alert(cliente_id);
                                            }

                                    });
                                
                            }
                            else{ 
                                html = "La clave y su repeticion no coinciden";
                                $("#mensaje_logclave").html(html);
                                $("#cliente_clavereg").focus();
                                
                            }
                        
                    }
                    else{
                        html = "La clave es demasiado corta (tener más de 4 caracteres)";
                        $("#mensaje_logclave").html(html);    
                        $("#cliente_clavereg").focus();
                        
                    }
                  
                
            }
            else{
                
                html = "Ya existe un usuario registrado con mismo e-mail";
                $("#mensaje_logemail").html(html);    
                $("#cliente_email").focus();

                
            }            
            
            }
            else{
                
                html = "Debes registrar un correo electrónico válido";
                $("#mensaje_logemail").html(html);    
                $("#cliente_email").focus();

                
            }
            
            
         }
        else{
            html = "Debes especificar una dirección válida";
            $("#mensaje_logdireccion").html(html);    
            $("#cliente_direccion").focus();

        }   
            
            
        }
        else{ 
            html = "Debes registrar tu número de celular";
            $("#mensaje_logcelular").html(html);    
            $("#cliente_celular").focus();

        }
                
    }else{ 
    
        html = "Debe registrar tú nombre";
        $("#mensaje_lognombre").html(html);    
        $("#cliente_nombre").focus();
    }

    
    
}

function email_valido( email ) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function email_norepetido( email ) 
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'website/buscar_email/';
    var libre = true;
    
    
        //alert(controlador);
        $.ajax({url: controlador,
            type:"POST",
            data:{email:email},
            async: false,
            success:function(respuesta){
                res = JSON.parse(respuesta);
               
                if (Number(res.length)>0)  r = 0;
                else r = 1;
                
                
            },
            error:function(respuesta){
                r = 0;
            },
        
        });
     return (r == 1);
}

function enfocar(e,opc){
    
    var tecla = (document.all) ? e.keyCode : e.which;  
  
    if (tecla==13){
        
        if(opc==1) $("#cliente_celular").focus();
        if(opc==2) $("#cliente_direccion").focus();
        if(opc==3) $("#cliente_email").focus();
        if(opc==4) $("#cliente_clavereg").focus();
        if(opc==5) $("#cliente_repeticion").focus();
        if(opc==6) $("#boton_registrar_datos").focus();
    } 
} 

function enviar_clave(){
        document.getElementById('loader2').style.display = 'block';
        var cliente_email = document.getElementById('recliente_email').value;
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+'website/enviar_clave/';
        if(email_valido(cliente_email)){
                $.ajax({url: controlador,
                                            type:"POST",
                                            data:{cliente_email:cliente_email},
                                            success:function(respuesta){  
                                                    document.getElementById('loader2').style.display = 'none';
                                                   
                                                    alert('Se envio la clave a su correo.');
                                                    

                                            },
                                            error: function(respuesta){
                                //                            
                                               alert('Este correo no esta registrado');
                                            }

                                    });
        }else{
            document.getElementById('loader2').style.display = 'none';
            alert('Debe escribir un email valido');
        }

    }
    
function registrargmail(id,nombre,email)
{
    var base_url = document.getElementById('base_url').value;
    
    var controlador = base_url+'website/registrarclienteonline';
    document.getElementById('loader1').style.display = 'block';
    var cliente_id = 0; //document.getElementById('cliente_id').value;
    
    var nit = 0;  //document.getElementById('nit').value;
    var razon = 'SIN NOMBRE'; //document.getElementById('razon_social').value;
    var telefono = 0; //document.getElementById('telefono').value;    
    var tipocliente_id = 1; //document.getElementById('tipocliente_id').value;
    
    
    var cliente_nombre = nombre;
    var cliente_ci = 0; // document.getElementById('cliente_ci').value;
    var cliente_nombrenegocio = '-'; //document.getElementById('cliente_nombrenegocio').value;    
    var cliente_codigo = id; //document.getElementById('cliente_codigo').value;
    
    var cliente_direccion = "-";
    var cliente_departamento = '-';//document.getElementById('cliente_departamento').value;
    var cliente_celular = "";
    //cliente_celular = document.getElementById('cliente_celular').value;
    
    var zona_id = 1; //document.getElementById('zona_id').value;
    
    var cliente_email = email;
   
    //var cliente_clave = "";
    var cliente_clave = email;
    
    //var cliente_repeticion = "";
    var cliente_repeticion = email;
    
    
    
//    alert(nit+","+razon+","+telefono+","+ cliente_nombre+","+ tipocliente_id+","+cliente_nombre+","+ cliente_ci+","+
//    cliente_nombrenegocio+","+ cliente_codigo+","+cliente_direccion+","+ cliente_departamento+","+ cliente_celular+","+ zona_id+","+cliente_email+","+cliente_clave);

    var error = 0;
    
    html = "";        
    $("#mensaje_lognombre").html(html); 
    $("#mensaje_logcelular").html(html); 
    $("#mensaje_logdireccion").html(html); 
    $("#mensaje_logemail").html(html); 
    $("#mensaje_logclave").html(html); 
    $("#mensaje_logrepetir").html(html); 
    
    
    if (cliente_nombre.length >4){
        
        if( cliente_clave.length > 5){
            
        
        if( cliente_direccion.length > 0){
                
            if(email_valido(cliente_email)){
                
            
                if(email_norepetido(cliente_email)){
                
                    
                    if(cliente_clave.length>4){
                
                    if(cliente_clave == cliente_repeticion){
                            
                                

                                    $.ajax({url: controlador,
                                            type:"POST",
                                            data:{nit:nit,razon:razon,telefono:telefono,cliente_id:cliente_id, cliente_nombre:cliente_nombre, tipocliente_id:tipocliente_id,
                                                        cliente_nombre:cliente_nombre, cliente_ci:cliente_ci,cliente_nombrenegocio:cliente_nombrenegocio, cliente_codigo:cliente_codigo,
                                                        cliente_direccion:cliente_direccion, cliente_departamento:cliente_departamento, cliente_celular:cliente_celular, zona_id:zona_id,
                                                        cliente_email:cliente_email, cliente_clave:cliente_clave},
                                            success:function(respuesta){  
                                                    document.getElementById('loader1').style.display = 'none';
                                                    html = "";
                                                    html += "<center>";
                                                    html += "<b>NOTIFICACIÓN</b>";
                                                    html += "<br>";
                                                    html += "<br>Tu usuario fue registrado correctamente.";
                                                    html += "<br>Te recomendamos registrar más infomación en tu perfil.";
                                                    html += "<br>Dirección y teléfono celular son datos importantes para nosotros.";
                                                    html += "</br>";
                                                    html += "<button class='btn btn-success' onclick='sesiongoogle("+email+")' type='button' data-dismiss='modal' style='width: 120px;'><fa class='fa fa-check'></fa> Continuar</button>";
                                                    html += "</center>";

                                                    $("#registrarcli").html(html);
                                                    $("#inisesion").html(html);


//                                                    alert ("correo electronico enviado");
//                                                
//                                                
//                                                var registro = JSON.parse(respuesta);
//
//                                                cliente_id = registro[0]["cliente_id"];
//
//                                                alert("jejej: "+cliente_id);
//                                                //registrarventa(cliente_id);

                                            },
                                            error: function(respuesta){
                                //                cliente_id = 0;            
                                //                alert(cliente_id);
                                            }

                                    });
                                
                            }
                            else{ 
                                html = "La clave y su repeticion no coinciden";
                                $("#mensaje_logclave").html(html);
                                $("#cliente_clavereg").focus();
                                
                            }
                        
                    }
                    else{
                        html = "La clave es demasiado corta (tener más de 4 caracteres)";
                        $("#mensaje_logclave").html(html);    
                        $("#cliente_clavereg").focus();
                        
                    }
                  
                
            }
            else{
                
                sesiongoogle(email);
                
            }            
            
            }
            else{
                
                html = "Debes registrar un correo electrónico válido";
                $("#mensaje_logemail").html(html);    
                $("#cliente_email").focus();

                
            }
            
            
         }
        else{
            html = "Debes especificar una dirección válida";
            $("#mensaje_logdireccion").html(html);    
            $("#cliente_direccion").focus();

        }   
            
            
        }
        else{ 
            html = "Debes tener cuenta goggle";

        }
                
    }else{ 
    
        html = "Debe registrar tú nombre";
        $("#mensaje_lognombre").html(html);    
        $("#cliente_nombre").focus();
    }

    
    
}




function sesiongoogle(email){

    
    var ipe = document.getElementById('miip').value; 
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'website/sesiongoogle/';
 
      $.ajax({url: controlador,
           type:"POST",
           data:{email:email,ipe:ipe},
           success:function(respuesta){ 
               salirfb();
               signOut();
               location.reload();
               
    },
        error:function(respuesta){
          
       alert("Datos incorrectos, vuelva a intentar");
   }

});


}

function envase(carrito_id)
{
    var base_url = document.getElementById('base_url').value;
    var envase = document.getElementById('carrito_nombreenvase'+carrito_id).value;
    var controlador = base_url+'website/envase/'+carrito_id;
    
    $.ajax({url: controlador,
           type:"POST",
           data:{envase:envase},
           success:function(respuesta){ 
              //alert('ta chala');
               
    },
        error:function(respuesta){
          
       alert("Debe Seleccionar una opcion");
   }
});
}

function preferir(carrito_id)
{
    var base_url = document.getElementById('base_url').value;
    var preferencia = document.getElementById('carrito_preferencia'+carrito_id).value;
    var controlador = base_url+'website/preferir/'+carrito_id;
    
    $.ajax({url: controlador,
           type:"POST",
           data:{preferencia:preferencia},
           success:function(respuesta){ 
              //alert('ta chala');
               
    },
        error:function(respuesta){
          
       alert("Debe Seleccionar una opcion");
   }
});
}

function comprobar()
{    
    //var modulo_restaurante = document.getElementById("parametro_modulorestaurante").value;
     var cliente_id = document.getElementById('cliente').value;
    if(cliente_id==0){
        var cliente = document.getElementById('miip').value;
    }else{
        var cliente = document.getElementById('cliente').value;
    }
    var categoria = 2;//document.getElementById('venta_totalfinal').value;
    
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'/website/verificarcarrito';
    $.ajax({
        url:controlador,
        type:"POST",
        data:{categoria:categoria,cliente:cliente},
        success:function(respuesta){ 
                    var datos = JSON.parse(respuesta);

                   

                    if(datos!=null){
                        var registros = datos["carrito_id"];
                      //var  detalle = datos["detalleven_id"];
                        //document.getElementById("carrito_nombreenvase").focus();
                        
                        alert('Debe sleccionar una opción');     
                        $("#carrito_nombreenvases"+registros).css("color", "red");                     
                        $("#carrito_nombreenvase"+registros).focus();                     
                    }
                    else{
                      $("#modalCart").modal('hide');
                      realizarcompra();
                                                   
                    }
                },
                error: function(respuesta){
                    $("#modalCart").modal('hide');
                    realizarcompra();         
                }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                

    });
    
 
    
}