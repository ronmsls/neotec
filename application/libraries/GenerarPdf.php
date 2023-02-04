<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');
  class GenerarPdf{

    function Pdf($nombre,$apellido,$cedula,$telefono,$direccion,$fecha,$precio,$correo){
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
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("NEOTEC")),0,'C',false);
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
    $pdf->MultiCell(0,7,utf8_decode("Nombre de producto a vender"),0,'C',false);
    $pdf->Cell(10,4,utf8_decode("7"),0,0,'C');
    $pdf->Cell(19,4,utf8_decode("$precio"),0,0,'C');
    //$pdf->Cell(10,4,utf8_decode("Nombre de producto a vender"),0,0,'C');
    $pdf->Cell(28,4,utf8_decode("$70.00 USD"),0,0,'C');
    $pdf->Ln(4);

    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$precio"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("IVA (13%)"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$precio USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$70.00 USD"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);
    
    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_1.pdf",true);
      
    $doc = $pdf->Output('','S');

    $emailDestinatario="$correo";
    $asunto="Comprobante de pago"; 
    $contenido="Comprobante de pago de la fecha, $fecha";
    $adjunto=$doc;
    enviarEmail($emailDestinatario,$asunto, $contenido,$adjunto); 
     

      }     
  }
?>