<?php
    class Cliente extends CI_Model{
        public function __construct(){
            parent::__construct();
    }

    //funcion para insertar los datos
    public function insertar($datos){
        return $this->db->insert("clientes",$datos);
    }

    //funcion para editar-actualizar los datos
    public function actualizar($id_cliente,$datos){
        $this->db->where('id_cliente',$id_cliente);
        return $this->db->update('clientes',$datos); 
    }

    //funcion para listar todos los datos
    public function consultarTodos(){
        $listadoCliente=$this->db->get("clientes"); 
        if ($listadoCliente->num_rows()>0){
          //cuando hay clientes
          return $listadoCliente;
        }else{
          //cuando no hay clientes
          return false;
      

        }
    }

    //consultar los estados true
    public function consultarActivos(){
        $this->db->where('estado_cliente', '1');
        $clientes=$this->db->get("clientes"); 
        if ($clientes->num_rows()>0){
            //cuando hay clientes
            return $clientes;
          }else{
            //cuando no hay clientes
            return false;
        
  
          }

    }

    //funcion para listar datos por id
    public function consultarPorId($id_cliente){
        $this->db->where('id_cliente',$id_cliente); 
        $cliente=$this->db->get("clientes");
        if ($cliente->num_rows()>0){
            //cuando hay clientes
            return $cliente->row();
        }else{
            //cuando no hay clientes
            return false;

        }
    }
    //funcion para listar datos por cedula
    public function consultarPorCedula($cedula_cliente){
      $this->db->where('cedula_cliente',$cedula_cliente);
      $cliente=$this->db->get("clientes");
      if ($cliente->num_rows()>0){
          //cuando hay clientes
          return $cliente->row();
      }else{
          //cuando no hay clientes
          return false;

      }
  }

  public function existe_cedula($cedula_cliente) {
    $this->db->where('cedula_cliente', $cedula_cliente);
    $query = $this->db->get('clientes');
    return ($query->num_rows() > 0);
}

    //fuincion para eliminar los datos 

    public function eliminar($id_cliente){
        $this->db->where('id_cliente',$id_cliente);
        return $this->db->delete("clientes");
    }

    //funcion para buscar el mismo numero de cedula
    public function consultarCedula($cedula_cliente){
        $this->db->where('cedula_cliente',$cedula_cliente);
        $query=$this->db->get('clientes');
        if($query->num_rows()>0){
          return $query->row();
        }else{
          false;
        }
      }

      //clientes que adeudan
    public function getClientesSinPago(){
      $fechaEntera = time();
        $year = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $sql = "SELECT cl.celular_cliente, cl.cedula_cliente from clientes as cl where cl.id_cliente NOT IN (select pg.fk_id_cliente from pago as pg WHERE YEAR(pg.fecha_pago)=$year and MONTH(pg.fecha_pago) = $mes) and estado_cliente=1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
  }

      //planes mas solicitaddos 
      public function plan1(){
        $sql = "SELECT count(`fk_id_plan`) as plan1 FROM `clientes` WHERE `fk_id_plan`=1";
        $query = $this->db->query($sql);
        return $query->row()->plan1;

      }

      public function plan2(){
        $sql = "SELECT count(`fk_id_plan`) as plan2 FROM `clientes` WHERE `fk_id_plan`=2";
        $query = $this->db->query($sql);
        return $query->row()->plan2;
        
      }

      public function plan3(){
        $sql = "SELECT count(`fk_id_plan`) as plan3 FROM `clientes` WHERE `fk_id_plan`=3";
        $query = $this->db->query($sql);
        return $query->row()->plan3;
        
      }
		//cantidad de pagos en efectivo
public function efectivo($id_cliente){
  $sql = "SELECT count(`id_pago`) as efectivo FROM `pago` WHERE `forma_pago`='Efectivo' and `fk_id_cliente`=$id_cliente";
  $query = $this->db->query($sql);
  return $query->row()->efectivo;

}
  //cantidad de pagos en transferencia
public function deposito($id_cliente){
  $sql = "SELECT count(`id_pago`) as deposito FROM `pago` WHERE `forma_pago`='Deposito' and `fk_id_cliente`=$id_cliente";
  $query = $this->db->query($sql);
  return $query->row()->deposito;
  
}
  //cantidad de pagos en deposito
  public function transferencia($id_cliente){
    $sql = "SELECT count(`id_pago`) as transferencia FROM `pago` WHERE `forma_pago`='Transferencia' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->transferencia;
  
  }
	    //cantidada de clientes que pagan entre el 1 y el 11
  public function cantidaPuntuales($fechaInicio, $fechaFin){
    $sql = "SELECT COUNT(`id_pago`) AS pagadosPuntuales FROM `pago` WHERE DATE(`fecha_pago`) BETWEEN '$fechaInicio' AND '$fechaFin' AND DAY(`fecha_pago`) BETWEEN 1 AND 11;";
    $query = $this->db->query($sql);
    return $query->row()->pagadosPuntuales;
  }
   //cantidada de clientes que pagan entre el 12 y el fin de mes
   public function cantidaInpuntuales($fechaInicio, $fechaFin){
    $sql = "SELECT COUNT(`id_pago`) AS pagadosInpuntuales FROM `pago` WHERE DATE(`fecha_pago`) BETWEEN '$fechaInicio' AND '$fechaFin' AND DAY(`fecha_pago`) BETWEEN 12 AND DAY(LAST_DAY(`fecha_pago`));";
    $query = $this->db->query($sql);
    return $query->row()->pagadosInpuntuales;
  }

  //cantidad de dinero por cuentas
  public function cantidadDineroB1($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Banco_Pichincha_Cta_2200000940' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB2($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Banco_Pichincha_Cta_6010218000' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB3($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Banco_Guayaquil_Cta_7633119' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB4($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Banco_Guayaquil_Cta_21540468' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB5($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Chibuleo_Cta_09187442100' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB6($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Mushuc_Runa_Cta_44600033252' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB7($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Ambato_Cta_044611005290' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB8($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Banco_Produbanco_Cta_12081071685' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }
  public function cantidadDineroB9($id_cliente){
    $sql = "SELECT sum(`cantidad_pago`) as total FROM `pago` where `entidad_pago`='Cotopaxi_Cta_297811212370' and `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->total;
  }

  //cantidad de pagos por cliente
  public function cantidadPagos($id_cliente){
    $sql = "SELECT count(`id_pago`) as pagosTotales FROM `pago` WHERE `fk_id_cliente`=$id_cliente";
    $query = $this->db->query($sql);
    return $query->row()->pagosTotales;
  }



    
}
?>
