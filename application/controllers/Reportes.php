<?php/*  * Generated by CRUDigniter v3.2  * www.crudigniter.com */class Reportes extends CI_Controller{    private $session_data = "";    function __construct()    {        parent::__construct();        $this->load->model('Reporte_ing_egr_model');        $this->load->model('Ingreso_model');        $this->load->model('Empresa_model');        if ($this->session->userdata('logged_in')) {            $this->session_data = $this->session->userdata('logged_in');        }else {            redirect('', 'refresh');        }    }     private function acceso($id_rol){        $rolusuario = $this->session_data['rol'];        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){            return true;        }else{            $data['_view'] = 'login/mensajeacceso';            $this->load->view('layouts/main',$data);        }    }    /*     * Listing of cliente     */    function index()    {        if($this->acceso(141)){        $this->load->model('Empresa_model');        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();                $data['tipousuario_id']  = $this->session_data['tipousuario_id'];        $data['usuario_id']  = $this->session_data['usuario_id'];        $this->load->model('Usuario_model');                $this->load->model('Parametro_model');        $data['parametro'] = $this->Parametro_model->get_parametros();        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/nuevo';        $this->load->view('layouts/main',$data);        }    }    function graficas()    {        if($this->acceso(157)){        $data['empresa'] = $this->Empresa_model->get_all_empresa();        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/graficas';        $this->load->view('layouts/main',$data);           // redirect('', 'refresh');        }    }    function graficas2()    {        if($this->acceso(157)){        $data['empresa'] = $this->Empresa_model->get_all_empresa();        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/graficas2';        $this->load->view('layouts/main',$data);           // redirect('', 'refresh');        }    } public function getUltimoDiaMes($elAnio,$elMes) {     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));    }function mes($anio,$mes){        $primer_dia=1;        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );        $fechas = "SELECT compra_fecha, round(compra_totalfinal,2) as compra_totalfinal FROM compra where compra.compra_fecha >= '".$anio."-".$mes."-01' and  compra.compra_fecha <= '".$anio."-".$mes."-31' ";        $result= $this->db->query($fechas)->result_array();        $fechasven = "SELECT venta_fecha, round(venta_total,2) as venta_total FROM venta where venta.venta_fecha >= '".$anio."-".$mes."-01' and  venta.venta_fecha <= '".$anio."-".$mes."-31' ";        $resultven= $this->db->query($fechasven)->result_array();        //$result=$data['result'];        $ct=count($result);        for($d=1;$d<=$ultimo_dia;$d++){            $registros[$d]=0;            $registrosven[$d]=0;             }        foreach($result as $res){        $diasel=intval(date("d",strtotime($res['compra_fecha']) ) );                $suma=$res['compra_totalfinal'];                $registros[$diasel]+=$suma;            }        foreach($resultven as $resven){        $diaselven=intval(date("d",strtotime($resven['venta_fecha']) ) );                $sumave=$resven['venta_total'];               $registrosven[$diaselven]+=$sumave;            }        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros, "registrosven" =>$registrosven);        echo   json_encode($data);        /*$anio = $this->input->post('anio');   1555891200        $mes = $this->input->post('fecha2'); */        }function proven($anio,$mes){        $primer_dia=1;        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);        $numero=10;        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );        $productos="SELECT i.producto_id, i.producto_nombre, SUM(dv.detalleven_cantidad) as cantidades FROM detalle_venta dv LEFT JOIN venta v on dv.venta_id = v.venta_id LEFT JOIN inventario i on dv.producto_id = i.producto_id WHERE v.venta_fecha>='2019-06-01' and v.venta_fecha<='2019-06-30' GROUP BY dv.producto_id ORDER BY cantidades DESC limit 10";        $produc= $this->db->query($productos)->result_array();        //$result=$data['result'];                for($d=1;$d<=$numero;$d++){            $registros[$d]=0;                    }               foreach($produc as $tve){        $prosel=intval($tve['producto_id']);                $suma=$tve['cantidades'];                $registros[$prosel]=$suma;            }                $data=array("totaldias"=>$numero, "registrosdia" =>$registros);        echo   json_encode($data);        /*$anio = $this->input->post('anio');   1555891200        $mes = $this->input->post('fecha2'); */        }function torta($anio,$mes){                               $ventausuario = "SELECT COUNT(DISTINCT usuario_id) as 'distusu' FROM venta where venta.venta_fecha >= '".$anio."-".$mes."-01' and  venta.venta_fecha <= '".$anio."-".$mes."-31' ";        $usve = $this->db->query($ventausuario)->row_array();        $numusu=$usve['distusu'];        $id_usuarios = "SELECT DISTINCT v.usuario_id, u.usuario_nombre FROM venta v, usuario u where v.venta_fecha >= '".$anio."-".$mes."-01' and  v.venta_fecha <= '".$anio."-".$mes."-31' and v.usuario_id=u.usuario_id ";        $usuarios= $this->db->query($id_usuarios)->result_array();        $totalventas = "SELECT  usuario_id, SUM(venta_total) as 'totalventas' FROM venta where venta.venta_fecha >= '".$anio."-".$mes."-01' and  venta.venta_fecha <= '".$anio."-".$mes."-31' GROUP BY usuario_id";        $tove= $this->db->query($totalventas)->result_array();                        foreach($tove as $tve){        $ususel=intval($tve['usuario_id']);                $suma=round($tve['totalventas'],2);                $registros[$ususel]=$suma;            }                              $data=array("totaltipos"=>$numusu, "tipos" =>$usuarios, "numerodepubli" =>$registros);        echo   json_encode($data);                }function torta2($anio,$mes){                               $ventausuario = "SELECT COUNT(DISTINCT cliente_id) as 'distusu',SUM(venta_total) as 'totalventas' FROM venta where venta.venta_fecha >= '".$anio."-".$mes."-01' and  venta.venta_fecha <= '".$anio."-".$mes."-31' ORDER by totalventas limit 10";        $usve = $this->db->query($ventausuario)->row_array();        $numusu=10;        $id_usuarios = "SELECT DISTINCT v.cliente_id, u.cliente_nombre,SUM(venta_total) as 'totalventas' FROM venta v, cliente u where v.venta_fecha >= '".$anio."-".$mes."-01' and  v.venta_fecha <= '".$anio."-".$mes."-31' and v.cliente_id=u.cliente_id GROUP BY cliente_id ORDER by totalventas desc limit 10";        $usuarios= $this->db->query($id_usuarios)->result_array();        $totalventas = "SELECT DISTINCT v.cliente_id, SUM(venta_total) as 'totalventas' FROM venta v, cliente u where v.venta_fecha >= '".$anio."-".$mes."-01' and  v.venta_fecha <= '".$anio."-".$mes."-31' and v.cliente_id=u.cliente_id GROUP BY cliente_id ORDER by totalventas desc limit 10";        $tove= $this->db->query($totalventas)->result_array();                        foreach($usuarios as $tve){        $ususel=intval($tve['cliente_id']);                $suma=round($tve['totalventas'],2);                $registros[$ususel]=$suma;            }                                     $data=array("totaltipos"=>$numusu, "tipos" =>$usuarios, "numerodepubli" =>$registros);        echo   json_encode($data);                }function torta3($anio,$mes){                               $numusu2=10;        $id_usuarios = "SELECT DISTINCT dv.producto_id, u.producto_nombre,SUM(dv.detalleven_cantidad) as 'totalventas' FROM detalle_venta dv, venta v, producto u where v.venta_fecha >= '".$anio."-".$mes."-01' and  v.venta_fecha <= '".$anio."-".$mes."-31' and dv.venta_id= v.venta_id and dv.producto_id=u.producto_id GROUP BY u.producto_id ORDER by totalventas desc limit 10";        $usuarios2= $this->db->query($id_usuarios)->result_array();        foreach($usuarios2 as $tve){        $ususel=intval($tve['producto_id']);                $suma=round($tve['totalventas'],2);                $registros[$ususel]=$suma;            }                         $data=array("totaltipos"=>$numusu2, "tipos" =>$usuarios2, "numerodepubli" =>$registros);        echo   json_encode($data);                }    /*     * Reporte de Ingresos y Salidas     */    function buscarlosreportes()    {        if($this->acceso(141)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reportes($valfecha1, $valfecha2, $usuario_id);            /*$detalles = $this->Reporte_ing_egr_model->get_detalleventas_reporte($valfecha1, $valfecha2, $usuario_id);            $ventas   = $this->Reporte_ing_egr_model->get_reportes($valfecha1, $valfecha2, $usuario_id);            $datos=array("ventas" => $ventas, "detalles" => $detalles);*/            echo json_encode($datos);        }           else        {                             show_404();        }                }                }    function buscarnuevoreportes()    {        if($this->acceso(141)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario_id = $this->input->post('usuario_id');                        if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario_id == 0){            $usuario = "";                  }else{                $usuario = "and usuario = ".$usuario_id." ";            }                                    $datos = $this->Reporte_ing_egr_model->get_nuevosreportes($valfecha1, $valfecha2, $usuario);            /*$detalles = $this->Reporte_ing_egr_model->get_detalleventas_reporte($valfecha1, $valfecha2, $usuario_id);            $ventas   = $this->Reporte_ing_egr_model->get_reportes($valfecha1, $valfecha2, $usuario_id);            $datos=array("ventas" => $ventas, "detalles" => $detalles);*/            echo json_encode($datos);        }           else        {                             show_404();        }                }                }    /*     * Menu de Reportes de Compras     */    function comprareportes()    {        if($this->acceso(137)){        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/comprareportes';        $this->load->view('layouts/main',$data);        }                }    /*     * Menu de Reportes de Ventas     */    function ventareportes()    {        if($this->acceso(1)){        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/ventareportes';        $this->load->view('layouts/main',$data);        }              }    /*     * Menu de Reportes de Servicios     */    function servicioreportes()    {        if($this->acceso(142)){        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/servicioreportes';        $this->load->view('layouts/main',$data);        }    }        function planillacaja()    {        if($this->acceso(1)){                $this->load->model('Empresa_model');                $data['all_empresa'] = $this->Empresa_model->get_all_empresa();                $this->load->model('Usuario_model');                $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();        /*                $fecha1  = Date("Y-m-d");                $fecha2  = $fecha1;                $data['ingresos'] = $this->Reporte_ing_egr_model->get_reportes($fecha1, $fecha2);        */                $data['page_title'] = "Reportes";                $data['_view'] = 'reportes/planillacaja';                $this->load->view('layouts/main',$data);        }               }        function reptotaling_efectivo()    {        if($this->acceso(1)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reptotaling_efectivo($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }              }    /* ************************Reporte total de ventas*******************************+ */    function reptotal_ventas()    {       if($this->acceso(1)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reptotal_ventas($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }               }    /* ************************Reporte total de cobros de Creditos*******************************+ */    function reptotal_cobroscredito()    {        if($this->acceso(1)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reptotal_cobroscredito($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }               }    /* ************Reporte total de Egreso de efectivo******************************* */    function reptotal_egresoefectivo()    {        if($this->acceso(1)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reptotalegr_efectivo($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }              }        /* ************Reporte total de Egreso de Compras******************************* */    function reptotal_egresocompra()    {        if($this->acceso(1)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reptotalegr_compras($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }                }        function reportesformapago()    {        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $formapago = $this->input->post('formapago');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }            if($formapago == 1){                $datos = $this->Reporte_ing_egr_model->get_repefectivo_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }elseif($formapago == 2){                $datos = $this->Reporte_ing_egr_model->get_repdebito_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }elseif($formapago == 3){                $datos = $this->Reporte_ing_egr_model->get_reptransban_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }elseif($formapago == 4){                $datos = $this->Reporte_ing_egr_model->get_reptarjcredito_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }elseif($formapago == 5){                $datos = $this->Reporte_ing_egr_model->get_repcheque_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }elseif($formapago == 61){                $datos = $this->Reporte_ing_egr_model->get_repcredito_ventas($valfecha1, $valfecha2, $usuario_id);                echo json_encode($datos);            }        }           else        {                             show_404();        }                }        function egresorep()    {        if($this->acceso(138)){        $data['usuario_nombre'] = $this->session_data['usuario_nombre'];        $data['usuario_id'] = $this->session_data['usuario_id'];        $this->load->model('Empresa_model');        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/egresorep';        $this->load->view('layouts/main',$data);        }                }        function reportegreso()    {        if($this->acceso(138)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_egresoreportes($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }               }     function ingresorep()    {        if($this->acceso(140)){        $data['usuario_nombre'] = $this->session_data['usuario_nombre'];        $data['usuario_id'] = $this->session_data['usuario_id'];        $this->load->model('Empresa_model');        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/ingresorep';        $this->load->view('layouts/main',$data);        }                }    function reporteingreso()    {        if($this->acceso(140)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_ingresoreportes($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }                }    /* reporte ingrso/egreso individual */    function reportepersonal()    {        if($this->acceso(139)){        $this->load->model('Empresa_model');        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();        $data['usuario_nombre'] = $this->session_data['usuario_nombre'];        $data['usuario_id'] = $this->session_data['usuario_id'];        $data['page_title'] = "Reportes";        $data['_view'] = 'reportes/reportepersonal';        $this->load->view('layouts/main',$data);        }               }    function buscarlosreportespersonal()    {        if($this->acceso(139)){        if ($this->input->is_ajax_request()) {            $fecha1 = $this->input->post('fecha1');               $fecha2 = $this->input->post('fecha2');             $usuario = $this->input->post('usuario_id');             $valfecha1 = "";            $valfecha2 = "";            $usuario_id = "";            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha2;            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){                $valfecha1 = $fecha1;                $valfecha2 = $fecha1;            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {                $valfecha1 = $fecha2;                $valfecha2 = $fecha2;            }else{                $fecha1 = null;                $fecha2 = null;            }            if($usuario >  0){                $usuario_id = $usuario;            }else{                $usuario_id = 0;            }                        $datos = $this->Reporte_ing_egr_model->get_reportes($valfecha1, $valfecha2, $usuario_id);            echo json_encode($datos);        }           else        {                             show_404();        }                }                }    function reporte_agrupado()    {        if($this->acceso(143)){        //**************** inicio contenido ***************                           $this->load->model('Usuario_model');        //$this->load->model('Detalle_venta_model');        $filtro = $this->input->post('filtro');                if ($filtro == null){           //$data['venta'] = $this->Venta_model->get_all_venta(1);        }        else{             $data['venta'] = $this->Venta_model->get_busqueda($filtro);                    }                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();                       $data['_view'] = 'reportes/reporte_agrupado';        $this->load->view('layouts/main',$data);               //**************** fin contenido ***************                    }                                      }    }    