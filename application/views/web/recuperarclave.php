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
<!-- start-smoth-scrolling -->
</head>
 
<body>
    <?php if(!isset($_COOKIE["cliente_id"])) {
                    $cliente_ide = 0;
                } else {
                    $cliente_ide = $_COOKIE["cliente_id"];
                }
            ?>
     <input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente_ide; ?>" />
            <input type="hidden" name="idioma_id" id="idioma_id" value="<?php echo $idioma_id; ?>" />
            <input type="hidden" name="myip" id="myip" value="" />
            <input type="hidden" name="seip" id="seip" value="" />
            <input type="hidden" name="miip" id="miip" value="" />
<!-- header -->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url(); ?>"><span class="fa fa-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Recuperar Contraseña</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- register -->
            <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter"><img src="<?php echo base_url("resources/web/images/logo1.png") ?>" width="25%" height="25%">
                            <p>Recuperar <strong>contraseña</strong></p>
                            Introduzca la dirección de correo electrónico asociado con su cuenta a BusinessSys, para la empresa <?php echo $pagina_web[0]['empresa_nombre']; ?>.
                            <form action="javascript:void(0);">
                                <input class="input" id="recliente_email" placeholder="Correo electrónico">
                                <button class="newsletter-btn" onclick="enviar_clave()"><i class="fa fa-envelope"></i> Enviar</button>

                            </form>
                    <div class="row" id='loader2'  style='display:none; text-align: center'>
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                    </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
<!-- //register -->
<!-- //footer -->
<?php include("footer.php"); ?>
<!-- //footer -->   
<!-- Bootstrap Core JavaScript -->
 
<!-- //main slider-banner --> 
</body>
</html>