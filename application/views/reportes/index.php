<script src="<?php echo base_url('resources/js/reporte_ingegr.js'); ?>" type="text/javascript"></script><link href="<?php echo base_url('resources/css/mitabladetalleimpresion.css'); ?>" rel="stylesheet"><link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet"><script type="text/javascript">function mostraringreso() {    obj = document.getElementById('oculto1');    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj.style.visibility == 'hidden'){        $('#mitabladetimpresion').css({ 'width':'0', 'height':'0' });        $('#map').css({ 'width':'0', 'height':'0' });        $('#oculto1').css({ 'width':'0', 'height':'0' });        $("a#mosingreso").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mitabladetimpresion').css({ 'width':'100%', 'height':'100%' });        $('#map').css({ 'width':'100%', 'height':'100%' });        $('#oculto1').css({ 'width':'100%', 'height':'100%' });        $("a#mosingreso").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarventa() {    obj2 = document.getElementById('oculto2');    obj2.style.visibility = (obj2.style.visibility == 'hidden') ? 'visible' : 'hidden';        if(obj2.style.visibility === 'hidden'){        $('#map2').css({ 'width':'0', 'height':'0' });        $('#oculto2').css({ 'width':'0', 'height':'0' });        $("a#mosventa").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map2').css({ 'width':'100%', 'height':'100%' });        $('#oculto2').css({ 'width':'100%', 'height':'100%' });        $("a#mosventa").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarcobro() {    obj3 = document.getElementById('oculto3');    obj3.style.visibility = (obj3.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj3.style.visibility == 'hidden'){        $('#map3').css({ 'width':'0', 'height':'0' });        $('#oculto3').css({ 'width':'0', 'height':'0' });        $("a#moscobro").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map3').css({ 'width':'100%', 'height':'100%' });        $('#oculto3').css({ 'width':'100%', 'height':'100%' });        $("a#moscobro").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostraregreso() {    obj4 = document.getElementById('oculto4');    obj4.style.visibility = (obj4.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj4.style.visibility == 'hidden'){        $('#map4').css({ 'width':'0', 'height':'0' });        $('#oculto4').css({ 'width':'0', 'height':'0' });        $("a#mosegreso").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map4').css({ 'width':'100%', 'height':'100%' });        $('#oculto4').css({ 'width':'100%', 'height':'100%' });        $("a#mosegreso").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarcompra() {    obj5 = document.getElementById('oculto5');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#map5').css({ 'width':'0', 'height':'0' });        $('#oculto5').css({ 'width':'0', 'height':'0' });        $("a#moscompra").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map5').css({ 'width':'100%', 'height':'100%' });        $('#oculto5').css({ 'width':'100%', 'height':'100%' });        $("a#moscompra").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarpago() {    obj6 = document.getElementById('oculto6');    obj6.style.visibility = (obj6.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj6.style.visibility == 'hidden'){        $('#map6').css({ 'width':'0', 'height':'0' });        $('#oculto6').css({ 'width':'0', 'height':'0' });        $("a#mospago").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map6').css({ 'width':'100%', 'height':'100%' });        $('#oculto6').css({ 'width':'100%', 'height':'100%' });        $("a#mospago").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarordenpago() {    obj10 = document.getElementById('oculto10');    obj10.style.visibility = (obj10.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj10.style.visibility == 'hidden'){        $('#map10').css({ 'width':'0', 'height':'0' });        $('#oculto10').css({ 'width':'0', 'height':'0' });        $("a#mosorden").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map10').css({ 'width':'100%', 'height':'100%' });        $('#oculto10').css({ 'width':'100%', 'height':'100%' });        $("a#mosorden").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrartotal() {    objt = document.getElementById('ocultot');    objt.style.visibility = (objt.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(objt.style.visibility == 'hidden'){        $('#mapt').css({ 'width':'0', 'height':'0' });        $('#ocultot').css({ 'width':'0', 'height':'0' });        $('#mostotal').text("MOSTRAR REPORTE TOTAL");    }else{        $('#mapt').css({ 'width':'100%', 'height':'100%' });        $('#ocultot').css({ 'width':'100%', 'height':'100%' });        $('#mostotal').text("CERRAR REPORTE TOTAL");    }}function mostrar2() {    obj2 = document.getElementById('ocultov2');    obj2.style.visibility = (obj2.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj2.style.visibility == 'hidden'){        $('#mapv2').css({ 'width':'0', 'height':'0' });        $('#ocultov2').css({ 'width':'0', 'height':'0' });        $("a#mosv2").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv2').css({ 'width':'100%', 'height':'100%' });        $('#ocultov2').css({ 'width':'100%', 'height':'100%' });        $("a#mosv2").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar3() {    obj3 = document.getElementById('ocultov3');    obj3.style.visibility = (obj3.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj3.style.visibility == 'hidden'){        $('#mapv3').css({ 'width':'0', 'height':'0' });        $('#ocultov3').css({ 'width':'0', 'height':'0' });        $("a#mosv3").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv3').css({ 'width':'100%', 'height':'100%' });        $('#ocultov3').css({ 'width':'100%', 'height':'100%' });        $("a#mosv3").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar4() {    obj4 = document.getElementById('ocultov4');    obj4.style.visibility = (obj4.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj4.style.visibility == 'hidden'){        $('#mapv4').css({ 'width':'0', 'height':'0' });        $('#ocultov4').css({ 'width':'0', 'height':'0' });        $("a#mosv4").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv4').css({ 'width':'100%', 'height':'100%' });        $('#ocultov4').css({ 'width':'100%', 'height':'100%' });        $("a#mosv4").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar5() {    obj5 = document.getElementById('ocultov5');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#mapv5').css({ 'width':'0', 'height':'0' });        $('#ocultov5').css({ 'width':'0', 'height':'0' });        $("a#mosv5").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv5').css({ 'width':'100%', 'height':'100%' });        $('#ocultov5').css({ 'width':'100%', 'height':'100%' });        $("a#mosv5").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarcredito() {    obj5 = document.getElementById('ocultocred');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#mapcred').css({ 'width':'0', 'height':'0' });        $('#ocultocred').css({ 'width':'0', 'height':'0' });        $("a#moscred").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapcred').css({ 'width':'100%', 'height':'100%' });        $('#ocultocred').css({ 'width':'100%', 'height':'100%' });        $("a#moscred").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarconsignacion() {    obj5 = document.getElementById('ocultocons');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#mapcons').css({ 'width':'0', 'height':'0' });        $('#ocultocons').css({ 'width':'0', 'height':'0' });        $("a#moscons").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapcons').css({ 'width':'100%', 'height':'100%' });        $('#ocultocons').css({ 'width':'100%', 'height':'100%' });        $("a#moscons").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostrartraspaso() {    obj5 = document.getElementById('ocultotras');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#maptras').css({ 'width':'0', 'height':'0' });        $('#ocultotras').css({ 'width':'0', 'height':'0' });        $("a#mostras").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#maptras').css({ 'width':'100%', 'height':'100%' });        $('#ocultotras').css({ 'width':'100%', 'height':'100%' });        $("a#mostras").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}/* para servicios */function mostrarservicio() {    obj11 = document.getElementById('oculto11');    obj11.style.visibility = (obj11.style.visibility == 'hidden') ? 'visible' : 'hidden';    if(obj11.style.visibility == 'hidden'){        $('#map11').css({ 'width':'0', 'height':'0' });        $('#oculto11').css({ 'width':'0', 'height':'0' });        $("a#mos11").text("+");        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map11').css({ 'width':'100%', 'height':'100%' });        $('#oculto11').css({ 'width':'100%', 'height':'100%' });        $("a#mos11").text("-");        //$('#mosmapa').text("Cerrar mapa");    }}function mostraringresoegreso(){    objt = document.getElementById('oculie');    objt.style.visibility = (objt.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(objt.style.visibility == 'hidden'){        $("#imprimirie").css("display", "none")        //$("#imprimirie").css({ 'width':'0', 'height':'0' })        $('#mapie').css({ 'width':'0', 'height':'0' });        $('#oculie').css({ 'width':'0', 'height':'0' });        $('#mosie').text("MOSTRAR SALDOS");    }else{        //$("#imprimirie").css("display", "block")        $('#imprimirie').css({ 'width':'100%', 'height':'100%' });        $('#mapie').css({ 'width':'100%', 'height':'100%' });        $('#oculie').css({ 'width':'100%', 'height':'100%' });        $('#mosie').text("OCULTAR SALDOS");    }}</script><!--<label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del negocio</a></label> <div id="oculto1" style="visibility:hidden">     <div id="map"><table><tr><td>aaa</td></tr>         <tr><td>www</td></tr>         </table></div>        </div>--><input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" /><script type="text/javascript">    function imprimirdetalle(){        var f = new Date();                var estafecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()+" "+                        f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();        $('#fechaimpresion').html(estafecha);        window.print();    }</script><style type="text/css">    @media print {        .cabeceratabla th {            background-color: rgba(127,127,127,0.5) !important;            color: black !important;            -webkit-print-color-adjust: exact;        }    }    table th{        font-size: 12px !important;    }    table td{        font-size: 10px !important;    }</style><?php $tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta       $ancho = $parametro[0]["parametro_anchofactura"];      $margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;?><div style="width: 100% !important; padding: 0; overflow-y:hidden;" class="table table-responsive"><div class="box-header no-print col-md-12" style="width: 100% !important;">    <h3 class="box-title"><b>REPORTE GENERAL DE MOVIMIENTO DIARIO (Ingresos y Egresos)</b></h3><br><br>    <!--<div class="container">-->          <!--<div class="box-tools">-->                <!--<div class=" col-md-11" >-->                    <!-- panel panel-primary -->                    <!--<div class="panel panel-primary col-md-8" id='buscador_oculto' > style='display:none; padding-top: 10px;'> -->                        <div class="row">                        <div class="col-md-3">                            Usuario:                            <?php if($tipousuario_id == 1){ ?>                            <select  class="btn btn-secondary btn-sm form-control" id="buscarusuario_id" required>                                <option value="0"> TODOS </option>                                <?php foreach($all_usuario as $usuario){?>                                <option value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>                                <?php } ?>                            </select>                            <?php }else{ ?>                            <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" required>                                <?php                                $ischequed = "";                                foreach($all_usuario as $usuario){                                    if($usuario_id == $usuario['usuario_id']){                                        $ischequed = "selected";                                ?>                                <option <?php echo $ischequed; ?> value="<?php echo $usuario['usuario_id']; ?>"><?php echo $usuario['usuario_nombre']; ?></option>                                <?php }                                        } ?>                            </select>                            <?php } ?>                        </div>                        <div class="col-md-2">                            Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-secondary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">                        </div>                        <div class="col-md-2">                            Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-secondary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">                        </div>                        <div class="col-md-2">                            <br>                            <button class="btn btn-primary btn-block"  type="submit" onclick="buscar_por_fecha()">                                <span class="fa fa-search"></span> Buscar                          </button>                            <br>                        </div>                        <div class="col-md-4" hidden>                            <br>                            <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Ing. Egr. encontrados: <span class="badge btn-primary"><input style="border-width: 0; width: 55px" id="resingegr" type="text" value="0" readonly="true"> </span></span>                        </div>                        <!--<div class="col-md-2">                            <br>                            <br>                        </div>-->                        <div class="col-md-2">                            <br>                            <a id="imprimirestedetalle" class="btn btn-warning btn-block" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>                        </div>                        </div>                <!--</div>-->        <!--</div>-->    <!--</div>--></div><!-- *********** INICIO de BUSCADOR select y productos encontrados ****** --><div class="row" id='loader'  style='display:none; text-align: center; width: 100%'>    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  ></div><!-- *********** FIN de BUSCADOR select y productos encontrados ****** --><div class="row" style="width: 100%">    <div class="col-md-12">        <div class="box" style="width: 100%">        <!-- ********************************INICIO Cabecera******************************* -->        <div class="row micontenedorep" id="cabeceraprint" style="width: 100%">        <table class="table" style="width: 100%; padding: 0;" >    <!--<table class="table" style="width: 100%; padding: 0;" >-->    <tr>        <td style="width: 25%; padding: 0; line-height:10px;" >            <center>                <img src="<?php echo base_url('resources/images/empresas/').$all_empresa[0]['empresa_imagen']; ?>" width="100"><br>                <font size="3" face="Arial"><b><?php echo $all_empresa[0]['empresa_nombre']; ?></b></font><br>                <font size="1" face="Arial"><?php echo $all_empresa[0]['empresa_direccion']; ?><br>                <font size="1" face="Arial"><?php echo $all_empresa[0]['empresa_telefono']; ?></font><br>            </center>                              </td>        <td style="width: 35%; padding: 0" >             <center>                <br><br>                <font size="3" face="arial"><b>REPORTE DE MOVIMIENTO</b></font> <br>                    <label id="fechaimpresion"></label><br>                    <label id="tituloimpresion"></label>            </center>        </td>        <td style="width: 20%; padding: 0" >            <center>            </center>        </td>    </tr></table>               </div>                 <div class="table-responsive" id="cabizquierdafechas" style="width: 100%;">                    <label id="elusuario"></label><br>                    <label id="fecha1impresion"></label>                    <label id="fecha2impresion"></label>            </div>                <!--<table class='table table-striped table-condensed cabeceratabla'>                    <tr>                    <th>N°</th>                    <th>Fecha</th>                    <th>Detalle</th>                    <th>Ingreso</th>                    </tr>        </table>-->        <label  class='control-label'><a class='btn bg-primary btn-sm no-print' id='mosie' onclick='mostraringresoegreso(); return true'>OCULTAR SALDOS</a></label>        <div id='oculie' style='visibility: visible; width: 100%; height: 100%;'>        <div id='mapie'>            <span id="imprimirie">            <table style='width: 100%;' class='table table-striped table-condensed cabeceratabla' id='tablasinespacio'>            <tr>                <th style='width:5%;'><a href='#' id='mosingreso'>&nbsp;</a></th>                <th style='width:61%;' class="text-center"> DETALLE </th>                <th style='width:17%;' class="text-center" id='alinearder'>INGRESOS</th>                <th style='width:17%;' class="text-center">EGRESOS</th>            </tr>            <tr style="background: #c2c2c2; color: white;">                <th style='width:5%;'><a href='#' id='mosingreso'>&nbsp;</a></th>                <th style='width:61%;' class="text-center"> - INGRESOS - </th>                <th style='width:17%;' id='alinearder'></th>                <th style='width:17%;' ></th>            </tr>        </table>                </span>                                <div id="tablaingresoresultados"></div>        <div id="tablaventaresultados"></div>        <div id="tablaformapagoresultados2"></div>        <div id="tablaformapagoresultados4"></div>        <div id="tablaformapagoresultados3"></div>        <div id="tablaformapagoresultados5"></div>        <div id="tablacreditoresultados"></div>        <div id="tablaconsignacionresultados"></div>        <div id="tablatraspasoresultados"></div>        <div id="tablacobroresultados"></div>        <div id="tablaservicioresultados"></div> <!-- servicios -->        <div id="sumatablaingresosoloventas"></div>        <div id="sumatablaingresosresultados"></div>        <div id="sumatablaingresosventas"></div>        <?php if($tipousuario_id == 1){ ?>        <div id="sumatablautilidadventas"></div>        <?php } ?>        <table style='width: 100%' class='table table-striped table-condensed cabeceratabla' id='tablasinespacio'>            <tr style="background: #c2c2c2; color: white;">                <th style='width:5%;'><a href='#' id='mosingreso'>&nbsp;</a></th>                <th style='width:61%;' class="text-center"> - EGRESOS - </th>                <th style='width:17%;' id='alinearder'></th>                <th style='width:17%;' ></th>            </tr>        </table>        <div id="tablaegresoresultados"></div>        <div id="tablacompraresultados"></div>        <div id="tablapagoresultados"></div>        <div id="tablaordenresultados"></div>        <div id="sumatablaegresosresultados"></div>        <div id="saldoencaja"></div>        </div>        </div>        <div id="tablatotalresultados" style="width: 100%"></div>            <!-- ********************************FIN Cabecera******************************* -->            <!--            <div class="box-body table-responsive" id="resbusquedadetalleserv">                <table class="table table-striped table-condensed" id="mitabladetimpresion">                    <tr>                        <th>N°</th>                        <th>Fecha</th>                        <th>Detalle</th>                        <th>Ingreso</th>                        <th>Egreso</th>                        <th>Utilidad</th>                    </tr>                    <tbody class="buscar" id="tablaresultados">                </table>            </div> -->            <div style="display: flex">                <div id="parafirmas" style="font-size: 10px; width: 60%">                    <div id="firmaizquierda">                      <br>                      <br>                      ________________________<br>ENTREGADO POR                    </div>                    <div id="firmaderecha">                      <br>                      <br>                      ________________________<br>REVISADO POR                    </div>                </div>                <div class="column" align="right" style="font-size: 10px; width: 40%">                      <p class="subtitulo">EFECTIVO EN CAJA Bs.:...........................$US:.........................</p>                      <P class="subtitulo">UTILIDAD BRUTA Bs.:...........................$US:.........................</P>                      <P class="subtitulo">GASTOS OPERAT. Bs.:...........................$US:.........................</P>                      <p class="subtitulo">UTILIDAD NETA Bs.:...........................$US:.........................</P>                </div>            </div>        </div>    </div></div></div><script type="text/javascript">    $(document).ready(function(){        var resdebito   = $('#parasum2').val();        var rescredito  = $('#parasum3').val();        var resbancaria = $('#parasum4').val();        var rescheque   = $('#parasum5').val();        $('#sumtotalventas').val(resdebito+rescredito+resbancaria+rescheque);    });</script>