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
                                <p class="mb-2">Total de Pagados</p>
                                <h6 class="mb-0"><?php echo $pagadosCant ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-circle fa-3x text-primary"></i>
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
                    
                </div>
            </div>
            <!-- fin de la vistas generales-->

            <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                        <h5>Cantidad de clientes pagados y deudores</h5>
                            <canvas id="graficoCircular1" ></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="grafica" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficaFormasPago" ></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
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
                <div class="row g-12">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <h5>Cantidad de pagos puntuales e inpuntuales</h5>
                            <canvas id="graficaInyPun" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-xl-12 " >
                        <div class="bg-secondary rounded p-4 text-dark text-center">
                            Seleccione las fechas para generar un Dashboard por fechas
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
            <form action="<?php echo site_url(); ?>/reportes/reporteVista" method="post" enctype="multipart/form-data">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Seleccione la fecha de inicio</p>
                                <input type="date"   name="fechaInicio" id="fechaInicio" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-calendar fa-3x"  aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Seleccione la fecha de fin</p>
                                <input type="date"   name="fechaFin" id="fechaFin" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded p-4 text-center">
                            <button type="submit" name="button"  class="btn btn-success m-2">ACEPTAR</a></button>
                        </div>
                    </div>
                      
                </div>
            </form>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-12 col-xl-12 " >
                        <div class="bg-secondary rounded p-4 text-dark text-center">
                            Ingrese el número de cédula o pasaporte del cliente
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
            <form action="<?php echo site_url(); ?>/clientes/reporteCliente" method="post" enctype="multipart/form-data" id="fr_cliente">
                <div class="row g-2">
                    <div class="col-sm-6 col-xl-8">
                        <div class="bg-secondary rounded p-4 text-dark text-center">
                            <div class="ms-3">
                                <p class="mb-1">Ingrese el número de cédula o pasaporte</p>
                                <input type="text" class="form-control" name="cedula_cliente" id= "cedula_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
                                <div id="error-message" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded p-4 text-dark text-center">
                        <p class="mb-2"></p>
                            <button type="submit" name="button"  class="btn btn-success m-2">ACEPTAR</a></button>
                        </div>
                    </div>
                      
                </div>
            </form>
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
        "#02879E",
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
    // Obtener una referencia al elemento canvas del DOM 
const $grafica = document.querySelector("#grafica");
// Las etiquetas son las que van en el eje X. 
const etiquetas = ["Plan Básico", "Plan Premium", "Plan Premium Plus"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosPlanes = {
    label: "PLANES MAS SOLICITADOS",
    data: [<?php echo round($plan1); ?>, <?php echo round($plan2); ?>, <?php echo round($plan3); ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: [
        "#BA6F13",
        "#ED8D18",
        "#F0AF60",
], // Color de fondo
    borderColor: 'white', // Color del borde
    borderWidth: 1,// Ancho del borde
};
    new Chart($grafica, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosPlanes,
            
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
const $graficaFormasPago = document.querySelector("#graficaFormasPago");
// Las etiquetas son las que van en el eje X. 
const etiquetasFormasPago = ["Efectivo", "Transferencia ", "Deposito"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosFormasPago = {
    label: "FORMAS DE PAGO MAS USADAS",
    data: [<?php echo round($efectivo); ?>, <?php echo round($transferencia); ?>, <?php echo round($deposito); ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: [
        "#15D629",
        "#10A31F",
        "#38FF49",
], // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
    new Chart($graficaFormasPago, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasFormasPago,
        datasets: [
            datosFormasPago,
            
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
const $graficaDineroFormasPago = document.querySelector("#graficaDineroFormasPago");
// Las etiquetas son las que van en el eje X. 
const etiquetasDineroFormasPago = ["Efectivo", "Transferencia ", "Deposito"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosDineroFormasPago = {
    label: "DINERO REGISTRADO POR FORMA DE PAGO",
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

<script>
    var graficaInyPun = new Chart($("#graficaInyPun"), {
  type: "pie",
  data: {
    labels: ["PUNTUALES", "INPUNTUALES"],
    datasets: [{
      label: "Total",
      data: [
        <?php echo round($puntuales); ?>, 
        <?php echo round($inpuntuales); ?>,],
      backgroundColor: [
        "#BA6F13",
        "#F0AF60"
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
