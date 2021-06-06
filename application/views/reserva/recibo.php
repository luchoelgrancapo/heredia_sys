
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
                                            /*function imprimir()
                                            {
                                                /*$('#paraboucher').css('max-width','7cm !important');*/
                                                /* window.print(); 
                                            }*/
    });
</script>
<!----------------------------- script buscador --------------------------------------->


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


<table class="table" style="width: <?php echo $ancho; ?>; margin-bottom: 0px;" >
    <tr>
        <td colspan="3">
                
            <center>
                               
                    <!--<img src="<?php echo base_url('resources/images/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>
                    
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>
                
                    <br>
                   

                <font size="3" face="arial"><b>RECIBO DE EGRESO</b></font> <br>
                <font size="2" face="arial"><b>Nº:  00<?php echo $reserva['reserva_id']; ?> </b></font> <br>            
                             

            </center>                      
     </td>
    </tr>
 
    <tr style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;"> 
        <td colspan="3">           
            <center>                      
                             
                <?php $fecha = new DateTime($reserva['reserva_fecha']); 
                $fechaini = new DateTime($reserva['reserva_fechaingreso']); 
                 $fechafin = new DateTime($reserva['reserva_fechasalida']);
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> <br>                  
                    <b>RECIBI DE: </b><?php echo $reserva['cliente_nombre'].""; ?>

            </center>                      
     </td>
    </tr>
     
<!--</table>

       <table class="table"  style="width: 7cm; margin: 0; padding: 0;" >-->
           <tr>
               <td align="left" ><b>LA SUMA DE: </b></td>
               <td align="right" colspan="2">
                    <font face="Arial" size="3">
                    <b>
                        <?php echo number_format($reserva['reserva_monto'],2,'.',','); ?>
                    </b>
                    </font>
               </td>
               
                               
           </tr>
           
           <tr>
               <td align="left"><b>POR CONCEPTO DE: </b></td>
               <td colspan="2">RESERVA COLISEO <?php echo $reserva['reserva_tipo'];?><br></td>
                
               
           </tr>
           <tr>
               <td align="left"><b>PERIODO: </b></td>
               <td align="left"><b>INICIO: </b><?php echo $reserva['reserva_horaingreso'];?> <?php echo date_format($fechaini, 'd/m/Y');?> - <b>FIN: </b> <?php echo $reserva['reserva_horasalida'];?> <?php echo date_format($fechafin, 'd/m/Y');?></td>
                
               
           </tr>
               
    </table>
 
    <table class="table" style="max-width: <?php echo $ancho; ?>;">
    <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;">
        
        <td align="right" colspan="3">
            
            
            <font size="2">
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($reserva['reserva_monto'] ,2,'.',','); ?><br>
            </b>
            </font>
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($reserva['reserva_monto'],' Bolivianos'); ?>           
            </font>
           
            
        </td>          
    </tr>
   
     
    <tr >
        <td colspan="3">
            
                    
               USUARIO: <b><?php echo $reserva['usuario_nombre']; ?></b>
            
         </td>
    </tr>    
    
<!--</table>
<table class="table" style="max-width: 7cm;">-->
            <tr style="font-family: Arial Narrow;">
                <td> <center>
                
                        <?php echo "RECIBI CONFORME"; ?><br>
                    
                    </center>
                     <?php echo date("d/m/Y H:i:s");?>
                </td>
                <td width="10">
                </td>
                <td>
                    <center>

                        <?php echo "ENTREGUE CONFORME"; ?><br>   

                    </center>
                </td>
</tr>
        </table>






</td>    
</tr>    
</table>
