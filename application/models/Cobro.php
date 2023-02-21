<?php
    class Cobro extends CI_Model{
        public function __construct(){
            parent::__construct();
    }

    //funcion para insertar los datos
    public function insertar($datos){
        return $this->db->insert("pago",$datos); 
    }


    //funcion para listar todos los datos
    public function consultarTodos(){
        $listadoPagos=$this->db->get("pago"); 
        if ($listadoPagos->num_rows()>0){
          //cuando hay clientes
          return $listadoPagos;
        }else{
          //cuando no hay clientes 
          return false;
      

        }
    }

    public function deudores(){
        $fechaEntera = time();
        $year = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $sql = "SELECT * from clientes as cl where cl.id_cliente NOT IN (select pg.fk_id_cliente from pago as pg WHERE YEAR(pg.fecha_pago)=$year and MONTH(pg.fecha_pago) = $mes) and estado_cliente=1";
        $query = $this->db->query($sql);
        return $query;
    }

    
    public function consultarPorCliente($id_cliente){
      $this->db->where('fk_id_cliente', $id_cliente);
      $clientes=$this->db->get("pago"); 
      if ($clientes->num_rows()>0){
          //cuando hay clientes
          return $clientes;
        }else{
          //cuando no hay clientes
          return false;
      

        }
        $fechaEntera = time();
        $year = date("Y", $fechaEntera);

  }
  //cantidad de pagos en efectivo
public function efectivo(){
  $sql = "SELECT count(`id_pago`) as efectivo FROM `pago` WHERE `forma_pago`='Efectivo'";
  $query = $this->db->query($sql);
  return $query->row()->efectivo;

}
  //cantidad de pagos en transferencia
public function deposito(){
  $sql = "SELECT count(`id_pago`) as deposito FROM `pago` WHERE `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->deposito;
  
}
  //cantidad de pagos en deposito
  public function transferencia(){
    $sql = "SELECT count(`id_pago`) as transferencia FROM `pago` WHERE `forma_pago`='Transferencia'";
    $query = $this->db->query($sql);
    return $query->row()->transferencia;
  
  }

  //cantidad de dinero en efectivo
  public function cantidadDineroEfectivo(){
    $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroEfectivo` from pago WHERE `forma_pago`='EFECTIVO'";
    $query = $this->db->query($sql);
    return $query->row()->cantidadDineroEfectivo;
  }

  //cantidad de dinero en Deposito
  public function cantidadDineroDeposito(){
    $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroDeposito` from pago WHERE `forma_pago`='Deposito'";
    $query = $this->db->query($sql);
    return $query->row()->cantidadDineroDeposito;
  }

  //cantidad de dinero en Transferencia
  public function cantidadDineroTransferencia(){
    $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroTransferencia` from pago WHERE `forma_pago`='Transferencia'";
    $query = $this->db->query($sql);
    return $query->row()->cantidadDineroTransferencia;
  }


//funcion para obtener la ultima fecha
  public function fechaFinal($id_cliente){
    $sql = "SELECT MONTH(`fecha_pago`) as mes FROM `pago` WHERE `fk_id_cliente`=$id_cliente ORDER by `id_pago` DESC LIMIT 1";
    $sql2 = "SELECT MONTH(`fecha_pago`) as mes2 FROM `pago`  ORDER by `id_pago` DESC LIMIT 1";
    $query2 = $this->db->query($sql2);
    $query = $this->db->query($sql);
    if($query->num_rows()==0){
      return $query2->row()->mes2;
    }else{
      return $query->row()->mes;
    }
}

    //funcion para buscar el mismo numero de cedula
    public function consultarNumeroDoc($documento_pago){
        $this->db->where('documento_pago',$documento_pago);
        $query=$this->db->get('pago');
        if($query->num_rows()>0){
          return $query->row();
        }else{
          false;
        }
      }

      public function cantidadPagosCliente($id_cliente){
        $fechaEntera = time();
        $year = date("Y", $fechaEntera);
        $sql = "SELECT COUNT(`id_pago`)  AS `total`  FROM `pago` where `fk_id_cliente`=$id_cliente and year(`fecha_pago`)=$year";
        $query = $this->db->query($sql);
        return $query->row()->total;
    }

      public function suma(){
        $fechaEntera = time();
        $mes = date("m", $fechaEntera);
        $year = date("Y", $fechaEntera);
        $sql = "SELECT SUM(`cantidad_pago`)  AS `totalPagado`  FROM `pago` where month(`fecha_pago`)=$mes and year(`fecha_pago`)=$year";
        $query = $this->db->query($sql);
        return $query->row()->totalPagado;
    }

    public function cantidadPagados(){ 
      $fechaEntera = time();
      $mes = date("m", $fechaEntera);
      $year = date("Y", $fechaEntera);
      $sql = "SELECT count(`id_pago`) as  `totalPagados` from pago where month(`fecha_pago`)=$mes and year(`fecha_pago`)=$year";
      $query = $this->db->query($sql);
      return $query->row()->totalPagados;
  }

  public function cantidadPagosEfectivo(){
    $fechaEntera = time();
      $mes = date("m", $fechaEntera);
    $sql = "SELECT count(`id_pago`) as  `totalPagadosEfectivo` from pago WHERE `forma_pago`='EFECTIVO'  AND  month(`fecha_pago`)=$mes";
    $query = $this->db->query($sql);
    return $query->row()->totalPagadosEfectivo;
}

public function cantidadPagosDeposito(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `totalPagadosDeposito` from pago WHERE `forma_pago`='DEPOSITO'  AND  month(`fecha_pago`)=$mes";
  $query = $this->db->query($sql);
  return $query->row()->totalPagadosDeposito;
}

public function cantidadPagosTransferencia(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `totalPagadosTransferencia` from pago WHERE `forma_pago`='TRANSFERENCIA' AND  month(`fecha_pago`)=$mes";
  $query = $this->db->query($sql);
  return $query->row()->totalPagadosTransferencia;
}

//sql para comprobar los datos del dashboard de los depositos 

public function canDepPi1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `canDepPi1` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDepPi1;
}
public function canDinDepPi1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDinDepPi1` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDinDepPi1;
}

public function canDepPi2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `canDepPi2` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->canDepPi2;
}

