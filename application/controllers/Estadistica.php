<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com.
 */
 
class Estadistica extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('Parametro_model');
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
//            $data['_view'] = 'login/mensajeacceso';
//            $this->load->view('layouts/main',$data);
            return false;
        }
    } 

    /*
     * Listing of venta
     */
    function index()
    {

        if($this->acceso(18)){
        //**************** inicio contenido ***************
     
        $data['rolusuario'] = $this->session_data['rol'];
        $data['page_title'] = "Reportes Estadisticos";
//        $data['parametro'] = $this->Parametro_model->get_parametros();
//        $data['estado'] = $this->Estado_model->get_tipo_estado(1);
//        $data['usuario'] = $this->Venta_model->get_usuarios();
        
        $data['_view'] = 'reportes/estadistica';
        $this->load->view('layouts/main',$data);
        
				
        //**************** fin contenido ***************
		}
        
    }

    /*
     * Reporte Estadistico de Ventas
     */
    function ventas()
    {

        if($this->acceso(18)){
        //**************** inicio contenido ***************
     
        $data['rolusuario'] = $this->session_data['rol'];
        $data['page_title'] = "Reportes Estadisticos";
        $data['parametro'] = $this->Parametro_model->get_parametros();
        $data['estado'] = $this->Estado_model->get_tipo_estado(1);
        $data['usuario'] = $this->Venta_model->get_usuarios();        

        $data['_view'] = 'reportes/estadistica_ventas';
        $this->load->view('layouts/main',$data);
        		
        //**************** fin contenido ***************
		}
        
    }

    public function getUltimoDiaMes($elAnio,$elMes) {
        
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));

    }
    
    function ventas_mes()
    {
            $anio = $this->input->post("anio");
            $mes = $this->input->post("mes");                    
        
            $primer_dia = 1;
            $ultimo_dia = $this->getUltimoDiaMes($anio,$mes);
            
            $fecha_inicial = date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
            $fecha_final = date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
            
            $fecha_inicial = $anio."-".$mes."-01";
            $fecha_final = $anio."-".$mes."-31";
                
            $sql_ventas = "SELECT 
                            v.venta_fecha,
                            sum(d.detalleven_total) AS total
                          FROM
                            venta v,
                            detalle_venta d
                          WHERE
                            v.venta_id = d.venta_id AND 
                            v.venta_fecha >= '".$fecha_inicial."' AND 
                            v.venta_fecha <= '".$fecha_final."'
                          GROUP BY
                            v.venta_fecha";
            
            $ventas = $this->db->query($sql_ventas)->result_array();

            $sql_utilidades = "SELECT 
                            v.venta_fecha,
                            sum((d.detalleven_total - d.detalleven_costo)) AS utilidad
                          FROM
                            venta v,
                            detalle_venta d
                          WHERE
                            v.venta_id = d.venta_id AND 
                            v.venta_fecha >= '".$fecha_inicial."' AND 
                            v.venta_fecha <= '".$fecha_final."'
                          GROUP BY
                            v.venta_fecha";
            
            $utilidades = $this->db->query($sql_utilidades)->result_array();
            
            $ct = count($ventas);

            //Cargando los arreglos a CERO
            for($d = 1; $d <= $ultimo_dia; $d++){
                $arrayventas[$d] = 0;
                $arrayutilidades[$d] = 0;     
            }

            
            foreach($ventas as $res){
                $diasel = intval(date("d",strtotime($res['venta_fecha']) ) );
                $suma = $res['total'];
                $arrayventas[$diasel] += $suma;
            }

            foreach($utilidades as $resven){
                $diasel = intval(date("d",strtotime($resven['venta_fecha']) ) );
                $sumautilidad = $resven['utilidad'];
                $arrayutilidades[$diasel] += $sumautilidad;
            }

            $data=array("totaldias" => $ultimo_dia, "totalventas" => $arrayventas, "totalutilidades" => $arrayutilidades);
            echo  json_encode($data);
            
            /*$anio = $this->input->post('anio');   1555891200
            $mes = $this->input->post('fecha2'); 
    */

    }
   
}
