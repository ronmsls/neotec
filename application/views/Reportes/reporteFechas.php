<?php
$totalPlanes=0;
$totalClientes=0;
$totalUsuarios=0;
$totalPagados=0;

if ($planesCant) {
    $totalPlanes=sizeof($planesCant->result());//contando los generos de la bdd
}
if ($clientesCant) {
    $totalClientes=sizeof($clientesCant->result());//contando los generos de la bdd
}
if ($usuariosCant) {
    $totalUsuarios=sizeof($usuariosCant->result());//contando los generos de la bdd 
}

$totalPagados =   $pagadosCant - $totalClientes;

?>
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
            <!-- vistas generales de las cantidades de clientes, planes y usuarios -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-rocket fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Planes</p>
                                <h6 class="mb-0"><?php echo $totalPlanes ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Clientes</p>
                                <h6 class="mb-0"><?php echo $totalClientes ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Usuarios</p>
                                <h6 class="mb-0"><?php echo $totalUsuarios ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de la vistas generales-->

<!-- vistas generales de las cantidades de clientes, planes y usuarios -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <a href="<?php echo site_url(); ?>/clientes/deudoresClientes" ><i class="fa fa-chart-line fa-3x text-primary"></i></a>
                            <div class="ms-3">
                                <p class="mb-2">Total de Deudores</p>
                                <h6 class="mb-0">
                                    <?php 
                                    if($totalPagados<1){
                                        echo ($totalPagados) * -1;
                                    }else{
                                        echo $totalPagados;
                                    } ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Pagados</p>
                                <h6 class="mb-0"><?php echo $pagadosCant ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <a href="<?php echo site_url(); ?>/dashboard/dashboardFormasPago" ><i class="fa fa-credit-card fa-3x text-primary" aria-hidden="true"></i></a>
                            <div class="ms-3">
                                <p class="mb-2">Total de Dinero Pagado</p>
                                <h6 class="mb-0"><?php if($pagoCant ==null){echo("0");}else{echo $pagoCant; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficoCircular1" height="250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            </div>
        <!-- Content End -->

<script>
    var graficoCircular1 = new Chart($("#graficoCircular1"), {
  type: "pie",
  data: {
    labels: ["Deudores", "Pagados"],
    datasets: [{
      label: "Total",
      data: [<?php if($totalPagados<1){
             echo round($totalPagados) * -1;
             }else{
             echo round($totalPagados);
             } ?>, 
             <?php echo round($pagadosCant,2); ?>],
      backgroundColor: [
        "#090159",
        "#02CCF0"
      ],
      offset: [
        20
      ]
    }]
  },
  options: {
    color: "black",
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 2,
    layout: {
      padding: 20
    },
    rotation: 90,
    plugins: {
      legend: {
        position: "right",
        labels: {
          boxWidth: 25,
          boxHeight: 25,
          font: {
            weight: "bold",
            family: "Noto Sans"
          }
        }
      }
    }
  }
})
</script>

<script>
  function initMap() {
    if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    var pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: pos
    });

    var marker = new google.maps.Marker({
      position: pos,
      map: map
    });
  }, function() {
    handleLocationError(true, infoWindow, map.getCenter());
  });
} else {
  // Browser doesn't support Geolocation
  handleLocationError(false, infoWindow, map.getCenter());
}
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1ka3BMCAd22ra5vuDn5SAjQomGc4UDCw&callback=initMap"></script>