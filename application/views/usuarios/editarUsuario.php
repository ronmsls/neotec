<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>EDITAR USUARIO</center> </h1>
<form action="<?php echo site_url(); ?>/usuarios/actualizarUsuario" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
<input type="hidden" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $listadoUsuariosID->id_usuario; ?>" required >    
<br>
    <b>CEDULA DEL USUARIO: </b>
    <br>
    <input type="text" class="form-control" name="cedula_usuario" id= "cedula_usuario"value="<?php echo $listadoUsuariosID->cedula_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>NOMBRES DEL USUARIO: </b>
    <br>
    <input type="text" class="form-control" name="nombre_usuario" id= "nombre_usuario"value="<?php echo $listadoUsuariosID->nombre_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>APELLIDOS DEL USUARIO: </b>
    <br>
    <input type="text" class="form-control" name="apellido_usuario" id= "apellido_usuario"value="<?php echo $listadoUsuariosID->apellido_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CELULAR DEL USUARIO: </b>
    <br>
    <input type="number" class="form-control" name="celular_usuario" id= "celular_usuario"value="<?php echo $listadoUsuariosID->celular_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CORREO DEL USUARIO: </b>
    <br>
    <input type="email" class="form-control"  name="correo_usuario" id= "correo_usuario"value="<?php echo $listadoUsuariosID->correo_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CONTRASEÑA DEL USUARIO: </b>
    <br>
    <input type="password" class="form-control"  name="pass_usuario" id= "pass_usuario"value="<?php echo $listadoUsuariosID->pass_usuario; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>SELECCIONE EL ROL: </b>
    <br>
    <select class="form-select" name="fk_id_rol" id="fk_id_rol" required>
      <option value="" >SELECCIONAR EL ROL</option>
        <?php if ($listadoRoles): ?>
          <?php foreach ($listadoRoles->result() as $filaTemporal): ?>
              <option value="<?php echo $filaTemporal->id_rol ?>">
                <?php echo $filaTemporal->nombre_rol ?>
              </option>
          <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2">GUARDAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/usuarios/listarUsuarios" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>
    <script type="text/javascript">
        $("#fk_id_rol").val("<?php echo $listadoRolesID->id_rol; ?>");
    </script>  
</form>
<br>
    </div>
</div>