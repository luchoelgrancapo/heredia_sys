<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/graficos_estadisticos.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/highcharts.js'); ?>"></script>
<script type="text/javascript">
    
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

</script>

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->    
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="text" id="parametro_modoventas" value="<?php echo $parametro[0]['parametro_modoventas']; ?>" name="parametro_modoventas"  hidden>
<input type="text" id="parametro_anchoboton" value="<?php echo $parametro[0]['parametro_anchoboton']; ?>" name="parametro_anchoboton"  hidden>
<input type="text" id="parametro_altoboton" value="<?php echo $parametro[0]['parametro_altoboton']; ?>" name="parametro_altobotono"  hidden>
<input type="text" id="parametro_colorboton" value="<?php echo $parametro[0]['parametro_colorboton']; ?>" name="parametro_colorboton"  hidden>
<input type="text" id="parametro_altoimagen" value="<?php echo $parametro[0]['parametro_altoimagen']; ?>" name="parametro_altoimagen"  hidden>
<input type="text" id="parametro_anchoimagen" value="<?php echo $parametro[0]['parametro_anchoimagen']; ?>" name="parametro_anchoimagen"  hidden>
<input type="text" id="parametro_formaimagen" value="<?php echo $parametro[0]['parametro_formaimagen']; ?>" name="parametro_formaimagen"  hidden>
<input type="text" id="parametro_modulorestaurante" value="<?php echo $parametro[0]['parametro_modulorestaurante']; ?>" name="parametro_modulorestaurante"  hidden>

<input type="text" id="rol_precioventa" value="<?php echo $rolusuario[160-1]['rolusuario_asignado']; ?>" hidden>
<input type="text" id="rol_factor" value="<?php echo $rolusuario[161-1]['rolusuario_asignado']; ?>" hidden>
<input type="text" id="rol_factor1" value="<?php echo $rolusuario[162-1]['rolusuario_asignado']; ?>" hidden>
<input type="text" id="rol_factor2" value="<?php echo $rolusuario[163-1]['rolusuario_asignado']; ?>" hidden>
<input type="text" id="rol_factor3" value="<?php echo $rolusuario[164-1]['rolusuario_asignado']; ?>" hidden>
<input type="text" id="rol_factor4" value="<?php echo $rolusuario[165-1]['rolusuario_asignado']; ?>" hidden>

<input id="base_url" name="base_url" value="<?php echo base_url(); ?>" hidden>
<input id="empresa_nombre" name="empresa_nombre" value="<?php echo $empresa['empresa_nombre']; ?>" hidden>
<input type="text" value="" id="parametro" hidden>




<div class="box-header no-print">
    <h3 class="box-title"><font face="Arial" size="3"><b>ESTADISTICA DE VENTAS</b></font></h3>
            	<!--<div class="box-tools">                    
                    <?php if($rolusuario[23-1]['rolusuario_asignado'] == 1){ ?>
                    <select  class="btn btn-facebook btn-sm" id="select_ventas" onclick="buscar_ventas()">-->
<!--                        <option value="1">-- SELECCIONE UNA OPCION --</option>-->
                        <!--<option value="1">Ventas de Hoy</option>
                        <option value="2">Ventas de Ayer</option>
                        <option value="3">Ventas de la semana</option>
                        <option value="4">Todos las ventas</option>
                        <option value="5">Ventas por fecha</option>
                    </select>
                    <?php } ?>
                    <button class="btn btn-secondary btn-sm" onclick="verificar_ventas()"><span class="fa fa-binoculars"></span> Verificar </button>
                    <a href="<?php echo site_url('venta/registrar'); ?>" class="btn btn-success btn-sm"><span class="fa fa-cart-arrow-down"></span> Ventas</a>
                </div>-->
</div>
<!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<!--<form method="post">-->
    <div class="row">
<div class="col-md-12 no-print" id='buscador_oculto' style='display:block;'>
            
 </div>       
        <div class="col-md-2">
            Mes: 
            <?php 
                $mes_actual = date("m");
                $anio_actual = date("Y");
            ?>
            <select  class="btn btn-secondary btn-sm form-control" id="select_mes">
                
                <?php 
                
                    
                    $mes = array(1 => "ENERO",2 => "FEBRERO", 3 => "MARZO",4 => "ABRIL",5 => "MAYO",6 => "JUNIO",
                                   7 => "JULIO", 8 => "AGOSTO", 9 => "SEPTIEMBRE", 10 => "OCTUBRE", 11 => "NOVIEMBRE", 12 => "DICIEMBRE");
                    for($i = 1;$i<=12;$i++){ ?>
                        <option value="<?php echo $i; ?>" <?php if ($i == $mes_actual){ echo "selected";} ?> ><?php echo $mes[$i]; ?></option>
                <?php } ?>
            </select>
        </div>
        

        <div class="col-md-2">
            Año: 
            <select  class="btn btn-secondary btn-sm form-control" id="select_anio">
                
                <?php                     
                    for($i = 2015;$i<=2050;$i++){ ?>
                <option value="<?php echo $i; ?>" <?php if ($i == $anio_actual){ echo "selected";} ?>> <?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="col-md-2">
            Tipo Gráfico: 
            <select  class="btn btn-secondary btn-sm form-control" id="select_tipo">
                
                <option value="bar" selected> BARRAS</option>
                <option value="column" selected> COLUMNAS</option>
                <option value="area" selected> AREAS</option>
                <option value="line" selected> LINEAS</option>
            </select>
        </div>
        
        
        <div class="col-md-2">
            Año: 
            <button class="btn btn-primary  form-control" onclick="grafico_ventas()"><fa class="fa fa-binoculars"></fa> Buscar</button>
        </div>
        

<!------------------------------------------------------------------------------------------->

<div class="panel panel-primary col-md-12"  >  

<div class="row">
    <div class="col-md-12">
        
<div class="row" id='oculto' style='display:none;'>
    <center>
        <img src="<?php echo base_url("resources/images/loader.gif"); ?>" >        
    </center>
</div> 

<div class="row" id='oculto2' style='display:none;'>
    <center>
        <img src="<?php echo base_url("resources/images/loader.gif"); ?>" >        
    </center>
</div> 
<!--------------------- fin inicio loader ------------------------->

    </div>
</div>
            
        <div class="row">
            
            <div class="col-md-3">
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th style="padding:0;">Fecha</th>
                        <th style="padding:0;">Ventas</th>
                        <th style="padding:0;">Utilidades</th>						
                    </tr>

                    <tbody class="buscar" id="tabla_ventas">
                    </tbody>
                </table>
            </div> 
            </div>

            <div class="col-md-9">            
                <div class="box-body" id="div_grafica_barras">
                    
                </div>
                <div id="tabla_estadistica">
                    
                </div>
            </div>
        </div>

<!--<div class="box-body">

    <div class="box-body" id="div_grafica_barras">

      </div>
</div>-->