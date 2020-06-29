<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria_proveedor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get categoria_proveedor by categoriaprov_id
     */
    function get_categoria_proveedor($categoriaprov_id)
    {
        $categoria_proveedor = $this->db->query("
            SELECT
                *

            FROM
                `categoria_proveedor`

            WHERE
                `categoriaprov_id` = ?
        ",array($categoriaprov_id))->row_array();

        return $categoria_proveedor;
    }
    
    /*
     * Get all categoria_proveedor count
     */
    function get_all_categoria_proveedor_count()
    {
        $categoria_proveedor = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `categoria_proveedor`
        ")->row_array();

        return $categoria_proveedor['count'];
    }
        
    /*
     * Get all categoria_proveedor
     */
    function get_all_categoria_proveedor($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $categoria_proveedor = $this->db->query("
            SELECT
                *

            FROM
                `categoria_proveedor`

            WHERE
                1 = 1

            ORDER BY `categoriaprov_id` DESC

            " . $limit_condition . "
        ")->result_array();

        return $categoria_proveedor;
    }
        
    /*
     * function to add new categoria_proveedor
     */
    function add_categoria_proveedor($params)
    {
        $this->db->insert('categoria_proveedor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update categoria_proveedor
     */
    function update_categoria_proveedor($categoriaprov_id,$params)
    {
        $this->db->where('categoriaprov_id',$categoriaprov_id);
        return $this->db->update('categoria_proveedor',$params);
    }
    
    /*
     * function to delete categoria_proveedor
     */
    function delete_categoria_proveedor($categoriaprov_id)
    {
        return $this->db->delete('categoria_proveedor',array('categoriaprov_id'=>$categoriaprov_id));
    }
    /*
     * Get all categoria_proveedor ASC
     */
    function get_all_categoria_proveedor_asc($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $categoria_proveedor = $this->db->query("
            SELECT
                *

            FROM
                `categoria_proveedor`

            WHERE
                1 = 1

            ORDER BY `categoriaprov_id` ASC

            " . $limit_condition . "
        ")->result_array();

        return $categoria_proveedor;
    }
    /*
     * Get all categoria_proveedor ASC
     */
    function get_all_cat_proveedor()
    {
        $categoria_proveedor = $this->db->query("
            SELECT
                *

            FROM
                `categoria_proveedor`

            WHERE
                1 = 1

            ORDER BY `categoriaprov_id` ASC

        ")->result_array();

        return $categoria_proveedor;
    }
}