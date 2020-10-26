<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Servicio</h3>
            </div>
			<?php echo form_open('servicio_temporal/edit/'.$servicio_temporal['serviciote_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<!--<div class="col-md-3">
						<label for="serviciote_imagen" class="control-label">serviciote Imagen</label>
						<div class="form-group">
							<input type="text" name="serviciote_imagen" value="<?php echo ($this->input->post('serviciote_imagen') ? $this->input->post('serviciote_imagen') : $servicio_temporal['serviciote_imagen']); ?>" class="form-control" id="serviciote_imagen" />
						</div>
					</div>-->
					<div class="col-md-3">
						<label for="estado_id" class="control-label">Estado</label>
                        <div class="form-group">
                            <!--<select class="selectpicker" data-show-subtext="true" data-live-search="true">-->
                                <!--<select name="estado_id" class=" form-control selectpicker" data-show-subtext="true" data-live-search="true">-->
                            <select name="estado_id" class=" form-control" id="estado_id">
                                <option value="">-- ESTADO --</option>
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado_id'] == $servicio_temporal['estado_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
					</div>
					</div>
					<div class="col-md-3">
						<label for="serviciote_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="serviciote_nombre" value="<?php echo ($this->input->post('serviciote_nombre') ? $this->input->post('serviciote_nombre') : $servicio_temporal['serviciote_nombre']); ?>" class="form-control" id="serviciote_nombre" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="serviciote_duracion" class="control-label">Duracion (Nº Meses)</label>
						<div class="form-group">
							<input type="number" name="serviciote_duracion" value="<?php echo ($this->input->post('serviciote_duracion') ? $this->input->post('serviciote_duracion') : $servicio_temporal['serviciote_duracion']); ?>" class="form-control" id="serviciote_duracion" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="serviciote_precio" class="control-label">Precio Bs.</label>
						<div class="form-group">
							<input type="number" step="any" name="serviciote_precio" value="<?php echo ($this->input->post('serviciote_precio') ? $this->input->post('serviciote_precio') : $servicio_temporal['serviciote_precio']); ?>" class="form-control" id="serviciote_precio" />
						</div>
					</div>
					<div class="col-md-12">
						<label for="serviciote_descripcion" class="control-label">serviciote Descripcion</label>
						<div class="form-group">
							<textarea name="serviciote_descripcion" class="form-control" id="serviciote_descripcion"><?php echo ($this->input->post('serviciote_descripcion') ? $this->input->post('serviciote_descripcion') : $servicio_temporal['serviciote_descripcion']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('servicio_temporal'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>			
			<?php echo form_close(); ?>
		</div>
    </div>
</div>