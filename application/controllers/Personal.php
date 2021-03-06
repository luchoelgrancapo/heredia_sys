<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Personal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Personal_model');
        $this->load->model('Contrato_model');
    } 

    /*
     * Listing of personal
     */
    function index()
    {
        $data['personal'] = $this->Personal_model->get_all_personal();
        $data['pprocesadas'] = $this->Personal_model->get_all_pprocesadas();
        
        $data['_view'] = 'personal/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new personal
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'personal_nombre' => $this->input->post('personal_nombre'),
				'personal_ci' => $this->input->post('personal_ci'),
				'personal_fechanac' => $this->input->post('personal_fechanac'),
				'personal_email' => $this->input->post('personal_email'),
				'personal_telefono' => $this->input->post('personal_telefono'),
				'personal_sexo' => $this->input->post('personal_sexo'),
				'personal_nacionalidad' => $this->input->post('personal_nacionalidad'),
				'personal_cargo' => $this->input->post('personal_cargo'),
				'personal_fechaing' => $this->input->post('personal_fechaing'),
				'personal_sueldo' => $this->input->post('personal_sueldo'),
				'personal_diaspagados' => $this->input->post('personal_diaspagados'),
				'personal_horaspagados' => $this->input->post('personal_horaspagados'),
            );
            $personal_id = $this->Personal_model->add_personal($params);
            $params1 = array(
                'estado_id' => 1,
                'personal_id' => $personal_id,
                'contrato_cargo' => $this->input->post('personal_cargo'),
                'contrato_fechaing' => $this->input->post('personal_fechaing'),
                'contrato_sueldo' => $this->input->post('personal_sueldo'),
                'contrato_diaspagados' => $this->input->post('personal_diaspagados'),
                'contrato_horaspagados' => $this->input->post('personal_horaspagados'),
            );
            
            $contrato_id = $this->Contrato_model->add_contrato($params1);
            
            

            redirect('personal/index');
        }
        else
        {            
            $data['_view'] = 'personal/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a personal
     */
    function edit($personal_id)
    {   
        // check if the personal exists before trying to edit it
        $data['personal'] = $this->Personal_model->get_personal($personal_id);
        
        if(isset($data['personal']['personal_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'personal_nombre' => $this->input->post('personal_nombre'),
					'personal_ci' => $this->input->post('personal_ci'),
					'personal_fechanac' => $this->input->post('personal_fechanac'),
					'personal_email' => $this->input->post('personal_email'),
					'personal_telefono' => $this->input->post('personal_telefono'),
					'personal_sexo' => $this->input->post('personal_sexo'),
					'personal_nacionalidad' => $this->input->post('personal_nacionalidad'),
                );

                $this->Personal_model->update_personal($personal_id,$params);            
                redirect('personal/index');
            }
            else
            {
                $data['_view'] = 'personal/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The personal you are trying to edit does not exist.');
    } 

    /*
     * Deleting personal
     */
    function remove($personal_id)
    {
        $personal = $this->Personal_model->get_personal($personal_id);

        // check if the personal exists before trying to delete it
        if(isset($personal['personal_id']))
        {
            $this->Personal_model->delete_personal($personal_id);
            redirect('personal/index');
        }
        else
            show_error('The personal you are trying to delete does not exist.');
    }

    function nuevo_contrarto($personal_id)
    {

        $params = array(
                
                'personal_cargo' => $this->input->post('personal_cargo'),
                'personal_fechaing' => $this->input->post('personal_fechaing'),
                'personal_sueldo' => $this->input->post('personal_sueldo'),
                'personal_diaspagados' => $this->input->post('personal_diaspagados'),
                'personal_horaspagados' => $this->input->post('personal_horaspagados'),
            );
        $this->Personal_model->update_personal($personal_id,$params);            
        $sql = "UPDATE contrato set estado_id=2 WHERE personal_id=".$personal_id." ";

        $this->db->query($sql);        
        $params1 = array(
                'estado_id' => 1,
                'personal_id' => $personal_id,
                'contrato_cargo' => $this->input->post('personal_cargo'),
                'contrato_fechaing' => $this->input->post('personal_fechaing'),
                'contrato_sueldo' => $this->input->post('personal_sueldo'),
                'contrato_diaspagados' => $this->input->post('personal_diaspagados'),
                'contrato_horaspagados' => $this->input->post('personal_horaspagados'),
            );
            
        $contrato_id = $this->Contrato_model->add_contrato($params1);
        redirect('personal/index');
    }

    function inhabilitar($personal_id)
    {
       $sql = "UPDATE contrato set estado_id=2 WHERE personal_id=".$personal_id." ";

        $this->db->query($sql);
        redirect('personal/index');
    }
    
}
