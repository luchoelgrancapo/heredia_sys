<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"> EDITAR INSCRIPCION</h3>
            </div>
			
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
						<label for="cliente_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input onkeyup="insvalidar(event)" type="text" name="cliente_ci" value="<?php echo $cliente['cliente_ci']; ?>" class="form-control" id="cliente_ci" readonly/>
							
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_nombre" class="control-label">Cliente</label>
						<div class="form-group">
							<input type="text" name="cliente_nombre" value="<?php echo $cliente['cliente_nombre']; ?>" class="form-control" id="cliente_nombre" readonly/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_celular" class="control-label">Celular</label>
						<div class="form-group">
							<input type="text" name="cliente_celular" value="<?php echo $cliente['cliente_celular']; ?>" class="form-control" id="cliente_celular" readonly/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="cliente_codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="cliente_codigo" value="<?php echo $cliente['cliente_codigo']; ?>" class="form-control" id="cliente_codigo" readonly/>
						</div>
					</div>
					
					</div>
					<?php echo form_open('inscripcion/edit/'.$inscripcion['inscripcion_id']); ?>
				<div class="row clearfix">
					<div class="col-md-3" hidden>
						<label for="cliente_id" class="control-label">Cliente</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo ($this->input->post('cliente_id') ? $this->input->post('cliente_id') : $inscripcion['cliente_id']); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="serviciote_id" class="control-label">Servicio</label>
						<div class="form-group">
							 <select name="serviciote_id" class=" form-control" id="serviciote_id" onchange="calcular_fecha()" required>
                                <option value="">-- SERVICIO --</option>
                                <?php 
                                foreach($all_servicio as $servicio_temporal)
                                {
                                    $selected = ($servicio_temporal['serviciote_id'] == $inscripcion['serviciote_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$servicio_temporal['serviciote_id'].'" '.$selected.'>'.$servicio_temporal['serviciote_nombre'].' Meses: '.$servicio_temporal['serviciote_duracion'].'</option>';
                                } 
                                ?>
                            </select>
						</div>
						
					</div>
					
					<div class="col-md-2">
						<label for="inscripcion_fechaini" class="control-label">Fecha Inicio</label>
						<div class="form-group">
							<input type="date" name="inscripcion_fechaini" onchange="calcularfin()" value="<?php echo ($this->input->post('inscripcion_fechaini') ? $this->input->post('inscripcion_fechaini') : $inscripcion['inscripcion_fechaini']); ?>" class="has-datepicker form-control" id="inscripcion_fechaini" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="inscripcion_fechafin" class="control-label">Fecha Fin</label>
						<div class="form-group">
							<input type="date" name="inscripcion_fechafin" value="<?php echo ($this->input->post('inscripcion_fechafin') ? $this->input->post('inscripcion_fechafin') : $inscripcion['inscripcion_fechafin']); ?>" class="has-datepicker form-control" id="inscripcion_fechafin" required />
						</div>
					</div>
					<div class="col-md-2">
						<label for="inscripcion_monto" class="control-label">Monto</label>
						<div class="form-group">
							<input type="text" name="inscripcion_monto" value="<?php echo ($this->input->post('inscripcion_monto') ? $this->input->post('inscripcion_monto') : $inscripcion['inscripcion_monto']); ?>" class="form-control" id="inscripcion_monto" />
						</div>
					</div>
					<div class="form-group" hidden>
							<input type="text" step="any" min="0" name="periodo" value="<?php echo $servi['serviciote_duracion']?>" class="form-control" id="periodo" required/>
						</div>
					<div class="col-md-3" >
                        <label for="forma_id" class="control-label" >Forma Pago</label> 
                        <div class="form-group">                                      
                        <select id="forma_id"  name="forma_id" class="form-control" >
                        	<?php 
                                 foreach($forma_pago as $forma)
                                {
                                    $selected = ($forma['forma_id'] == $inscripcion['forma_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$forma['forma_id'].'" '.$selected.'>'.$forma['forma_nombre'].'</option>';
                                } 
                                ?>
                            
                                                                                    
                         </select>
                    </div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('inscripcion'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>