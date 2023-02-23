        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark"> 
                <a href="<?php echo site_url(); ?>/dashboard/dashboardView" class="navbar-brand mx-4 mb-3">
                    <img  src="<?php echo base_url(); ?>/assets/img/Logo.png" alt="" style="width: 190px; height: 70px;">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo base_url(); ?>/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $this->session->userdata("usuario_Conectado")['nombre']?></h6>
                        <span><?php echo $this->session->userdata("usuario_Conectado")['rol']  ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?php echo site_url(); ?>/dashboard/dashboardView" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                <?php if ($this->session->userdata("usuario_Conectado")): ?>
                    
                    <a href="<?php echo site_url(); ?>/clientes/listarClientes" class="nav-item nav-link"><i class="fa fa-users  me-2"></i>Clientes</a>
                    <a href="<?php echo site_url(); ?>/planes/listarPlanes" class="nav-item nav-link"><i class="fa fa-rocket me-2"></i>Planes</a>
                    <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR" or $this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                        <a href="<?php echo site_url(); ?>/usuarios/listarUsuarios" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>Usuarios</a>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR" or $this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                        <a href="<?php echo site_url(); ?>/ips/listarIp" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>IPS</a>
                    <?php endif; ?>
                    <a href="<?php echo site_url(); ?>/cobros/listaCobros" class="nav-item nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i>Cobros</a>
                    <a href="<?php echo site_url(); ?>/reportes/reporteFechas" class="nav-item nav-link"><i class="fa fa-book" aria-hidden="true"></i>Reportes</a>
                    <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                    <a href="<?php echo site_url(); ?>/cobros/cobrosEmitidos" class="nav-item nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i>Cobros Emitidos</a>
                    <?php endif; ?>
                <?php endif; ?> 
                </div>
            </nav>
        </div>
<!-- Content Start --> 
<div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <!-- inicio de sesion -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo base_url(); ?>/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"> <?php echo $this->session->userdata("usuario_Conectado")['email']  ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?php echo site_url(); ?>/Seguridades/cerrarSesion" class="dropdown-item">Salir</a>
                        </div>
                    </div>
                </div>
                
            </nav>
            <!-- Navbar End -->
<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
<h4 class="mb-4"> <br> <center>DATOS DEL CLIENTE </center> </h4> 

<div class="col-sm-12 col-xl-12">
<a class="btn btn-success"  href="<?php echo site_url(); ?>/cobros/nuevoCobro/<?php echo $listadoClientesID->id_cliente; ?>/<?php echo $listadoClientesID->fk_id_plan; ?>" > Nuevo Cobro</i></a>
</div>

<input type="hidden" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $listadoPlanesID->precio_plan; ?>" required >     
    <div class="bg-secondary rounded h-100 p-4">
    <b>CÉDULA DEL CLIENTE: </b>
    <br>
    <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->cedula_cliente; ?>" aria-label="default input example">
    <b>NOMBRES DEL CLIENTE: </b>
    <br>
    <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->nombre_cliente; ?> <?php echo $listadoClientesID->apellido_cliente; ?>" aria-label="default input example">
    <b>DIRECCIÓN DEL CLIENTE: </b>
    <br>
    <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->direccion_cliente; ?>" aria-label="default input example">
    <b>CELULAR DEL CLIENTE: </b>
    <br>
    <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->celular_cliente; ?>" aria-label="default input example">
    <b>CORREO ELECTRÓNICO DEL CLIENTE: </b>
    <br>
    <input class="form-control mb-3" type="text" value="<?php echo $listadoClientesID->correo_cliente; ?>" aria-label="default input example">
    </div>  
</div>
</div>  

    <div class="container-fluid pt-4 px-4">
      <div class="row g-12">
        <div class="col-sm-12 col-xl-12">
          <div class="bg-secondary rounded h-100 p-4">
            <div id="map" style="height: 100px; width: 100%; "></div>  
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid pt-4 px-4 text-center">
                <div class="row g-12">
                    <div class="col-sm-3   col-xl-4 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Plan Actual</p>
                        <th scope="row"><?php echo $nombrePlan ?></th> 
                        </div>
                    </div>
                    <div class="col-sm-3   col-xl-4 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Precio Plan</p>
                        <th scope="row">$ <?php echo $precioPlan ?></th> 
                        </div>
                    </div>

                    <div class="col-sm-3   col-xl-4 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Cantidad de Pagos</p>
                        <th scope="row"><?php echo $mesesCancelados ?></th> 
                        </div>
                    </div>
                </div>
                    </div>

    <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficaDineroFormasPago" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficaCuentas" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

