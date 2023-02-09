<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="table-responsive">
                              <center>
                                <h2>LISTADO DE IPS</h2> 
                              </center>
                              <hr>
                              <center>
                                <a href="<?php echo site_url(); ?>/ips/nuevaIp" class="btn btn-success m-2">Agregar Nuevo</a>
                              </center>
                              <?php if ($listadoIps): ?>
                                <table id="tablaClientes" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th class="text-center">ID</th>
                                      <th class="text-center">DIRECCION IP</th>
                                      <th class="text-center">ESTADO</th>
                                      <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                      <th></th>
                                      <?php endif; ?>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($listadoIps->result() as $filaTemporal):  ?>
                                      <tr>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->id_ip; ?> 
                                        </td>
                                        <td class="text-center">
                                          <?php echo $filaTemporal->direccion_ip; ?>
                                        </td>
                                        <td class="text-center">
                                          <?php if($filaTemporal->estado_ip==1){
                                            echo ("Libre"); 
                                          }else{
                                            echo ("En uso"); 
                                          }
                                          ?>
                                        </td>
                                        <?php if ($this->session->userdata("usuario_Conectado")["rol"]=="ADMINISTRADOR_ROOT"): ?>
                                        <td>
                                          <a class="btn btn-danger" href='javascript:void(0)' onclick="confirmarEliminacion('<?php echo$filaTemporal->id_ip; ?>');"><i class="fa fa-trash"></i>                                          
                                        </td>
                                        <?php endif; ?>
                                      </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                  <?php else: ?>
                                    <div class="alert alert-primary" role="alert">
                                      NO SE ENCONTRARON IPS REGISTRADOS!
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
    function confirmarEliminacion(id_ip){
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
                      "<?php echo site_url(); ?>/ips/eliminarIp/"+id_ip;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>