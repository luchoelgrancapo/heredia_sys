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
<div class="box-header">
                <h3 class="box-title">Idioma</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('idioma/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
                  <div class="input-group"> <span class="input-group-addon">Buscar</span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el idioma">
                  </div>
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
						<th>Num.</th>
                        <!--<th>Id</th>-->
						<th>Descripción</th>
						<th>Imagen</th>
						<th>Enlace</th>
						<th>Operaciones</th>
                    </tr>
                    <tbody class="buscar">
                    <?php $cont = 0;
                          foreach($idioma as $i){;
                                 $cont = $cont+1; ?>
                    <tr>
						<td><?php echo $cont ?></td>
                        <!--<td><?php //echo $i['idioma_id']; ?></td>-->
						<td><?php echo $i['idioma_descripcion']; ?></td>
						<td><?php echo $i['idioma_imagen']; ?></td>
						<td><?php echo $i['idioma_enlace']; ?></td>
						<td>
                            <a href="<?php echo site_url('idioma/edit/'.$i['idioma_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('idioma/remove/'.$i['idioma_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                               
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div> 
        </div>
    </div>
</div>