<div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded  justify-content-left mx-0">
            <h4 class="mb-4"> <br> <center>MESES QUE ADEUDA EL CLIENTE</center> </h4>
            <hr>
            <center><p>Los meses que se encuentran en gris son los meses que el cliente no ha realizado los pagos</p></center>
            <hr>
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
                                            <label class="toggle" >
                                                <input class="toggle-checkbox"  type="checkbox" id="checkbox" checked disabled>
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


<br>
</div>
<?php
  // Cargar los datos de latitud y longitud desde la base de datos
  $latitud = $listadoClientesID->latitud_cliente;
  $longitud = $listadoClientesID->longitud_cliente;
?>
<script type="text/javascript"> 
 var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $latitud; ?>, lng: <?php echo $longitud; ?>},
          zoom: 18
        });
        var marker = new google.maps.Marker({
          position: {lat: <?php echo $latitud; ?>, lng: <?php echo $longitud; ?>},
          map: map,
	  title: 'Acuario de Gijón'
        });
      }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1ka3BMCAd22ra5vuDn5SAjQomGc4UDCw&callback=initMap"></script>


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
<script>
    // Obtener una referencia al elemento canvas del DOM
const $graficaDineroFormasPago = document.querySelector("#graficaDineroFormasPago");
// Las etiquetas son las que van en el eje X. 
const etiquetasDineroFormasPago = ["Efectivo", "Transferencia ", "Deposito"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosDineroFormasPago = {
    label: "FORMA DE PAGO",
    data: [<?php echo round($totalDineroEfectivo); ?>, <?php echo round($totalDineroTransferencia); ?>, <?php echo round($totalDineroDeposito); ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: [
        "#15D629",
        "#10A31F",
        "#38FF49",
], // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
    new Chart($graficaDineroFormasPago, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasDineroFormasPago,
        datasets: [
            datosDineroFormasPago,
            
        ]
    },
    options: {
        responsive: true,
        aspectRatio: 2,
        
    }
});
</script>

<script>
    // Obtener una referencia al elemento canvas del DOM
const $graficaCuentas = document.querySelector("#graficaCuentas");
// Las etiquetas son las que van en el eje X. 
const etiquetasCuentas = ["Pichincha Cta. 2200000940", "Pichincha Cta. 6010218000", "Guayaquil Cta. 7633119","Guayaquil Cta. 21540468","Chibuleo Cta. 09187442100","Mushuc Runa Cta. 44600033252","Ambato Cta. 044611005290","Produbanco Cta. 12081071685","Cotopaxi Cta. 297811212370"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosCuentas = {
    label: "DINERO REGISTRADO POR CUENTAS",
    data: [
    <?php if($B1<1){
        $B1=0;
        echo round($B1);
    }else{
        echo round($B1);
    } ?>,  
    <?php if($B2<1){
        $B2=0;
        echo round($B2);
    }else{
        echo round($B2);
    } ?>, 
    <?php if($B3<1){
        $B3=0;
        echo round($B3);
    }else{
        echo round($B3);
    } ?>,
    <?php if($B4<1){
        $B4=0;
        echo round($B4);
    }else{
        echo round($B4);
    } ?>,
    <?php if($B5<1){
        $B5=0;
        echo round($B5);
    }else{
        echo round($B5);
    } ?>,
    <?php if($B6<1){
        $B6=0;
        echo round($B6);
    }else{
        echo round($B6);
    } ?>,
    <?php if($B7<1){
        $B7=0;
        echo round($B7);
    }else{
        echo round($B7);
    } ?>,
    <?php if($B8<1){
        $B8=0;
        echo round($B8);
    }else{
        echo round($B8);
    } ?>,
    <?php if($B9<1){
        $B9=0;
        echo round($B9);
    }else{
        echo round($B9);
    } ?>
], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: [
        "#43C2D9",
        "#02CCF0",
        "#02879E",
        "#43C2D9",
        "#02CCF0",
        "#02879E",
        "#02CCF0",
        "#02879E"
], // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
    new Chart($graficaCuentas, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasCuentas,
        datasets: [
            datosCuentas,
            
        ]
    },
    options: {
        responsive: true,
        aspectRatio: 2,
        
    }
});
</script>