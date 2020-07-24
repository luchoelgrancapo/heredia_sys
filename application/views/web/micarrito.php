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
<!-- start-smoth-scrolling -->
</head>
    
<body onload="tablacarrito()">
<!-- header -->
<?php include("header.php"); ?>
<!-- //header -->

<input type="hidden" name="escarrito" id="escarrito" value="2" />

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url(); ?>"><span class="fa fa-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Mi Carrito</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->


<!-- CONTENIDO -->



<!-- checkout -->


	<div class="checkout" style="padding-top: 0px;">
		<div class="container">

                    <div class="card-header with-border">
                        <h3 class="box-title">

                            <fa class="fa fa-cart-arrow-down"></fa>    Mi Carrito</h3>


                    </div>
                    <h2>Contiene: <span><b><?php echo sizeof($productos)." PRODUCTO(S)"; ?></b></span></h2>
			<div class="checkout-right">
				<table width="100%" >
					<thead>
						<tr style="color: white; background: #333333;">

							<th></th>	
                            <th>Producto</th>   
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Bs.</th>
                            <th>Quitar</th>
							
						</tr>
					</thead>
                                        
                              <tbody id="carritos">
          </tbody>
             
				</table>
			</div><br>
			<button class="btn btn-success" data-dismiss="modal" onclick="realizarcompra()" ><i class="fa fa-money"></i> Finalizar Compra</button>
            <div class="clearfix"> </div><br>
            <div align="right">
				<a href="<?php echo base_url(); ?>" class="primary-btn order-submit">Continuar Comprando</a>
			</div><br>	
				
		
		</div>
	</div>
<!-- //checkout -->


<!-- // CONTENIDO -->



<!-- //footer -->
<?php include("footer.php"); ?>
<!-- //footer -->   
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $raiz;?>js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
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