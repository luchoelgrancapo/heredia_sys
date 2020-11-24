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
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="row">
<div class="col-md-6">
  <div class="box-header">
               <h4><b>RESERVAS COLISEO</b></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('reserva/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a>
        <a href="<?php echo site_url('reserva'); ?>" class="btn bg-warning btn-app"><fa class='fas fa-calendar'></fa> Ver Calendario</a>
       
         
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
             <div class="box-body  table-responsive">
                <table class="table table-condensed" id="mitabla" role="table">
                    <tr>
						<th>Nº</th>
						<th>Tipo</th>
						<th>Cliente</th>
						<th>Usuario</th>
						<th>Glosa</th>
						<th>Monto</th>
						<th>Fechaingreso</th>
						<th>Hora Ingreso</th>
						<th>Hora Salida</th>
						<th>Fecha</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="ingresos">
                    <?php foreach($reserva as $r){ ?>
                    <tr>
						<td><?php echo $r['reserva_id']; ?></td>
						<td><?php echo $r['reserva_tipo']; ?></td>
						<td><?php echo $r['cliente_nombre']; ?></td>
						<td><?php echo $r['usuario_nombre']; ?></td>
						<td><?php echo $r['reserva_glosa']; ?></td>
						<td><?php echo $r['reserva_monto']; ?></td>
						<td><?php echo $r['reserva_fechaingreso']; ?></td>
						<td><?php echo $r['reserva_horaingreso']; ?></td>
						<td><?php echo $r['reserva_horasalida']; ?></td>
						<td><?php echo $r['reserva_fecha']; ?></td>
						<td>
                            <!--<a href="<?php echo site_url('reserva/edit/'.$r['reserva_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> -->
                            <a href="<?php echo site_url('reserva/remove/'.$r['reserva_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
