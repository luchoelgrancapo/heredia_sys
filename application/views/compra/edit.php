<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/compra.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/funciones_producto_newunidad.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/proveedor_nuevo.js'); ?>" type="text/javascript"></script>
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
        
        $(document).ready(function () {
            (function ($) {
                $('#filtrar2').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar2 tr').hide();
                    $('.buscar2 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

    $(document).ready(function () {
            (function ($) {
                $('#comprar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar3 tr').hide();
                    $('.buscar3 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });


        $(document).ready(function () {
            (function ($) {
                $('#filtrar4').click(function () {
                  $('.oscar4').removeClass('hidden');
                    var rex = new RegExp($(this).val(), 'i');
                    
                    $('.os1car4 tr').hide();
                    $('.oscar4 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

  function myFunction() {
      var prove = $('#prove_id').val();
      if(prove == 0){
          
   alert("Debe seleccionar un Proveedor");
      
      }
}

function pulsar(e) {
  tecla = (document.all) ? e.keyCode :e.which;
  return (tecla!=13);
}

  $(document).ready(function(){
    $("#categoria_id").change(function(){
        var nombre = $("#producto_nombre").val();
        var cad1 = nombre.substring(0,2);
        var categoria = $('#categoria_id option:selected').text();
        var cad2 = categoria.substring(0,1);
        var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
        var cad = cad1+cad2+cad3;
        $('#pingo').val(cad);
  });
  });
     

function facturation(){
  var selec=document.getElementById('documento_respaldo_id').value;

  if (selec==1) {
    document.getElementById('facturation').style.display = 'block';
}else{
   document.getElementById('facturation').style.display = 'none';
}
}

function final(){
  document.getElementById('loader').style.display = 'block';
}
    
</script>
<style type="text/css">

    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
    
}
input[type=number] { -moz-appearance:textfield; 
    font-size: 15px;}
</style> 
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<!--------------------- CABCERA -------------------------->

    <h3><b>COMPRA Nº: <?php echo "00".$compra_id; ?></b></h3>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<input type="hidden" name="compra_idie" id="compra_idie" value="<?php echo $compra_id; ?>">
<input type="hidden" name="bandera" id="bandera" value="<?php echo $bandera; ?>">
<input type="hidden" name="modificar_detalle" id="modificar_detalle" value="<?php echo $rolusuario[6-1]['rolusuario_asignado']; ?>">
<input type="hidden" name="eliminar_detalle" id="eliminar_detalle" value="<?php echo $rolusuario[7-1]['rolusuario_asignado']; ?>">

<div class="row container" style="margin-left: 0;">
   
    <div class="info-box col-md-4" >
      <div class="info-box-content">      
        <b>Proveedor: <span class="text-secondary" id="provedordecompra"><?php echo $compra[0]['proveedor_nombre']; ?></span></b>
        
        <b>Código Proveedor: <span class="text-secondary" id="provedorcodigo" ><?php echo $compra[0]['proveedor_codigo']; ?></span> <label id="prove_iden" ><input id="prove_id" type="hidden" style="padding: 0px;" value="<?php echo $compra[0]['proveedor_id']; ?>"></label></b>
        <b>Fecha: <span class="text-secondary" id="fechacompra" ><?php echo date('d/m/Y',strtotime($compra[0]['compra_fecha'])) ; ?></span></b>
      </div>
     
    </div>

    <div class="col-md-4">
    <div class="info-box">
        <center>            
            <a href="#" data-toggle="modal" data-target="#modalbuscar" class="btn bg-primary btn-app" title="Buscar Proveedores"><i class="fa fa-search"></i>Buscar Proveedor</a>
            <a href="#" data-toggle="modal" data-target="#modalproveedor" class="btn bg-success btn-app" onclick="codigo()" title="Registrar nuevo Proveedor"><i class="fa fa-user-plus"></i>Registrar Proveedor</a>
            <a href="#" data-toggle="modal" data-target="#modalproducto" class="btn bg-dark btn-app" title="Registrar nuevo Producto"><i class="fa fa-plus-circle"></i>Nuevo Producto</a> 
       
        </center>  

    </div>
    </div> 
    <div class="info-box col-md-4" id="detalleco">
           
           
    </div> 
</div>

<!--------------------- FIN CABERECA -------------------------->
 <div class="info-box row" style="min-height: 30px">

         <!--<span class="btn btn-info" style="margin-right: 50%">Agrupar Detalle <input  type="checkbox"  id="agrupar" name="agrupar" value="1" checked></span>-->  
        <div class="col-md-4">
        </div> 
        <div class="col-md-2">
         <label class="btn btn-secondary btn-xs" > <input  class="btn btn-xs" type="checkbox"  id="agrupar" name="agrupar" value="1" checked> AGRUPAR DETALLE</label>
         </div>  
                <?php if($bandera==1) { ?>
               
            <?php if($rolusuario[9-1]['rolusuario_asignado'] == 1){ ?> 
            <div class="col-md-2">  
            <a href="#" data-toggle="modal" data-target="#cambiarfecha" class="btn  bg-indigo btn-xs" >
                <i class="fa fa-calendar "></i>
               Reestablecer Fecha 
            </a>
          </div>
            <?php } ?>
             <!---------------------------------MODAL DE CAMBIAR FECHA------------------------->

  <div class="modal fade" id="cambiarfecha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document" >
            <div class="modal-content" >
              <div class="modal-header">
                 <h4 class="modal-title">REESTABLECER FECHA/HORA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              </div>
              <div class="modal-body" align="center">
                <div class="row">
              <div class="col-md-6">
            <label for="compra_fecha" class="control-label">Fecha</label>
            <div class="form-group">
              <input type="date" name="compra_fecha" value="<?php echo $compra[0]['compra_fecha']; ?>" class="form-control" id="fechac" />
            </div>
          </div>
          <div class="col-md-6">
            <label for="compra_hora" class="control-label">Hora</label>
            <div class="form-group">
              <input type="time" name="compra_hora" value="<?php echo $compra[0]['compra_hora']; ?>" class="form-control" id="horac" />
            </div>
          </div>
          </div>     
          </div>
              <div class="modal-footer" align="right">

            <button class="btn btn-success" onclick="cambiarFecha()" type="submit" data-dismiss="modal">
                
                <i class="fa fa-check"></i>   Guardar  
                </h5>
            </button>
            
            <button class="btn btn-danger" data-dismiss="modal">
                
                <i class="fa fa-times"></i>   Cancelar  
                
            </button>
                         
        </div>

            </div>
          </div>
        </div>
        <!---------------------------------FIN MODAL DE CAMBIAR FECHA------------------------->
            <div class="col-md-2">
            <a href="#" data-toggle="modal" data-target="#modalcobrar" class="btn btn-xs btn-success" >
                <i class="fas fa-money-bill-alt"></i> FINALIZAR
            </a>
          </div>
        
 <?php  } ?>
<?php if($bandera!=1) { ?>
<?php if($rolusuario[5-1]['rolusuario_asignado'] == 1){ ?>
<?php $provi = $compra[0]['proveedor_id']; 
 
    if($provi==0) { ?>
        
        <div class="col-md-2">
        <label id="provedorboton"><a class="btn btn-xs btn-success"  onclick="myFunction()" href="#" >
          <i class="fas fa-money-bill-alt"></i>
               FINALIZAR
            </a></label>
        </div>  
  <?php  } else { ?>  
          <div class="col-md-2">        
            <label id="provedorboton"><a class="btn btn-xs btn-success"  href="#"  data-toggle="modal" data-target="#modalcobrar">
              <i class="fas fa-money-bill-alt"></i> 
               FINALIZAR 
            </a></label>
          </div>  
 <?php  }  } ?>
 <?php  } ?>
             
            <div class="col-md-2">
              <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#aviso">
                 <i class="fas fa-sign-out-alt"></i>
               SALIR  
              </a>
            </div>  
          <div class="modal fade" id="aviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                    <h4 class="modal-title">ADVERTENCIA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>  
                          
              </div>
              <div class="modal-body">   
               <center><H4> Desea salir de esta Compra sin guardar cambios? 
              </H4></center>
          </div>
              <div class="modal-footer" >
        
        
                  <a  href="<?php echo site_url('compra'); ?>" class="btn btn-md btn-success" >
                <i class="fa fa-sign-out-alt"></i>
               Salir sin guardar
            </a>  
             
           
            
            <button class="btn btn-md btn-danger" data-dismiss="modal">
       
                <span class="fas fa-times"></span>   Cancelar  
                    </div>
          </div>
        </div>
        </div>
           
           
</div>
<div class="row">
   
        
        <div class="col-md-4" >
                        
      <div class="input-group-prepend">
        <span class="input-group-text" onclick="ocultar_busqueda();"><i class="fas fa-search"></i> Buscar</span>
        <input id="comprar" type="text" class="form-control" autocomplete="off" placeholder="Ingresa el nombre de producto o código"  onkeypress="compravalidar(event)">
      </div>
      <!-------------------- CATEGORIAS------------------------------------->
<div class="container" id="categoria">
    
 
                <!--------------------- indicador de resultados --------------------->
    <!--<button type="button" class="btn btn-primary"><span class="badge">7</span>Productos encontrados</button>-->

                <span class="badge btn-primary">Encontrados: <input style="border-width: 0;" id="encontrados" type="text" value="0" readonly="true"> </span>

</div>
<!-------------------- FIN CATEGORIAS--------------------------------->
                                
            
          
                <table class="table table-striped" id="tabla_detalle">
                    
                     <tr>
                                                <th>Nº</th>
                                                <th>Producto</th>
                                                <th></th>
                    </tr>
                    <tbody class="buscar3" id="tablaresultados">
                    
                        <!------ aqui se vacia los resultados de la busqueda mediante JS --->
                    
                    </tbody>
                </table>
            </div>
         <div class="col-md-8" style="padding-left:0px;">
    <!--------------------- parametro de buscador --------------------->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-list"></i> Filtrar</span>
                <input id="filtrar" type="text" autocomplete="off" class="form-control" placeholder="Filtra productos de la lista"> 
              </div>
                
        <!--------------------- fin parametro de buscador --------------------->
  
       
            
            <div class="box-body table-responsive" style="padding-left:0px;">
                <table class="table table-striped table-condensed" id="tabla_detalle">
                  <tr>
                    <th colspan="7"></th>
                    <th colspan="2">Descuento</th>
                    <th colspan="3"></th>
                  </tr>
                    <tr>
                            <th>Nº</th>
                            <th>Producto/<br>Unidad</th>
                            <th>Código</th>
                            <th>Precio</th>
                            <th>Costo</th>
                            <th>Cant.</th>
                            <th>Subtotal</th>
                            <th>Unit.</th>
                            <th>Global</th>
                            <th>Total</th>
                            <?php if($rolusuario[7-1]['rolusuario_asignado'] == 1){ ?>
                            <th colspan="2"><a  onclick="borrartodo()" class="btn btn-xs btn-danger" ><i class="fa fa-trash "></i></a></th>
                            <?php }else{ echo "<th colspan='2'></th>"; } ?>
                    </tr>
                    <tbody class="buscar" id="detallecompringa">
                  
                </table>
                
            </div>
            <div class="pull-right">

                </div>                
        
                <!----------------------------------- BOTONES ---------------------------------->
        <div class="col-md-12">

            <center>

            <?php  $provien = $compra[0]['proveedor_id'];  if($provien==0) { ?>  
            <label id="provedorboton2"><a onclick="myFunction()" class="btn btn-app bg-success" style="width: 90px !important; height: 90px !important;">
                <i class="fas fa-money-bill-alt"></i>
               Finalizar<br>Compra
            </a></label>
          <?php }else{ ?>
            <label id="provedorboton2"><a href="#" data-toggle="modal" data-target="#modalcobrar" class="btn btn-app bg-success" style="width: 90px !important; height: 90px !important;">
                <i class="fas fa-money-bill-alt"></i><br>
               Finalizar<br>Compra
            </a></label>
          <?php } ?>

            
            <a  href="#" data-toggle="modal" data-target="#aviso" class="btn btn-app bg-danger" style="width: 90px !important; height: 90px !important;">
                <i class="fas fa-sign-out-alt"></i><br>
               Salir<br>
            </a>    
              
            </center>
            <br>
        </div>    
        <!----------------------------------- fin Botones ---------------------------------->
    </div>

</div>

        </div>



</div>    


<!--------------------------------- INICIO MODAL crear Productos ------------------------------------>
<div class="modal fade" id="modalproducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h3 class="box-title">Registrar Producto</h3>

              <button type="button" class="btn btn-success btn-xs" onclick="cambiarcodproducto();" title="genera codigo de barra y codigo">
      <i class="fa fa-edit"></i> Generar Codigo Barra y Codigo
    </button>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
     <?php echo form_open_multipart('producto/rapido'); ?>
        <div class="modal-body">
                <div class="row clearfix">
                       
                    <div class="col-md-8">
                        <label for="producto_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="producto_nombre" autocomplete="off" value="<?php echo $this->input->post('producto_nombre'); ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="form-control" id="producto_nombre"  required/>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_marca" class="control-label">Marca</label>
                        <div class="form-group">
                            <input type="text" name="producto_marca" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" value="<?php echo $this->input->post('producto_marca'); ?>" class="form-control" id="producto_marca" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_codigobarra" class="control-label"><span class="text-danger">*</span>Codigo Barra</label>
                        <div class="form-group">
                            <input type="text" name="producto_codigobarra" autocomplete="off" onkeypress="return pulsar(event)" value="<?php echo $this->input->post('producto_codigobarra'); ?>" class="form-control" id="producto_codigobarra" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                        <div class="form-group">
                            <input type="text" name="producto_codigo" autocomplete="off" value="<?php echo $this->input->post('producto_codigo'); ?>" class="form-control" id="producto_codigo" />
                            <span class="text-danger"><?php echo form_error('producto_codigo');?></span>
                        </div>
                    </div>
                    <div class="col-md-4">  
                            <label for="categoria_id" class="control-label"><span class="text-danger">*</span>Categoria</label>
                            <div class="form-group" style="display: flex">
                                <select name="categoria_id" class="form-control" required id="categoria_id">
                                            <option value="">- CATEGORIA -</option>
                                            <?php 
                                            foreach($all_categoria_producto as $categoria_producto)
                                            {
                                                    $selected = ($categoria_producto['categoria_id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$categoria_producto['categoria_id'].'" '.$selected.'>'.$categoria_producto['categoria_nombre'].'</option>';
                                            } 
                                            ?>
                                    </select>
                                <a data-toggle="modal" data-target="#modalcategoriap" class="btn btn-warning" title="Registrar Nueva Categoria">
                                <i class="fa fa-plus-circle"></i></a>
                            </div>
                    </div>
                    
                              <div class="col-md-6" hidden>
                    <input id="compra_id"  name="compra_id" type="text" class="form-control" value="<?php echo $compra_id; ?>">
                        </div>
                        <div class="col-md-4">
                        <label for="producto_unidad" class="control-label">Unidad</label>
                        <div class="form-group">
                            <select name="producto_unidad" class="form-control" id="producto_unidad" onchange="select_unidad()">
                                <option value="PIEZA">--Unidad--</option>
                               <?php 
                foreach($unidades as $u){ ?>
                                                                    
                          <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                         

                      <?php } ?>
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <label for="producto_costo" class="control-label">Costo</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_costo" value="<?php echo $this->input->post('producto_costo'); ?>" class="form-control" id="texto1" required/>
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <label for="producto_precio" class="control-label">Precio de Venta</label>
                        <div class="form-group">
                            <input type="number" min="0" step="any" name="producto_precio" value="<?php echo $this->input->post('producto_precio'); ?>" class="form-control" id="texto2" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cantidad" class="control-label">Cantidad Compra</label>
                        <div class="form-group">
                            <input type="number" min="0" step="any" name="cantidad" autocomplete="off" value="<?php echo $this->input->post('cantidad'); ?>" class="form-control" id="cantidad" required/>
                             <input type="hidden" name="descuento" value="0" class="form-control" id="descuento" />
                            <input id="banderanga" class="form-control" name="bandera" type="hidden" value="<?php echo $bandera; ?>" />
                        </div>
                    </div>
                    <div class="col-md-4" id="select_unidad">
                        <label for="unidad_compra" class="control-label">Unidad Compra</label>
                        <div class="form-group">
                            <select name="unidad_compra" class="form-control" id="unidad_compra" >
                                <option value="1">--Unidad--</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_venc" class="control-label">Fecha Venc.</label>
                        <div class="form-group">
                            <input type="date" name="fecha_venc" value="" class="form-control" id="fecha_venc"/>
                        </div>
                    </div>  
                    
                   
                   
</div>
<div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Mas</h3>
             <div class="card-tools"> 
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
              </div>
              </div>
                    

                    <div class="card-body" style="display: none;">
                      <div class="row">
                      <div class="col-md-6">
                        <label for="producto_unidadfactor" class="control-label">Unidad Factor</label>
                        <div class="form-group">
                            <select name="producto_unidadfactor" class="form-control" id="producto_unidadfactor">
                                <option value="PIEZA">--Unidad--</option>
                               <?php 
                foreach($unidades as $u){ ?>
                                                                    
                          <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                         

                      <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="producto_codigofactor" class="control-label">Codigo Factor</label>
                        <div class="form-group">
                            <input type="text" name="producto_codigofactor" onKeyUp="this.value = this.value.toUpperCase();" class="form-control" id="producto_codigofactor" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_factor" class="control-label">Factor</label>
                        <div class="form-group">
                            <input type="text" name="producto_factor"  class="form-control" id="producto_factor" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_preciofactor" class="control-label">Precio Factor</label>
                        <div class="form-group">
                            <input type="number" name="producto_preciofactor" step="any" class="form-control" id="producto_preciofactor" />
                        </div> 
                    </div>
                    <div class="col-md-4">
                      <label class="control-label">_</label>
                      <div class="form-group">
                            <button type="button" class="form-control btn-sm btn-info" onclick="unidad_factor()"> Asignar Factor </button>
                        </div> 
                    </div>
                        <div class="col-md-4">
                        <label for="producto_foto" class="control-label">Foto</label>
                        <div class="form-group">
                            <input type="file" name="chivo" class="btn btn-box-tool" id="chivox" kl_virtual_keyboard_secure_input="on" />
                             <!--<small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>-->
                            <h4 id='loading' ></h4>
                            <div id="message"></div>
                        </div>
                    </div>
                       
                    
                    <div class="col-md-4">
                        <label for="producto_industria" class="control-label">Industria</label>
                        <div class="form-group">
                            <input type="text" name="producto_industria" onKeyUp="this.value = this.value.toUpperCase();" value="<?php echo $this->input->post('producto_industria'); ?>" class="form-control" id="producto_industria" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="producto_comision" class="control-label">Comision</label>
                        <div class="form-group">
                            <input type="text" name="producto_comision" value="0" class="form-control" id="producto_comision" />
                        </div>
                    </div> 
                    
                    
                   
                    
                    <div class="col-md-6">
                    
                        <div class="form-group">
                            <input type="hidden" name="producto_tipocambio" value="1" class="form-control" id="producto_tipocambio" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="moneda_id" value="1" class="form-control" id="moneda_id" />
                        </div>
                    </div>
                    </div>
           
            </div>        
                    </div>
                      <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i> Cancelar</button>
                </div>
    </div>
</div><?php echo form_close(); ?>
</div>
     <!----------------------FIN  CREAR PRODUCTO--------------------------------------------------->


<!--------------------------------- INICIO MODAL crear Proveedores ------------------------------------>
<div class="modal fade" id="modalproveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="box-title">Registrar Nuevo Proveedor</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
                    <span id="mensaje" class="text-danger"></span>
              </div>
                        
            <div class="modal-body">
                <div class="row clearfix">
                    
                    <div class="col-md-6">
                        <label for="proveedor_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_nombre" value="<?php echo $this->input->post('proveedor_nombre'); ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="form-control" id="proveedor_nombre1" required />
                            
                        </div>
                        <input id="bandera" class="form-control" name="bandera" type="hidden" value="<?php echo $bandera; ?>" />
                    </div>
                     <div class="col-md-6">
                            <label for="categoriaprov_id" class="control-label"><span class="text-danger">*</span>Categoria</label>
                            <div class="form-group" style="display: flex">
                                    <select name="categoriaprov_id" id="categoriaprov_id" class="form-control" onchange="codigo()" required>
                                            
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
                        <label for="proveedor_contacto" class="control-label">Contacto</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_contacto" value="<?php echo $this->input->post('proveedor_contacto'); ?>"  onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="form-control" id="proveedor_contacto" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="proveedor_telefono" class="control-label">Teléfono</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_telefono" value="<?php echo $this->input->post('proveedor_telefono'); ?>" class="form-control" id="proveedor_telefono" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="proveedor_nit" class="control-label">Nit</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_nit" value="0" class="form-control" id="proveedor_nit" />
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <label for="proveedor_razon" class="control-label">Razon</label>
                        <div class="form-group">
                            <input type="text" id="proveedor_razon" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" value="<?php echo $this->input->post('proveedor_razon'); ?>" class="form-control" />
                        </div>
                    </div>
                </div>
           <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Mas</h3>
              <div class="card-tools"> 
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
              </div>
            </div>
                    <div class="card-body" style="display: none;">
                    <div class="row">
                  
                    <div class="col-md-6" >
                        <label for="proveedor_codigo1" class="control-label">Código</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_codigo1" value="" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="form-control" id="proveedor_codigo1" />                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="proveedor_telefono2" class="control-label">Teléfono 2</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_telefono2" value="<?php echo $this->input->post('proveedor_telefono2'); ?>" class="form-control" id="proveedor_telefono2" />
                        </div>
                    </div>

                    <div class="col-md-6" >
                        <label for="proveedor_autorizacion" class="control-label">Autorización</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_autorizacion" value="1" class="form-control" id="proveedor_autorizacion" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="proveedor_direccion" class="control-label">Dirección</label>
                        <div class="form-group">
                            <input type="text" name="proveedor_direccion" value="<?php echo $this->input->post('proveedor_direccion'); ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" class="form-control" id="proveedor_direccion" />
                        </div>
                    </div>

                    <div class="col-md-6" hidden>
                    <input id="compra_id"  name="compra_id" type="text" class="form-control" value="<?php echo $compra_id; ?>">
                        </div>
                    <div class="col-md-6" hidden>
                        <label for="estado_id" class="control-label">estado_id</label>
                        <div class="form-group">
                            <input type="text" name="estado_id" value="1" class="form-control" id="estado_id" />
                        </div>
                    </div>
                    </div>    
                    </div>
                </div>
                <button type="button" class="btn btn-success" onclick="crearproveedor('<?php echo $compra_id; ?>')" >
                    <i class="fa fa-check"></i> Guardar
                </button> 
                <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i> Cancelar</button>
            </div>
            
          </div>
                      <!----------------------FIN  CREAR PROVEEDOR--------------------------------------------------->
            </div>
        </div>

                            
<!--------------------------------- INICIO MODAL proveedores ------------------------------------>
<div class="modal fade" id="modalbuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Buscar Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button> 
              </div> 

               <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar2" type="text" class="form-control" placeholder="Ingresa el nombre">
            </div>                              
                        
            
            <div class="modal-body">
                        <!--------------------- TABLA---------------------------------------------------->
                        <div class="box-body table-responsive">
                        <table class="table table-striped" id="mitabla">
                            <tr>
                              <th>#</th>
                              <th> Info</th>
                            </tr>
                            <tbody class="buscar2">
                            <?php $i=1;
                            foreach($all_proveedor as $h){ ?>
                            <tr>
                             
                                    <td><?php echo $i++; ?></td> 

                                    <td class="row">
                                        <div class="col-md-3">
                                           
                                                
                                            <?php $imagen = base_url('resources/images/proveedores'.$h['proveedor_foto']);
                                             if (is_file($imagen)){ ?>
                                            <img src="<?php echo $imagen ?>" height="80" class="img-responsive">
                                            
                                            <?php } else { ?>
                                              <h1>
                                            <i class="fa fa-user"></i>   
                                            </h1>
                                            <?php } ?>
                                            Telf.:<?php echo $h['proveedor_telefono']; ?> 
                                        </div>
                                        <div class="col-md-9">

                                            <h5> <?php echo $h['proveedor_nombre']; ?></h5> 
                                       
                                         <button  class="btn btn-success btn-xs" onclick="modificarproveedores('<?php echo $compra_id; ?>','<?php echo $h['proveedor_id']; ?>')"   data-dismiss="modal">
                                            <i class="fa fa-check"></i> Seleccionar
                                        </button>

        <div class="card collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Ver Mas</h3>
             <div class="card-tools"> 
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
              <div class="card-body" style="display: none;">
                                        <div class="container" hidden="true" >
                                            <input id="proveedor_id"  name="proveedor_id" type="text" class="form-control" value="" >
                                            <input id="compra_id"  name="compra_id" type="text" class="form-control" value="<?php echo $compra_id; ?>">
                                        </div>                                        
                                        NIT:
                                        <input type="text" id="proveedor_nit<?php echo $h['proveedor_id']; ?>" name="proveedor_nit" class="form-control" placeholder="N.I.T."  value="<?php echo $h['proveedor_nit']; ?>">
                                        <input id="bandera" class="form-control" name="bandera" type="hidden" value="<?php echo $bandera; ?>" />
                                        RAZON SOCIAL:
                                        <input type="text" id="proveedor_razon<?php echo $h['proveedor_id']; ?>" name="proveedor_razon" class="form-control" placeholder="Razón Social"  value="<?php echo $h['proveedor_razon']; ?>">
                                        COD. CONTROL:
                                        <input type="text" id="proveedor_codigo<?php echo $h['proveedor_id']; ?>" name="proveedor_codigo" class="form-control" placeholder="Codigo"  value="<?php echo $h['proveedor_codigo']; ?>" >
                                        AUTORIZACION:
                                        <input type="text" id="proveedor_autorizacion<?php echo $h['proveedor_id']; ?>" name="proveedor_autorizacion" class="form-control" placeholder="AUTORIZACION"  value="<?php echo $h['proveedor_autorizacion']; ?>" >

                                        
                                        <!--</div>-->
                                        </div>
                                        </div>
                                      </div>  
                                    </td>
                                 
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                        <!----------------------FIN TABLA--------------------------------------------------->
            </div>
        </div>
    </div>
</div>
<!--------------------------------- FIN MODAL proveedorS ------------------------------------>


<!----------------- modal productos---------------------------------------------->



<!---------------------- fin modal productos --------------------------------------------------->

<!----------------------Modal Cobrar--------------------------------------------------->
<div class="modal fade" id="modalcobrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
         </div>
               <form action="<?php echo base_url('compra/finalizarcompra/'.$compra_id); ?>"  method="POST" class="form" name="descuento" id="descuento">              

<input type="hidden" name="banderafin" id="banderafin" value="<?php echo $bandera; ?>">
                            <div class="row" id='loader'  style='display:none;'>
                        <center>
                            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >        
                        </center>
                    </div> 
                            <div class="row">
                                
                             
                    <div class="col-md-6">
                        <label for="forma_id" class="control-label">Forma Pago</label>
                        <div class="form-group">
                            <select name="forma_id"  class="form-control"  required>
                                <option value="1">EFECTIVO</option>
                                <?php 
                                foreach($all_forma_pago as $forma_pago)
                                {
                                    $selected = ($forma_pago['forma_id'] == $compra['forma_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$forma_pago['forma_id'].'" '.$selected.'>'.$forma_pago['forma_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tipotrans_id" class="control-label">Tipo de Compra</label>
                        <div class="form-group">
                            <select name="tipotrans_id" id="tipotrans" type="text" class="form-control" onchange="mostrar_radio()" required>
                                
                                <option value="1">CONTADO</option>
                                <option value="2" id="filtrar4" <?php if ($compra[0]['tipotrans_id']==2){ ?> selected
                                  
                                <?php } ?>>CREDITO</option>
                                <option value="3" <?php if ($compra[0]['tipotrans_id']==3){ ?> selected
                                  
                                <?php } ?>>CONSIGNACION</option>
                                
                            </select>
                        </div>
                    </div>  
                            
                  
                                
            </div>
            <div class="modal-body">

          
<?php 
    $efectivo = 0;
    $cambio = 0;
    //$total_consumo = 0;
    
?>              
        <div class="row" id='radio'>
          <div class="col-md-6">
                    <span class="btn btn-outline-info btn-xs">
    <input type="radio" id="compra_caja0"
     name="compra_caja" value="" <?php if ($compra[0]['compra_caja']==0){ ?> checked <?php } ?> >
    <label for="compra_caja0">Otro</label></span>
    
    <span class="btn btn-outline-info btn-xs">
    <input type="radio" id="compra_caja1"
     name="compra_caja" value="1" <?php if ($compra[0]['compra_caja']=='' || $compra[0]['compra_caja']==1 || $compra[0]['compra_caja']==null){ ?> checked <?php } ?> >
    <label for="compra_caja1">Dinero de caja</label></span>
    </div>
    <div class="col-md-6">      
        <span class="btn btn-primary">Ajustar precios de costo <input  type="checkbox"  id="actualizarprecios" name="actualizarprecios" value="1" checked></span>   
    </div>
    </div>    

           
        <div class="row">
            <div class="col-md-12">
            
                <div class="box">

        <div class="box-body table-responsive table-condensed">
            <!--<form method="post" name="descuento">-->
                
            <table class="table table-striped table-condensed" id="tabla_fin" >
                

                <tr>
                        <td>Compra Bs</td>
                        <td><input class="btn btn-default" type="text" size="8" readonly id="compra_subtotal" name="compra_subtotal" value="0"></td>
                    
                </tr>                
                <tr>
                        <td>Descuento Bs</td>
                        <td><input class="btn btn-default" type="text" size="8" readonly id="compra_descuento" name="compra_descuento" value="0"></td>
                    
                </tr>
                <tr>                      
                        <td><b>Subtotal Bs</b></td>
                        <td>
                              <input class="btn btn-default" id="compra_total" size="8" name="compra_total" value="0" readonly="true">
                        </td>
                </tr>
                <tr>                      
                        <td>Descuento Global Bs</td>
                        <td>
                         <input class="btn btn-info" id="compra_descglobal" name="compra_descglobal" size="8" value="<?php echo ($compra[0]['compra_descglobal'] ? $compra[0]['compra_descglobal'] : '0.00'); ?>" onclick="this.select();" onKeyUp="calcularDesc('compra_total', 'compra_descglobal', 'compra_totalfinal','compra_efectivo','compra_cambio')"> 
                        </td>
                </tr>
                <tr>                      
                        <td class="bg-black"><b>Total Final Bs</b></td>
                        <td>
                              <input class="btn bg-black" id="compra_totalfinal" size="8" name="compra_totalfinal" value="0" readonly="true">
                        </td>
                </tr>
                <tr>                      
                        <td>Efectivo Bs</td>
                        <td>
                            <input class="btn btn-info" id="compra_efectivo" size="8" name="compra_efectivo" value="<?php echo $efectivo; ?>" onclick="this.select();" onKeyUp="calcularCambio('compra_total', 'compra_descglobal', 'compra_totalfinal','compra_efectivo','compra_cambio')">
                
                        </td>
                </tr>               
                <tr>                      
                    <td><b>Cambio Bs</b></td>
                        <td>
                            <input class="btn btn-default" id="compra_cambio" size="8" name="compra_cambio" value="<?php echo $cambio; ?>" readonly="true">
                        </td>
                </tr>               
            </table>
              </div>
               <div id="credin" style="display: none;">
                <table class="oscaer4" >
                   <tr>  
                         <td>
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                        <label for="credito_cuotainicial" class="control-label">Cuota Inicial</label>
                            <input type="text" id="credito_cuotainicial" class="form-control" name="credito_cuotainicial" value="0" >
                            </div>
                        </div>
                            
                        <div class="col-md-4">
                        <div class="form-group">
                        <label for="credito_numpagos" class="control-label">N de pagos</label>
                            <input type="number" step="1" min="1" id="credito_numpagos" class="form-control" name="credito_numpagos" value="1" >
                            <input type="hidden" id="credito_monto"  name="credito_monto" value="" >
                            <input type="hidden" name="compra_id" value="<?php echo $compra_id; ?>">
                        </div></div>
                        
                        <div class="col-md-4" hidden>
                        <div class="form-group">    
                        <label for="credito_tipointeres" class="control-label">Tipo Interes</label>
                            <select name="credito_tipointeres" class="form-control">
                                <option value="1">Fijo</option>
                                <option value="">Variable</option>
                            </select>
                            <input type="hidden" id="credito_tipo"  name="credito_tipo" value="1" >
                        </div></div></div>
                        </td>
               </tr>
           </table></div>
           <div class="row">
             <div class="col-md-4">
                        <label for="documento_respaldo_id" class="control-label">Doc. Respaldo</label>
                        <div class="form-group">
                            <select name="documento_respaldo_id" class="form-control" onchange="facturation()" id="documento_respaldo_id">
                                <option value="">- NINGUNO -</option>
                                <?php 
                                foreach($all_documento_respaldo as $documento_respaldo)
                                {
                                    $selected = ($documento_respaldo['documento_respaldo_id'] == $compra[0]['documento_respaldo_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$documento_respaldo['documento_respaldo_id'].'" '.$selected.'>'.$documento_respaldo['documento_respaldo_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="compra_numdoc" class="control-label"># Recibo/Factura</label>
                        <div class="form-group">
                            <input type="text" name="compra_numdoc" value="<?php echo $compra[0]['compra_numdoc']; ?>" class="form-control" id="compra_numdoc" />
                        </div>
                    </div>
                     <div class="col-md-4">
                        <label for="compra_glosa" class="control-label">Glosa</label>
                        <div class="form-group">
                           <input type="text" name="compra_glosa" value="<?php echo  $compra[0]['compra_glosa']; ?>" class="form-control" id="compra_glosa" />
                        </div>
                    </div> 
                    <div id="facturation" <?php if($compra[0]['documento_respaldo_id']==1) { ?> style="display: block;" <?php }else{ ?>style="display: none;" <?php } ?> >
                      <div class="row">
                    <div class="col-md-4" >
                        <label for="compra_codcontrol" class="control-label">Codigo Control</label>
                        <div class="form-group">
                           <input type="text" name="compra_codcontrol" value="<?php echo  $compra[0]['compra_codcontrol']; ?>" class="form-control" id="compra_codcontrol" onKeyUp="this.value = this.value.toUpperCase();"/>
                        </div>
                    </div>    
                    <div class="col-md-4" >
                        <label for="autori" class="control-label">Autorizacion</label>
                        <div class="form-group">
                           <input type="text" name="autori" value="<?php echo  $compra[0]['proveedor_autorizacion']; ?>" class="form-control" id="autori" />
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <label for="factura_fecha" class="control-label">Fecha Factura</label>
                        <div class="form-group">
                           <input type="date" name="factura_fecha" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="factura_fecha" />
                        </div>
                    </div>
                    <div class="col-md-4" hidden>
                        <label for="factura_nit" class="control-label">nit</label>
                        <div class="form-group">
                           <input type="text" name="factura_nit" value="<?php echo  $compra[0]['proveedor_nit']; ?>" class="form-control" id="factura_nit" />
                        </div>
                    </div>
                    
                    <div class="col-md-4" hidden>
                        <label for="factura_hora" class="control-label">hora</label>
                        <div class="form-group">
                           <input type="text" name="factura_hora" value="<?php echo date("H:i:s"); ?>" class="form-control" id="factura_hora" />
                           <input type="date" name="factura_fechacompra" value="<?php echo $compra[0]['compra_fecha']; ?>" class="form-control" id="factura_fechacompra" />
                           <input type="text" name="factura_razonsocial" value="<?php echo  $compra[0]['proveedor_razon']; ?>" class="form-control" id="factura_razonsocial" />
                        </div>
                    </div>
                    </div>
                    </div>
                     <div class="col-md-6">  
                     <button class="btn btn-lg btn-success btn-sm btn-block"  type="submit" onclick="final()">
                
                <i class="fas fa-money-bill-alt"></i>   Finalizar Compra  
                </h4>
            </button>
            </div>
            <div class="col-md-6">
            <button class="btn btn-lg btn-danger btn-sm btn-block" data-dismiss="modal">
                
                <i class="fa fa-ban"></i>   Cancelar  
             
            </button>           
        </div>
        
             
                     
                     </div>
    <!--</form>--></div>
        </div>
        
 </form>
</div>
</div>
</div>
</div>


       

    </div>
</div>
</div>
 
<script>
function calcularDesc(compra_subtotalx,compra_descuentox,compra_totalfinalx,compra_efectivox,compra_cambiox){
    caja=document.forms["descuento"].elements;
    var compra_total = Number(caja[compra_subtotalx].value);
    var compra_descglobal = Number(caja[compra_descuentox].value);
    var compra_efectivo = Number(caja[compra_efectivox].value);
    var compra_cambio = Number(caja[compra_cambiox].value);
    
    compra_totalfinal = compra_total - compra_descglobal;
    compra_efectivo = compra_total - compra_descglobal;
    
    if(!isNaN(compra_totalfinal)){
            caja[compra_totalfinalx].value = compra_total - compra_descglobal; 
            caja[compra_efectivox].value = compra_totalfinal;
            caja[compra_cambiox].value = compra_efectivo - compra_totalfinal;
            
    if(caja1!="compra_totalfinal1"){calcularDesc('compra_subtotal1','compra_descuento2','compra_totalfinal2');} 
    }

}
function calcularCambio(compra_subtotalx,compra_descuentox,compra_totalfinalx,compra_efectivox,compra_cambiox){
    caja=document.forms["descuento"].elements;
    var compra_total = Number(caja[compra_subtotalx].value);
    var compra_descglobal = Number(caja[compra_descuentox].value);
    var compra_efectivo = Number(caja[compra_efectivox].value);
    var compra_cambio = Number(caja[compra_cambiox].value);
    var compra_totalfinal = Number(caja[compra_totalfinalx].value);
    
    //compra_totalfinal = compra_subtotal - compra_descuento;
    compra_cambio = compra_efectivo - compra_totalfinal;
    
    if(!isNaN(compra_cambio)){
            //caja[compra_totalfinalx].value = compra_subtotal - compra_descuento; 
            //caja[compra_efectivox].value = compra_totalfinal;
            caja[compra_cambiox].value = compra_efectivo - compra_totalfinal;
            
    if(caja1!="compra_totalfinal1"){calcularDesc('compra_subtotal1','compra_descuento2','compra_totalfinal2');} 
    }

}
</script>
<script src="http://code.jquery.com/jquery-1.0.4.js"></script>
<script>
      $(document).ready(function () {
          $("#texto1").keyup(function () {
              var value = $(this).val();
              $("#texto2").val(value/0.8);
          });
      });
</script>
<script>
$("#texto2").change(function(){
            var costo = Number($('#texto1').val());
            var precio = $(this).val();
            if (costo > precio) {
            alert("El precio de costo es mayor que el precio de venta");
            }
        }); 
</script>
<script>
      $(document).ready(function () {
          $("#producto_codigobarra").keyup(function () {
              var value = $(this).val();
              $("#producto_codigo").val(value);
          });
      });
</script>
<script>
      $(document).ready(function () {
          $("#proveedor_nombre1").keyup(function () {
              var value = $(this).val();
              $("#proveedor_razon").val(value);
          });
      });
</script>
<script type="text/javascript">
    function cambiarcodproducto(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = estetime.getDay();
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#producto_codigobarra').val(anio+mes+dia+hora+min+seg);
        $('#producto_codigo').val(anio+mes+dia+hora+min+seg);
    }
</script>


    <!----------- fin tabla detalle cuenta ----------------------------------->                                                      
            </div>
        </div>
    </div>
</div>
</div>


<!--------------------------------------- MODAL HISTORIAL DE COSTOS -------------------------------------->

<div class="modal fade" id="modalhistorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
                          <h4 class="modal-title">HISTORIAL DE COSTOS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>  
                          
                    </div>
					
                    <div class="modal-body">
                        <!--------------------- TABLA---------------------------------------------------->
                        
                        <div class="box-body table-responsive" id="tabla_historial">
                            
                        
                        </div>
                        <center>
                            
                            <button class="btn btn-danger" id="cerrar_modalasignar" data-dismiss="modal">

                                <span class="fa fa-close"></span>   Cerrar  

                            </button>
                        </center>
                    </div>
		</div>
	</div>
</div>

<!--------------------------------------- MODAL HISTORIAL DE COSTOS -------------------------------------->

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modalcategoria" tabindex="-1" role="dialog" aria-labelledby="modalcategoria">
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
                        <input type="text" name="nueva_categoria"  class="form-control" id="nueva_categoria" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <button onclick="registrarnuevacategoria()" class="btn btn-success"><i class="fa fa-check"></i> Registrar </button>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->

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