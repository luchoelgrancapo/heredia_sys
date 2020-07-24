<body onload="mostrar_grafica()">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Business Sys | Sistema Integral de Ventas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<!--  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
   Font Awesome 
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   Ionicons 
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
   Theme style 
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. 
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   Morris chart 
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
   jvectormap 
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
   Date Picker 
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   Daterange picker 
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
   bootstrap wysihtml5 - text editor 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />  
<input type="hidden" name="empresa_nombre" id="empresa_nombre" value="" />  
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/graficas.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/pedido_diario.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/highcharts.js'); ?>"></script>
<!--
<button onclick="mostrar_grafica()">
 graficos    
</button>-->
<!--                <script type="text/javascript">
                    function esMobilx(){
    
                    var isMobile = {
                        Android: function() {
                            return navigator.userAgent.match(/Android/i);
                        },
                        BlackBerry: function() {
                            return navigator.userAgent.match(/BlackBerry/i);
                        },
                        iOS: function() {
                            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                        },
                        Opera: function() {
                            return navigator.userAgent.match(/Opera Mini/i);
                        },
                        Windows: function() {
                            return navigator.userAgent.match(/IEMobile/i);
                        },
                        any: function() {
                            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                        }
                    };    

                    return isMobile.any()

                }
                var interlineado = "style='line-height: 10px;'";
//                if(esMobilx()){
//                    document.write("<h1 style='line-height: 0px;'><fa class='fa fa-money'></fa> </h1>");
//                    interlineado = "style='line-height: 2px;'";
//                }
//                    
                </script>
                -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
              <div class="inner" >

                <h3><b><fa class="fa fa-cart-plus"></fa></b></h3>
                <h5><b><?php echo number_format($ventas[0]['total_ventas'],2,'.',',')." Bs"; ?></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-cart-plus"></i>              
            </div>
            <a href="<?php echo base_url('venta'); ?>" class="small-box-footer"><?php echo "En ".$ventas[0]['cantidad_ventas']." ventas"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner" >

                <h3><b><fa class="fas fa-shopping-basket"></fa></b></h3>
                <h5><b><?php echo number_format($compras[0]['total_compras'],2,'.',',')." Bs"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fas fa-shopping-basket"></i>              
            </div>
                <a href="<?php echo base_url('compra'); ?>" class="small-box-footer"><?php echo "En ".$compras[0]['cantidad_compras']." compras"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
           
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
              <div class="inner" >

                <h3><b><fa class="fa fa-paste"></fa></b></h3>
                <h5><b><?php echo number_format($pedidos[0]['total_pedidos'],2,'.',',')." Bs"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-paste"></i>              
            </div>
                <a href="<?php echo base_url('pedido'); ?>" class="small-box-footer"><?php echo "En ".$pedidos[0]['cantidad_pedidos']." pedidos"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
              <div class="inner" >

                <h3><b><fa class="fa fa-globe"></fa></b></h3>
                <h5><b><?php echo number_format($ventas_online[0]['total_ventas'],2,'.',',')." Bs"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-globe"></i>              
            </div>
                <a href="<?php echo base_url('venta_online'); ?>" class="small-box-footer"><?php echo "En ".$pedidos[0]['cantidad_pedidos']." ventas online"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
              <div class="inner" >

                <h3><b><fa class="fa fa-cubes"></fa></b></h3>
                <h5><b><?php echo number_format($productos['total_inventario'],2,'.',',')." Bs"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-cubes"></i>              
            </div>
                <a href="<?php echo base_url('inventario'); ?>" class="small-box-footer"><?php echo "Inventario valorado"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner" >

                <h3><b><fa class="fa fa-cube"></fa></b></h3>
                <h5><b><?php echo number_format($productos['cantidad'],0,'.',',')." Productos registrados"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-cube"></i>              
            </div>
                <a href="<?php echo base_url('producto'); ?>" class="small-box-footer"><?php echo "Productos"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
       
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner" >

                <h3><b><fa class="fa fa-users"></fa></b></h3>
                <h5><b><?php echo number_format($clientes[0]['total_clientes'],0,'.',','); ?> Clientes registrados<sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-users"></i>              
            </div>
                <a href="<?php echo base_url('cliente'); ?>" class="small-box-footer"><?php echo "En ventas/serv.."; //$clientes[0]['total_clientes']." Clientes"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
              <div class="inner" >

                <h3><b><fa class="fa fa-wrench"></fa></b></h3>
                <h5><b><?php echo sizeof($proveedores)." Proveedores registrados"; ?><sup style="font-size: 20px"></sup></b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-wrench"></i>              
            </div>
                <a href="<?php echo base_url('proveedor'); ?>" class="small-box-footer"><?php echo "Proveedores"; ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
  
        
        

 </section>      
        
  
    
    
 
 <section class="col-lg-12 connectedSortable">
          <div class="card card-secondary">
            <div class="card-header">
              <i class="fa fa-money"></i>

              <h3 class="card-title">Ventas/Compras del mes</h3>
              <!-- tools card -->
              <div class="pull-right card-tools">
                <button type="button" class="btn btn-red btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
              <div class="card-body">
                  
                  <div class="card-body" id="div_grafica_barras">
		
                    </div>
              </div>
              </div>
 </section>

    
    <!-- /.content -->
        <section class="row">
         <div class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.card -->

          <!-- quick email widget -->
          <div class="card card-secondary">
            <div class="card-header">
              
              <h3 class="card-title">Ventas del dia</h3>
              <!-- tools card -->
              <div class="pull-right card-tools">
                <button type="button" class="btn btn-red btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
              <div class="card-body">
                          
