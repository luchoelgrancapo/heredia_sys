<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
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
<!-------------------------------------------------------->
<br>
<div class="box-header">
    <h4><b>EMPRESA</b></h4>
                
</div>
<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
            
        <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        
                        <th>Empresa</th>
                        <th>Propietario</th>
                        <th>Ubicación</th>
                        <th>Dirección</th>
                        <th>Contacto</th>
                       
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 1;
                    $cont = 0;
                          foreach($empresa as $e){;
                                 $cont = $cont+1; ?>
                    <tr>
                        
                        <td>
                            <div id="horizontal">
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$e['empresa_imagen'];
                                    if($e['empresa_imagen']){
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $cont; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/empresas/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                    <?php }
                                    else{
                                       //echo '<img style src="'.site_url('/resources/images/usuarios/thumb_default.jpg').'" />'; 
                                    }
                                    ?>
                                </div>
                                    <div style="padding-left: 4px">
                                        <?php echo "<b>".$e['empresa_nombre']."</b>"; ?>
                                        <br><?php echo $e['empresa_eslogan']; ?>
                                        
                                        
                                    </div>
                            </div>
                            
                        </td>
                        <td>
                            <?php if($e['empresa_propietario']){
                                            echo "<b></b>".$e['empresa_propietario'];
                                        }
                                        if($e['empresa_profesion']){
                                            echo "<br><b>Profesión: </b>".$e['empresa_profesion'];
                                        }
                                        if($e['empresa_cargo']){
                                            echo "<br><b>Cargo: </b>".$e['empresa_cargo'];
                                        }
                                        if($e['empresa_codigo']){
                                            echo "<br><b>Código: </b>".$e['empresa_codigo'];
                                        }
                                        ?>
                        </td>
                        <td class="no-print" style="text-align: center">
                            <?php
                            if(($e["empresa_latitud"]==0 && $e["empresa_longitud"]==0) || ($e["empresa_latitud"]==null && $e["empresa_longitud"]==null) || ($e["empresa_latitud"]== "" && $e["empresa_longitud"]=="")){
                            ?>
                                <img src="<?php echo base_url('resources/images/noubicacion.png'); ?>" width="30" height="30">
                            <?php
                                }else{
                            ?>
                            <a href="https://www.google.com/maps/dir/<?php echo $e["empresa_latitud"].",".$e["empresa_longitud"]; ?>" target="_blank" title="<?php echo "lat.:".$e["empresa_latitud"].", long.:".$e["empresa_longitud"]?>">
                            <img src="<?php echo base_url('resources/images/blue.png'); ?>" width="30" height="30">
                            </a>
                            <?php
                                }
                            ?><br>
                        <?php echo $e['empresa_zona']; ?><br>
                        <?php echo $e['empresa_ubicacion']; ?>
                        </td>
                        <td><?php echo $e['empresa_direccion'];?><br>
                        <?php echo $e['empresa_departamento']; ?></td>
                                  
                        <td><?php echo $e['empresa_telefono']; if($e['empresa_email']){
                                            echo "<br><b>e-mail: </b>".$e['empresa_email'];
                                        } ?></td>
                        
                        <td>
                            <a href="<?php echo site_url('empresa/edit/'.$e['empresa_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a> 
                            <!--<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Eliminar"><span class="fa fa-trash"></span></a>-->
                            <!------------------------INICIO modal para confirmar eliminación ------------------->
                                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <h3><b> <span class="fa fa-trash"></span></b>
                                               ¿Desea eliminar la Empresa <b> <?php echo $e['empresa_nombre']; ?></b>?
                                           </h3>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <a href="<?php echo site_url('empresa/remove/'.$e['empresa_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                    <!------------------------F I N modal para confirmar eliminación ------------------->
                    <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $cont; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $cont; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $e['empresa_nombre']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/empresas/'.$e['empresa_imagen']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                    <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                               
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
            </div> 
        </div>
    </div>
</div>
