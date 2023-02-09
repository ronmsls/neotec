<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                          <center>
                            <h2>LISTADO DE COBROS</h2> 
                          </center>
                          <center>
                          </center>
                            <div class="table-responsive">
                              <hr>
                              <?php if ($listadoCobros): ?>
                                <table id="tablaClientes" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th class="text-center">DETALLES</th>
                                      <th class="text-center">CEDULA CLIENTE</th>
                                      <th class="text-center">NOMBRES CLIENTE</th>
                                      <th class="text-center">APELLIDOS CLIENTE</th>
                                      <th class="text-center">DIRECCIÓN CLIENTE</th>
                                      <th class="text-center">CELULAR CLIENTE</th>
                                      <th></th>
                                      <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                      <th></th>
                                      <?php endif; ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoCobros->result() as $filaTemporal):  ?>
                                      <tr>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->id_pago; ?></i>
                                        </td>
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
                                          <?php echo $filaTemporal->cantidad_pago; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->fecha_pago; ?>
                                        </td>
                                        <td class="text-center">
                                          <a class="btn btn-success"  href="<?php echo site_url(); ?>/clientes/editarCliente/<?php echo $filaTemporal->id_cliente; ?>/<?php echo $filaTemporal->fk_id_plan; ?>/<?php echo $filaTemporal->fk_id_ip; ?>" > <i class="fa fa-pen"></i></a>
                                        </td>
                                        <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                        <td>
                                          <a class="btn btn-danger" href='javascript:void(0)' onclick="confirmarEliminacion('<?php echo$filaTemporal->id_cliente; ?>');"><i class="fa fa-trash"></i>                                          
                                        </td>
                                        <?php endif; ?>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <?php else: ?>
                                    <div class="alert alert-primary" role="alert">
                                      NO SE ENCONTRARON COBROS REGISTRADOS!
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