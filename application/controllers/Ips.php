<?php
#[AllowDynamicProperties]
    class Ips extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model("ip");
        }

        public function listarIp(){
            $data["listadoIps"]=$this->ip->consultarActivos();
            $this->load->view('header');
            $this->load->view("ips/listarIp",$data); 
            $this->load->view('footer');
        }

        public function nuevaIp(){
            $this->load->view('header');
            $this->load->view("ips/nuevaIp"); 
            $this->load->view('footer'); 
        }

        public function guardarIp(){
            //dato enviado desde la vista
            $cantidadIps=$this->input->post("cantidadIps");
            //busca la ip final
            $ipFinal=$this->ip->ipFinal();
            //separa cada valor a partir del "."
            $separador = ".";
            $separada = explode($separador, $ipFinal);
            //selecciona el ultimo valor para iniciar a aprtir de este
            $inicioIp=$separada[3];
            echo $inicioIp;
            echo" ";
            for ($i=1; $i<=$cantidadIps; $i++){
                //echo $i;
                $inicioIp=$inicioIp+1;
                $final=$separada[3]=$inicioIp;
                $direccion_ip="$separada[0].$separada[1].$separada[2].$final";
                $datosNuevaIp=array(
                    "direccion_ip"=>$direccion_ip,
                    "estado_ip"=>1
                );
                $this->ip->insert($datosNuevaIp);
            }
            redirect("ips/listarIp"); 
        }

        //funcion para eliminar los datos de la bd
  public function eliminarIp($id_ip){
    if($this->ip->eliminarIp($id_ip)){
      $this->session->set_flashdata("eliminacion","Datos eliminados correctamente");
      redirect("ips/listarIp");
    }else{
        echo "error al eliminar";
    }
}
    }

?>
