<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/planilla.js'); ?>" type="text/javascript"></script>
<style type="text/css"> 
	th {
		border: 1px solid black !important;
		font-family: arial;
		font-size: 9pt;
		padding: px !important;
        background-color: #EAECEE;
	}
	td {
        background-color: #fff;
		border: 1px solid black;
		font-family: arial;
		font-size: 9pt;
		padding: 1px !important;
	}
</style>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<center><h3 class="box-title">PLANILLA DE SUELDOS Y SALARIOS</h3>
<div class="row">
	<div class="col-md-2 no-print">
                <label for="ano">AÑO</label>
                <select  class="btn btn-secondary btn-block"  id="ano" onchange="busqueda_planilla()">

                    
                    <option value="2021">2021</option>>
                    <option value="2022">2022</option>>
                    <option value="2023">2023</option>>
                </select>
                <br>
    </div>
    <div class="col-md-2 no-print">
                <label for="mes">MES</label>
                <select  class="btn btn-secondary btn-block"  id="mes" onchange="busqueda_planilla()">
                    
                    <option value="">MES</option>
                    <option value="ENERO">ENERO</option>
                    <option value="FEBRERO">FEBRERO</option>
                    <option value="MARZO">MARZO</option>
                    <option value="ABRIL">ABRIL</option>
                    <option value="MAYO">MAYO</option>
                    <option value="JUNIO">JUNIO</option>
                    <option value="JULIO">JULIO</option>
                    <option value="AGOSTO">AGOSTO</option>
                    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                    <option value="OCTUBRE">OCTUBRE</option>
                    <option value="NOVIEMBRE">NOVIEMBRE</option>
                    <option value="DICIEMBRE">DICIEMBRE</option>
                </select>
                <br>
    </div>
    <div class="col-md-2 no-print">
                <label for="planilla_fecha">FECHA</label>
                <input class="form-control" type="date" value="<?php echo date('Y-m-d') ?>" id="planilla_fecha" onchange="busqueda_planilla()">
                <br>
    </div>
    <div class="col-md-2 no-print">
                <label for="planilla_fecha">SALARIO MINIMO NACIONAL</label>
                <input class="form-control" type="text" value="<?php echo $parametros[0]['parametro_smn']; ?>" id="smn" disabled>
                <br>
    </div>
    <div class="col-md-3 no-print">
                <br>
                <button id="boton" onclick="procesar_planilla()" class="btn bg-success btn-app" ><i class="fa fa-funnel-dollar"></i> Procesar Planilla</button>
                <br>
    </div>

    <div class="col-md-12">
        <div class="box">
          
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Nº</th>
						<th>NOMBRE DEL EMPLEADO</th>
                        <th>SEXO</th>
                        <th>FECHA<br>NAC.</th>
                        <th>CARGO</th>
                        <th>SUELDO<br>BASICO</th>
						<th>SALARIO<br>GANADO</th>
						<th>BONO DE<br>ANTIGUEDAD</th>
						<th>CANT</th>
						<th>MONTO<br>PAGADO</th>
						<th>BONO DE<br>PRODUCCION</th>
						<th>DOMINICALES</th>
						<th>OTROS<br>BONOS</th>
						<th>TOTAL<br>GANADO</th>
						<th>AFP<br>12.71%</th>
						<th>APORTE<br>NACION AL<br>SOLIDARIO</th>
						<th>RC-IVA<br>13%</th>
						<th>ANTICIPO<br>Y OTROS<br>DESCUENTOS</th>
						<th>TOTAL<br>DESCUENTOS</th>
						<th>LIQUIDO<br>PAGABLE</th>
                    </tr>
                    <tbody id="tablaresultados">
                    	
                    </tbody>
                    
                </table>
                                
            </div>
        </div>
    </div>
</div>
