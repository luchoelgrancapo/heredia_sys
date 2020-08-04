<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Proceso_orden extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proceso_orden_model');
        $this->load->model('Estado_model');
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
     * Listing of proceso_orden
     */
    function index()
    {
        if($this->acceso(155)){
            
            $data['estados'] = $this->Estado_model->get_estado_tipo(6);
            $data['_view'] = 'proceso_orden/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Seguimeinto de procesos
     */
    

    function terminados()
    {
        if($this->acceso(155)){
            
            $data['estados'] = $this->Estado_model->get_estado_tipo(6);
            $data['_view'] = 'proceso_orden/terminados';
            $this->load->view('layouts/main',$data);
        }
    }

    function  buscar()
    {
        if($this->acceso(155)){
            $estado = $this->input->post('estado');
            
            $estado_id = 25;
            $datos = $this->Proceso_orden_model->get_en_proceso($estado,$estado_id);
    
                        echo json_encode($datos);
                    
        }
    }
    function  buscarterminados()
    {
        if($this->acceso(155)){
            $estado = $this->input->post('estado');
            
                $estado_id = 26;
                $estadoante=$estado-1;
                $datos = $this->Proceso_orden_model->get_en_terminado($estadoante,$estado_id);
    
                        echo json_encode($datos); 
            
           
        }
    }

    function  terminar()
    {
        if($this->acceso(155)){
            $usuario_id = $this->session_data['usuario_id'];
            $proceso = $this->input->post('proceso');
            $estado = $this->input->post('estado');
            /*$sigestado = $estado+1;*/
            
            $data = "
            UPDATE
                proceso_orden
            SET estado_id=26, proceso_fechaterminado=NOW(), usuario_id=".$usuario_id."

            WHERE 
                proceso_id=".$proceso." ";
            $datos=$this->db->query($data);
            /* $sql = "UPDATE
                proceso_orden
            SET estado_id=1

            WHERE 
                orden_id=1 and estado=".$sigestado." ";

          $sql = "INSERT into proceso_orden(
                
                orden_id,
                estado,
                estado_id
                            
                )
                (
                SELECT
                
                orden_id,
                ".$estado."+1,
                1
                
                from proceso_orden where proceso_id = ".$proceso."
                )";*/
            
            
                        echo json_encode($datos);
        }
    }

    function  recibir()
    {
        if($this->acceso(155)){
            $usuario_id = $this->session_data['usuario_id'];
            $estado = $this->input->post('estado');
            $orden = $this->input->post('orden');
            $sigestado = $estado+1;
            
           
               $sql = "UPDATE
                proceso_orden
            SET estado_id=25, proceso_fechaproceso=NOW()

            WHERE 
                detalleorden_id=".$orden." and estado=".$estado." ";
                  $datos=$this->db->query($sql);
            
                        echo json_encode($datos);
            
            

         /* $sql = "INSERT into proceso_orden(
                
                orden_id,
                estado,
                estado_id
                            
                )
                (
                SELECT
                
                orden_id,
                ".$estado."+1,
                1
                
                from proceso_orden where proceso_id = ".$proceso."
                )";*/
          
        }
    }

    /*
     * Adding a new proceso_orden
     */
    function add()
    {
        if($this->acceso(155)){
            $data['page_title'] = "Boton Articulo";
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                                    'articulo_id' => $this->input->post('articulo_id'),
                                    'boton_id' => $this->input->post('boton_id'),
                );

                $proceso_orden_id = $this->proceso_orden_model->add_proceso_orden($params);
                redirect('proceso_orden/index');
            }
            else
            {
                            $this->load->model('Articulo_model');
                            $data['all_articulo'] = $this->Articulo_model->get_all_articulo();

                            $this->load->model('Boton_model');
                            $data['all_boton'] = $this->Boton_model->get_all_boton();

                $data['_view'] = 'proceso_orden/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a proceso_orden
     */
    function edit($botonartic_id)
    {
        if($this->acceso(155)){
            $data['page_title'] = "Boton Articulo";
            // check if the proceso_orden exists before trying to edit it
            $data['proceso_orden'] = $this->proceso_orden_model->get_proceso_orden($botonartic_id);

            if(isset($data['proceso_orden']['botonartic_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                                            'articulo_id' => $this->input->post('articulo_id'),
                                            'boton_id' => $this->input->post('boton_id'),
                    );

                    $this->proceso_orden_model->update_proceso_orden($botonartic_id,$params);            
                    redirect('proceso_orden/index');
                }
                else
                {
                                    $this->load->model('Articulo_model');
                                    $data['all_articulo'] = $this->Articulo_model->get_all_articulo();

                                    $this->load->model('Boton_model');
                                    $data['all_boton'] = $this->Boton_model->get_all_boton();

                    $data['_view'] = 'proceso_orden/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The proceso_orden you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting proceso_orden
     */
    function remove($botonartic_id)
    {
        if($this->acceso(155)){
            $proceso_orden = $this->proceso_orden_model->get_proceso_orden($botonartic_id);

            // check if the proceso_orden exists before trying to delete it
            if(isset($proceso_orden['botonartic_id']))
            {
                $this->proceso_orden_model->delete_proceso_orden($botonartic_id);
                redirect('proceso_orden/index');
            }
            else
                show_error('The proceso_orden you are trying to delete does not exist.');
        }
    }

    function elestado()
    {
        if($this->acceso(155)){
            
             $estado = $this->input->post('estado');
            
                $datos = $this->Estado_model->get_estado($estado);
    
                        echo json_encode($datos); 
            
            
        }
    }

    
}
