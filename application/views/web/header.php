<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="196459962248-b1j1tu51032l2ke79hsdffluj5crgqp8.apps.googleusercontent.com">

    <!-- HEADER -->
    <header>
      <!-- TOP HEADER -->
      <div id="top-header">
        <div class="container">
          <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> <?php echo $pagina_web[0]['empresa_telefono']; ?></a></li>
            <li><a href="mailto:<?php echo $pagina_web[0]['empresa_email']; ?>"><i class="fa fa-envelope-o"></i> <?php echo $pagina_web[0]['empresa_email']; ?></a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> <?php echo $pagina_web[0]['empresa_direccion']; ?>, <?php echo $pagina_web[0]['empresa_departamento']; ?>.</a></li>
          </ul>
          <ul class="header-links pull-right">
            <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-lock"></i> Mi Cuenta</a></li>
          </ul>
        </div>
      </div>
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="#" class="logo">
                  <h1 style="color: white"><b> <?php if (strlen($pagina_web[0]['empresa_nombre'])>30) { ?> 
                            <a href="<?php echo base_url();?>" style="color: white;  -webkit-text-stroke: 0px red;font-size: 18px"><?php echo $pagina_web[0]['empresa_nombre']; } else { ?>
                            <a href="<?php echo base_url();?>" style="color: white;  -webkit-text-stroke: 0px red;font-size: 24px"><?php echo $pagina_web[0]['empresa_nombre']; } ?> </a></b></h1>
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-3">
              
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-6 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                 <?php if(isset($_COOKIE["cliente_id"])) { 
                            
                                        $nombre_cliente = ucwords(strtolower($_COOKIE["cliente_nombre"])); 
                                        
                                        if(strlen($nombre_cliente)>11){
                                                $nombre_cliente = substr($nombre_cliente, 0, 11)."..";
                                        }
                        ?>
                <div class="dropdown"><a href="#" class="dropdown-toggle"  aria-expanded="true"><i class="fa fa-user"></i><span><?php echo $nombre_cliente; ?></span></a>  
                   <div class="cart-dropdown">
                                                <div class="cart-list">
                                                    <div class="product-widget">
                                                     <a href="<?php echo base_url("website/miperfil/"); ?>" >Mi Perfil</a>
                                                   </div>
                                                   <div class="product-widget">
                                                     <a href="<?php echo base_url("website/micarrito/"); ?>" >Mi Carrito</a>
                                                      
                                                    </div>
                                                     <div class="product-widget">
                                                     <a href="<?php echo base_url("website/compras/") ?>" >Mis Compras</a>
                                                   </div>
                                                    <div class="product-widget">
                                                      <a href="#" onclick="javascript:$.fn.CookieCompliance.disconsent(),cerrarsesion(),signOut()">Cerrar Sesión</a>
                                                            
                                                    </div>
                                                    

                                                </div>
                                        </div> 
                </div>
                <?php } else{ ?>                   
                <div>
                  <a href="#modalCliente" data-target="#modalCliente"  class="dropdown-toggle" data-toggle="modal">
                    <i class="fa fa-sign-in"></i>
                    <span>Cliente</span>
                  </a>
                </div>
                <?php }  ?>

                 <input type="hidden" name="cmd" value="_cart">
                 <input type="hidden" name="display" value="1">
                        
                        
                <div>
                  <a href="#" onclick="tablacarrito()">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Mi Carrito</span>
                  </a>
                </div>
                <?php if(isset($_COOKIE["cliente_id"])) { ?>
                <div>
                <a href="#" onclick="javascript:$.fn.CookieCompliance.disconsent(),cerrarsesion(),signOut(),salirfb()"><i class="fa fa-sign-out" aria-hidden="true" title="Cerrar Sesión"></i><span>Cerrar Sesión</span></a>
                        <?php }  ?>
                </div>
                <!-- /Wishlist -->


                <!-- Menu Toogle -->
               
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

<!--  DATOS IMPORTANTES DE CABECERA -->       
        <div class="w3l_search" hidden>
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
      <div class="modal-header" style="color: white; background: #1E1F29;">
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
      <div class="modal-header" style="background-color: #1E1F29;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: white" aria-hidden="true" class="fa fa-times"></span>
        </button>
        
          <img src="<?php echo base_url("resources/web/images/logo2.png") ?>" width="20%" height="20%">
          
      </div>
      <!--Body-->
      <div class="modal-body">
        
        <table class="table table-hover">
            
            
            <tr style="background-color: transparent !important;">
                <td>    
                    <div class="row" >
                        
                           <div class="col-md-6">                                
                        <button class="btn btn-primary btn-block" onclick="inisesion()" id="boton_sesion"><fa class="fa fa-sign-in"></fa> Iniciar Sesión</button><br>
                    </div>
                        <div class="col-md-6">
                        <button class="btn btn-default btn-block" onclick="registrarcli()" id="boton_registro"><fa class="fa fa-user-plus"></fa> Registrarse</button><br>
                    </div>
                   
                   <center><div class="col-md-6" id="my-signin2"></div></center><br>
                   <div class="col-md-6"><center><fb:login-button  class="fb-login-button" data-size="medium" data-button-type="continue_with" scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button></center>

