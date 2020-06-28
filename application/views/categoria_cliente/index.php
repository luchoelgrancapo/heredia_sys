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
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<br>
<div class="row">
<div class="col-md-6">
  <div class="box-header">
               <h4><b>CATEGORIA DE CLIENTE</b> <small class="badge badge-secondary" id="pillados"><?php echo sizeof($categoria_cliente); ?></small></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('categoria_cliente/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a> 
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
                    <!--------------------- parametro de buscador --------------------->
            <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese la descripción" >
            </div>
            <br>  
            <!--------------------- fin parametro de buscador ---------------------> 
        
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Descripción</th>
						<!--<th>Porc.<br>Desc.</th>
						<th>Monto<br>Desc.</th>-->
                                                <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                         $i = 0;
                         foreach($categoria_cliente as $c){;
                            $i = $i+1;
                         ?>
                    <tr>
                        <td><?php echo $i ?></td>
						<!--<td><?php //echo $c['categoriaclie_id']; ?></td>-->
						<td><?php echo $c['categoriaclie_descripcion']; ?></td>
						<!--<td><?php echo $c['categoriaclie_porcdesc']; ?></td>
						<td><?php echo $c['categoriaclie_montodesc']; ?></td>-->
                                                <td class="no-print">
						<!------------------------ INICIO modal para confirmar eliminación ------------------->
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
                                               ¿Desea eliminar la categoria de Cliente <b> <?php echo $c['categoriaclie_descripcion']; ?></b>?
                                           </h3>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <a href="<?php echo site_url('categoria_cliente/remove/'.$c['categoriaclie_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        <!------------------------ FIN modal para confirmar eliminación ------------------->
                            <a href="<?php echo site_url('categoria_cliente/edit/'.$c['categoriaclie_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a> 
                            <!--<a data-toggle="modal" data-target="#myModal<?php //echo $i; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } //$cont = 0; ?>
                </table>
                               
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
            </div> 
        </div>
    </div>
</div>
