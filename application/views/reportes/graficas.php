<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/graficas.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/highcharts.js'); ?>"></script>
<!--<script src="https://code.highcharts.com/highcharts.js"></script>-->


<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="empresa_nombre" id="empresa_nombre" value="<?php echo $empresa[0]['empresa_nombre']; ?>" />
<div  class="row" >
<div class="col-md-6">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">

                  
                   
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                    <option value="2020" >2020</option>
                    <option value="2021" >2021</option>
                    <option value="2022" >2022</option>
                    <option value="2023" >2023</option>
                  </select>

</div>
  

<div class="col-md-6">
                  <label>Mes</label>
                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                  
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                  
                  </select>

</div>
</div>

<div  class="row" >
<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
		</div>

		<div class="card-body" id="div_grafica_barras">
		</div>

                <div class="card-footer">
                </div>
	</div>
  </div>
<div class="col-md-12">
<div class="card card-primary">
    <div class="card-header">
    </div>

    <div class="card-body" id="div_grafica_lineas">
    </div>

                <div class="card-footer">
                </div>
  </div>
  </div>
<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
    </div>

    <div class="card-body" id="div_grafica_pie">
    </div>

                <div class="card-footer">
                </div>
  </div>
  </div>




</div>



