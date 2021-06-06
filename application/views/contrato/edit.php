<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contrato Edit</h3>
            </div>
			<?php echo form_open('contrato/edit/'.$contrato['contrato_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo ($this->input->post('estado_id') ? $this->input->post('estado_id') : $contrato['estado_id']); ?>" class="form-control" id="estado_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="personal_id" class="control-label">Personal Id</label>
						<div class="form-group">
							<input type="text" name="personal_id" value="<?php echo ($this->input->post('personal_id') ? $this->input->post('personal_id') : $contrato['personal_id']); ?>" class="form-control" id="personal_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_cargo" class="control-label">Contrato Cargo</label>
						<div class="form-group">
							<input type="text" name="contrato_cargo" value="<?php echo ($this->input->post('contrato_cargo') ? $this->input->post('contrato_cargo') : $contrato['contrato_cargo']); ?>" class="form-control" id="contrato_cargo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_fechaing" class="control-label">Contrato Fechaing</label>
						<div class="form-group">
							<input type="text" name="contrato_fechaing" value="<?php echo ($this->input->post('contrato_fechaing') ? $this->input->post('contrato_fechaing') : $contrato['contrato_fechaing']); ?>" class="has-datepicker form-control" id="contrato_fechaing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_sueldo" class="control-label">Contrato Sueldo</label>
						<div class="form-group">
							<input type="text" name="contrato_sueldo" value="<?php echo ($this->input->post('contrato_sueldo') ? $this->input->post('contrato_sueldo') : $contrato['contrato_sueldo']); ?>" class="form-control" id="contrato_sueldo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_diaspagados" class="control-label">Contrato Diaspagados</label>
						<div class="form-group">
							<input type="text" name="contrato_diaspagados" value="<?php echo ($this->input->post('contrato_diaspagados') ? $this->input->post('contrato_diaspagados') : $contrato['contrato_diaspagados']); ?>" class="form-control" id="contrato_diaspagados" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_horaspagados" class="control-label">Contrato Horaspagados</label>
						<div class="form-group">
							<input type="text" name="contrato_horaspagados" value="<?php echo ($this->input->post('contrato_horaspagados') ? $this->input->post('contrato_horaspagados') : $contrato['contrato_horaspagados']); ?>" class="form-control" id="contrato_horaspagados" />
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