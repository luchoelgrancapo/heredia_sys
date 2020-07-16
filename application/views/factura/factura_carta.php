<!--<link href="<?php echo base_url('resources/css/factura_boucher.css'); ?>" rel="stylesheet">
<!DOCTYPE html> 
 
  <div class="ticket">
    <img src="https://yt3.ggpht.com/-3BKTe8YFlbA/AAAAAAAAAAI/AAAAAAAAAAA/ad0jqQ4IkGE/s900-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="Logotipo">
    <p class="centrado">APPS PERFECTAS
      <br>5 de mayo #1006
      <br>23/08/2017 08:22 a.m.</p>
    <table>
      <thead>
        <tr>
          <th class="cantidad">CANT</th>
          <th class="producto">PRODUCTO</th>
          <th class="precio">$$</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="cantidad">1.00</td>
          <td class="producto">CHEETOS VERDES 80 G</td>
          <td class="precio">$8.50</td>
        </tr>
        <tr>
          <td class="cantidad">2.00</td>
          <td class="producto">KINDER DELICE</td>
          <td class="precio">$10.00</td>
        </tr>
        <tr>
          <td class="cantidad">1.00</td>
          <td class="producto">COCA COLA 600 ML</td>
          <td class="precio">$10.00</td>
        </tr>
        <tr>
          <td class="cantidad"></td>
          <td class="producto">TOTAL</td>
          <td class="precio">$28.50</td>
        </tr>
      </tbody>
    </table>
    <p class="centrado">¡GRACIAS POR SU COMPRA!
      <br>appsperfectas.com</p>
  </div>-->


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
    @media print {
      
      #crema{
        padding: 0 !important;
  background-color: #FFF9B2 !important;
  -webkit-print-color-adjust: exact;
}
    }
</style>


<style type="text/css">

#crema{
  padding: 0 !important;
  background-color: #FFF9B2 !important;
  -webkit-print-color-adjust: exact;
}

p {
    font-family: Arial;
    font-size: 7pt;
    line-height: 120%;   /*esta es la propiedad para el interlineado*/
    color: #000;
    padding: 10px;
}

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
font-family: Arial;
font-size: 7pt;  
}
td {
  border: none !important;
border:hidden;
padding: 5px !important;
}


td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 7px;
margin : 0 0 0 0;
padding : 0 5px 0 5px;
border-left : 1px solid #C8E5FF;
border-right : 1px solid #C8E5FF;
border-bottom : 1px solid #C8E5FF;
}
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!---------------------- Modal ---------------------------->
<?php $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"];
      //$margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;
      $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";
?>

        <div id="myModalAnular" class="modal fade no-print" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Anular Factura</h4>
              </div>
              <div class="modal-body">
                  <h3>              
                  <p>
                    ADVERTENCIA: La factura Nº: <?php echo $factura[0]['factura_numero']; ?>, esta a punto de ser ANULADA. ¿Desea continuar?
                  </p>
                  </h3>
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
    


            <table class="table" style="width: <?php echo $ancho;?>cm; padding: 0; margin: 0" >
                <tr>
                    <!--<td rowspan="3" style="width: 5cm;"></td>-->
                    
                    <td style="width: <?php echo $ancho / 3;?>cm;  padding: 0; line-height: 9px;" colspan="3">

                        <center>
                                <font size="2" face="Arial black"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                                <?php if (isset($empresa[0]['empresa_eslogan'])){ ?>
                                <small>
                                        <font size="1" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>                                    
                                </small> 
                                <?php } ?>
                                
                                <?php if (isset($empresa[0]['empresa_propietario'])){ ?>
                                <font size="1" face="Arial"><b><small>
                                    
                                
                                    <?php  echo "<b> DE: ".$empresa[0]['empresa_propietario'] ; ?>
                                    
                                    </small>
                                    </b></font><br>
                                <?php } ?>
                                    
                                        
                                <font size="1" face="Arial">
                                <small>
                                    <?php echo $factura[0]['factura_sucursal'];?><br>
                                    <?php echo $empresa[0]['empresa_direccion']; ?><br>
                                    <?php echo $empresa[0]['empresa_telefono']; ?><br>
                                    <?php echo $empresa[0]['empresa_ubicacion']; ?>
                                </small>                                
                                </font>                
                                    

                        </center>                      
                    </td>
                    <td style="width: <?php echo 4;?>cm;  padding: 0; line-height: 9px;">
                        <center>            
                                                        <br>
                            <?php $titulo1 = "FACTURA"; 
                            
                                if ($tipo==1) $subtitulo = "ORIGINAL";
                                else $subtitulo = "COPIA"; 
                                    
                            ?>
                            
                            <font size="4" face="arial"><b><?php echo $titulo1; ?></b></font> <br>
                            <font size="1" face="arial"><b><?php echo $subtitulo; ?></b></font> <br>                    
                        </center>
                    </td>
                    
                    <td style="width: <?php echo $ancho / 3;?>cm;  padding: 0; line-height: 18px;">
                            <table style="width: 8cm; padding:0;border: 1px solid black !important;" >
