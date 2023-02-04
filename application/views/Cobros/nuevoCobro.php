<?php
$enero;$febrero;$marzo;$abril;
$mayo;$junio;$julio;$agosto;
$septiembre;$octubre;$noviembre;$diciembre;
?>
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded  justify-content-left mx-0">
            <h4 class="mb-4"> <br> <center>DATOS DEL CLIENTE </center> </h4> 
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        <b>CÉDULA DEL CLIENTE: </b>
                        <br><br>
                        <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->cedula_cliente; ?>" aria-label="default input example">
                        <b>NOMBRES DEL CLIENTE: </b>
                        <br><br>
                        <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->nombre_cliente; ?> <?php echo $listadoClientesID->apellido_cliente; ?>" aria-label="default input example">
                        <b>DIRECCIÓN DEL CLIENTE: </b>
                        <br><br>
                        <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->direccion_cliente; ?>" aria-label="default input example">
                    </div>
                </div>
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <b>CELULAR DEL CLIENTE: </b>
            <br><br>
            <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->celular_cliente; ?>" aria-label="default input example">
            <b>CORREO ELECTRÓNICO DEL CLIENTE: </b>
            <br><br>
            <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->correo_cliente; ?>" aria-label="default input example">
            <b>PARROQUIA DEL CLIENTE: </b>
            <br><br>
            <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->parroquia_cliente; ?>" aria-label="default input example">
        </div>
    </div>
