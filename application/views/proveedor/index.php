
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/responsable.js'); ?>" type="text/javascript"></script>
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
<script type="text/javascript">
    function buscarproveedor(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==13){
            var base_url = document.getElementById('base_url').value;
            var filtro = document.getElementById('filtrar').value;
            location.href=base_url+"proveedor/buscarproveedor/"+filtro;
        }
    }
    
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<style type="text/css">
    
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
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!--<link href="<?php echo base_url('resources/css/servicio_reportedia.css'); ?>" rel="stylesheet">-->
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
                <font size="3" face="arial"><b>PROVEEDORES</b></font> <br>
                
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
    <div class="box-header">
               <h4><b>PROVEEDORES</b> <small class="badge badge-secondary">Registros Encontrados: <?php echo sizeof($proveedor); ?></small></h4>
        </div>
    </div>
        <div class="col-md-6">
        
            <div class="box-tools no-print">
        <center>            
            <a href="<?php echo site_url('proveedor/add'); ?>" class="btn bg-success btn-app"><i class="fa fa-truck"></i>Registrar</a>
            <button data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" onclick="fechadecompra('and 1')" ><i class="fa fa-search"></i>Ver Todos</button>
            <?php
            if($rol[113-1]['rolusuario_asignado'] == 1){ ?>
            <a href="#" onclick="imprimir_proveedor()" class="btn bg-warning btn-app"><i class="fa fa-print"></i>Imprimir</a>
            <?php } ?>
            <!--<a href="" class="btn btn-info btn-foursquarexs"><span class="fa fa-cubes"></span>Productos</small></a>-->            
        </center>            
    </div>
    </div>
  

        <!--este es FIN del BREADCRUMB buscador-->
 
        <!--este es INICIO de input buscador-->
        <div class="col-md-6">
            <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor" >
            </div>
            
        <!--este es FIN de input buscador-->

        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
        
        
    </div>
    <!---------------- BOTONES --------->

    <!---------------- FIN BOTONES --------->
</div>
<br>
<div class="row">
    <div class="col-md-12">
        
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
						<th>#</th>
						
						<th>Nombre</th>
						<th>Contacto</th>
						<th>Nit</br>
						Razón</th>
						<th>Estado</th>
						<!--<th>Autorización</th>-->
						<th class="no-print"></th>
                    <tbody class="buscar">
                    <?php $cont = 0;
                          foreach($proveedor as $p){;
                                 $cont = $cont+1; ?>
                    <tr>
                            <td><?php echo $cont; ?></td>
                            <td><div id="horizontal">
                                    <div>
                                        <?php if($p['proveedor_foto']){
                                                    ?>
                                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $cont; ?>" style="padding: 0px;">
                                                        <?php
                                                        echo '<img src="'.site_url('/resources/images/proveedores/'.$p['proveedor_foto']).'" style="width:60px;height:60px; margin-right: 5px;" />';
                                                        ?>
                                                    </a>
                                                    <?php }
                                                    else{
                                                       echo '<img style src="'.site_url('/resources/images/usuarios/thumb_default.jpg').'" />'; 
                                                    }
                                                    ?>
                                                     <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $cont; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $cont; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $p['proveedor_nombre']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/proveedores/'.$p['proveedor_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                    <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                                    </div>
                                    <div><?php
                                        echo "<b>".$p['proveedor_nombre']."</b><br>";
                                        echo "<b>CODIGO: </b>".$p['proveedor_codigo']."<br>";
                                        echo "<b>DIRECC.: </b>".$p['proveedor_direccion']."<br>";
                                        echo "<b>EMAIL: </b>".$p['proveedor_email'];
                                        ?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $p['proveedor_contacto']; ?></br>
                            <b>TELEF.:</b> <?php echo $p['proveedor_telefono']."-".$p['proveedor_telefono2']; ?></td>
                            <td><?php echo $p['proveedor_nit']; ?></br>
                            <?php echo $p['proveedor_razon']; ?></td>
                            <td style="background-color: #<?php echo $p['estado_color']; ?>"><?php echo $p['estado_descripcion']; ?></td>

                            <!--<td><?php //echo $p['proveedor_autorizacion']; ?></td>-->
                            <td class="no-print">
                            <a href="<?php echo site_url('proveedor/edit/'.$p['proveedor_id']); ?>" class="btn btn-info btn-xs"><span class="fas fa-edit"></span></a> 
                            <!--<a href="<?php echo site_url('proveedor/remove/'.$p['proveedor_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>
        </div>
        <?php
            if($a =="1"){
                ?>
                <a href="<?php echo site_url('proveedor'); ?>" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Atras</a>
            <?php
            }
            ?>
    </div>
</div>
