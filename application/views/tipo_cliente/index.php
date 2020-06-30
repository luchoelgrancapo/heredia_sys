<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<br>
<div class="row">
<div class="col-md-6">  
 <div class="box-header">
               <h4><b>TIPOS DE CLIENTE</b> <small class="badge badge-secondary" id="pillados"><?php echo sizeof($tipo_cliente); ?></small></h4>
  </div>
  </div>
  <div class="col-md-6">   
    <div class="box-tools no-print">
        <a href="<?php echo site_url('tipo_cliente/add'); ?>" class="btn bg-success btn-app"><fa class='far fa-save'></fa> Registrar</a> 
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input id="filtrar" autocomplete="off" type="text" class="form-control" placeholder="Ingrese la descripción" >
            </div>
            <br> 
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>Nº</th>
                        <!--<th>Id</th>-->
                        <th>Descripción</th>
                      
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $cont = 0;
                          foreach($tipo_cliente as $t){;
                                 $cont = $cont+1; ?>
                    <tr>
                        <td><?php echo $cont ?></td>
                        <td><?php echo $t['tipocliente_descripcion']; ?></td>
                       
                        <td class="no-print">
                            <a href="<?php echo site_url('tipo_cliente/edit/'.$t['tipocliente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-edit"></span></a> 
                            <!--<a href="<?php //echo site_url('tipo_cliente/remove/'.$t['tipocliente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>
        </div>
    </div>
</div>
