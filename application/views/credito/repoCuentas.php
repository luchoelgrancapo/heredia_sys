<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/credito.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on("ready",inicio);
function inicio(){
        imprimir();     
}
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


    function imprimir()
        {
             window.print(); 
        }

</script>   
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/tablasoficial.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="row" style="display: block" id="cabeceraprint">
    <table class="table" style="width: 100%; padding: 0;" >
    <tr>
        <td style="width: 25%; padding: 0; line-height:10px;" >
                
            <center>
                               
                    <img src="<?php echo base_url('resources/images/empresas/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 35%; padding: 0" > 
            <center>
            
                <br><br>
                <font size="3" face="arial"><b>DEUDAS POR COBRAR</b></font> <br>
                <font size="2" face="arial"><b>VENTAS AL CREDITO</b></font> <br>
                
                <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font> <br>

            </center>
        </td>
        <td style="width: 20%; padding: 0" >
                <center>
                         
                             
                            
                         
                        
                    </center>
        </td>
    </tr>
     
    
    
</table>       
        
</div>
 <a onclick="imprimir()" class="btn btn-warning btn-sm no-print"><i class="fa fa-print"></i> Imprimir</a>
<div class="row">

       
        <div class="box">

            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    
                    <?php if ($agrupar==1) { ?>
                    <tr>
                        <th>Num.</th>                                             
                        <th>CLIENTE</th>
                        <th>TOTAL<br>CRED.</th>
                        <th>CANCELADO<br>a CTTA</th>
                        <th>SALDO<br>TOTAL</th>
                        <th>TELEFONO(s)</th>
                        
                        
                    </tr>
                    <tbody class="buscar" >
                    <?php 
                          $result = array();
                          $totalCancelados=0;
                          $totalCreditos=0;
                          $totalSaldos=0;
                          
                          foreach($credito as $t){
                            $totalCreditos+=$t['credito_monto'];
                            $cancelado=0; foreach($cuota as $k){ if($k['credito_id']==$t['credito_id']){
                            $cancelado+=$k['cuota_cancelado'];
                            }}
                            $repeat=false;

                           for($i=0;$i<count($result);$i++)
    {

        if($result[$i]['cliente_nombre']==$t['cliente_nombre'])
        {
            $result[$i]['credito_monto']+=$t['credito_monto']; 
            $repeat=true;
            
            break;
             
        } 
    }
    if($repeat==false)
        $result[] = array('cliente_nombre' => $t['cliente_nombre'], 'credito_monto' => $t['credito_monto']
    , 'cliente_telefono' => $t['cliente_telefono'], 'cliente_celular' => $t['cliente_celular'], 'credito_cancelado' => $cancelado);
                       
                         } $cont = 0; foreach($result as $c){
                            $cont = $cont+1; ?>
                         <tr>
                        <td style="text-align: center;"><?php echo $cont; ?></td>                                                
                        <td style="text-align: center;"><?php echo $c['cliente_nombre']; ?></td>                                                
                        <td style="text-align: right;"><?php echo number_format($c['credito_monto'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo  number_format($c['credito_cancelado'], 2, ".", ",");  $totalCancelados+=$c['credito_cancelado']; ?></td>
                        
                        <td style="text-align: right;"><?php $saldo=$c['credito_monto']-$c['credito_cancelado']; echo number_format($saldo, 2, ".", ",");  ?></td>
                        <td style="text-align: center;"><?php echo $c['cliente_telefono']; ?><?php if($c['cliente_celular']!=NULL && $c['cliente_telefono']!=NULL){ ?> - <?php echo $c['cliente_celular'];} else { echo $c['cliente_celular']; } ?></td>
                        
                        
                    </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalCreditos, 2, ".", ","); ?></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalCancelados, 2, ".", ","); ?></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalCreditos-$totalCancelados, 2, ".", ","); ?></td>
                        <td></td>
                    </tr>
                    
                       
                    <?php }else{ ?>
                        <tr>
                        <th>Num.</th>                                             
                        <th>CLIENTE</th>
                        <th>CREDITO</th> 
                        <th>TRANS.</th>
                        <th>FECHA</th>                        
                        <th>TOTAL<br>VENTA</th>
                        <th>CUOTA<br>INICIAL</th>
                        <th>TOTAL<br>DEUDA</th>
                        <th>TOTAL<br>PAGADO</th>
                        <th>TOTAL<br>ADEUDADO</th>
                        <th>TELEFONO(s)</th>
                        <th>USUARIO</th>
                        
                    </tr>
                    <tbody class="buscar" >
                    <?php $cont = 0;
                        $totalCreditos=0;
                        $totalCancelados=0;
                        $totalSaldos=0;
                          foreach($credito as $c){;
                                 $cont = $cont+1;
                                 $saldo = 0;
                                 $totalCreditos+=$c['credito_monto'];
                        
                        
                        ?>
                    <tr>
						<td style="text-align: center;"><?php echo $cont ?></td>                                                
						<td ><?php echo $c['cliente_nombre']; ?></td>
                        <td style="text-align: center;"><?php echo $c['credito_id']; ?></td>
                        <td style="text-align: center;"><?php echo $c['venta_id']; ?><?php echo $c['servicio_id']; ?>
                        <?php if ($c['orde']>0) {
                            echo "<b>OT:</b>". $c['orden_numero'];
                        }				    ?>
                        </td>
                        <td style="text-align: center;"><?php echo date('d/m/Y',strtotime($c['credito_fecha'])) ; ?> <?php echo $c['credito_hora']; ?></td>                   
                        <td style="text-align: right;"><?php echo number_format($c['venta_total'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo number_format($c['credito_cuotainicial'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php echo number_format($c['credito_monto'], 2, ".", ","); ?></td>
                        <td style="text-align: right;"><?php $cancelado=0; foreach($cuota as $k){ if($c['credito_id']==$k['credito_id']){ 
                        $cancelado+=$k['cuota_cancelado'];  }  } echo  number_format($cancelado, 2, ".", ",");  $totalCancelados+=$cancelado; ?></td>
                        <td style="text-align: right;"><?php $saldo=$c['credito_monto']-$cancelado; echo number_format($saldo, 2, ".", ","); $totalSaldos+=$saldo; ?></td>
						<td style="text-align: center;"><?php echo $c['cliente_telefono']; ?><?php if($c['cliente_celular']!=NULL && $c['cliente_telefono']!=NULL){ ?> - <?php echo $c['cliente_celular'];} else { echo $c['cliente_celular']; } ?></td>
                        <td ><?php echo $c['usuario_nombre']; ?></td>
						
                    </tr>
                    <?php }  ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalCreditos, 2, ".", ","); ?></td>
                            <td></td>
                            <td></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalCancelados, 2, ".", ","); ?></td>
                        <td style="text-align: right; font-size: 12px;"><b><?php echo number_format($totalSaldos, 2, ".", ","); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php }  ?>
                </table>
                
            </div>
                          
        </div>
        
    </div>
</div>
<div>
            <center>
                <hr style="border-color: black; width: 20%; margin-bottom: 0;">
                RESPONSABLE<BR>
                FIRMA-SELLO
            </center>
        </div>