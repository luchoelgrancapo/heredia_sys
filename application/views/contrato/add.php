<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contrato Add</h3>
            </div>
            <?php echo form_open('contrato/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo $this->input->post('estado_id'); ?>" class="form-control" id="estado_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="personal_id" class="control-label">Personal Id</label>
						<div class="form-group">
							<input type="text" name="personal_id" value="<?php echo $this->input->post('personal_id'); ?>" class="form-control" id="personal_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_cargo" class="control-label">Contrato Cargo</label>
						<div class="form-group">
							<input type="text" name="contrato_cargo" value="<?php echo $this->input->post('contrato_cargo'); ?>" class="form-control" id="contrato_cargo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_fechaing" class="control-label">Contrato Fechaing</label>
						<div class="form-group">
							<input type="text" name="contrato_fechaing" value="<?php echo $this->input->post('contrato_fechaing'); ?>" class="has-datepicker form-control" id="contrato_fechaing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_sueldo" class="control-label">Contrato Sueldo</label>
						<div class="form-group">
							<input type="text" name="contrato_sueldo" value="<?php echo $this->input->post('contrato_sueldo'); ?>" class="form-control" id="contrato_sueldo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_diaspagados" class="control-label">Contrato Diaspagados</label>
						<div class="form-group">
							<input type="text" name="contrato_diaspagados" value="<?php echo $this->input->post('contrato_diaspagados'); ?>" class="form-control" id="contrato_diaspagados" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="contrato_horaspagados" class="control-label">Contrato Horaspagados</label>
						<div class="form-group">
							<input type="text" name="contrato_horaspagados" value="<?php echo $this->input->post('contrato_horaspagados'); ?>" class="form-control" id="contrato_horaspagados" />
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