<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<style type="text/css">

body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: url('resources/images/fondotech.jpg') no-repeat;
}
.login-error {
  position: absolute;
  top: 1%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,0.7);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-error h4 {
  padding-top: 60px;
  color: #fff;
  text-align: center;
}

.alert-text {
  padding-top: 60px;
  color: #fff;
  text-align: center;
}

.alert-texto {
  padding-top: 60px;
  color: red;
  text-align: center;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,0.7);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  top: 15px;
  left: 25px;
  display: inline-block;
  padding: 10px 20px;
  color: #f40303;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #f40303;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #f40303,
              0 0 25px #f40303,
              0 0 50px #f40303,
              0 0 100px #f40303;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #f40303);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #f40303);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #f40303);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #f40303);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

.login-box form button {
  position: relative;
  border: 0;
  background-color: transparent;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box button:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box button span {
  position: absolute;
  display: block;
}

.login-box button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box button span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}


</style>
<head>
    <title>Heredia SYS :: Sistema Integral de Ventas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
   
</head>  
<body>

    <?php if($diaslic['dias'] < 0){ ?>
<div class="login-error">
                
                  <br>
                  <br>
                  <br>
                  <br>
                  <span class="alert-texto"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>
                  <br>  
                
                  <span class="alert-text">
                    No podra ingresar al Sistema.<br>  Consulte con el Proveedor
                  </span>
              </div>
<?php } else if($diaslic == 5000){ ?>
  <?php }  else { ?>  
    <div class="login-error">
               
                  <br>
                  <br>
                  <br>
                  <br>
                  <span class="alert-text">LA LICENCIA VENCERA EN: <font size="5"><b><?php echo $diaslic['dias']; ?></b></font> DIAS</span>
                
                 <br>
                  <span class="alert-text">
                    No podra ingresar al Sistema.
                  </span>
                </div><!-- /.info-box-content -->
               
<?php } ?>

               
            <?php 
 
          echo $this->session->flashdata('msg'); ?>

              <?php if($diaslic['dias'] < 0){ ?>
               <div class="login-error">
                
                  <br>
                  <br>
                  <br>
                  <br>
                  <span class="alert-texto"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>
                  <br>  
                
                  <span class="alert-text">
                    No podra ingresar al Sistema.<br>  Consulte con el Proveedor
                  </span>
              </div>
             <?php }else { ?>
  <div class="login-box">
    <h2><?php echo $empresa[0]["empresa_nombre"] ?><h2>              
                <img align="center" src="<?php echo base_url('resources/images/empresas/'.$empresa[0]["empresa_imagen"].''); ?>"  style="width:80px;height:80px">
                <h2>HEREDIA SYS</h2>
 
  <?php echo form_open('verificar'); ?>
    <div class="user-box">
      <input type="text" autofocus name="username" id="username"  autocomplete="off" required="">
      <label>Usuario</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" id="password" required="">
      <label>Password</label>
    </div>
    <button  type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Ingresar
    </button>
    <a href="<?php echo base_url(); ?>">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Volver
    </a>
  <?php echo form_close(); ?>
</div>
             
             <?php } ?>
   

