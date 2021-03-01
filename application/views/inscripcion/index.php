<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/inscripcion.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php //echo base_url('resources/css/servicio_reportedia.css'); ?>" rel="stylesheet">-->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<br>
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
<div class="col-md-6">
  <div class="box-header">
               <h4><b>INSCRIPCIONES</b> <small class="badge badge-secondary" id="pillados"></small></h4>
  </div>
</div>   
<div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('inscripcion/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a> 
        <a href="#" onclick="vencimiento()" class="btn bg-danger btn-app"><fa class='fas fa-stopwatch'></fa> Vencimiento</a> 
    </div>
</div>
<div class="col-md-6">   
    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese la descripción" >
    </div>
</div>
<div class="col-md-3">   
    <select id="select_inscripcion" class="btn form-control btn-secondary" onchange="buscar_inscripciones()">
        <option value="4">Todas</option>
        <option value="1">Inscripciones de Hoy</option>
        <option value="2">Inscripciones de Ayer</option>
        <option value="3">Inscripciones de la semana</option>
        <!--<option value="4">Todos las Inscripciones</option>-->
        <option value="5">Inscripciones por fecha</option>
    </select>
</div>
<div class="col-md-3">   
  <select class="btn form-control btn-secondary" id="estado_id" onchange="buscar_inscripciones()">
      <option value="1">Vigentes</option>
      <option value="2">Vencidas</option>
  </select>
</div>
</div>
<div class="panel panel-primary col-md-12" id='buscador_oculto' style='display:none;'>
    <br>
         <div class="row">  
        <div class="col-md-3">
            Desde: <input type="date" class="btn btn-secondary  form-control" id="fecha_desde" name="fecha_desde" required="true">
        </div>
        <div class="col-md-3">
            Hasta: <input type="date" class="btn btn-secondary form-control" id="fecha_hasta" name="fecha_hasta" required="true">
        </div>
        
      
        
        <div class="col-md-3">
           
                <br>
            <button class="btn  btn-primary  btn-block"  onclick="buscar_por_fechas()">
                
                <span class="fa fa-search"></span>   Buscar Ingresos  
                
            </button>
            <br>
        </div>
        </div>
    
    <br>    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body  table-responsive">
               <table class="table table-condensed" id="mitabla" role="table">
                    <tr>
						<th>Nº</th>
						<th>Cliente</th>
						<th>Servicio</th>
						<th>Fecha Inicio</th>
						<th>Fecha Fin</th>
                        <th>Dias</th>
						<th>Monto</th>
                        <th>Usuario</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="inscritos">
                   
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
