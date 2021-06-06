
<style type="text/css">
	@media print {
       @page {
       	size: landscape;
       }
    } 
	th {
word-break: break-all;
    -ms-hyphens: auto;          /* Guiones para separar en sílabas */
    -moz-hyphens: auto;         /*  depende de lang en <html>      */
    -webkit-hyphens: auto;
    hyphens: auto;
		border: 1px solid black !important;
		font-family: arial;
		font-size: 7pt;
		padding: 0px !important;
	}
	td {

		border: 1px solid black;
		font-family: arial;
		font-size: 6pt;
		padding: 1px !important;
	}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <center><h3 class="box-title">PLANILLA DE SUELDOS Y SALARIOS</h3>
                <h4 class="box-title">Correspondiente al mes de:  <b><?php echo $planilla['planilla_mes']; ?></b> <b><?php echo $planilla['planilla_ano']; ?></b></h4></center>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th style="width: 0.5cm !important;">Nº</th>
						<th style="width: 2cm !important;">CARNET DE<br>IDENTIDAD</th>
						<th style="width: 6cm !important;">NOMBRE DEL<br>EMPLEADO</th>
						<th style="width: 2cm !important;">NACIONALIDAD</th>
						<th style="width: 2cm !important;">FECHA DE<br>NACIMIENTO</th>
						<th style="width: 1cm !important;">SEXO<br>(F/M)</th>
						<th style="width: 2cm !important;">OCUPACION QUE<br>DESEMPEÑA</th>
						<th style="width: 2cm !important;">FECHA DE<br>INGRESO</th>
						<th style="width: 2cm !important;">SUELDO<br>BASICO</th>
						<th style="width: 1cm !important;">DIAS<br>PAGADOS</th>
						<th style="width: 1cm !important;">HORAS/DIAS<br>PAGADAS</th>
						<th style="width: 2cm !important;">SALARIO<br>GANADO</th>
						<th style="width: 2cm !important;">BONO DE<br>ANTIGUEDAD</th>
						<th style="width: 1cm !important;">CANT</th>
						<th style="width: 2cm !important;">MONTO<br>PAGADO</th>
						<th style="width: 2cm !important;">BONO DE<br>PRODUCCION</th>
						<th style="width: 2cm !important;">DOMINICALES</th>
						<th style="width: 2cm !important;">OTROS<br>BONOS</th>
						<th style="width: 2cm !important;">TOTAL<br>GANADO</th>
						<th style="width: 2cm !important;">AFP<br>12.71%</th>
						<th style="width: 2cm !important;">APORTE<br>NACIONAL<br>SOLIDARIO</th>
						<th style="width: 2cm !important;">RC-IVA<br>13%</th>
						<th style="width: 2cm !important;">ANTICIPO<br>Y OTROS<br>DESCUENTOS</th>
						<th style="width: 2cm !important;">TOTAL<br>DESCUENTOS</th>
						<th style="width: 2cm !important;">LIQUIDO<br>PAGABLE</th>
						<th style="width: 0.5cm !important;" class="no-print"></th>
                    </tr>
                    <?php $cont =1; foreach($salario as $s){ ?>
                    <tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $s['personal_ci']; ?></td>
						<td><?php echo $s['personal_nombre']; ?></td>
						<td><?php echo $s['personal_nacionalidad']; ?></td>
						<td><?php echo $s['personal_fechanac']; ?></td>
						<td><?php echo $s['personal_sexo']; ?></td>
						<td><?php echo $s['contrato_cargo']; ?></td>
						<td><?php echo $s['contrato_fechaing']; ?></td>
						<td><?php echo $s['contrato_sueldo']; ?></td>
						<td><?php echo $s['personal_diaspagados']; ?></td>
						<td><?php echo $s['personal_horaspagados']; ?></td>
						<td><?php echo $s['salario_ganado']; ?></td>
						<td><?php echo $s['salario_bonoant']; ?></td>
						<td><?php echo $s['salario_horasext']; ?></td>
						<td><?php echo $s['salario_bonohoras']; ?></td>
						<td><?php echo $s['salario_produccion']; ?></td>
						<td><?php echo $s['salario_dominical']; ?></td>
						<td><?php echo $s['salario_otrobono']; ?></td>
						<td><?php echo $s['salario_totalganado']; ?></td>
						<td><?php echo $s['salario_afp']; ?></td>
						<td><?php echo $s['salario_solidario']; ?></td>
						<td><?php echo $s['salario_iva']; ?></td>
						<td><?php echo $s['salario_ant']; ?></td>
						<td><?php echo $s['salario_totaldescuento']; ?></td>
						<td><?php echo $s['salario_loquidopagable']; ?></td>
						<!--<td><?php echo $s['salario_fecha']; ?></td>
						<td><?php echo $s['usuario_id']; ?></td>-->
						<td class="no-print">
                            <a href="<?php echo site_url('salario/recibo/'.$s['salario_id']); ?>" class="btn btn-warning btn-xs"><span class="fa fa-print"></span></a> 
                            <!--<a href="<?php echo site_url('salario/remove/'.$s['salario_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php $cont++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
