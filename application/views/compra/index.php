<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/compra_index.js'); ?>" type="text/javascript"></script>
   

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
<div class="row" style="display: none" id="cabeceraprint">
    <table class="table" style="width: 100%; padding: 0;" >
    <tr>
        <td style="width: 25%; padding: 0; line-height:10px;" >
                
            <center>
                               
                    <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 35%; padding: 0" > 
            <center>
            
                <br><br>
                <font size="3" face="arial"><b>COMPRAS</b></font> <br>
                
                <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font> <br>
                <font size="1" face="arial" id="busquedaavanzada"><b></b></font> <br>
            </center>
        </td>
        <td style="width: 20%; padding: 0" >
                <center>
                         
                             
                            
                         
                        
                    </center>
        </td>
    </tr>
     
    
    
</table>       
        
</div>
<br>
<div class="row">
    
    <div class="col-md-6">


        <!--este es INICIO del Titulo buscador-->
        <div class="box-header">
                <h4><b>COMPRAS</b> <small class="badge badge-secondary" id="pillados"></small></h4>
        </div>
        <!--este es FIN del Titulo buscador-->
    </div>
        <!---------------- BOTONES --------->
    <div class="col-md-6">
        
    <div class="box-tools">
        <?php if (sizeof($comprasn)>0){ ?>
            <a href="<?php echo site_url('compra/registrar/'.$comprasn[0]['compra_id'].'/0'); ?>" class="btn bg-info btn-app" title="Continuar con la Compra">
              <i class="fa fa-cart-plus"></i>Continuar Compra</a>
            
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
                    <input id="comprar" autocomplete="off" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor" onkeypress="compraproveedor(event)" >
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
        
        
        <!-------------------- CATEGORIAS------------------------------------->
       
            <div class="panel panel-primary col-md-12 no-print" id='buscador_oculto'>
                <br>
                <div class="row">         
                    <div class="col-md-3">
                        Desde: <input type="date" class="btn btn-secondary btn-sm form-control"  id="fecha_desde" value="<?php echo date('Y-m-d') ?>" name="fecha_desde" required="true">
                    </div>
                    <div class="col-md-3">
                        Hasta: <input type="date" class="btn btn-secondary btn-sm form-control"   id="fecha_hasta" value="<?php echo date('Y-m-d') ?>" name="fecha_hasta" required="true">
                    </div>

                    <div class="col-md-3">
                        Tipo:         
                        <select  class="btn btn-secondary btn-sm form-control"   id="tipotrans_id" required="true" name="tipo_transa">
                            <option value="0">- TODOS -</option>
                            <?php foreach($tipo_transaccion as $es){?>
                                <option value="<?php echo $es['tipotrans_id']; ?>"><?php echo $es['tipotrans_nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-primary btn-sm form-control"  onclick="buscar_por_fecha()"><span class="fa fa-search"></span> Buscar</button>
                        
                    </div>
                    <br>

                </div>
                  
                <br>    
            </div>


<br>
<div class="container" id="categoria">
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
    <tr>
      <th>Nº</th>
      <th>Proveedor</th>
      <th>Compra</th>
    <th>Totales</th>
    <th>Estado</th>
    <th>Fecha</th>
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





