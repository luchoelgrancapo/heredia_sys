<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $pagina_web[0]['pagina_nombre']; ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Business Sys, Sistema de facturación, Sistema de ventas, facturacíon, Password SRL, Password Ingenieria Hardware & Software" />
<meta property="og:image" content="<?php echo site_url('resources/images/icono.png');?>" >
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<?php $raiz = base_url('resources/web/'); ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<link href="<?php echo $raiz;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $raiz;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?php echo $raiz;?>css/font-awesome.min.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/nouislider.min.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/slick.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/slick-theme.css" rel="stylesheet"> 

<!-- //font-awesome icons -->
<!-- js -->
<script src="<?php echo $raiz;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('resources/js/web_producto.js'); ?>"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo $raiz;?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            
        });
    });
    
    
function mostrar() {
       // $('#map').css({ 'width':'100%', 'height':'400px' });
   
//    obj = document.getElementById('oculto'+a);
//    //obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
//    //objm = document.getElementById('map');
//    if(obj.style.visibility == 'hidden'){
//        $('#map').css({ 'width':'0px', 'height':'0px' });
//        $('#mosmapa').text("Modificar Ubicación del negocio");
//    }else{
//        $('#map').css({ 'width':'100%', 'height':'400px' });
//        $('#mosmapa').text("Cerrar mapa");
//    }

}
    
    
</script>
<script src="//norfipc.com/js/jquery.cookie.js"></script>
<script src="//norfipc.com/js/cookiecompliance.js"></script>

<!--<link href="<?php echo $raiz;?>css/flag-icon.min.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/bootstrap-select.min.css" rel="stylesheet"> -->
<link rel="shortcut icon" href="<?php echo site_url('resources/images/icono.png');?>" />
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="restaurante" id="restaurante" value="<?php echo $parametro[0]["parametro_modulorestaurante"]; ?>" />
<!-- start-smoth-scrolling -->
</head>
    
    
<body onload="buscar_por_categoria(<?php echo $parametro[0]["parametro_mostrarcategoria"]; ?>)">
<!-- header -->
<?php include('header.php'); ?>
<?php include('modalcarrito.php'); ?>
<!-- //header -->    
<!-- //navigation -->
    <!-- main-slider -->     
                          
        <ul id="demo1" class="slides">
                    <?php 
                        
                    foreach($slider as $s){
                    ?>
            <li>
                            <img src="<?php echo $raiz.'images/sliders/'.$s['slide_imagen'];?>" alt="" />
                            <!--Slider Description example-->
                            <div class="slide-desc" style="line-height: 10pt;">
                                <h3 style="padding: 0; margin-bottom: 0;"><?php echo $s['slide_leyenda1']; ?></h3> 
                                <h4 style="color:white; padding: 0; margin-top: 0;"><b><?php echo $s['slide_leyenda2']; ?></b></h4>
                                
                                <!--<h5><badge class="btn btn-warning btn-xs"><b><?php echo $s['slide_leyenda2']; ?></b></badge></h5>-->
                            </div>
            </li>
                    <?php } ?>

        </ul>
        <?php include('buscador.php'); ?>
<div id="newsletter" class="section"> 

 <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            $band = true;
            foreach($slider2 as $s2){
                if($band == true){ ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
            <?php $band = false;
                }else{ ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
            <?php }
            $i++;
            } ?>
        </ol>
          <center>
        <div class="carousel-inner" role="listbox">
            <?php
            $i = 0;
            $band1 = true;
            foreach($slider2 as $s2){
                if($band1 == true){ ?>
                    <div class="item active">
                        <a href="#"> <img class="<?php echo $s2['slide_titulo'].$i; ?>" src="<?php echo $raiz."images/sliders/".$s2['slide_imagen']; ?>" alt="<?php echo $s2['slide_titulo'];?>"></a>
                    </div>
            <?php $band1 = false;
                }else{ ?>
                    <div class="item">
                        <a href="#"> <img class="<?php echo $s2['slide_titulo'].$i; ?>" src="<?php echo $raiz."images/sliders/".$s2['slide_imagen']; ?>" alt="<?php echo $s2['slide_titulo'];?>"></a>
                    </div>
            <?php }
            $i++;
            } ?>
      </div>
          </center>
    
    </div>
    </div>      
 <!-- /.carousel -->   

