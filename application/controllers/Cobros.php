<?php
#[AllowDynamicProperties]
    class Cobros extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model("cliente");
            $this->load->model("cobro");
            $this->load->model("plan");
			$this->load->library('GenerarPdf');
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
            $this->load->view("Cobros/nuevoCobro",$data);
            $this->load->view('footer');
        }


        public function listaCobros(){
          $data["listadoClientes"]=$this->cliente->consultarActivos();
            $this->load->view('header');
            $this->load->view("Cobros/listaCobros",$data);
            $this->load->view('footer');
        }

        
        public function cobrosEmitidos(){
          $data["listadoCobros"]=$this->cobro->consultarTodos();
            $this->load->view('header');
            $this->load->view("Cobros/cobrosEmitidos",$data);
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
              $descripcionDec= $objetoPlan->detalles_plan;
              $megasE = $objetoPlan->meg_sub_plan*1000;
              $megasBjE = $objetoPlan->meg_baj_plan;
              $mgE=$megasE;
	      Pdf($nombre,$apellido,$cedula,$telefono,$direccion,$fecha,$precio,$correo,$descripcionDec);
              activar($cedula,$mgE);
              
              //$this->conectarmikrotik->conectar($direccion_ip,$nombreCompleto,$mg,$cedula); 
              redirect("clientes/detallesCliente/$id_cliente/$id_plan");
              

          }else{
              $this->session->set_flashdata('error','Error al procesar, intente nuevamente');       
          }
          redirect("Cobros/listaCobros");
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
function iso8859_1_to_utf8(string $s): string {
    $s .= $s;
    $len = \strlen($s);

    for ($i = $len >> 1, $j = 0; $i < $len; ++$i, ++$j) {
        switch (true) {
            case $s[$i] < "\x80": $s[$j] = $s[$i]; break;
            case $s[$i] < "\xC0": $s[$j] = "\xC2"; $s[++$j] = $s[$i]; break;
            default: $s[$j] = "\xC3"; $s[++$j] = \chr(\ord($s[$i]) - 64); break;
        }
    }

    return substr($s, 0, $j);
}

function Pdf($nombre,$apellido,$cedula,$telefono,$direccion,$fecha,$precio,$correo,$descripcionDec){
        $mes = date("m", strtotime($fecha));
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
         $meses[$mes-1];
         # Incluyendo librerias necesarias #
        require_once APPPATH.'third_party/pdf/code128.php'; 

        $pdf = new PDF_Code128('P','mm',array(80,170));
        $pdf->SetMargins(4,10,4);
        $pdf->AddPage();
    # Encabezado y datos de la empresa # 
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8(strtoupper("NEOTEC")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: 1803871472001"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("ELOY ALFARO SN Y GONZALES SUARES"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 0969008848"),0,'C',false);


    $pdf->MultiCell(0,5,utf8_decode("Fecha: $fecha"),0,'C',false);
    

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Cliente: $nombre $apellido"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("N° cédula:  $cedula"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: $telefono"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: $direccion"),0,'C',false);
    
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);


    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper($meses[$mes-1])),0,'C',false);
    $pdf->SetFont('Arial','',9);
    
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Precio"),0,0,'C');
    $pdf->Cell(15,5,utf8_decode("Desc."),0,0,'C');
    $pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);



     /*----------  Detalles de la tabla  ----------*/
     $pdf->MultiCell(0,7,utf8_decode("$descripcionDec"),0,'C',false);
     $pdf->Cell(10,4,utf8_decode("1"),0,0,'C');
     $pdf->Cell(19,4,utf8_decode("$precio"),0,0,'C');
     $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
     $pdf->Cell(28,4,utf8_decode("$precio USD"),0,0,'C');
     $pdf->Ln(4);
 
     /*----------  Fin Detalles de la tabla  ----------*/


    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$precio"),0,0,'C');


    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$precio USD"),0,0,'C');


    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("*** Para poder realizar un reclamo debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su pago"),'',0,'C');

    $pdf->Ln(9);
    
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_1.pdf",true);
      
    $doc = $pdf->Output('','S');

    $emailDestinatario=$correo;
    $asunto="Comprobante de pago"; 
    $contenido="Comprobante de pago de la fecha, $fecha";
    $adjunto=$doc;
    enviarEmail($emailDestinatario,$asunto, $contenido,$adjunto); 
     

      } 


function activar($comment, $maxlimit){
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
            $a=$maxlimit*1000;
            $API->write('=max-limit='."$a/$a",true);     //   2M/2M   [TX/RX]
            $READ = $API->read(true);
            $ARRAY = $API->parseResponse($READ);
         } else {
            echo "Error: el cliente no existe.";
        }
    }
    
    $API->disconnect();
    
    }


?>
