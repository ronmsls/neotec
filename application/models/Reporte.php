<?php
    class Reporte extends CI_Model{
        public function __construct()
        {
            parent::__construct(); 
        }

        public function cantidadPagosEfectivo($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cantidadPagosEfectivo` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='EFECTIVO'";
            $query = $this->db->query($sql);
            return $query->row()->cantidadPagosEfectivo;
        }

        public function cantidadDineroEfectivo($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroEfectivo` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='EFECTIVO'";
            $query = $this->db->query($sql);
            return $query->row()->cantidadDineroEfectivo;
          }

          public function cantidadDineroDeposito($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroDeposito` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->cantidadDineroDeposito;
          }

          public function cantidadPagosDeposito($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `totalPagadosDeposito` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='DEPOSITO'";
            $query = $this->db->query($sql);
            return $query->row()->totalPagadosDeposito;
          }

          public function cantidadDineroTransferencia($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `cantidadDineroTransferencia` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->cantidadDineroTransferencia;
          }

          public function cantidadPagosTransferencia($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `totalPagadosTransferencia` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `forma_pago`='TRANSFERENCIA'";
            $query = $this->db->query($sql);
            return $query->row()->totalPagadosTransferencia;
          }

        public function canDepPi1($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `canDepPi1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND  `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDepPi1;
          }
          
          public function canDinDepPi1($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDinDepPi1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_2200000940' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDinDepPi1;
          }
          
          public function canDepPi2($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `canDepPi2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND `forma_pago`='Deposito' ";
            $query = $this->db->query($sql);
            return $query->row()->canDepPi2;
          }
          
          public function canDiDepfPi2($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfPi2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfPi2;
          }
          
          public function caDepfGy1($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfGy1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND `forma_pago`='Deposito'  ";
            $query = $this->db->query($sql);
            return $query->row()->caDepfGy1;
          }
          
          public function canDiDepfGy1($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfGy1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_7633119'  AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfGy1;
          }
          
          public function caDepfGy2($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfGy2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND `forma_pago`='Deposito' ";
            $query = $this->db->query($sql);
            return $query->row()->caDepfGy2;
          }
          
          public function canDiDepfGy2($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfGy2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_21540468'  AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfGy2;
          }
          public function caDepfCh($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfCh` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Chibuleo_Cta_09187442100' AND `forma_pago`='Deposito'  ";
            $query = $this->db->query($sql);
            return $query->row()->caDepfCh;
          }
          
          public function canDiDepfCh($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfCh` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Chibuleo_Cta_09187442100'  AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfCh;
          }
          public function caDepfMr($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfMr` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND `forma_pago`='Deposito' ";
            $query = $this->db->query($sql);
            return $query->row()->caDepfMr;
          }
          
          public function canDiDepfMr($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfMr` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfMr;
          }
          public function caDepfAm($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfAm` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Ambato_Cta_044611005290' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->caDepfAm;
          }
          
          public function canDiDepfAm($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfAm` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Ambato_Cta_044611005290' AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfAm;
          }
          public function caDepfPb($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caDepfPb` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND `forma_pago`='Deposito' ";
            $query = $this->db->query($sql);
            return $query->row()->caDepfPb;
          }
          
          public function canDiDepfPb($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfPb` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Produbanco_Cta_12081071685'  AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfPb;
          }
          public function canDepfCt($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `canDepfCt` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Cotopaxi_Cta_297811212370' AND `forma_pago`='Deposito'  ";
            $query = $this->db->query($sql);
            return $query->row()->canDepfCt;
          }
          
          public function canDiDepfCt($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDiDepfCt` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Cotopaxi_Cta_297811212370'  AND `forma_pago`='Deposito'";
            $query = $this->db->query($sql);
            return $query->row()->canDiDepfCt;
          }   
          
          //sql para comprobar los datos del dashboard de las transferencias
          public function canTranPi1($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `canTranPi1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_2200000940'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canTranPi1;
          }
          public function canDinTranPi1($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDinTranPi1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_2200000940'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDinTranPi1;
          }
          
          public function caTranPi2($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caTranPi2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_6010218000' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->caTranPi2;
          }
          
          public function canDTranfPi2($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfPi2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Pichincha_Cta_6010218000'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfPi2;
          }
          
          public function cTranfGy1($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfGy1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_7633119' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfGy1;
          }
          
          public function canDTranfGy1($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfGy1` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_7633119'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfGy1;
          }
          
          public function cTranfGy2($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfGy2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_21540468' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfGy2;
          }
          
          public function canDTranfGy2($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfGy2` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Guayaquil_Cta_21540468'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfGy2;
          }
          public function cTranfCh($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfCh` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Chibuleo_Cta_09187442100' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfCh;
          }
          
          public function canDTranfCh($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfCh` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Chibuleo_Cta_09187442100'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfCh;
          }
          public function cTranfMr($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfMr` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Mushuc_Runa_Cta_44600033252' AND `forma_pago`='Transferencia' ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfMr;
          }
          
          public function canDTranfMr($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfMr` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Mushuc_Runa_Cta_44600033252'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfMr;
          }
          public function cTranfAm($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfAm` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Ambato_Cta_044611005290' AND `forma_pago`='Transferencia' ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfAm;
          }
          
          public function canDTranfAm($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfAm` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Ambato_Cta_044611005290'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfAm;
          }
          public function cTranfPb($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `cTranfPb` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Produbanco_Cta_12081071685' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->cTranfPb;
          }
          
          public function canDTranfPb($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfPb` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Banco_Produbanco_Cta_12081071685'  AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfPb;
          }
          public function caTranfCt($fechaInicio, $fechaFin){
            $sql = "SELECT count(`id_pago`) as  `caTranfCt` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Cotopaxi_Cta_297811212370' AND `forma_pago`='Transferencia'  ";
            $query = $this->db->query($sql);
            return $query->row()->caTranfCt;
          }
          
          public function canDTranfCt($fechaInicio, $fechaFin){
            $sql = "SELECT SUM(`cantidad_pago`) as  `canDTranfCt` from pago WHERE `fecha_pago` BETWEEN '$fechaInicio' AND '$fechaFin' AND `entidad_pago`='Cotopaxi_Cta_297811212370' AND `forma_pago`='Transferencia'";
            $query = $this->db->query($sql);
            return $query->row()->canDTranfCt;
          }   
           

    }
?>