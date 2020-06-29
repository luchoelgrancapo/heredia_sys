function registrarnuevacategoriap(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nueva_categoriap').value;
    controlador = base_url+'proveedor/nuevo_categoria/';
    $('#modalcategoriap').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["categoriaprov_id"]+"' selected >";
                    html += registros["categoriaprov_descripcion"];
                    html += "</option>";
                    $("#categoriaprov_id").append(html);
                    codigo();
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   

}

function codigo(){

  var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('categoriaprov_id').value;
    var controlador = base_url+'proveedor/datos/';

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta); 
               if (registros != null){
                    html = "";
                    var nombre = registros["categoriaprov_descripcion"];
                    var numero = Number(registros["categoriaprov_numero"])+1;
                    var sub = nombre.substr(0,3);
                    html += sub+"-"+numero;
                    $("#proveedor_codigo1").val(html);
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   


}