<?php
    class Ip extends CI_Model{
        public function __construct(){
            parent::__construct();
    }

        //funcion para insertar los datos

        public function insert($datos){
            return $this->db->insert("ip",$datos);
        }

        //funcion para editar los datos
        public function actualizar($id_ip,$datos){
            $this->db->where('id_ip',$id_ip);
            return $this->db->update("ip",$datos);
        }

        //funcion para listar todos los datos
        public function consultarTodos(){
            $listadoIps=$this->db->get("ip");
            if($listadoIps->num_rows()>0){
                return $listadoIps;
            }else{
                return false;
            }
        }

        //funcion para consultar por estado
        public function consultarEstado(){
            $this->db->where('estado_ip','1');
            $ips=$this->db->get("ip");
            if ($ips->num_rows()>0){
                //cuando hay ips
                return $ips;
              }else{
                //cuando no hay ips
                return false;
              }
        }

        //funcion para listar datos por id
    public function consultarPorId($id_ip){
        $this->db->where('id_ip',$id_ip);
        $ips=$this->db->get("ip");
        if ($ips->num_rows()>0){
            //cuando hay clientes
            return $ips->row();
        }else{
            //cuando no hay clientes
            return false;

        }
    }
    //consultar los estados true
    public function consultarActivos(){
        $this->db->where('estado_ip', '1');
        $clientes=$this->db->get("ip"); 
        if ($clientes->num_rows()>0){
            //cuando hay clientes
            return $clientes;
          }else{
            //cuando no hay clientes
            return false;
        
  
          }

    }
    //funcion para eliminar datos
    public function eliminarIp($id_ip){
        $this->db->where("id_ip ",$id_ip );
        return $this->db->delete("ip");
    }

    public function ipFinal(){
        $sql = "SELECT `direccion_ip` AS `ipFinal`  FROM `ip` ORDER by `id_ip` DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row()->ipFinal;
    }

    }

?>