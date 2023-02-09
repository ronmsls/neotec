<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>EDITAR CLIENTE</center> </h1>
<form action="<?php echo site_url(); ?>/clientes/actualizarClientes" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <input type="hidden" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $listadoClientesID->id_cliente; ?>" required >     
    <input type="hidden" name="latitud_cliente" id="latitud_cliente" class="form-control" value="<?php echo $listadoClientesID->latitud_cliente; ?>" required >     
    <input type="hidden" name="longitud_cliente" id="longitud_cliente" class="form-control" value="<?php echo $listadoClientesID->longitud_cliente; ?>" required >     
    <br>
    <b>CEDULA DEL CLIENTE: </b>
   <br>
    <input type="text" class="form-control" name="cedula_cliente" id= "cedula_cliente" value="<?php echo $listadoClientesID->cedula_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>NOMBRES DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="nombre_cliente" id= "nombre_cliente" value="<?php echo $listadoClientesID->nombre_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>APELLIDOS DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="apellido_cliente" id= "apellido_cliente" value="<?php echo $listadoClientesID->apellido_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>DIRECCIÓN DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="direccion_cliente" id= "direccion_cliente" value="<?php echo $listadoClientesID->direccion_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CELULAR DEL CLIENTE: </b>
    <br>
    <input type="number" class="form-control" name="celular_cliente" id= "celular_cliente" value="<?php echo $listadoClientesID->celular_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CORREO DEL CLIENTE: </b>
    <br>
    <input type="email" class="form-control"  name="correo_cliente" id= "correo_cliente" value="<?php echo $listadoClientesID->correo_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>SELECCIONE EL PLAN: </b>
    <br>
    <select class="form-select" name="fk_id_plan" id="fk_id_plan" required> 
      <option value="" >SELECCIONAR EL PLAN</option>
        <?php if ($listadoPlanes): ?>
          <?php foreach ($listadoPlanes->result() as $filaTemporal): ?>
              <option value="<?php echo $filaTemporal->id_plan ?>">
                <?php echo $filaTemporal->nombre_plan ?>
              </option>
          <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <b>SELECCIONE UNA DIRECCIÓN IP: </b>
    <br>
    <select class="form-select" name="fk_id_ip" id="fk_id_ip" required>
      <option value="" >SELECCIONAR LA DIECCIÓN IP</option>
        <?php if ($listadoIps): ?>
          <?php foreach ($listadoIps->result() as $filaTemporalIp): ?>
              <option value="<?php echo $filaTemporalIp->id_ip ?>">
                <?php echo $filaTemporalIp->direccion_ip ?>
                <?php if($filaTemporalIp->estado_ip ==0){echo("En uso");} ?>
              </option>
          <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2">ACTUALIZAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/clientes/listarClientes" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>
    <script type="text/javascript">
        $("#fk_id_plan").val("<?php echo $listadoPlanesID->id_plan; ?>");
    </script>
    <script type="text/javascript">
        $("#fk_id_ip").val("<?php echo $listadoIpID->id_ip; ?>");
    </script>
</form>
<br>
    </div>
</div>


<script type="text/javascript">
    $("#frm_nuevo_cliente").validate({
      rules:{
        cedula_cliente:{
          required:true,
          minlength:10,
    	    maxlength: 10
        },
        nombre_cliente:{
          letras:true,
          required:true
        },
        apellido_cliente:{
          required:true
        },
        direccion_cliente:{
          required:true
        },
        celular_cliente:{
          required:true
        },
        correo_cliente:{ 
          required:true
        }
      },
      messages:{

        cedula_cliente:{
          required:"Porfavor ingrese la cedula del cliente",
          minlength:"La cedula debe tener minimo 10 digitos",
    		  maxlength: "La cedula solo debe tener 10 digitos",
        },
        nombre_cliente:{
          required:"Porfavor ingrese los nombres del cliente",
          letras:"Porfavor no ingrese numeros"
        },
        apellido_cliente:{
          required:"Porfavor ingrese los apellidos del cliente",
          letras:"Porfavor no ingrese numeros"
        },
        direccion_cliente:{
          required:"Porfavor ingrese la dirección del cliente",
          letras:"Porfavor no ingrese numeros"
        },
        celular_cliente:{
          required:"Porfavor ingrese el numero de celular del cliente"
        },
        ciudad_cliente:{
          required:"Porfavor ingresela ciudad del cliente"
        },
        correo_cliente:{
          required:"Porfavor ingrese el correo electrónico del cliente"
        }

      }
    });
</script>