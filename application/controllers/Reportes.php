<?php 
#[AllowDynamicProperties]
    class Reportes extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('plan');
            $this->load->model('cliente');
            $this->load->model('usuario');
            $this->load->model('cobro');
            $this->load->model('reporte');
    }
    public function reporteVista(){
        $fechaInicio=$this->input->post("fechaInicio");
        $fechaFin=$this->input->post("fechaFin");
        $newDateInicio = date("Y-m-d", strtotime($fechaInicio));
        $newDateFin = date("Y-m-d", strtotime($fechaFin));
	    //cantidad de puntuales e inpuntuales
        $data["puntuales"]=$this->cliente->cantidaPuntuales($newDateInicio,$newDateFin);
        $data["inpuntuales"]=$this->cliente->cantidaInpuntuales($newDateInicio,$newDateFin);
        //
        $data["totalPagadosEfectivo"]=$this->reporte->cantidadPagosEfectivo($newDateInicio,$newDateFin);
        $data["totalDineroEfectivo"]=$this->reporte->cantidadDineroEfectivo($newDateInicio,$newDateFin);
        $data["totalDineroDeposito"]=$this->reporte->cantidadDineroDeposito($newDateInicio,$newDateFin);
        $data["totalDineroTransferencia"]=$this->reporte->cantidadDineroTransferencia($newDateInicio,$newDateFin);
        $data["totalPagosDeposito"]=$this->reporte->cantidadPagosDeposito($newDateInicio,$newDateFin);
        $data["totalPagosTransferencia"]=$this->reporte->cantidadPagosTransferencia($newDateInicio,$newDateFin);
        //--
        $data['canDepPi1'] = $this->reporte->canDepPi1($newDateInicio,$newDateFin);
        $data["canDinDepPi1"]=$this->reporte->canDinDepPi1($newDateInicio,$newDateFin);
        $data["canDepPi2"]=$this->reporte->canDepPi2($newDateInicio,$newDateFin);
        $data["canDiDepfPi2"]=$this->reporte->canDiDepfPi2($newDateInicio,$newDateFin);
        $data["caDepfGy1"]=$this->reporte->caDepfGy1($newDateInicio,$newDateFin);
        $data["canDiDepfGy1"]=$this->reporte->canDiDepfGy1($newDateInicio,$newDateFin);
        $data["caDepfGy2"]=$this->reporte->caDepfGy2($newDateInicio,$newDateFin);
        $data["canDiDepfGy2"]=$this->reporte->canDiDepfGy2($newDateInicio,$newDateFin);
        $data["caDepfCh"]=$this->reporte->caDepfCh($newDateInicio,$newDateFin);
        $data["canDiDepfCh"]=$this->reporte->canDiDepfCh($newDateInicio,$newDateFin);
        $data["caDepfMr"]=$this->reporte->caDepfMr($newDateInicio,$newDateFin);
        $data["canDiDepfMr"]=$this->reporte->canDiDepfMr($newDateInicio,$newDateFin);
        $data["caDepfAm"]=$this->reporte->caDepfAm($newDateInicio,$newDateFin);
        $data["canDiDepfAm"]=$this->reporte->canDiDepfAm($newDateInicio,$newDateFin);
        $data["caDepfPb"]=$this->reporte->caDepfPb($newDateInicio,$newDateFin);
        $data["canDiDepfPb"]=$this->reporte->canDiDepfPb($newDateInicio,$newDateFin);
        $data["canDepfCt"]=$this->reporte->canDepfCt($newDateInicio,$newDateFin);
        $data["canDiDepfCt"]=$this->reporte->canDiDepfCt($newDateInicio,$newDateFin);
        //--
        $data["canTranPi1"]=$this->reporte->canTranPi1($newDateInicio,$newDateFin);
        $data["canDinTranPi1"]=$this->reporte->canDinTranPi1($newDateInicio,$newDateFin);
        $data["caTranPi2"]=$this->reporte->caTranPi2($newDateInicio,$newDateFin);
        $data["canDTranfPi2"]=$this->reporte->canDTranfPi2($newDateInicio,$newDateFin);
        $data["cTranfGy1"]=$this->reporte->cTranfGy1($newDateInicio,$newDateFin);
        $data["canDTranfGy1"]=$this->reporte->canDTranfGy1($newDateInicio,$newDateFin);
        $data["cTranfGy2"]=$this->reporte->cTranfGy2($newDateInicio,$newDateFin);
        $data["canDTranfGy2"]=$this->reporte->canDTranfGy2($newDateInicio,$newDateFin);
        $data["cTranfCh"]=$this->reporte->cTranfCh($newDateInicio,$newDateFin);
        $data["canDTranfCh"]=$this->reporte->canDTranfCh($newDateInicio,$newDateFin);
        $data["cTranfMr"]=$this->reporte->cTranfMr($newDateInicio,$newDateFin);
        $data["canDTranfMr"]=$this->reporte->canDTranfMr($newDateInicio,$newDateFin);
        $data["cTranfAm"]=$this->reporte->cTranfAm($newDateInicio,$newDateFin);
        $data["canDTranfAm"]=$this->reporte->canDTranfAm($newDateInicio,$newDateFin);
        $data["cTranfPb"]=$this->reporte->cTranfPb($newDateInicio,$newDateFin);
        $data["canDTranfPb"]=$this->reporte->canDTranfPb($newDateInicio,$newDateFin);
        $data["caTranfCt"]=$this->reporte->caTranfCt($newDateInicio,$newDateFin);
        $data["canDTranfCt"]=$this->reporte->canDTranfCt($newDateInicio,$newDateFin);
        $this->load->view('header');
        $this->load->view("Reportes/reporteVista",$data); 
        $this->load->view('footer');
    }

		
    public function reporteFechas(){
        //cantidad de puntuales e inpuntuales
        $data["puntuales"]=$this->reporte->cantidaPuntuales();
        $data["inpuntuales"]=$this->reporte->cantidaInpuntuales();
        //cantidad de cada plan
        $data["plan1"]=$this->cliente->plan1();
        $data["plan2"]=$this->cliente->plan2();
        $data["plan3"]=$this->cliente->plan3();
        //cantidad por formas de pago 
        $data["efectivo"]=$this->cobro->efectivo();
        $data["deposito"]=$this->cobro->deposito();
        $data["transferencia"]=$this->cobro->transferencia();
        //cantidad de dinero por formas de pago 
        $data["totalDineroEfectivo"]=$this->cobro->cantidadDineroEfectivo();
        $data["totalDineroDeposito"]=$this->cobro->cantidadDineroDeposito();
        $data["totalDineroTransferencia"]=$this->cobro->cantidadDineroTransferencia();
        //cantidad de dinero por cuentas
        $data["B1"]=$this->reporte->cantidadDineroB1();
        $data["B2"]=$this->reporte->cantidadDineroB2();
        $data["B3"]=$this->reporte->cantidadDineroB3();
        $data["B4"]=$this->reporte->cantidadDineroB4();
        $data["B5"]=$this->reporte->cantidadDineroB5();
        $data["B6"]=$this->reporte->cantidadDineroB6();
        $data["B7"]=$this->reporte->cantidadDineroB7();
        $data["B8"]=$this->reporte->cantidadDineroB8();
        $data["B9"]=$this->reporte->cantidadDineroB9();
        //
        $data["planesCant"]=$this->plan->consultarTodos();
            $data["clientesCant"]=$this->cliente->consultarActivos();
            $data["usuariosCant"]=$this->usuario->consultarTodos();
            $data["pagoCant"]=$this->cobro->suma();
            $data["pagadosCant"]=$this->cobro->cantidadPagados();
        $this->load->view('header');
        $this->load->view("Reportes/reporteFechas", $data); 
        $this->load->view('footer');
    }

    }

?>
