<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>Registro de Clientes</center> </h1>
<form action="<?php echo site_url(); ?>/clientes/guardarCliente" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <br>
    <b>CEDULA DEL CLIENTE: </b>
   <br>
    <input type="number" class="form-control" name="cedula_cliente" id= "cedula_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>NOMBRES DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="nombre_cliente" id= "nombre_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>APELLIDOS DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="apellido_cliente" id= "apellido_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>DIRECCIÓN DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control" name="direccion_cliente" id= "direccion_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CELULAR DEL CLIENTE: </b>
    <br>
    <input type="number" class="form-control" name="celular_cliente" id= "celular_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <br>
    <b>CORREO DEL CLIENTE: </b>
    <br>
    <input type="email" class="form-control"  name="correo_cliente" id= "correo_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>CIUDAD DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="ciudad_cliente" id= "ciudad_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>PARROQUIA DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="parroquia_cliente" id= "parroquia_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>REFERENCIA INSTALACIÓN DEL CLIENTE: </b>
    <br>
    <input type="text" class="form-control"  name="ref_cliente" id= "ref_cliente"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
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
          <?php foreach ($listadoIps->result() as $filaTemporal): ?>
              <option value="<?php echo $filaTemporal->id_ip ?>">
                <?php echo $filaTemporal->direccion_ip ?>
              </option>
          <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2" >GUARDAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/clientes/listarClientes" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>
</form>
<br>
    </div>
</div>


<script type="text/javascript"> 
    $("#frm_nuevo_cliente").validate({
      rules:{
        cedula_cliente:{
          required:true,
          digits: true,
          minlength:10,
    	    maxlength: 10,
          remote:{
                        url:"<?php echo site_url('clientes/validarCedulaExistente'); ?>",
                        data:{
                          "$cedula_cliente":function(){
                            return $("#cedula_cliente").val();
                          }
                        },
                        type:"post"
                    }
        },
        nombre_cliente:{
          letras:true,
          required:true
        },
        apellido_cliente:{
          letras:true,
          required:true
        },
        direccion_cliente:{
          required:true
        },
        celular_cliente:{
          required:true,
          minlength:10,
    	    maxlength: 10
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
          required:"Porfavor ingrese la cedula del cliente",
          minlength:"La cedula debe tener minimo 10 digitos",
    		  maxlength: "La cedula solo debe tener 10 digitos",
          remote:"El documento ya existe"
        },
        nombre_cliente:{
          required:"Porfavor ingrese los nombres del cliente",
          letras:"Porfavor no ingrese numeros, los nombres no tienen numeros"
        },
        apellido_cliente:{
          required:"Porfavor ingrese los apellidos del cliente",
          letras:"Porfavor no ingrese numeros, los apellidos no tienen numeros"
        },
        direccion_cliente:{
          required:"Porfavor ingrese la dirección del cliente"
        },
        celular_cliente:{
          required:"Porfavor ingrese el numero de celular del cliente",
          minlength:"El numero de telefono debe tener minimo 10 digitos",
    		  maxlength: "El numero de telefono debe tener maximo 10 digitos"
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
<script>
    let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

window.initMap = initMap;
  </script>
  <style>
    /* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
#map {
  height: 100%;
}

/* 
 * Optional: Makes the sample page fill the window. 
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
  </style>