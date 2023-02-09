<?php
#[AllowDynamicProperties]
class Planes extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model("plan");
        $this->load->library('conectarMikrotik'); 
        //$this->load->library('conectar_test_api');
        // validando si alguien esta conectado
        if ($this->session->userdata("usuario_Conectado")) { 
            // si esta conectado
          } else {
            redirect("seguridades/login");
          }

    }

    public function nuevoPlan(){
        $this->load->view('header');
        $this->load->view("planes/nuevoPlan");
        $this->load->view('footer');
    }

    public function listarPlanes(){
        $data["listadoPlanes"]=$this->plan->consultarActivos();
        $this->load->view('header');
        $this->load->view("planes/listarPlanes",$data); 
        $this->load->view('footer');
    }

    public function editarPlan($id_plan){
        $data["listadoPlanesID"]=$this->plan->consultarPorId($id_plan);
        $this->load->view('header');
        $this->load->view("planes/editarPlanes",$data); 
        $this->load->view('footer');
    }

    public function guardarPlan(){
      $datosNuevoPlan=array(
            "nombre_plan"=>$this->input->post("nombre_plan"),
            "detalles_plan"=>$this->input->post("detalles_plan"),
            "precio_plan"=>$this->input->post("precio_plan"),
            "meg_sub_plan"=>$this->input->post("meg_sub_plan"),
            "meg_baj_plan"=>$this->input->post("meg_baj_plan")
        );
        if($this->plan->insertar($datosNuevoPlan)){
            $this->session->set_flashdata('confirmacion','equipo insertado exitosamente');
        }else{
            $this->session->set_flashdata('error','Error al procesar, intente nuevamente');       
        }
        redirect("planes/listarPlanes");
    }

    public function actualizarPlan(){
        $id_plan=$this->input->post("id_plan");
        $datosEditarPlanes=array(
            "nombre_plan"=>$this->input->post("nombre_plan"),
            "detalles_plan"=>$this->input->post("detalles_plan"),
            "precio_plan"=>$this->input->post("precio_plan"),
            "meg_sub_plan"=>$this->input->post("meg_sub_plan"),
            "meg_baj_plan"=>$this->input->post("meg_baj_plan")
        );
        if($this->plan->actualizar($id_plan,$datosEditarPlanes)){
            //mensaje flash para confirmar
            $this->session->set_flashdata("actualizacion","Datos del plan actualizados correctamente");
              redirect('planes/listarPlanes');
        }else{
              echo "error al actualizar";

        }

    }

    public function procesarEliminacion($id_plan){
        $data['plan']=$this->plan->consultarPorId($id_plan);
        $datosEditarPlanes=array(
            "estado_plan"=>$this->input->post("0")
        );
        if($this->plan->actualizar($id_plan,$datosEditarPlanes)){
            redirect('planes/listarPlanes');
        }else{
            echo "ERROR AL ELIMINAR";
        }
      }

    

}

?>
