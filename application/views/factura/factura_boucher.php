<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!--<script type="text/css">
    
textarea{  
  /* box-sizing: padding-box; */
  overflow:hidden;
  /* demo only: */
  padding:10px;
  width:250px;
  font-size:14px;
  margin:50px auto;
  display:block;
  border-radius:10px;
  border:6px solid #556677;
}


    
</script>


<script type="text/javascript">
var textarea = document.querySelector('textarea');

textarea.addEventListener('keydown', autosize);
             
function autosize(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'height:auto; padding:0';
    // for box-sizing other than "content-box" use:
    // el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
}

</script>
    -->
    
    
<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>
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

<style type="text/css">


div {
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
margin-left: 10px;
margin: 0px;
}


table{
width : 7cm;
margin : 0 0 0px 0;
padding : 0 0 0 0;
border-spacing : 0 0;
border-collapse : collapse;
font-family: Arial narrow;
font-size: 16px;  

} td {
border:hidden;
}
}

td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 16px;
margin : 0 0 0 0;
padding : 0 5px 0 5px;
border-left : 1px solid #aaa;
border-right : 1px solid #aaa;
border-bottom : 1px solid #aaa;
}
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->
<?php //$tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"]."cm";
      $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";
?>
<!---------------------- Modal ---------------------------->
        <div id="myModalAnular" class="modal fade no-print" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Anular Factura</h4>
              </div>
              <div class="modal-body">
                  <p>
                  <h3>              
                    ADVERTENCIA: La factura Nº: <?php echo $factura[0]['factura_numero']; ?>, esta a punto de ser ANULADA. ¿Desea continuar?
                  </h3>
                  </p>
              </div>
              <div class="modal-footer">
                  <a href="<?php echo base_url('factura/anular_factura/'.$factura[0]['factura_id']."/".$factura[0]['factura_numero']); ?>" type="button" class="btn btn-warning" ><i class="fa fa-times-rectangle"></i> Anular</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
              </div>
            </div>

          </div>
        </div>
<!-------------------------------------------------------->


<table class="table" >
<tr>
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>

<td style="padding: 0;">
    
    
<table class="table" style="width: <?php echo $ancho?>" >
    <tr>
<!--        <td style="padding: 0; width: 0cm">-->
        <td style="padding: 0;" colspan="4">
                
            <center>
                               
                    
                    <!--<img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <font size="1" face="Arial narrow"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>                    
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <?php if (isset($empresa[0]['empresa_propietario'])){ ?>
                    <font size="2" face="Arial"></b>

                        <?php  echo "<b> DE: ".$empresa[0]['empresa_propietario'] ; ?>

                        </b></font><br>
                    <?php } ?>

                    <font size="2" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>
                    <font size="2" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="2" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <font size="2" face="Arial"><?php echo $empresa[0]['empresa_zona']; ?></font><br>
                    <font size="2" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>
                
                    <br>
                    <?php //if($factura[0]['venta_tipodoc']==1){ $titulo1 = "FACTURA"; $subtitulo = "ORIGINAL"; }
                         //else {  $titulo1 = "NOTA DE VENTA"; $subtitulo = " "; }?>
                    <?php $titulo1 = "FACTURA";  
                            
                        if ($tipo==1) $subtitulo = "ORIGINAL";
                        else $subtitulo = "COPIA"; 

                    ?>
                    
                <font size="3" face="arial"><b><?php echo $titulo1; ?></b></font> <br>
                <font size="1" face="arial"><b><?php echo $subtitulo; ?></b></font> <br>
                
                   
                <!--<div class="panel panel-primary col-md-12" style="width: 6cm;">-->
                <table style="width:<?php echo $ancho?>" >
                    <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
                        <td>

                            <b>NIT:      </b><br>
                            <b>FACTURA No.:  </b><br>
                            <b>No. AUTORIZACION: </b>

                        </td>
                        <td>
                            <?php echo $factura[0]['factura_nitemisor']; ?> <br>
                            <?php echo $factura[0]['factura_numero']; ?> <br>
                            <?php echo $factura[0]['factura_autorizacion'] ?>           
                        </td>
                    </tr>
                </table>
                    
                <font size="2" face="arial"><?php echo $factura[0]['factura_actividad']?></font>
            </center>
        </td>
    </tr>            
<!--                <br>_______________________________________________
     <tr style="border: 1px solid black"></tr>           <br> -->
     <tr style="border: 1px solid black"></tr>           

    <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
        <td colspan="4" >
            
                <?php $fecha = new DateTime($factura[0]['factura_fechaventa']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].",<br> ".$fecha_d_m_a." ".$factura[0]['factura_hora']; ?> <br>
                    <b>NIT/CI: </b><?php echo $factura[0]['factura_nit']; ?> <br>
                    <b>SEÑOR(ES): </b><?php echo $factura[0]['factura_razonsocial'].""; ?>            
        </td>
    </tr>
     <tr style="border: 1px solid black"></tr>
