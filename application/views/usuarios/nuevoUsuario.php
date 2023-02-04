<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>Registro de Clientes</center> </h1> 
<form action="<?php echo site_url(); ?>/usuarios/guardarUsuario" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <br>
    <b>CEDULA DEL USUARIO: </b>
    <br>
    <input type="number" class="form-control" name="cedula_usuario" id= "cedula_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>NOMBRES DEL USUARIO: </b>
    <br>
    <input type="text" class="form-control" name="nombre_usuario" id= "nombre_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>APELLIDOS DEL USUARIO: </b>
    <br>
    <input type="text" class="form-control" name="apellido_usuario" id= "apellido_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CELULAR DEL USUARIO: </b>
    <br>
    <input type="number" class="form-control" name="celular_usuario" id= "celular_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CORREO DEL USUARIO: </b>
    <br>
    <input type="email" class="form-control"  name="correo_usuario" id= "correo_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CONTRASEÑA DEL USUARIO: </b> 
    <br>
    <input type="password" class="form-control"  name="pass_usuario" id= "pass_usuario"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
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
  </form>
  <br>
    </div>
</div>


 
<script type="text/javascript">
    $("#frm_nuevo_cliente").validate({
      rules:{
        cedula_usuario:{
          required:true,
          digits:true,
    	    minlength:10,
    	    maxlength: 10
        },
        nombre_usuario:{
          letras:true,
          required:true
        },
        apellido_usuario:{
          letras:true,
          required:true
        },
        celular_usuario:{
          required:true
        },
        correo_usuario:{
          required:true
        },
        pass_usuario:{
          required:true
        }
      },
      messages:{

        cedula_usuario:{
          required:"Por favor ingrese su numero de cédula",
    		  minlength:"La cedula debe tener minimo 10 digitos",
    		  maxlength: "La cedula solo debe tener 10 digitos"
        },
        nombre_usuario:{
          required:"Porfavor ingrese los nombres del usuario",
          letras:"Porfavor no ingrese numeros, los nombres no tienen numeros"
        },
        apellido_usuario:{
          required:"Porfavor ingrese los apellidos del usuario",
          letras:"Porfavor no ingrese numeros, los apellidos no tienen numeros"
        },
        celular_usuario:{
          required:"Porfavor ingrese el numero de celular del usuario"
        },
        correo_usuario:{
          required:"Porfavor ingrese el correo electrónico del usuario"
        },
        pass_usuario:{
          required:"Porfavor ingrese la contraseña del usuario"
        }

      }
    });
</script>