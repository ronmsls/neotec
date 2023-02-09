
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="table-responsive">
                              <?php if ($listadoUsuarios): ?>
                                <br>
                                  <center>
                                    <h2>LISTADO DE USUARIOS</h2>
                                  </center>
                                 <hr>
                                <center>
                                  <a href="<?php echo site_url(); ?>/usuarios/nuevoUsuario" class="btn btn-success m-2">Agregar Nuevo</a>
                                </center>
                                <table id="tabla" class="display" style="width:100%">
                                    <thead>
                                      <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">CEDULA USUARIO</th>
                                        <th class="text-center">NOMBRE USUARIO</th>
                                        <th class="text-center">APELLIDO USUARIO</th>
                                        <th class="text-center">CELULAR USUARIO</th>
                                        <th class="text-center">CORREO USUARIO</th>
                                        <th class="text-center"></th>
                                        <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                        <th></th>
                                        <?php endif; ?>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($listadoUsuarios->result() as $filaTemporal):  ?>
                                        <tr>
                                          <td class="text-center">
						<?php echo $filaTemporal->id_usuario; ?>																<?php echo $filaTemporal->cedula_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <?php echo $filaTemporal->cedula_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <?php echo $filaTemporal->nombre_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <?php echo $filaTemporal->apellido_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <?php echo $filaTemporal->celular_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <?php echo $filaTemporal->correo_usuario; ?>
                                          </td>
                                          <td class="text-center">
                                              <a class="btn btn-success"  href="<?php echo site_url(); ?>/usuarios/editarUsuario/<?php echo $filaTemporal->id_usuario; ?>/<?php echo $filaTemporal->fk_id_rol; ?>" > <i class="fa fa-pen"></i></a>
                                          </td>
                                          <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                          <td>
                                          <a class="btn btn-danger" href='javascript:void(0)' onclick="confirmarEliminacion('<?php echo$filaTemporal->id_usuario; ?>');"><i class="fa fa-trash"></i>                                          
                                        </td>
                                          <?php endif; ?>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                 </table>
                                      <?php else: ?>
                                        <div class="alert alert-danger">
                                          <h1>NO SE ENCONTRARON EQUIPOS REGISTRADOS</h1>
                                        </div>
                                      <?php endif; ?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
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
    function confirmarEliminacion(id_usuario){
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
                      "<?php echo site_url(); ?>/usuarios/procesarEliminacion/"+id_usuario;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>

