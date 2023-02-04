<?php require_once APPPATH.'third_party/mikrotik/api_mt_include2.php'; ?>
<?php
$ipRouteros="192.168.100.45";  // tu RouterOS. 
$Username="api-user";
$Pass="12345678";
$api_puerto=1998;

$API = new RouterosAPI();
$API->debug = false;
if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) { 
   $API->write("/system/ident/getall",true);
   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);
   $name = $ARRAY[0]["name"];
    if(count($ARRAY)>0){   // si esta conectado
           $API->write("/system/licen/getall",true);
           $READ = $API->read(false);
           $ARRAY = $API->parseResponse($READ);		
           $nlevel = $ARRAY[0]["nlevel"];
           $API->write("/system/reso/getall",true);
           $READ = $API->read(false);
           $ARRAY = $API->parseResponse($READ);		
           $cpu = $ARRAY[0]["cpu"];
           $cpu_frequency = $ARRAY[0]["cpu-frequency"];  
           $arquitectura = $ARRAY[0]["board-name"];  
           $API->write("/system/pack/getall",true);
           $READ = $API->read(false);
           $ARRAY = $API->parseResponse($READ);		
           $version = $ARRAY[0]["version"];	   
           
           echo 'Conexion API <img src="icon_led_green.png" />&nbsp;';	    
           echo "<strong>".$name."(" .$arquitectura. ")</strong>&nbsp;&nbsp;";
           echo "EXITOSA v:" . $version. "&nbsp;&nbsp;";
           echo "level:" . $nlevel . "&nbsp;&nbsp;";
           echo $cpu."(".$cpu_frequency." Mhz.)";
    }else{  //el servidor API esta of line
           echo '<img src="icon_led_grey.png" />&nbsp;'.$ARRAY['!trap'][0]['message'];	 
           
    }    

}else{
    echo "<font color='#ff0000'>La conexion ha fallado. Verifique si el Api esta activo.</font>";
}
$API->disconnect();
?>