<!--            <div class="card-header">
              <h3 class="card-title">Resumen de actividades del dia</h3>
            </div>-->
            <!-- /.card-header -->
            <div class="card-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Operación</th>
                  <th>Ventas</th>
                  <th style="width: 40px">Bs</th>
                </tr>
                <?php $cont = 0; $total_ventas = 0;
                    foreach($resumen_usuario as $user){
                        $cont++;
                        if($cont%1 == 0){ $tipobar = "danger"; $color="red";}
                        if($cont%2 == 0){ $tipobar = "info";  $color="light-blue";}
                        if($cont%3 == 0){ $tipobar = "success"; $color="green";}
                        if($cont%4 == 0){ $tipobar = "warning"; $color="yellow";}
                        if($cont%5 == 0){ $tipobar = "facebook"; $color="blue";}

                        ?>
             
                    <tr>
                       <td style="padding: 0;"><?php echo $cont; ?></td>
                       <td style="padding: 0; width:50px;" ><img src="<?php echo base_url('resources/images/usuarios/thumb_'.$user['usuario_imagen']); ?>" class="img-circle" width="50" height="50">
                          <?php //echo $user['usuario_nombre']; ?> 
                      </td>
                    
                      <td style="padding: 0;">
                          <small>
                              <?php echo $user['usuario_nombre']; ?>
                          </small>
                        <div class="progress progress-xs">   
                            
                          <div class="progress-bar progress-bar-<?php echo $tipobar; ?> progress-xs" style="width: <?php echo $user['total_ventas']/$ventas[0]['total_ventas']*100;?>%"></div>
                        </div>
                      </td>
                      <td style="padding: 0;"><span class="badge bg-<?php echo $color; ?>"><?php echo number_format($user['total_ventas'],2,'.',',');?></span></td>
                    </tr>
                    
<!--                    <tr style="padding: 0;">
                        <td colspan="2"  style="padding: 0;">
                            <small>
                               <?php echo $user['usuario_nombre']; ?>                                
                            </small>
                        </td>
                    </tr>-->
                
                <?php } ?>

              </table>
            </div>
            <!-- /.card-body -->
              
            </div>
          </div>
        </div>   
    

    
         <div class="col-lg-6 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.card -->

          <!-- quick email widget -->
          <div class="card card-secondary">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i>

              <h3 class="card-title">Ventas de la semana</h3>
              <!-- tools card -->
              <div class="pull-right card-tools">
                <button type="button" class="btn btn-red btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
                  
              </div>
              <!-- /. tools -->
            </div>
            <div class="card-body">


              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Fecha</th>
                  <th>Ventas</th>
                  <th style="width: 40px">Bs</th>
                </tr>
                 <?php $cont = 0; $total_dia = 0;
                    foreach($ventas_semanales as $ventas){
                        $total_dia = $total_dia + $ventas['venta_dia'];
                        
                    }
                      
                        
                      
                    foreach($ventas_semanales as $ventas){
                        $cont++;
                        if($cont%1 == 0){ $tipobar = "danger"; $color="red";}
                        if($cont%2 == 0){ $tipobar = "info";  $color="blue";}
                        if($cont%3 == 0){ $tipobar = "success"; $color="green";}
                        if($cont%4 == 0){ $tipobar = "warning"; $color="yellow";}
                        if($cont%5 == 0){ $tipobar = "purple"; $color="blue";}

                ?>

                <tr>
                      <td><?php echo $cont; ?></td>
                      <td>
                          <?php 
                          $fecha = new DateTime($ventas['venta_fecha']);
                            $fecha_d_m_y = $fecha->format('d/m/Y');

                            echo $fecha_d_m_y; // 01/02/2017
                            ?>
                       </td>
                    
                      <td>
                        <div class="progress progress-xs">             
                            
                          <div class="progress-bar progress-bar-<?php echo $tipobar; ?> progress-xs" style="width: <?php echo $ventas['venta_dia']/$total_dia*200;?>%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-<?php echo $color; ?>"><?php echo number_format($ventas['venta_dia'],2,'.',',');?></span></td>
                </tr>
                
                <?php } ?>

              </table>

            </div>

          </div>

        </div>   
        </section>
    <br>
        <section>
            <br>
                

        </section>   
 </body>   