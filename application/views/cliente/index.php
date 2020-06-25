<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/funciones_cliente.js'); ?>" type="text/javascript"></script>
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
<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/servicio_reportedia.css'); ?>" rel="stylesheet">-->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="formaimagen" id="formaimagen" value="<?php  echo $parametro['parametro_formaimagen']; ?>" />
<input type="hidden" name="tipousuario_id" id="tipousuario_id" value="<?php  echo $tipousuario_id; ?>" />
<!--<input type="hidden" name="lacategoria_cliente" id="lacategoria_cliente" value='<?php /*echo json_encode($all_categoria_cliente); ?>' />
<input type="hidden" name="lacategoria_clientezona" id="lacategoria_clientezona" value='<?php echo json_encode($all_categoria_clientezona);  ?>' />
<input type="hidden" name="elusuario" id="elusuario" value='<?php echo json_encode($all_usuario); */ ?>' />-->
<!-------------------------------------------------------->
<div class="row micontenedorep" style="display: none" id="cabeceraprint">
    <div id="cabizquierda">
        <?php
        echo $empresa[0]['empresa_nombre']."<br>";
        echo $empresa[0]['empresa_direccion']."<br>";
        echo $empresa[0]['empresa_telefono'];
        ?>
        </div>
        <div id="cabcentro">
            <div id="titulo">
                <u>CLIENTES</u><br><br>
                <!--<span style="font-size: 9pt">INGRESOS DIARIOS</span><br>-->
                <span class="lahora" id="fhimpresion"></span><br>
                <span style="font-size: 8pt;" id="busquedacategoria"></span>
                <!--<span style="font-size: 8pt;">PRECIOS EXPRESADOS EN MONEDA BOLIVIANA (Bs.)</span>-->
            </div>
        </div>
        <div id="cabderecha">
            <?php

            $mimagen = "thumb_".$empresa[0]['empresa_imagen'];

            echo '<img src="'.site_url('/resources/images/empresas/'.$mimagen).'" />';

            ?>

        </div>
        
</div>
<br>
<div class="row no-print">
    
    <div class="col-md-6">

<div class="box-header">
                <h4><b>CLIENTES</b> <small class="badge badge-secondary" id="encontrados"></small></h4>
        </div>
</div>
<div class="col-md-6">

            <div class="box-tools">
                <a href="<?php echo base_url('cliente/add/'); ?>" class="btn bg-success btn-app" title="Registrar nuevo Cliente"><span class="fa fa-user-plus"></span>Registrar</a>
                <button data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" onclick="mostrar_all_clientes()" title="Mostrar a todos los Clientes" ><span class="fa fa-search"></span>Ver Todos</button>
                <?php
                if($rol[97-1]['rolusuario_asignado'] == 1){ ?>
                <a onclick="imprimir_cliente()" class="btn bg-warning btn-app" title="Imprimir lista de Clientes"><span class="fa fa-print"></span>Imprimir</a>
                <a href="<?php echo base_url('cliente/clienteprint'); ?>" target="_blank" class="btn bg-secondary btn-app" title="Imprimir lista de Clientes con detalle resumido"><span class="fa fa-file"></span>Resumen</a>
                <!--<a href="<?php echo base_url('cliente/mapa_cliente'); ?>" class="btn bg-purple btn-app" title="Mostrar mapa de clientes"><span class="fa fa-map"></span>Mapa</a>
                <?php } ?>
            <a href="" class="btn btn-info btn-foursquarexs"><span class="fa fa-cubes"></span></font><br><small>Productos</a>-->            
    </div>
</div>
</div>
        <!--este es FIN del BREADCRUMB buscador-->
         
            <!--este es INICIO de input buscador-->
            <div class="row">
             <div class="col-md-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit" onkeypress="buscarcliente(event)" autocomplete="off">
            </div>
            </div>
       
        <!--<div class="col-md-12">-->
            <!--este es FIN de input buscador-->
            
            <div class="col-md-2">
                <div class="box-tools">
                    <select name="tipo_id" class="btn btn-secondary" id="tipo_id" onchange="tablaresultadoscliente(2)">
                        <option value="" disabled selected >-- TIPOS --</option>
                        <option value="0"> Todos los Tipos </option>
                        <?php 
                        foreach($all_tipo_cliente as $tipocliente)
                        {
                            echo '<option value="'.$tipocliente['tipocliente_id'].'">'.$tipocliente['tipocliente_descripcion'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box-tools">
                    <select name="categoriaclie_id" class="btn btn-secondary" id="categoriaclie_id" onchange="tablaresultadoscliente(2)">
                        <option value="" disabled selected >-- CATEGORIAS --</option>
                        <option value="0"> Todas Las Categorias </option>
                        <?php 
                        foreach($all_categoria_cliente as $categoria)
                        {
                            echo '<option value="'.$categoria['categoriaclie_id'].'">'.$categoria['categoriaclie_descripcion'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box-tools">
                    <select name="zona_id" class="btn btn-secondary" id="zona_id" onchange="tablaresultadoscliente(2)">
                        <option value="" disabled selected >-- ZONAS --</option>
                        <option value="0"> Todas Las Zonas </option>
                        <?php 
                        foreach($all_categoria_clientezona as $zona)
                        {
                            echo '<option value="'.$zona['zona_id'].'">'.$zona['zona_nombre'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box-tools">
                    <select name="estado_id" class="btn btn-secondary" id="estado_id" onchange="tablaresultadoscliente(2)">
                        <option value="" disabled selected >-- ESTADOS --</option>
                        <option value="0"> Todos los Estados </option>
                        <?php 
                        foreach($all_estado as $estado)
                        {
                            echo '<option value="'.$estado['estado_id'].'">'.$estado['estado_descripcion'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box-tools">
                    <select name="prevendedor_id" class="btn btn-secondary" id="prevendedor_id" onchange="tablaresultadoscliente(2)">
                        <option value="" disabled selected >-- USUARIOS --</option>
                        <option value="0"> Todos los Usuarios </option>
                        <option value="-1"> Sin Usuario Asignado </option>
                        <?php 
                        foreach($all_prevendedor as $prevendedor)
                        {
                            echo '<option value="'.$prevendedor['usuario_id'].'">'.$prevendedor['usuario_nombre'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <!--</div>-->
        <!-- *********** INICIO de BUSCADOR select y productos encontrados ****** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->
        
        
<br>
    
<!-------------------------------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->

        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Negocio</th>
                        <!--<th>Dirección</th>-->
                        <th class="no-print">Map</th>
<!--                        <th>Email</th>-->
                        <!--<th>Aniversario</th>-->
<!--                        <th>Tipo</th>-->
                        <!--<th>Categoria</th>-->
                        <th>Estado</th>
                        <!--<th>Estado</th>-->
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    
                    </tbody>    
                </table>
                <?php if($err==2){ ?>
                <script>alert("La imagen es demasiado grande ")</script>
                <?php } ?>
                <?php if($err==1){ ?>
                <script>alert("No se puede subir una imagen con ese formato ")</script>
                <?php } ?>
            </div>

        </div>
    </div>
</div>
<?php
if($a == 1)
echo '<script type="text/javascript">
    alert("El Cliente NO puede ser ELIMINADO, \n porque tiene transacciones realizadas");
</script>';
?>