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
font-family: Arial narrow;
font-size: 7pt;  

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
font-size : 7px;
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

<!-------------------------------------------------------->
<?php //$tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"]."cm";
      $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";
?>
<table class="table" >
<tr>
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>

<td style="padding: 0;">
    


        <table class="table" style="width: <?php echo $ancho; ?>;" >
            <tr>
                <td style="padding:0;">        
                    <center>

                            <!--<img src="<?php echo base_url('resources/images/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                            <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                            <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                            <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                            <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>-->
                            <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                            <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                            <font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>

                            <br>
                            <?php if($venta[0]['venta_tipodoc']==1){ $titulo1 = "FACTURA"; $subtitulo = "ORIGINAL"; }
                                 else {  $titulo1 = "NOTA"; $subtitulo = "ORIGINAL"; }?>

                        <font size="3" face="arial"><b>NOTA DE ENTREGA</b></font> <br>
                        <font size="1" face="arial"><b>Nº 00<?php echo $venta[0]['venta_id']; ?></b></font> <br>
                        <br> 
                        <?php $fecha = new DateTime($venta[0]['venta_fecha']); 
                                $fecha_d_m_a = $fecha->format('d/m/Y');
                          ?>    
                            <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> <br>
                            <b>CODIGO: </b><?php echo $venta[0]['cliente_codigo']." ".$venta[0]['cliente_nit']; ?> <br>
                            <b>SEÑOR(ES): </b><?php echo $venta[0]['cliente_razon'].""; ?>
                        <br>
                    </center>                      
                </td>
            </tr>

        </table>

       <table class="table table-striped table-condensed"  style="width: <?php echo $ancho; ?>;" >
           <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
               <td align="center"><b>CN</b></td>
                <td align="center"><b>DESCRIPCIÓN</b></td>
                <td align="center"><b>P.UNIT</b></td>
                <td align="center"><b>TOTAL</b></td>               
           </tr>
           <?php $cont = 0;
                 $cantidad = 0;
                 $total_descuento = 0;
                 $total_final = 0;

                 foreach($detalle_venta as $d){;
                        $cont = $cont+1;
                        $cantidad += $d['detalleven_cantidad'];
                        $total_descuento += $d['detalleven_descuento']; 
                        $total_final += $d['detalleven_total']; 
                        ?>
           <tr>
                <td align="center" style="padding: 0;"><?php echo $d['detalleven_cantidad']; ?></td>
                <td style="padding: 0;"><font style="size:5px; font-family: arial narrow;"> <?php echo $d['producto_nombre'];?>
                        <?php
                        $preferencia = $d['detalleven_preferencia'];
                        $caracteristicas = $d['detalleven_caracteristicas'];
                        
                        if ($preferencia !="null" && $preferencia!='-')
                            echo  " /".nl2br($preferencia);
                        
                        if ($caracteristicas!="null" && $caracteristicas!='-')
                            echo  "<br>".nl2br($caracteristicas);
                        
                        ?>
                    <!--<textarea onload="autosize()"></textarea>-->
                </td>
                <td align="right" style="padding: 0;"><?php echo number_format($d['detalleven_precio']+$d['detalleven_descuento'],2,'.',','); ?></td>
                <td align="right" style="padding: 0;"><?php echo number_format($d['detalleven_subtotal'],2,'.',','); ?></td>
           </tr>
           <?php } ?>
<!--       </table>
<table class="table" style="max-width: 7cm;">-->
    <tr style="border-top-style: solid; border-top-width: 2px; border-top-style: solid; border-top-width: 2px;" colspan="4" align="right">
        
        <td colspan="4" style="padding: 0;"  >
            
            <font size="1">
                <b><?php echo "SUB TOTAL Bs ".number_format($venta[0]['venta_subtotal'],2,'.',','); ?></b><br>
            </font>
            

            <font size="1">
                <?php echo "TOTAL DESCUENTO Bs ".number_format($venta[0]['venta_descuento'],2,'.',','); ?><br>
            </font>
            <font size="2">
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($venta[0]['venta_total'] ,2,'.',','); ?><br>
            </b>
            </font>
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($total_final,' Bolivianos'); ?><br>            
            </font>
            <font size="1">
                <?php echo "EFECTIVO Bs ".number_format($venta[0]['venta_efectivo'],2,'.',','); ?><br>
                <?php echo "CAMBIO Bs ".number_format($venta[0]['venta_cambio'],2,'.',','); ?>            
            </font>
            
            <?php if($venta[0]['tipotrans_id']==2){ ?>
            <font size="1">
                <br>CUOTA INIC. Bs: <b><?php echo number_format($venta[0]['credito_cuotainicial'],2,'.',','); ?></b>
                <br>SALDO Bs: <b><?php echo number_format($venta[0]['venta_total']-$venta[0]['credito_cuotainicial'],2,'.',','); ?></b><br>
            </font>
            <?php } ?>
            
        </td>          
    </tr>

    <tr >
        <td colspan="4" style="padding:0;">
               USUARIO: <b><?php echo $venta[0]['usuario_nombre']; ?></b>
               COD.: <b><?php echo $venta[0]['venta_id']; ?></b><br>
               TRANS.: <b><?php echo $venta[0]['tipotrans_nombre']; ?></b>
            <center>
            <font size="2">
                   
            </font>
                    <?php echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>  
            </center>
         </td>
    </tr>    
    
</table>
  
</td>
</tr>
</table>