</div>
</div>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded  justify-content-left mx-0">
            <h4 class="mb-4"> <br> <center>TOTAL A PAGAR</center> </h4>
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <b><center>$<?php echo $listadoPlanesID->precio_plan; ?></center></b>
                        <br>
                        <b><center><?php echo $listadoPlanesID->detalles_plan; ?></center></b>
                    </div>
                </div>
        </div>
    </div>

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded  justify-content-left mx-0">
            <h4 class="mb-4"> <br> <center>ACTIVE EL MES QUE DESEA PAGAR</center> </h4>
                <div class="col-sm-3 col-xl-3" align="center">
                    <div class="col-sm-4 col-xl-4">
                        <b>ENERO: 
                        <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Enero"){
                                            $enero = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $enero = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }    
                                         
                                    endforeach; 
                                    echo $enero;
                                    }else{
                                        $enero = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox">
                                            <div class="toggle-switch"></div>
                                        </label>';
                                        echo $enero;
                                    } 
                                    
                                    
                                ?>
                                
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>MAYO: 
                    <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Mayo"){
                                            $Mayo = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox4" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Mayo = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox4">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Mayo;
                                    }else{
                                        $Mayo = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox4">
                                            <div class="toggle-switch"></div>
                                        </label>';
                                        echo $Mayo;
                                    } 
                                    
                                    
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>SEPTIEMBRE: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Septiembre"){
                                            $Septiembre = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox8" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Septiembre = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox8">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        break;
                                        }
                                        
                                    endforeach; 
                                    echo $Septiembre;
                                }else{
                                    $Septiembre = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox8">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Septiembre;
                                } 
                                    
                                ?>
                                
                        </b>
                    </div>
                    <br>
                </div>

                <div class="col-sm-3 col-xl-3" align="center">
                    <div class="col-sm-4 col-xl-4">
                    <b>FEBRERO: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Febrero"){
                                            $febrero = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox1" checked disabled">
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $febrero = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox1">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $febrero;
                                }else{
                                    $febrero = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox1">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $febrero;
                                }  
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>JUNIO: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Junio"){
                                            $Junio = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox5" checked disabled ">
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Junio = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox5">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Junio;
                                }else{
                                    $Junio = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox5">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Junio;
                                } 
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>OCTUBRE: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Octubre"){
                                            $Octubre = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox9" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Octubre = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox9">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Octubre;
                                }else{
                                    $Octubre = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox9">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Octubre;
                                }  
                                ?>
                        </b>
                    </div>
                    <br>
                </div>

                <div class="col-sm-3 col-xl-3" align="center">
                    <div class="col-sm-4 col-xl-4">
                    <b>MARZO: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Marzo"){
                                            $marzo = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox2" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $marzo = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox2">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $marzo;
                                }else{
                                    $marzo = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox2">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $marzo;
                                }
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>JULIO: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Julio"){
                                            $Julio = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox6" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Julio = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox6">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Julio;
                                }else{
                                    $Julio = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox6">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Julio;
                                } 
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>NOVIEMBRE: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Noviembre"){
                                            $Noviembre = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox10" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Noviembre = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox10">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Noviembre;
                                }else{
                                    $Noviembre = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox10">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Noviembre;
                                }
                                ?>
                        </b>
                    </div>
                    <br>
                </div>

                <div class="col-sm-3 col-xl-3" align="center">
                    <div class="col-sm-4 col-xl-4">
                    <b>ABRIL: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Abril"){
                                            $Abril = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox3" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Abril = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox3">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Abril;
                                }else{
                                    $Abril = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox3">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Abril;
                                } 
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>AGOSTO: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Agosto"){
                                            $Agosto = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox7" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Agosto = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox7">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Agosto;
                                }else{
                                    $Agosto = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox7">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Agosto;
                                }
                                ?>
                        </b>
                    </div>
                    <br>
                    <div class="col-sm-4 col-xl-4">
                    <b>DICIEMBRE: 
                            <?php
                                if($mesesPagados){
                                    foreach ($mesesPagados->result() as $filaTemporal):  
                                        $mes=date("m",strtotime($filaTemporal->fecha_pago));
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        if($meses[$mes-1]=="Diciembre"){
                                            $Diciembre = '
                                            <label class="toggle">
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox11" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Diciembre = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox11">
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Diciembre;
                                }else{
                                    $Diciembre = '<label class="toggle">
                                        <input class="toggle-checkbox" type="checkbox" id="checkbox11">
                                        <div class="toggle-switch"></div>
                                    </label>';
                                    echo $Diciembre;
                                }
                                ?>
                        </b>
                    </div>
                    <br>
                </div>
        </div>
    </div>
<div id="miDiv" style="display:none">
    <form action="<?php echo site_url(); ?>/cobros/guardarCobro/<?php echo $listadoClientesID->id_cliente; ?>/<?php echo $listadoPlanesID->id_plan; ?>" method="post" enctype="multipart/form-data" id="formulario_nuevo_cobro">
            <input type="hidden" name="fk_id_cliente" id="fk_id_cliente" class="form-control" value="<?php echo $listadoClientesID->id_cliente; ?>" required >  
            <input type="hidden" name="cedula_cliente" id="cedula_cliente" class="form-control" value="<?php echo $listadoClientesID->cedula_cliente; ?>" required >  
            <input type="hidden" name="nombre_cliente" id="nombre_cliente" class="form-control" value="<?php echo $listadoClientesID->nombre_cliente; ?>" required >   
            <input type="hidden" name="celular_cliente" id="celular_cliente" class="form-control" value="<?php echo $listadoClientesID->celular_cliente; ?>" required >   
            <input type="hidden" name="apellido_cliente" id="apellido_cliente" class="form-control" value="<?php echo $listadoClientesID->apellido_cliente; ?>" required >   
            <input type="hidden" name="direccion_cliente" id="direccion_cliente" class="form-control" value="<?php echo $listadoClientesID->direccion_cliente; ?>" required >   
            <input type="hidden" name="correo_cliente" id="correo_cliente" class="form-control" value="<?php echo $listadoClientesID->correo_cliente; ?>" required > 
            <input type="hidden" name="fk_id_ip" id="fk_id_ip" class="form-control" value="<?php echo $listadoClientesID->fk_id_ip; ?>" required >
            <input type="hidden" name="cantidad_pago" id="cantidad_pago" class="form-control" value="<?php echo $listadoPlanesID->precio_plan; ?>" required >  
            <input type="hidden" name="id_plan" id="id_plan" class="form-control" value="<?php echo $listadoPlanesID->id_plan; ?>" required >  
            <div class="container-fluid pt-4 px-4">
                <div class="row bg-secondary rounded  justify-content-left mx-0"> 
                    <h5 class="mb-4"> <br> <center>COMPLETE LOS CAMPOS</center> </h5>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Seleccione la forma de pago:</h6>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="forma_pago" id="forma_pago" required>
                                <option value="0">Seleccione una opción</option>
                                <option value="Deposito">Deposito</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Efectivo">Efectivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Seleccione el banco o Cooperativa:</h6>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="entidad_pago" name="entidad_pago" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div id="aqui"></div>
                                <button type="submit" name="button"  class="btn btn-success m-2">ACEPTAR</a></button>
                                &nbsp;&nbsp;&nbsp;
                               <a href="<?php echo site_url(); ?>/clientes/listarClientes" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>
                            </div>
                        </div>
                    </div>
    </form>
    </div>
</div>
<br>
</div>


<script>
  document.getElementById("checkbox").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox1").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox2").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox3").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox4").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox5").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox6").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox7").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox8").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox9").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox10").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });

  document.getElementById("checkbox11").addEventListener("change", function() {
    if (this.checked) {
      document.getElementById("miDiv").style.display = "block";
    } else {
      document.getElementById("miDiv").style.display = "none";
    }
  });
