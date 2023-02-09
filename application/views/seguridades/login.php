<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEOTEC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>/assets/img/favicon.png" rel="icon">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0"
    />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/styleLogin.css" rel="stylesheet"/>

</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="login">
      <div class="avatar">
        <img src="<?php echo base_url(); ?>/assets/css/avatar.png"/>
      </div>
      <h2 style="color: white">Iniciar Sesión</h2>
      <h3></h3>

      <form class="login-form" action="<?php echo site_url(); ?>/seguridades/autenticarUsuario" method="post">
        <div class="textbox">
          <input type="email" id="correo_usuario" name="correo_usuario" placeholder="Correo Electrónico" />
          <span class="material-symbols-outlined"> account_circle </span>
        </div>
        <div class="textbox">
          <input type="password" id="pass_usuario" name="pass_usuario" placeholder="Contraseña" />
          <span class="material-symbols-outlined"> lock </span>
        </div>
        <button type="submit">ACEPTAR</button>
      </form>
    </div>
        <!-- Sign In End --> 
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/chart/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
</body>
<?php if ($this->session->flashdata('errorIngreso')): ?>
  		<script type="text/javascript">

  		Swal.fire({
  			position: 'mid',
  			icon: 'error',
  			title: 'Email o constraseña incorrecto',
  			showConfirmButton: true,
  			timer: 1200
  	})

  		</script>
		
  	<?php endif; ?>


</html>