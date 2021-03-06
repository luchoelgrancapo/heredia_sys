<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Acceso_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get acceso by acceso_id
     */
    function get_acceso($acceso_id)
    {
        return $this->db->get_where('acceso',array('acceso_id'=>$acceso_id))->row_array();
    }
        
    /*
     * Get all acceso
     */
    function get_all_acceso()
    {
        $this->db->order_by('acceso_id', 'desc');
        return $this->db->get('acceso')->result_array();
    }

    function fechaingreso($filtro)
    {
        $acceso = $this->db->query("
            SELECT
                a.*, c.cliente_nombre, c.cliente_codigo, c.cliente_ci

            FROM
                acceso a
            LEFT JOIN cliente c on a.cliente_id=c.cliente_id

            WHERE
            1=1
                ".$filtro."

            ORDER BY `acceso_id` ASC

            
        ")->result_array();

        return $acceso;
     }   
        
    /*
     * function to add new acceso
     */
    function add_acceso($params)
    {
        $this->db->insert('acceso',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update acceso
     */
    function update_acceso($acceso_id,$params)
    {
        $this->db->where('acceso_id',$acceso_id);
        return $this->db->update('acceso',$params);
    }
    
    /*
     * function to delete acceso
     */
    function delete_acceso($acceso_id)
    {
        return $this->db->delete('acceso',array('acceso_id'=>$acceso_id));
    }
}
