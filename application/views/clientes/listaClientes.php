<?php
if ($clientesCant) {
  $totalClientes=sizeof($clientesCant->result());//contando los generos de la bdd
}
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
            <div class="container-fluid pt-4 px-4">
                <div class="row g-12">
                    <div class="col-sm-6 col-xl-6">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Clientes</p>
                                <h6 class="mb-0"><?php echo $totalClientes ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                          <center>
                            <h2>LISTADO DE CLIENTES</h2> 
                          </center>
                          <center>
                            <a href="<?php echo site_url(); ?>/clientes/nuevoCliente" class="btn btn-success m-2">Agregar Nuevo</a>
                            <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                            <a href="<?php echo site_url(); ?>/Tareas_programadas/clientes_sin_pagos" class="btn btn-danger m-2">CORTES</a>
                            <?php endif; ?>
                          </center>
                            <div class="table-responsive">
                              <hr>
                              <?php if ($listadoClientes): ?>
                                <table id="tablaClientes" class="table table-striped">
                                  <thead>
                                    <tr>        
                                        <th class="text-center">ID</th>    
                                      <th class="text-center">CEDULA CLIENTE</th>
                                      <th class="text-center">NOMBRES CLIENTE</th>
                                      <th class="text-center">APELLIDOS CLIENTE</th>
                                      <th class="text-center">DIRECCIÓN CLIENTE</th>
                                      <th class="text-center">CELULAR CLIENTE</th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoClientes->result() as $filaTemporal):  ?>
                                      <tr>
                                      <td class="text-center">
                                          <?php echo $filaTemporal->id_cliente; ?> 
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->cedula_cliente; ?> 
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->nombre_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->apellido_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->direccion_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->celular_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <a class="btn btn-success"  href="<?php echo site_url(); ?>/clientes/editarCliente/<?php echo $filaTemporal->id_cliente; ?>/<?php echo $filaTemporal->fk_id_plan; ?>/<?php echo $filaTemporal->fk_id_ip; ?>" > <i class="fa fa-pen"></i></a>
                                        </td>
                                        <td>
                                          <a class="btn btn-info"  href="<?php echo site_url(); ?>/clientes/detallesCliente/<?php echo $filaTemporal->id_cliente; ?>/<?php echo $filaTemporal->fk_id_plan; ?>" ><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <?php else: ?>
                                    <div class="alert alert-primary" role="alert">
                                      NO SE ENCONTRARON CLIENTES REGISTRADOS!
                                    </div>
                                    <?php endif; ?>
                                  </div>
                                  <br>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>

<script type="text/javascript">
$(document).ready(function () {
    $('#tablaClientes').DataTable({
    	dom: 'Blfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ],
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
});
</script>

<script type="text/javascript">
    function confirmarEliminacion(id_cliente){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              message: '¿Esta seguro de eliminar el equipo de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/clientes/procesarEliminacion/"+id_cliente;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>
