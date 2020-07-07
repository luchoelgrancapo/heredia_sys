<!------------------ PRIMERA SECCION -------------------------------------->
    <div class="agileits_header">
            <div class="container" style="margin-bottom: -5px; ">
                <div class="w3l_offers" align="center">                        
                        <b> <?php if (strlen($pagina_web[0]['empresa_nombre'])>30) { ?> 
                            <a href="<?php echo base_url();?>" style="color: white;  -webkit-text-stroke: 0px red;font-size: 18px"><?php echo $pagina_web[0]['empresa_nombre']; } else { ?>
                            <a href="<?php echo base_url();?>" style="color: white;  -webkit-text-stroke: 0px red;font-size: 24px"><?php echo $pagina_web[0]['empresa_nombre']; } ?> </a></b>
                </div>
<!------------------ MENU CABECERA  ----------------------------------->                    
                <div class="agile-login">
                    <ul>
                        
                        <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-lock"></i> Usuario</a></li>
                       
                          <?php if(isset($_COOKIE["cliente_id"])) { 
                            
                                        $nombre_cliente = ucwords(strtolower($_COOKIE["cliente_nombre"])); 
                                        
                                        if(strlen($nombre_cliente)>15){
                                                $nombre_cliente = substr($nombre_cliente, 0, 12)."..";
                                        }
                        ?>
                                    
                                        <!------- Inicio menu usuario ------------>                                        
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><fa class="fa fa-user"></fa><small> <?php echo $nombre_cliente; ?></small></a>
                                            <ul class="dropdown-menu multi-column columns-3">
                                                <div class="row">
                                                    <div class="multi-gd-img">
                                                        <ul class="multi-column-dropdown">
                                                            <!--<h6>Todas</h6>-->
                                                            <li><a href="<?php echo base_url("website/miperfil/"); ?>" >Mi Perfil</a></li>
                                                            <li><a href="<?php echo base_url("website/micarrito/"); ?>" >Mi Carrito</a></li>
                                                            <!--<li><a href="<?php echo base_url("website/miscompras/").$idioma_id; ?>" >Mis Compras</a></li>-->
                                                            <li><a href="#" onclick="javascript:$.fn.CookieCompliance.disconsent(),cerrarsesion()">Cerrar Sesión</a></li>
                                                            
                                                        </ul>
                                                    </div>  

                                                </div>
                                        </ul>
                                    </li>                                         
                                    <!------- Fin menu usuario ------------>                                                                            
                        <?php } else{ ?>                                    

                                        <!------- Inicio iniciar sesion ------------>                                        
                                        <li class="dropdown">
                                            <a href="#modalCliente" data-target="#modalCliente"  class="dropdown-toggle" data-toggle="modal"><i class="fa fa-sign-in"></i> Cliente</a>
                                        </li>                                         
                                        <!------- Fin iniciar sesion ---------->
                                                                       
                        <?php }  ?>    
                      
                    </ul>

                </div>
                    <!-- --------------- INICIO Modal para ver el avance de servicios --------------- -->
                    <div class="modal fade" id="seguimientoservicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                            <br><br>
                            <div class="modal-content text-left">
                          <div class="modal-header">
                              <label>Seguimiento:</label> Soporte Técnico
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                          </div>
                            <?php
                            echo form_open('seguimiento/index');
                            ?>
                          <div class="modal-body">
                           <!-- --------------------------------------------------------------- -->
                           <div class="row">
                                <div class="col-md-6">
                                    <label for="usuario" class="control-label"><span class="text-danger">*</span>Usuario</label>
                                    <div class="form-group">
                                        <input type="text" name="usuario" id="usuario" class="form-control" required  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="contrasen" class="control-label"><span class="text-danger">*</span>Contrase&ntilde;a</label>
                                    <div class="form-group">
                                        <input type="password" name="contrasen" id="contrasen" class="form-control" required autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                           <!------------------------------------------------------------------->
                          </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-binoculars"></i> Seguimiento
                                    </button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                    <!-- --------------- F I N Modal para ver el avance de servicios --------------- -->
                     <!-- --------------- INICIO Modal para ver el avance de OT --------------- -->
                    <div class="modal fade" id="seguimientoOT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                            <br><br>
                            <div class="modal-content text-left">
                          <div class="modal-header">
                              <label>Seguimiento:</label> Ordenes de trabajo
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                          </div>
                           
                          <div class="modal-body">
                           <!-- --------------------------------------------------------------- -->
                           <div class="row">
                            <div class="col-md-6">
                                <label for="orden" class="control-label">Orden</label>
                                <div class="form-group">
                                    <input type="text" name="orden" id="orden" class="form-control" required  autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="transaccion" class="control-label">Código</label>
                                <div class="form-group">
                                    <input type="text" name="transaccion" id="transaccion" class="form-control" required autocomplete="off" />
                                </div>
                            </div>
                            </div>
                            
                           <!------------------------------------------------------------------->
                          </div>
                          <div class="modal-footer">
                            <button type="button" onclick="buscarseguimiento()" class="btn btn-success">
                                    <i class="fa fa-check "></i> Consultar
                            </button>
                          </div>
                            
                        </div>
                      </div>
                    </div>
                    <!-- --------------- F I N Modal para ver el avance de OT --------------- -->
                    
                <div class="product_list_header">  
                    <form action="#" method="post" class="last"> 
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                        <button class="w3view-cart" type="button" class="btn btn-primary" onclick="tablacarrito()"><i class="fa fa-shopping-cart" aria-hidden="true" title="Mi Carrito"></i></button>
                        
                        <?php if(isset($_COOKIE["cliente_id"])) { ?>
                                <button class="w3view-cart" type="button" class="btn btn-primary" onclick="javascript:$.fn.CookieCompliance.disconsent(),cerrarsesion()"><i class="fa fa-sign-out" aria-hidden="true" title="Cerrar Sesión"></i></button>
                        <?php }  ?>

                    </form>

                </div>

                   
                    
                    
                <div class="clearfix"> </div>
