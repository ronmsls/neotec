<?php
#[AllowDynamicProperties]

class Tareas_programadas extends CI_Controller {

    //clientes que adeudan
    public function clientes_sin_pagos(){
		require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';
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

    public function mensaje($telefono){

//TOKEN QUE NOS DA FACEBOOK
$token = 'EAATkqjJKQecBAN7Srv0GtZBKmIu3Rao0HPdXStBShZAYfQU6BWyI7Ig6pOjJfCzkzs8ZB8fW0aucdh0WLGevcMCE58YMLobGTsmoTj9iPLfnr47Cyshg58sXOZAZBZA8nBldHONJlDPZCuz5c1vQQo7FYHivHFi1avC9BgfWAgIG78U8I0vsYej9EKJi0a4osMjmPpGZBrSBbPiffO9VEFIZB';
$cadena = $telefono;
$cadena = ltrim($cadena, "0");
$telefonoFinal= "593$cadena";
echo $telefonoFinal;
//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v15.0/103523422673234/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = ''
        . '{'
        . '"messaging_product": "whatsapp", '
        . '"to": "'.$telefonoFinal.'", '
        . '"type": "template", '
        . '"template": '
        . '{'
        . '     "name": "hello_world",'
        . '     "language":{ "code": "en_US" } '
        . '} '
        . '}';
//DECLARAMOS LAS CABECERAS
$header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
//INICIAMOS EL CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
$response = json_decode(curl_exec($curl), true);
//IMPRIMIMOS LA RESPUESTA 
print_r($response);
//OBTENEMOS EL CODIGO DE LA RESPUESTA
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//CERRAMOS EL CURL
curl_close($curl);


    }
}
