<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_cliente_model');
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
     * Listing of tipo_cliente
     */
    function index()
    {
        if($this->acceso(132)){
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tipo_cliente/index?');
        $config['total_rows'] = $this->Tipo_cliente_model->get_all_tipo_cliente_count();
        $this->pagination->initialize($config);

        $data['tipo_cliente'] = $this->Tipo_cliente_model->get_all_tipo_cliente($params);
        $data['page_title'] = "Tipo Cliente";
        $data['_view'] = 'tipo_cliente/index';
        $this->load->view('layouts/main',$data);
    }
    }

    /*
     * Adding a new tipo_cliente
     */
    function add()
    {   
        if($this->acceso(132)){
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tipocliente_descripcion','Tipocliente Descripcion','required');
		$this->form_validation->set_rules('tipocliente_descripcion','tipocliente_descripcion','is_unique[tipo_cliente.tipocliente_descripcion]', array('is_unique' => 'Este Tipo ya fue Registrado'));
		if($this->form_validation->run())     
        {   
            $params = array(
				'tipocliente_descripcion' => $this->input->post('tipocliente_descripcion'),
				'tipocliente_porcdesc' => $this->input->post('tipocliente_porcdesc'),
				'tipocliente_montodesc' => $this->input->post('tipocliente_montodesc'),
            );
            
            $tipo_cliente_id = $this->Tipo_cliente_model->add_tipo_cliente($params);
            redirect('tipo_cliente/index');
        }
        else
        {    
            $data['page_title'] = "Tipo Cliente";        
            $data['_view'] = 'tipo_cliente/add';
            $this->load->view('layouts/main',$data);
        }
    }
    }  

    /*
     * Editing a tipo_cliente
     */
    function edit($tipocliente_id)
    {   
        if($this->acceso(132)){
        // check if the tipo_cliente exists before trying to edit it
        $data['tipo_cliente'] = $this->Tipo_cliente_model->get_tipo_cliente($tipocliente_id);
        
        if(isset($data['tipo_cliente']['tipocliente_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tipocliente_descripcion','Tipocliente Descripcion','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tipocliente_descripcion' => $this->input->post('tipocliente_descripcion'),
					'tipocliente_porcdesc' => $this->input->post('tipocliente_porcdesc'),
					'tipocliente_montodesc' => $this->input->post('tipocliente_montodesc'),
                );

                $this->Tipo_cliente_model->update_tipo_cliente($tipocliente_id,$params);            
                redirect('tipo_cliente/index');
            }
            else
            {
                $data['page_title'] = "Tipo Cliente";
                $data['_view'] = 'tipo_cliente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipo_cliente you are trying to edit does not exist.');
    }
    } 

    /*
     * Deleting tipo_cliente
     */
    function remove($tipocliente_id)
    {
        if($this->acceso(132)){
        $tipo_cliente = $this->Tipo_cliente_model->get_tipo_cliente($tipocliente_id);

        // check if the tipo_cliente exists before trying to delete it
        if(isset($tipo_cliente['tipocliente_id']))
        {
            $this->Tipo_cliente_model->delete_tipo_cliente($tipocliente_id);
            redirect('tipo_cliente/index');
        }
        else
            show_error('The tipo_cliente you are trying to delete does not exist.');
    }
}

 function nuevo()
    {
        if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $parametro = $this->input->post('parametro');
                if($parametro != ""){
                    $params = array(
                    'tipocliente_descripcion' => $parametro,
                    'tipocliente_porcdesc' => 0,
                    'tipocliente_montodesc' => 0,

                    );
                    $categoria_id = $this->Tipo_cliente_model->add_tipo_cliente($params);
                    $datos = $this->Tipo_cliente_model->get_tipo_cliente($categoria_id);
                    echo json_encode($datos);
                }else{
                    echo json_encode(null);
                }
            }
            else
            {                 
                show_404();
            }
        }
    }
    
}
