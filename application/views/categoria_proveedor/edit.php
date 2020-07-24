<div class="row">
    <div class="col-md-12">
      	<div class="card card-secondary">
            <div class="card-header with-border">
              	<h3 class="box-title">EDITAR CATEGORIA PROVEEDOR</h3>
            </div>
            <?php echo form_open_multipart('categoria_proveedor/edit/'.$categoria_proveedor['categoriaprov_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                
                    <div class="col-md-6">
                        <label for="categoriaprov_descripcion" class="control-label"><span class="text-danger">*</span>Descripcion</label>
                        <div class="form-group">
                            <input type="text" name="categoriaprov_descripcion" value="<?php echo ($this->input->post('categoriaprov_descripcion') ? $this->input->post('categoriaprov_descripcion') : $categoria_proveedor['categoriaprov_descripcion']); ?>" class="form-control" id="categoriaprov_descripcion" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('categoriaprov_descripcion');?></span>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
		    <i class="fa fa-check"></i> Guardar
		</button>
                <a href="<?php echo site_url('categoria_proveedor'); ?>" class="btn btn-danger">
                       <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>