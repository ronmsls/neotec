<?php
#[AllowDynamicProperties]
require_once 'vendor/autoload.php'; 
require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';
// Incluir la biblioteca Twilio
require_once APPPATH . 'third_party/twilio/src/Twilio/autoload.php';
use Twilio\Rest\Client; 
class Tareas_programadas extends CI_Controller {

    //clientes que adeudan
    public function clientes_sin_pagos(){
        $fechaEntera = time();
        $year = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $sql = "SELECT cl.celular_cliente, cl.cedula_cliente from clientes as cl where cl.id_cliente NOT IN (select pg.fk_id_cliente from pago as pg WHERE YEAR(pg.fecha_pago)=$year and MONTH(pg.fecha_pago) = $mes) and estado_cliente=1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $c=0;
        if(count($result)>0){
            foreach($result as $cliente){
                $datosCliente = $result[1];
                print_r ($datosCliente); 
                $celular_cliente = array_column($result, 'celular_cliente');
                $cedula_cliente = array_column($result, 'cedula_cliente');
                $ipRouteros="170.244.209.28";  // tu RouterOS.
                $Username="api-tesis";
                $Pass="12345678";
                $api_puerto=8798;
                $API = new RouterosAPI();
                $API->debug = false;
                if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
                    $API->write("/queue/simple/getall", false);
                    $API->write('?comment=' .$cedula_cliente[$c], true);
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
                $c=$c+1;
                
            }
            redirect('clientes/listarClientes');
        }
        return $query;
    }


    //clientes que adeudan
    public function clientes_sin_pagos_mensaje(){
        $fechaEntera = time();
        $year = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $sql = "SELECT cl.celular_cliente, cl.cedula_cliente from clientes as cl where cl.id_cliente NOT IN (select pg.fk_id_cliente from pago as pg WHERE YEAR(pg.fecha_pago)=$year and MONTH(pg.fecha_pago) = $mes) and estado_cliente=1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $c=0;
        if(count($result)>0){
            foreach($result as $cliente){
                $datosCliente = $result[1];
                $celular_cliente = array_column($result, 'celular_cliente');
                $cedula_cliente = array_column($result, 'cedula_cliente');
                // Tu número de teléfono de Twilio
$twilio_number = "+17855081605";

// Tu información de autenticación de Twilio
$account_sid = "AC090bfaeb3fde4aa233a13a6de34b4ffb";
$auth_token = "6cd6cdd2d0ba000e2a0c3a0d12f1a6d8";

// Instanciar el cliente de Twilio
$client = new Client($account_sid, $auth_token);
echo $celular_cliente[$c];
$client->messages->create(
    "whatsapp:" . "+593$celular_cliente[$c]",
    array(
        "from" => "whatsapp:" . $twilio_number,
        "body" => "Hola, ¿podrías hacer el pago pendiente lo antes posible? Muchas gracias."
    )
);

                $c=$c+1;
                
            }
            redirect('clientes/listarClientes');
        }
        return $query;
    }

public function mensaje(){
$this->load->model("cliente");

// Tu número de teléfono de Twilio
$twilio_number = "+17855081605";

// Tu información de autenticación de Twilio
$account_sid = "AC090bfaeb3fde4aa233a13a6de34b4ffb";
$auth_token = "6cd6cdd2d0ba000e2a0c3a0d12f1a6d8";

// Instanciar el cliente de Twilio
$client = new Client($account_sid, $auth_token);

// Obtener la lista de clientes que no han realizado el pago en la fecha especificada
$lista_clientes = $this->cliente->getClientesSinPago();
if(count($lista_clientes)>0){
// Iterar sobre la lista de clientes y enviar un mensaje a cada uno
foreach ($lista_clientes as $cliente1) {
  $client->messages->create(
      "whatsapp:" . $lista_clientes->celular_cliente,
      array(
          "from" => "whatsapp:" . $twilio_number,
          "body" => "Hola, ¿podrías hacer el pago pendiente lo antes posible? Muchas gracias."
      )
  );
}
}

    }
}
