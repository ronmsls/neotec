<?php
class Plan extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    //funcion para insertar datos
    public function insertar($datos){ 
        return $this->db->insert("plan",$datos);
    }

    //funcion para listar todos los datos
    public function consultarTodos(){
        $listarPlan=$this->db->get("plan"); 
        if ($listarPlan->num_rows()>0){
            return $listarPlan;
          }else{
            return false;
          }
    }

    //consultar los estados true
    public function consultarActivos(){
        $this->db->where('estado_plan', '1'); 
        $clientes=$this->db->get("plan"); 
        if ($clientes->num_rows()>0){
            //cuando hay clientes
            return $clientes;
          }else{
            //cuando no hay clientes
            return false;
        
  
          }

    }

    //funcion para editar-actualizar los datos
    public function actualizar($id_plan,$datos){
        $this->db->where('id_plan',$id_plan);
        return $this->db->update('plan',$datos);
    }

    //funcion para listar datos por id
    public function consultarPorId($id_plan){
        $this->db->where('id_plan',$id_plan);
        $plan=$this->db->get("plan");
        if ($plan->num_rows()>0){
            //cuando hay clientes
            return $plan->row();
        }else{
            //cuando no hay clientes
            return false;

        }
    }

    //fuincion para eliminar los datos 
    public function eliminar($id_plan){
        $this->db->where('id_plan',$id_plan);
        return $this->db->delete("plan");
    }

    
}
?>