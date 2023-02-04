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

