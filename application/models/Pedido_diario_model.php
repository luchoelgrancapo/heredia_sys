<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pedido_diario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pedido_diario by pedido_id
     */
    function get_pedido_diario($pedido_id)
    {
        $pedido_diario = $this->db->query("
            SELECT
                *

            FROM
                `pedido_diario`

            WHERE
                `pedido_id` = ?
        ",array($pedido_id))->row_array();

        return $pedido_diario;
    }
        
    /*
     * Get all pedido_diario
     */
    function get_all_pedido_diario()
    {
        $sql = "select d.*, p.proveedor_nombre, u.* from pedido_diario d
                left join proveedor p on p.proveedor_id = d.proveedor_id
                left join usuario u on u.usuario_id = d.usuario_id
                where pedido_fecha = date(now())
                order by pedido_fecha asc";
        
        $pedido_diario = $this->db->query($sql)->result_array();

        return $pedido_diario;
    }
        
    /*
     * function to add new pedido_diario
     */
    function add_pedido_diario($params)
    {
        $this->db->insert('pedido_diario',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pedido_diario
     */
    function update_pedido_diario($pedido_id,$params)
    {
        $this->db->where('pedido_id',$pedido_id);
        return $this->db->update('pedido_diario',$params);
    }
    
    /*
     * function to delete pedido_diario
     */
    function delete_pedido_diario($pedido_id)
    {
        return $this->db->delete('pedido_diario',array('pedido_id'=>$pedido_id));
    }
    
    /*
     * function to delete pedido_diario
     */
    function pedidos_diarios()
    {
        $sql = "select d.*, p.proveedor_nombre, u.* from pedido_diario d
                left join proveedor p on p.proveedor_id = d.proveedor_id
                left join usuario u on u.usuario_id = d.usuario_id
                where pedido_fecha = date(now())
                order by pedido_fecha asc";
        return $this->db->query($sql)->result_array();
    }
    
    /*
     * function to delete pedido_diario
     */
    function consultar($sql)
    {
        return $this->db->query($sql)->result_array();
    }
}
