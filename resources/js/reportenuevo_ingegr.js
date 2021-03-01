$(document).on("ready",inicio);
function inicio(){
  var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var usuario = document.getElementById('buscarusuario_id').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario);
}

function convertDateFormat(string){
    var info = "";
    if(string != null){
       info = string.split('-').reverse().join('/');
   }
    return info;
}
/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
function formatofecha_hora(string){
    var mifh = new Date(string);
    var info = "";
    

    if(string != null){
       info = mifh.getDate()+"/"+(mifh.getMonth()+1)+"/"+mifh.getFullYear()+" "+aumentar_cero(mifh.getHours())+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds());
   }
    return info;
}
    
function buscar_por_fecha(){

    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var usuario = document.getElementById('buscarusuario_id').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario);

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



function fechabusquedaingegr(fecha_desde, fecha_hasta, usuario){

    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarnuevoreportes";
     /*var limite = 1000; */
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario},
          
           success:function(resul){
              
                          
                $("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
                
               if (registros != null){
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    if(!(fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null  || fecha_hasta =="")){
                        fecha1 = "Desde: "+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = " - Hasta: "+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else if(!(fecha_desde == null || fecha_desde =="") && (fecha_desde == null || fecha_hasta =="")){
                        fecha1 = "De: "+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = "";
                    }else if((fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null || fecha_hasta =="")){
                        fecha1 = "";
                        fecha2 = "De: "+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else{
                        fecha1 = "";
                        fecha2 = "";
                    }
                    
                    var piehtml = "";
                    var html0 = '';
                    var html1 = '';
                    var html2 = '';
                    var html3 = '';
                    var html4 = '';
                    var html5 = '';
                    var html6 = '';
                    var html7 = '';
                    var html8 = '';
                    var html9 = '';
                    var html10 = '';
                    var html11 = '';
                    var html12 = '';
                    var html13 = '';
                    var html14 = '';
                    var html15 = '';
                    var html16 = '';
                    var html17 = '';
                    var html18 = '';
                    var html19 = '';
                    var html30 = '';
                    var html31 = '';
                    var html32 = '';
                    var html33 = '';
                    var cont0 = 1;
                    var cont1 = 1;
                    var cont2 = 1;
                    var cont3 = 1;
                    var cont4 = 1;
                    var cont5 = 1;
                    var cont6 = 1;
                    var cont7 = 1;
                    var cont8 = 1;
                    var cont9 = 1;
                    var cont10 = 1;
                    var cont11 = 1;
                    var cont12 = 1;
                    var cont13 = 1;
                    var cont14 = 1;
                    var cont15 = 1;
                    var cont16 = 1;
                    var cont17 = 1;
                    var cont18 = 1;
                    var cont19 = 1;
                    var cont30 = 1;
                    var cont31 = 1;
                    var cont32 = 1;
                    var cont33 = 1;
                    var totalingreso0 = parseFloat(0.00);
                    var totalingreso1 = parseFloat(0.00);
                    var totalingreso2 = parseFloat(0.00);
                    var totalingreso3 = parseFloat(0.00);
                    var totalingreso4 = parseFloat(0.00);
                    var totalingreso5 = parseFloat(0.00);
                    var totalingreso6 = parseFloat(0.00);
                    var totalingreso7 = parseFloat(0.00);
                    var totalingreso8 = parseFloat(0.00);
                    var totalingreso9 = parseFloat(0.00);
                    var totalingreso10 = parseFloat(0.00);
                    var totalingreso11 = parseFloat(0.00);
                    var totalingreso12 = parseFloat(0.00);
                    var totalingreso13 = parseFloat(0.00);
                    var totalingreso14 = parseFloat(0.00);
                    var totalingreso15 = parseFloat(0.00);
                    var totalingreso16 = parseFloat(0.00);
                    var totalingreso17 = parseFloat(0.00);
                   
                    var totalegreso30 = parseFloat(0.00);
                    var totalegreso31 = parseFloat(0.00);
                    var totalegreso32 = parseFloat(0.00);
                    var totalegreso33 = parseFloat(0.00);
                    var totalingreso = parseFloat(0.00);
                    var totalegreso = parseFloat(0.00);
                    var totalutilidad = parseFloat(0.00);
                    var totalefectivo = parseFloat(0.00);

                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resingegr").val("- "+n+" -");
                   
                    
                    for (var i = 0; i < n ; i++){
                      totalingreso  += parseFloat(registros[i]['ingreso']);
                      totalegreso   += parseFloat(registros[i]['egreso']);
                      totalutilidad += parseFloat(registros[i]['utilidad']);
                      if (registros[i]['forma'] == 1 && registros[i]['ingreso']>0) {
                      totalefectivo += parseFloat(registros[i]['ingreso']);
 
                      }
                      if(registros[i]['tipo'] == 'INGRESO' && registros[i]['ingreso']>0){
                          totalingreso0  += parseFloat(registros[i]['ingreso']);
html0 += "<div class='row'>";
html0 += "<div class='col-md-1'><p class='text-center'><strong>"+cont0+"</strong></p></div>";
html0 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html0 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html0 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html0 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont0 += 1;
                      }

                      if(registros[i]['tipo'] == 'VENTA' && registros[i]['forma']==1 && registros[i]['transaccion']==1){
                          totalingreso1  += parseFloat(registros[i]['ingreso']);
html1 += "<div class='row'>";
html1 += "<div class='col-md-1'><p class='text-center'><strong>"+cont1+"</strong></p></div>";
html1 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html1 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html1 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html1 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont1 += 1;
                      }
                      
                      if(registros[i]['tipo'] == 'VENTA CREDITO' && registros[i]['transaccion']==2){
                          totalingreso2  += parseFloat(registros[i]['ingreso']);
                          /*totalutilidad2 += parseFloat(registros[i]['utilidad']);
                          totalutilidad += parseFloat(registros[i]['utilidad']);*/
                          html2 += "<div class='row'>";
html2 += "<div class='col-md-1'><p class='text-center'><strong>"+cont2+"</strong></p></div>";
html2 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html2 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html2 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html2 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont2 += 1;
                      }
                      
                      if(registros[i]['tipo'] == 'VENTA' && registros[i]['forma']==2){
                          totalingreso3  += parseFloat(registros[i]['ingreso']);
                          //totalutilidad22 += parseFloat(registros[i]['utilidad']);
                          html3 += "<div class='row' >";
html3 += "<div class='col-md-1'><p class='text-center'><strong>"+cont3+"</strong></p></div>";
html3 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html3 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html3 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html3 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont3 += 1;
                      }
                      if(registros[i]['tipo'] == 'VENTA' && registros[i]['forma']==3){
                          totalingreso4  += parseFloat(registros[i]['ingreso']);
                          //totalutilidad4 += parseFloat(registros[i]['utilidad']);
                         html4 += "<div class='row' >";
html4 += "<div class='col-md-1'><p class='text-center'><strong>"+cont4+"</strong></p></div>";
html4 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html4 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html4 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html4 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont4 += 1;
                      }
                      if(registros[i]['tipo'] == 'VENTA' && registros[i]['forma']==4){
                          totalingreso5  += parseFloat(registros[i]['ingreso']);
                          //totalutilidad22 += parseFloat(registros[i]['utilidad']);
                          html5 += "<div class='row' >";
html5 += "<div class='col-md-1'><p class='text-center'><strong>"+cont5+"</strong></p></div>";
html5 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html5 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html5 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html5 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont5 += 1;
                      }
                      if(registros[i]['tipo'] == 'VENTA' && registros[i]['forma']==5){
                          totalingreso6  += parseFloat(registros[i]['ingreso']);
                          //totalutilidad22 += parseFloat(registros[i]['utilidad']);
                         html6 += "<div class='row' >";
html6 += "<div class='col-md-1'><p class='text-center'><strong>"+cont6+"</strong></p></div>";
html6 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html6 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html6 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html6 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont6 += 1;
                      }
                      
                      if(registros[i]['tipo'] == 'CUOTA' && registros[i]['ingreso']>0){
                          totalingreso7  += parseFloat(registros[i]['ingreso']);
                          /*totalutilidad3 += parseFloat(registros[i]['utilidad']);
                          totalutilidad += parseFloat(registros[i]['utilidad']);*/
                          html7 += "<div class='row' >";
html7 += "<div class='col-md-1'><p class='text-center'><strong>"+cont7+"</strong></p></div>";
html7 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html7 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html7 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html7 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont7 += 1;
                      }
                      
                    
                      if(registros[i]['tipo'] == 'INSCRIPCION' && registros[i]['forma']==1){
                          totalingreso8  += parseFloat(registros[i]['ingreso']);
                          html8 += "<div class='row' >";
html8 += "<div class='col-md-1'><p class='text-center'><strong>"+cont8+"</strong></p></div>";
html8 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html8 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html8 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html8 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont8 += 1;
                      }

                       if(registros[i]['tipo'] == 'INSCRIPCION' && registros[i]['forma']==2){
                          totalingreso9  += parseFloat(registros[i]['ingreso']);
                         html9 += "<div class='row' >";
html9 += "<div class='col-md-1'><p class='text-center'><strong>"+cont9+"</strong></p></div>";
html9 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html9 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html9 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html9 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont9 += 1;
                      }

                      if(registros[i]['tipo'] == 'INSCRIPCION' && registros[i]['forma']==3){
                          totalingreso10  += parseFloat(registros[i]['ingreso']);
                          html10 += "<div class='row' >";
html10 += "<div class='col-md-1'><p class='text-center'><strong>"+cont10+"</strong></p></div>";
html10 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html10 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html10 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html10 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont10 += 1;
                      }

                      if(registros[i]['tipo'] == 'INSCRIPCION' && registros[i]['forma']==4){
                          totalingreso11  += parseFloat(registros[i]['ingreso']);
                         html11 += "<div class='row' >";
html11 += "<div class='col-md-1'><p class='text-center'><strong>"+cont11+"</strong></p></div>";
html11 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html11 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html11 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html11 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont11 += 1;
                      }

                      if(registros[i]['tipo'] == 'INSCRIPCION' && registros[i]['forma']==5){
                          totalingreso12  += parseFloat(registros[i]['ingreso']);
                         html12 += "<div class='row' >";
html12 += "<div class='col-md-1'><p class='text-center'><strong>"+cont12+"</strong></p></div>";
html12 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html12 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html12 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html12 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont12 += 1;
                      }

                      if(registros[i]['tipo'] == 'RESERVA' && registros[i]['forma']==1){
                          totalingreso13  += parseFloat(registros[i]['ingreso']);
                          html13 += "<div class='row' >";
html13 += "<div class='col-md-1'><p class='text-center'><strong>"+cont0+"</strong></p></div>";
html13 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html13 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html13 += "<div class='col-md-2'><p class='text-right'><strong class='text-success'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html13 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont13 += 1;
                      }

                      if(registros[i]['tipo'] == 'RESERVA' && registros[i]['forma']==2){
                          totalingreso14  += parseFloat(registros[i]['ingreso']);
                          html14 += "<div class='row' >";
html14 += "<div class='col-md-1'><p class='text-center'><strong>"+cont14+"</strong></p></div>";
html14 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html14 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html14 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html14 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont14 += 1;
                      }

                      if(registros[i]['tipo'] == 'RESERVA' && registros[i]['forma']==3){
                          totalingreso15  += parseFloat(registros[i]['ingreso']);
                         html15 += "<div class='row' >";
html15 += "<div class='col-md-1'><p class='text-center'><strong>"+cont15+"</strong></p></div>";
html15 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html15 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html15 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html15 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont15 += 1;
                      }

                      if(registros[i]['tipo'] == 'RESERVA' && registros[i]['forma']==4){
                          totalingreso16  += parseFloat(registros[i]['ingreso']);
                          html16 += "<div class='row' >";
html16 += "<div class='col-md-1'><p class='text-center'><strong>"+cont16+"</strong></p></div>";
html16 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html16 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html16 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html16 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont16 += 1;
                      }

                      if(registros[i]['tipo'] == 'RESERVA' && registros[i]['forma']==5){
                          totalingreso17  += parseFloat(registros[i]['ingreso']);
                         html17 += "<div class='row' >";
html17 += "<div class='col-md-1'><p class='text-center'><strong>"+cont17+"</strong></p></div>";
html17 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html17 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html17 += "<div class='col-md-2'><p class='text-right'><strong>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</strong></p></div>";
html17 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div></div>";
                          cont17 += 1;
                      }
                     
                      if(registros[i]['tipo'] == 'EGRESO'){
                          totalegreso30  += parseFloat(registros[i]['egreso']);
                          html30 += "<div class='row' style='width:99%'>";
html30 += "<div class='col-md-1'><p class='text-center'><strong>"+cont30+"</strong></p></div>";
html30 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html30 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html30 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div>";
html30 += "<div class='col-md-2'><p class='text-right'><strong class='text-danger'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</strong></p></div></div>";
                          cont30 += 1;
                      }
                      
                      if(registros[i]['tipo'] == 'COMPRA'){
                          totalegreso31  += parseFloat(registros[i]['egreso']);
                         html31 += "<div class='row' style='width:99%'>";
html31 += "<div class='col-md-1'><p class='text-center'><strong>"+cont31+"</strong></p></div>";
html31 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html31 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html31 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div>";
html31 += "<div class='col-md-2'><p class='text-right'><strong class='text-danger'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</strong></p></div></div>";
cont31 += 1;
                      }

                      if(registros[i]['tipo'] == 'COMPRA CREDITO'){
                          totalegreso31  += parseFloat(registros[i]['egreso']);
                          html32 += "<div class='row' style='width:99%'>";
html32 += "<div class='col-md-1'><p class='text-center'><strong>"+cont32+"</strong></p></div>";
html32 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html32 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html32 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div>";
html32 += "<div class='col-md-2'><p class='text-right'><strong class='text-danger'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</strong></p></div></div>";
cont32 += 1;
                      }
                      
                      if(registros[i]['tipo'] == 'CUOTA' && registros[i]['egreso']>0){
                          totalegreso33  += parseFloat(registros[i]['egreso']);
                        html33 += "<div class='row' style='width:99%'>";
html33 += "<div class='col-md-1'><p class='text-center'><strong>"+cont33+"</strong></p></div>";
html33 += "<div class='col-md-2'><p class='text-center'><strong>"+moment(registros[i]["fecha"]).format("DD/MM/YYYY HH:mm:ss")+"</strong></p></div>";
html33 += "<div class='col-md-5'><p class='text-center'><strong>"+registros[i]["detalle"]+"</strong></p></div>";
html33 += "<div class='col-md-2'><p class='text-center'><strong></strong></p></div>";
html33 += "<div class='col-md-2'><p class='text-right'><strong class='text-danger'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</strong></p></div></div>";
cont33 += 1;
                      }
                      
                     
                     
                       
                   }
                    
                 
                   document.getElementById('loader').style.display = 'none';
            }
                   $('#elusuario').html("Usuario: "+esusuario);
                   $('#fecha1impresion').html(fecha1);
                   $('#fecha2impresion').html(fecha2);
           
                   $("#tablaingresoresultados").html(html0);
                   $("#totalingreso0").html(Number(totalingreso0).toFixed(2));
                   $("#tablaventaresultados1").html(html1);
                   $("#totalingreso1").html(Number(totalingreso1).toFixed(2));
                   $("#tablaventaresultados2").html(html2);
                   $("#totalingreso2").html(Number(totalingreso2).toFixed(2));
                   $("#tablaventaresultados3").html(html3);
                   $("#totalingreso3").html(Number(totalingreso3).toFixed(2));
                   $("#tablaventaresultados4").html(html4);
                   $("#totalingreso4").html(Number(totalingreso4).toFixed(2));
                   $("#tablaventaresultados5").html(html5);
                   $("#totalingreso5").html(Number(totalingreso5).toFixed(2));
                   $("#tablaventaresultados6").html(html6);
                   $("#totalingreso6").html(Number(totalingreso6).toFixed(2));
                   $("#tablaventaresultados7").html(html7);
                   $("#totalingreso7").html(Number(totalingreso7).toFixed(2));
                   $("#tablaventaresultados8").html(html8);
                   $("#totalingreso8").html(Number(totalingreso8).toFixed(2));
                   $("#tablaventaresultados9").html(html9);
                   $("#totalingreso9").html(Number(totalingreso9).toFixed(2));
                   $("#tablaventaresultados10").html(html10);
                   $("#totalingreso10").html(Number(totalingreso10).toFixed(2));
                   $("#tablaventaresultados11").html(html11);
                   $("#totalingreso11").html(Number(totalingreso11).toFixed(2));
                   $("#tablaventaresultados12").html(html12);
                   $("#totalingreso12").html(Number(totalingreso12).toFixed(2));
                   $("#tablaventaresultados13").html(html13);
                   $("#totalingreso13").html(Number(totalingreso13).toFixed(2));
                   $("#tablaventaresultados14").html(html14);
                   $("#totalingreso14").html(Number(totalingreso14).toFixed(2));
                   $("#tablaventaresultados15").html(html15);
                   $("#totalingreso15").html(Number(totalingreso15).toFixed(2));
                   $("#tablaventaresultados16").html(html16);
                   $("#totalingreso16").html(Number(totalingreso16).toFixed(2));
                   $("#tablaventaresultados17").html(html17);
                   $("#totalegreso30").html(Number(totalegreso30).toFixed(2));
                   $("#tablaventaresultados30").html(html30);
                   $("#totalegreso31").html(Number(totalegreso31).toFixed(2));
                   $("#tablaventaresultados31").html(html31);
                   $("#totalegreso32").html(Number(totalegreso32).toFixed(2));
                   $("#tablaventaresultados32").html(html32);
                   $("#totalegreso33").html(Number(totalegreso33).toFixed(2));
                   $("#tablaventaresultados33").html(html33);
                   $("#totalingreso").html(Number(totalingreso).toFixed(2));
                   $("#totalegreso").html(Number(totalegreso).toFixed(2));
                   $("#totalutilidad").html(Number(totalutilidad).toFixed(2));
                   $("#totalefectivo").html(Number(totalefectivo).toFixed(2));
                   $("#totalefectivocaja").html(Number(totalefectivo-totalegreso).toFixed(2));
                   $("#totaltotal").html(Number(totalingreso-totalegreso).toFixed(2));

        document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
           alert("Algo salio mal...!!!");

           
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}

function porformapago(fecha_desde, fecha_hasta, usuario, formapago, nombre1, nombre2){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/reportesformapago";
    var tipoformapago = "";
    if(formapago == 2){
        tipoformapago = 2;
    }else if(formapago == 3){
        tipoformapago = 3;
    }else if(formapago == 4){
        tipoformapago = 4;
    }else if(formapago == 5){
        tipoformapago = 5;
    }
    
     /*var limite = 1000; */
     
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, formapago: tipoformapago},
          
           success:function(resul){
              
                            
                //$("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    var totalingreso = 0;
                    //var totalegreso = 0;
                    var totalutilidad = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    html1 = "";
                    cabecerahtml1= "";
                    
                    var cont = 1;
                    for (var i = 0; i < n ; i++){
                      totalingreso  += parseFloat(registros[i]['ingreso']);
                      //totalegreso   += parseFloat(registros[i]['egreso']);
                      totalutilidad += parseFloat(registros[i]['utilidad']);
                        html += "<tr>";
                      
                        html += "<td>"+cont+"</td>";
                        
                       html += "<td>"+formatofecha_hora(registros[i]["fecha"])+"</td>";
                       html += "<td>"+registros[i]["detalle"]+"</td>";
                       html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                    //   html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";

                       
                       
                        html += "</tr>";
                       cont += 1;
                   }

                    /* *****************INICIO para reporte TOTAL****************** */
                    cabecerahtml= "<table style='width:100%;' class='table table-striped table-condensed' id='tablasinespacio'><tr><td style='width:5%;'><a href='#' id='mosv"+formapago+"' onclick='mostrar"+formapago+"(); return false'>+</a></td><td style='width:61%;'>"+nombre1+": </td><td style='width:17%;'  id='alinearder'><span id='parasum"+formapago+"' class='text-red'>"+numberFormat(Number(totalingreso).toFixed(2))+"</span></td><td style='width:17%;' id='alinearder'></td></tr>"+"</table>";
            //                "<tr><td style='width:5%;'></td><td style='width:60%;'>"+nombre2+": </td><td style='width:35%;' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td></tr></table>";
                    //cabecerahtml2= "<label  class='control-label col-md-12'><div class='col-md-1'><a href='#' id='mosventa'onclick='mostrarventa(); return false'>+</a></div><div class='col-md-6'>Ingreso de Ventas: </div><div class='col-md-4'>"+numberFormat(Number(totalingreso2).toFixed(2))+"; &nbsp; &nbsp;Utilidad: "+numberFormat(Number(totalutilidad2).toFixed(2))+"</div><div class='col-md-3'></div></label>";
                    cabecerahtml += "<div id='ocultov"+formapago+"' style='visibility:hidden; width: 0; height: 0;'>";
                    cabecerahtml += "<div id='mapv"+formapago+"'>";
                    
                    cabecerahtml += "<table class='table table-striped table-condensed' id='mitabladetimpresion'>";
                    cabecerahtml += "<tr>";
                    cabecerahtml += "<th>N°</th>";
                    cabecerahtml += "<th>Fecha</th>";
                    cabecerahtml += "<th>Detalle</th>";
                    cabecerahtml += "<th>Ingreso</th>";
                //    cabecerahtml += "<th>Utilidad</th>";
                    cabecerahtml += "</tr>";
                    
                    piehtml = "</table></div></div>";
                    /* *****************F I N para reporte TOTAL****************** */
                   $("#tablaformapagoresultados"+formapago).html(cabecerahtml+html+piehtml);
                   return totalingreso;
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaformapagoresultados"+formapago).html(html);
        }
        
    });   

}
