<?php
#[AllowDynamicProperties]
    class Seguridades extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('seguridad');
            $this->load->model('rol');
        }
        
        public function login(){
            $this->load->view('seguridades/login');
        }

        //funcion que valida las credenciales ingresadas
        public function autenticarUsuario(){
            $email=$this->input->post('correo_usuario');
            $password=$this->input->post('pass_usuario');
            $usuarioConsultado=$this->seguridad->consultarPorEmailPassword($email,$password);
            if ($usuarioConsultado->estado_usuario==1) {
              //creando una variable de sesion -> userdata
              $datosSesion=array(
                //ro l
              $id_rol=$usuarioConsultado->fk_id_rol,
              $rolConsultado=$this->rol->consultarPorId($id_rol),
                "id"=>$usuarioConsultado->id_usuario,
                "email"=>$usuarioConsultado->correo_usuario,
                "nombre"=>$usuarioConsultado->nombre_usuario,
                "apellido"=>$usuarioConsultado->apellido_usuario,
                "rol"=>$rolConsultado->nombre_rol
              );//array que contiene los valores de la sesion
                $this->session->set_userdata("usuario_Conectado",$datosSesion);//creando Sesion
                $this->session->set_flashdata("confirmacionUsuario","Acceso exitoso, Bienvenido al sistema");//creando Sesion
                redirect("dashboard/dashboardView");
            }else{
              $this->session->set_flashdata("errorIngreso","Email o constraseña incorrecto");
              redirect("seguridades/login");
            }
          }

    public function cerrarSesion(){
        $this->session->sess_destroy();//Matando la sesiones
        redirect("seguridades/login");
      }
            
        
    } 


?>