<!-- contact -->
    <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                
            <div class="col-md-6">
                <div class="agile_map" style="border: 2px solid #333">
                   
                        <?php 
                            $latitud = $pagina_web[0]['empresa_latitud'];
                            $longitud = $pagina_web[0]['empresa_longitud'];
                        ?>
                    
                    <div id="mimapa">
                        
                            <input type="hidden" value="<?php echo $latitud; ?>" id="empresa_latitud"/>
                            <input type="hidden" value="<?php echo $longitud; ?>" id="empresa_longitud"/>
                            
                        <div id="map" style="width:100%; height:350px; "></div>
                        <script type="text/javascript">
                            var marker;          //variable del marcador
                            var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                            var coords_lng = {};    //coordenadas obtenidas con la geolocalización


                            //Funcion principal
                            initMap = function () 
                            {
                                //usamos la API para geolocalizar el usuario

                                //milat = document.getElementById('cliente_latitud').value;
                                milat = $('#empresa_latitud').val();
                                //milng = document.getElementById('cliente_longitud').value;
                                milng = $('#empresa_longitud').val();

                                    navigator.geolocation.getCurrentPosition(
                                    function (position){
                                        if(milat == 'undefined' || milat == null || milat ==""){
                                            coords_lat =  {
                                            lat: position.coords.latitude,
                                            };
                                            //milat = position.coords.latitude;
                                        }else{
                                            coords_lat =  {
                                            lat: milat,
                                            };
                                        }
                                        if(milng == 'undefined' || milng == null || milng ==""){
                                            coords_lng =  {
                                              lng: position.coords.longitude,
                                            };
                                            //lng = position.coords.longitude;
                                        }else{
                                            coords_lng =  {
                                              lng: milng,
                                            };
                                        } 
                                        /*coords_lat =  {
                                            lat: milat,
                                            };

                                        coords_lng =  {
                                              lng: milng,
                                            };*/
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa
                                          //pasamos las coordenadas al metodo para crear el mapa


                                      },function(error){console.log(error);});
                            }

                            function setMapa (coords_lat, coords_lng)
                            {
                                //document.getElementById("cliente_latitud").value = coords_lat.lat;
                               // document.getElementById("cliente_longitud").value = coords_lng.lng;
                                 // //Se crea una nueva instancia del objeto mapa
                                  var map = new google.maps.Map(document.getElementById('map'),
                                  {
                                    zoom: 17,
                                    center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });

                                  //Creamos el marcador en el mapa con sus propiedades
                                  //para nuestro obetivo tenemos que poner el atributo draggable en true
                                  //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                                  marker = new google.maps.Marker({
                                    map: map,
                                    draggable: false,
                                    animation: google.maps.Animation.DROP,
                                    position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                  });
                                  //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                                  //cuando el usuario a soltado el marcador
                                  //marker.addListener('click', toggleBounce);

                                  marker.addListener( 'dragend', function (event)
                                  {
                                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                                    document.getElementById("empresa_latitud").value = this.getPosition().lat();
                                    document.getElementById("empresa_longitud").value = this.getPosition().lng();
                                  });
                            }
                            
                            initMap();
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $parametro[0]['parametro_apikey'];?>&callback=initMap"></script>
                        </div>                    

                
                </div>
                        
            </div>
            <div class="col-md-6">
                        <!-- Billing Details -->
                        <div class="billing-details">
            <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Envíanos un Mensaje</h3>
                            </div>
            
                <?php echo form_open('website/email'); ?>
                <div class="form-group">
                                <input class="input" type="text" name="nomemail" placeholder="Tu nombre">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="froemail" placeholder="Tu correo">
                            </div>
                            <input class="form-control" type="hidden" id="empresa_email" name="empresa_email" value="<?php echo $pagina_web[0]['empresa_email']; ?>" />
                            <div class="order-notes">
                    <textarea placeholder="Escribe un mensaje..." class="input" required="" id="mensaje12" name="mensaje12"></textarea>
                </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    
                <?php echo form_close(); ?>
            </div>
            
            <div class="clearfix"> </div>
        </div>
    </div>
    </div>
    </div>
    </div>
<!-- contact -->

<!--FOOTER-->

<?php include('footer.php'); ?>

<!--FOOTER-->

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $raiz;?>js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
 <script type="text/javascript">
    
    </script>

<!-- //here ends scrolling icon -->
<script src="<?php echo $raiz;?>js/minicart.min.js"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>
<!-- main slider-banner -->

<script src="<?php echo $raiz;?>js/slick.min.js"></script>
<script src="<?php echo $raiz;?>js/nouislider.min.js"></script>
<script src="<?php echo $raiz;?>js/jquery.zoom.min.js"></script>
<script src="<?php echo $raiz;?>js/main.js"></script>
<script src="<?php echo $raiz;?>js/skdslider.min.js"></script>
<link href="<?php echo $raiz;?>css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
                        
            jQuery('#responsive').change(function(){
              $('#responsive_wrapper').width(jQuery(this).val());
            });
            
        });
</script> 
<!-- //main slider-banner --> 
    
    </body>
</html>