<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>EDITAR CLIENTE</center> </h1>
<form action="<?php echo site_url(); ?>/clientes/actualizarClientes" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <input type="hidden" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $listadoClientesID->id_cliente; ?>" required >     
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
    <b>CIUDAD DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="ciudad_cliente" id= "ciudad_cliente" value="<?php echo $listadoClientesID->ciudad_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>PARROQUIA DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="parroquia_cliente" id= "parroquia_cliente" value="<?php echo $listadoClientesID->parroquia_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>REFERENCIA INSTALACIÓN DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="ref_cliente" id= "ref_cliente" value="<?php echo $listadoClientesID->ref_cliente; ?>"  class="form-control input-sm " required autocomplete="off">
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
          required:true
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
        },
        ciudad_cliente:{
          required:true
        },
        parroquia_cliente:{
          required:true
        },
        ref_cliente:{
          required:true
        }
      },
      messages:{

        cedula_cliente:{
          required:"Porfavor ingrese la cedula del cliente"
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
        },
        parroquia_cliente:{
          required:"Porfavor ingrese la parroquia del cliente"
        },
        ref_cliente:{
          required:"Porfavor ingreseuna referencia de la instalación del cliente"
        }

      }
    });
</script>