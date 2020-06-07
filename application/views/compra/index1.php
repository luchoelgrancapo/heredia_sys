<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/compra.js'); ?>" type="text/javascript"></script>
   

<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#comprar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
    $(document).ready(function () {
        (function ($) {
            $('#filtrar2').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar2 tr').hide();
                $('.buscar2 tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
      function imprimir()
        {
             window.print(); 
        }
</script>   

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
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
                <u>COMPRAS</u><br><br>
                <span class="lahora" id="fhimpresion"></span><br>
                <span style="font-size: 8pt;" id="busquedaavanzada"></span>
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
<div class="row">
    
    <div class="col-md-6">


        <!--este es INICIO del Titulo buscador-->
        <div class="box-header">
                <h4><b>Compras</b> <small class="badge badge-secondary" id="pillados">Registros Encontrados: <?php echo sizeof($compra); ?></small></h4>
        </div>
        <!--este es FIN del Titulo buscador-->
    </div>
        <!---------------- BOTONES --------->
    <div class="col-md-6">
        
    <div class="box-tools">
        <?php if (sizeof($comprasn)>0){ ?>
            <a href="#" data-toggle="modal" data-target="#avisar" class="btn bg-info btn-app" title="Registrar Nueva Compra">
              <i class="fa fa-cart-plus"></i>Comprar</a>
            
        <?php }else{ ?>    
            <a href="<?php echo site_url('compra/crearcompra'); ?>" class="btn bg-success btn-app" title="Registrar Nueva Compra"><i class="fa fa-cart-plus"></i>Comprar</a>
        <?php } ?>
            <?php if($rolusuario[10-1]['rolusuario_asignado'] == 1){ ?>
            <a data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" title="Mostrar Todas las Compras" onclick="fechadecompra('and 1')" >
              <i class="fa fa-search"></i>Ver Todos</a>
            <a class="btn bg-warning btn-app" onclick="imprimir_compra()" title="Imprimir">
              <i class="fas fa-print"></i> Imprimir
            </a>           
            <?php } ?>          
                   
    </div>
    </div>
</div>
    <!---------------- FIN BOTONES --------->
        <!--este es INICIO de input buscador-->
<div class="row">
        <div class="col-md-6">
            <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="comprar" autocomplete="off" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor" onkeypress="validacompra(event,4)" >
            </div>
        </div>
            <div class="col-md-6">
                <?php if($rolusuario[11-1]['rolusuario_asignado'] == 1){ ?>
                <select  class="btn btn-secondary" data-style="btn btn-secondary" id="select_compra" onchange="buscar_compras()">
                    <option value="1">Compras de Hoy</option>
                    <option value="2">Compras de Ayer</option>
                    <option value="3">Compras de la Semana</option>
                    <option value="5">Compras por Fecha</option>
                </select>
                <?php }?>
            </div>
</div>
            
        <!--este es FIN de input buscador-->

         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        
        
    
    

    

    
<!-------------------------------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
       
   
        <!-------------------- CATEGORIAS------------------------------------->
       
            <div class="panel panel-primary col-md-12 no-print" id='buscador_oculto' style='font-family: Arial; display:none; padding-bottom: 10px;'>
                <br>
                <center>            
                    <div class="col-md-2">
                        Desde: <input type="date" class="btn btn-primary btn-sm form-control" style=" width: 75%; font-size: 11px;"  id="fecha_desde" value="<?php echo date('Y-m-d') ?>" name="fecha_desde" required="true">
                    </div>
                    <div class="col-md-2">
                        Hasta: <input type="date" class="btn btn-primary btn-sm form-control" style=" width: 75%; font-size: 11px;"  id="fecha_hasta" value="<?php echo date('Y-m-d') ?>" name="fecha_hasta" required="true">
                    </div>

                    <div class="col-md-4">
                        Tipo:         
                        <select  class="btn btn-primary btn-sm form-control" style=" width: 45%; font-size: 11px;"  id="tipotrans_id" required="true" name="tipo_transa">
                            <option value="0">- TODOS -</option>
                            <?php foreach($tipo_transaccion as $es){?>
                                <option value="<?php echo $es['tipotrans_id']; ?>"><?php echo $es['tipotrans_nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm form-control"  onclick="buscar_por_fecha()"><span class="fa fa-search"></span> Buscar</button>
                        
                    </div>
                    <br>


                </center>    
                <br>    
            </div>

            <!-- Modal AVISO-->
<div class="modal fade" id="avisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tiene compras sin finalizar</h3>
      
      </div>
      <div class="modal-body">
        <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>Nº</th>
                        <th>Compra</th>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar2">
                        <?php $cont = 0;
                        $bandera = 0;
                        foreach($comprasn as $psn){;
                           $cont = $cont+1; ?>
                           <tr>
                            <td><?php echo $cont ?></td>
                            <td><?php echo $psn['compra_id']; ?></td>
                            <td>NO DEF.</td>
                            <td><?php echo date('d/m/Y',strtotime($psn['compra_fecha'])) ;  ?> <?php echo $psn['compra_hora']; ?></td>
                            
                            <td>
                                <a href="<?php echo site_url('compra/edit/'.$psn['compra_id'].'/'.$bandera); ?>"  class="btn btn-facebook btn-xs"><span class="fa fa-check" ></span> Continuar Esta Compra</a>
                            </td>
                    </tr>
                    <?php } ?></tbody>
                </table>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo site_url('compra/crearcompra'); ?>"  class="btn btn-success">Continuar Compra Nueva</a>
      </div>
    </div>
  </div>
</div>
        <!-- Fin Modal AVISO-->
<br>
<div class="container" id="categoria">


</div>
        <div class="box">

            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
    <tr>
      <th>Nº</th>
      <th>Proveedor</th>
      <th>Compra</th>
    <th class="the-dark">Total</th>
    <th>Fecha<br>Hora</th>
    <th>Estado</th>
    <th>Usuario</th>
    <th class="no-print"></th>
    </tr>
<!-- <tbody class="buscar" id="compraproveedor">-->
   <tbody class="buscar" id="fechadecompra"></tbody>
</table>

</div>
                
</div>
</div>
</div>

<!-------------------- FIN CATEGORIAS--------------------------------->