</script>

<script>
    document.getElementById("checkbox1").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox2").disabled = true;
            document.getElementById("checkbox3").disabled = true;
            document.getElementById("checkbox4").disabled = true;
            document.getElementById("checkbox5").disabled = true;
            document.getElementById("checkbox6").disabled = true;
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox2").disabled = false;
            document.getElementById("checkbox3").disabled = false;
            document.getElementById("checkbox4").disabled = false;
            document.getElementById("checkbox5").disabled = false;
            document.getElementById("checkbox6").disabled = false;
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox2").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox3").disabled = true;
            document.getElementById("checkbox4").disabled = true;
            document.getElementById("checkbox5").disabled = true;
            document.getElementById("checkbox6").disabled = true;
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox3").disabled = false;
            document.getElementById("checkbox4").disabled = false;
            document.getElementById("checkbox5").disabled = false;
            document.getElementById("checkbox6").disabled = false;
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox3").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox4").disabled = true;
            document.getElementById("checkbox5").disabled = true;
            document.getElementById("checkbox6").disabled = true;
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox4").disabled = false;
            document.getElementById("checkbox5").disabled = false;
            document.getElementById("checkbox6").disabled = false;
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox4").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox5").disabled = true;
            document.getElementById("checkbox6").disabled = true;
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox5").disabled = false;
            document.getElementById("checkbox6").disabled = false;
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox5").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox6").disabled = true;
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox6").disabled = false;
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox6").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox7").disabled = true;
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox7").disabled = false;
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox7").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox8").disabled = true;
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox8").disabled = false;
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox8").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox9").disabled = true;
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox9").disabled = false;
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox9").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox10").disabled = true;
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox10").disabled = false;
            document.getElementById("checkbox11").disabled = false;
        }
    });
    document.getElementById("checkbox10").addEventListener("change", function(){
        if(this.checked){
            document.getElementById("checkbox11").disabled = true;
        }else{
            document.getElementById("checkbox11").disabled = false;
        }
    });
</script>

