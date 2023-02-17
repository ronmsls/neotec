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
    <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2">Total Pagos en Efectivo</p>
                                <h6 class="mb-0"><?php echo $totalPagadosEfectivo ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-4">
                                <p class="mb-2">Total Dinero en Efectivo</p>
                                <h6 class="mb-0"><?php echo $totalDineroEfectivo ?></h6>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12" >
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" >
                        <div class="table-responsive">
                        <table class="table table-striped" id="tabla_deposito">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Pichincha Cta. 2200000940</th>
                                        <th scope="col">Pichincha Cta. 6010218000</th>
                                        <th scope="col">Guayaquil Cta. 7633119</th>
                                        <th scope="col">Guayaquil Cta. 21540468</th>
                                        <th scope="col">Chibuleo Cta. 09187442100</th>
                                        <th scope="col">Mushuc Runa Cta. 44600033252</th>
                                        <th scope="col">Ambato Cta. 044611005290</th>
                                        <th scope="col">Produbanco Cta. 12081071685</th>
                                        <th scope="col">Cotopaxi Cta. 297811212370</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $canDepPi1 ?></th>
                                        <th scope="row"><?php echo $canDepPi2 ?></th>
                                        <th scope="row"><?php echo $caDepfGy1 ?></th>
                                        <th scope="row"><?php echo $caDepfGy2 ?></th>
                                        <th scope="row"><?php echo $caDepfCh ?></th>
                                        <th scope="row"><?php echo $caDepfMr ?></th>
                                        <th scope="row"><?php echo $caDepfAm ?></th>
                                        <th scope="row"><?php echo $caDepfPb ?></th>
                                        <th scope="row"><?php echo $canDepfCt ?></th>
                                        <th scope="row"><?php echo $totalPagosDeposito ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php if($canDinDepPi1 ==null){echo("0");}else{echo $canDinDepPi1; } ?></th>
                                        <th scope="row"><?php if($canDiDepfPi2 ==null){echo("0");}else{echo $canDiDepfPi2; } ?></th>
                                        <th scope="row"><?php if($canDiDepfGy1 ==null){echo("0");}else{echo $canDiDepfGy1; } ?></th>
                                        <th scope="row"><?php if($canDiDepfGy2 ==null){echo("0");}else{echo $canDiDepfGy2; } ?></th>
                                        <th scope="row"><?php if($canDiDepfCh ==null){echo("0");}else{echo $canDiDepfCh; } ?></th>
                                        <th scope="row"><?php if($canDiDepfMr ==null){echo("0");}else{echo $canDiDepfMr; } ?></th>
                                        <th scope="row"><?php if($canDiDepfAm ==null){echo("0");}else{echo $canDiDepfAm; } ?></th>
                                        <th scope="row"><?php if($canDiDepfPb ==null){echo("0");}else{echo $canDiDepfPb; } ?></th>
                                        <th scope="row"><?php if($canDiDepfCt ==null){echo("0");}else{echo $canDiDepfCt; } ?></th>
                                        <th scope="row"><?php echo $totalDineroDeposito ?></th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <div class="table-responsive">
                        <table class="table table-striped" id="tabla_transferencia">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Pichincha Cta. 2200000940</th>
                                        <th scope="col">Pichincha Cta. 6010218000</th>
                                        <th scope="col">Guayaquil Cta. 7633119</th>
                                        <th scope="col">Guayaquil Cta. 21540468</th>
                                        <th scope="col">Chibuleo Cta. 09187442100</th>
                                        <th scope="col">Mushuc Runa Cta. 44600033252</th>
                                        <th scope="col">Ambato Cta. 044611005290</th>
                                        <th scope="col">Produbanco Cta. 12081071685</th>
                                        <th scope="col">Cotopaxi Cta. 297811212370</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $canTranPi1 ?></th>
                                        <th scope="row"><?php echo $caTranPi2 ?></th>
                                        <th scope="row"><?php echo $cTranfGy1 ?></th>
                                        <th scope="row"><?php echo $cTranfGy2 ?></th>
                                        <th scope="row"><?php echo $cTranfCh ?></th>
                                        <th scope="row"><?php echo $cTranfMr ?></th>
                                        <th scope="row"><?php echo $cTranfAm ?></th>
                                        <th scope="row"><?php echo $cTranfPb ?></th>
                                        <th scope="row"><?php echo $caTranfCt ?></th>
                                        <th scope="row"><?php echo $totalPagosTransferencia ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php if($canDinTranPi1 ==null){echo("0");}else{echo $canDinTranPi1; } ?></th>
                                        <th scope="row"><?php if($canDTranfPi2 ==null){echo("0");}else{echo $canDTranfPi2; } ?></th>
                                        <th scope="row"><?php if($canDTranfGy1 ==null){echo("0");}else{echo $canDTranfGy1; } ?></th>
                                        <th scope="row"><?php if($canDTranfGy2 ==null){echo("0");}else{echo $canDTranfGy2; } ?></th>
                                        <th scope="row"><?php if($canDTranfCh ==null){echo("0");}else{echo $canDTranfCh; } ?></th>
                                        <th scope="row"><?php if($canDTranfMr ==null){echo("0");}else{echo $canDTranfMr; } ?></th>
                                        <th scope="row"><?php if($canDTranfAm ==null){echo("0");}else{echo $canDTranfAm; } ?></th>
                                        <th scope="row"><?php if($canDTranfPb ==null){echo("0");}else{echo $canDTranfPb; } ?></th>
                                        <th scope="row"><?php if($canDTranfCt ==null){echo("0");}else{echo $canDTranfCt; } ?></th>
                                        <th scope="row"><?php echo $totalDineroTransferencia ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Efectivo</th>
                                        <th scope="col">Deposito</th>
                                        <th scope="col">Transferecia</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $totalPagadosEfectivo ?></th>
                                        <th scope="row"><?php echo $totalPagosDeposito ?></th>
                                        <th scope="row"><?php echo $totalPagosTransferencia ?></th>
                                        <th scope="row"><?php echo $totalPagadosEfectivo + $totalPagosDeposito + $totalPagosTransferencia  ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php echo $totalDineroEfectivo ?></th>
                                        <th scope="row"><?php echo $totalDineroDeposito ?></th>
                                        <th scope="row"><?php echo $totalDineroTransferencia ?></th>
                                        <th scope="row"><?php echo $totalDineroEfectivo + $totalDineroDeposito + $totalDineroTransferencia?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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