<div class="container-fluid pt-4 px-4">
<div class="row vh-100 bg-secondary rounded  justify-content-center mx-0">
    <div class="col-md-11">
    <br>
<h1> <center>Registro de Planes</center> </h1>
<form action="<?php echo site_url(); ?>/planes/guardarPlan" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
    <br>
    <b>NOMBRE DEL PLAN: </b>
    <br>
    <input type="text" class="form-control" name="nombre_plan" id= "nombre_plan"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>DETALLES DEL PLAN: </b>
    <br>
    <input type="text" class="form-control" name="detalles_plan" id= "detalles_plan"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>PRECIO DEL PLAN: </b>
    <br>
    <input type="number" class="form-control" name="precio_plan" id= "precio_plan"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>MEGAS DE SUBIDA: </b>
    <br>
    <input type="number" class="form-control" name="meg_sub_plan" id= "meg_sub_plan"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <b>MEGAS DE BAJADA: </b>
    <br>
    <input type="number" class="form-control" name="meg_baj_plan" id= "meg_baj_plan"value="" placeholder="Rellene este espacio" class="form-control input-sm " required autocomplete="off">
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2">GUARDAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/planes/listarPlanes" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>

  </form>
  </div>
</div>


<script type="text/javascript">
    $("#frm_nuevo_cliente").validate({
      rules:{
        nombre_plan:{
          letras:true,
          required:true
        },
        detalles_plan:{
          letras:true,
          required:true
        },
        precio_plan:{
          required:true
        },
        meg_sub_plan:{
          required:true
        },
        meg_baj_plan:{
          required:true
        }
      },
      messages:{

        nombre_plan:{
          required:"Porfavor ingrese el nombre del plan"
        },
        detalles_plan:{
          required:"Porfavor ingrese los detalles del plan",
          letras:"Porfavor no ingrese numeros"
        },
        precio_plan:{
          required:"Porfavor ingrese el precio del plan"
        },
        meg_sub_plan:{
          required:"Porfavor ingrese los megas de subida del plan"
        },
        meg_baj_plan:{
          required:"Porfavor ingrese los megas de bajada del plan"
        }

      }
    });
</script>