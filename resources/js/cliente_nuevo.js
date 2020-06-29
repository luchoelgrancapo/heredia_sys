function registrarnuevacategoria(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nueva_categoria').value;
    controlador = base_url+'categoria_cliente/nuevo/';
    $('#modalcategoria').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["categoriaclie_id"]+"' selected >";
                    html += registros["categoriaclie_descripcion"];
                    html += "</option>";
                    $("#categoriaclie_id").append(html);
                    codigo();
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   

}

function registrarnuevotipo(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nuevo_tipo').value;
    controlador = base_url+'tipo_cliente/nuevo/';
    $('#modaltipo').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta); 
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["tipocliente_id"]+"' selected >";
                    html += registros["tipocliente_descripcion"];
                    html += "</option>";
                    $("#tipocliente_id").append(html);
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   

}

function registrarnuevazona(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nueva_zona').value;
    controlador = base_url+'categoria_clientezona/nuevo/';
    $('#modalzona').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta); 
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["zona_id"]+"' selected >";
                    html += registros["zona_nombre"];
                    html += "</option>";
                    $("#zona_id").append(html);
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   

}

function codigo(){

  var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('categoriaclie_id').value;
    var controlador = base_url+'categoria_cliente/datos/';
   
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta); 
               if (registros != null){
                    html = "";
                    var nombre = registros["categoriaclie_descripcion"];
                    var numero = Number(registros["categoriaclie_numero"])+1;
                    var sub = nombre.substr(0,3);
                    html += sub+"-"+numero;
                    $("#cliente_codigo").val(html);
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   


}
