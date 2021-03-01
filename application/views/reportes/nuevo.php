<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reportenuevo_ingegr.js'); ?>" type="text/javascript"></script>

<link href="<?php echo base_url('resources/css/mitabladetalleimpresion.css'); ?>" rel="stylesheet">

<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<style type="text/css">
    .card{
        margin-top: 0;
        margin-bottom: 0;
        font-size: 12px;
    }
    .card h5{
        font-size: 12px;
    }
    .card b{
        float: right;
    }
    .card-title{
        width: 83%;
    }
   
    .card-header{
        padding-top: 0px;
        padding-bottom: 0px;
    }
    .card-body{
        padding-top: 0px;
        padding-bottom: 0px;
        margin-top: 0;
        margin-bottom: 0 !important;
    }
    .card-body p{
        padding-top: 0px;
        padding-bottom: 0px;
        margin-top: 0;
        margin-bottom: 0 !important;
    }
    .card-footer{
        padding-top: 0px;
        padding-bottom: 0px;
        margin-top: 0;
        margin-bottom: 0;
    }
    .card-footer p{
        padding-top: 0px;
        padding-bottom: 0px;
        margin-top: 0;
        margin-bottom: 0 !important;
    }

</style>
<!--<label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del negocio</a></label>
 <div id="oculto1" style="visibility:hidden">
     <div id="map"><table><tr><td>aaa</td></tr>
         <tr><td>www</td></tr>
         </table></div>
        </div>-->

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<script type="text/javascript">

    function imprimirdetalle(){

        var f = new Date();

        

        var estafecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()+" "+

                        f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();

        $('#fechaimpresion').html(estafecha);

        window.print();

    }

</script>
<style type="text/css">
    @media print {
        .cabeceratabla th {
            background-color: rgba(127,127,127,0.5) !important;
            color: black !important;
            -webkit-print-color-adjust: exact;
        }
    }
    table th{
        font-size: 12px !important;
    }
    table td{
        font-size: 10px !important;
    }
</style>
<?php $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"];
      $margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;
