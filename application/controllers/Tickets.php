<?php
#[AllowDynamicProperties]
 class Tickets extends CI_Controller{
    function __construct(){
        parent::__construct();
          //MODELO cliente
          $this->load->model("cliente");
          $this->load->model("plan");
          $this->load->model("cobro");
          // validando si alguien esta conectado
      if ($this->session->userdata("usuario_Conectado")) { 
        // si esta conectado
      } else {
        redirect("seguridades/login");
      }
  
      }

      public function GenerarTicket($nombre,$apellido,$cedula,$telefono,$direccion,$fecha,$precio,$Desc){
        
        
        $mes = date("m", strtotime($fecha));

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        
         $meses[$mes-1];
         //echo $a;
        //$mes = date("m", strtotime($fecha));
        

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
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("RUC: 1803871472001"),0,'C',false);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("ELOY ALFARO SN Y GONZALES SUARES"),0,'C',false);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("Teléfono: 0969008848"),0,'C',false);


    $pdf->MultiCell(0,5,iso8859_1_to_utf8("Fecha: $fecha"),0,'C',false);
    

    $pdf->Ln(1);
    $pdf->Cell(0,5,iso8859_1_to_utf8("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);
    //decodifica el nombre, apellido y direccion pasado por url
        $nombreDec=urldecode($nombre);
        $apellidoDec=urldecode($apellido);
        $direccionDec=urldecode($direccion);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("Cliente: $nombreDec $apellidoDec "),0,'C',false);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("N° cédula:  $cedula"),0,'C',false);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("Teléfono: $telefono"),0,'C',false);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8("Dirección: $direccionDec"),0,'C',false);
    
    $pdf->Ln(1);
    $pdf->Cell(0,5,iso8859_1_to_utf8("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);


    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,iso8859_1_to_utf8(strtoupper($meses[$mes-1])),0,'C',false);
    $pdf->SetFont('Arial','',9);
    
    $pdf->Ln(1);
    $pdf->Cell(0,5,iso8859_1_to_utf8("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iso8859_1_to_utf8("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10,5,iso8859_1_to_utf8("Cant."),0,0,'C');
    $pdf->Cell(19,5,iso8859_1_to_utf8("Precio"),0,0,'C');
    $pdf->Cell(15,5,iso8859_1_to_utf8("Desc."),0,0,'C');
    $pdf->Cell(28,5,iso8859_1_to_utf8("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,iso8859_1_to_utf8("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

      //decodifica la descripcion pasada por url
      $descripcionDec=urldecode($Desc);

    /*----------  Detalles de la tabla  ----------*/
    $pdf->MultiCell(0,7,iso8859_1_to_utf8("$descripcionDec"),0,'C',false);
    $pdf->Cell(10,4,iso8859_1_to_utf8("1"),0,0,'C');
    $pdf->Cell(19,4,iso8859_1_to_utf8("$precio"),0,0,'C');
    $pdf->Cell(18,5,iso8859_1_to_utf8(""),0,0,'C');
    $pdf->Cell(28,4,iso8859_1_to_utf8("$precio USD"),0,0,'C');
    $pdf->Ln(4);

    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,iso8859_1_to_utf8("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,iso8859_1_to_utf8(""),0,0,'C');
    $pdf->Cell(22,5,iso8859_1_to_utf8("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,iso8859_1_to_utf8("$precio"),0,0,'C');


    $pdf->Ln(5);

    $pdf->Cell(72,5,iso8859_1_to_utf8("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iso8859_1_to_utf8(""),0,0,'C');
    $pdf->Cell(22,5,iso8859_1_to_utf8("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,iso8859_1_to_utf8("$precio USD"),0,0,'C');


    $pdf->Ln(10);

    $pdf->MultiCell(0,5,iso8859_1_to_utf8("*** Para poder realizar un reclamo debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,iso8859_1_to_utf8("Gracias por su pago"),'',0,'C');

    $pdf->Ln(9);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_$fecha.pdf",true);
    

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