<!------------------ FIN MENU CABECERA  ----------------------------------->                    
            </div>
    </div>
<!------------------ FIN PRIMERA SECCION ----------------------------------->

<!------------------ SEGUNDA SECCION 
    <div class="logo_products">
        <div class="container">
        <div class="w3ls_logo_products_left1">
                <ul class="phone_email">
                    <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo 'PEDIDOS: '.$pagina_web[0]['pagina_telefono']; ?></li>
                    
                </ul>
            </div>
            <div class="w3ls_logo_products_left">
                <h1><a href="<?php echo base_url();?>"><?php echo $pagina_web[0]['empresa_nombre']; ?></a></h1>
            </div>
        </div>
    </div>

 FIN SEGUNDA SECCION -------------------------------------->

<!--  DATOS IMPORTANTES DE CABECERA -->       
        <div class="w3l_search">
            <center>
                
                
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
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
            </center>
        </div>

<!--  FIN DE DATOS IMPORTANTES DE CABECERA -->    

<!--  MODALES  -->


<!-- Modal: finalizar -->
<div class="modal fade" id="modalFinalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="color: white; background: #081066;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-arrow-down"></i> Finalizar Compra</h4>
        
      </div>
      <!--Body-->
      <div class="modal-body">
        <div class="col-md-12"></div>
        <table class="table table-hover">
         <div class="col-md-6">
            <b>Método de pago:</b>             
            <select class="form-control" name="metodo_pago" id="metodo_pago" required>
                <option value="1">Pago en Entrega</option>
                <option value="3">Transferencia</option>
            </select>
        </div>
        <div class="col-md-6">
            <b>Forma de envio:</b>             
            <select class="form-control" name="metodo_envio" id="metodo_envio" required>
                <option value="1">A Domicilio</option>
                <option value="2">Sucursal</option>
            </select>
        </div>
        <div class="col-md-6">
            <b>NIT:</b> <input type="text" onclick="(this.select())" class="form-control" value="" id="venta_nit" name="venta_nit" required="true">
        </div>
        <div class="col-md-6">
            <b>Razón Social:</b> <input type="text" onclick="(this.select())" class="form-control" value="" id="venta_razon" name="venta_razon" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end)" required="true">
        </div>
        <div class="col-md-6">
            <b>Celular:</b> <input type="text" class="form-control" value="" id="venta_celular" name="venta_celular" required="true">
        </div>
        <div class="col-md-6">
            <b>Teléfono:</b> <input type="text" class="form-control" value="" id="venta_telefono" name="venta_telefono" required="true">
        </div>
        <div class="col-md-6">
            <b>Dirección:</b> <input type="text" class="form-control" value="" id="venta_direccion" name="venta_direccion" required="true"> <input type="hidden" class="form-control" value="" id="venta_subtotal" name="venta_subtotal" required="true">
            <input type="hidden" class="form-control" value="" id="venta_descuento" name="venta_descuento" required="true">
            <input type="hidden" class="form-control" value="" id="venta_total" name="venta_total" required="true">
        </div>
        
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <div></div>
        <button class="btn btn-primary" type="button" onclick="venta_online()"><i class="fa fa-money"></i> Finalizar Compra</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: finalizar -->

