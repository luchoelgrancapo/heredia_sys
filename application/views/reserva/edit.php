<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Reserva Edit</h3>
            </div>
			<?php echo form_open('reserva/edit/'.$reserva['reserva_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="reserva_tipo" class="control-label">Reserva Tipo</label>
						<div class="form-group">
							<input type="text" name="reserva_tipo" value="<?php echo ($this->input->post('reserva_tipo') ? $this->input->post('reserva_tipo') : $reserva['reserva_tipo']); ?>" class="form-control" id="reserva_tipo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo ($this->input->post('cliente_id') ? $this->input->post('cliente_id') : $reserva['cliente_id']); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario Id</label>
						<div class="form-group">
							<input type="text" name="usuario_id" value="<?php echo ($this->input->post('usuario_id') ? $this->input->post('usuario_id') : $reserva['usuario_id']); ?>" class="form-control" id="usuario_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_glosa" class="control-label">Reserva Glosa</label>
						<div class="form-group">
							<input type="text" name="reserva_glosa" value="<?php echo ($this->input->post('reserva_glosa') ? $this->input->post('reserva_glosa') : $reserva['reserva_glosa']); ?>" class="form-control" id="reserva_glosa" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_monto" class="control-label">Reserva Monto</label>
						<div class="form-group">
							<input type="text" name="reserva_monto" value="<?php echo ($this->input->post('reserva_monto') ? $this->input->post('reserva_monto') : $reserva['reserva_monto']); ?>" class="form-control" id="reserva_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_periodo" class="control-label">Reserva Periodo</label>
						<div class="form-group">
							<input type="text" name="reserva_periodo" value="<?php echo ($this->input->post('reserva_periodo') ? $this->input->post('reserva_periodo') : $reserva['reserva_periodo']); ?>" class="form-control" id="reserva_periodo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_fechaingreso" class="control-label">Reserva Fechaingreso</label>
						<div class="form-group">
							<input type="text" name="reserva_fechaingreso" value="<?php echo ($this->input->post('reserva_fechaingreso') ? $this->input->post('reserva_fechaingreso') : $reserva['reserva_fechaingreso']); ?>" class="has-datepicker form-control" id="reserva_fechaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_fechasalida" class="control-label">Reserva Fechasalida</label>
						<div class="form-group">
							<input type="text" name="reserva_fechasalida" value="<?php echo ($this->input->post('reserva_fechasalida') ? $this->input->post('reserva_fechasalida') : $reserva['reserva_fechasalida']); ?>" class="has-datepicker form-control" id="reserva_fechasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_horaingreso" class="control-label">Reserva Horaingreso</label>
						<div class="form-group">
							<input type="text" name="reserva_horaingreso" value="<?php echo ($this->input->post('reserva_horaingreso') ? $this->input->post('reserva_horaingreso') : $reserva['reserva_horaingreso']); ?>" class="form-control" id="reserva_horaingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_horasalida" class="control-label">Reserva Horasalida</label>
						<div class="form-group">
							<input type="text" name="reserva_horasalida" value="<?php echo ($this->input->post('reserva_horasalida') ? $this->input->post('reserva_horasalida') : $reserva['reserva_horasalida']); ?>" class="form-control" id="reserva_horasalida" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reserva_fecha" class="control-label">Reserva Fecha</label>
						<div class="form-group">
							<input type="text" name="reserva_fecha" value="<?php echo ($this->input->post('reserva_fecha') ? $this->input->post('reserva_fecha') : $reserva['reserva_fecha']); ?>" class="has-datetimepicker form-control" id="reserva_fecha" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>