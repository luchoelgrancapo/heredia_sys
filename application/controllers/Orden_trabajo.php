<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Orden_trabajo extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Orden_trabajo_model');
        $this->load->model('Cliente_model');
        $this->load->model('Venta_model');
        $this->load->helper('numeros');
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
     * Listing of Orden_trabajo
     */
    function index()
    {
        if($this->acceso(166)){
            $data['page_title'] = "Orden de Trabajo";
            $data['rol'] = $this->session_data['rol'];
            //$data['orden_trabajo'] = $this->Orden_trabajo_model->get_all_orden_trabajo_100();
            $this->load->model('Empresa_model');
            $data['empresa'] = $this->Empresa_model->get_empresa(1);
            $data['_view'] = 'orden_trabajo/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function buscar_ot()
    {
       if ($this->input->is_ajax_request()) {  
        $parametro = $this->input->post('parametro');
        $datos = $this->Orden_trabajo_model->buscar_orden_trabajo($parametro);
       if(isset($datos)){
                        echo json_encode($datos);
                    }else echo json_encode(null);
    }
        else
        {                 
                    show_404();
        }          
    }

    
    /*
     * Adding a new Orden_trabajo
     */
    function nuevo()
    {
        if($this->acceso(167)){
            $data['page_title'] = "Orden de Trabajo";
            $data['usuario_id'] = $this->session_data['usuario_id'];
            $data['tipo_orden'] = $this->Orden_trabajo_model->get_all_tipo_orden(); 

            //$data['Orden_trabajo_id'] = $orden_trabajo; 
            //$data['detalle_orden'] = $this->Orden_trabajo_model->get_detalle_orden_trabajo($usuario_id);     
            $data['_view'] = 'orden_trabajo/add';
            $this->load->view('layouts/main',$data);
       
        }
    }

    function add()
    {
        if($this->acceso(167)){
            
        $usuario_id = $this->session_data['usuario_id'];
        $data['usuario_id'] = $this->session_data['usuario_id'];
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $cliente_id = $this->input->post('cliente_id');
        $nombre = $this->input->post('cliente_nombre');
        $nit = $this->input->post('cliente_nit');
        $telefono = $this->input->post('cliente_telefono');
        $codigo = $this->input->post('cliente_codigo');
        if ($cliente_id==''  || $cliente_id==0) {
        $params = array(
                'cliente_nombre' => $nombre,
                'cliente_razon' => $nombre,
                'cliente_nit' => $nit,
                'cliente_ci' => $nit,
                'cliente_telefono' => $telefono,
                'cliente_codigo' => $codigo,
                'cliente_direccion' => '',
                'cliente_celular' => '',
                'cliente_departamento' => '',
                'cliente_nombrenegocio' => '',
                'tipocliente_id' => 1,
                'categoriaclie_id' => 1,
                'usuario_id' => $usuario_id,
                'estado_id' => 1,
                'zona_id' => 0,
            );
            
        $cliente = $this->Cliente_model->add_cliente($params);
        
        }else{
        $cliente=$cliente_id;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('numero','Orden Numero','required');
           if($this->form_validation->run())     
        {   
            $params = array(
                'orden_numero' => $this->input->post('numero'),
                'orden_fecha' => $fecha,
                'orden_hora' => $hora,
                'orden_fechaentrega' => $this->input->post('orden_trabajo_fecha'),
                'orden_total' => $this->input->post('total'),
                'orden_acuenta' => $this->input->post('cuenta'),
                'orden_saldo' => $this->input->post('saldo'),
                'orden_observacion' => $this->input->post('nota'),
                'cliente_id' => $cliente,
                'usuario_id' => $usuario_id,
                'estado_id' => 17,
            );
            
             $orden_id = $this->Orden_trabajo_model->add_orden_trabajo($params);

            $actualizar = "UPDATE detalle_orden set orden_id=".$orden_id." where usuario_id=".$usuario_id." and orden_id is null ";
            $this->db->query($actualizar);
            redirect('orden_trabajo/index');
        }
        else
        {            
            $data['_view'] = 'orden_trabajo/add';
            $this->load->view('layouts/main',$data);
        }
       
        }
    }

    function edit($orden_trabajo)
    {
        if($this->acceso(167)){
            
        $usuario_id = $this->session_data['usuario_id'];
        $data['usuario_id'] = $this->session_data['usuario_id'];
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('numero','Orden Numero','required');
           if($this->form_validation->run())     
        {   
            $params = array(
                'orden_numero' => $this->input->post('numero'),
                'orden_fechaentrega' => $this->input->post('orden_trabajo_fecha'),
                'orden_total' => $this->input->post('total'),
                'orden_acuenta' => $this->input->post('cuenta'),
                'orden_saldo' => $this->input->post('saldo'),
                'orden_observacion' => $this->input->post('nota'),
                'cliente_id' => $this->input->post('cliente_id'),
                'usuario_id' => $usuario_id,
            );
            
             $orden_id = $this->Orden_trabajo_model->update_orden_trabajo($orden_trabajo,$params);

            redirect('orden_trabajo/index');
        }
        else
        {            
            $data['_view'] = 'orden_trabajo/edit';
            $this->load->view('layouts/main',$data);
        }
       
        }
    }

    function seleccionar_cliente($cliente_id){
        
               //**************** inicio contenido ***************       

               $usuario_id = $this->session_data['usuario_id'];
               
               
               $sql =  "select * from cliente where ".
                       " cliente_id = ".$cliente_id;
               
               $resultado = $this->Venta_model->consultar($sql);
               echo json_encode($resultado);


               //**************** fin contenido ***************
                                       
                                        
        
    }

    function editar($orden_trabajo)
    {
        if($this->acceso(167)){
            $data['page_title'] = "Orden de Trabajo";
            $data['usuario_id'] = $this->session_data['usuario_id'];
            $data['tipo_orden'] = $this->Orden_trabajo_model->get_all_tipo_orden();
            $data['orden_trabajo'] = $this->Orden_trabajo_model->la_orden_trabajo($orden_trabajo);     
            $data['_view'] = 'orden_trabajo/edit';
            $this->load->view('layouts/main',$data);
       
        }
    }

    function ordenrecibo($orden_trabajo)
    {
        if($this->acceso(166)){
            $data['page_title'] = "Orden de Trabajo";
            $this->load->model('Empresa_model');
            $data['empresa'] = $this->Empresa_model->get_empresa(1);
            $data['detalle_orden_trabajo'] = $this->Orden_trabajo_model->detalle_ordentrabajo($orden_trabajo);
            $data['Orden_trabajo'] = $this->Orden_trabajo_model->la_orden_trabajo($orden_trabajo);     
            $data['_view'] = 'orden_trabajo/recibo';
            $this->load->view('layouts/main',$data);
       
        }
    }

    function ordendoc($orden_trabajo)
    {
        if($this->acceso(166)){
            $data['page_title'] = "Orden de Trabajo";
            $this->load->model('Empresa_model');
            $data['empresa'] = $this->Empresa_model->get_empresa(1);
            $data['detalle_orden_trabajo'] = $this->Orden_trabajo_model->detalle_ordentrabajo($orden_trabajo);
            $data['Orden_trabajo'] = $this->Orden_trabajo_model->la_orden_trabajo($orden_trabajo);     
            $data['_view'] = 'orden_trabajo/documento';
            $this->load->view('layouts/main',$data);
       
        }
    }
    function recibo($orden_trabajo)
    {
        if($this->acceso(166)){
            $data['page_title'] = "Orden de Trabajo";
            $usuario_id = $this->session_data['usuario_id'];
            $data['Orden_trabajo_id'] = $orden_trabajo;
            $this->load->model('Empresa_model');
            $data['empresa'] = $this->Empresa_model->get_empresa(1);
            $this->load->model('Detalle_Orden_trabajo_model');
            $data['detalle_Orden_trabajo'] = $this->Orden_trabajo_model->get_detalle_orden_trabajo($orden_trabajo);
            $data['usuario'] = $this->Orden_trabajo_model->get_Orden_trabajo_usuario($usuario_id);  
            $data['Orden_trabajo'] = $this->Orden_trabajo_model->get_Orden_trabajo($orden_trabajo);     
            $data['_view'] = 'Orden_trabajo/recibo';
            $this->load->view('layouts/main',$data);
       
        }
    }

    function buscarcliente()
    {
        if($this->acceso(166)){
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $nit = $this->input->post('nit');                    
                    $datos = $this->Orden_trabajo_model->buscar_cliente($nit);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
        }
                
               
    }
    function detalle_orden_trabajo()
    {
        if ($this->input->is_ajax_request()) {  
            $usuario_id = $this->session_data['usuario_id'];
        
        $datos = $this->Orden_trabajo_model->get_detalle_orden_trabajo($usuario_id);
     if(isset($datos)){
                        echo json_encode($datos);
                    }else echo json_encode(null);
    }
        else
        {                 
                    show_404();
        }          
     
    
    }
    function edit_detalle_orden()
    {
        if ($this->input->is_ajax_request()) {  
            $orden_id = $this->input->post('orden_id');
        
        $datos = $this->Orden_trabajo_model->detalle_ordentrabajo($orden_id);
     if(isset($datos)){
                        echo json_encode($datos);
                    }else echo json_encode(null);
    }
        else
        {                 
                    show_404();
        }          
     
    
    }    
    function insertarproducto()
    {
        if ($this->input->is_ajax_request()) {
        $usuario_id = $this->input->post('usuario_id');
        
        $producto_id = $this->input->post('producto_id');
        $cantidad = $this->input->post('cantidad'); 
        $ancho = $this->input->post('ancho'); 
        $largo = $this->input->post('largo');
        $producto_precio = $this->input->post('producto_precio');
        $factor = $this->input->post('producto_factor');
        $total = $this->input->post('total');
        $tipo_orden = $this->input->post('tipo_orden');
        $nuevacan = $cantidad * $factor;
        //$nuevoprec = $

       $sql = "INSERT into detalle_orden(
                
                producto_id,
                usuario_id,
                tipoorden_id,
                detalleorden_cantidad,
                detalleorden_ancho,
                detalleorden_largo,
                detalleorden_total,
                detalleorden_precio,
                detalleorden_preciototal
                            
                )
                (
                SELECT
                
                producto_id,
                ".$usuario_id.",
                ".$tipo_orden.",
                ".$cantidad.",
                ".$ancho.",
                ".$largo.",
                ".$total." * ".$nuevacan.",
                ".$producto_precio.",
                (".$nuevacan." * ".$producto_precio." * ".$total.")
                
                from producto where producto_id = ".$producto_id."
                )";
              
        $this->Orden_trabajo_model->ejecutar($sql);
        $datos = $this->Orden_trabajo_model->get_detalle_orden_trabajo($usuario_id);
     if(isset($datos)){
                        echo json_encode($datos);
                    }else echo json_encode(null);
    }
        else
        {                 
                    show_404();
        }          
    }
     function agregarproducto()
    {
        if ($this->input->is_ajax_request()) {
        $orden_id = $this->input->post('orden_id');
        $usuario_id = $this->session_data['usuario_id'];
        $producto_id = $this->input->post('producto_id');
        $cantidad = $this->input->post('cantidad'); 
        $ancho = $this->input->post('ancho'); 
        $largo = $this->input->post('largo');
        $producto_precio = $this->input->post('producto_precio');
        $factor = $this->input->post('producto_factor');
        $total = $this->input->post('total');
        $tipo_orden = $this->input->post('tipo_orden');
        $nuevacan = $cantidad * $factor;
        //$nuevoprec = $

       $sql = "INSERT into detalle_orden(
                
                producto_id,
                orden_id,
                usuario_id,
                tipoorden_id,
                detalleorden_cantidad,
                detalleorden_ancho,
                detalleorden_largo,
                detalleorden_total,
                detalleorden_precio,
                detalleorden_preciototal
                            
                )
                (
                SELECT
                
                producto_id,
                ".$orden_id.",
                ".$usuario_id.",
                ".$tipo_orden.",
                ".$cantidad.",
                ".$ancho.",
                ".$largo.",
                ".$total." * ".$nuevacan.",
                ".$producto_precio.",
                (".$nuevacan." * ".$producto_precio." * ".$total.")
                
                from producto where producto_id = ".$producto_id."
                )";
              
        $this->Orden_trabajo_model->ejecutar($sql);
        $datos = $this->Orden_trabajo_model->get_detalle_orden_trabajo($usuario_id);
     if(isset($datos)){
                        echo json_encode($datos);
                    }else echo json_encode(null);
    }
        else
        {                 
                    show_404();
        }          
    }

    function updateDetalleorden()
    {
        if ($this->input->is_ajax_request()) {
        $usuario_id = $this->input->post('usuario_id');
        
        $detalleorden_id = $this->input->post('detalleorden_id');
       // $descripcion = $this->input->post('descripcion');
        
        $cantidad = $this->input->post('cantidad'); 
         
        $producto_precio = $this->input->post('precio');
        $ancho = $this->input->post('ancho');
        $largo = $this->input->post('largo');
        $total = $ancho*$largo/1000000;
        $totalme = round($cantidad*$ancho*$largo/1000000, 2);
        
       
       
       $cot = "UPDATE detalle_orden
                SET
                
                detalleorden_precio = ".$producto_precio.",
                detalleorden_cantidad = ".$cantidad.",
                detalleorden_ancho = ".$ancho.",
                detalleorden_largo = ".$largo.",
                detalleorden_total = ".$totalme.",
                detalleorden_preciototal = (".$totalme." * ".$producto_precio.")
                        
                WHERE detalleorden_id = ".$detalleorden_id."
            ";

    
        $this->Orden_trabajo_model->ejecutar($cot);
       }
         
    }
    function actualizaDetalleorden()
    {
        if ($this->input->is_ajax_request()) {
        $orden_id = $this->input->post('orden_id');
        
        $detalleorden_id = $this->input->post('detalleorden_id');
       // $descripcion = $this->input->post('descripcion');
        
        $cantidad = $this->input->post('cantidad'); 
         
        $producto_precio = $this->input->post('precio');
        $ancho = $this->input->post('ancho');
        $largo = $this->input->post('largo');
        $total = $ancho*$largo/1000000;
        $totalme = round($cantidad*$ancho*$largo/1000000, 2);
       
       
       $cot = "UPDATE detalle_orden
                SET
                
                detalleorden_precio = ".$producto_precio.",
                detalleorden_cantidad = ".$cantidad.",
                detalleorden_ancho = ".$ancho.",
                detalleorden_largo = ".$largo.",
                detalleorden_total = ".$totalme.",
                detalleorden_preciototal = (".$totalme." * ".$producto_precio.")
                        
                WHERE detalleorden_id = ".$detalleorden_id."
            ";

    
        $this->Orden_trabajo_model->ejecutar($cot);
       }
         
    }

    function quitar($detalleorden_id)
    {
        if($this->acceso(166)){
        //**************** inicio contenido ***************        
        
        $sql = "delete from detalle_orden where detalleorden_id = ".$detalleorden_id;
        $this->Orden_trabajo_model->ejecutar($sql);
        
        return true;
                    
        //**************** fin contenido ***************
        }
    }
    /*
     * Editing a Orden_trabajo
     */
    function editaaa($orden_trabajo)
    {
        if($this->acceso(167)){
            $data['page_title'] = "Orden de Trabajo";
            $usuario_id = $this->session_data['usuario_id'];
            $data['Orden_trabajo'] = $this->Orden_trabajo_model->get_Orden_trabajo($orden_trabajo);

            if(isset($data['Orden_trabajo']['Orden_trabajo_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $fechacot = $this->input->post('Orden_trabajo_fecha');
                    $fecha = $this->Orden_trabajo_model->normalize_date($fechacot);

                    $params = array(
                                            'Orden_trabajo_fecha' => $fecha,
                                            'Orden_trabajo_validez' => $this->input->post('Orden_trabajo_validez'),
                                            'Orden_trabajo_formapago' => $this->input->post('Orden_trabajo_formapago'),
                                            'Orden_trabajo_tiempoentrega' => $this->input->post('Orden_trabajo_tiempoentrega'),
                                            'usuario_id' => $usuario_id,
                                            'Orden_trabajo_total' => $this->input->post('Orden_trabajo_total'),
                        'Orden_trabajo_glosa' => $this->input->post('Orden_trabajo_glosa'),
                        'Orden_trabajo_cliente' => $this->input->post('Orden_trabajo_cliente'),
                        'Orden_trabajo_lugarentrega' => $this->input->post('Orden_trabajo_lugarentrega'),
                        'Orden_trabajo_chequenombre' => $this->input->post('Orden_trabajo_chequenombre'),
                    );



                    $this->Orden_trabajo_model->update_Orden_trabajo($orden_trabajo,$params);            
                     redirect('Orden_trabajo/add/'.$orden_trabajo);
                }
                else
                {
                    $data['_view'] = 'Orden_trabajo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The Orden_trabajo you are trying to edit does not exist.');
            }
    }

    function finalizar($orden_trabajo)
    {   
        if($this->acceso(166)){
            $data['page_title'] = "Orden de Trabajo";
            $usuario_id = $this->session_data['usuario_id'];
            // check if the Orden_trabajo exists before trying to edit it
            $data['Orden_trabajo'] = $this->Orden_trabajo_model->get_Orden_trabajo($orden_trabajo);

            if(isset($data['Orden_trabajo']['Orden_trabajo_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $fechacot = $this->input->post('Orden_trabajo_fecha');
                    $fecha = $this->Orden_trabajo_model->normalize_date($fechacot);

                    $params = array(
                        'Orden_trabajo_fecha' => $fecha,
                        'Orden_trabajo_validez' => $this->input->post('Orden_trabajo_validez'),
                        'Orden_trabajo_formapago' => $this->input->post('Orden_trabajo_formapago'),
                        'Orden_trabajo_tiempoentrega' => $this->input->post('Orden_trabajo_tiempoentrega'),
                        'usuario_id' => $usuario_id,
                        'Orden_trabajo_total' => $this->input->post('Orden_trabajo_total'),
                        'Orden_trabajo_glosa' => $this->input->post('Orden_trabajo_glosa'),
                        'Orden_trabajo_cliente' => $this->input->post('Orden_trabajo_cliente'),
                        'Orden_trabajo_lugarentrega' => $this->input->post('Orden_trabajo_lugarentrega'),
                        'Orden_trabajo_chequenombre' => $this->input->post('Orden_trabajo_chequenombre')
                    );



                    $this->Orden_trabajo_model->update_Orden_trabajo($orden_trabajo,$params);            
                     redirect('Orden_trabajo/index');
                }
                else
                {
                    $data['_view'] = 'Orden_trabajo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The Orden_trabajo you are trying to edit does not exist.');
        }
    }
    /*
     * Deleting Orden_trabajo
     */
    function remove($orden_trabajo)
    {
        if($this->acceso(170)){
            $Orden_trabajo = $this->Orden_trabajo_model->get_Orden_trabajo($orden_trabajo);

            // check if the Orden_trabajo exists before trying to delete it
            if(isset($Orden_trabajo['Orden_trabajo_id']))
            {
                $this->Orden_trabajo_model->delete_Orden_trabajo($orden_trabajo);
                redirect('Orden_trabajo/index');
            }
            else
                show_error('The Orden_trabajo you are trying to delete does not exist.');
        }
    }

    function anular($orden_trabajo)
    {
        if($this->acceso(170)){
          $orden= "UPDATE orden_trabajo set estado_id=27, orden_total=0, orden_acuenta=0, orden_saldo=0 WHERE orden_id=".$orden_trabajo." ";
          $this->Orden_trabajo_model->ejecutar($orden);
          $detalle= "UPDATE detalle_orden set detalleorden_total=0,detalleorden_cantidad=0,detalleorden_ancho=0,detalleorden_largo=0,detalleorden_precio=0,detalleorden_preciototal=0 WHERE orden_id=".$orden_trabajo." ";
          $this->Orden_trabajo_model->ejecutar($detalle);
          redirect('orden_trabajo/index');
    }
    }

    /*
     * Ordenes de trabajo pendientes
     */
    function ordenes_pendientes()
    {
        if($this->acceso(166)){
            
            $condicion = $this->input->post('filtro');
            
            $resultado = $this->Orden_trabajo_model->ordenes_pendientes($condicion);
            
            echo json_encode($resultado);
            
        }
    }
    

    /*
     * Pasar un pedido a ventas
     */
    function pasaraventas($orden_id,$cliente_id)
    {
        if($this->acceso(168)) {
        //**************** inicio contenido ***************    
        $usuario_id = $this->session_data['usuario_id'];
                
        $sql = "delete from detalle_venta_aux where usuario_id = ".$usuario_id;
        $this->Orden_trabajo_model->ejecutar($sql);
        
        $sql = "insert into detalle_venta_aux( 
            producto_id,
            venta_id,
            moneda_id,
            detalleven_id,
            detalleven_codigo,
            detalleven_cantidad,
            detalleven_unidad,
            detalleven_costo,
            detalleven_precio,
            detalleven_subtotal,
            detalleven_descuento,
            detalleven_total,
            detalleven_caracteristicas,
            detalleven_preferencia,
            detalleven_comision,
            detalleven_tipocambio,
            usuario_id,
            existencia,
            producto_nombre,
            producto_unidad,
            producto_marca,
            categoria_id,
            producto_codigobarra,
            detalleven_envase,
            detalleven_nombreenvase,
            detalleven_costoenvase,
            detalleven_precioenvase,
            detalleven_cantidadenvase,
            detalleven_garantiaenvase,
            detalleven_devueltoenvase,
            detalleven_fechadevolucion,
            detalleven_horadevolucion,
            detalleven_montodevolucion,
            detalleven_prestamoenvase
          )
          (
          select 
          d.producto_id, 
          0 as venta_id,
          1 as moneda_id,
          0 as detalleven_id,
          p.producto_codigo,
          sum(d.detalleorden_total) as detalleven_cantidad, 
          p.producto_unidad as detalleven_unidad,
          p.producto_costo as detalleven_costo,
          sum(d.detalleorden_preciototal)/sum(d.detalleorden_total) as detalleven_precio,
          sum(d.detalleorden_preciototal) as detalleven_subtotal,
          0 as detalleven_descuento,
          sum(d.detalleorden_preciototal) as detalleven_total,
          '' as detalleven_caracteristicas,
          '' as detalleven_preferencias,
          p.producto_comision as detalleven_comision,
          1 as detalleven_tipocambio,
          ".$usuario_id." as usuario_id,
          p.existencia,
          p.producto_nombre,
          p.producto_unidad,
          p.producto_marca,
          p.categoria_id,
          p.producto_codigobarra,
          p.producto_envase,
          p.producto_nombreenvase,
          p.producto_costoenvase,
          p.producto_precioenvase,
          0 as detalleven_cantidadenvase,
          0 as detalleven_garantiaenvase,
          0 as detalleven_devueltoenvase,
          null as detalleven_fechadevolucion,
          null as detalleven_horadevolucion,
          0 as detalleven_montodevolucion,
          0 as detalleven_prestamosenvase

          from orden_trabajo o, detalle_orden d, inventario p
          where 

          o.orden_id = d.orden_id and
          d.producto_id = p.producto_id and
          o.orden_id = ".$orden_id."
          group by d.producto_id
          );";
        
        $this->Orden_trabajo_model->ejecutar($sql);
        return true;
        		
        //**************** fin contenido ***************
        }
        			         
    }
    
    
}
