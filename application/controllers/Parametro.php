<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Parametro extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Parametro_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
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
     * Listing of parametros
     */
    function index()
    {
        if($this->acceso(125)) {
        $this->load->model('Categoria_producto_model');
        $data['all_categoria_producto'] = $this->Categoria_producto_model->get_all_categoria_producto();
        $data['parametros'] = $this->Parametro_model->get_all_parametro();
        $data['page_title'] = "Parametro";
        $data['_view'] = 'parametro/index';
        $this->load->view('layouts/main',$data);
    }
    }

    /*
     * Adding a new parametro
     */
    function add()
    {   
        if($this->acceso(125)) {
            $this->load->model('Categoria_producto_model');
            $data['all_categoria_producto'] = $this->Categoria_producto_model->get_all_categoria_producto();
        
        if(isset($_POST) && count($_POST) > 0)     
        {
            $params = array(
                    'parametro_numrecegr' => $this->input->post('parametro_numrecegr'),
                    'parametro_numrecing' => $this->input->post('parametro_numrecing'),
                    'parametro_copiasfact' => $this->input->post('parametro_copiasfact'),
                    'parametro_tipoimpresora' => $this->input->post('parametro_tipoimpresora'),
                    'parametro_numcuotas' => $this->input->post('parametro_numcuotas'),
                    'parametro_montomax' => $this->input->post('parametro_montomax'),
                    'parametro_diasgracia' => $this->input->post('parametro_diasgracia'),
                    'parametro_diapago' => $this->input->post('parametro_diapago'),
                    'parametro_periododias' => $this->input->post('parametro_periododias'),
                    'parametro_interes' => $this->input->post('parametro_interes'),
                    'parametro_diagnostico' => $this->input->post('parametro_diagnostico'),
                    'parametro_mostrarcategoria' => $this->input->post('parametro_mostrarcategoria'),
                    'parametro_solucion' => $this->input->post('parametro_solucion'),
                    'parametro_modoventas' => $this->input->post('parametro_modoventas'),
                    'parametro_imprimircomanda' => $this->input->post('parametro_imprimircomanda'),
                    'parametro_anchoboton' => $this->input->post('parametro_anchoboton'),
                    'parametro_altoboton' => $this->input->post('parametro_altoboton'),
                    //'parametro_tituldoc' => $this->input->post('parametro_tituldoc'),
                    'parametro_colorboton' => $this->input->post('parametro_colorboton'),
                    'parametro_anchoimagen' => $this->input->post('parametro_anchoimagen'),
                    'parametro_altoimagen' => $this->input->post('parametro_altoimagen'),
                    'parametro_formaimagen' => $this->input->post('parametro_formaimagen'),
                    'parametro_modulorestaurante' => $this->input->post('parametro_modulorestaurante'),
                    'parametro_permisocredito' => $this->input->post('parametro_permisocredito'),
                    'parametro_agruparitems' => $this->input->post('parametro_agruparitems'),
                    'parametro_diasvenc' => $this->input->post('parametro_diasvenc'),
                    'parametro_anchofactura' => $this->input->post('parametro_anchofactura'),
                    'parametro_altofactura' => $this->input->post('parametro_altofactura'),
                    'parametro_margenfactura' => $this->input->post('parametro_margenfactura'),
                    'parametro_imagenreal' => $this->input->post('parametro_imagenreal'),
                    'parametro_diasentrega' => $this->input->post('parametro_diasentrega'),
                    'parametro_segservicio' => $this->input->post('parametro_segservicio'),
                    'parametro_notaentrega' => $this->input->post('parametro_notaentrega'),
                    'parametro_apikey' => $this->input->post('parametro_apikey'),
                    'parametro_serviciofact' => $this->input->post('parametro_serviciofact'),
               
            );
            
            $parametro_id = $this->Parametro_model->add_parametro($params);
            redirect('parametro/index');
        }
        else
        {    
            $data['page_title'] = "Parametro";        
            $data['_view'] = 'parametro/add';
            $this->load->view('layouts/main',$data);
        }
    } 
    } 

    /*
     * Editing a parametro
     */
    function edit($parametro_id)
    {   
        if($this->acceso(125)) {
        // check if the parametro exists before trying to edit it
        $data['parametro'] = $this->Parametro_model->get_parametro($parametro_id);
        $this->load->model('Categoria_producto_model');
        $data['all_categoria_producto'] = $this->Categoria_producto_model->get_all_categoria_producto();
        
        if(isset($data['parametro']['parametro_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'parametro_numrecegr' => $this->input->post('parametro_numrecegr'),
                    'parametro_numrecing' => $this->input->post('parametro_numrecing'),
                    'parametro_copiasfact' => $this->input->post('parametro_copiasfact'),
                    'parametro_tipoimpresora' => $this->input->post('parametro_tipoimpresora'),
                    'parametro_numcuotas' => $this->input->post('parametro_numcuotas'),
                    'parametro_montomax' => $this->input->post('parametro_montomax'),
                    'parametro_diasgracia' => $this->input->post('parametro_diasgracia'),
                    'parametro_diapago' => $this->input->post('parametro_diapago'),
                    'parametro_periododias' => $this->input->post('parametro_periododias'),
                    'parametro_interes' => $this->input->post('parametro_interes'),
                    'parametro_diagnostico' => $this->input->post('parametro_diagnostico'),
                    'parametro_mostrarcategoria' => $this->input->post('parametro_mostrarcategoria'),
                    'parametro_solucion' => $this->input->post('parametro_solucion'),
                    'parametro_modoventas' => $this->input->post('parametro_modoventas'),
                    'parametro_imprimircomanda' => $this->input->post('parametro_imprimircomanda'),
                    'parametro_anchoboton' => $this->input->post('parametro_anchoboton'),
                    'parametro_altoboton' => $this->input->post('parametro_altoboton'),
                    'parametro_tituldoc' => $this->input->post('parametro_tituldoc'),
                    'parametro_colorboton' => $this->input->post('parametro_colorboton'),
                    'parametro_anchoimagen' => $this->input->post('parametro_anchoimagen'),
                    'parametro_altoimagen' => $this->input->post('parametro_altoimagen'),
                    'parametro_formaimagen' => $this->input->post('parametro_formaimagen'),
                    'parametro_modulorestaurante' => $this->input->post('parametro_modulorestaurante'),
                    'parametro_permisocredito' => $this->input->post('parametro_permisocredito'),
                    'parametro_agruparitems' => $this->input->post('parametro_agruparitems'),
                    'parametro_diasvenc' => $this->input->post('parametro_diasvenc'),
                    'parametro_anchofactura' => $this->input->post('parametro_anchofactura'),
                    'parametro_altofactura' => $this->input->post('parametro_altofactura'),
                    'parametro_margenfactura' => $this->input->post('parametro_margenfactura'),
                    'parametro_imagenreal' => $this->input->post('parametro_imagenreal'),
                    'parametro_diasentrega' => $this->input->post('parametro_diasentrega'),
                    'parametro_segservicio' => $this->input->post('parametro_segservicio'),
                    'parametro_notaentrega' => $this->input->post('parametro_notaentrega'),
                    'parametro_apikey' => $this->input->post('parametro_apikey'),
                    'parametro_serviciofact' => $this->input->post('parametro_serviciofact'),
                );

                $this->Parametro_model->update_parametro($parametro_id,$params);            
                redirect('parametro/index');
            }
            else
            {
                $data['page_title'] = "Parametro";
                $data['_view'] = 'parametro/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The parametro you are trying to edit does not exist.');
    } 
}
    /*
     * Deleting parametro
     */
    function remove($parametro_id)
    {
        $parametro = $this->Parametro_model->get_parametro($parametro_id);

        // check if the parametro exists before trying to delete it
        if(isset($parametro['parametro_id']))
        {
            $this->Parametro_model->delete_parametro($parametro_id);
            redirect('parametro/index');
        }
        else
            show_error('The parametro you are trying to delete does not exist.');
    }
    
}
