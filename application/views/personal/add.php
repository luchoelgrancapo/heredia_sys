<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar Personal</h3>
            </div>
            <?php echo form_open('personal/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="personal_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="personal_nombre" value="<?php echo $this->input->post('personal_nombre'); ?>" class="form-control" id="personal_nombre" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_ci" class="control-label">Ci</label>
						<div class="form-group">
							<input type="text" name="personal_ci" value="<?php echo $this->input->post('personal_ci'); ?>" class="form-control" id="personal_ci" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_fechanac" class="control-label">Fecha Nacimiento</label>
						<div class="form-group">
							<input type="date" name="personal_fechanac" value="<?php echo $this->input->post('personal_fechanac'); ?>" class="form-control" id="personal_fechanac" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="personal_email" value="<?php echo $this->input->post('personal_email'); ?>" class="form-control" id="personal_email" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_telefono" class="control-label">Telefono</label>
						<div class="form-group">
							<input type="text" name="personal_telefono" value="<?php echo $this->input->post('personal_telefono'); ?>" class="form-control" id="personal_telefono" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_sexo" class="control-label">Sexo</label>
						<div class="form-group">
							<select name="personal_sexo" class="form-control" required>
								<option value="F">FEMENINO</option>
								<option value="M">MASCULINO</option>
							</select>							
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_nacionalidad" class="control-label">Nacionalidad</label>
						<div class="form-group">
							<input type="text" name="personal_nacionalidad" value="BOLIVIANA" class="form-control" id="personal_nacionalidad" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_cargo" class="control-label">Cargo</label>
						<div class="form-group">
							<input type="text" name="personal_cargo" value="<?php echo $this->input->post('personal_cargo'); ?>" class="form-control" id="personal_cargo" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="personal_fechaing" class="control-label">Fecha Ingreso</label>
						<div class="form-group">
							<input type="date" name="personal_fechaing" value="<?php echo $this->input->post('personal_fechaing'); ?>" class="form-control" id="personal_fechaing" required/>
						</div>
					</div>
					<div class="col-md-2">
						<label for="personal_sueldo" class="control-label">Sueldo</label>
						<div class="form-group">
							<input type="text" name="personal_sueldo" value="<?php echo $this->input->post('personal_sueldo'); ?>" class="form-control" id="personal_sueldo" required/>
						</div>
					</div>
					<div class="col-md-2">
						<label for="personal_diaspagados" class="control-label">Dias Pagados</label>
						<div class="form-group">
							<input type="number" min="0" step="any" name="personal_diaspagados" value="30" class="form-control" id="personal_diaspagados" required/>
						</div>
					</div>
					<div class="col-md-2">
						<label for="personal_horaspagados" class="control-label">Horas Pagadas</label>
						<div class="form-group">
							<input type="number" min="0" step="any" name="personal_horaspagados" value="8" class="form-control" id="personal_horaspagados" required/>
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