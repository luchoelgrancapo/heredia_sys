<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Detalle_pedido extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detalle_pedido_model');
    } 

    /*
     * Listing of detalle_pedido
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('detalle_pedido/index?');
        $config['total_rows'] = $this->Detalle_pedido_model->get_all_detalle_pedido_count();
        $this->pagination->initialize($config);

        $data['detalle_pedido'] = $this->Detalle_pedido_model->get_all_detalle_pedido($params);
        
        $data['_view'] = 'detalle_pedido/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new detalle_pedido
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'pedido_id' => $this->input->post('pedido_id'),
				'producto_id' => $this->input->post('producto_id'),
				'detalleped_codigo' => $this->input->post('detalleped_codigo'),
				'detalleped_nombre' => $this->input->post('detalleped_nombre'),
				'detalleped_unidad' => $this->input->post('detalleped_unidad'),
				'detalleped_cantidad' => $this->input->post('detalleped_cantidad'),
				'detalleped_subtotal' => $this->input->post('detalleped_subtotal'),
				'detalleped_descuento' => $this->input->post('detalleped_descuento'),
				'detalleped_total' => $this->input->post('detalleped_total'),
				'detalleped_preferencia' => $this->input->post('detalleped_preferencia'),
            );
            
            $detalle_pedido_id = $this->Detalle_pedido_model->add_detalle_pedido($params);
            redirect('detalle_pedido/index');
        }
        else
        {
			$this->load->model('Pedido_model');
			$data['all_pedido'] = $this->Pedido_model->get_all_pedido();

			$this->load->model('Producto_model');
			$data['all_producto'] = $this->Producto_model->get_all_producto();
            
            $data['_view'] = 'detalle_pedido/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a detalle_pedido
     */
    function edit($detalleped_id)
    {   
        // check if the detalle_pedido exists before trying to edit it
        $data['detalle_pedido'] = $this->Detalle_pedido_model->get_detalle_pedido($detalleped_id);
        
        if(isset($data['detalle_pedido']['detalleped_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'pedido_id' => $this->input->post('pedido_id'),
					'producto_id' => $this->input->post('producto_id'),
					'detalleped_codigo' => $this->input->post('detalleped_codigo'),
					'detalleped_nombre' => $this->input->post('detalleped_nombre'),
					'detalleped_unidad' => $this->input->post('detalleped_unidad'),
					'detalleped_cantidad' => $this->input->post('detalleped_cantidad'),
					'detalleped_subtotal' => $this->input->post('detalleped_subtotal'),
					'detalleped_descuento' => $this->input->post('detalleped_descuento'),
					'detalleped_total' => $this->input->post('detalleped_total'),
					'detalleped_preferencia' => $this->input->post('detalleped_preferencia'),
                );

                $this->Detalle_pedido_model->update_detalle_pedido($detalleped_id,$params);            
                redirect('detalle_pedido/index');
            }
            else
            {
				$this->load->model('Pedido_model');
				$data['all_pedido'] = $this->Pedido_model->get_all_pedido();

				$this->load->model('Producto_model');
				$data['all_producto'] = $this->Producto_model->get_all_producto();

                $data['_view'] = 'detalle_pedido/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The detalle_pedido you are trying to edit does not exist.');
    } 
    /*
     * Editing a detalle_pedido
     */
    function quitar($detalleped_id,$pedido_id)
    {
        $detalle_pedido = $this->Detalle_pedido_model->get_detalle_pedido($detalleped_id);

        // check if the detalle_pedido exists before trying to delete it
        if(isset($detalle_pedido['detalleped_id']))
        {
            $this->Detalle_pedido_model->delete_detalle_pedido($detalleped_id);
            redirect('pedido/registrar/'.$pedido_id);
        }
        else
            show_error('El item que quiere eliminar no existe..!!');
    }
    /*
     * Deleting detalle_pedido
     */
    function remove($detalleped_id)
    {
        $detalle_pedido = $this->Detalle_pedido_model->get_detalle_pedido($detalleped_id);

        // check if the detalle_pedido exists before trying to delete it
        if(isset($detalle_pedido['detalleped_id']))
        {
            $this->Detalle_pedido_model->delete_detalle_pedido($detalleped_id);
            redirect('detalle_pedido/index');
        }
        else
            show_error('The detalle_pedido you are trying to delete does not exist.');
    }
    
}
