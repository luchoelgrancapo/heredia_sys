<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/cotizacion.js'); ?>" type="text/javascript"></script>
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

        function imprimir()
        {
           
             window.print(); 
        }
</script>  
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<br>
<div class="row">
<div class="col-md-6">


        <!--este es INICIO del BREADCRUMB buscador-->
        <div class="box-header">
                <h4><b>PERSONAL</b> <small class="badge badge-secondary"><?php echo sizeof($personal)?></small></h4>
        </div>
        <!--este es FIN del BREADCRUMB buscador-->
</div> 
<div class="col-md-6 no-print">
        
    <div class="box-tools">
        <center>    
            <a href="<?php echo site_url('personal/add'); ?>" class="btn bg-success btn-app"><i class="fa fa-user-plus"></i>Personal</a>
            
            <a href="<?php echo site_url('salario/crear_planilla'); ?>" class="btn bg-primary btn-app"><i class="fa fa-file-invoice-dollar"></i>Procesar Planilla</a>
            <a data-toggle="modal" data-target="#procesadas"  class="btn bg-secondary btn-app"><i class="fa fa-funnel-dollar"></i>Planillas Procesadas</a>
                            <!------------------------ INICIO modal para confirmar eliminación ------------------->
                                    <div class="modal fade" id="procesadas" tabindex="-1" role="dialog" aria-labelledby="procesadas">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header bg-secondary">
                                            <h3>PLANILLAS PROCESADAS</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <div class="row">
                                            <?php foreach ($pprocesadas as $pp) { ?>
                                               <div class="col-md-6">
                                                <?php echo $pp['planilla_mes']?> - <?php echo $pp['planilla_ano']?>
                                                <a href="<?php echo base_url('salario/planilla/'.$pp['planilla_id'])?>" target="_blank" class="btn btn-warning btn-sm" title="Imprimir Planilla"><i class="fas fa-print"></i></a>
                                               </div>
                                            <?php } ?>
                                               
                                               </div>
                                           
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> CERRAR </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        <!------------------------ FIN modal para confirmar eliminación ------------------->
            <a href="#" onclick="imprimir()" class="btn bg-warning btn-app"><i class="fa fa-print"></i>Imprimir</a>
             
        </center>            
    </div>
    </div>
    <div class="col-md-6 no-print">
  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingresa el nombre de personal" >
            </div>
            </div>
    <div class="col-md-12">
        <div class="box">
           
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Nº</th>
						<th>Nombre</th>
						<th>Ci</th>
						<th>Fecha<br>Nacimiento</th>
						<th>Telefono</th>
						<th>Sexo</th>
						<th>Nacionalidad</th>
						<th>Cargo</th>
						<th>Fecha<br>Ingreso</th>
						<th>Sueldo</th>
						<th>Horas/Dias<br>Pagados</th>
						<th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php foreach($personal as $p){ ?>
                    <tr>
						<td><?php echo $p['personal_id']; ?></td>
						<td><?php echo $p['personal_nombre']; ?></td>
						<td><?php echo $p['personal_ci']; ?></td>
						<td><?php $fecha = new DateTime($p['personal_fechanac']); echo $fecha->format('d/m/Y'); ?></td>
						<td><?php echo $p['personal_telefono']; ?></td>
						<td><?php echo $p['personal_sexo']; ?></td>
						<td><?php echo $p['personal_nacionalidad']; ?></td>
						<td><?php echo $p['personal_cargo']; ?></td>
                        <td><?php $fecha1 = new DateTime($p['personal_fechaing']); echo $fecha1->format('d/m/Y'); ?></td>
						<td><?php echo $p['personal_sueldo']; ?></td>
						<td><?php echo $p['personal_diaspagados']; ?>/<?php echo $p['personal_horaspagados']; ?></td>
						<td>
                            <a href="<?php echo site_url('personal/edit/'.$p['personal_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit" title="Modificar informacion personal"></span> </a> 
                        <?php if($p['estado_id']==1) { ?>
                        	<a data-toggle="modal" data-target="#myModal<?php echo $p['personal_id']; ?>" class="btn bg-danger btn-xs"><span class="fa fa-ban" title="Inhabilitar Personal"></span></a>
                            <!------------------------ INICIO modal para confirmar eliminación ------------------->
                                    <div class="modal fade" id="myModal<?php echo $p['personal_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $p['personal_id']; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header bg-danger">
                                            <h3>Inhabilitar Personal</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <h3><b> <span class="fa fa-trash"></span></b>
                                               ¿Desea Inhabilitar Personal  <b> <?php echo $p['personal_nombre']; ?></b>?
                                           </h3>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <a href="<?php echo site_url('personal/inhabilitar/'.$p['personal_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                        <!------------------------ FIN modal para confirmar eliminación ------------------->
                        <a class="btn bg-navy btn-xs" data-toggle="modal" data-target="#contrato<?php echo $p['personal_id']; ?>"><span class="fa fa-chalkboard-teacher" title="Registrar Nuevo Contrato"></span></a>
                        <div class="modal fade" id="contrato<?php echo $p['personal_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="contrato<?php echo $p['personal_id']; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3>Registrar Nuevo Contrato</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <?php echo form_open('personal/nuevo_contrarto/'.$p['personal_id']); ?>
                                          <div class="row">
                                            
                    <div class="col-md-6">
                        <label for="personal_cargo" class="control-label">Cargo</label>
                        <div class="form-group">
                            <input type="text" name="personal_cargo" value="<?php echo ($this->input->post('personal_cargo') ? $this->input->post('personal_cargo') : $p['personal_cargo']); ?>" class="form-control" id="personal_cargo" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="personal_fechaing" class="control-label">Fecha Ingreso</label>
                        <div class="form-group">
                            <input type="date" name="personal_fechaing" value="<?php echo ($this->input->post('personal_fechaing') ? $this->input->post('personal_fechaing') : $p['personal_fechaing']); ?>" class="form-control" id="personal_fechaing" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="personal_sueldo" class="control-label">Sueldo</label>
                        <div class="form-group">
                            <input type="text" name="personal_sueldo" value="<?php echo ($this->input->post('personal_sueldo') ? $this->input->post('personal_sueldo') : $p['personal_sueldo']); ?>" class="form-control" id="personal_sueldo" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="personal_diaspagados" class="control-label">Dias Pagados</label>
                        <div class="form-group">
                            <input type="text" name="personal_diaspagados" value="<?php echo ($this->input->post('personal_diaspagados') ? $this->input->post('personal_diaspagados') : $p['personal_diaspagados']); ?>" class="form-control" id="personal_diaspagados" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="personal_horaspagados" class="control-label">Horas Pagadas</label>
                        <div class="form-group">
                            <input type="text" name="personal_horaspagados" value="<?php echo ($this->input->post('personal_horaspagados') ? $this->input->post('personal_horaspagados') : $p['personal_horaspagados']); ?>" class="form-control" id="personal_horaspagados" />
                        </div>
                    </div>
                    </div>
                    </div>
                                          <div class="modal-footer aligncenter">
                                                      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Si</button>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                                      <?php echo form_close(); ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                            
                        <?php }else{  ?>
                        <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