<!-- Modal: registro -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #081066;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: white" aria-hidden="true" class="fa fa-times"></span>
        </button>
        
          <img src="<?php echo base_url("resources/web/images/logo2.png") ?>" width="25%" height="25%">
          
      </div>
      <!--Body-->
      <div class="modal-body">
        
        <table class="table table-hover">
            
            
            <tr>
                <td>    
                    <div class="row" >
                        
                           <div class="col-md-6">                                
                        <button class="btn btn-primary btn-block form-control" onclick="inisesion()" id="boton_sesion"><fa class="fa fa-key"></fa> Iniciar Sesion</button>
                    </div>
                        <div class="col-md-6">
                        <button class="btn btn-default btn-block" onclick="registrarcli()" id="boton_registro"><fa class="fa fa-user-plus"></fa> Registrate</button>
                    </div>
                    
                    </div>
                </td>    
            </tr>
            <tr>
                <td>    
            
        <!--         <div class="col-md-2">

                 </div>   -->
        <!--         <div class="col-md-5"  style="padding:0;">
                    <button class="btn btn-primary" style="width: 100%" onclick="inisesion()" type="button" >Iniciar Sesion</button>
                 </div>  -->

                    <div style="display:block;" id="inisesion" >
                            <br>

                        <div>

                            <div class="col-md-6">
                                <b><fa class="fa fa-user"></fa> Usuario/Emai: </b><input type="text" class="form-control" value="" id="cliente_login" name="cliente_login" required="true" onkeyup="saltar_input(event,1)">
                           </div>
                           <div class="col-md-6">
                               <b><fa class="fa fa-lock"></fa> Contraseña: </b><input type="password" class="form-control" value="" id="cliente_clave" name="cliente_clave" required="true" onkeyup="saltar_input(event,2)">
                               
                               <a href="<?php echo base_url("website/reestablecer_clave/"); ?>" >¿Olvidaste tu contraseña?</a>
                           </div>
                           
                           <div class="col-md-12" style="text-align: justify; line-height: 12px;">
                            <br>
                               <p >
                                   <small>
                                    Las cookies nos permiten ofrecer nuestros serivicios. Al utilizar nuestro servicio aceptas el uso que hacemos de las cookies.                                       
                                   </small>
                               </p>
                               <br>
                                
                               <center>
                                 <button class="btn btn-success" type="button" onclick="sesion()" id="boton_login"><fa class="fa fa-sign-in"></fa> Ingresar</button>     
                                 <button class="btn btn-danger" type="button" data-dismiss="modal"><fa class="fa fa-times"></fa> Cerrar</button>                
                                             
                               </center>
                           </div>
                        </div>

                    </div>        
        
                    <div class="row" id='loader1'  style='display:none; text-align: center'>
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                    </div>
                    <div style="display:none" id="registrarcli">
                        
                     <div class="col-md-6">
                         <b><fa class="fa fa-list-ul"></fa> Nombre (*): <small style="color:red;"><span id="mensaje_lognombre"> </span></small></b><input type="text" class="form-control" value="" id="cliente_nombre" name="cliente_nombre" required="true" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end); enfocar(event,1)">
                    </div>
                        
                        
                     <div class="col-md-6">
                         <b><fa class="fa fa-mobile-phone"></fa> Celular (*): <small style="color:red;"><span id="mensaje_logcelular"> </span></small></b><input type="number" class="form-control" value="" id="cliente_celular" name="cliente_celular" required="true" onkeyup="enfocar(event,2)">
                    </div>
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-map-marker"></fa> Dirección (*): <small style="color:red;"><span id="mensaje_logdireccion"> </span></small></b><input type="text" class="form-control" value="" id="cliente_direccion" name="cliente_direccion" required="true" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end); enfocar(event,3)">
                    </div>                       
                        
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-envelope"></fa> Usuario/Email (*): <small style="color:red;"><span id="mensaje_logemail"> </span></small></b><input type="text" class="form-control" value="" id="cliente_email" name="cliente_email" required="true" onkeyup="enfocar(event,4);">
                    </div>                       
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-key"></fa> Contraseña (*): <small style="color:red;"><span id="mensaje_logclave"> </span></small></b><input type="password" class="form-control" value="" id="cliente_clavereg" name="cliente_clavereg" required="true" onkeyup="enfocar(event,5);" autocomplete="off">
                    </div>
                        
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-key"></fa> Repetir contraseña (*): <small style="color:red;"><span id="mensaje_logrepetir"> </span></small></b><input type="password" class="form-control" value="" id="cliente_repeticion" name="cliente_repeticion" required="true" onkeyup="enfocar(event,6);" autocomplete="off">
                        
                    </div>
                        
                    <div class="col-md-12" style="color:red;">
                        
                        <small><span id="mensaje_log"> </span></small>
                    
                    </div>
                        
                        
                    <div class="col-md-6" hidden="true">
                        C.I.: <input type="text" class="form-control" value="0" id="cliente_ci" name="cliente_ci" required="true">        
                    </div>
                        
                    <div class="col-md-6" hidden="true">
                        NIT: <input type="text" class="form-control" value="0" id="cliente_nit" name="cliente_nit" required="true">
                    </div>
                        
                    <div class="col-md-6" hidden="true">
                        RAZON SOCIAL: <input type="text" class="form-control" value="SIN NOMBRE" id="cliente_razon" name="cliente_razon" required="true">
                    </div>
                        
                    <div class="col-md-6" hidden="true">
                        TELF: <input type="text" class="form-control" value="0" id="cliente_telefono" name="cliente_telefono" required="true">
                    </div>
                        
                    <div class="col-md-6">
                    </div>
                    
                    <div class="col-md-12">
                        <center>
                            <button class="btn btn-success" type="button" onclick="registrarcliente()"  id="boton_registrar_datos"><fa class="fa fa-floppy-o"></fa> Registrarse</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal"><fa class="fa fa-times"></fa> Cerrar</button>   
                                                        
                        </center>                            
                    </div>
                        
                    </div>
        
        
                    
        
        
                </td>
            </tr>
        
        </table>
        
      </div>
     
    </div>
  </div>
</div>
<!-- Modal: registro -->

<!--  FIN MODALES  -->