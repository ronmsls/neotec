<?php
    class Dashboard extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('plan');
            $this->load->model('cliente');
            $this->load->model('usuario');
            $this->load->model('cobro');
           //validando si alguien esta conectado
            if ($this->session->userdata("usuario_Conectado")) { 
                // si esta conectado
              } else {
                redirect("seguridades/login");
              }
        }

        public function dashboardView(){
            $data["planesCant"]=$this->plan->consultarTodos();
            $data["clientesCant"]=$this->cliente->consultarActivos();
            $data["usuariosCant"]=$this->usuario->consultarTodos();
            $data["pagoCant"]=$this->cobro->suma();
            $data["pagadosCant"]=$this->cobro->cantidadPagados();
            $this->load->view('header');
            $this->load->view("dashboard/dashboardVista",$data);
            $this->load->view('footer');
        }

        public function dashboardFormasPago(){
            $data["totalPagadosEfectivo"]=$this->cobro->cantidadPagosEfectivo();
            $data["totalPagadosDeposito"]=$this->cobro->cantidadPagosDeposito();
            $data["totalPagadosTransferencia"]=$this->cobro->cantidadPagosTransferencia();
            $data["canDepPi1"]=$this->cobro->canDepPi1();
            $data["canDinDepPi1"]=$this->cobro->canDinDepPi1();
            $data["canDepPi2"]=$this->cobro->canDepPi2();
            $data["canDiDepfPi2"]=$this->cobro->canDiDepfPi2();
            $data["caDepfGy1"]=$this->cobro->caDepfGy1();
            $data["canDiDepfGy1"]=$this->cobro->canDiDepfGy1();
            $data["caDepfGy2"]=$this->cobro->caDepfGy2();
            $data["canDiDepfGy2"]=$this->cobro->canDiDepfGy2();
            $data["caDepfCh"]=$this->cobro->caDepfCh();
            $data["canDiDepfCh"]=$this->cobro->canDiDepfCh();
            $data["caDepfMr"]=$this->cobro->caDepfMr();
            $data["canDiDepfMr"]=$this->cobro->canDiDepfMr();
            $data["caDepfAm"]=$this->cobro->caDepfAm();
            $data["canDiDepfAm"]=$this->cobro->canDiDepfAm();
            $data["caDepfPb"]=$this->cobro->caDepfPb();
            $data["canDiDepfPb"]=$this->cobro->canDiDepfPb();
            $data["canDepfCt"]=$this->cobro->canDepfCt();
            $data["canDiDepfCt"]=$this->cobro->canDiDepfCt();
            //--
            $data["canTranPi1"]=$this->cobro->canTranPi1();
            $data["canDinTranPi1"]=$this->cobro->canDinTranPi1();
            $data["caTranPi2"]=$this->cobro->caTranPi2();
            $data["canDTranfPi2"]=$this->cobro->canDTranfPi2();
            $data["cTranfGy1"]=$this->cobro->cTranfGy1();
            $data["canDTranfGy1"]=$this->cobro->canDTranfGy1();
            $data["cTranfGy2"]=$this->cobro->cTranfGy2();
            $data["canDTranfGy2"]=$this->cobro->canDTranfGy2();
            $data["cTranfCh"]=$this->cobro->cTranfCh();
            $data["canDTranfCh"]=$this->cobro->canDTranfCh();
            $data["cTranfMr"]=$this->cobro->cTranfMr();
            $data["canDTranfMr"]=$this->cobro->canDTranfMr();
            $data["cTranfAm"]=$this->cobro->cTranfAm();
            $data["canDTranfAm"]=$this->cobro->canDTranfAm();
            $data["cTranfPb"]=$this->cobro->cTranfPb();
            $data["canDTranfPb"]=$this->cobro->canDTranfPb();
            $data["caTranfCt"]=$this->cobro->caTranfCt();
            $data["canDTranfCt"]=$this->cobro->canDTranfCt();
            $this->load->view('header');
            $this->load->view("dashboard/dashboardFormasPago",$data);
            $this->load->view('footer');
        }
        
    }
?>
