<?php

require_once 'vendor/autoload.php'; 
require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';
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
                //extraemos los datos para desactivar y para envio del mensaje
                $celular_cliente = array_column($result, 'celular_cliente');
                $cedula_cliente = array_column($result, 'cedula_cliente');
                //envio del mensaje de texto
                //print_r($celular_cliente[$c]."\n");
                //asgignacion de 64k para los clientes que adeudan
                //print_r($cedula_cliente[$c]."\n");
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
                        $API->write('=max-limit='."64k/64k",true);    //   2M/2M   [TX/RX]
                        $READ = $API->read(true);
                        $ARRAY = $API->parseResponse($READ);
                    } else {
                        echo "Error: el cliente no existe.";
                    }
                }

                $API->disconnect();
                redirect('clientes/listarClientes');

                $c=$c+1;
            }
            
        }
        return $query;
    }


public function mensaje(){

$sid    = "AC090bfaeb3fde4aa233a13a6de34b4ffb"; 
$token  = "f4433f8abe5a6bf57e1147f170759e1b"; 
$twilio = new Client($sid, $token); 

$numero ="968621648";
$message = $twilio->messages 
                  ->create("whatsapp:+593995479529", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "prueba " 
                           ) 
                  ); 
 
print($message->sid);

    }
}
