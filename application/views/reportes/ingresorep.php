<script src="<?php echo base_url('resources/js/reporte_ingreso.js'); ?>" type="text/javascript"></script><link href="<?php echo base_url('resources/css/mitabladetalleimpresion.css'); ?>" rel="stylesheet"><link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet"><script type="text/javascript">function mostraringreso() {    obj = document.getElementById('oculto1');    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj.style.visibility == 'hidden'){        $('#mitabladetimpresion').css({ 'width':'0', 'height':'0' });        $('#map').css({ 'width':'0', 'height':'0' });        $('#oculto1').css({ 'width':'0', 'height':'0' });                //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mitabladetimpresion').css({ 'width':'100%', 'height':'100%' });        $('#map').css({ 'width':'100%', 'height':'100%' });        $('#oculto1').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarventa() {    obj2 = document.getElementById('oculto2');    obj2.style.visibility = (obj2.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj2.style.visibility === 'hidden'){        $('#map2').css({ 'width':'0', 'height':'0' });        $('#oculto2').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map2').css({ 'width':'100%', 'height':'100%' });        $('#oculto2').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrarcobro() {    obj3 = document.getElementById('oculto3');    obj3.style.visibility = (obj3.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj3.style.visibility == 'hidden'){        $('#map3').css({ 'width':'0', 'height':'0' });        $('#oculto3').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#map3').css({ 'width':'100%', 'height':'100%' });        $('#oculto3').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrartotal() {    objt = document.getElementById('ocultot');    objt.style.visibility = (objt.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(objt.style.visibility == 'hidden'){        $('#mapt').css({ 'width':'0', 'height':'0' });        $('#ocultot').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapt').css({ 'width':'100%', 'height':'100%' });        $('#ocultot').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar2() {    obj2 = document.getElementById('ocultov2');    obj2.style.visibility = (obj2.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj2.style.visibility == 'hidden'){        $('#mapv2').css({ 'width':'0', 'height':'0' });        $('#ocultov2').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv2').css({ 'width':'100%', 'height':'100%' });        $('#ocultov2').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar3() {    obj3 = document.getElementById('ocultov3');    obj3.style.visibility = (obj3.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj3.style.visibility == 'hidden'){        $('#mapv3').css({ 'width':'0', 'height':'0' });        $('#ocultov3').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv3').css({ 'width':'100%', 'height':'100%' });        $('#ocultov3').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar4() {    obj4 = document.getElementById('ocultov4');    obj4.style.visibility = (obj4.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj4.style.visibility == 'hidden'){        $('#mapv4').css({ 'width':'0', 'height':'0' });        $('#ocultov4').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv4').css({ 'width':'100%', 'height':'100%' });        $('#ocultov4').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}function mostrar5() {    obj5 = document.getElementById('ocultov5');    obj5.style.visibility = (obj5.style.visibility == 'hidden') ? 'visible' : 'hidden';    //objm = document.getElementById('map');    if(obj5.style.visibility == 'hidden'){        $('#mapv5').css({ 'width':'0', 'height':'0' });        $('#ocultov5').css({ 'width':'0', 'height':'0' });        //$('#mosmapa').text("Obtener Ubicación del negocio");    }else{        $('#mapv5').css({ 'width':'100%', 'height':'100%' });        $('#ocultov5').css({ 'width':'100%', 'height':'100%' });        //$('#mosmapa').text("Cerrar mapa");    }}</script><!--<label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del negocio</a></label> <div id="oculto1" style="visibility:hidden">     <div id="map"><table><tr><td>aaa</td></tr>         <tr><td>www</td></tr>         </table></div>        </div>--><input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" /><input type="hidden" name="buscarusuario_id" id="buscarusuario_id" value="<?php echo $usuario_id; ?>" /><input type="hidden" name="usuario_nombre" id="usuario_nombre" value="<?php echo $usuario_nombre; ?>" /><script type="text/javascript">    function imprimirdetalle(){        var f = new Date();                var estafecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()+" "+                        f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();        $('#fechaimpresion').html(estafecha);        window.print();    }</script><div class="box-header no-print">    <h3 class="box-title"><b>Reporte de Ingresos <?php echo $usuario_nombre?></b></h3><br><br>    <div class="container">          <div class="box-tools">                            <div class=" col-md-11"> <!-- panel panel-primary -->                        <div class="col-md-2">                            Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">                        </div>                        <div class="col-md-2">                            Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">                        </div>                                                <div class="col-md-2">                            <br>                            <button class="btn btn-sm btn-primary btn-sm btn-block"  type="submit" onclick="buscar_por_fecha()" style="height: 34px;">                                <span class="fa fa-search"></span>Buscar                          </button>                            <br>                        </div>                        <div class="col-md-2">                            <br>                            <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Ing. Egr. encontrados: <span class="badge btn-primary"><input style="border-width: 0;" id="resingegr" type="text" value="0" readonly="true"> </span></span>                        </div>                        <div class="col-md-2">                            <br>                            <br>                        </div>                        <div class="col-md-2">                            <br>                            <a id="imprimirestedetalle" class="btn btn-sq-lg btn-success" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>                        </div>                </div>        </div>    </div></div><div class="row">    <div class="col-md-12">        <div class="box">        <!-- ********************************INICIO Cabecera******************************* -->            <div class="box-body table-responsive" id="contenedortitulo">                <div id="cabizquierda">                <?php                echo $all_empresa[0]['empresa_nombre']."<br>";                echo $all_empresa[0]['empresa_direccion']."<br>";                echo $all_empresa[0]['empresa_telefono'];                ?>                </div>                <div id="cabcentro">                    REPORTE DE INGRESOS<br>                    <label id="fechaimpresion"></label><br>                    <label id="tituloimpresion"></label>                </div>                <div id="cabderecha">                    <?php                    $mimagen = "thumb_".$all_empresa[0]['empresa_imagen'];                    echo '<img src="'.site_url('/resources/images/empresas/'.$mimagen).'" />';                    ?>                </div>                            </div>            <div class="box-body table-responsive" id="cabizquierdafechas">                    <label id="elusuario"></label><br>                    <label id="fecha1impresion"></label>                    <label id="fecha2impresion"></label>            </div>                         <div id="tablaingresoresultados"></div>        <div id="tablaventaresultados"></div>        <div id="tablaformapagoresultados2"></div>        <div id="tablaformapagoresultados3"></div>        <div id="tablaformapagoresultados4"></div>        <div id="tablaformapagoresultados5"></div>        <div id="tablacobroresultados"></div>        <div id="tablaegresoresultados"></div>        <div id="saldoencaja"></div>        <div id="tablatotalresultados"></div>            <!-- ********************************FIN Cabecera******************************* -->                </div>    </div></div>