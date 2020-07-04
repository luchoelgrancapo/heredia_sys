<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/compra.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
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
       <div class="col-md-3 no-print" >
      <div  class="box-tools "  >
                          
                    <select  class="btn btn-secondary btn-block form-control" style="border: none;" id="select_compra" onchange="reporte_compras()">
                        <option value="1">Compras de Hoy</option>
                        <option value="2">Compras de Ayer</option>
                        <option value="3">Compras de la semana</option>
                        <option value="4">Todas las Compras</option>
                        <option value="5">Compras por fecha</option>
                    </select>
            

      </div>
  
</div>
 <div class="col-md-3 no-print" >
    <a onclick="imprimir()" class="btn btn-warning btn-block"><i class="fa fa-print"></i> Imprimir</a>
    </div>
      <div class="container" id="categoria">
    
 
                <!--------------------- indicador de resultados --------------------->
    <!--<button type="button" class="btn btn-primary"><span class="badge">7</span>Productos encontrados</button>-->

              
</div>
</div>
<br>

      <form method="post" onclick="buscar_reporte_fecha()">
<div class="panel panel-primary col-md-12" id='buscador_oculto' style="display:none;border: none;padding: 0;">
    
             
      
            Desde: <input type="date" style=" width: 15%;  " class="btn btn-primary btn-sm form-control" value="<?php echo date('Y-m-d')?>" id="fecha_desde" name="fecha_desde" required="true">
        
            Hasta: <input type="date" style=" width: 15%;" class="btn btn-primary btn-sm form-control" value="<?php echo date('Y-m-d')?>" id="fecha_hasta" name="fecha_hasta" required="true">
        
        
       
            Tipo:             
            <select  class="btn btn-primary btn-sm form-control" style=" width: 25%; font-size: 11px;"  id="tipotrans_id" required="true">
                <?php foreach($tipo_transaccion as $es){?>
                    <option value="<?php echo $es['tipotrans_id']; ?>"><?php echo $es['tipotrans_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        

</form>
<div class="container no-print" id="categoria" style="padding: 0;">
    
 
                <!--------------------- indicador de resultados --------------------->
    <!--<button type="button" class="btn btn-primary"><span class="badge">7</span>Productos encontrados</button>-->

               

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
                        <th>CANT.</th>
                        <th>PRECIO<br>UNIT.</th>
                        <th>TOTAL</th>
                        <th>CAJERO</th>
                    </tr>
                    
                    <tbody class="buscar" id="reportefechadecompra">
                    
                    
                    <tr>
                    <td></td>    
                    <td></td>    
                    <td></td>    
                    <td></td>    
                    <td></td>    
                    <td></td>    
                    <td></td>    
                    <td></td>
                    <td align="right"><b>TOTAL</b></td> 
                    <td align="right"><b><?php echo number_format(0,'2','.',','); ?></b></td>
                    <td></td>    
                   
                    </tr>
                   </tbody>
                </table>
                
            </div>
                            
        </div>
        <center>
             <?php echo "---------------------------------"; ?><br>
                    Firma cajero.
        </center>
    </div>
</div>

<!-------------------- FIN CATEGORIAS--------------------------------->
                                
          
  