?>
<div style="width: 100% !important; padding: 0; overflow-y:hidden;" class="table table-responsive">
<div class="box-header no-print col-md-12" style="width: 100% !important;">
    <h3 class="box-title"><b>REPORTE GENERAL DE MOVIMIENTO DIARIO (Ingresos y Egresos)</b></h3><br><br>
    <!--<div class="container">-->  
        <!--<div class="box-tools">-->
                <!--<div class=" col-md-11" >-->
                    <!-- panel panel-primary -->
                    <!--<div class="panel panel-primary col-md-8" id='buscador_oculto' > style='display:none; padding-top: 10px;'> -->
                        <div class="row">
                        <div class="col-md-3">
                            Usuario:
                            <?php if($tipousuario_id == 1){ ?>
                            <select  class="btn btn-secondary btn-sm form-control" id="buscarusuario_id" required>
                                <option value="0"> TODOS </option>
                                <?php foreach($all_usuario as $usuario){?>
                                <option value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <?php }else{ ?>
                            <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>
                                <?php
                                $ischequed = "";
                                foreach($all_usuario as $usuario){
                                    if($usuario_id == $usuario['usuario_id']){
                                        $ischequed = "selected";
                                ?>
                                <option <?php echo $ischequed; ?> value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>
                                <?php }    
                                    } ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="col-md-2">
                            Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-secondary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">
                        </div>
                        <div class="col-md-2">
                            Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-secondary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button class="btn btn-primary btn-block"  type="submit" onclick="buscar_por_fecha()">
                                <span class="fa fa-search"></span> Buscar
                          </button>
                            <br>
                        </div>
                        <div class="col-md-4" hidden>
                            <br>
                            <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Ing. Egr. encontrados: <span class="badge btn-primary"><input style="border-width: 0; width: 55px" id="resingegr" type="text" value="0" readonly="true"> </span></span>
                        </div>
                        <!--<div class="col-md-2">
                            <br>
                            <br>
                        </div>-->
                        <div class="col-md-2">
                            <br>
                            <a id="imprimirestedetalle" class="btn btn-warning btn-block" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>
                        </div>
                        </div>
                <!--</div>-->

        <!--</div>-->

    <!--</div>-->

</div>
<!-- *********** INICIO de BUSCADOR select y productos encontrados ****** -->
<div class="row" id='loader'  style='display:none; text-align: center; width: 100%'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->
<div class="row" style="width: 100%">

    <div class="col-md-12">

        <div class="box" style="width: 100%">

        <!-- ********************************INICIO Cabecera******************************* -->
        <div class="row micontenedorep" id="cabeceraprint" style="width: 100%">
    
    <table class="table" style="width: 100%; padding: 0;" >
    <!--<table class="table" style="width: 100%; padding: 0;" >-->
    <tr>
        <td style="width: 25%; padding: 0; line-height:10px;" >
            <center>
                <img src="<?php echo base_url('resources/images/empresas/').$all_empresa[0]['empresa_imagen']; ?>" width="100"><br>
                <font size="3" face="Arial"><b><?php echo $all_empresa[0]['empresa_nombre']; ?></b></font><br>
                <font size="1" face="Arial"><?php echo $all_empresa[0]['empresa_direccion']; ?><br>
                <font size="1" face="Arial"><?php echo $all_empresa[0]['empresa_telefono']; ?></font><br>
            </center>                      
        </td>
        <td style="width: 35%; padding: 0" > 
            <center>
                <br><br>
                <font size="3" face="arial"><b>REPORTE DE MOVIMIENTO</b></font> <br>
                    <label id="fechaimpresion"></label><br>
                    <label id="tituloimpresion"></label>
            </center>
        </td>
        <td style="width: 20%; padding: 0" >
            <center>
            </center>
        </td>
    </tr>
</table>       
        
</div>
<?php $espacio = " style = 'padding-left: 250px' "; ?>

        <div class="table-responsive" id="cabizquierdafechas" style="width: 100%;">

                    <label id="elusuario"></label><br>

                    <label id="fecha1impresion"></label>

                    <label id="fecha2impresion"></label>

            </div>
        
        <!--<table class='table table-striped table-condensed cabeceratabla'>
                    <tr>
                    <th>N°</th>
                    <th>Fecha</th>
                    <th>Detalle</th>
                    <th>Ingreso</th>
                    </tr>
        </table>-->
   
            <span id="imprimirie">
            <table style='width: 100%;' class='table table-striped table-condensed cabeceratabla' id='tablasinespacio'>
            <tr>
                <th style='width:5%;'></th>
                <th style='width:61%;' class="text-center"> DETALLE </th>
                <th style='width:17%;' class="text-center" id='alinearder'>INGRESOS</th>
                <th style='width:17%;' class="text-center">EGRESOS</th>
            </tr>
            <tr style="background: #c2c2c2; color: white;">
                <th style='width:5%;'></th>
                <th style='width:61%;' class="text-center"> - INGRESOS - </th>
                <th style='width:17%;' id='alinearder'></th>
                <th style='width:17%;' ></th>
            </tr>
        </table>
                </span>
<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO EN EFECTIVO<b id="totalingreso0">0.00</b></h5></div>
<div class="card-body text-white bg-success" ><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaingresoresultados"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title" >INGRESO VENTA EFECTIVO<b id="totalingreso1">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados1"></div></div></div>    

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO VENTA CREDITO<b id="totalingreso2">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados2"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO VENTA TARJETA DE DEBITO<b id="totalingreso3">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados3"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO VENTA TRANSACCION BANCARIA<b id="totalingreso4">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados4"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO VENTA TARJETA DE CREDITO<b id="totalingreso5">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados5"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO VENTA CHEQUE<b id="totalingreso6">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados6"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO COBRO DEUDA<b id="totalingreso7">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados7"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO INSCRIPCION EFECTIVO<b id="totalingreso8">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados8"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO INSCRIPCION TARJETA DE DEBITO<b id="totalingreso9">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados9"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO INSCRIPCION TRANSACCION BANCARIA<b id="totalingreso10">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados10"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO INSCRIPCION TARJETA DE CREDITO<b id="totalingreso11">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados11"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO INSCRIPCION CHEQUE<b id="totalingreso12">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados12"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO RESERVA EFECTIVO<b id="totalingreso13">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados13"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO RESERVA TARJETA DE DEBITO<b id="totalingreso14">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados14"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO RESERVA TRANSACCION BANCARIA<b id="totalingreso15">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados15"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO RESERVA TARJETA DE CREDITO<b id="totalingreso16">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados16"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title">INGRESO RESERVA CHEQUE<b id="totalingreso17">0.00</b></h5></div>
<div class="card-body text-white bg-success"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Ingreso</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados17"></div></div></div>
  
<div class="card"><div class="card-header text-white bg-success"><h5 class="card-title">TOTAL INGRESOS<b id="totalingreso">0.00</b></h5></div></div>
<div class="card"><div class="card-header text-white bg-success"><h5 class="card-title">TOTAL UTILIDAD VENTAS<b id="totalutilidad">0.00</b></h5></div></div>
<div class="card"><div class="card-header text-white bg-success"><h5 class="card-title">TOTAL INGRESOS EFECTIVO<b id="totalefectivo">0.00</b></h5></div></div>

        <table style='width: 100%' class='table table-striped table-condensed cabeceratabla' id='tablasinespacio'>
            <tr style="background: #c2c2c2; color: white;">
                <th style='width:5%;'><a href='#' id='mosingreso'>&nbsp;</a></th>
                <th style='width:61%;' class="text-center"> - EGRESOS - </th>
                <th style='width:17%;' id='alinearder'></th>
                <th style='width:17%;' ></th>
            </tr>
        </table>
       
<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title" style=" width: 98%">EGRESO EN EFECTIVO<b id="totalegreso30">0.00</b></h5></div>
<div class="card-body text-white bg-danger"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Egreso</strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados30"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title" style=" width: 98%">EGRESO COMPRA EFECTIVO<b id="totalegreso31">0.00</b></h5></div>
<div class="card-body text-white bg-danger"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Egreso</strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados31"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title" style=" width: 98%">EGRESO COMPRA CREDITO<b id="totalegreso32">0.00</b></h5></div>
<div class="card-body text-white bg-danger"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Egreso</strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados32"></div></div></div>

<div class="card collapsed-card"><div class="card-header"><div class="card-tools">
<button type="button" class="btn btn-tool no-print btn-xs" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
<h5 class="card-title" style=" width: 98%">EGRESO PAGO DEUDA<b id="totalegreso33">0.00</b></h5></div>
<div class="card-body text-white bg-danger"><div class="row"><div class="col-md-1"><p class="text-center"><strong>Nº</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Fecha</strong></p></div>
<div class="col-md-5"><p class="text-center"><strong>Detalle</strong></p></div>
<div class="col-md-2"><p class="text-center"><strong></strong></p></div>
<div class="col-md-2"><p class="text-center"><strong>Egreso</strong></p></div></div></div>
<div class="card-footer"><div id="tablaventaresultados33"></div></div></div>

<div class="card"><div class="card-header text-white bg-danger"><h5 class="card-title" style=" width: 98%">TOTAL EGRESOS<b id="totalegreso">0.00</b></h5></div></div>

<div class="card"><div class="card-header text-white bg-secondary"><h4 class="card-title" style=" width: 98%">TOTAL EFECTIVO CAJA<b id="totalefectivocaja">0.00</b></h4></div></div>

<div class="card"><div class="card-header text-white bg-secondary"><h4 class="card-title" style=" width: 98%">TOTAL (INGRESOS-EGRESOS)<b id="totaltotal">0.00</b></h4></div></div>

<br>          
            <!--<div style="display: flex">
                <div id="parafirmas" style="font-size: 10px; width: 60%">
                    <div id="firmaizquierda">
                      <br>
                      <br>
                      ________________________<br>ENTREGADO POR
                    </div>
                    <div id="firmaderecha">
                      <br>
                      <br>
                      ________________________<br>REVISADO POR
                    </div>
                </div>
                <div class="column" align="right" style="font-size: 10px; width: 40%">
                      <p class="subtitulo">EFECTIVO EN CAJA Bs.:...........................$US:.........................</p>
                      <p class="subtitulo">UTILIDAD BRUTA Bs.:...........................$US:.........................</p>
                      <p class="subtitulo">GASTOS OPERAT. Bs.:...........................$US:.........................</p>
                      <p class="subtitulo">UTILIDAD NETA Bs.:...........................$US:.........................</p>
                </div>
            </div>-->
        </div>
    </div>
</div>
</div>
