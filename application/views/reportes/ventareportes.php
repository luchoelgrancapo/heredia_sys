<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<div class="box-header">
    <h3 class="box-title"><b>Reportes de Ventas</b></h3>
    </div>
    <div class="row">
         <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4><b>PRODUCTO</b></h4>
                  <p>-----------</p>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="<?php echo base_url('detalle_venta/reportes')?>" class="small-box-footer">Ver Reportes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4><b>CLIENTE</b></h4>
                  <p>-----------</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url('detalle_venta/repocliente')?>" class="small-box-footer">Ver Reportes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h4><b>SIMPLE</b></h4>
                  <p>-----------</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i>
                </div>
                <a href="<?php echo base_url('reportes/reporte_agrupado')?>" class="small-box-footer">Ver Reportes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-navy">
                <div class="inner">
                  <h4><b>GENERAL</b></h4>
                  <p>-----------</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i>
                </div>
                <a href="<?php echo base_url('detalle_venta/reporte_generalventa')?>" class="small-box-footer">Ver Reportes <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
</div>