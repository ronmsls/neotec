<?php
    class Cobros extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model("cliente");
            $this->load->model("cobro");
            $this->load->model("plan");
            $this->load->library('GenerarPdf');
            $this->load->library('conectarMikrotik'); 
            // validando si alguien esta conectado
          if ($this->session->userdata("usuario_Conectado")) {   
            // si esta conectado
          } else {
            redirect("seguridades/login");  
          }
        }
        //vista para generar el cobro
        public function nuevoCobro($id_cliente,$fk_id_plan){
          $data["listadoClientesID"]=$this->cliente->consultarPorId($id_cliente);
          $data["listadoPlanesID"]=$this->plan->consultarPorId($fk_id_plan);   
          $data["mesesPagados"]=$this->cobro->consultarPorCliente($id_cliente); 
          $data["totalPagados"]=$this->cobro->cantidadPagosCliente($id_cliente);  
            $this->load->view('header');
            $this->load->view("cobros/nuevoCobro",$data);
            $this->load->view('footer');
        }

        //vista general para mostrar una lista de clientes
        public function listaCobros(){
          $data["listadoClientes"]=$this->cliente->consultarActivos();
            $this->load->view('header');
            $this->load->view("cobros/listaCobros",$data);
            $this->load->view('footer');
        }

            

        public function guardarCobro($id_cliente,$id_plan){ 
          $ultimaFecha=$this->cobro->fechaFinal($id_cliente);
          //echo($ultimaFecha);
          $nombre=$this->input->post('nombre_cliente');
          $apellido=$this->input->post('apellido_cliente');
          $cedula=$this->input->post('cedula_cliente');
          $telefono=$this->input->post('celular_cliente');
          $direccion=$this->input->post('direccion_cliente');
          $correo=$this->input->post('correo_cliente');
          //fecha actual
          $fechaEntera = date('Y-m-d');
          $fechaMes = time();
          $mes = date("m", $fechaMes);
          if($ultimaFecha>$mes){
            $month=$ultimaFecha+1;
            echo $month;
            $fecha = "2023-$month-01";
            $fecha = date("Y-m-d", $fecha);
            echo $fecha;
          }else{
            $fecha=date('Y-m-d');
          }
          $precio=$this->input->post("cantidad_pago");
          $fk_id_plan=$this->input->post("fk_id_plan");
          $datosNuevoCobro=array(
              "forma_pago"=>$this->input->post("forma_pago"),
              "entidad_pago"=>$this->input->post("entidad_pago"),
              "documento_pago"=>$this->input->post("documento_pago"),
              "cantidad_pago"=>$this->input->post("cantidad_pago"),
              "fecha_pago"=>$fecha,
              "fk_id_cliente"=>$this->input->post("fk_id_cliente")
              
          );
          if($this->cobro->insertar($datosNuevoCobro)){
            //crear mensaje de cobro realizado
              $this->session->set_flashdata('confirmacion','usuario insertado exitosamente'); 
              $data=array($this->cliente->consultarPorCedula($cedula));
              $objeto = $data[0];
              $fk_id_plan = $objeto->fk_id_plan;
              //extraer datos del plan
              $dataPlan=array($this->plan->consultarPorId($fk_id_plan));
              $objetoPlan = $dataPlan[0];
              $megasE = $objetoPlan->meg_sub_plan*1000;
              $megasBjE = $objetoPlan->meg_baj_plan;
              $mgE=$megasE;
              $this->conectarmikrotik->activar($cedula,$mgE);
              //$this->conectarmikrotik->conectar($direccion_ip,$nombreCompleto,$mg,$cedula);
              $this->generarpdf->Pdf($nombre,$apellido,$cedula,$telefono,$direccion,$fecha,$precio,$correo); 
              redirect("clientes/detallesCliente/$id_cliente/$id_plan");
              

          }else{
              $this->session->set_flashdata('error','Error al procesar, intente nuevamente');       
          }
          redirect("cobros/listaCobros");
      }

      //validar si el documento existe
      public function validarDocumentoExistente(){
        $documento_pago=$this->input->post('documento_pago');
        $DocumentoExistente=$this->cobro->consultarNumeroDoc($documento_pago);
        if($DocumentoExistente){
          echo json_encode(FALSE);

          //echo("<br> <br>");
          //print_r($DocumentoExistente);
        }else{
          echo json_encode(TRUE);

        }
      }
    }
?>