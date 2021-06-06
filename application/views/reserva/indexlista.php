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
						<th>Total</th>
                        <th>Cancelado</th>
                        <th>Saldo</th>
                        <th>Forma</th>
						<th>Fechaingreso</th>
						<th>Hora Ingreso</th>
						<th>Hora Salida</th>
						<th>Fecha</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="ingresos">
                    <?php $total=0; $totaltotal=0; foreach($reserva as $r){ 
                    $total +=  $r['reserva_monto'];  
                    $totaltotal +=  $r['reserva_montototal'];  ?>
                    <tr>
						<td><?php echo $r['reserva_id']; ?></td>
						<td><?php echo $r['reserva_tipo']; ?></td>
						<td><?php if($r['cliente_id']>0){ echo $r['cliente_nombre']; } else { echo $r['reserva_nombre']; } ?></td>
						<td><?php echo $r['usuario_nombre']; ?></td>
						<td><?php echo $r['reserva_glosa']; ?></td>
						<td align="right"><?php echo $r['reserva_montototal']; ?></td>
                        <td align="right"><?php echo $r['reserva_monto']; ?></td>
                        <td align="right"><?php echo $r['reserva_saldo']; if($r['reserva_saldo']>0) { ?><a data-toggle="modal" data-target="#myModal<?php echo $r['reserva_id']; ?>" class="btn-warning btn-xs"><span class="fas fa-money-bill"></span></a>  <?php } ?>

                        <!------------------------ INICIO modal para completar pago ------------------->
                                    <div class="modal fade" id="myModal<?php echo $r['reserva_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $r['reserva_id']; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <?php echo form_open('reserva/pagar/'.$r['reserva_id']); ?>
                                           <!------------------------------------------------------------------->
                                           <div class="col-md-12">
                                            <label for="reserva_monto" class="control-label"> Saldo a Pagar</label>
                                            <div class="form-group">
                                            <input type="numer" min="0" max="<?php echo $r['reserva_saldo']; ?>" name="reserva_monto" value="<?php echo $r['reserva_saldo']; ?>" class="form-control" id="reserva_monto" />
                                            </div>
                                            </div>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <button type="submit" class="btn bg-success"><span class="fa fa-check"></span> Cobrar </button>
                                                      <?php echo form_close(); ?>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        <!------------------------ FIN modal para completar pago ------------------->

                        </td>
                        <td><?php echo $r['forma_nombre']; ?></td>
						<td><?php echo date('d/m/Y',strtotime($r['reserva_fechaingreso'])) ; ?></td>
						<td><?php echo $r['reserva_horaingreso']; ?></td>
						<td><?php echo $r['reserva_horasalida']; ?></td>
						<td><?php echo date('d/m/Y H:i:s',strtotime($r['reserva_fecha'])) ; ?></td>
                        <?php if($r['reserva_fechaingreso'] >= date('Y-m-d')){ ?>
						<td>
                            <a href="<?php echo site_url('reserva/edit/'.$r['reserva_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span> </a> 
                            <a href="<?php echo site_url('reserva/remove/'.$r['reserva_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
                        </td>
                        <?php }else{ ?>
                        <td></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">TOTAL</td>
                        <td align="right"><?php echo number_format($totaltotal); ?></td>
                        <td align="right"><?php echo number_format($total); ?></td>
                        <td align="right"><?php echo number_format($totaltotal-$total); ?></td>
                        <td colspan="6"></td>
                    </tr>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
