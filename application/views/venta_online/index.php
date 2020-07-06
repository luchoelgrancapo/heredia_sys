<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/venta_online.js'); ?>" type="text/javascript"></script>

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
<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">




<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!--<div class="box-header text-center">
    <h2 class="box-title"><b>REPORTE DE RECORRIDO</b></h2>
</div>-->
<!-------------------------------------------------------->
<div class="row">
    
    <div class="col-md-6">
<h4 class="box-title"><b>VENTAS ONLINE</b> <small class="badge badge-secondary" id="pillados"></small></h4>
</div>
        <!---------------- BOTONES --------->

</div>

    
    <div class="row">
    
        <div class="col-md-3">
            Desde: <input type="date" class="btn  btn-sm btn-secondary btn-block" value="<?php echo date('Y-m-d')?>" id="fecha_desde" name="fecha_desde" required="true">
        </div>
        <div class="col-md-3">
            Hasta: <input type="date" class="btn  btn-sm btn-secondary btn-block" value="<?php echo date('Y-m-d')?>" id="fecha_hasta" name="fecha_hasta" required="true">
        </div>
        
        <div class="col-md-3">
            <br>
            <button class="btn btn-primary btn-sm form-control"  type="button" onclick="buscarventas()" style="height: 34px;">
                <span class="fa fa-search"></span> Buscar
          </button>
            <br>
        </div>
          
        <!--</div>-->
        <!-- *********** INICIO de BUSCADOR select y productos encontrados ****** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->
        
    </div>
    
<br>
    
<!-------------------------------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->

        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Ubic.</th>
                        <th>Venta</th>
                        <th>Monto</th>
                        <th>Servicio</th>
                        <th>Pago</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: Arial; font-size: 12px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Detalle de Venta<i class="fa fa-cart-arrow-down"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" style="overflow-x: auto;">        
        <div class="col-md-12"></div>
        
        <table class="table table-striped table-condensed" id="mitabla">
          <thead>
            <tr style="color: white; background: rgba(0, 0, 0, 0.7);">
              <th style="padding:0">#</th>
              <th style="padding:0">Producto</th>
              <th style="padding:0">Precio</th>
              <th style="padding:0">Cant.</th>
              <th style="padding:0">Desc.</th>
              <th style="padding:0">Total</th>
              <th  style="padding:0">Disp.</th>
              <th  style="padding:0">Total</th>
<!--              <th></th>-->
            </tr>
          </thead>
          <tbody id="detalle">
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
          <button class="btn btn-primary" id="paraconsolidarventa"><fa class="fa fa-cart-plus"></fa> Consolidar Venta</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->