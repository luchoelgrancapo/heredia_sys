<!DOCTYPE html>
<html>
  <head>
    <title>Negocios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      #map{
        width: 800px; 
        height: 600px;
      }
    </style>
  </head>
  <body>
      <div class="container">
          <h4><b>Mis Cliente: <?php echo sizeof($all_pedido); ?></b>
          <a href="<?php echo site_url('pedido'); ?>" class="btn btn-danger btn-sm"><span class="fa fa-list"></span> Pedidos</a>
          </h4>
          <div class="col col-md-12 table-responsive">
              <table class="table">
                  <tr>
                      <td>
                      
    <div id="map"></div> <!-- mapa -->
    
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $parametro[0]['parametro_apikey']?>"></script>
    <script>      
      //coordada inicial del mapa
      var coordenadas= new google.maps.LatLng(-17.4038, -66.1635);
      
      //variable para globos de informacion
      var infowindow = true;
 
      //puntos a ser marcados en el mapa
      var puntos = [];
      
        var punto;
      
       
            <?php $i = 0;
            
            foreach($all_pedido as $p){ ?>
               
                punto = ['<?php echo $p['cliente_nombre']; ?>','<?php echo $p['cliente_latitud']; ?>','<?php echo $p['cliente_longitud']; ?>','<?php echo $p['cliente_direccion']; ?>','<?php echo $p['pedido_id']; ?>'];
                puntos['<?php echo $i; ?>'] = punto;
            <?php $i++; } ?>       
       
        
//        punto=['Prueba nueva 2',-17.4138,-66.1735,'Micromercado el Papichin'];        
//        puntos[1]=punto;
//        
//        punto=['Mas pruebas 3',-17.4125,-66.1720,'Micromercado el tribilin'];        
//        puntos[2]=punto;
//
//    
//    
//    
//        punto=['Mas pruebas 3',-17.4125,-66.1720,'Micromercado el tribilin'];        
//        puntos[2]=punto;
        
        
        
      //funcion para posicionar los marcadores en el mapa
      function setMarkers(map, puntos) {    
        //limpiamos el contenido del globo de informacion
        var infowindow = new google.maps.InfoWindow({
            content: ''
        });
    
        //recorremos cada uno de los puntos
        for (var i = 0; i < puntos.length; i++) {
            
          var place = puntos[i];
          if (i==0) {
            var colo = 'red';
            }else{
  var colo = 'blue';
}
          const svgMarker = {
    path:
      "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
    fillColor: colo,
    fillOpacity: 0.6,
    strokeWeight: 0,
    rotation: 0,
    scale: 2,
    anchor: new google.maps.Point(15, 30),
  };

          //propiedades del marcador
          var marker = new google.maps.Marker({
              position: new google.maps.LatLng(place[1], place[2]), //posicion
              map: map,
              scrollwheel: false,
              animation: google.maps.Animation.DROP, //animacion           
              nombre: place[0], //personalizado - nombre del punto
              info: place[3], //personalizado - informacion adicional
              link: '<?php echo base_url().'pedido/comprobante/'; ?>'+place[4], //personalizado - informacion adicional              
              icon: svgMarker
                     
          });
          
          //se agrega el evento click a cada marcador, asi despliega la
          //informacion nada uno de los marcadores
          google.maps.event.addListener(marker, 'click', function() {
            //html de como vamos a visualizar el contenido del globo
            var contenido='<div id="content" style="width: auto; height: auto;">' +'<a href="'+this.link+'"><h5>'+this.nombre +'</h5></a>' +  this.info + '</div>';
            infowindow.setContent(contenido); //asignar el contenido al globo
            infowindow.open(map, this); //mostrarlo
          });
        }
      }
      
      //funcion para inicializar el mapa
      function initialize() {
        //iniciamos un nuevo mapa el div 'map' y le asignamos propiedades
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-17.4038, -66.1635), //coordenada inicial
          zoom: 14, //nivel de zoom
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa      
          
        }); 
        
        //llamar a la funcion que escribe los marcadores
        setMarkers(map, puntos);
 
      }
 
      initialize(); //inicializar el mapa
    </script>
    
                    </td>
                  </tr>
              </table>
    
        </div>
    </div>
                              <div class="footer">
                            <center>
                                
                                <button class="btn btn-danger" id="cancelar_preferencia" onclick="window.close()" data-dismiss="modal" >
                                    <span class="fa fa-close"></span>   Cerrar
                                </button>

                            </center>
                        </div>
  </body>
</html>
