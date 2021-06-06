<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Salario Add</h3>
            </div>
            <?php echo form_open('salario/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="personal_id" class="control-label">Personal</label>
						<div class="form-group">
							<select name="personal_id" class="form-control">
								<option value="">select personal</option>
								<?php 
								foreach($all_personal as $personal)
								{
									$selected = ($personal['personal_id'] == $this->input->post('personal_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$personal['personal_id'].'" '.$selected.'>'.$personal['personal_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_ganado" class="control-label">Salario Ganado</label>
						<div class="form-group">
							<input type="text" name="salario_ganado" value="<?php echo $this->input->post('salario_ganado'); ?>" class="form-control" id="salario_ganado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_bonoant" class="control-label">Salario Bonoant</label>
						<div class="form-group">
							<input type="text" name="salario_bonoant" value="<?php echo $this->input->post('salario_bonoant'); ?>" class="form-control" id="salario_bonoant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_horasext" class="control-label">Salario Horasext</label>
						<div class="form-group">
							<input type="text" name="salario_horasext" value="<?php echo $this->input->post('salario_horasext'); ?>" class="form-control" id="salario_horasext" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_bonohoras" class="control-label">Salario Bonohoras</label>
						<div class="form-group">
							<input type="text" name="salario_bonohoras" value="<?php echo $this->input->post('salario_bonohoras'); ?>" class="form-control" id="salario_bonohoras" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_produccion" class="control-label">Salario Produccion</label>
						<div class="form-group">
							<input type="text" name="salario_produccion" value="<?php echo $this->input->post('salario_produccion'); ?>" class="form-control" id="salario_produccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_dominical" class="control-label">Salario Dominical</label>
						<div class="form-group">
							<input type="text" name="salario_dominical" value="<?php echo $this->input->post('salario_dominical'); ?>" class="form-control" id="salario_dominical" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_otrobono" class="control-label">Salario Otrobono</label>
						<div class="form-group">
							<input type="text" name="salario_otrobono" value="<?php echo $this->input->post('salario_otrobono'); ?>" class="form-control" id="salario_otrobono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_totalganado" class="control-label">Salario Totalganado</label>
						<div class="form-group">
							<input type="text" name="salario_totalganado" value="<?php echo $this->input->post('salario_totalganado'); ?>" class="form-control" id="salario_totalganado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_afp" class="control-label">Salario Afp</label>
						<div class="form-group">
							<input type="text" name="salario_afp" value="<?php echo $this->input->post('salario_afp'); ?>" class="form-control" id="salario_afp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_solidario" class="control-label">Salario Solidario</label>
						<div class="form-group">
							<input type="text" name="salario_solidario" value="<?php echo $this->input->post('salario_solidario'); ?>" class="form-control" id="salario_solidario" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_iva" class="control-label">Salario Iva</label>
						<div class="form-group">
							<input type="text" name="salario_iva" value="<?php echo $this->input->post('salario_iva'); ?>" class="form-control" id="salario_iva" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_ant" class="control-label">Salario Ant</label>
						<div class="form-group">
							<input type="text" name="salario_ant" value="<?php echo $this->input->post('salario_ant'); ?>" class="form-control" id="salario_ant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_totaldescuento" class="control-label">Salario Totaldescuento</label>
						<div class="form-group">
							<input type="text" name="salario_totaldescuento" value="<?php echo $this->input->post('salario_totaldescuento'); ?>" class="form-control" id="salario_totaldescuento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_loquidopagable" class="control-label">Salario Loquidopagable</label>
						<div class="form-group">
							<input type="text" name="salario_loquidopagable" value="<?php echo $this->input->post('salario_loquidopagable'); ?>" class="form-control" id="salario_loquidopagable" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="salario_fecha" class="control-label">Salario Fecha</label>
						<div class="form-group">
							<input type="text" name="salario_fecha" value="<?php echo $this->input->post('salario_fecha'); ?>" class="has-datepicker form-control" id="salario_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario Id</label>
						<div class="form-group">
							<input type="text" name="usuario_id" value="<?php echo $this->input->post('usuario_id'); ?>" class="form-control" id="usuario_id" />
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