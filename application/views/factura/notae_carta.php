    
<!--<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>-->
<!----------------------------- script buscador --------------------------------------->

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->
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
font-family: Arial;
font-size: 8pt;  
}
 td {
  border: none !important;
border:hidden;
padding: 5px !important;
}
</style>
<!-------------------------------------------------------->
<?php $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"];
      $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";
?>
<br>
<br>
<br>
<table class="table" >
<tr>
<td style="padding: 0;border: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>
<td style="padding: 0;border: 0">
<table class="table" style="width: <?php echo $ancho;?>cm; padding: 0; border: 0" >
    <tr>
       <td style="width: <?php echo $ancho / 3;?>cm;  padding: 0; line-height: 10px;border: 0" colspan="3">

                        <center>
                          <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="80" ><br>
                                <font size="3" face="Arial black"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                                <?php if (isset($empresa[0]['empresa_eslogan'])){ ?>
                                
                                <?php } ?>
                                
                                <?php if (isset($empresa[0]['empresa_propietario'])){ ?>
                                <font style="font-family: Arial; font-size: 8pt"><b><small>
                                    
                                
                                    <?php  echo "<b> DE: ".$empresa[0]['empresa_propietario'] ; ?>
                                    
                                    </small>
                                    </b></font><br>
                                <?php } ?>
                                    
                                        
                                <font style="font-family: Arial; font-size: 8pt">
                                <small>
                                   
                                    <?php echo $empresa[0]['empresa_direccion']; ?><br>
                                    <?php echo $empresa[0]['empresa_zona']; ?><br>
                                    <?php echo $empresa[0]['empresa_telefono']; ?><br>
                                    <?php echo $empresa[0]['empresa_ubicacion']; ?>
                                </small>                                
                                </font>                
                                    

                        </center>                      
                    </td>    
        <td style="width: 6cm; padding: 0; border: 0" > 
            <center>
            
                    <?php if($venta[0]['venta_tipodoc']==1){ $titulo1 = "FACTURA"; $subtitulo = "ORIGINAL"; }
                         else {  $titulo1 = "NOTA"; $subtitulo = "ORIGINAL"; }?>

                <font size="3" face="arial"><b>NOTA DE ENTREGA</b></font> <br>
                <font size="3" face="arial"><b>Nº 00<?php echo $venta[0]['venta_id']; ?></b></font> <br>
                <font size="1" face="arial"><b><?php echo $venta[0]['venta_fecha']." ".$venta[0]['venta_hora']; ?></b></font> <br>
            </center>
        </td>
        <td style="width: 6cm; padding: 0; border: 0" >
                _______________________________________________                
                   
                <br> 
                <?php $fecha = new DateTime($venta[0]['venta_fecha']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> <br>
                    <b>CODIGO: </b><?php echo $venta[0]['cliente_codigo']." / NIT: ".$venta[0]['cliente_nit']; ?> <br>
                    <b>SEÑOR(ES): </b><?php echo $venta[0]['cliente_razon'].""; ?>
                                        <!--<b>DIRECCIÓN: </b><?php echo $venta[0]['cliente_direccion'].""; ?><br>
                    <b>ZONA: </b><?php echo $venta[0]['zona_nombre'].""; ?><br>
                    <?php
                    $guion = "";
                    if($venta[0]['cliente_telefono'] >0 && $venta[0]['cliente_celular'] >0){
                        $guion = " - ";
                    }
                    ?>
                    <b>TELEFONOS: </b><?php echo $venta[0]['cliente_telefono'].$guion.$venta[0]['cliente_celular'].""; ?>-->
                <br>_______________________________________________
        </td>
    </tr>
     
</table>
    <table class="table" style="width: <?php echo $ancho;?>cm; padding: 0; margin: 0" >
       <!--<table class="table table-striped table-condensed"  style="width: 20cm;" >-->
           <tr  style="border-top-style: solid; border-bottom-style: solid">
                <td align="center" style="padding: 0"><b>CANT</b></td>
                <td align="center" style="padding: 0"><b>DESCRIPCIÓN</b></td>
                <td align="center" style="padding: 0"><b>P.UNIT</b></td>
                <td align="center" style="padding: 0"><b>TOTAL</b></td>               
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
                <td align="center" style="padding: 0"><?php echo $d['detalleven_cantidad']; ?></td>
                <td style="padding: 0"><font style="size:5px; font-family: arial narrow;"> <?php echo $d['producto_nombre'];?>
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
                <td align="right" style="padding: 0"><?php echo number_format($d['detalleven_precio']+$d['detalleven_descuento'],2,'.',','); ?></td>
                <td align="right" style="padding: 0"><?php echo number_format($d['detalleven_subtotal'],2,'.',','); ?></td>
           </tr>
           <?php } ?>
       </table>

<table class="table" style="width: <?php echo $ancho;?>cm; padding: 0; font-size: 12px" >
<!--<table class="table" style="max-width: 20cm;">-->
    <tr style="border-top-style: solid">
        
        <td align="left">
                            
                USUARIO: <b><?php echo $venta[0]['usuario_nombre']; ?></b><br>
                <?php if ($venta[0]['pedido_id']>=1) { ?>
                PED.: <b><?php echo $venta[0]['pedido_id']; ?></b><br>
                <?php }else{ ?>
                COD.: <b><?php echo $venta[0]['venta_id']; ?></b><br>
                <?php } ?>
                TRANS.: <b><?php echo $venta[0]['tipotrans_nombre']; ?></b><br>
                CUOTA INIC. Bs.: <b><?php echo number_format($venta[0]['credito_cuotainicial'],2,'.',','); ?></b><br>
                SALDO Bs.: <b><?php echo number_format($venta[0]['venta_total']-$venta[0]['credito_cuotainicial'],2,'.',','); ?></b><br>                
        </td>
        <td align="right">
<!--            <center>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                    <?php //echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>  
            </center>-->
        </td>
        <td align="right"  style="padding: 0">
            
            
                <b><?php echo "SUB TOTAL Bs. ".number_format($venta[0]['venta_subtotal'],2,'.',','); ?></b><br>
           
                <?php echo "TOTAL DESCUENTO Bs. ".number_format($venta[0]['venta_descuento'],2,'.',','); ?><br>
            
            <b>
                <?php echo "TOTAL FINAL Bs. ".number_format($venta[0]['venta_total'] ,2,'.',','); ?><br>
            </b>
            
                <?php echo "SON: ".num_to_letras($total_final,' Bolivianos'); ?><br>            
           
                <?php echo "EFECTIVO Bs. ".number_format($venta[0]['venta_efectivo'],2,'.',','); ?><br>
                <?php echo "CAMBIO Bs. ".number_format($venta[0]['venta_cambio'],2,'.',','); ?>
            
            
        </td>          
    </tr>

    <tr >
        <td colspan="3">
            <b>NOTA: </b><?php echo $venta[0]['venta_glosa']; ?>
         </td>
    </tr>    
    
</table>
<table class="table" style="width: <?php echo $ancho;?>cm; padding: 0;" >
<!--<table class="table" style="width: 20cm;">-->
        <tr>
            <td  style="padding: 0; border: 0">
                <center>
                    __________________________<br>
                            ENTREGE CONFORME
                </center>  
            </td>
            <td style="padding: 0; border: 0">
            </td>
            <td  style="padding: 0; border: 0">
                <center>
                    __________________________<br>
                            RECIBI CONFORME
                </center>  
            </td>
        </tr>
    </table>
</table>