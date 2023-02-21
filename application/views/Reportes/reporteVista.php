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
    <div class="row g-4">
        
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
                            <canvas id="graficaCuentasDinero" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficaCuentasTrans" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficaCuentasDineroTrans" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4 text-center">
                <div class="row g-12">
                    <div class="col-sm-3   col-xl-3 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Total de Efectivo</p>
                        <th scope="row">$ <?php echo $totalDineroEfectivo ?></th>   
                        </div>
                    </div>
                    <div class="col-sm-3   col-xl-3 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Total de Depositos</p>
                        <th scope="row">$ <?php echo $totalDineroDeposito ?></th>
                        </div>
                    </div>
                    <div class="col-sm-3   col-xl-3 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Total de Transferencias</p>
                        <th scope="row">$ <?php echo $totalDineroTransferencia ?></th>    
                        </div>
                    </div>
                    <div class="col-sm-3   col-xl-3 ">
                        <div class="bg-secondary rounded h-100 p-4">
                        <p class="mb-2">Total Dinero</p>
                        <th scope="row">$ <?php echo $totalDineroEfectivo + $totalDineroDeposito + $totalDineroTransferencia?></th>    
                        </div>
                    </div>
                </div>
                    </div>
    </div>
    <br>
</div>
</div>


<script>
    // Obtener una referencia al elemento canvas del DOM
const $graficaFormasPago = document.querySelector("#graficaFormasPago");
// Las etiquetas son las que van en el eje X. 
const etiquetasFormasPago = ["Efectivo", "Transferencia ", "Deposito"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosFormasPago = {
    label: "FORMAS DE PAGO MAS USADAS",
    data: [<?php echo round($totalPagadosEfectivo); ?>, <?php echo round($totalPagosTransferencia); ?>, <?php echo round($totalPagosDeposito); ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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
    label: "DINERO POR CADA FORMA DE PAGO",
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
    label: "CANTIDAD DE DEPOSITOS POR CUENTA",
    data: [
    <?php echo round($canDepPi1); ?>, 
    <?php echo round($canDepPi2); ?>, 
    <?php echo round($caDepfGy1); ?>,
    <?php echo round($caDepfGy2); ?>,
    <?php echo round($caDepfCh); ?>,
    <?php echo round($caDepfMr); ?>,
    <?php echo round($caDepfAm); ?>,
    <?php echo round($caDepfPb); ?>,
    <?php echo round($canDepfCt); ?>
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
    // Obtener una referencia al elemento canvas del DOM
const $graficaCuentasDinero = document.querySelector("#graficaCuentasDinero");
// Las etiquetas son las que van en el eje X. 
const etiquetasCuentasDinero = ["Pichincha Cta. 2200000940", "Pichincha Cta. 6010218000", "Guayaquil Cta. 7633119","Guayaquil Cta. 21540468","Chibuleo Cta. 09187442100","Mushuc Runa Cta. 44600033252","Ambato Cta. 044611005290","Produbanco Cta. 12081071685","Cotopaxi Cta. 297811212370"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosCuentasDinero = {
    label: "CANTIDAD DE DINERO POR DEPOSITOS",
    data: [
    <?php echo round($canDinDepPi1); ?>, 
    <?php echo round($canDiDepfPi2); ?>, 
    <?php echo round($canDiDepfGy1); ?>,
    <?php echo round($canDiDepfGy2); ?>,
    <?php echo round($canDiDepfCh); ?>,
    <?php echo round($canDiDepfMr); ?>,
    <?php echo round($canDiDepfAm); ?>,
    <?php echo round($canDiDepfPb); ?>,
    <?php echo round($canDiDepfCt); ?>
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
    new Chart($graficaCuentasDinero, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasCuentasDinero,
        datasets: [
            datosCuentasDinero,
            
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
const $graficaCuentasTrans = document.querySelector("#graficaCuentasTrans");
// Las etiquetas son las que van en el eje X. 
const etiquetasCuentasTrans = ["Pichincha Cta. 2200000940", "Pichincha Cta. 6010218000", "Guayaquil Cta. 7633119","Guayaquil Cta. 21540468","Chibuleo Cta. 09187442100","Mushuc Runa Cta. 44600033252","Ambato Cta. 044611005290","Produbanco Cta. 12081071685","Cotopaxi Cta. 297811212370"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosCuentasTrans = {
    label: "CANTIDAD DE TRANSFERENCIAS POR CUENTA",
    data: [
    <?php echo round($canTranPi1); ?>, 
    <?php echo round($caTranPi2); ?>, 
    <?php echo round($cTranfGy1); ?>,
    <?php echo round($cTranfGy2); ?>,
    <?php echo round($cTranfCh); ?>,
    <?php echo round($cTranfMr); ?>,
    <?php echo round($cTranfAm); ?>,
    <?php echo round($cTranfPb); ?>,
    <?php echo round($caTranfCt); ?>
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
    new Chart($graficaCuentasTrans, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasCuentasTrans,
        datasets: [
            datosCuentasTrans,
            
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
const $graficaCuentasDineroTrans = document.querySelector("#graficaCuentasDineroTrans");
// Las etiquetas son las que van en el eje X. 
const etiquetasCuentasDineroTrans = ["Pichincha Cta. 2200000940", "Pichincha Cta. 6010218000", "Guayaquil Cta. 7633119","Guayaquil Cta. 21540468","Chibuleo Cta. 09187442100","Mushuc Runa Cta. 44600033252","Ambato Cta. 044611005290","Produbanco Cta. 12081071685","Cotopaxi Cta. 297811212370"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosCuentasDineroTrans = {
    label: "CANTIDAD DE DINERO POR TRANSFERENCIAS",
    data: [
    <?php echo round($canDinTranPi1); ?>, 
    <?php echo round($canDTranfPi2); ?>, 
    <?php echo round($canDTranfGy1); ?>,
    <?php echo round($canDTranfGy2); ?>,
    <?php echo round($canDTranfCh); ?>,
    <?php echo round($canDTranfMr); ?>,
    <?php echo round($canDTranfAm); ?>,
    <?php echo round($canDTranfPb); ?>,
    <?php echo round($canDTranfCt); ?>
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
    new Chart($graficaCuentasDineroTrans, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasCuentasDineroTrans,
        datasets: [
            datosCuentasDineroTrans,
            
        ]
    },
    options: {
        responsive: true,
        aspectRatio: 2,
        
    }
});
</script>



<script type="text/javascript">
$(document).ready(function () {
    $('#tabla_deposito').DataTable({
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
$(document).ready(function () {
    $('#tabla_transferencia').DataTable({
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