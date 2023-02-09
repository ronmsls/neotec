
<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');
#[AllowDynamicProperties]
require_once APPPATH.'third_party/mikrotik/api_mt_include2.php';

class ConectarMikrotik{

function conectar($target, $nameCliente, $maxlimit, $comment){  
$ipRouteros="170.244.209.28";  // tu RouterOS.
$Username="api-tesis";
$Pass="12345678";
$api_puerto=8798;
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {  
    $API->write("/queue/simple/getall",false);
    $API->write('?comment='.$comment,true);
    $READ = $API->read(false);
    $ARRAY = $API->parseResponse($READ);
     if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
        $API->write("/queue/simple/set",false);
        $API->write("=.id=".$ARRAY[0]['.id'],false);
        $API->write('=target='.$target,false);
        $API->write('=name='.$nameCliente,false);
        $a=$maxlimit*1000;
        $API->write('=max-limit='."$a/$a",true);    //   2M/2M   [TX/RX]
        $READ = $API->read(true);
        $ARRAY = $API->parseResponse($READ);
     }else{
         $API->write("/queue/simple/add",false);
         $API->write('=target='.$target,false);   // IP
         $API->write('=name='.$nameCliente,false);       // nombre
         $API->write('=max-limit='.$maxlimit."M",false);   //   2M/2M   [TX/RX]
         $API->write('=comment='.$comment,true);         // comentario
         $READ = $API->read(false);
         $ARRAY = $API->parseResponse ($READ);
     }   
 
 }
 $API->disconnect();
   }

function desactivar($comment){
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
        //$API->write('=name='.$nameCliente,false);
        $API->write('=max-limit='."64k/64k",true);    //   2M/2M   [TX/RX]
        $READ = $API->read(true);
        $ARRAY = $API->parseResponse($READ);
     } else {
        echo "Error: el cliente no existe.";
    }
}

$API->disconnect();

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

    
}

?>
