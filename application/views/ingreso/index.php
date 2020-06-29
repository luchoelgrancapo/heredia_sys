<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/ingresos.js'); ?>" type="text/javascript"></script>
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
         function imprimir()
        {
           $("#cabeceraprint").css("display", "");
             window.print(); 
        }
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="row" style="display: none" id="cabeceraprint">
    <table class="table" style="width: 100%; padding: 0;" >
    <tr>
        <td style="width: 25%; padding: 0; line-height:10px;" >
                
            <center>
                               
                    <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 35%; padding: 0" > 
            <center>
            
                <br><br>
                <font size="3" face="arial"><b>INGRESOS</b></font> <br>
                
                <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font> <br>

            </center>
        </td>
        <td style="width: 20%; padding: 0" >
                <center>
                         
                             
                            
                         
                        
                    </center>
        </td>
    </tr>
     
    
    
</table>       
        
</div>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<br>
<div class="row">
 <div class="col-md-6 no-print">
    <div class="box-header">
               <h4><b>INGRESOS</b> <small class="badge badge-secondary" id="pillados"></small></h4>
        </div>
    </div>
    <div class="col-md-6 no-print">
        
    <div class="box-tools">
         
            <a href="<?php echo site_url('ingreso/add'); ?>" class="btn bg-success btn-app"><i class="fas fa-hand-holding-usd"></i>Registrar Ingreso</a>
            
            <button data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" onclick="fechadeingreso('and 1')" ><i class="fa fa-search"></i>Ver Todos</button>
            
            <a href="#" onclick="imprimir()" class="btn bg-warning btn-app"><i class="fa fa-print"></i>Imprimir</a>
             
                  
    </div>
    </div>
        <div class="col-md-6">
       <!--------------------- parametro de buscador --------------------->
       <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingresa el nombre de proveedor" >
            </div>
                 
            <!--------------------- fin parametro de buscador --------------------->
          </div>
      <div class="col-md-2">
      
                          
                    <select  class="btn btn-secondary btn-block" id="select_compra" onchange="buscar_ingresos()">
                        <option value="0">- Fecha -</option>
                        <option value="1">Ingresos de Hoy</option>
                        <option value="2">Ingresos de Ayer</option>
                        <option value="3">Ingresos de la semana</option>                                               
                                                                 
                        <option value="5">Ingresos por Fecha</option>
                    </select>
            

    </div>
        <div class="col-md-3">
                                   
              <div class="form-group">                      
                                        
              <select name="categoria_id" id="categoria_id" class="btn btn-secondary btn-block" >
                <option value="0">- Todas las categorias-</option>
                <?php 
                foreach($all_categoria_ingreso as $categoria_ingreso)
                {
                  $selected = ($categoria_ingreso['categoria_cating'] == $this->input->post('ingreso_categoria')) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_ingreso['categoria_cating'].'" '.$selected.'>'.$categoria_ingreso['categoria_cating'].'</option>';
                } 
                ?>
              </select>
                                    </div>
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
            <?php if($rol[57-1]['rolusuario_asignado'] == 1){ ?>
                <br>
            <button class="btn  btn-primary  btn-block"  onclick="buscar_por_fechas()">
                
                <span class="fa fa-search"></span>   Buscar Ingresos  
                
            </button>
            <?php } ?>
            <br>
        </div>
        </div>
    
    <br>    
</div>
 <div class="col-md-12">         
  <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">     
                        <tr>
                           <th>Nº</th>
                            <th>NOMBRE</th>
                            <th># RECIBO</th>
                            <th>FECHA</th>
                            <th>CONCEPTO</th>
                            <th>MONTO</th>
                            <th>MONEDA</th>
                            <th>USUARIO</th>
                            <th class="no-print"></th>
                            
                        </tr>
                           <tbody class="buscar" id="fechadeingreso">
                       
                </table>
                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
        </div>
    </div>
</div>