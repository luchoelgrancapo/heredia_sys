
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/entregas.js'); ?>" type="text/javascript"></script><!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!-------------------------------------------------------->
<div class="box-header">
    <font size='4' face='Arial'><b>Entregas de Activos</b> <small class="badge badge-secondary" >Registros Encontrados: <?php echo sizeof($venta_entrega); ?></small></font>
   
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>Nº</th>
                        <th>Encargado</th>
                        <th>Fecha</th>
                        <th>Salida</th>
                        <th class="no-print"></th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach($venta_entrega as $e){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $e['cliente_nombre']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($e['venta_fecha'])); ?></td>
                        <td><?php echo $e['venta_id']; ?></td>
                        <td class="no-print">
                            <a onclick="mostrardetalle(<?php echo $e['venta_id']; ?>)" class="btn btn-info btn-xs" title="Ver detalle"><span class="fa fa-list"></span></a> 
                             
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed" id="mitabla">
                      <tr>
                        <th>Nº</th>                        
                        <th>DESCRIPCION</th>     
                            
                        <th>CANTIDAD</th>     
  
                    </tr>
                    <tbody id="detallepago">
                    </tbody>
                  </table>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>