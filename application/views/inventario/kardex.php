
<!--<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
                                            /*function imprimir()
                                            {
                                                /*$('#paraboucher').css('max-width','7cm !important');*/
                                                /* window.print(); 
                                            }*/
    });
</script>-->
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/inventario.js'); ?>"></script> 

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<!-------------------------------------------------------->
<table class="table" style="width: 20cm; padding: 0;" >
    <tr>
        <td style="width: 6cm; padding: 0; line-height:10px;" >
                
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
                   
        <td style="width: 6cm; padding: 0" > 
            <center>
                <br>
                <br>
                <b>KARDEX DE EXISTENCIA</b><br>
                <!--<font size="1" face="arial"><b>FISICO - VALORADO</b></font> <br>-->
                <b>(<?php echo $producto[0]['producto_codigobarra'].") ".$producto[0]['producto_nombre']; ?></b>

            </center>
        </td>
        <td style="width: 4cm; padding: 0" >
<!--                ______________________________                
                   
                                
                <div id="datos_recorrido">
                    
                </div>
                
                ______________________________-->
        </td>
    </tr>
     
    
    
</table>


<!--<table class="table" style="width: 18cm;" >
    <tr>
        <td>
                
            <center>

                
                    
                <font size="3" face="arial"><b>KARDEX DE EXISTENCIA</b></font> <br>
                <font size="1" face="arial"><b>FISICO - VALORADO</b></font> <br>
                <font size="1" face="arial"><b>PRODUCTO: <?php echo $producto[0]['producto_codigobarra']." ".$producto[0]['producto_nombre']; ?></b></font>

                <br>    
            </center>                      
        </td>
    </tr>
     
</table>-->


<!---------------------------------- panel oculto para busqueda--------------------------------------------------------->
<!--<form method="post" onclick="ventas_por_fecha()">-->
<div class="panel panel-primary col-md-12 no-print" id='buscador_oculto'    >
    
    <div class="row">      
        <div class="col-md-2">
            Desde: <input type="date" class="btn btn-secondary btn-sm form-control" id="fecha_desde" value="<?php echo date("Y-m-d");?>" name="fecha_desde" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-secondary btn-sm form-control" id="fecha_hasta" value="<?php echo date("Y-m-d");?>"  name="fecha_hasta" required="true">
        </div>
        
<!--        <div class="col-md-2">
            Tipo:             
            <select  class="btn btn-warning btn-sm form-control" id="estado_id" required="true">
                <?php foreach($estado as $es){?>
                    <option value="<?php echo $es['estado_id']; ?>"><?php echo $es['estado_descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="col-md-2">
            Usuario:             
            <select  class="btn btn-warning btn-sm form-control" id="usuario_id">
                    <option value="0">-- TODOS --</option>
                <?php foreach($usuario as $us){?>
                    <option value="<?php echo $us['usuario_id']; ?>"><?php echo $us['usuario_nombre']; ?></option>
                <?php } ?>
            </select>
        </div>-->
        
        <br>
        <div class="col-md-3">
<br>
            <button class="btn btn-sm btn-primary btn-sm btn-block form-control"  onclick="mostrar_kardex(<?php echo $producto_id;?>)">
                
                <i class="fa fa-search"></i>   Buscar
                
          </button>
            <br>
        </div>
        
       </div>    
    <br>    
</div>
<!--</form>-->
<!------------------------------------------------------------------------------------------->



<!--<div class="box-body table-responsive">-->
    <!--<table class="table table-condensed" id="mitabla" style="font-size:10px" style="width: 17cm;">-->
<div class="container  table-responsive" style='padding: 0;' >
    

    <table class="table table-responsive" id="tabla_detalle">
        <th rowspan="2">
            FECHA
        </th>
        <th colspan="4">
            ENTRADAS
        </th>
        <th colspan="4">
            SALIDAS 
        </th>
        <th colspan="2">
           SALDOS   
        </th>
        <th rowspan="2">
             OBSERV.                       
        </th>


    </tr>
    <tr>
        <th>
            Nº<br>INGRESO              
        </th>
        <th>
            UNIDAD<br>COMP.
        </th>
        <th>
            COSTO<br>UNIT.                            
        </th>
        <th>
            IMPORTE<br>Bs.
        </th>
        <th>
            Nº DOC.<br>VENTA                            
        </th>
        <th>
            UNIDAD<br>VEND.                            
        </th>
        <th>
            COSTO<br>UNIT.                            
        </th>
        <th>
            IMPORTE<br>Bs.                            
        </th>
        <th>
            UNIDs.                            
        </th>
        <th>
            SALDO<br>Bs.
        </th>


    </tr>
    <tbody id="tabla_kardex">

    </tbody>
</table>
</div>
<!--</div>-->