<!--</table>

       <table class="table table-striped table-condensed"  style="width: 7cm;" >-->

           <tr  style="border-top-style: solid; border-top-width: 2px solid; border-bottom-style: solid ; border-bottom-width: 2px;" >
               <td align="center"><b>CN</b></td>
                <td align="center"><b>DESCRIPCIÓN</b></td>
                <td align="center"><b>P.UNIT</b></td>
                <td align="center"><b>TOTAL</b></td>               
           </tr>
           <?php $cont = 0;
                 $cantidad = 0;
                 $total_descuento = 0;
                 $total_final = 0;

                if ($factura[0]['estado_id']<>3){ 
                 foreach($detalle_factura as $d){;
                        $cont = $cont+1;
                        $cantidad += $d['detallefact_cantidad'];
                        $total_descuento += $d['detallefact_descuento']; 
                        $total_final += $d['detallefact_total']; 
                        ?>
           <tr>
                <td align="center" style="padding: 0;"><?php echo $d['detallefact_cantidad']; ?></td>
                <td style="padding: 0;"><font > <?php echo $d['detallefact_descripcion']; ?></td>
                <!--<td align="right" style="padding: 0;"><?php echo number_format($d['detallefact_precio']+$d['detallefact_descuento'],2,'.',','); ?></td>-->
                <td align="right" style="padding: 0;"><?php echo number_format($d['detallefact_precio'],2,'.',','); ?></td>
                <td align="right" style="padding: 0;"><?php echo number_format($d['detallefact_subtotal'],2,'.',','); ?></td>
           </tr>
           <?php }} ?>
<!--       </table>
        _____________________________________
<table class="table" style="max-width: 7cm;">-->
    
        
    <tr style="border-top-style: solid; border-top-width: 2px;">
        
            
        <td align="right" style="padding: 0;" colspan="4">
            
            
                <b><?php echo "SUB TOTAL Bs ".number_format($factura[0]['factura_subtotal'],2,'.',','); ?></b><br>
           

            
                <?php echo "TOTAL DESCUENTO Bs ".number_format($factura[0]['factura_descuento'],2,'.',','); ?><br>
            
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($factura[0]['factura_total'] ,2,'.',','); ?><br>
            </b>
                <?php echo "SON: ".num_to_letras($factura[0]['factura_total'],' Bolivianos'); ?><br>            
            
            
            
            
        </td>          
    </tr>
    <tr>
        <td nowrap style="padding: 0;" colspan="4">
            <font size="3">
            
                COD. CONTROL: <b><?php echo $factura[0]['factura_codigocontrol']; ?></b><br>
                 <?php $fecha_lim = new DateTime($factura[0]['factura_fechalimite']); 
                        $fecha_limite = $fecha_lim->format('d/m/Y');
                  ?>    
                LIMITE DE EMISIÓN: <b><?php echo $fecha_limite; ?></b><br>
            </font>
        </td>           
    </tr>
    <tr>
        <td style="padding: 0;" colspan="4">
        <center>
            <img src="<?php echo $codigoqr; ?>" style="width: 3cm;">
        </center>

        </td>
       

    </tr>    
    <tr >
        <td style="padding: 0;  line-height: 16px;" colspan="4">
               USUARIO: <b><?php echo $factura[0]['usuario_nombre']; ?></b> / TRANS: 
               <b><?php 
                    if ($factura[0]['venta_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['venta_id']."V"; 
                    if ($factura[0]['credito_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['credito_id']."C"; 
                    if ($factura[0]['ingreso_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['ingreso_id']."C"; 
                    if ($factura[0]['servicio_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['servicio_id']."C"; 
                    if ($factura[0]['cuota_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['cuota_id']."C"; 
               ?></b>
            <center>
                    <?php echo $factura[0]['factura_leyenda1'];?> <br>
            <font size="3">
                    <?php echo $factura[0]['factura_leyenda2']; ?> 
            </font>
            <br>
                    <?php echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>  
            </center>
         </td>
    </tr>    
    
</table>

</td>    
</tr>    
</table>



  
<?php if ($tipousuario_id == 1){ ?>
        
            
    <div class="col-md-12 no-print" style="max-width:<?php echo $ancho?>;">

        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalAnular"><i class="fa fa-ban"></i> Anular Factura</button>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="window.close();"><i class="fa fa-times"></i> Cerrar</button>

    </div>    
    
        
<?php } ?>

        
          
        
<?php //if($parametro[0]['parametro_imprimircomanda']==1){  ?>

<!--        //aqui va la comanda-->
<?php //} ?>