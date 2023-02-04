<?php

  function enviarEmail($emailDestinatario,$asunto, $contenido,
                        $adjunto){
        try{
          //Proceso de Envio de correo electronico
          $CI=&get_instance();//generando una instancia de CodeIgniter
          $CI->load->library('email');//cargando la libreria email
          //generar un array de configuracion del envio de correos electronicos
          $configuracionCorreo = array(
             'protocol' => 'smtp',
             'smtp_host' => 'smtp.gmail.com',
             'smtp_port' => '587',
             '_smtp_auth'=>TRUE,
             'smtp_crypto' => 'tls',
             'smtp_user' => 'ronaldo.molina.salas@gmail.com', 
             'smtp_pass' => 'izmzgxhinwxpfzpn',
             'mailtype' => 'html',
             'send_multipart' => TRUE,
             'wordwrap'=>TRUE,
             'charset' => 'utf-8',
             'newline' => "\r\n",
             'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
             )
           );
           //iniciando el proceso de envio del email
           //bajo la configuración establecida
           $CI->email->initialize($configuracionCorreo);
           //definiendo saltos de linea en el contenido del email
           $CI->email->set_newline("\r\n");
           //Definiendo el email del cual va a salir el correo (Remitente)
           $CI->email->from("ronaldo.molina.salas@gmail.com");
           //Definiendo el email a donde va a llegar el correo (Destinatario)
           $CI->email->to($emailDestinatario);
           //Definiendo el asunto
           $CI->email->subject($asunto);
           //Definiendo el contenido del mensaje
           $CI->email->message($contenido);
           if($adjunto!=""){//validando que SI haya un archivo adjunto
              //enviando el archivo adjunto
              $CI->email->attach($adjunto, 'attachment', 'comprobante.pdf', 'application/pdf');
           }
           //Enviando el correo electronico bajo la configuración establecida
           // y con los parametros indicados
          $CI->email->send();

          //Presentando todos los detalles del email enviado
          //var_dump($CI->email->print_debugger());
         

        }catch(Exception $ex){
            echo "<h1>ERROR AL ENVIAR EL CORREO $ex </h1>";
        }
  }

 ?>
