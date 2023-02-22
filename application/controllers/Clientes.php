<?php
#[AllowDynamicProperties]
    class Clientes extends CI_Controller{
        function __construct(){
            parent::__construct();
              //MODELO cliente
              $this->load->model("cliente");
              $this->load->model("plan");
              $this->load->model("cobro");
              $this->load->model("ip");
              $this->load->model("reporte");
              // validando si alguien esta conectado
          if ($this->session->userdata("usuario_Conectado")) { 
            // si esta conectado
          } else {
            redirect("seguridades/login"); 
          }
      
          } 

        public function nuevoCliente(){
            $data["listadoPlanes"]=$this->plan->consultarTodos();  
            $data["listadoIps"]=$this->ip->consultarActivos();
            $this->load->view('header');
            $this->load->view("clientes/nuevoCliente",$data); 
            $this->load->view('footer');
        }

        public function  listarClientes(){
            $data["clientesCant"]=$this->cliente->consultarActivos();
            $data["listadoClientes"]=$this->cliente->consultarActivos();
            $this->load->view('header');
            $this->load->view("clientes/listaClientes",$data);  
            $this->load->view('footer');
        }

        public function editarCliente($id_cliente,$id_plan,$id_ip){
            $data["listadoClientesID"]=$this->cliente->consultarPorId($id_cliente);
            $data["listadoPlanes"]=$this->plan->consultarActivos();
            $data["listadoIps"]=$this->ip->consultarTodos();
            $data["listadoPlanesID"]=$this->plan->consultarPorId($id_plan);
            $data["listadoIpID"]=$this->ip->consultarPorId($id_ip);
            $this->load->view('header');
            $this->load->view("clientes/editarCliente",$data); 
            $this->load->view('footer');
        }

        public function detallesCliente($id_cliente,$fk_id_plan){ 
		//cantidad de dinero por formas de pago 
        $data["totalDineroEfectivo"]=$this->cliente->efectivo($id_cliente);
        $data["totalDineroDeposito"]=$this->cliente->deposito($id_cliente);
        $data["totalDineroTransferencia"]=$this->cliente->transferencia($id_cliente);
            $data["listadoClientesID"]=$this->cliente->consultarPorId($id_cliente);
            $data["listadoCobros"]=$this->cobro->consultarPorCliente($id_cliente);
            $data["listadoPlanesID"]=$this->plan->consultarPorId($fk_id_plan); 
            $data["mesesPagados"]=$this->cobro->consultarPorCliente($id_cliente); 
            $this->load->view('header');
            $this->load->view("clientes/detallesCliente",$data); 
            $this->load->view('footer');
        }

        public function deudoresClientes(){
            $data["listadoClientes"]=$this->cliente->clientes_sin_pagos();;
            $this->load->view('header');
            $this->load->view("clientes/deudoresClientes",$data); 
            $this->load->view('footer');
        }

        public function guardarCliente(){
            $cedula=$this->input->post("cedula_cliente");
            $nombreCliente=$this->input->post("nombre_cliente");
            $apellidoCliente=$this->input->post("apellido_cliente");
            $nombreCompleto=$nombreCliente . " " . $apellidoCliente;
            //extraer datos de la direccion ip
            $idIp=$this->input->post("fk_id_ip");
            $data=array($this->ip->consultarPorId($idIp));
            $objeto = $data[0];
            $direccion_ip = $objeto->direccion_ip;
            //extraer datos del plan
            $idPlan=$this->input->post("fk_id_plan");
            $dataPlan=array($this->plan->consultarPorId($idPlan));
            $objetoPlan = $dataPlan[0];
            $megas = $objetoPlan->meg_sub_plan*1000;
            $megasBj = $objetoPlan->meg_baj_plan;
            $mg="$megas/$megasBj"; 
            //extraer id de la ip
            $id_ip=$this->input->post("fk_id_ip");
            //envio de datos al modelo
            $datosNuevoCliente=array(
                "cedula_cliente"=>$this->input->post("cedula_cliente"), 
                "nombre_cliente"=>$this->input->post("nombre_cliente"),
                "apellido_cliente"=>$this->input->post("apellido_cliente"),
                "direccion_cliente"=>$this->input->post("direccion_cliente"),
                "celular_cliente"=>$this->input->post("celular_cliente"),
                "correo_cliente"=>$this->input->post("correo_cliente"),
                "latitud_cliente"=>$this->input->post("latitud_cliente"),
                "longitud_cliente"=>$this->input->post("longitud_cliente"),
                "fk_id_ip"=>$this->input->post("fk_id_ip"),
                "fk_id_plan"=>$this->input->post("fk_id_plan")
                
            );
            if($this->cliente->insertar($datosNuevoCliente)){
                $this->session->set_flashdata('confirmacion','usuario insertado exitosamente'); 
                //registro del cliente en mikrotik
                conectar($direccion_ip,$nombreCompleto,$mg,$cedula);
                //actualizar el estado de la ip 
                $datosIp=array(
                    "estado_ip"=>$this->input->post("0")
                ); 
                $this->ip->actualizar($id_ip,$datosIp);       
            }else{
                $this->session->set_flashdata('error','Error al procesar, intente nuevamente');       
            }
            redirect("clientes/listarClientes"); 

        }

        public function actualizarClientes(){ 
            $cedulaE=$this->input->post("cedula_cliente");
            $id_cliente=$this->input->post("id_cliente");
            $nombreClienteE=$this->input->post("nombre_cliente");
            $apellidoClienteE=$this->input->post("apellido_cliente");
            $nombreCompletoE=$nombreClienteE . " " . $apellidoClienteE;
            //extraer datos de la direccion ip
            $idIp=$this->input->post("fk_id_ip");
            $data=array($this->ip->consultarPorId($idIp));
            $objeto = $data[0];
            $direccion_ipE = $objeto->direccion_ip;
             //extraer datos del plan
             $idPlan=$this->input->post("fk_id_plan");
             $dataPlan=array($this->plan->consultarPorId($idPlan));
             $objetoPlan = $dataPlan[0];
             $megasE = $objetoPlan->meg_sub_plan*1000;
             $megasBjE = $objetoPlan->meg_baj_plan;
            $datosEditarClientes=array(
                "cedula_cliente"=>$this->input->post("cedula_cliente"), 
                "nombre_cliente"=>$this->input->post("nombre_cliente"),
                "apellido_cliente"=>$this->input->post("apellido_cliente"),
                "direccion_cliente"=>$this->input->post("direccion_cliente"),
                "celular_cliente"=>$this->input->post("celular_cliente"),
                "correo_cliente"=>$this->input->post("correo_cliente"),
                "latitud_cliente"=>$this->input->post("latitud_cliente"),
                "longitud_cliente"=>$this->input->post("longitud_cliente"),
                "fk_id_plan"=>$this->input->post("fk_id_plan")
            );
            if($this->cliente->actualizar($id_cliente,$datosEditarClientes)){
                //mensaje flash para confirmar
                $this->session->set_flashdata("actualizacion","Datos del cliente actualizados correctamente");
                $mgE="$megasE/$megasBjE";
                conectar($direccion_ipE,$nombreCompletoE,$mgE,$cedulaE);            
                redirect('clientes/listarClientes');
            }else{
                  echo "error al actualizar";
    
            }

        }
        
        public function procesarEliminacion($id_cliente){
            $data['cliente']=$this->cliente->consultarPorId($id_cliente);
            $datosEditarClientes=array(
                "estado_cliente"=>$this->input->post("0")
            );
            if($this->cliente->actualizar($id_cliente,$datosEditarClientes)){
                redirect('clientes/listarClientes');
            }else{
                echo "ERROR AL ELIMINAR";
            }
          }

        public function descativarCliente($cedula_cliente){
            desactivar($cedula_cliente);
            redirect('clientes/listarClientes');
        }



          //validar si la cedula existe
      public function validarCedulaExistente(){
        $cedula_cliente=$this->input->post('cedula_cliente');
        $DocumentoExistente=$this->cliente->consultarCedula($cedula_cliente);
        if($DocumentoExistente){
          echo json_encode(FALSE);

          //echo("<br> <br>");
          //print_r($DocumentoExistente);
        }else{
          echo json_encode(TRUE);

        }
      }

      public function cortarServicio(){

      }

    }
