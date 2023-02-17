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
                                <p class="mb-2">Total Pagos en Efectivo</p>
                                <h6 class="mb-0"><?php echo $totalPagadosEfectivo ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pagos en Deposito</p>
                                <h6 class="mb-0"><?php echo $totalPagadosDeposito ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Pagos en Transferencia</p>
                                <h6 class="mb-0"><?php echo $totalPagadosTransferencia ?></h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- fin de la vistas generales-->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <h6 class="mb-4">Cuentas Deposito</h6>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Pichincha Cta. 2200000940
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $canDepPi1 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDinDepPi1 ==null){echo("0");}else{echo $canDinDepPi1; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Pichincha Cta. 6010218000
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $canDepPi2 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfPi2 ==null){echo("0");}else{echo $canDiDepfPi2; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Guayaquil Cta. 7633119
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfGy1 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfGy1 ==null){echo("0");}else{echo $canDiDepfGy1; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Guayaquil Cta. 21540468
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfGy2 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfGy2 ==null){echo("0");}else{echo $canDiDepfGy2; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Chibuleo Cta. 09187442100
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfCh ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfCh ==null){echo("0");}else{echo $canDiDepfCh; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            Mushuc Runa Cta. 44600033252
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfMr ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfMr ==null){echo("0");}else{echo $canDiDepfMr; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                            aria-expanded="false" aria-controls="collapseSeven">
                                            Ambato Cta. 044611005290
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfAm ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfAm ==null){echo("0");}else{echo $canDiDepfAm; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                            aria-expanded="false" aria-controls="collapseEight">
                                            Produbanco Cta. 12081071685
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $caDepfPb ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfPb ==null){echo("0");}else{echo $canDiDepfPb; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                            aria-expanded="false" aria-controls="collapseNine">
                                            Cotopaxi Cta. 297811212370
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Depositantes</p>
                                                        <h6 class="mb-0"><?php echo $canDepfCt ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDiDepfCt ==null){echo("0");}else{echo $canDiDepfCt; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

<!-- Inicio Cuentas Transferencia-->
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <h6 class="mb-4">Cuentas Transferencia</h6>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne1" aria-expanded="true"
                                            aria-controls="collapseOne1">
                                            Pichincha Cta. 2200000940
                                        </button>
                                    </h2>
                                    <div id="collapseOne1" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $canTranPi1 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDinTranPi1 ==null){echo("0");}else{echo $canDinTranPi1; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" 
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2"
                                            aria-expanded="false" aria-controls="collapseTwo2">
                                            Pichincha Cta. 6010218000
                                        </button>
                                    </h2>
                                    <div id="collapseTwo2" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $caTranPi2 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfPi2 ==null){echo("0");}else{echo $canDTranfPi2; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree3"
                                            aria-expanded="false" aria-controls="collapseThree3">
                                            Guayaquil Cta. 7633119
                                        </button>
                                    </h2>
                                    <div id="collapseThree3" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfGy1 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfGy1 ==null){echo("0");}else{echo $canDTranfGy1; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour4"
                                            aria-expanded="false" aria-controls="collapseFour4">
                                            Guayaquil Cta. 21540468
                                        </button>
                                    </h2>
                                    <div id="collapseFour4" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfGy2 ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfGy2 ==null){echo("0");}else{echo $canDTranfGy2; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive5"
                                            aria-expanded="false" aria-controls="collapseFive5">
                                            Chibuleo Cta. 09187442100
                                        </button>
                                    </h2>
                                    <div id="collapseFive5" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfCh ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfCh ==null){echo("0");}else{echo $canDTranfCh; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix6"
                                            aria-expanded="false" aria-controls="collapseSix6">
                                            Mushuc Runa Cta. 44600033252
                                        </button>
                                    </h2>
                                    <div id="collapseSix6" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfMr ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfMr ==null){echo("0");}else{echo $canDTranfMr; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSeven7"
                                            aria-expanded="false" aria-controls="collapseSeven7">
                                            Ambato Cta. 044611005290
                                        </button>
                                    </h2>
                                    <div id="collapseSeven7" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfAm ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfAm ==null){echo("0");}else{echo $canDTranfAm; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseEight8"
                                            aria-expanded="false" aria-controls="collapseEight8">
                                            Produbanco Cta. 12081071685
                                        </button>
                                    </h2>
                                    <div id="collapseEight8" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $cTranfPb ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfPb ==null){echo("0");}else{echo $canDTranfPb; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseNine9"
                                            aria-expanded="false" aria-controls="collapseNine9">
                                            Cotopaxi Cta. 297811212370
                                        </button>
                                    </h2>
                                    <div id="collapseNine9" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Clientes</p>
                                                        <h6 class="mb-0"><?php echo $caTranfCt ?></h6>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                                    <div class="ms-3">
                                                        <p class="mb-2">Dinero</p>
                                                        <h6 class="mb-0"><?php if($canDTranfCt ==null){echo("0");}else{echo $canDTranfCt; } ?></h6>
                                                    </div>
                                            </div>
                                        </div>                                         </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br>
            </div>


