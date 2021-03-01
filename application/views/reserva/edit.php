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
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reserva Edit</h3>
            </div>
			
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
						<label for="cliente_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input onkeyup="insvalidar(event)" type="text" name="cliente_ci" value="<?php echo $cliente['cliente_ci']; ?>" class="form-control" id="cliente_ci" readonly/>
							
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_nombre" class="control-label">Cliente</label>
						<div class="form-group">
							<input type="text" name="cliente_nombre" value="<?php echo $cliente['cliente_nombre']; ?>" class="form-control" id="cliente_nombre" readonly/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="cliente_celular" value="<?php echo $cliente['cliente_celular']; ?>" class="form-control" id="cliente_celular" readonly/>
						</div>
					</div>
					
					</div>
					<?php echo form_open('reserva/edit/'.$reserva['reserva_id']); ?>
				<div class="row clearfix">
					<div class="col-md-2">
						<label for="reserva_tipo" class="control-label">Tipo</label>
						<?php
                                $basquet =""; $futsal =""; $voleibol ="";
                                if($reserva['reserva_tipo']     == "FUTSAL"){ $futsal = "selected";}
                                elseif($reserva['reserva_tipo'] == "BASQUETBOL"){ $basquet = "selected";}
                                elseif($reserva['reserva_tipo'] == "VOLEIBOL"){ $voleibol = "selected";}
                                ?>
						<div class="form-group">
							<select class="form-control" name="reserva_tipo" required>
								<option value="FUTSAL" <?php echo $futsal; ?>>FUTSAL</option>
								<option value="BASQUETBOL" <?php echo $basquet; ?>>BASQUETBOL</option>
								<option value="VOLEIBOL" <?php echo $voleibol; ?>>VOLEIBOL</option>
							</select>
						</div>
					</div>
					<div class="col-md-3" hidden>
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo ($this->input->post('cliente_id') ? $this->input->post('cliente_id') : $reserva['cliente_id']); ?>"  class="form-control" id="cliente_id" />
						</div>
					</div>
					
					<div class="col-md-2">
						<label for="reserva_fechaingreso" class="control-label"> Fecha Ingreso</label>
						<div class="form-group">
							<input type="date" name="reserva_fechaingreso" value="<?php echo ($this->input->post('reserva_fechaingreso') ? $this->input->post('reserva_fechaingreso') : $reserva['reserva_fechaingreso']); ?>" class="has-datepicker form-control" id="reserva_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="reserva_fechasalida" class="control-label"> Fecha Salida</label>
						<div class="form-group">
							<input type="date" name="reserva_fechasalida" value="<?php echo ($this->input->post('reserva_fechasalida') ? $this->input->post('reserva_fechasalida') : $reserva['reserva_fechasalida']); ?>" class="has-datepicker form-control" id="reserva_fechasalida" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_horaingreso" class="control-label">Hora Ingreso</label>
						<div class="form-group">
							<input type="time" name="reserva_horaingreso" value="<?php echo ($this->input->post('reserva_horaingreso') ? $this->input->post('reserva_horaingreso') : $reserva['reserva_horaingreso']); ?>" class="form-control" id="reserva_horaingreso" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_periodo" class="control-label">Tiempo</label>
						<div class="form-group">
							<?php
                                $una =""; $unamed =""; $dos =""; $dosmed=""; $tres="";
                                if($reserva['reserva_periodo']     == 1){ $una = "selected";}
                                elseif($reserva['reserva_periodo'] == 1.5){ $unamed = "selected";}
                                elseif($reserva['reserva_periodo'] == 2){ $dos = "selected";}
                                elseif($reserva['reserva_periodo'] == 2.5){ $dosmed = "selected";}
                                elseif($reserva['reserva_periodo'] == 3){ $tres = "selected";}
                                ?>
							<select class="form-control" name="reserva_periodo" onchange="tiempo()" id="reserva_periodo" required>
								<option value=""> - TIEMPO - </option>
								<option value="1" <?php echo $una; ?>> 1 HORA</option>
								<option value="1.5" <?php echo $unamed; ?>> 1 HORA Y MEDIA</option>
								<option value="2" <?php echo $dos; ?>> 2 HORAS</option>
								<option value="2.5" <?php echo $dosmed; ?>> 2 HORAS Y MEDIA</option>
								<option value="3" <?php echo $tres; ?>> 3 HORAS</option>
								
								
							</select>
						</div>
					</div>		
					<div class="col-md-2">
						<label for="reserva_horasalida" class="control-label">Hora Salida</label>
						<div class="form-group">
							<input type="time" name="reserva_horasalida" value="<?php echo ($this->input->post('reserva_horasalida') ? $this->input->post('reserva_horasalida') : $reserva['reserva_horasalida']); ?>" class="form-control" id="reserva_horasalida" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="reserva_monto" class="control-label"> Monto</label>
						<div class="form-group">
							<input type="text" name="reserva_monto" value="<?php echo ($this->input->post('reserva_monto') ? $this->input->post('reserva_monto') : $reserva['reserva_monto']); ?>" class="form-control" id="reserva_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_glosa" class="control-label">Nota</label>
						<div class="form-group">
							<input type="text" name="reserva_glosa" value="<?php echo ($this->input->post('reserva_glosa') ? $this->input->post('reserva_glosa') : $reserva['reserva_glosa']); ?>" class="form-control" id="reserva_glosa" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="reserva_fecha" class="control-label">Reserva Fecha</label>
						<div class="form-group">
							<input type="text" name="reserva_fecha" value="<?php echo ($this->input->post('reserva_fecha') ? $this->input->post('reserva_fecha') : $reserva['reserva_fecha']); ?>" class="has-datetimepicker form-control" id="reserva_fecha" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
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