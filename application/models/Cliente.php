<?php
    class Cliente extends CI_Model{
        public function __construct(){
            parent::__construct();
    }

    //funcion para insertar los datos
    public function insertar($datos){
        return $this->db->insert("clientes",$datos);
    }

    //funcion para editar-actualizar los datos
    public function actualizar($id_cliente,$datos){
        $this->db->where('id_cliente',$id_cliente);
        return $this->db->update('clientes',$datos); 
    }

    //funcion para listar todos los datos
    public function consultarTodos(){
        $listadoCliente=$this->db->get("clientes"); 
        if ($listadoCliente->num_rows()>0){
          //cuando hay clientes
          return $listadoCliente;
        }else{
          //cuando no hay clientes
          return false;
      

        }
    }

    //consultar los estados true
    public function consultarActivos(){
        $this->db->where('estado_cliente', '1');
        $clientes=$this->db->get("clientes"); 
        if ($clientes->num_rows()>0){
            //cuando hay clientes
            return $clientes;
          }else{
            //cuando no hay clientes
            return false;
        
  
          }

    }

    //funcion para listar datos por id
    public function consultarPorId($id_cliente){
        $this->db->where('id_cliente',$id_cliente);
        $cliente=$this->db->get("clientes");
        if ($cliente->num_rows()>0){
            //cuando hay clientes
            return $cliente->row();
        }else{
            //cuando no hay clientes
            return false;

        }
    }
    //funcion para listar datos por cedula
    public function consultarPorCedula($cedula_cliente){
      $this->db->where('cedula_cliente',$cedula_cliente);
      $cliente=$this->db->get("clientes");
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

    //funcion para buscar el mismo numero de cedula
    public function consultarCedula($cedula_cliente){
        $this->db->where('cedula_cliente',$cedula_cliente);
        $query=$this->db->get('clientes');
        if($query->num_rows()>0){
          return $query->row();
        }else{
          false;
        }
      }

      //clientes que adeudan
    public function clientes_sin_pagos(){
      $fechaEntera = time();
      $year = date("Y", $fechaEntera);
      $mes = date("m", $fechaEntera);
      $sql = "SELECT * from clientes as cl where cl.id_cliente NOT IN (select pg.fk_id_cliente from pago as pg WHERE YEAR(pg.fecha_pago)=$year and MONTH(pg.fecha_pago) = $mes) and estado_cliente=1";
      $query = $this->db->query($sql);
      return $query;
  }
    
}
?>