<?php 
#[AllowDynamicProperties]
    class Reportes extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('reporte');
    }
    public function reporteVista(){
        $fechaInicio=$this->input->post("fechaInicio");
        $fechaFin=$this->input->post("fechaFin");
        $newDateInicio = date("Y-m-d", strtotime($fechaInicio));
        $newDateFin = date("Y-m-d", strtotime($fechaFin));
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
        $this->load->view('header');
        $this->load->view("Reportes/reporteFechas"); 
        $this->load->view('footer');
    }

    }

?>
