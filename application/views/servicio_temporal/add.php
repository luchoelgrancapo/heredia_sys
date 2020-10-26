<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registrar Servicio</h3>
            </div>
            <?php echo form_open('servicio_temporal/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<!--<div class="col-md-4">
						<label for="serviciote_imagen" class="control-label">serviciote Imagen</label>
						<div class="form-group">
							<input type="text" name="serviciote_imagen" value="<?php echo $this->input->post('serviciote_imagen'); ?>" class="form-control" id="serviciote_imagen" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo $this->input->post('estado_id'); ?>" class="form-control" id="estado_id" />
						</div>
					</div>-->
					<div class="col-md-4">
						<label for="serviciote_nombre" class="control-label">Nombre</label>
						<div class="form-group">
							<input type="text" name="serviciote_nombre" value="<?php echo $this->input->post('serviciote_nombre'); ?>" class="form-control" id="serviciote_nombre" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="serviciote_duracion" class="control-label">Duracion (Nº Meses)</label>
						<div class="form-group">
							<input type="number" name="serviciote_duracion" value="<?php echo $this->input->post('serviciote_duracion'); ?>" class="form-control" id="serviciote_duracion" required/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="serviciote_precio" class="control-label">Precio Bs.</label>
						<div class="form-group">
							<input type="number" step="any" name="serviciote_precio" value="<?php echo $this->input->post('serviciote_precio'); ?>" class="form-control" id="serviciote_precio"  required/>
						</div>
					</div>
					<div class="col-md-12">
						<label for="serviciote_descripcion" class="control-label">Descripcion</label>
						<div class="form-group">
							<textarea name="serviciote_descripcion" class="form-control" id="serviciote_descripcion"><?php echo $this->input->post('serviciote_descripcion'); ?></textarea>
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