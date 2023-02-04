<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                          <center>
                            <h2>LISTADO DE PLANES</h2>
                          </center>
                          <center>
                            <a href="<?php echo site_url(); ?>/planes/nuevoPlan" class="btn btn-success m-2">Agregar Nuevo</a>
                          </center>
                            <div class="table-responsive">
                              <hr>
                              <br>
                              <?php if ($listadoPlanes): ?>
                                <table class="table table-striped" id="tabla_planes">
                                  <thead>
                                    <tr>
                                      <th class="text-center">ID</th>
                                      <th class="text-center">NOMBRE PLAN</th>
                                      <th class="text-center">DETALLE PLAN</th>
                                      <th class="text-center">PRECIO PLAN</th>
                                      <th class="text-center">MEGAS DE SUBIDA</th>
                                      <th class="text-center">MEGAS DE BAJADA</th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoPlanes->result() as $filaTemporal):  ?>
                                      <tr>
                                        <td class="text-center">
                                          <a class="btn btn-info m-2"  href="<?php echo site_url(); ?>/planes/detallesPlan/<?php echo $filaTemporal->id_plan; ?>" > <?php echo $filaTemporal->id_plan; ?></i></a>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->nombre_plan; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->detalles_plan; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->precio_plan; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->meg_sub_plan; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->meg_baj_plan; ?>
                                        </td>
                                        <td class="text-center">
                                          <a class="btn btn-success"  href="<?php echo site_url(); ?>/planes/editarPlan/<?php echo $filaTemporal->id_plan; ?>" > <i class="fa fa-pen"></i></a>
                                        </td>
                                        <td>
                                          <a class="btn btn-danger" href='javascript:void(0)' onclick="confirmarEliminacion('<?php echo$filaTemporal->id_plan; ?>');"><i class="fa fa-trash"></i>                                          
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <?php else: ?>
                                    <div class="alert alert-primary" role="alert">
                                      NO SE ENCONTRARON PLANES REGISTRADOS!
                                    </div>
                                    <?php endif; ?>
                                  </div>
                                  <br>
                                  <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
$(document).ready(function () {
    $('#tabla_planes').DataTable({
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

<script type="text/javascript">
    function confirmarEliminacion(id_plan){
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
                      "<?php echo site_url(); ?>/planes/procesarEliminacion/"+id_plan;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>