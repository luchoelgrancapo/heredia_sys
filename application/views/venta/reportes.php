<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reporteventa.js'); ?>" type="text/javascript"></script>
 
    
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

<style type="text/css">
 @page { 
        size: landscape;
    }
     
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="row" style="display: block" id="cabeceraprint">
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
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono'];  ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 35%; padding: 0" > 
            <center>
            
                <br><br>
                <font size="3" face="arial"><b>VENTAS</b></font> <br>
                
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
<div class="row" >
   
             
        <div class="col-md-2 no-print">
            Desde: <input type="date" value="<?php echo date('Y-m-d') ?>" class="btn btn-secondary btn-sm form-control"  id="fecha_desde" name="fecha_desde" >
        </div> 
        <div class="col-md-2 no-print">
            Hasta: <input type="date" value="<?php echo date('Y-m-d') ?>" class="btn btn-secondary btn-sm form-control"  id="fecha_hasta" name="fecha_hasta" >
        </div>
        <div class="col-md-3 no-print">
            TIPO: <select id="tipo_transaccion" name="tipo_transaccion" class="btn btn-secondary btn-sm form-control"  >
                <option value="0">-TODOS-</option>
                                            <?php
                                                foreach($all_tipo_transaccion as $tipo){ ?>
                                                    <option value="<?php echo $tipo['tipotrans_id']; ?>"><?php echo $tipo['tipotrans_nombre']; ?></option>                                                   
                                            <?php } ?>
 
                                         </select>
        </div>
        <div class="col-md-3 no-print">
            <br>
            <button class="btn btn-primary  btn-block" onclick="reportes()"><i class="fa fa-search"></i> Buscar</button>
        </div>
        <div class="col-md-2 no-print">
            <br>
            <a onclick="imprimir()" class="btn btn-warning btn-block"><i class="fa fa-print"></i>Imprimir</a>
        </div>

   <?php if ($porque=='prod') { ?>
      <div class="col-md-6 no-print" >  
      <br>       
      <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i> Buscar Producto</span>
                    <input id="vender" type="text" class="form-control" placeholder="Ingresa el nombre de producto, código o descripción"  onkeypress="ventaproducto(event)">
      </div>            
    </div>
   <?php }     ?>
   <?php if ($porque=='cli') { ?>
    <div class="col-md-6 no-print" >     
    <br> 
    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i> Buscar Cliente</span>
                    <input id="cliente_id" type="text" class="form-control" placeholder="Ingresa el nombre del cliente, nit o razon social"  onkeypress="ventacliente(event)">
    </div>               
    </div> 
    <?php }     ?> 
    <?php if ($porque=='pro') { ?>
    <div class="col-md-6 no-print" > 
    <br>  
    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i> Buscar Proveedor</span>
                    <input id="proveedor_id" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor"  onkeypress="ventaproveedor(event)">
    </div>                  
      <div class="input-group no-print"> <span class="input-group-addon">Buscar Proveedor</span>
        <input id="proveedor_id" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor"  onkeypress="ventaproveedor(event)">
      </div>
   
    </div>
    <?php }     ?>
    <!--<div class="col-md-6 no-print" >                     
      <div class="input-group no-print"> <span class="input-group-addon">Buscar Categoria</span>
        <input id="vender" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor"  onkeypress="ventaproducto(event)">
      </div>
   
    </div>-->

                              
          <?php if ($porque=='prod') { ?>  
          <div class="col-md-6 no-print" id="tablareproducto"></div>
          <?php }     ?>
   <?php if ($porque=='cli') { ?>
          <div class="col-md-6 no-print" id="tablarecliente"></div>
          <?php }     ?>
          <div class="col-md-6 no-print" id="tablareproveedor"></div>
           <input id="producto" type="hidden" class="form-control" >
           <input id="cliente" type="hidden" class="form-control" > 
           <input id="proveedor" type="hidden" class="form-control" > 
       
            
</div>
         <span id="desde"></span>
         <span id="hasta"></span>
       <div id="labusqueda">
              
           </div> 
        
     
           <br>
<div class="row no-print" id='loader'  style='display:none;'>
                        <center>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >        
                        </center>
                    </div>

        <div class="box" style="padding: 0;">
            
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed" id="mitabla" >
                    <tr>
                        <th>Nro.</th>
                        <th>PRODUCTO</th>
                        <th>FECHA<br>VENTA</th>
                        <th>NUM.<BR>VENTA</th>
                        <th>NUM.<BR>DOC.</th>
                        <th>TIPO<br>VENTA</th>
                        <th>CUOTA<br>INIC.</th>
                        <th>UNIDAD</th>
                        <th>CANT.</th>
                        <th>PRECIO<BR>UNIT.</th>
                        <th>DESC</th>
                        <th>PRECIO<BR>TOTAL</th>
                        <th>COSTO</th>
                        <th>UTILID.</th>
                        <th>CLIENTE</th>
                        <th>CAJERO</th>
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar" id="reportefechadeventa">
                    
                    

                    <tr>
                  
                      
                   
                    </tr>
                    <?php ?></tbody>
                </table>
                
            </div>
                        
        </div>
        <center>
            <ul style="margin-bottom: -5px;margin-top: 35px;" >--------------------------------</ul>
                     <ul style="margin-bottom: -5px;">RESPONSABLE</ul><ul>FIRMA - SELLO</ul>
        </center>
    </div>
</div>

<!-------------------- FIN CATEGORIAS--------------------------------->
                                
          
  