function conectar($target, $nameCliente, $maxlimit, $comment){  
	require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';
        $ipRouteros="170.244.209.28";  // tu RouterOS.
        $Username="api-tesis";
        $Pass="12345678";
        $api_puerto=8798;
        $API = new RouterosAPI();
        $API->debug = false;
        if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {  
            $API->write("/queue/simple/getall",false);
            $API->write('?comment='.$comment,true);
            $READ = $API->read(false);
            $ARRAY = $API->parseResponse($READ);
             if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
                $API->write("/queue/simple/set",false);
                $API->write("=.id=".$ARRAY[0]['.id'],false);
                $API->write('=target='.$target,false);
                $API->write('=name='.$nameCliente,false);
                $a=$maxlimit*1000;
                $API->write('=max-limit='."$a/$a",true);    //   2M/2M   [TX/RX]
                $READ = $API->read(true);
                $ARRAY = $API->parseResponse($READ);
             }else{
                 $API->write("/queue/simple/add",false);
                 $API->write('=target='.$target,false);   // IP
                 $API->write('=name='.$nameCliente,false);       // nombre
                 $API->write('=max-limit='.$maxlimit."M",false);   //   2M/2M   [TX/RX]
                 $API->write('=comment='.$comment,true);         // comentario
                 $READ = $API->read(false);
                 $ARRAY = $API->parseResponse ($READ);
             }   
         
         }
         $API->disconnect();
           }

           function desactivar($comment){
            require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';
            $ipRouteros="170.244.209.28";  // tu RouterOS.
            $Username="api-tesis";
            $Pass="12345678";
            $api_puerto=8798;
            $API = new RouterosAPI();
            $API->debug = false;
            if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
                $API->write("/queue/simple/getall", false);
                $API->write('?comment=' .$comment, true);
                $READ = $API->read(false);
                $ARRAY = $API->parseResponse($READ);
                if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
                    $API->write("/queue/simple/set",false);
                    $API->write("=.id=".$ARRAY[0]['.id'],false);
                    //$API->write('=name='.$nameCliente,false);
                    $API->write('=max-limit='."1k/1k",true);    //   2M/2M   [TX/RX]
                    $READ = $API->read(true);
                    $ARRAY = $API->parseResponse($READ);
                } else {
                    echo "Error: el cliente no existe.";
                }
            }
            
            $API->disconnect();
            
            }

?>