<div id="status">
</div></div>
</div>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
      //registrarcli();
       $("#modalCliente").modal("hide");  
      onSignIn(googleUser);
    }
    function onFailure(error) {
      console.log(error);
      //registrarcli();
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 195.2,
        'height': 25,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
function onSignIn(googleUser) {
 

  var profile = googleUser.getBasicProfile();
  var id =  profile.getId(); // Do not send to your backend! Use an ID token instead.
  var nombre = profile.getName();
  //var image = profile.getImageUrl();
  var email = profile.getEmail(); // This is null if the 'email' scope is not present.
  //alert(id);
  
  registrargmail(id,nombre,email);
 
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
function salirfb(){
    FB.logout(function(response) {
   // Person is now logged out
});
}
    
     </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>



 <script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {
    //alert(response);      // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = '';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '592816701596834',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v7.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 

  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me','GET',
  {"fields":"id,name,email"}, function(response) {
      registrargmail(response.id,response.name,response.email);
    });
  }

</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
                    </div>
                </td>    
            </tr>
            <tr style="background-color: transparent !important;">
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
                                <b><fa class="fa fa-user"></fa> Emai: </b><input type="text" class="form-control" value="" id="cliente_login" name="cliente_login" required="true" onkeyup="saltar_input(event,1)">
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
                            </div>    
                            <div class="col-md-6">
                                 <button class="btn btn-success btn-block" type="button" onclick="sesion()" id="boton_login"><fa class="fa fa-sign-in"></fa> Ingresar</button>
                            </div>
                            <div class="col-md-6">     
                                 <button class="btn btn-danger btn-block" type="button" data-dismiss="modal"><fa class="fa fa-times"></fa> Cerrar</button>                
                                             
                               
                           </div>
                        </div>

                    </div>        
        
                    <div class="row" id='loader1'  style='display:none; text-align: center'>
                    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                    </div>
                    <div style="display:none" id="registrarcli">
                        
                     <div class="col-md-6">
                         <b><fa class="fa fa-pencil-square-o"></fa> Nombre: <small style="color:red;"><span id="mensaje_lognombre"> </span></small></b><input type="text" class="form-control" value="" id="cliente_nombre" name="cliente_nombre" required="true" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end); enfocar(event,1)">
                    </div>
                        
                        
                     <div class="col-md-6">
                         <b><fa class="fa fa-mobile-phone"></fa> Celular: <small style="color:red;"><span id="mensaje_logcelular"> </span></small></b><input type="number" class="form-control" value="" id="cliente_celular" name="cliente_celular" required="true" onkeyup="enfocar(event,2)">
                    </div>
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-map-marker"></fa> Dirección: <small style="color:red;"><span id="mensaje_logdireccion"> </span></small></b><input type="text" class="form-control" value="" id="cliente_direccion" name="cliente_direccion" required="true" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end); enfocar(event,3)">
                    </div>                       
                        
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-envelope"></fa> Email: <small style="color:red;"><span id="mensaje_logemail"> </span></small></b><input type="text" class="form-control" value="" id="cliente_email" name="cliente_email" required="true" onkeyup="enfocar(event,4);">
                    </div>                       
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-lock"></fa> Contraseña: <small style="color:red;"><span id="mensaje_logclave"> </span></small></b><input type="password" class="form-control" value="" id="cliente_clavereg" name="cliente_clavereg" required="true" onkeyup="enfocar(event,5);" autocomplete="off">
                    </div>
                        
                        
                    <div class="col-md-6">
                        <b><fa class="fa fa-lock"></fa> Repetir contraseña: <small style="color:red;"><span id="mensaje_logrepetir"> </span></small></b><input type="password" class="form-control" value="" id="cliente_repeticion" name="cliente_repeticion" required="true" onkeyup="enfocar(event,6);" autocomplete="off">
                        
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
                    <br>    
                            <button class="btn btn-success btn-block" type="button" onclick="registrarcliente()"  id="boton_registrar_datos"><fa class="fa fa-floppy-o"></fa> Registrarse</button>
                    </div>
                    <div class="col-md-6">  
                    <br>
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal"><fa class="fa fa-times"></fa> Cerrar</button>   
                                                        
                                                   
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