<!--                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="100" height="70"><br>
                                        </center>
                                        
                                    </td>
                                </tr>-->
                                <tr >
                                    <td style="font-family: arial; font-size: 8pt;padding-left: 3px !important" id="crema">
                                        
                                        <b> NIT:      </b><br>
                                        <b> FACTURA No.:  </b><br>
                                        <b> AUTORIZACION: </b>

                                    </td>
                                    <td style="font-family: arial; font-size: 8pt;" id="crema">
                                        <?php echo " ".$factura[0]['factura_nitemisor']; ?> <br>
                                        <b style="color: #B10C0C; font-size: 10pt"><?php echo " 00".$factura[0]['factura_numero']; ?> </b><br>
                                        <?php echo " ".$factura[0]['factura_autorizacion'] ?>           
                                    </td>
                                </tr>
                            </table>        

                            <center style="line-height: 10px !important;">
                           
                            <font size="1px" face="arial">
                                <small >
                                        <?php echo $factura[0]['factura_actividad']?>
                                </small>
                            </font>
                    
                            </center>

                    </td>
                </tr>
                
                <?php $fecha = new DateTime($factura[0]['factura_fechaventa']); 
                                    $fecha_d_m_a = $fecha->format('d/m/Y');
                ?> 
                <br>
                <tr  style="padding: 0;border: 1px solid black !important;">
                    <td colspan="5" style="padding: 0 !important;">
                        
                        <table style="font-family: Arial; font-size: 10px; width: <?php echo $ancho;?>cm; margin: 0" id="mitabla" > 
                            
                                
                            <tr>
                                <td style="width: 2cm;" id="crema"></td> 
                                <td style="width: 4cm;text-align: right;" id="crema" nowrap ><b>LUGAR Y FECHA: </b></td><td id="crema"></td> <td style="width: 10cm;" id="crema"><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a." ".$factura[0]['factura_hora']; ?></td>
                                <td style="width: 2cm;" id="crema"></td> 
                            </tr>
                            <tr>
                                <td style="width: 2cm;" id="crema"></td>
                                <td style="width: 4cm; text-align: right;" id="crema" nowrap><b>NIT/CI: </b></td><td id="crema"></td> <td style="width: 10cm; " id="crema"><?php echo $factura[0]['factura_nit']; ?></td>
                                <td style="width: 2cm;" id="crema"></td> 
                            </tr>
                            <tr >
                                <td style="width: 2cm;" id="crema"> </td>
                                <td style="width: 4cm;text-align: right;" id="crema"  nowrap><b>SEÑOR(ES): </b></td><td id="crema"></td><td style="width: 10cm;" id="crema"><?php echo $factura[0]['factura_razonsocial'].""; ?></td>
                                <td style="width: 2cm;" id="crema"></td>
                            </tr>
                           
                        
                        </table>     
                        
                    </td>  

                </tr>

            </table>

            <table class="table table-condensed"  style="width: <?php echo $ancho;?>cm; height: <?php echo $tipo_factura."cm"; ?>; margin: 0 !important; padding: 0 !important;" >
                <tr>
                <td style="margin: 0;padding: 0 !important">
                
            <table class="table table-condensed"  style="width: <?php echo $ancho;?>cm; padding:   0 !important;" >


                        <tr  style=" font-family: Arial;border-top: 1px solid black !important; ">
   
                            <td align="center" style="background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>CANT</b></td>
                            <td align="center" colspan="2" style="background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>DETALLE</b></td>
                            <td align="center" style="background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>P.UNIT</b></td>
                            <td align="center" style="background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b></b></td>
                            <td align="center" style="background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>TOTAL</b></td>               
                            
                        
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
                       <tr style="border-top-style: solid;  border-color: black;  border-top-width: 1px;">
                           <td align="center" style="padding: 0;"><font style="size:7px; font-family: arial"> <?php echo $d['detallefact_cantidad']; ?></font></td>
                            <td colspan="2" style="padding: 0; line-height: 10px;"><font style="size:7px; font-family: arial;"> 
                                <?php echo $d['detallefact_descripcion']; ?>
                                <?php if(isset($d['detallefact_preferencia']) && $d['detallefact_preferencia']!='null' && $d['detallefact_preferencia']!='-' ) {
                                    echo  $d['detallefact_preferencia']; }
                                ?>
                                <?php if(isset($d['detallefact_caracteristicas']) && $d['detallefact_caracteristicas']!='null' && $d['detallefact_caracteristicas']!='-' ) {
                                    echo  "<br>".nl2br($d['detallefact_caracteristicas']); }
                                    //echo  "<br><textarea rows='5' cols='100%' readonly='true'>".$d['detallefact_caracteristicas']."</textarea>"; }
                                    
                                ?>
                                
                                
                                
                                </font></td>
                            <td align="right" style="padding: 0;"><font style="size:7px; font-family: arial"> <?php echo number_format($d['detallefact_precio']+$d['detallefact_descuento'],2,'.',','); ?></font></td>
                            <td></td>
                            <td align="right" style="padding: 0;"><font style="size:7px; font-family: arial"> <?php echo number_format($d['detallefact_subtotal'],2,'.',','); ?></font></td>
                            
                       </tr>
                       <?php }} ?>
                </table>
               
                </td>
             
        </table>
                
                    

                <table class="table" style="width: <?php echo $ancho;?>cm; margin: 0;">
                <tr>
                    <td nowrap align="left"  style="width: 3cm;" style="padding: 0;" rowspan="2">
                         <img src="<?php echo $codigoqr; ?>" width="120" height="120">
                    </td>

                    <td  align="left" style="width: 7cm; padding:0; line-height: 14px;">
                        <br>
                        <font size="1" face="Arial">
                            <?php echo "SON: ".num_to_letras($total_final,' Bolivianos'); ?><br>            
                        </font>
                        <font size="2" face="Arial">
                        COD. CONTROL: <b><?php echo $factura[0]['factura_codigocontrol']; ?></b><br>
                        </font>
                            
                        <font face="Arial">
                             <?php $fecha_lim = new DateTime($factura[0]['factura_fechalimite']); 
                                    $fecha_limite = $fecha_lim->format('d/m/Y');
                              ?>    
                            LIMITE DE EMISIÓN: <?php echo $fecha_limite; ?><br>

                            USUARIO: <?php echo $factura[0]['usuario_nombre']; ?> / TRANS: 
                            <?php 
                                 if ($factura[0]['venta_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['venta_id']."V"; 
                                 if ($factura[0]['credito_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['credito_id']."C"; 
                                 if ($factura[0]['ingreso_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['ingreso_id']."C"; 
                                 if ($factura[0]['servicio_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['servicio_id']."C"; 
                                 if ($factura[0]['cuota_id']>0) echo $factura[0]['factura_id'].".".$factura[0]['cuota_id']."C"; 
                            ?>

                    </td>  
                                        
                    <td align="right" style="width: 8cm; padding:0; line-height: 14px; ">
                        <font size="1" face="Arial">
                            <b><?php echo "SUB TOTAL Bs ".number_format($factura[0]['factura_subtotal'],2,'.',','); ?></b><br>
                        </font>


                        <font size="1" face="Arial">
                            <?php echo "TOTAL DESCUENTO Bs ".number_format($factura[0]['factura_descuento'],2,'.',','); ?><br>
                        </font>
                        <font size="2" face="Arial">
                        <b>
                            <?php echo "TOTAL FINAL Bs: ".number_format($factura[0]['factura_total'] ,2,'.',','); ?><br>
                        </b>
                        </font>
                        
                        <font size="1" face="Arial">
                            <?php echo "EFECTIVO Bs ".number_format($factura[0]['factura_efectivo'],2,'.',','); ?><br>
                            <?php echo "CAMBIO Bs ".number_format($factura[0]['factura_cambio'],2,'.',','); ?>
                        </font>
                        
                    </td>
                </tr>
                
                <tr>
                   
                    <td colspan="2" style=" padding:0; line-height: 10px;">
                        <center>
                                <?php echo $factura[0]['factura_leyenda1'];?> <br>
                        <font face="Arial" size="1">
                                <?php echo $factura[0]['factura_leyenda2']; ?> 
                        </font>
                        <br>
                                <?php echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>  
                        </center>
                    </td>
                </tr>

            </table>

            <?php if ($tipousuario_id == 1){ ?>


                <div class="col-md-12 no-print" style="max-width: 7cm; font-family: Arial">

                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalAnular"><i class="fa fa-ban"></i> Anular Factura</button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="window.close();"><i class="fa fa-times"></i> Cerrar</button>

                </div>    


            <?php } ?>

        
</td>
</tr>
</table>
