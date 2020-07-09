<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/cotizacion.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#cotizar_cli').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

        function imprimir()
        {
           $("#cabeceraprint").css("display", "");
             window.print(); 
        }
</script>  
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<input type="hidden" name="cotizacion_id" id="cotizacion_id" value="0">
<!-------------------------------------------------------->
<div class="row" style="display: none;" id="cabeceraprint">
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
                <font size="3" face="arial"><b>COTIZACIONES</b></font> <br>
                
                <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font> <br>

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


        <!--este es INICIO del BREADCRUMB buscador-->
        <div class="box-header">
                <h4><b>DEUDAS POR COBRAR</b> <small class="badge badge-secondary" id="pillados"></small></h4>
        </div>
        <!--este es FIN del BREADCRUMB buscador-->
</div> 
     <div class="col-md-6 no-print">
        
    <div class="box-tools">
        <center>    
            <a href="<?php echo site_url('cotizacion/creacotizacion'); ?>" class="btn bg-success btn-app"><i class="fa fa-cart-plus"></i>Cotizar</a>
            
            <button data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" onclick="fechacotizacion('and 1')" ><i class="fa fa-search"></i>Ver Todos</button>
            
            <a href="#" onclick="imprimir()" class="btn bg-warning btn-app"><i class="fa fa-print"></i>Imprimir</a>
             
        </center>            
    </div>
    </div>   
        <!--este es INICIO de input buscador-->
        <div class="col-md-6 no-print">
            <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-search"></i></span>         
                <input id="cotizar_cli" type="text" class="form-control" placeholder="Ingresa el nombre de cliente" onkeypress="buscar_porcliente(event)" >
            </div></div>
            <div class="col-md-3 no-print">
                
                <select  class="btn btn-secondary btn-block"  id="select_fecha" onchange="busqueda_cotizacion()">
                    
                    <option value="1">Cotizaciones de Hoy</option>
                    <option value="2">Cotizaciones de Ayer</option>
                    <option value="3">Cotizaciones de la semana</option>
                    <option value="5">Cotizaciones por fecha</option>
                </select>
                
            </div>
            
        <!--este es FIN de input buscador-->

        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="col-md-12" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
     </div> 
     <div class="col-md-12 no-print" id='buscador_oculto' style='font-family: Arial; display:none; padding-bottom: 10px;'>
                    <div class="row"> 
                    <div class="col-md-4">
                        Desde: <input type="date" class="btn btn-secondary btn-sm form-control" id="fecha_desde" value="<?php echo date('Y-m-d') ?>" name="fecha_desde" required="true">
                    </div>
                    <div class="col-md-4">
                        Hasta: <input type="date" class="btn btn-secondary btn-sm form-control" id="fecha_hasta" value="<?php echo date('Y-m-d') ?>" name="fecha_hasta" required="true">
                    </div>

                   
                    <div class="col-md-4"><br>
                        <button class="btn btn-primary btn-sm form-control" face='Arial' tyle='font-family: Arial;' onclick="buscar_por_fecha()"><span class="fa fa-search"></span> Buscar</button>
                        
                    </div>
                 
</div>    
    
                
            </div>
    
    <br>    
    <div class="col-md-12">
        
        <div class="box">
          
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Nº</th>
                        <th>Cliente</th>
						<th>Fecha</th>
						<th>Validez</th>
						<th>Forma de Pago</th>
						<th>Tiempo de Entrega</th>
						<th>Registro<br>Fecha/Hora</th>
						<th>Total Bs.</th>
                        <th>Usuario</th>
						<th class="no-print"></th>
                    </tr>
                    <tbody class="buscar" id="fechadecotizacion">
                  
                </table>
                                
            </div>
        </div>
    </div>
</div>
