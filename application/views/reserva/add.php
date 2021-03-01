<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
	function tiempo()
	{
		var tiempo = document.getElementById('reserva_periodo').value;
		var hora_ingreso = document.getElementById('reserva_horaingreso').valueAsDate;
		var inicio = moment(hora_ingreso).add(Number(4), 'hours');
		//alert(inicio);
		$('#reserva_horasalida').val(moment(inicio).add(Number(tiempo), 'hours').format('HH:mm'));
	}
</script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
    <div class="col-md-12">
      	<div class="card card-info">
            <div class="card-header with-border">
              	<h3 class="car-title">Registrar Reserva</h3>
            </div>
            
          	<div class="card-body">
          		<div class="row clearfix">
					<div class="col-md-3">
						<label for="cliente_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input onkeyup="insvalidar(event)" type="text" name="cliente_ci" value="<?php echo $this->input->post('cliente_ci'); ?>" class="form-control" id="cliente_ci" />
							
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_nombre" class="control-label">Cliente</label>
						<div class="form-group">
							<input type="text" name="cliente_nombre" value="<?php echo $this->input->post('cliente_nombre'); ?>" class="form-control" id="cliente_nombre" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="cliente_celular" value="<?php echo $this->input->post('cliente_celular'); ?>" class="form-control" id="cliente_celular" />
						</div>
					</div>
					
					</div>
					<?php echo form_open('reserva/add'); ?>
          		<div class="row clearfix">
					<div class="col-md-2">
						<label for="reserva_tipo" class="control-label">Tipo</label>
						<div class="form-group">
							<select class="form-control" name="reserva_tipo" required>
								<option value="FUTSAL">FUTSAL</option>
								<option value="BASQUETBOL">BASQUETBOL</option>
								<option value="VOLEIBOL">VOLEIBOL</option>
							</select>
						</div>
					</div>
					<div class="col-md-3" hidden>
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo $this->input->post('cliente_id'); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_fechaingreso" class="control-label">Fecha Ingreso</label>
						<div class="form-group">
							<input type="date" name="reserva_fechaingreso" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="reserva_fechaingreso" />
						</div>
					</div>
					<div class="col-md-2" hidden>
						<label for="reserva_fechasalida" class="control-label">Fecha Salida</label>
						<div class="form-group">
							<input type="date" name="reserva_fechasalida" value="" class="form-control" id="reserva_fechasalida" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_horaingreso" class="control-label">Hora Ingreso</label>
						<div class="form-group">
							<input type="time" name="reserva_horaingreso"  value="<?php echo date('08:00'); ?>" class="form-control" id="reserva_horaingreso" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_periodo" class="control-label">Tiempo</label>
						<div class="form-group">
							<select class="form-control" name="reserva_periodo" onchange="tiempo()" id="reserva_periodo" required>
								<option value=""> - TIEMPO - </option>
								<option value="1"> 1 HORA</option>
								<option value="1.5"> 1 HORA Y MEDIA</option>
								<option value="2"> 2 HORAS</option>
								<option value="2.5"> 2 HORAS Y MEDIA</option>
								<option value="3"> 3 HORAS</option>
								
								
							</select>
						</div>
					</div>									
					<div class="col-md-2">
						<label for="reserva_horasalida" class="control-label">Hora Salida</label>
						<div class="form-group">
							<input type="time" readonly name="reserva_horasalida" value="<?php echo date('09:00'); ?>" class="form-control" id="reserva_horasalida" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_monto" class="control-label">Monto</label>
						<div class="form-group">
							<input type="text" name="reserva_monto" value="<?php echo $this->input->post('reserva_monto'); ?>" class="form-control" id="reserva_monto" required/>
						</div>
					</div>
					<div class="col-md-3" >
                        <label for="forma_id" class="control-label" >Forma Pago</label> 
                        <div class="form-group">                                      
                        <select id="forma_id"  name="forma_id" class="form-control" >
                            <?php
                                foreach($forma_pago as $forma){ ?>
                                    <option value="<?php echo $forma['forma_id']; ?>"><?php echo $forma['forma_nombre']; ?></option>                                                   
                            <?php } ?>
                                                                                    
                         </select>
                    </div>
					</div>
					<div class="col-md-6">
						<label for="reserva_glosa" class="control-label">Nota</label>
						<div class="form-group">
							<input type="text" name="reserva_glosa" value="<?php echo $this->input->post('reserva_glosa'); ?>" class="form-control" id="reserva_glosa" />
						</div>
					</div>
					
				</div>
			</div>
          	<div class="card-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('reserva'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar
                </a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>