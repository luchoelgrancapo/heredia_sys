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
<div class="row" >
    
    
<div class="col-md-3">   
            Desde: <input type="date"  class="btn btn-secondary btn-sm form-control"  id="fecha_desde" name="fecha_desde" >
</div>
<div class="col-md-3">        
            Hasta: <input type="date" class="btn btn-secondary btn-sm form-control"  id="fecha_hasta" name="fecha_hasta" >
</div>
 <div class="col-md-3 no-print" >
    Imprimir:
    <a onclick="imprimir()" class="btn btn-warning btn-block"><i class="fa fa-print"></i> Imprimir</a>
</div>

<div class="col-md-6"> 
<br> 
<div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i> Buscar Producto</span>
                    <input id="comprar" type="text" class="form-control" placeholder="Ingresa el nombre de producto, código o descripción"  onkeypress="compraproducto(event,4)">
</div>
</div>   
      <!-------------------- CATEGORIAS------------------------------------->

 <div class="col-md-6 no-print">

    <br>      
                <table class="table table-striped no-print" id="mitabla">
                    
                     <tr>
                                                <th>Nº</th>
                                                <th>ID</th>
                                                <th>Producto</th>
                                                <th></th>
                    </tr>
                    <tbody class="buscar" id="tablareproducto">
                    
                        <!------ aqui se vacia los resultados de la busqueda mediante JS --->
                    
                    </tbody>
                </table>
            </div>
            </div>


        <div class="box" style="padding: 0;">
            
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed" id="mitabla" >
                    <tr>
                        <th>Nº</th>
                        <th>PRODUCTO</th>
                        <th>CODIGO</th>
                        <th>COMPRA</th>
                        <th>TIPO</th>
                        <th>UNIDAD</th>
                        <th>FECHA</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNIT.</th>
                        <th>TOTAL</th>
                        <th>CAJERO</th>
                    </tr>
                    <tbody class="buscar" id="reportefechadecompra">
                    
                    

                    <tr>
                  
                      
                   
                    </tr>
                    <?php ?></tbody>
                </table>
                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
        </div>
        <center>
             <?php echo "---------------------------------"; ?><br>
                    Firma cajero.
        </center>
    </div>
</div>

<!-------------------- FIN CATEGORIAS--------------------------------->
                                
          
  

