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
               <h4><b>CATEGORIA DE PROVEEDOR</b> <small class="badge badge-secondary" id="pillados"><?php echo sizeof($categoria_proveedor); ?></small></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('categoria_proveedor/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a> 
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
                        <th>Nº</th>
                        <th class="no-print"></th>
                        <th>Nombre</th>
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 0;
                          foreach($categoria_proveedor as $c){; 
                              $i = $i+1;?>
                    <tr>
                        <td><?php echo $i ?></td>
                        
                       
                        <td><?php echo $c['categoriaprov_descripcion']; ?></td>
                        <td><?php echo $c['categoriaprov_numero']; ?></td>
                        <td class="no-print">
                        
                            <a href="<?php echo site_url('categoria_proveedor/edit/'.$c['categoriaprov_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a> 
                            <!--<a data-toggle="modal" data-target="#myModal<?php //echo $i; ?>"  title="Eliminar" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>               
        </div>
    </div>
</div>
