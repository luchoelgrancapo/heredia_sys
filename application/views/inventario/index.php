<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/inventario.js'); ?>"></script>

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

</script>   

<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->

<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">

<!-------------------------------------------------------->

            <center>
            
                
                <h3><b>INVENTARIO FISICO VALORADO</b></h3>
                <!--<font size="3" face="arial"><b>Nº 00<?php echo $venta[0]['venta_id']; ?></b></font> <br>-->
                <p><?php echo date("d/m/Y H:i:s"); ?></p>

            </center>
       
<div class="info-box no-print" style="min-height: 30px">
           
            <div class="box-tools no-print">
                
                <button class="btn btn-success btn-sm" onclick="actualizar_inventario()" type="button"><span class="fa fa-cubes"></span> Actualizar</button>
                <?php if($rolusuario[27-1]['rolusuario_asignado'] == 1){ ?>
                <button class="btn btn-primary btn-sm" onclick="tabla_inventario()" type="button"><span class="fa fa-list"></span> Mostrar todo</button>

                <button class="btn btn-info btn-sm" onclick="tabla_inventario_existencia()" type="button"><span class="fa fa-list-ol" title="Ver Produtos con Existencia"></span> Con Existencia</button>
                <?php } if($rolusuario[28-1]['rolusuario_asignado'] == 1){ ?>
                <button class="btn btn-secondary btn-sm" onclick="mostrar_duplicados()" type="button"><span class="fa fa-copy"></span> Prod. Duplicados</button>
                
                <button class="btn btn-danger btn-sm" id="excel" onclick="generarexcel()"  type="button"><span class="far fa-file-excel"></span> Exportar Excel</button>
                <?php } ?>
              
            </div>
</div>




<div class="row">
    <div class="col-md-12">
            <!--------------------- parametro de buscador --------------------->
             <div class="input-group-prepend no-print">
                    <span class="input-group-text"><i class="fas fa-search"></i> Buscar</span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese el nombre, precio, código"   onkeypress="validar(event,1)" >
            </div>  
            <!--------------------- fin parametro de buscador ---------------------> 
            <div class="box">
           
                       <!--------------------- inicio loader ------------------------->
                    <div class="row" id='loader'  style='display:none;'>
                        <center>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>" >        
                        </center>
                    </div> 
                    <!--------------------- fin inicio loader ------------------------->
                    
                <div class="box-body  table-responsive" >

                    <div id="tabla_inventario">
                        
                    <!-------------------- aqui se muestra la tabla de productos del inventario--------------------->
                    
                    </div>
                </div>
            </div>
</div>
</div>
