
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


<table class="table" style="width: <?php echo $ancho; ?>; margin-bottom: 0px;margin-left: <?php echo $margen_izquierdo;?>" >
    <tr>
        <td style="width: 8cm; padding: 0;border: 0;" >
                
            <center>
                               
                    
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php /*echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];*/ ?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php //echo $empresa[0]['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 9cm; padding: 0;border: 0;" > 
            <center>
            

                <font size="3" face="arial"><b>RECIBO DE PAGO</b></font> <br>
                <font size="3" face="arial"><b>Nº <?php echo "00".$salario['salario_id']; ?></b></font> <br>
                <font size="1" face="arial"><b>(EXPRESADO EN BOLIVIANOS)</b></font> <br>
            </center>
        </td>
        <td style="width: 7cm; padding: 0;border: 0;" >
                
                <font size="3" face="arial">DPTO. ADMIN. Y FIN.</font> <br>
                
                <?php $fecha = new DateTime($salario['salario_fecha']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><br>
                    <?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> 
                    
                <br>
        </td>
    </tr>
     
</table>

     
    <table class="table" style="max-width: <?php echo $ancho; ?>;margin-left: <?php echo $margen_izquierdo; ?>;">
    <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;">
        <td align="left" width="15%">
          NOMBRE:<br>
          C.I.:<br>           
  		  CARGO:<br>
  		  F-INGRESO:
        </td> 
        <td align="right" width="35%">
            <?php echo $salario['personal_nombre']; ?><br>
            <?php echo $salario['personal_ci']; ?><br>
            <?php echo $salario['personal_cargo']; ?><br>
            <?php $fechaing = new DateTime($salario['personal_fechaing']);           
             echo $fechaing->format('d/m/Y'); ?>           
        </td>
        <td align="left" width="25%">
          SUELDO BASICO:<br>
          DIAS TRABAJADOS: <br>          
  		  MES:
        </td>      
        <td align="right" width="25%">
            <?php echo $salario['personal_sueldo']; ?><br>
            <?php echo $salario['personal_diaspagados']; ?><br>
            <?php echo "MAYO"; ?><br>           
        </td>    
    </tr>
    <tr>
        <td align="center" colspan="2">
            <u><b>INGRESOS</b></u>
        </td>
        <td align="center" colspan="2">
            <u><b>EGRESOS</b></u>
        </td>
    </tr>
    <tr >
    	<td  style="border: 0;" align="left" width="25%">
          SALARIO GANADO:<br>
          BONO DE ANTIGUEDAD:<br>           
  		  HORAS EXTRAS:<br>
  		  OTROS:<br>
  		  <br>
  		  TOTAL INGRESOS:<br>
  		  <br>
  		  LIQUIDO PAGABLE:
        </td> 
        <td  style="border: 0;" align="right" width="25%">
            <?php echo number_format($salario['salario_ganado'] ,2,'.',','); ?><br>
            <?php echo number_format($salario['salario_bonoant'] ,2,'.',','); ?><br>
            <?php echo number_format($salario['salario_bonohoras'] ,2,'.',','); ?><br>
            <?php echo number_format($salario['salario_otrobono']+$salario['salario_dominical'] ,2,'.',','); ?><br>
            <br>
            <?php echo number_format($salario['salario_totalganado'] ,2,'.',','); ?><br>
            <br>
            <u><?php echo number_format($salario['salario_loquidopagable'] ,2,'.',','); ?></u>
                       
        </td>
        <td  style="border: 0;" align="left" width="25%">
          AFP'S:<br>
          ANS: <br>          
  		  RC-IVA:<br>
  		  ANTICIPO Y OTROS:<br>
  		  <br>
  		  TOTAL EGRESOS:
        </td>      
        <td  style="border: 0;" align="right" width="25%">
            <?php echo number_format($salario['salario_afp'] ,2,'.',','); ?><br>   
            <?php echo number_format($salario['salario_solidario'] ,2,'.',','); ?> <br>   
            <?php echo number_format($salario['salario_iva'] ,2,'.',','); ?><br>     
            <?php echo number_format($salario['salario_ant'] ,2,'.',','); ?><br> 
            <br>
            <?php echo number_format($salario['salario_totaldescuento'] ,2,'.',','); ?>

               
        </td>
    </tr>
     
    
    
</table>
<table class="table" style="width: <?php echo $ancho; ?>; margin-bottom: 0px; margin-left: <?php echo $margen_izquierdo; ?>;">
            <tr style="font-family: Arial Narrow;">
                <td  style="border: 0;"> <center>
                    <br>
                        ______________________________________<br> 
                        <?php echo "RECIBI CONFORME"; ?>
                    
                    </center>
                     
                </td>
                <td  style="border: 0;" width="10">
                </td>
                <td  style="border: 0;">
                    <center>
                        <br>
                        ______________________________________<br> 
                        <?php echo "ENTREGUE CONFORME"; ?>  

                    </center>
                </td>
</tr>
<tr>
	<td  style="border: 0;" colspan="3" align="right">
		<?php echo date("d/m/Y H:i:s");?>
	</td>
</tr>
        </table>






</td>    
</tr>    
</table>
