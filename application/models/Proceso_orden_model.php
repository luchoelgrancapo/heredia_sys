<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Proceso_orden_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    
    /*
     * Get all proceso_orden count
     */
    function get_all_proceso_orden_count()
    {
        $proceso_orden = $this->db->query("
            SELECT
                count(*) as count

            FROM
                `proceso_orden`
        ")->row_array();

        return $proceso_orden['count'];
    }

    function get_en_proceso($estado,$estado_id)
    {
        $proceso_orden = $this->db->query("
            SELECT
                p.*, o.orden_numero, o.cliente_id, c.cliente_nombre, e.estado_descripcion as 'estado_orden', i.estado_descripcion as 'estado_proceso'

            FROM
                proceso_orden p
            LEFT JOIN orden_trabajo o on p.orden_id=o.orden_id
            LEFT JOIN cliente c on o.cliente_id=c.cliente_id
            LEFT JOIN estado e on p.estado=e.estado_id
            LEFT JOIN estado i on p.estado_id=i.estado_id
            WHERE 
            	p.estado=".$estado." and p.estado_id=".$estado_id."
        ")->result_array();

        return $proceso_orden;
    }

    function get_en_recepcion($estado)
    {
        $proceso_orden = $this->db->query("
            SELECT
                p.*, o.orden_numero, o.cliente_id, c.cliente_nombre, e.estado_descripcion as 'estado_orden', i.estado_descripcion as 'estado_proceso'

            FROM
                proceso_orden p
            LEFT JOIN orden_trabajo o on p.orden_id=o.orden_id
            LEFT JOIN cliente c on o.cliente_id=c.cliente_id
            LEFT JOIN estado e on p.estado=e.estado_id
            LEFT JOIN estado i on p.estado_id=i.estado_id
            WHERE 
                p.estado=".$estado." and p.estado_id=24
        ")->result_array();

        return $proceso_orden;
    }

    function get_en_terminado($estadoante,$estado_id)
    {
        $estadoact=$estadoante+1;
        $proceso_orden = $this->db->query("
            SELECT
    p.*, o.orden_numero, o.cliente_id, c.cliente_nombre, e.estado_descripcion as 'estado_orden', i.estado_descripcion as 'estado_proceso',
    pro.proceso_fechaproceso as 'inicio', pro.proceso_fechaterminado as 'fin'
FROM
    proceso_orden p
LEFT JOIN orden_trabajo o on p.orden_id=o.orden_id
LEFT JOIN cliente c on o.cliente_id=c.cliente_id
LEFT JOIN estado e on p.estado=e.estado_id
LEFT JOIN estado i on p.estado_id=i.estado_id
LEFT JOIN proceso_orden pro on p.orden_id=pro.orden_id
WHERE 
 pro.estado=".$estadoante." and pro.proceso_fechaterminado is not null and pro.estado_id>1
     and p.estado=".$estadoact." and p.proceso_fechaproceso is null 
GROUP BY p.proceso_id
        ")->result_array();

        return $proceso_orden;
    }

    function terminar_proceso($proceso)
    {
        $proceso_orden = $this->db->query("
            UPDATE
                proceso_orden
            SET estado_id=25, fecha_terminado=NOW()

            WHERE 
                proceso_id=".$proceso."
        ");

        return $proceso_orden;
    }
        
    /*
     * Get all proceso_orden
     */
    
    /*
     * function to add new proceso_orden
     */
    function add_proceso_orden($params)
    {
        $this->db->insert('proceso_orden',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update proceso_orden
     */
   
    /*
     * function to delete proceso_orden
  
    
    /*
     * Seguimiento de procesos
     */
    function get_seguimiento($orden_id,$venta_id)
    {
        
        $sql = "SELECT 
                v.venta_fecha,
                v.venta_id,
                o.orden_numero,
                p.*,
                c.cliente_nombre,
                c.cliente_ci,
                e.estado_descripcion,
                e.estado_color


                FROM
                venta v,
                orden_trabajo o,
                proceso_orden p,
                cliente c,
                estado e
              WHERE
                v.venta_id = ".$venta_id." and
                o.orden_id = ".$orden_id." and
                v.orden_id = o.orden_id and
                o.orden_id = p.orden_id and
                p.estado_id = e.estado_id and
                v.cliente_id = c.cliente_id";
 
        $seguimiento = $this->db->query($sql)->result_array();

        return $seguimiento;
    }
}
