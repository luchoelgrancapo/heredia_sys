<!DOCTYPE html>
<html>
    <head>
        <?php
        $session_data = $this->session->userdata('logged_in');
        $rolusuario = $session_data['rol'];
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BUSINESS SYS <?php if(isset($page_title)){ echo " - ".$page_title; }?> </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/fonts/fontawesome-free/css/all.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>"> 
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/jqvmap/jqvmap.min.css');?>">
     
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/daterangepicker/daterangepicker.css');?>">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo site_url('resources/plugins/summernote/summernote-bs4.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. 
        <link rel="stylesheet" href="<?php /*echo site_url('resources/css/_all-skins.min.css');*/?>">-->

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo site_url('resources/images/icono.png');?>" />
      <!-- Font Awesome 
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
      
      <!-- Tempusdominus Bbootstrap 4 
      <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">-->
     
     
    </head>
    
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
                          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
            </ul>
            <!-- SEARCH FORM -->
            

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="fas fa-sign-out-alt"></i>
                  <span class="badge badge-danger"></span> Salir
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      <img height="90" width="90" src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-size-50 mr-3 img-circle">
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                         <?php echo $session_data['usuario_nombre']; ?>
                          <span class="float-right text-sm text-danger"><i class="fas fa-user"></i></span>
                        </h3>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a> 
                  <div class="dropdown-divider"></div> 
                  <a href="<?php echo site_url()?>dashb/logout" class="dropdown-item badge-danger">
                    <!-- Message Start -->
                    <div class="media">
                      
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Salir de Business Sys 
                          <span class="float-right text-sm text-white"><i class="fas fa-sign-out-alt"></i></span>
                        </h3>
                      </div>
                    </div>
                    <!-- Message End -->
                  </a>                               
                </div>
              </li>
              <!-- Notifications Dropdown Menu -->
            
              <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-th-large"></i>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.navbar -->
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                  <img src="<?php echo site_url('resources/images/logo2.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                       style="opacity: .8">
                  <span class="brand-text font-weight-light"><b>BUSINESS</b> SYS</span>
                </a>
                <!-- sidebar: style can be found in sidebar.less -->
                    <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                      <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="#" class="d-block"><?php echo $session_data['usuario_nombre']; ?></a>
                    </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo site_url('dashb');?>" class="nav-link">
                                <i class="nav-icon fas fa-home fa-fw"></i> <p>Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('empresa');?>" class="nav-link">
                                <i class="nav-icon fas fa-city fa-fw"></i> <p>Empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('venta');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-arrow-down fa-fw"></i> <p>Ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('compra');?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-basket fa-fw"></i> <p>Compras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('pedido');?>" class="nav-link">
                                <i class="nav-icon fas fa-paste fa-fw"></i> <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('inventario');?>" class="nav-link">
                                <i class="nav-icon fas fa-cubes fa-fw"></i> <p>Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('ingreso');?>" class="nav-link">
                                <i class="nav-icon fas fa-funnel-dollar fa-fw"></i> <p>Ingresos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('egreso');?>" class="nav-link">
                                <i class="nav-icon fas fa-hand-holding-usd fa-fw"></i> <p>Egresos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('inscripcion');?>" class="nav-link">
                                <i class="nav-icon fas fa-user-clock fa-fw"></i> <p>Inscripciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('credito/indexCuenta');?>" class="nav-link">
                                <i class="nav-icon fas fa-search-dollar fa-fw"></i> <p>Deudas por cobrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('credito/indexDeuda');?>" class="nav-link">
                                <i class="nav-icon fas fa-comment-dollar fa-fw"></i> <p>Deudas por pagar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('cotizacion');?>" class="nav-link">
                                <i class="nav-icon fas fa-money-check-alt fa-fw"></i> <p>Cotizaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('parametro');?>" class="nav-link">
                                <i class="nav-icon fas fa-cogs fa-fw"></i> <p>Configuraciónn</p>
                            </a>
                        </li>
                        <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>
                Orden de trabajo OT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('orden_trabajo');?>" class="nav-link">
                                <i class="nav-icon fas fa-text-width fa-fw"></i> <p>OT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('proceso_orden/terminados');?>" class="nav-link">
                                <i class="nav-icon fas fa-file-import fa-fw"></i> <p>Recepcionar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('proceso_orden');?>" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check fa-fw"></i> <p>Terminar Proceso</p>
                            </a>
                        </li>
                         </ul>
          </li>-->
                        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Registros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('producto');?>" class="nav-link">
                                <i class="nav-icon fas fa-gifts fa-fw"></i> <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('cliente');?>" class="nav-link">
                                <i class="nav-icon fas fa-users fa-fw"></i> <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('servicio_temporal');?>" class="nav-link">
                                <i class="nav-icon fas fa-running fa-fw"></i> <p>Servicios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('proveedor');?>" class="nav-link">
                                <i class="nav-icon fas fa-truck fa-fw"></i> <p>Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('usuario');?>" class="nav-link">
                                <i class="nav-icon fas fa-user-lock fa-fw"></i> <p>Usuarios</p>
                            </a>
                        </li>
                         </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-closed-captioning"></i>
              <p>
                Categorias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_ingreso');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingreso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_egreso');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Egreso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_producto');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_proveedor');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_cliente');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cliente</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="<?php echo site_url('tipo_cliente');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo Cliente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('categoria_clientezona');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zonas</p>
                </a>
              </li>
            </ul>
          </li> 
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-atlas"></i>
              <p>
                Libros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('factura');?>" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('factura/factura_compra');?>" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Compras</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-download"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('reportes/ventareportes');?>" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('reportes/comprareportes');?>" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('reportes');?>" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Movimiento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('reportes/ingresorep');?>" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Ingresos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('reportes/egresorep');?>" class="nav-link">
                  <i class="fas fa-file-import nav-icon"></i>
                  <p>Egresos</p>
                </a>
              </li>
              
            </ul>
          </li>   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Venta Online
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('venta_online');?>" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('configuracion_email');?>" class="nav-link">
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Mensajes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:window.open('<?php echo site_url('detalle_venta/venta_proceso');?>','','toolbar=yes');" class="nav-link">
                  <i class="fa fa-desktop nav-icon"></i> 
                  <p>Monitor de Venta</p>
                </a>
              </li>
            </ul>
          </li>      
                    </ul>
                    </nav>
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer no-print">
                <strong>Generated By <a href="https://hvsistemasysoluciones.com/">HV Sistemas y Soluciones</a></strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        
            <!-- jQuery -->
            <script src="<?php echo site_url('resources/plugins/jquery/jquery.min.js');?>"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="<?php echo site_url('resources/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
              $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="<?php echo site_url('resources/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
            <!-- ChartJS -->
            <script src="<?php echo site_url('resources/plugins/chart.js/Chart.min.js');?>"></script>
            <!-- Sparkline -->
            <script src="<?php echo site_url('resources/plugins/sparklines/sparkline.js');?>"></script>
            <!-- JQVMap -->
            <script src="<?php echo site_url('resources/plugins/jqvmap/jquery.vmap.min.js');?>"></script>
            <script src="<?php echo site_url('resources/plugins/jqvmap/maps/jquery.vmap.usa.js');?>"></script>
            <!-- jQuery Knob Chart -->
            <script src="<?php echo site_url('resources/plugins/jquery-knob/jquery.knob.min.js');?>"></script>
            <!-- daterangepicker -->
            <script src="<?php echo site_url('resources/plugins/moment/moment.min.js');?>"></script>
            <script src="<?php echo site_url('resources/plugins/daterangepicker/daterangepicker.js');?>"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="<?php echo site_url('resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
            <!-- Summernote -->
            <script src="<?php echo site_url('resources/plugins/summernote/summernote-bs4.min.js');?>"></script>
            <!-- overlayScrollbars -->
            <script src="<?php echo site_url('resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo site_url('resources/js/adminlte.js');?>"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) 
            <script src="<?php echo site_url('resources/js/pages/dashboard.js');?>"></script>-->
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
    </body>
</html>
