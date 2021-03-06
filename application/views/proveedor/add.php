<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/proveedor_nuevo.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<script>
 
       function loader() {
     	$("form").submit(function() {
   document.getElementById('loader').style.display = 'block'; //ocultar el bloque del loader 
});
        }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="card card-secondary">
            <div class="card-header with-border">
              	<h3 class="box-title">registrar PROVEEDOR</h3>
            </div>
             <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
            <?php echo form_open_multipart('proveedor/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					
					
					<div class="col-md-6">
						<label for="proveedor_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="proveedor_nombre" value="<?php echo $this->input->post('proveedor_nombre'); ?>" class="form-control" id="proveedor_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
							<span class="text-danger"><?php echo form_error('proveedor_nombre');?></span>
						</div>
					</div>
					 <div class="col-md-6">
                            <label for="categoriaprov_id" class="control-label"><span class="text-danger">*</span>Categoria</label>
                            <div class="form-group" style="display: flex">
                                    <select name="categoriaprov_id" id="categoriaprov_id" class="form-control" onchange="codigo()" required>
                                            <option value="">- CATEGORIA -</option>
                                            <?php 
                                            foreach($all_categoria_proveedor as $categoria_proveedor)
                                            {
                                                    $selected = ($categoria_proveedor['categoriaprov_id'] == $this->input->post('categoriaprov_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$categoria_proveedor['categoriaprov_id'].'" '.$selected.'>'.$categoria_proveedor['categoriaprov_descripcion'].'</option>';
                                            } 
                                            ?>
                                    </select>
                                    <a data-toggle="modal" data-target="#modalcategoriap" class="btn btn-warning" title="Registrar Nueva Categoria">
                                <i class="fa fa-plus-circle"></i></a>
                            </div>
                    </div>
					<div class="col-md-6">
						<label for="proveedor_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
						<div class="form-group">
                                                    <input type="text" name="proveedor_codigo" value="<?php echo $this->input->post('proveedor_codigo'); ?>" class="form-control" id="proveedor_codigo1" required readonly/>
							<span class="text-danger"><?php echo form_error('proveedor_codigo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_foto" class="control-label">Foto</label>
						<div class="form-group">
                            <input type="file" name="chivo"  id="chivox" kl_virtual_keyboard_secure_input="on">
                            <!--<small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>-->
                            <h4 id='loading' ></h4>
                            <div id="message"></div>
                        </div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_contacto" class="control-label">Contacto</label>
						<div class="form-group">
							<input type="text" name="proveedor_contacto" value="<?php echo $this->input->post('proveedor_contacto'); ?>" class="form-control" id="proveedor_contacto" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_direccion" class="control-label">Dirección</label>
						<div class="form-group">
							<input type="text" name="proveedor_direccion" value="<?php echo $this->input->post('proveedor_direccion'); ?>" class="form-control" id="proveedor_direccion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_telefono" class="control-label">Teléfono</label>
						<div class="form-group">
							<input type="text" name="proveedor_telefono" value="<?php echo $this->input->post('proveedor_telefono'); ?>" class="form-control" id="proveedor_telefono" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_telefono2" class="control-label">Teléfono 2</label>
						<div class="form-group">
							<input type="text" name="proveedor_telefono2" value="<?php echo $this->input->post('proveedor_telefono2'); ?>" class="form-control" id="proveedor_telefono2" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_email" class="control-label">Email</label>
						<div class="form-group">
                                                    <input type="email" name="proveedor_email" value="<?php echo $this->input->post('proveedor_email'); ?>" class="form-control" id="proveedor_email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_nit" class="control-label">Nit</label>
						<div class="form-group">
							<input type="text" name="proveedor_nit" value="<?php echo $this->input->post('proveedor_nit'); ?>" class="form-control" id="proveedor_nit" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_razon" class="control-label">Razon</label>
						<div class="form-group">
							<input type="text" name="proveedor_razon" value="<?php echo $this->input->post('proveedor_razon'); ?>" class="form-control" id="proveedor_razon" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="proveedor_autorizacion" class="control-label">Autorización</label>
						<div class="form-group">
							<input type="text" name="proveedor_autorizacion" value="<?php echo $this->input->post('proveedor_autorizacion'); ?>" class="form-control" id="proveedor_autorizacion" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success" onclick="loader()">
            		<i class="fa fa-check"></i> Guardar
            	</button>
                    <a href="<?php echo site_url('proveedor'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modalcategoriap" tabindex="-1" role="dialog" aria-labelledby="modalcategoriap">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-12">
                    <label for="nueva_categoria" class="control-label">Registrar Nueva Categoria</label>
                    <div class="form-group">
                        <input type="text" name="nueva_categoriap"  class="form-control" id="nueva_categoriap" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrarnuevacategoriap()" class="btn bg-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->