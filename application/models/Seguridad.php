<?php
class Seguridad extends CI_Model{
  //funcion para autenticar usuarios ->email y contraseña
  public function consultarPorEmailPassword($email, $password){
    $this->db->where('correo_usuario',$email); 
    $this->db->where('pass_usuario',$password);
    $query=$this->db->get('usuarios');
    if ($query->num_rows()>0) {
      return $query->row();
    }else{
      return false;
    }
  }

  } 
 ?>