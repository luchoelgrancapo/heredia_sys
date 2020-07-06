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
<meta name="keywords" content="Ximpleman, ventas online, supermecado, micromercado, 
tiendas, ventas, facturacion, contabilidad, distribucion" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<?php $raiz = base_url('resources/web/'); ?>

<link href="<?php echo $raiz;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $raiz;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?php echo $raiz;?>css/font-awesome.css" rel="stylesheet"> 

<!-- //font-awesome icons -->
<!-- js -->
<script src="<?php echo $raiz;?>js/jquery-1.11.1.min.js"></script>
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
</script>



<link href="<?php echo $raiz;?>css/flag-icon.min.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/bootstrap-select.min.css" rel="stylesheet"> 



<!-- Add jQuery library -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery-1.10.2.min.js'); ?>"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.mousewheel.pack.js?v=3.1.3'); ?>"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.fancybox.pack.js?v=2.1.5'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/jquery.fancybox.css?v=2.1.5'); ?>" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/jquery.fancybox-buttons.css?v=1.0.5'); ?>" />
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.fancybox-buttons.js?v=1.0.5'); ?>"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/jquery.fancybox-thumbs.css?v=1.0.7'); ?>" />
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.fancybox-thumbs.js?v=1.0.7'); ?>"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery.fancybox-media.js?v=1.0.6'); ?>"></script>
        
        
    
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'Primer Imagen'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
    <style type="text/css">
/*        img{
            height: 50px;
            width: 50px
        }*/
        
		/*.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}*/

                /*
		.box-body {
			max-width: 700px;
			margin: 0 auto;
		}*/
	</style>
         
        
<script src="//norfipc.com/js/jquery.cookie.js"></script>
<script src="//norfipc.com/js/cookiecompliance.js"></script>

<link href="<?php echo $raiz;?>css/flag-icon.min.css" rel="stylesheet"> 
<link href="<?php echo $raiz;?>css/bootstrap-select.min.css" rel="stylesheet"> 
<link rel="shortcut icon" href="<?php echo site_url('resources/images/icono.png');?>" />
<!-- start-smoth-scrolling -->
</head>
	
<body>

    
<!-- header -->

<?php include("header.php"); ?>
<?php include('modalcarrito.php'); ?>
<!-- //header -->    
    
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Producto</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- buscador -->
<?php include("buscador.php"); ?>
<!-- //buscador -->   
    <div class="products">
        <div class="container">
            <div class="agileinfo_single">
                
                
                <div class="col-md-4">
                    
                    <div class="col-md-12 agileinfo_single_left">
                        <?php if ($producto[0]['producto_foto']==''){ ?>
                            <img id="example" src="<?php echo base_url('resources/images/productos/producto.jpg')?>" alt=" " class="img-responsive">
                        <?php } else { ?>
                        <img id="example" src="<?php echo base_url('resources/images/productos/'.$producto[0]['producto_foto'].'')?>" alt=" " class="img-responsive">
                    <?php } ?>

                    </div>
                    
                <!-------------------- galeria de productos ----------------------->
                
                <?php if (sizeof($all_imagen_producto)>0){ ?>
                    <div class="clearfix"></div>
<!--                <div class="row">-->
                    <div class="col-md-12  agileinfo_single_left">

                        <div class="box">

                            <div class="box-body">
                                <center>
                                    
                                    
                                <p>
                                    <?php
                                        $colum = 5;
                                        $cont = 1;
                                        //$cont = 1;
                                        /*$anchoimg = "width='70'";
                                        $altoimg = "heigth='60'"; */
                                        foreach($all_imagen_producto as $imagen)
                                        {
                                            if(($cont % $colum) == 0){
                                               // echo "<div id ='otrafila'>";
                                            }
                                            $mimagen = "thumb_".$imagen['imagenprod_archivo'];

                                            //echo "<div id='colum5'>";
                                            echo "<a class='fancybox' href='".site_url('/resources/images/productos/'.$imagen['imagenprod_archivo'])."' data-fancybox-group='gallery' title='".$imagen['imagenprod_titulo']."'>";
                                            echo "<img src='".site_url('/resources/images/productos/'.$mimagen)."' alt='' /></a>";
                                            //echo "</div>";
                                            if(($cont % $colum) == 0){
                                                echo "<br>";
                                            }
                                        ?>
                                        <?php $cont++; } ?>
                                </p>

                                </center>
                            </div>
                            <div class="pull-right">

                            </div>
                            
                        </div>
                    </div>

                <!--</div>-->
                <?php } ?>
                <!-------------------- // galeria de productos ----------------------->
                </div>
                
                <div class="col-md-8 agileinfo_single_right">
                <h2><?php echo $producto[0]['producto_nombre']; ?></h2>
                    
                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5" checked="">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div>
                
                    
                    
                    <div class="w3agile_description"  style="padding: 0;margin: 0px;">
                        <h4 class="m-sing" ><b>DESCRIPCIÓN</b></h4>                        
                        <p style="padding: 0;margin: 0px; text-align: justify; line-height: 13px;"><?php echo $producto[0]['producto_caracteristicas']; ?></p>
                        <hr style="padding: 0;margin: 0px;">
                        
                        <p style="padding: 0;margin: 0px;"><b>Categoria :</b> <?php echo $producto[0]['categoria_nombre']; ?></p>
                        
                        <p style="padding: 0;margin: 0px;"><b>Marca :</b> <?php echo $producto[0]['producto_marca']; ?></p>
                        
                        <p style="padding: 0;margin: 0px;"><b>Industria :</b> <?php echo $producto[0]['producto_industria']; ?></p>
                    </div>
                
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h3 class="m-sing" ><b>Bs <?php echo number_format($producto[0]['producto_precio'],2,'.',','); ?></b> </h3>
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                         
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" id="cantidad<?php echo $producto[0]['producto_id'];?>" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="<?php echo $producto[0]['producto_nombre'];?>" />
                                    <input type="hidden" name="amount" id="producto_precio<?php echo $producto[0]['producto_id'];?>" value="<?php echo $producto[0]['producto_precio'];?>" />
                                    <input type="hidden" name="discount_amount" id="descuento<?php echo $producto[0]['producto_id'];?>" value="0" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="return" value=" " />
                                    <input type="hidden" name="cancel_return" value=" " />
                                    <!--<input type="button" name="submit" value="Añadir al pedido" class="button" onclick="insertar(<?php echo $producto[0]['producto_id'];?>)"/>-->
