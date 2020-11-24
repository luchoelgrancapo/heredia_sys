<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Acceso Edit</h3>
            </div>
			<?php echo form_open('acceso/edit/'.$acceso['acceso_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo ($this->input->post('cliente_id') ? $this->input->post('cliente_id') : $acceso['cliente_id']); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inscrpcion_id" class="control-label">Inscrpcion Id</label>
						<div class="form-group">
							<input type="text" name="inscrpcion_id" value="<?php echo ($this->input->post('inscrpcion_id') ? $this->input->post('inscrpcion_id') : $acceso['inscrpcion_id']); ?>" class="form-control" id="inscrpcion_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="acceso_estado" class="control-label">Acceso Estado</label>
						<div class="form-group">
							<input type="text" name="acceso_estado" value="<?php echo ($this->input->post('acceso_estado') ? $this->input->post('acceso_estado') : $acceso['acceso_estado']); ?>" class="form-control" id="acceso_estado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="acceso_ingreso" class="control-label">Acceso Ingreso</label>
						<div class="form-group">
							<input type="text" name="acceso_ingreso" value="<?php echo ($this->input->post('acceso_ingreso') ? $this->input->post('acceso_ingreso') : $acceso['acceso_ingreso']); ?>" class="has-datetimepicker form-control" id="acceso_ingreso" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="acceso_salida" class="control-label">Acceso Salida</label>
						<div class="form-group">
							<input type="text" name="acceso_salida" value="<?php echo ($this->input->post('acceso_salida') ? $this->input->post('acceso_salida') : $acceso['acceso_salida']); ?>" class="has-datetimepicker form-control" id="acceso_salida" />
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