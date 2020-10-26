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
<!--<link href="<?php //echo base_url('resources/css/servicio_reportedia.css'); ?>" rel="stylesheet">-->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<br>
<div class="row">
<div class="col-md-6">
  <div class="box-header">
               <h4><b>SERVICIO</b> <small class="badge badge-secondary" id="pillados"><?php echo sizeof($servicio_temporal); ?></small></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('servicio_temporal/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a> 
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="box">
            
            <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese la descripción" >
            </div>
            <div class="box-body  table-responsive">
               <table class="table table-condensed" id="mitabla" role="table">
                    <tr>
						<th>Nº</th>
						<!--<th>Imagen</th>-->
						<th>Nombre</th>
						<th>Duracion</th>
						<th>Precio</th>
						<th>Descripcion</th>
						<th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php foreach($servicio_temporal as $s){ ?>

                    <tr>
						<td><?php echo $s['serviciote_id']; ?></td>
						<!--<td><?php echo $s['serviciote_imagen']; ?></td>
						<td><?php echo $s['estado_id']; ?></td>-->
						<td><?php echo $s['serviciote_nombre']; ?></td>
						<td>Meses: <?php echo $s['serviciote_duracion']; ?></td>
						<td><?php echo $s['serviciote_precio']; ?> Bs.</td>
						<td><?php echo $s['serviciote_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('servicio_temporal/edit/'.$s['serviciote_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span> </a> 
                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