<script>
    $(document).ready(function() {
  
	var bancosCoop = [
    {display: "Pichincha Cta. 2200000940", value: "Banco_Pichincha_Cta_2200000940" },
    {display: "Pichincha Cta. 6010218000", value: "Banco_Pichincha_Cta_6010218000" },
    {display: "Guayaquil Cta. 7633119", value: "Banco_Guayaquil_Cta_7633119" },
    {display: "Guayaquil Cta. 21540468", value: "Banco_Guayaquil_Cta_21540468" },
    {display: "Chibuleo Cta. 09187442100", value: "Chibuleo_Cta_09187442100" },
    {display: "Mushuc Runa Cta. 44600033252", value: "Mushuc_Runa_Cta_44600033252" },
    {display: "Ambato Cta. 044611005290", value: "Ambato_Cta_044611005290" },
    {display: "Produbanco Cta. 12081071685", value: "Banco_Produbanco_Cta_12081071685" },
    {display: "Cotopaxi Cta. 297811212370", value: "Cotopaxi_Cta_297811212370" }];

    var efectivo = [
		{display: "Efectivo", value: "Efectivo" }];



	$("#forma_pago").change(function() {
		    var parent = $(this).val();
		    switch(parent){
		        case 'Deposito':
		             list(bancosCoop);
                     campo();
		            break;
		        case 'Transferencia':
                    list(bancosCoop);
                    campo();
		            break;
		        case 'Efectivo':
                     list(efectivo);
                     campo2();
		        	break;
		        default: 
		            $("#entidad_pago").html('');
		            break;
		           }
		});
function list(array_list)
{
    $("#entidad_pago").html(""); 
    $(array_list).each(function (i) { 
        $("#entidad_pago").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
  $("#aqui").addClass('hidden');
  //$(".box--oculto").removeClass('hidden');
}
  
  
 function campo(){
   $("#aqui").removeClass('hidden');
   //$(".box--oculto").addClass('hidden');
	var hola = '<div class="control_label"><label for="estudiante_de">Ingrese el numero de documento</label></div><div class="control_input"><input class="form-control mb-3" type="text" aria-label="default input example" name="documento_pago" id="documento_pago" required autocomplete="off"></div>';
    $("#aqui").html(hola);
   
 }

 function campo2(){
   $("#aqui").removeClass('hidden'); 
   //$(".box--oculto").addClass('hidden');
    var hola2 = '<div class="control_label"><label for="estudiante_de"></label></div><div class="control_input"><input type="hidden" class="form-control mb-3" type="text" aria-label="default input example" value="Efectivo" name="documento_pago" id="documento_pago"></div>';    
    $("#aqui").html(hola2);
   
 }

  
});

</script>
<script>
    $("#formulario_nuevo_cobro").validate({
    		rules:{
    			documento_pago:{
    				required:true,
                    remote:{
                        url:"<?php echo site_url('cobros/validarDocumentoExistente'); ?>",
                        data:{
                          "$documento_pago":function(){
                            return $("#documento_pago").val();
                          }
                        },
                        type:"post"
                    }
    			}
    		},
    		messages:{
    			documento_pago:{
    				required:"Por favor ingrese el documento",
                    remote:"El documento ya existe"
    			}
    		},

    	});

</script>


<style>
    *,
*:before,
*:after {
  box-sizing: border-box;
}

body {
  font-family: -apple-system, ".SFNSText-Regular", "Helvetica Neue", "Roboto", "Segoe UI", sans-serif;
}

.toggle {
  cursor: pointer;
  display: inline-block;
}

.toggle-switch {
  display: inline-block;
  background: #ccc;
  border-radius: 16px;
  width: 58px;
  height: 32px;
  position: relative;
  vertical-align: middle;
  transition: background 0.25s;
}
.toggle-switch:before, .toggle-switch:after {
  content: "";
}
.toggle-switch:before {
  display: block;
  background: linear-gradient(to bottom, #fff 0%, #eee 100%);
  border-radius: 50%;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
  width: 24px;
  height: 24px;
  position: absolute;
  top: 4px;
  left: 4px;
  transition: left 0.25s;
}
.toggle:hover .toggle-switch:before {
  background: linear-gradient(to bottom, #fff 0%, #fff 100%);
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
}
.toggle-checkbox:checked + .toggle-switch {
  background: #56c080;
}
.toggle-checkbox:checked + .toggle-switch:before {
  left: 30px;
}

.toggle-checkbox {
  position: absolute;
  visibility: hidden;
}

.toggle-label {
  margin-left: 5px;
  position: relative;
  top: 2px;
}
</style>