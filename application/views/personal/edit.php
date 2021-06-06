<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Personal</h3>
            </div>
			<?php echo form_open('personal/edit/'.$personal['personal_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="personal_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="personal_nombre" value="<?php echo ($this->input->post('personal_nombre') ? $this->input->post('personal_nombre') : $personal['personal_nombre']); ?>" class="form-control" id="personal_nombre" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_ci" class="control-label">Ci</label>
						<div class="form-group">
							<input type="text" name="personal_ci" value="<?php echo ($this->input->post('personal_ci') ? $this->input->post('personal_ci') : $personal['personal_ci']); ?>" class="form-control" id="personal_ci" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_fechanac" class="control-label">Fechanac</label>
						<div class="form-group">
							<input type="date" name="personal_fechanac" value="<?php echo ($this->input->post('personal_fechanac') ? $this->input->post('personal_fechanac') : $personal['personal_fechanac']); ?>" class="form-control" id="personal_fechanac" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="personal_email" value="<?php echo ($this->input->post('personal_email') ? $this->input->post('personal_email') : $personal['personal_email']); ?>" class="form-control" id="personal_email" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="text" name="personal_telefono" value="<?php echo ($this->input->post('personal_telefono') ? $this->input->post('personal_telefono') : $personal['personal_telefono']); ?>" class="form-control" id="personal_telefono" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_sexo" class="control-label">Sexo</label>
						<div class="form-group">
							<input type="text" name="personal_sexo" value="<?php echo ($this->input->post('personal_sexo') ? $this->input->post('personal_sexo') : $personal['personal_sexo']); ?>" class="form-control" id="personal_sexo" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_nacionalidad" class="control-label">Nacionalidad</label>
						<div class="form-group">
							<input type="text" name="personal_nacionalidad" value="<?php echo ($this->input->post('personal_nacionalidad') ? $this->input->post('personal_nacionalidad') : $personal['personal_nacionalidad']); ?>" class="form-control" id="personal_nacionalidad" />
						</div>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
										<i class="fa fa-check"></i> GUARDAR
									</button>
					<a href="<?php echo site_url('personal'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>