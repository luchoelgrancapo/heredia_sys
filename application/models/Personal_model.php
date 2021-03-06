<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Personal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get personal by personal_id
     */
    function get_personal($personal_id)
    {
        return $this->db->get_where('personal',array('personal_id'=>$personal_id))->row_array();
    }
        
    /*
     * Get all personal
     */
    function get_all_personal()
    {
        $personal = $this->db->query("
            SELECT
                p.*, c.*

            FROM
                personal p, contrato c

            WHERE
                p.personal_id=c.personal_id
                and c.estado_id=1

            ORDER BY `personal_fechaing` ASC

        ")->result_array();

        return $personal;
    }

    function get_all_pprocesadas()
    {
        $personal = $this->db->query("
            SELECT
                *

            FROM
                planilla

            ORDER BY `planilla_fecha` ASC

        ")->result_array();

        return $personal;
    }
        
    /*
     * function to add new personal
     */
    function add_personal($params)
    {
        $this->db->insert('personal',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update personal
     */
    function update_personal($personal_id,$params)
    {
        $this->db->where('personal_id',$personal_id);
        return $this->db->update('personal',$params);
    }
    
    /*
     * function to delete personal
     */
    function delete_personal($personal_id)
    {
        return $this->db->delete('personal',array('personal_id'=>$personal_id));
    }
}