<!--                                    <a href="<?php echo base_url("website/micarrito/".$idioma_id); ?>" type="button" name="submit" class="btn btn-info btn-sm" onclick="insertar(<?php echo $producto[0]['producto_id'];?>)">
                                            <fa class='fa fa-cart-plus'></fa> Mi Carrito
                                    </a>-->
                                    <button type="button" name="submit" class="btn btn-success btn-sm" onclick="insertar(<?php echo $producto[0]['producto_id'];?>)"><fa class='fa fa-cart-plus'></fa> AGREGAR AL CARRITO</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                  
                <div class="checkout-right-basket">
                                    <a href="<?php echo base_url(); ?>"><span class="fa fa-cart-arrow-down" aria-hidden="true"></span> Continuar Comprando</a>
                </div>
                <div class="clearfix"> </div>
                    <div class="clearfix"> </div>

            </div>
        </div>
    </div>
            
            
<!-- new -->
    <div class="newproducts-w3agile">
        <div class="container">
            <h3>PRODUCTOS RELACIONADOS</h3>
            
                <div class="agile_top_brands_grids">
                                <?php foreach($ofertasemanal as $os) { ?>
                                                            
                                <div class="col-md-4 top_brand_left">
                                        <div class="hover14 column">
                                            <div class="agile_top_brand_left_grid">
                                                <div class="agile_top_brand_left_grid_pos">
                                                        <img src="<?php echo $raiz;?>images/offer.png" alt=" " class="img-responsive" />
                                                </div>
                                                <div class="agile_top_brand_left_grid1" style="line-height: 10px;">
                                                    <figure>
                                                        <div class="snipcart-item block" >
                                                            <div class="snipcart-thumb">
                                                                <a href="<?php echo base_url("website/single/".$idioma_id."/".$os['producto_id']); ?>">
                                                                    <img title=" " alt=" " src="<?php echo base_url()."resources/images/productos/".$os['producto_foto']; ?>" width="100" height="100"/>
                                                                </a>     
                                                                    <p style="margin-top: 5px;margin-bottom: 5px;"><?php echo $os['producto_nombre'];?></p>
                                                                    <div class="stars" style="margin-bottom: 0px;">
                                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                                    </div>
                                                                    <h4 style="margin-bottom: 5px; margin-top: 5px;"><?php echo "Bs ".number_format($os['promocion_preciototal'], 2, '.',',');?><span><?php echo number_format($os['producto_precio'], 2, '.', ','); ?></span></h4>
                                                            </div>
                                                            <div class="snipcart-details top_brand_home_details">
                                                                <form action="#" method="post">
                                                                    <fieldset>
                                                                       <input type="hidden" name="cmd" value="_cart" />
                                                                    <input type="hidden" name="add" id="cantidad<?php echo $os['producto_id'];?>" value="1" />
                                                                    <input type="hidden" name="business" value=" " />
                                                                    <input type="hidden" name="item_name" value="<?php echo $os['producto_nombre'];?>" />
                                                                    <input type="hidden" name="amount" id="producto_precio<?php echo $os['producto_id'];?>" value="<?php echo $os['producto_precio'];?>" />
                                                                    <input type="hidden" name="discount_amount" id="descuento<?php echo $os['producto_id'];?>" value="<?php echo ($os['producto_precio']-$os['promocion_preciototal']); ?>" />
                                                                    <input type="hidden" name="currency_code" value="USD" />
                                                                    <input type="hidden" name="return" value=" " />
                                                                    <input type="hidden" name="cancel_return" value=" " />
                                                                    
                                                                    <!--<input type="button" name="submit" value="Añadir al pedido" class="button" onclick="insertar(<?php echo $os['producto_id'];?>)"/>-->
                                                                    <button type="button" name="submit" class="btn btn-info btn-sm" onclick="insertar(<?php echo $os['producto_id'];?>)"><fa class='fa fa-cart-plus'></fa> AÑADIR AL PEDIDO</button>
                                                                     
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                                            
                                                            <?php } ?>

    <!-------------- Bloque de codigo 2 ---------------->
                                <div class="clearfix"> </div>
                            </div>
        </div>
    </div>
<!-- //new -->

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