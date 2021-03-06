<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Forma_pago extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Forma_pago_model');
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
     * Listing of forma_pago
     */
    function index()
    {
        if($this->acceso(123)){
            $data['page_title'] = "Forma Pago";
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('forma_pago/index?');
        $config['total_rows'] = $this->Forma_pago_model->get_all_forma_pago_count();
        $this->pagination->initialize($config);

        $data['forma_pago'] = $this->Forma_pago_model->get_all_forma_pago($params);
        
        $data['_view'] = 'forma_pago/index';
        $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new forma_pago
     */
    function add()
    {
        if($this->acceso(123)){
            $data['page_title'] = "Forma Pago";
        $this->load->library('form_validation');

		$this->form_validation->set_rules('forma_nombre','Forma Nombre','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'forma_nombre' => $this->input->post('forma_nombre'),
            );
            
            $forma_pago_id = $this->Forma_pago_model->add_forma_pago($params);
            redirect('forma_pago/index');
        }
        else
        {            
            $data['_view'] = 'forma_pago/add';
            $this->load->view('layouts/main',$data);
        }
        }
    }  

    /*
     * Editing a forma_pago
     */
    function edit($forma_id)
    {
        if($this->acceso(123)){
            $data['page_title'] = "Forma Pago";
        // check if the forma_pago exists before trying to edit it
        $data['forma_pago'] = $this->Forma_pago_model->get_forma_pago($forma_id);
        
        if(isset($data['forma_pago']['forma_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('forma_nombre','Forma Nombre','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'forma_nombre' => $this->input->post('forma_nombre'),
                );

                $this->Forma_pago_model->update_forma_pago($forma_id,$params);            
                redirect('forma_pago/index');
            }
            else
            {
                $data['_view'] = 'forma_pago/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The forma_pago you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting forma_pago
     */
    function remove($forma_id)
    {
        if($this->acceso(123)){
        $forma_pago = $this->Forma_pago_model->get_forma_pago($forma_id);

        // check if the forma_pago exists before trying to delete it
        if(isset($forma_pago['forma_id']))
        {
            $this->Forma_pago_model->delete_forma_pago($forma_id);
            redirect('forma_pago/index');
        }
        else
            show_error('The forma_pago you are trying to delete does not exist.');
        }
    }
    
}