public function canDiDepfPi2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfPi2` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfPi2;
}

public function caDepfGy1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfGy1` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfGy1;
}

public function canDiDepfGy1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfGy1` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfGy1;
}

public function caDepfGy2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfGy2` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfGy2;
}

public function canDiDepfGy2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfGy2` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfGy2;
}
public function caDepfCh(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfCh` from pago WHERE `entidad_pago`='Chibuleo_Cta_09187442100' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfCh;
}

public function canDiDepfCh(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfCh` from pago WHERE `entidad_pago`='Chibuleo_Cta_09187442100' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfCh;
}
public function caDepfMr(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfMr` from pago WHERE `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfMr;
}

public function canDiDepfMr(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfMr` from pago WHERE `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfMr;
}
public function caDepfAm(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfAm` from pago WHERE `entidad_pago`='Ambato_Cta_044611005290' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfAm;
}

public function canDiDepfAm(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfAm` from pago WHERE `entidad_pago`='Ambato_Cta_044611005290' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfAm;
}
public function caDepfPb(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caDepfPb` from pago WHERE `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caDepfPb;
}

public function canDiDepfPb(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfPb` from pago WHERE `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfPb;
}
public function canDepfCt(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `canDepfCt` from pago WHERE `entidad_pago`='Cotopaxi_Cta_297811212370' AND `forma_pago`='Deposito' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->canDepfCt;
}

public function canDiDepfCt(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfCt` from pago WHERE `entidad_pago`='Cotopaxi_Cta_297811212370' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Deposito'";
  $query = $this->db->query($sql);
  return $query->row()->canDiDepfCt;
}   

//sql para comprobar los datos del dashboard de las transferencias
public function canTranPi1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `canTranPi1` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canTranPi1;
}
public function canDinTranPi1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDinTranPi1` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDinTranPi1;
}

public function caTranPi2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caTranPi2` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caTranPi2;
}

public function canDTranfPi2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfPi2` from pago WHERE `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfPi2;
}

public function cTranfGy1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfGy1` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfGy1;
}

public function canDTranfGy1(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfGy1` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfGy1;
}

public function cTranfGy2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfGy2` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfGy2;
}

public function canDTranfGy2(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfGy2` from pago WHERE `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfGy2;
}
public function cTranfCh(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfCh` from pago WHERE `entidad_pago`='Chibuleo_Cta_09187442100' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfCh;
}

public function canDTranfCh(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfCh` from pago WHERE `entidad_pago`='Chibuleo_Cta_09187442100' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfCh;
}
public function cTranfMr(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfMr` from pago WHERE `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfMr;
}

public function canDTranfMr(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfMr` from pago WHERE `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfMr;
}
public function cTranfAm(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfAm` from pago WHERE `entidad_pago`='Ambato_Cta_044611005290' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfAm;
}

public function canDTranfAm(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfAm` from pago WHERE `entidad_pago`='Ambato_Cta_044611005290' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfAm;
}
public function cTranfPb(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `cTranfPb` from pago WHERE `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->cTranfPb;
}

public function canDTranfPb(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfPb` from pago WHERE `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfPb;
}
public function caTranfCt(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT count(`id_pago`) as  `caTranfCt` from pago WHERE `entidad_pago`='Cotopaxi_Cta_297811212370' AND `forma_pago`='Transferencia' AND  month(`fecha_pago`)=$mes ";
  $query = $this->db->query($sql);
  return $query->row()->caTranfCt;
}

public function canDTranfCt(){
  $fechaEntera = time();
      $mes = date("m", $fechaEntera);
  $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfCt` from pago WHERE `entidad_pago`='Cotopaxi_Cta_297811212370' AND  month(`fecha_pago`)=$mes AND `forma_pago`='Transferencia'";
  $query = $this->db->query($sql);
  return $query->row()->canDTranfCt;
}   
}
?>