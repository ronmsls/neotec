<?php
$totalPlanes=0;
$totalClientes=0;
$totalUsuarios=0;
$totalPagados=0;

if ($planesCant) {
    $totalPlanes=sizeof($planesCant->result());//contando los generos de la bdd
}
if ($clientesCant) {
    $totalClientes=sizeof($clientesCant->result());//contando los generos de la bdd
}
if ($usuariosCant) {
    $totalUsuarios=sizeof($usuariosCant->result());//contando los generos de la bdd 
}

$totalPagados =   $pagadosCant - $totalClientes;

?>
            <!-- vistas generales de las cantidades de clientes, planes y usuarios -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-rocket fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Planes</p>
                                <h6 class="mb-0"><?php echo $totalPlanes ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Clientes</p>
                                <h6 class="mb-0"><?php echo $totalClientes ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Usuarios</p>
                                <h6 class="mb-0"><?php echo $totalUsuarios ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de la vistas generales-->

<!-- vistas generales de las cantidades de clientes, planes y usuarios -->
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <a href="<?php echo site_url(); ?>/clientes/deudoresClientes" ><i class="fa fa-chart-line fa-3x text-primary"></i></a>
                            <div class="ms-3">
                                <p class="mb-2">Total de Deudores</p>
                                <h6 class="mb-0">
                                    <?php 
                                    if($totalPagados<1){
                                        echo ($totalPagados) * -1;
                                    }else{
                                        echo $totalPagados;
                                    } ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total de Pagados</p>
                                <h6 class="mb-0"><?php echo $pagadosCant ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <a href="<?php echo site_url(); ?>/dashboard/dashboardFormasPago" ><i class="fa fa-credit-card fa-3x text-primary" aria-hidden="true"></i></a>
                            <div class="ms-3">
                                <p class="mb-2">Total de Dinero Pagado</p>
                                <h6 class="mb-0"><?php if($pagoCant ==null){echo("0");}else{echo $pagoCant; } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <canvas id="graficoCircular1" height="250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            </div>
        <!-- Content End -->

<script>
    var graficoCircular1 = new Chart($("#graficoCircular1"), {
  type: "pie",
  data: {
    labels: ["Deudores", "Pagados"],
    datasets: [{
      label: "Total",
      data: [<?php if($totalPagados<1){
             echo round($totalPagados) * -1;
             }else{
             echo round($totalPagados);
             } ?>, 
             <?php echo round($pagadosCant,2); ?>],
      backgroundColor: [
        "#D10C0C",
        "#58DE0C"
      ],
      offset: [
        20
      ]
    }]
  },
  options: {
    color: "#FFFFFF",
    responsive: true,
    maintainAspectRatio: true,
    aspectRatio: 2,
    layout: {
      padding: 20
    },
    rotation: 90,
    plugins: {
      legend: {
        position: "right",
        labels: {
          boxWidth: 25,
          boxHeight: 25,
          font: {
            weight: "bold",
            family: "Noto Sans"
          }
        }
      }
    }
  }
})
</script>