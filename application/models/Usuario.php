<?php
    class Usuario extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        //funcion para insertar datos
        public function insertar($datos){
            return $this->db->insert("usuarios",$datos);
        }

        //funcion para editar-actualizar los datos
        public function  actualizar($id_usuario,$datos){
            $this->db->where('id_usuario',$id_usuario);
            return $this->db->update('usuarios',$datos);
        }

        //funcion para listar todos los datos
        public function consultarTodos(){
            $listadoUsuario=$this->db->get("usuarios");
            if($listadoUsuario->num_rows()>0){
                return $listadoUsuario;
            }else{
                return false;
            }
        }

    //consultar los estados true
    public function consultarActivos(){
        $this->db->where('estado_usuario', '1');
        $clientes=$this->db->get("usuarios"); 
        if ($clientes->num_rows()>0){
            //cuando hay clientes
            return $clientes;
          }else{
            //cuando no hay clientes
            return false;
        
  
          }

    }

    //funcion para listar datos por id
    public function consultarPorId($id_usuario){
        $this->db->where('id_usuario',$id_usuario);
        $cliente=$this->db->get("usuarios");
        if ($cliente->num_rows()>0){
            //cuando hay clientes
            return $cliente->row();
        }else{
            //cuando no hay clientes
            return false;

        }
    }

    //fuincion para eliminar los datos 

    public function eliminar($id_cliente){
        $this->db->where('id_cliente',$id_cliente);
        return $this->db->delete("clientes");
    }



    }
?>