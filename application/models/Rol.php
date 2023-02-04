<?php
    class Rol extends CI_Model{
        public function __construct(){
            parent::__construct();
    }

    //funcion para listar todos los datos
    public function consultarTodos(){
        $listadoPagos=$this->db->get("rol"); 
        if ($listadoPagos->num_rows()>0){ 
          //cuando hay clientes
          return $listadoPagos;
        }else{
          //cuando no hay clientes
          return false;
      

        }
    }

    //funcion para listar datos por id
    public function consultarPorId($id_rol){
      $this->db->where('id_rol',$id_rol);
      $plan=$this->db->get("rol");
      if ($plan->num_rows()>0){
          //cuando hay clientes
          return $plan->row();
      }else{
          //cuando no hay clientes
          return false;

      }
  }
    
}
?>