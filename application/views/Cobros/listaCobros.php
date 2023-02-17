<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                              <center>
                                <h2>LISTADO DE CLIENTES</h2> 
                              </center>
                              <center>
                                <a href="<?php echo site_url(); ?>/clientes/nuevoCliente" class="btn btn-success m-2">Agregar Nuevo</a>
                              </center>
                              <div class="table-responsive">
                                <hr>
                              <?php if ($listadoClientes): ?>
                                <table id="tabla" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th class="text-center">DETALLES</th>
                                      <th class="text-center">CEDULA CLIENTE</th>
                                      <th class="text-center">NOMBRES CLIENTE</th> 
                                      <th class="text-center">DIRECCIÓN CLIENTE</th>
                                      <th class="text-center">CELULAR CLIENTE</th>
                                      <th class="text-center">CORREO CLIENTE</th>
                                      <th></th>
                                      <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                      <th></th>
                                      <?php endif; ?>
                                      <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                      <th></th>
                                      <?php endif; ?>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoClientes->result() as $filaTemporal):  ?>
                                      <tr>
                                        <td class="text-center">
                                          <a class="btn btn-info m-2"  href="<?php echo site_url(); ?>/clientes/detallesCliente/<?php echo $filaTemporal->id_cliente; ?>/<?php echo $filaTemporal->fk_id_plan; ?>" > <?php echo $filaTemporal->id_cliente; ?></i></a>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->cedula_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->nombre_cliente; ?>
                                          <?php echo $filaTemporal->apellido_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->direccion_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->celular_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->correo_cliente; ?>
                                        </td>
                                        <td class="text-center">
                                          <a class="btn btn-success"  href="<?php echo site_url(); ?>/cobros/nuevoCobro/<?php echo $filaTemporal->id_cliente; ?>/<?php echo $filaTemporal->fk_id_plan; ?>" > Cobrar</i></a>
                                        </td>
                                        <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                        <td>
                                        <a class="btn btn-warning"  href="<?php echo site_url(); ?>/clientes/descativarCliente/<?php echo $filaTemporal->cedula_cliente; ?>" ><i class="fa fa-ban"></i></a>
                                        </td>
                                        <?php endif; ?>
                                        <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                        <td>
                                          <a class="btn btn-info"  href="<?php echo site_url(); ?>/Tareas_programadas/mensaje/<?php echo $filaTemporal->celular_cliente; ?>" ><i class="fa fa-comment"></i></a>
                                        </td>
                                        <?php endif; ?>
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
            </div>

<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
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

