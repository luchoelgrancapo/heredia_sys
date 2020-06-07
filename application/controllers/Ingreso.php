<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Ingreso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ingreso_model');
         $this->load->model('Categoria_ingreso_model');
         $this->load->model('Empresa_model');
         $this->load->model('Usuario_model');
         $this->load->helper('numeros');
         $this->load->model('Parametro_model');
         $this->load->model('Dosificacion_model');
         $this->load->model('Factura_model');
         $this->load->library('ControlCode'); 
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        } 
        //*************** Control de sesiones *******************//           
    } 
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
     * Listing of ingresos
     */
    function index()
    {
         if($this->acceso(53)){
            $usuario_id = $this->session_data['usuario_id'];
            $data['rol'] = $this->session_data['rol'];
            $data['empresa'] = $this->Empresa_model->get_empresa(1);
        $data['ingresos'] = $this->Ingreso_model->get_all_ingresos();
        $data['categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
        $data['page_title'] = "Ingreso";
        $data['_view'] = 'ingreso/index';
        $this->load->view('layouts/main',$data);
            }
           
    }

     function buscarfecha()
    {
         
     
 
        $usuario_id = 1;

        if ($this->input->is_ajax_request()) {
            
            $filtro = $this->input->post('filtro');
            
           if ($filtro == null){
            $result = $this->Ingreso_model->get_all_ingresos($params);
            }
            else{
            $result = $this->Ingreso_model->fechaingreso($filtro);            
            }
           echo json_encode($result);
            
        }
        else
        {                 
                    show_404();
        }          
    }
    /*
     * Adding a new ingreso
     */
    function add()
    {   
         if($this->acceso(54)){
                $usuario_id = $this->session_data['usuario_id'];
        $this->load->library('form_validation');
      $this->form_validation->set_rules(
        'ingreso_nombre', 'ingreso_nombre',
        'required');
       
       if($this->form_validation->run())      
        {   
          $numrec = $this->Ingreso_model->numero();
           $numero = $numrec[0]['parametro_numrecing'] + 1;
           

            $params = array(
				'usuario_id' => $usuario_id,
				'ingreso_categoria' => $this->input->post('ingreso_categoria'),
                'ingreso_numero' => $numero,
                'ingreso_nombre' => $this->input->post('ingreso_nombre'),
				'ingreso_monto' => $this->input->post('ingreso_monto'),
				'ingreso_moneda' => $this->input->post('ingreso_moneda'),
				'ingreso_concepto' => $this->input->post('ingreso_concepto'),
				'ingreso_fecha' => $this->input->post('ingreso_fecha'),
				
            );

            $ingreso_id = $this->Ingreso_model->add_ingreso($params);
            $sql = "UPDATE parametros SET parametro_numrecing=parametro_numrecing+1 WHERE parametro_id = '1'"; 
            $this->db->query($sql);


            $facturado = $this->input->post('factura');
            if($facturado=="on"){ //si la venta es facturada

            $dosificacion = $this->Dosificacion_model->get_dosificacion_activa();

  //          if (sizeof($dosificacion)>0){ //si existe una dosificacion activa
                //$fecha = $this->input->post('ingreso_fecha');
                $estado_id = 1; 
                
                $venta_efectivo    = $this->input->post('ingreso_monto');
                $factura_fechaventa    = date("Y-m-d");
                $factura_fecha         = "date(now())";
                $factura_hora          = "time(now())";
                $factura_subtotal      = $this->input->post('ingreso_monto');
                $factura_nit           = $this->input->post('nit');
                $factura_razonsocial   = $this->input->post('razon');
                $factura_ice           = 0;
                $factura_exento        = 0;
                $factura_descuento     = 0;
                $factura_total         = $this->input->post('ingreso_monto');
                $factura_numero        = $dosificacion[0]['dosificacion_numfact']+1;
                $factura_autorizacion  = $dosificacion[0]['dosificacion_autorizacion'];
                $factura_llave         = $dosificacion[0]['dosificacion_llave'];
                $factura_fechalimite   = $dosificacion[0]['dosificacion_fechalimite'];
                $factura_codigocontrol = $this->codigo_control($factura_llave, $factura_autorizacion, $factura_numero, $factura_nit, $factura_fechaventa, $factura_total);
                $factura_leyenda1       = $dosificacion[0]['dosificacion_leyenda1'];
                $factura_leyenda2       = $dosificacion[0]['dosificacion_leyenda2'];
                $factura_nitemisor     = $dosificacion[0]['dosificacion_nitemisor'];
                $factura_sucursal      = $dosificacion[0]['dosificacion_sucursal'];
                $factura_sfc           = $dosificacion[0]['dosificacion_sfc'];
                $factura_actividad     = $dosificacion[0]['dosificacion_actividad'];

                $sql = "update dosificacion set dosificacion_numfact = ".$factura_numero;
                $this->Ingreso_model->ejecutar($sql);
                             
                $sql = "insert into factura(estado_id, ingreso_id, factura_fechaventa, 
                    factura_fecha, factura_hora, factura_subtotal, 
                    factura_ice, factura_exento, factura_descuento, factura_total, 
                    factura_numero, factura_autorizacion, factura_llave, 
                    factura_fechalimite, factura_codigocontrol, factura_leyenda1, factura_leyenda2,
                    factura_nit, factura_razonsocial, factura_nitemisor, factura_sucursal, factura_sfc, factura_actividad,
                    usuario_id, tipotrans_id, factura_efectivo, factura_cambio) value(".
                    $estado_id.",".$ingreso_id.",'".$factura_fechaventa."',".
                    $factura_fecha.",".$factura_hora.",".$factura_subtotal.",".
                    $factura_ice.",".$factura_exento.",".$factura_descuento.",".$factura_total.",".
                    $factura_numero.",".$factura_autorizacion.",'".$factura_llave."','".
                    $factura_fechalimite."','".$factura_codigocontrol."','".$factura_leyenda1."','".$factura_leyenda2."',".
                    $factura_nit.",'".$factura_razonsocial."','".$factura_nitemisor."','".
                    $factura_sucursal."','".$factura_sfc."','".$factura_actividad."',".
                    $usuario_id.",1,".$venta_efectivo.",0)";

                $factura_id = $this->Ingreso_model->ejecutar($sql);
               
            
            $producto_id = 0;
            $cantidad = 1;
            $detallefact_codigo = "-";
            $detallefact_cantidad = $cantidad;
            $detallefact_descripcion = $this->input->post('ingreso_concepto');
            $unidad = "";
            
            $precio = $this->input->post('ingreso_monto');
            $detallefact_precio = $precio;
            $detallefact_subtotal =  $precio;
            $detallefact_descuento = 0;
            $detallefact_total = $factura_subtotal;
            $detallefact_preferencia =  "";
            $detallefact_caracteristicas = "";
            
            $sql =  "insert into detalle_factura(
            producto_id,
            factura_id,
            detallefact_codigo,
            detallefact_unidad,
            detallefact_cantidad,            
            detallefact_descripcion,
            detallefact_precio,
            detallefact_subtotal,
            detallefact_descuento,
            detallefact_total,                
            detallefact_preferencia,
            detallefact_caracteristicas)
            
            value(
            ".$producto_id.",
            ".$factura_id.",
            '".$detallefact_codigo."',
            '".$unidad."',
            ".$detallefact_cantidad.",            
            '".$detallefact_descripcion."',
            ".$detallefact_precio.",
            ".$detallefact_subtotal.",
            ".$detallefact_descuento.",
            ".$detallefact_total.",                
            '".$detallefact_preferencia."',
            '".$detallefact_caracteristicas."')";

            $this->Ingreso_model->ejecutar($sql); 

            echo'<script type="text/javascript">
        window.open("../../factura/imprimir_factura_id/'.$factura_id.'/1", "_blank");
        </script>';         
       
        }
             
 echo'<script type="text/javascript">
        window.location.href="../index";
        </script>';           
        }
        else
        {
           $data['dosificacion'] = $this->Dosificacion_model->get_dosificacion_activa();
	       $this->load->model('Categoria_ingreso_model');
           $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
           $this->load->model('Parametro_model');
           $data['parametro'] = $this->Parametro_model->get_all_parametro();
           $data['page_title'] = "Ingreso";
           $data['_view'] = 'ingreso/add';
           $this->load->view('layouts/main',$data);
        }
            }
            
    }

    function codigo_control($dosificacion_llave, $dosificacion_autorizacion, $dosificacion_numfact, $nit,$fecha_trans, $monto)
    {

        //include 'ControlCode.php';

        $code = $this->controlcode->generate($dosificacion_autorizacion,//Numero de autorizacion
                                                   $dosificacion_numfact,//Numero de factura
                                                   $nit,//Número de Identificación Tributaria o Carnet de Identidad
                                                   str_replace('-','',$fecha_trans),//fecha de transaccion de la forma AAAAMMDD
                                                   $monto,//Monto de la transacción
                                                   $dosificacion_llave//Llave de dosificación
                        );        
         return $code;
    }  

    /*
     * Editing a ingreso
     */
    function edit($ingreso_id)
    {   
        
        if($this->acceso(55)){
                $usuario_id = $this->session_data['usuario_id'];
        // check if the ingreso exists before trying to edit it
        $data['ingreso'] = $this->Ingreso_model->get_ingreso($ingreso_id);
        
        if(isset($data['ingreso']['ingreso_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'usuario_id' => $usuario_id,
        'ingreso_categoria' => $this->input->post('ingreso_categoria'),
        'ingreso_numero' => $this->input->post('ingreso_numero'),
        'ingreso_nombre' => $this->input->post('ingreso_nombre'),
        'ingreso_monto' => $this->input->post('ingreso_monto'),
        'ingreso_moneda' => $this->input->post('ingreso_moneda'),
        'ingreso_concepto' => $this->input->post('ingreso_concepto'),
        //'ingreso_fecha' => $this->input->post('ingreso_fecha'),
				
                );

                $this->Ingreso_model->update_ingreso($ingreso_id,$params);            
                redirect('ingreso/index');
            }
            else
            {
				      $this->load->model('Categoria_ingreso_model');
               $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
               $data['page_title'] = "Ingreso";
                $data['_view'] = 'ingreso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ingreso you are trying to edit does not exist.');
    }
            
    }
    

public function pdf($ingreso_id){
    if($this->acceso(58)){
      $data['ingresos'] = $this->Ingreso_model->get_ingresos($ingreso_id);
       $data['empresa'] = $this->Empresa_model->get_empresa(1);
       $data['page_title'] = "Ingreso"; 
             $data['_view'] = 'ingreso/recibo';
            $this->load->view('layouts/main',$data);
       
            }
    }

public function boucher($ingreso_id){
            
    if($this->acceso(58)){

      $data['ingreso'] = $this->Ingreso_model->get_ingresos($ingreso_id);
       $data['empresa'] = $this->Empresa_model->get_empresa(1);
       $data['page_title'] = "Ingreso"; 
             $data['_view'] = 'ingreso/reciboboucher';
            $this->load->view('layouts/main',$data);
            }
            
    }
    /*
     * Deleting ingreso
     */
    function remove($ingreso_id)
    {
        if($this->acceso(56)){
        $ingreso = $this->Ingreso_model->get_ingreso($ingreso_id);

        // check if the ingreso exists before trying to delete it
        if(isset($ingreso['ingreso_id']))
        {
            $this->Ingreso_model->delete_ingreso($ingreso_id);
            redirect('ingreso/index');
        }
        else
            show_error('The ingreso you are trying to delete does not exist.');
        }
    }
    
    public function convertir()
    {
        $egreso_monto = trim($this->input->post('egreso_monto'));

        if (empty($egreso_monto)) {
            echo json_encode(array('leyenda' => 'Debe introducir una egreso_monto.'));
            
            return;
        }
        
        # verificar si el número no tiene caracteres no númericos, con excepción
        # del punto decimal
        $xegreso_monto = str_replace('.', '', $egreso_monto);
        
        if (FALSE === ctype_digit($xegreso_monto)){
            echo json_encode(array('leyenda' => 'La egreso_monto introducida no es válida.'));
            
            return;
        }

        # procedemos a covertir la egreso_monto en letras
        $this->load->helper('numeros');
        $response = array(
            'leyenda' => num_to_letras($egreso_monto)
            , 'egreso_monto' => $egreso_monto
            );  
        echo json_encode($response);
    }
}
