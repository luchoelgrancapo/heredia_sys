<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Inscripcion Edit</h3>
            </div>
			<?php echo form_open('inscripcion/edit/'.$inscripcion['inscripcion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo ($this->input->post('cliente_id') ? $this->input->post('cliente_id') : $inscripcion['cliente_id']); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="serviciote_id" class="control-label">Serviciote Id</label>
						<div class="form-group">
							<input type="text" name="serviciote_id" value="<?php echo ($this->input->post('serviciote_id') ? $this->input->post('serviciote_id') : $inscripcion['serviciote_id']); ?>" class="form-control" id="serviciote_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo ($this->input->post('estado_id') ? $this->input->post('estado_id') : $inscripcion['estado_id']); ?>" class="form-control" id="estado_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_fechaini" class="control-label">Inscripcion Fechaini</label>
						<div class="form-group">
							<input type="text" name="inscripcion_fechaini" value="<?php echo ($this->input->post('inscripcion_fechaini') ? $this->input->post('inscripcion_fechaini') : $inscripcion['inscripcion_fechaini']); ?>" class="has-datepicker form-control" id="inscripcion_fechaini" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_fechafin" class="control-label">Inscripcion Fechafin</label>
						<div class="form-group">
							<input type="text" name="inscripcion_fechafin" value="<?php echo ($this->input->post('inscripcion_fechafin') ? $this->input->post('inscripcion_fechafin') : $inscripcion['inscripcion_fechafin']); ?>" class="has-datepicker form-control" id="inscripcion_fechafin" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscripcion_monto" class="control-label">Inscripcion Monto</label>
						<div class="form-group">
							<input type="text" name="inscripcion_monto" value="<?php echo ($this->input->post('inscripcion_monto') ? $this->input->post('inscripcion_monto') : $inscripcion['inscripcion_monto']); ?>" class="form-control" id="inscripcion_monto" />
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