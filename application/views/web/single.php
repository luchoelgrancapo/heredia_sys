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
	
<body>

    
<!-- header -->

<?php include("header.php"); ?>
<?php include('modalcarrito.php'); ?>
<!-- //header -->    
    
<!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="<?php echo base_url(); ?>"><span class="fa fa-home" aria-hidden="true"></span>Inicio</a></li>
                <li class="active">Producto</li>
            </ol>
        </div>
    </div>
<!-- //breadcrumbs -->
<!-- buscador -->
<?php include("buscador.php"); ?>
<!-- //buscador -->   

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">
                            <div class="product-preview">
                            <?php if ($producto[0]['producto_foto']==''){ ?>
                            <img src="<?php echo base_url('resources/images/productos/producto.jpg')?>" alt="">
                            <?php } else { ?>
                            <img src="<?php echo base_url('resources/images/productos/'.$producto[0]['producto_foto'].'')?>" alt="">
                            <?php } ?>
                            </div>
                            <?php if (sizeof($all_imagen_producto)>0){ ?>
                            <?php
                                        foreach($all_imagen_producto as $imagen)
                                        {
                                            
                                            $mimagen = $imagen['imagenprod_archivo'];
                                            

                                            
                                          
                                        ?>
                                        
                            <div class="product-preview">
                                <img src="<?php echo site_url('/resources/images/productos/'.$mimagen)?>" alt="" />
                            </div>
                            <?php  } } ?>
                            
                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                            <div class="product-preview">
                            <?php if ($producto[0]['producto_foto']==''){ ?>
                            <img src="<?php echo base_url('resources/images/productos/producto.jpg')?>" alt="">
                            <?php } else { ?>
                            <img src="<?php echo base_url('resources/images/productos/'.$producto[0]['producto_foto'].'')?>" alt="">
                            <?php } ?>
                            </div>
                            <?php if (sizeof($all_imagen_producto)>0){ ?>
                            <?php
                                        foreach($all_imagen_producto as $imagen)
                                        {
                                            
                                            $mimagen = $imagen['imagenprod_archivo'];
                                            

                                            
                                          
                                        ?>
                                        
                            <div class="product-preview">
                                <img src="<?php echo site_url('/resources/images/productos/'.$mimagen)?>" alt="" />
                            </div>
                            <?php  } } ?>
                            
                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $producto[0]['producto_nombre']; ?></h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="product-price">Bs <?php echo number_format($producto[0]['producto_precio'],2,'.',','); ?></h3>
                                <!--<span class="product-available">In Stock</span>-->
                            </div>
                            <p><?php echo $producto[0]['producto_caracteristicas']; ?>.</p>

                            <div class="add-to-cart">
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" id="cantidad<?php echo $producto[0]['producto_id'];?>" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="<?php echo $producto[0]['producto_nombre'];?>" />
                                    <input type="hidden" name="amount" id="producto_precio<?php echo $producto[0]['producto_id'];?>" value="<?php echo $producto[0]['producto_precio'];?>" />
                                    <input type="hidden" name="discount_amount" id="descuento<?php echo $producto[0]['producto_id'];?>" value="0" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="return" value=" " />
                                    <input type="hidden" name="cancel_return" value=" " />
                                    <?php if ($producto[0]['existencia']>0) { ?>
                                    <button class="add-to-cart-btn"  onclick="insertar(<?php echo $producto[0]['producto_id'];?>)"><i class="fa fa-shopping-cart"></i> AGREGAR AL CARRITO</button>
                                    <?php }else{ ?>
                                    <button type='button' class='btn btn-sm btn-danger' disabled>AGOTADO</button>
                                    <?php } ?>
                                
                            </div>

                            

                            <ul class="product-links">
                                <li><b>Categoria:</b></li>
                                <li><?php echo $producto[0]['categoria_nombre']; ?></a></li>
                            </ul>

                            <ul class="product-links">
                                <li><b>Marca:</b></li>
                                <li><?php echo $producto[0]['producto_marca']; ?></li>
                            </ul>

                            <ul class="product-links">
                                <li><b>Industria:</b></li>
                                <li><?php echo $producto[0]['producto_industria']; ?></li>
                            </ul>
                            <ul class="product-links">
                                <li><b>Descripción:</b></li>
                                <li><?php echo $producto[0]['producto_caracteristicas']; ?></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->
</div>
</div>
</div>


 <!-- Section -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3 class="title">PRODUCTOS RELACIONADOS</h3>
                        </div>
                    </div>
                     <?php foreach($relacionados as $os) { ?>
                        
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                               <?php if ($os['producto_foto']==''){ ?>
                            <img src="<?php echo base_url('resources/images/productos/producto.jpg')?>" alt="">
                            <?php } else { ?>
                            <img src="<?php echo base_url('resources/images/productos/'.$os['producto_foto'].'')?>" alt="">
                            <?php } ?>
                                <div class="product-label">
                                   
                                </div>
                            </div>
                            <a href="<?php echo base_url("website/single/".$os['producto_id']); ?>"><div class="product-body">
                                <p class="product-category"></p>
                                <h3 class="product-name"><?php echo $os['producto_nombre'];?></h3>
                                <h4 class="product-price"><?php echo number_format($os['producto_precio'], 2, '.', ','); ?></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">
                                </div>
                            </div></a>
                            <div class="add-to-cart">
                                <input type="hidden" name="cmd" value="_cart" />
                                                                    <input type="hidden" name="add" id="cantidad<?php echo $os['producto_id'];?>" value="1" />
                                                                    <input type="hidden" name="business" value=" " />
                                                                    <input type="hidden" name="item_name" value="<?php echo $os['producto_nombre'];?>" />
                                                                    <input type="hidden" name="amount" id="producto_precio<?php echo $os['producto_id'];?>" value="<?php echo $os['producto_precio'];?>" />
                                                                    <input type="hidden" name="discount_amount" id="descuento<?php echo $os['producto_id'];?>" value="<?php echo ($os['producto_precio']); ?>" />
                                                                    <input type="hidden" name="currency_code" value="USD" />
                                                                    <input type="hidden" name="return" value=" " />
                                                                    <input type="hidden" name="cancel_return" value=" " />
                                <?php if ($os['existencia']>0) { ?>
                                                                      <button class="add-to-cart-btn" onclick="insertar(<?php echo $os['producto_id'];?>)"><i class="fa fa-shopping-cart"></i> AGREGAR AL CARRITO</button>   
                                                                    <?php }else{ ?>
                                                                      <button type='button' class='btn btn-sm btn-danger' disabled>AGOTADO</button>
                                                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>

                  <?php } ?>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /Section -->
            
            
<!-- new -->
   
<?php include("footer.php"); ?>
<!-- //footer -->   
<script src="<?php echo $raiz;?>js/bootstrap.min.js"></script>
<script src="<?php echo $raiz;?>js/slick.min.js"></script>
<script src="<?php echo $raiz;?>js/nouislider.min.js"></script>
<script src="<?php echo $raiz;?>js/jquery.zoom.min.js"></script>
<script src="<?php echo $raiz;?>js/main.js"></script>
<!-- Bootstrap Core JavaScript -->

</body>
</html>