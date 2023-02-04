<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
<h4 class="mb-4"> <br> <center>DATOS DEL CLIENTE </center> </h4>
<input type="hidden" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $listadoPlanesID->precio_plan; ?>" required >     
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
            <h4 class="mb-4"> <br> <center>MESES PAGADOS</center> </h4>
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
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox4" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Mayo;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox8" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Septiembre;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox1" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $febrero = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox1" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $febrero;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                                <input class="toggle-checkbox" type="checkbox" id="checkbox5" checked disabled>
                                                <div class="toggle-switch"></div>
                                            </label>';
                                            break;
                                        }else{
                                            $Junio = '<label class="toggle">
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox5" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Junio;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox9" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Octubre;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox2" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $marzo;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox6" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Julio;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox10" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Noviembre;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox3" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Abril;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox7" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Agosto;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
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
                                            <input class="toggle-checkbox" type="checkbox" id="checkbox11" disabled>
                                            <div class="toggle-switch"></div>
                                        </label>'; 
                                        }
                                    endforeach; 
                                    echo $Diciembre;
                                    }else{
                                       '<div class="alert alert-danger"> <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1></div>' ;
                                    } 
                                ?>
                        </b>
                    </div>
                    <br>
                </div>
        </div>
    </div>

<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
<h4 class="mb-4"> <br> <center>COBROS EMITIDOS </center> </h4>
<div class="col-sm-12 col-xl-12">
<div class="table-responsive">
                              <?php if ($listadoCobros): ?>
                                <table id="tabla" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th class="text-center">FORMA DE PAGO</th>
                                      <th class="text-center">BANCO O COOPERATIVA</th>
                                      <th class="text-center">NUMERO DE DOCUMENTO</th>
                                      <th class="text-center">FECHA DE PAGO</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoCobros->result() as $filaTemporal):  ?> 
                                      <tr>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->forma_pago; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->entidad_pago; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->documento_pago; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->fecha_pago; ?>
                                        </td>
                                        <td>
                                          <a class="btn btn-info m-2"  href="<?php echo site_url(); ?>/tickets/GenerarTicket/<?php echo $listadoClientesID->nombre_cliente; ?>/<?php echo $listadoClientesID->apellido_cliente; ?>/<?php echo $listadoClientesID->cedula_cliente; ?>/<?php echo $listadoClientesID->celular_cliente; ?>/<?php echo $listadoClientesID->direccion_cliente; ?>/<?php echo $filaTemporal->fecha_pago; ?>/<?php echo $listadoPlanesID->precio_plan; ?>/<?php echo $listadoPlanesID->detalles_plan; ?>"  target="_blank"> <i class="fa fa-print"></i></a>                                       
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <?php else: ?>
                                    <div class="alert alert-danger">
                                      <h1>NO SE ENCONTRARON PAGOS REGISTRADOS</h1>
                                    </div>
                                    <?php endif; ?>
                                  </div>
</div>

</div>
</div>


</div>

<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
    	dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ],
    	responsive: true,
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
});
</script>


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