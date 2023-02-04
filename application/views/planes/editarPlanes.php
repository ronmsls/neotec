<div class="container-fluid pt-4 px-4">
<div class="row bg-secondary rounded  justify-content-left mx-0">
    <div class="col-md-11 text-left">
    <br>
<h1> <center>EDITAR PLAN</center> </h1>
<form action="<?php echo site_url(); ?>/planes/actualizarPlan" method="post" id="frm_nuevo_cliente" enctype="multipart/form-data">
<input type="hidden" name="id_plan" id="id_plan" class="form-control" value="<?php echo $listadoPlanesID->id_plan; ?>" required >    
    <br>
    <b>NOMBRE DEL PLAN: </b>
    <br>
    <input type="text" class="form-control" name="nombre_plan" id= "nombre_plan"value="<?php echo $listadoPlanesID->nombre_plan; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>DETALLES DEL PLAN: </b>
    <br>
    <input type="text" class="form-control" name="detalles_plan" id= "detalles_plan"value="<?php echo $listadoPlanesID->detalles_plan; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>PRECIO DEL PLAN: </b>
    <br>
    <input type="number" class="form-control" name="precio_plan" id= "precio_plan"value="<?php echo $listadoPlanesID->precio_plan; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>MEGAS DE SUBIDA: </b>
    <br>
    <input type="number" class="form-control" name="meg_sub_plan" id= "meg_sub_plan"value="<?php echo $listadoPlanesID->meg_sub_plan; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <b>MEGAS DE BAJADA: </b>
    <br>
    <input type="number" class="form-control" name="meg_baj_plan" id= "meg_baj_plan"value="<?php echo $listadoPlanesID->meg_baj_plan; ?>"  class="form-control input-sm " required autocomplete="off">
    <br>
    <button type="submit" name="button"  class="btn btn-success m-2">GUARDAR</a></button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/planes/listarPlanes" class="btn btn-danger m-2"><i class="fa solid fa-ban"></i> CANCELAR</a>

  </form>
<br>
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