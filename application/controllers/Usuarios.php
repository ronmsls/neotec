<?php
    class Usuarios extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model("usuario");
            $this->load->model("rol");
            // validando si alguien esta conectado
          if ($this->session->userdata("usuario_Conectado")) { 
            // si esta conectado
          } else {
            redirect("seguridades/login");   
          }
        }
        public function nuevoUsuario(){
            $data["listadoRoles"]=$this->rol->consultarTodosExtra();
            $this->load->view('header');
            $this->load->view("usuarios/nuevoUsuario", $data);
           $this->load->view('footer');
        }
        public function editarUsuario($id_usuario,$id_rol){
            $data["listadoUsuariosID"]=$this->usuario->consultarPorId($id_usuario);
            $data["listadoRoles"]=$this->rol->consultarTodos();
            $data["listadoRolesID"]=$this->rol->consultarPorId($id_rol);
            $this->load->view('header');
            $this->load->view("usuarios/editarUsuario", $data);
           $this->load->view('footer');
        }
        public function listarUsuarios(){
            $data["listadoUsuarios"]=$this->usuario->consultarActivos();
            $this->load->view('header');
            $this->load->view("usuarios/listarUsuarios",$data); 
            $this->load->view('footer');
        }
        public function guardarUsuario(){
            $datosNuevoUsuario=array(
                "cedula_usuario"=>$this->input->post("cedula_usuario"),
                "nombre_usuario"=>$this->input->post("nombre_usuario"),
                "apellido_usuario"=>$this->input->post("apellido_usuario"), 
                "celular_usuario"=>$this->input->post("celular_usuario"),
                "correo_usuario"=>$this->input->post("correo_usuario"),
                "fk_id_rol"=>$this->input->post("fk_id_rol"),
                "pass_usuario"=> $this->input->post("pass_usuario")
                
            );
            if($this->usuario->insertar($datosNuevoUsuario)){
                $this->session->set_flashdata('confirmacion','usuario insertado exitosamente');               
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');       
            }
            redirect("usuarios/listarUsuarios");
        }

        public function actualizarUsuario(){
            $id_usuario=$this->input->post("id_usuario");    
            $datosEditarUsuarios=array(
                "cedula_usuario"=>$this->input->post("cedula_usuario"),
                "nombre_usuario"=>$this->input->post("nombre_usuario"),
                "apellido_usuario"=>$this->input->post("apellido_usuario"), 
                "celular_usuario"=>$this->input->post("celular_usuario"),
                "correo_usuario"=>$this->input->post("correo_usuario"),
                "pass_usuario"=>$this->input->post("pass_usuario")
                
            );
            if($this->usuario->actualizar($id_usuario,$datosEditarUsuarios)){
                //mensaje flash para confirmar
                $this->session->set_flashdata("actualizacion","Datos del usuario actualizados correctamente");
                  redirect('usuarios/listarUsuarios');
            }else{
                  echo "error al actualizar";
    
            }
        }


        public function procesarEliminacion($id_usuario){
            $data['usuarios']=$this->usuario->consultarPorId($id_usuario);
            $datosEditarUsuario=array(
                "estado_usuario"=>$this->input->post("0")
            );
            if($this->usuario->actualizar($id_usuario,$datosEditarUsuario)){
                redirect('usuarios/listarUsuarios');
            }else{
                echo "ERROR AL ELIMINAR";
            }
          }
    }
?>