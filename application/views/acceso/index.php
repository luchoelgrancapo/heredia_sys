<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/acceso.js'); ?>" type="text/javascript"></script>
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
               <h4><b>CONTROL DE ACCESO</b> <small class="badge badge-secondary" id="pillados"></small></h4>
  </div>
</div>   
<div class="col-md-6">   
    
</div>
<div class="col-md-6">   
    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese la descripción" >
    </div>
</div>
<div class="col-md-3">   
    <select id="select_inscripcion" class="btn form-control btn-secondary" onchange="buscar_accesos()">
        <option value="1">Ingresos de Hoy</option>
        <option value="2">Ingresos de Ayer</option>
        <option value="3">Ingresos de la semana</option>
        <!--<option value="4">Todos las Ingresos</option>
        <option value="5">Ingresos por fecha</option>-->
    </select>
</div>
<div class="col-md-3">   
  <!--<select class="btn form-control btn-secondary" id="estado_id">
      <option value="1">Vigentes</option>
      <option value="2">Vencidas</option>
  </select>-->
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
            <div class="box-header">
               
            	<div class="box-tools">
                    
                    <div class="col-md-6">
                    <label for="codigo" class="control-label">Registrar Acceso</label>
                        <div class="form-group">
                            <input type="text" name="codigo" value="" class="form-control btn-warning" id="codigo" onkeyup="accesor(event)" autocomplete="off" autofocus placeholder="INGRESAR CODIGO" />
                        </div>
                        </div>

                        
                </div>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-condensed" id="mitabla" role="table">
                    <tr>
						<th>Nº</th>
						<th>Cliente</th>
						
						<th>Estado</th>
						<th>Ingreso</th>
						<th>Salida</th>
						<th></th>
                    </tr>
                    <tbody class="buscar" id="ingresos">
                   
                    </tbody>
                    
                         
                </table>
                                
            </div>
        </div>
    </div>
</div>
