<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/funciones_productoexistmin.js'); ?>" type="text/javascript"></script>
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
    /*td img{
        width: 50px;
        height: 50px;
        margin-right: 5px; 
    }*/
    #contieneimg{
        width: 50px;
        height: 50px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masgrande{
        font-size: 12px;
    }
</style>

<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="formaimagen" id="formaimagen" value="<?php  echo $parametro['parametro_formaimagen']; ?>" />
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
                <font size="3" face="arial"><b>PRODUCTOS EXISTENCIA MINIMA</b></font> <br>
                
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
<div class="row no-print">
        <div class="col-md-6">


        <!--este es INICIO del BREADCRUMB buscador-->
          
       <div class="box-header">
                <h4><b>PRODUCTOS CON EXISTENCIA MINIMA</b> <small class="badge badge-secondary" id="encontrados"></small></h4>
        </div>
        </div> 
        <!--este es FIN del BREADCRUMB buscador-->
        <div class="col-md-6">
        <div class="box-tools text-center">
            <a onclick="imprimir_producto()" class="btn bg-warning btn-app" title="Imprimir lista de Clientes"><span class="fa fa-print"></span>Imprimir</a>
            <a onclick="window.close();"  class="btn bg-danger btn-app" title="Cerrar Pestaña"><span class="fa fa-times"></span>Cerrar</a>
        </div>
    </div>

</div> 
        <!--este es INICIO de input buscador-->
        <div class="row">
            <div class="col-md-6">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, código, código de barras, marca, industria.." onkeypress="buscarproducto(event)" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3">
                
                <div class="box-tools">
                    <select name="categoria_id" class="btn btn-secondary btn-block" id="categoria_id" onchange="tablaresultadosproducto(2)">
                        <option value="" disabled selected >-- BUSCAR POR CATEGORIAS --</option>
                        <option value="0"> Todas Las Categorias </option>
                        <?php 
                        foreach($all_categoria as $categoria)
                        {
                            echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['categoria_nombre'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                
                <div class="box-tools">
                    <select name="estado_id" class="btn btn-secondary btn-block" id="estado_id" onchange="tablaresultadosproducto(2)">
                        <option value="" disabled selected >-- BUSCAR POR ESTADOS --</option>
                        <option value="0">Todos Los Estados</option>
                        <?php 
                        foreach($all_estado as $estado)
                        {
                            echo '<option value="'.$estado['estado_id'].'">'.$estado['estado_descripcion'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <!--este es FIN de input buscador-->

        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
<br>
    

<div class="row">
    <div class="col-md-12">
        
        <div class="box">
                 
            <div class="box-body  table-responsive">
               <table class="table table-condensed" id="mitabla" role="table">
               <!--<table role="table">-->
                    <thead role="rowgroup">
                        <tr role="row">
                            <th  role="columnheader" >#</th>
                            <th  role="columnheader" >Nombre</th>
                            <th  role="columnheader" >Detalle</th>
                            <th  role="columnheader" style="width: 20%;" >Caracteristicas</th>
                            <th  role="columnheader" >Envase</th>
                            <th  role="columnheader" >Código(s)</th>
                            <th  role="columnheader" >Precio</th>
                            <th  role="columnheader" >Moneda</th>
                            <th  role="columnheader" class="no-print">Estado</th>
                    
                    </tr>
                    </thead>
                    <tbody class="buscar" id="tablaresultados" role="rowgroup">
                                           
                    </tbody>
                </table>
            </div>
            <!-- pagination all... -->
        </div>
    </div>
</div>
