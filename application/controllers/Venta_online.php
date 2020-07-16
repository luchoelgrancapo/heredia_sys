<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Venta_online extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Venta_online_model');
        $this->load->model('Usuario_model');
        $this->load->model('Empresa_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Listing of articulo
     */
    function index()
    {
        
            //$data['venta'] = $this->Venta_online_model->get_all_articulo();
            $data['empresa'] = $this->Empresa_model->get_all_empresa();
            $data['_view'] = 'Venta_online/index';
            $this->load->view('layouts/main',$data);
        
    }

    function ventas_pendientes()
    {
        
        
        $data = $this->Venta_online_model->ventas_pendientes();
        
       
        echo json_encode($data);
              
    }

    function buscarventas()
    {
        
        $filtro = $this->input->post('filtro');
        $data = $this->Venta_online_model->ventas($filtro);
        
       
        echo json_encode($data);
              
    }

    function detalle(){
        $venta = $this->input->post('venta');
        $datos = $this->Venta_online_model->get_detalle($venta);
        if(isset($datos)){
            echo json_encode($datos);
        }else { echo json_encode(null); } 
    }
    
    /* pasar pedido olnline a ventas */
    function pasar_aventas($venta_id,$cliente_id)
    {
        if ($this->input->is_ajax_request()) {
        $usuario_id = $this->session_data['usuario_id'];
        
        
        $this->Venta_online_model->eliminar_detalleventaux($usuario_id);
        $cliente = $this->Venta_online_model->get_thiscliente($venta_id);
        
        
        $venta = $this->Venta_online_model->get_detalle($venta_id);
        foreach ($venta as $v) {
            $estotal = $v["existencia"]-$v["detalleven_cantidad"];
            $existencia ="";
            $resdisp ="";
            //$nohay = "";
            $band = false;
            if($estotal > 0){
                $band = true;
                $existencia = $v["detalleven_cantidad"];
                $resdisp = $v["detalleven_total"];
                //$mitotal = $mitotal+$v["detalleven_total"];
            }elseif($estotal == 0){
                $band = true;
                $existencia = $v["detalleven_cantidad"];
                $resdisp = $v["detalleven_total"];
                //$mitotal = $mitotal+$v["detalleven_total"];
            }elseif($estotal < 0){
                $res = $v["detalleven_cantidad"]-abs($estotal);
                if($res>0){
                    $band = true;
                    $existencia = $v["detalleven_cantidad"]-abs($estotal);
                    $resdisp = $existencia*$v["detalleven_precio"];
                    //$mitotal = $mitotal+$resdisp;
                }else{
                    $band = false;
                    $existencia = "0";
                    $resdisp = 0;
                    //$nohay = "style='background: #ed632d;'";
                }
            }
            if($band == true){
                $params = array(
                    'producto_id' => $v['producto_id'],
                    'venta_id' => $v['venta_id'],
                    'detalleven_codigo' => $v['detalleven_codigo'],
                    'detalleven_cantidad' => $existencia,
                    'detalleven_unidad' => $v['detalleven_unidad'],
                    'detalleven_costo' => $v['detalleven_costo'],
                    'detalleven_precio' => $v['detalleven_precio'],
                    'detalleven_subtotal' => $resdisp,
                    'detalleven_descuento' => $v['detalleven_descuento'],
                    'detalleven_total' => $resdisp,
                    'detalleven_caracteristicas' => $v['detalleven_caracteristicas'],
                    'detalleven_preferencia' => $v['detalleven_preferencia'],
                    'detalleven_comision' => $v['detalleven_comision'],
                    'detalleven_tipocambio' => $v['detalleven_tipocambio'],
                    'usuario_id' => $usuario_id,
                    'producto_nombre' => $v['producto_nombre'],
                    'producto_unidad' => $v['producto_unidad'],
                    'producto_marca' => $v['producto_marca'],
                    'categoria_id' => $v['categoria_id'],
                    'producto_codigobarra' => $v['producto_codigobarra'],
                    'existencia' => $v['existencia'],
                );
                $detalleven_id = $this->Venta_online_model->add_detalleventa_aux($params);
            }
        }
        echo json_encode($cliente);
        }else{                 
                show_404();
            }
    }

    function para_boton()
    {
        $venta_id = $this->input->post('venta_id');
        $sql = "UPDATE venta_online set venta_numeroventa=1 WHERE venta_id=".$venta_id." ";
        $this->db->query($sql);
        echo json_encode(true);
    }
    function entregar()
    {
        $venta_id = $this->input->post('venta_id');
        $sql = "UPDATE venta_online set venta_numeroventa=0, entrega_id=2 WHERE venta_id=".$venta_id." ";
        $this->db->query($sql);
        echo json_encode(true);
    }
    
}
