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
    <div class="col-md-11 text-left">
    <br>
<h1> <center>Registro de IPS</center> </h1>
<form action="<?php echo site_url(); ?>/ips/guardarIp" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <br>
    <br>
    <b>SELECCIONA LA CANTIDAD DE DIRECCIONES IP: </b>
    <br>
    <br>
    <select class="form-select" name="cantidadIps" id="cantidadIps" required>
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="30">30</option>
    </select>
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2">GUARDAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/ips/listarIps" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>
</form>
<br>
    </div>
</div>

