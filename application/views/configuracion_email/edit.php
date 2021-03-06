<div class="row">
    <div class="col-md-12">
      	<div class="card card-secondary">
            <div class="card-header with-border">
              	<h3 class="box-title">Configuracion Email Edit</h3>
            </div>
			<?php echo form_open('configuracion_email/edit/'.$configuracion_email['email_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="email_cabecera" class="control-label">Email Cabecera</label>
						<div class="form-group">
							<input type="text" name="email_cabecera" value="<?php echo ($this->input->post('email_cabecera') ? $this->input->post('email_cabecera') : $configuracion_email['email_cabecera']); ?>" class="form-control" id="email_cabecera" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_pie" class="control-label">Email Pie</label>
						<div class="form-group">
							<input type="text" name="email_pie" value="<?php echo ($this->input->post('email_pie') ? $this->input->post('email_pie') : $configuracion_email['email_pie']); ?>" class="form-control" id="email_pie" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_protocolo" class="control-label">Email Protocolo</label>
						<div class="form-group">
							<input type="text" name="email_protocolo" value="<?php echo ($this->input->post('email_protocolo') ? $this->input->post('email_protocolo') : $configuracion_email['email_protocolo']); ?>" class="form-control" id="email_protocolo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_host" class="control-label">Email Host</label>
						<div class="form-group">
							<input type="text" name="email_host" value="<?php echo ($this->input->post('email_host') ? $this->input->post('email_host') : $configuracion_email['email_host']); ?>" class="form-control" id="email_host" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_puerto" class="control-label">Email Puerto</label>
						<div class="form-group">
							<input type="text" name="email_puerto" value="<?php echo ($this->input->post('email_puerto') ? $this->input->post('email_puerto') : $configuracion_email['email_puerto']); ?>" class="form-control" id="email_puerto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_usuario" class="control-label">Email Usuario</label>
						<div class="form-group">
							<input type="text" name="email_usuario" value="<?php echo ($this->input->post('email_usuario') ? $this->input->post('email_usuario') : $configuracion_email['email_usuario']); ?>" class="form-control" id="email_usuario" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_clave" class="control-label">Email Clave</label>
						<div class="form-group">
							<input type="text" name="email_clave" value="<?php echo ($this->input->post('email_clave') ? $this->input->post('email_clave') : $configuracion_email['email_clave']); ?>" class="form-control" id="email_clave" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_nombre" class="control-label">Email Nombre</label>
						<div class="form-group">
							<input type="text" name="email_nombre" value="<?php echo ($this->input->post('email_nombre') ? $this->input->post('email_nombre') : $configuracion_email['email_nombre']); ?>" class="form-control" id="email_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_prioridad" class="control-label">Email Prioridad</label>
						<div class="form-group">
							<input type="text" name="email_prioridad" value="<?php echo ($this->input->post('email_prioridad') ? $this->input->post('email_prioridad') : $configuracion_email['email_prioridad']); ?>" class="form-control" id="email_prioridad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_charset" class="control-label">Email Charset</label>
						<div class="form-group">
							<input type="text" name="email_charset" value="<?php echo ($this->input->post('email_charset') ? $this->input->post('email_charset') : $configuracion_email['email_charset']); ?>" class="form-control" id="email_charset" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_encriptacion" class="control-label">Email Encriptacion</label>
						<div class="form-group">
							<input type="text" name="email_encriptacion" value="<?php echo ($this->input->post('email_encriptacion') ? $this->input->post('email_encriptacion') : $configuracion_email['email_encriptacion']); ?>" class="form-control" id="email_encriptacion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_tipo" class="control-label">Email Tipo</label>
						<div class="form-group">
							<input type="text" name="email_tipo" value="<?php echo ($this->input->post('email_tipo') ? $this->input->post('email_tipo') : $configuracion_email['email_tipo']); ?>" class="form-control" id="email_tipo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_copia" class="control-label">Email Copia</label>
						<div class="form-group">
							<input type="text" name="email_copia" value="<?php echo ($this->input->post('email_copia') ? $this->input->post('email_copia') : $configuracion_email['email_copia']); ?>" class="form-control" id="email_copia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo ($this->input->post('estado_id') ? $this->input->post('estado_id') : $configuracion_email['estado_id']); ?>" class="form-control" id="estado_id" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>