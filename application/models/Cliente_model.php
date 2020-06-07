<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get cliente by cliente_id
     */
    function get_cliente($cliente_id)
    {
        $cliente = $this->db->query("
            SELECT
                *
            FROM
                `cliente`
            WHERE
                `cliente_id` = ?
        ",array($cliente_id))->row_array();

        return $cliente;
    }

    /*
     * Get cliente by cliente_id
     */
    function get_cliente_by_id($cliente_id)
    {
            $sql = "select *
            from cliente c
            left join estado e on e.estado_id = c.estado_id
            left join zona z on z.zona_id = c.zona_id
            left join categoria_cliente cc on cc.categoriaclie_id = c.categoriaclie_id
            left join tipo_cliente t on t.tipocliente_id = c.tipocliente_id 

            where c.cliente_id = ".$cliente_id."
            
            group by c.cliente_id
            order by c.cliente_id";
        
        
        $cliente = $this->db->query($sql)->result_array();

        return $cliente;
    }
    
    /*
     * Get all cliente count
     */
    function get_all_cliente_count()
    {
        $cliente = $this->db->query("
            SELECT
                count(*) as count

            FROM
                cliente c, estado e, tipo_cliente t, categoria_cliente cc, usuario u

            WHERE
                c.estado_id = e.estado_id
                and c.tipocliente_id = t.tipocliente_id
                and c.categoriaclie_id = cc.categoriaclie_id
                and c.usuario_id = u.usuario_id

            ORDER BY `cliente_id` DESC

        ")->row_array();

        return $cliente['count'];
    }
        
    /*
     * Funcion que busca clientes
     */
    function get_all_cliente_limit($condicion)
    {
        $sql = "SELECT
                c.*, e.estado_color, e.estado_descripcion, tc.tipocliente_descripcion,
                cc.categoriaclie_descripcion, u.usuario_nombre, z.zona_nombre
            FROM
                cliente c
            LEFT JOIN estado e on c.estado_id = e.estado_id
            LEFT JOIN tipo_cliente tc on c.tipocliente_id = tc.tipocliente_id
            LEFT JOIN categoria_cliente cc on c.categoriaclie_id = cc.categoriaclie_id
            LEFT JOIN usuario u on c.usuario_id = u.usuario_id
            LEFT JOIN zona z on c.zona_id = z.zona_id
            WHERE
            1=1
            ".$condicion."
            GROUP BY
                c.cliente_id
            ORDER By c.cliente_nombre LIMIT 50";

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }
        
    /*
     * function to add new cliente
     */
    function add_cliente($params)
    {
        $this->db->insert('cliente',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update cliente
     */
    function update_cliente($cliente_id,$params)
    {
        $this->db->where('cliente_id',$cliente_id);
        return $this->db->update('cliente',$params);
    }
    
    /*
     * function to delete cliente
     */
    function delete_cliente($cliente_id)
    {
        return $this->db->delete('cliente',array('cliente_id'=>$cliente_id));
    }
    
    /*
     * funcion que devuelve todos los clientes no asignados a un prevendedor
     */
    function get_all_cliente_activo_no_asignado()
    {
        $cliente = $this->db->query("
            SELECT
                c.cliente_id, c.cliente_nombre, c.cliente_nombrenegocio

            FROM
                cliente c, estado e

            WHERE
                c.usuario_id is null
                and c.`estado_id` = e.`estado_id`
                and e.estado_descripcion = 'ACTIVO'

            ORDER BY `cliente_id` DESC
        ")->result_array();

        return $cliente;
    }
    
    function get_all_cliente_activo_asignado($usuario_id)
    {
        $cliente = $this->db->query("
            SELECT
                c.cliente_id, c.cliente_nombre, c.cliente_nombrenegocio

            FROM
                cliente c, estado e

            WHERE
                c.usuario_id = ".$usuario_id."
                and c.`estado_id` = e.`estado_id`
                and e.estado_descripcion = 'ACTIVO'

            ORDER BY `cliente_id` DESC
        ")->result_array();

        return $cliente;
    }
    
    function get_all_ubicacion_clientes($usuario_id)
    {
        $cliente = $this->db->query("
            SELECT
                c.cliente_id, c.cliente_nombre, c.cliente_direccion, c.cliente_latitud, cliente_longitud,
                c.cliente_nombrenegocio, c.cliente_telefono, c.cliente_celular

            FROM
                cliente c

            WHERE
                c.usuario_id = ".$usuario_id."

            ORDER BY `cliente_id` DESC
        ")->result_array();

        return $cliente;
    }
    
    function get_all_cliente_activo_asignado_count($usuario_id)
    {
        $cliente = $this->db->query("
            SELECT 
                count(c.usuario_id) as cant

            FROM
                cliente c, estado e

            WHERE
                c.usuario_id = ".$usuario_id."
                and c.`estado_id` = e.`estado_id`
                and e.estado_descripcion = 'ACTIVO'
        ")->row_array();

        return $cliente['cant'];
    }
    /**** Para normalizar la fecha MEV ****/
    function normalize_date($date){
         if(!empty($date)){
                 $var = explode('/',str_replace('-','/',$date));
                 return "$var[2]-$var[1]-$var[0]";
         }else{
             return "0000-00-00";
         }
	 	
    }
    
    /*
     * funcion que devuelve a todos los clientes activos
     */
    function get_all_cliente_id1()
    {
        $cliente = $this->db->query("
            SELECT
                *

            FROM
                cliente c, estado e

            WHERE
                c.`estado_id` = e.`estado_id`
                and e.estado_id = 1

            ORDER BY `cliente_id` DESC
        ")->result_array();

        return $cliente;
    }
    
    /*
     * Funcion que verifica si un cliente fue usado en otros modulos
     */
    function cliente_es_usado($cliente_id){
        $cliente = $this->db->query("
            SELECT sum(
            (SELECT if(count(p.cliente_id) > 0, count(p.cliente_id), 0) AS FIELD_1
             FROM pedido p
             WHERE p.cliente_id = c.cliente_id and p.cliente_id = $cliente_id) +
            (SELECT if(count(s.cliente_id) > 0, count(s.cliente_id), 0) AS FIELD_1
             FROM servicio s
             WHERE s.cliente_id = c.cliente_id and c.cliente_id = $cliente_id) +
            (SELECT if(count(v.cliente_id) > 0, count(v.cliente_id), 0) AS FIELD_1
             FROM venta v
             WHERE v.cliente_id = c.cliente_id and c.cliente_id = $cliente_id)) as res
             FROM
                cliente c
              WHERE c.cliente_id = $cliente_id
        ")->row_array();

        return $cliente['res'];
    }
    /*
     * Funcion que busca clientes
     */
    function get_busqueda_cliente_parametro($parametro, $categoria, $condicion)
    {
        $sql = "SELECT
                c.*, e.estado_color, e.estado_descripcion, tc.tipocliente_descripcion,
                cc.categoriaclie_descripcion, u.usuario_nombre, z.zona_nombre

            FROM
                cliente c
            LEFT JOIN estado e on c.estado_id = e.estado_id
            LEFT JOIN tipo_cliente tc on c.tipocliente_id = tc.tipocliente_id
            LEFT JOIN categoria_cliente cc on c.categoriaclie_id = cc.categoriaclie_id
            LEFT JOIN usuario u on c.usuario_id = u.usuario_id
            LEFT JOIN zona z on c.zona_id = z.zona_id
            
            WHERE
                c.estado_id = e.estado_id
                and(c.cliente_nombre like '%".$parametro."%' or c.cliente_codigo like '%".$parametro."%'
                   or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%'
                   or c.cliente_nombrenegocio like '%".$parametro."%')
                ".$categoria."
                ".$condicion."
                
            GROUP BY
                c.cliente_id
              ORDER By c.cliente_nombre";

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }
    

    /*
     * Funcion que busca clientes
     */
    function get_cliente_por_usuario($parametro,$condicion)
    {
        $sql = "SELECT
                c.*, e.estado_color, e.estado_descripcion

            FROM
                cliente c, estado e

            WHERE
                ".$condicion."
                c.estado_id = e.estado_id
                and(c.cliente_nombre like '%".$parametro."%' or c.cliente_codigo like '%".$parametro."%'
                   or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%')
                
            GROUP BY
                c.cliente_id
              ORDER By c.cliente_id";

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }
    
    /*
     * Funcion que busca clientes activos
     */
    function get_busqueda_cliente_activo_parametro($parametro)
    {
        $sql = "SELECT
                c.*

            FROM
                cliente c, estado e

            WHERE
                c.estado_id = e.estado_id
                and c.estado_id = 1
                and(c.cliente_nombre like '%".$parametro."%' or c.cliente_codigo like '%".$parametro."%'
                   or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%')

            GROUP BY
                c.cliente_id
              ORDER By c.cliente_id";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /*
     * Obtiene el cliente_id por medio de su C.I.
     */
    function get_cliente_from_ci($cliente_id)
    {
        $cliente = $this->db->query("
            SELECT 
                c.cliente_id

            FROM
                cliente c

            WHERE
                c.cliente_ci = $cliente_id
        ")->row_array();

        return $cliente['cliente_id'];
    }
    
  /*
     * Get all cliente
     */
    function get_clientes()
    {       
        $cliente = $this->db->query("
            SELECT count(*) as total_clientes
            FROM cliente c
            WHERE c.estado_id = 1
            ")->result_array();
        return $cliente;
    }
    /*
     * Get all cliente (SOLO LOS colientes con sus estados)
     */
    function get_cliente_all()
    {
        $cliente = $this->db->query("
            SELECT
                c.*, e.estado_color, e. estado_descripcion

            FROM
                cliente c, estado e

            WHERE
                c.estado_id = e.estado_id

            ORDER BY `cliente_id` DESC LIMIT 50

        ")->result_array();

        return $cliente;
    }
    
    /* Funcion que busca a TODOS los clientes */
    function get_all_cliente($condicion)
    {
        $sql = "SELECT
                c.*, e.estado_color, e.estado_descripcion, tc.tipocliente_descripcion,
                cc.categoriaclie_descripcion, u.usuario_nombre, z.zona_nombre
            FROM
                cliente c
            LEFT JOIN estado e on c.estado_id = e.estado_id
            LEFT JOIN tipo_cliente tc on c.tipocliente_id = tc.tipocliente_id
            LEFT JOIN categoria_cliente cc on c.categoriaclie_id = cc.categoriaclie_id
            LEFT JOIN usuario u on c.usuario_id = u.usuario_id
            LEFT JOIN zona z on c.zona_id = z.zona_id
            WHERE
            1=1
            ".$condicion."
            GROUP BY
                c.cliente_id
            ORDER By c.cliente_nombre";

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }
     /*
     * Verifica si ya hay un cliente registrado con un nombre
     */
    //function es_cliente_registrado($cliente_nombre, $cliente_ci)
    function es_cliente_registrado($cliente_nombre)
    {
        $sql = "SELECT
                      count(c.cliente_id) as resultado
                  FROM
                      cliente c
                 WHERE
                      c.cliente_nombre = '".$cliente_nombre."'";
                      /*or c.cliente_ci = '"//.$cliente_ci."'";*/

        $cliente = $this->db->query($sql)->row_array();
        return $cliente['resultado'];
    }
    
   /*
     * Funcion que busca clientes
     */
    function get_cliente_parametro($parametro)
    {
//        $sql = "SELECT
//                c.*, e.estado_color, e.estado_descripcion
//
//            FROM
//                cliente c, estado e
//
//            WHERE
//                c.estado_id = e.estado_id
//                and(c.cliente_nombre like '%".$parametro."%' or c.cliente_codigo like '%".$parametro."%'
//                   or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%')
//                
//            GROUP BY
//                c.cliente_id
//              ORDER By c.cliente_id ";
        $sql = "select *
                from cliente c
                left join estado e on e.estado_id = c.estado_id
                left join zona z on z.zona_id = c.zona_id
                left join categoria_cliente cc on cc.categoriaclie_id = c.categoriaclie_id
                left join tipo_cliente t on t.tipocliente_id = c.tipocliente_id 

                where
                c.cliente_nombre like '%".$parametro."%' or c.cliente_codigo like '%".$parametro."%'
                or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%'
                group by c.cliente_id
                order by c.cliente_id";

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }    
    
   /*
     * Funcion para verificar si existe cliente en espera de activacion
     */
    function verificar_cliente($cliente_id, $codigo_activacion)
    {

        $sql = "select * from cliente where ".
                " cliente_id = ".$cliente_id.
                " and md5(cliente_codactivacion) = '".$codigo_activacion."'".
                " and estado_id = 2";
                
        $cliente = $this->db->query($sql)->row_array();
        return $cliente;

    }    
    
    
   /*
     * Funcion para verificar si existe cliente en espera de activacion
     */
    function activar_cliente($cliente_id)
    {

        $sql = "update cliente set ".
                " estado_id = 1,".
                " cliente_fechaactivacion = now()".
                " where cliente_id = ".$cliente_id;
                
        $this->db->query($sql);
        return true;

    }    
    
}
