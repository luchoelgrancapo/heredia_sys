
<script src="<?php echo base_url('resources/js/comisiones.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    function final(){
  document.getElementById('loader').style.display = 'block';
}
 function imprimir()
        {
             window.print(); 
        }
    
 
      $(document).ready(function () {
          $("#busca").click(function () {
            
              var fecha1 = document.getElementById('fecha_desde').value;
              var fechauno = moment(fecha1).format('DD/MM/YYYY');
              var fecha2 = document.getElementById('fecha_hasta').value;
              var fechados = moment(fecha2).format('DD/MM/YYYY');
              $("#fecha_inicio").html(fechauno);
              $("#fecha_fin").html(fechados);
              
          });
      });

</script>

<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet" type="text/css">
 
<div class="box-header"  align="center">
                <h4><b><u>REPORTE GENERAL DE VENTAS</u></b></h4>
                
</div>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="row">
      
        <div class="col-md-5 no-print" >
            Desde: <input type="date" class="btn btn-primary btn-sm " id="fecha_desde" name="fecha_desde" required="true" value="<?php echo date('Y-m-d')?>">
       
            Hasta: <input type="date" class="btn btn-primary btn-sm" id="fecha_hasta" name="fecha_hasta" required="true"  value="<?php echo date('Y-m-d')?>">
        </div> <br>
        
          
      
       <div class="col-md-3 ">
                        

                <div class="row">             
                            VENDEDOR: <select .select-selected.select-arrow-active-no-print name="usuario_id" id="usuario_id"   class="btn btn-primary btn-sm "  >
                                <option value="0">-TODOS -</option>
                                <?php 
                                foreach($all_usuario as $usuario)
                                {
                                    $selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

                                    echo '<option  value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                      </div>
  
    </div>
    <div class="col-md-2">
      
     <button class="btn btn-primary btn-sm no-print" onclick="buscar_fecha_ven(),final()" >
        
                <span class="fa fa-search"></span>   Realizar  Busqueda  
             
          </button>
          
          
       <br class="no-print">   
</div>
 <div class="col-md-2">
  <a onclick="imprimir()" class="btn btn-success btn-sm no-print"><i class="fa fa-print"> Imprimir</i></a>
  </div>
<div class="col-md-4">
    DESDE: <label class="ol" id="fecha_inicio"><?php echo date('d/m/Y'); ?>    </label>    
    HASTA: <label class="ol" id="fecha_fin"><?php echo date('d/m/Y'); ?>        
    </label>
   
</div>
</div>

<div class="container no-print" id="categoria">
    
 
                <!--------------------- indicador de resultados --------------------->
    <!--<button type="button" class="btn btn-primary"><span class="badge">7</span>Productos encontrados</button>-->


</div>
 <div class="row" id='loader'  style='display:none;'>
                        <center>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >        
                        </center>
                    </div> 
<div class="box">
            
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                    </tr>
                    <tbody class="buscar" id="ventacombi">

</table>
</div>
        
</div>
<br><br>
    
       