    
<!--<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>-->
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
font-family: Arial;
font-size: 12px;  
}
} td {
border:hidden;

}

td#comentario {
vertical-align : bottom;
border-spacing : 0;
}

</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->
<?php $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      $ancho = $parametro[0]["parametro_anchofactura"];
      $margen_izquierdo = $parametro[0]["parametro_margenfactura"]."cm";
?>

<table class="table" >
<tr>
<td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" >
    
</td>
<td style="padding: 0;">
    
<table class="table" style="width: <?php echo $ancho;?>cm; padding: 0;" >
    <tr>
        <td style="width: 6cm; padding: 0; line-height: 9px;" >
                
            <center>
                    <font size="2" face="Arial black"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <?php if (isset($empresa[0]['empresa_eslogan'])){ ?>
                    <small>
                            <font size="1" face="Arial narrow"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>                                    
                    </small> 
                    <?php } ?>

                    


                    <font size="1" face="Arial narrow">
                    <small>
                        
                        <?php echo $empresa[0]['empresa_direccion']; ?><br>
                        <?php echo $empresa[0]['empresa_telefono']; ?><br>
                        <?php echo $empresa[0]['empresa_ubicacion']; ?>
                    </small>                                
                    </font>                


            </center>
            
        </td>
                   
        <td style="width: 6cm; padding: 0; line-height: 14px; " > 
            <center>
                <br>
                   
                <font size="3" face="arial"><b>NOTA DE RECEPCION</b></font> <br>
                <font size="3" face="arial"><b>Nº 00<?php echo $compra[0]['compra_id']; ?></b></font> <br>
                <!--<font size="1" face="arial"><b><?php echo $compra[0]['compra_fecha']." ".$compra[0]['compra_hora']; ?></b></font> <br>-->
            </center>
        </td>
        
        <td style="width: 6cm; padding: 0; line-height: 12px;" >
                _______________________________________________                
                   
                <br><br> 
                <small>
                    
                <?php $fecha = new DateTime($compra[0]['compra_fecha']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> <br>
                    
                <br>
                </small>
                _______________________________________________
        </td>
    </tr>
     
</table>

       <table class="table table-striped table-condensed"  style="width: <?php echo $ancho;?>cm;" >
           <tr  style="border-top-style: solid; border-bottom-style: solid; border-color: black;">
                <td align="center" style="padding: 0; background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>CANTIDAD</b></td>
                <td align="center" style="padding: 0; background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>CODIGO</b></td>
                <td align="center" style="padding: 0; background-color: #C8E5FF !important; -webkit-print-color-adjust: exact;"><b>DESCRIPCIÓN</b></td>
                               
           </tr>
           <?php $cont = 0;
                 $cantidad = 0;
                 $total_descuento = 0;
                 $total_final = 0;

                 foreach($detalle_compra as $d){;
                        $cont = $cont+1;
                        $cantidad += $d['detallecomp_cantidad'];
                        $total_descuento += $d['detallecomp_descuento']; 
                        $total_final += $d['detallecomp_total']; 
                        ?>
           <tr>
                <td align="center" style="padding: 0"><?php echo $d['detallecomp_cantidad']; ?></td>
                <td align="center" style="padding: 0"><?php echo $d['detallecomp_codigo']; ?></td>
                <td style="padding: 0">  <?php echo $d['producto_nombre'];?>
                       

                    
                    
                </td>
                
           </tr>

           <?php } ?>
<tr><td colspan="4"><hr style="border: 2px solid black;"></td></tr>
       </table>
    


<table class="table" style="width: <?php echo $ancho;?>cm;">
        <tr>
            <td  style="padding: 0">
                <center>
                    __________________________<br>
                            ENTREGE CONFORME
                </center>  
                <?php echo date("d/m/Y H:i:s"); ?>
            </td>
            <td style="padding: 0">
            </td>
            <td  style="padding: 0">
                <center>
                    __________________________<br>
                            RECIBI CONFORME
                </center>  
            </td>
        </tr>
    </table>

</tr>    
</table>