<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2">Total Pagos en Efectivo</p>
                                <h6 class="mb-0"><?php echo $totalPagadosEfectivo ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-4">
                                <p class="mb-2">Total Dinero en Efectivo</p>
                                <h6 class="mb-0"><?php echo $totalDineroEfectivo ?></h6>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12" >
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" >
                        <div class="table-responsive">
                        <table class="table table-striped" id="tabla_deposito">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Pichincha Cta. 2200000940</th>
                                        <th scope="col">Pichincha Cta. 6010218000</th>
                                        <th scope="col">Guayaquil Cta. 7633119</th>
                                        <th scope="col">Guayaquil Cta. 21540468</th>
                                        <th scope="col">Chibuleo Cta. 09187442100</th>
                                        <th scope="col">Mushuc Runa Cta. 44600033252</th>
                                        <th scope="col">Ambato Cta. 044611005290</th>
                                        <th scope="col">Produbanco Cta. 12081071685</th>
                                        <th scope="col">Cotopaxi Cta. 297811212370</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $canDepPi1 ?></th>
                                        <th scope="row"><?php echo $canDepPi2 ?></th>
                                        <th scope="row"><?php echo $caDepfGy1 ?></th>
                                        <th scope="row"><?php echo $caDepfGy2 ?></th>
                                        <th scope="row"><?php echo $caDepfCh ?></th>
                                        <th scope="row"><?php echo $caDepfMr ?></th>
                                        <th scope="row"><?php echo $caDepfAm ?></th>
                                        <th scope="row"><?php echo $caDepfPb ?></th>
                                        <th scope="row"><?php echo $canDepfCt ?></th>
                                        <th scope="row"><?php echo $totalPagosDeposito ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php if($canDinDepPi1 ==null){echo("0");}else{echo $canDinDepPi1; } ?></th>
                                        <th scope="row"><?php if($canDiDepfPi2 ==null){echo("0");}else{echo $canDiDepfPi2; } ?></th>
                                        <th scope="row"><?php if($canDiDepfGy1 ==null){echo("0");}else{echo $canDiDepfGy1; } ?></th>
                                        <th scope="row"><?php if($canDiDepfGy2 ==null){echo("0");}else{echo $canDiDepfGy2; } ?></th>
                                        <th scope="row"><?php if($canDiDepfCh ==null){echo("0");}else{echo $canDiDepfCh; } ?></th>
                                        <th scope="row"><?php if($canDiDepfMr ==null){echo("0");}else{echo $canDiDepfMr; } ?></th>
                                        <th scope="row"><?php if($canDiDepfAm ==null){echo("0");}else{echo $canDiDepfAm; } ?></th>
                                        <th scope="row"><?php if($canDiDepfPb ==null){echo("0");}else{echo $canDiDepfPb; } ?></th>
                                        <th scope="row"><?php if($canDiDepfCt ==null){echo("0");}else{echo $canDiDepfCt; } ?></th>
                                        <th scope="row"><?php echo $totalDineroDeposito ?></th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <div class="table-responsive">
                        <table class="table table-striped" id="tabla_transferencia">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Pichincha Cta. 2200000940</th>
                                        <th scope="col">Pichincha Cta. 6010218000</th>
                                        <th scope="col">Guayaquil Cta. 7633119</th>
                                        <th scope="col">Guayaquil Cta. 21540468</th>
                                        <th scope="col">Chibuleo Cta. 09187442100</th>
                                        <th scope="col">Mushuc Runa Cta. 44600033252</th>
                                        <th scope="col">Ambato Cta. 044611005290</th>
                                        <th scope="col">Produbanco Cta. 12081071685</th>
                                        <th scope="col">Cotopaxi Cta. 297811212370</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $canTranPi1 ?></th>
                                        <th scope="row"><?php echo $caTranPi2 ?></th>
                                        <th scope="row"><?php echo $cTranfGy1 ?></th>
                                        <th scope="row"><?php echo $cTranfGy2 ?></th>
                                        <th scope="row"><?php echo $cTranfCh ?></th>
                                        <th scope="row"><?php echo $cTranfMr ?></th>
                                        <th scope="row"><?php echo $cTranfAm ?></th>
                                        <th scope="row"><?php echo $cTranfPb ?></th>
                                        <th scope="row"><?php echo $caTranfCt ?></th>
                                        <th scope="row"><?php echo $totalPagosTransferencia ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php if($canDinTranPi1 ==null){echo("0");}else{echo $canDinTranPi1; } ?></th>
                                        <th scope="row"><?php if($canDTranfPi2 ==null){echo("0");}else{echo $canDTranfPi2; } ?></th>
                                        <th scope="row"><?php if($canDTranfGy1 ==null){echo("0");}else{echo $canDTranfGy1; } ?></th>
                                        <th scope="row"><?php if($canDTranfGy2 ==null){echo("0");}else{echo $canDTranfGy2; } ?></th>
                                        <th scope="row"><?php if($canDTranfCh ==null){echo("0");}else{echo $canDTranfCh; } ?></th>
                                        <th scope="row"><?php if($canDTranfMr ==null){echo("0");}else{echo $canDTranfMr; } ?></th>
                                        <th scope="row"><?php if($canDTranfAm ==null){echo("0");}else{echo $canDTranfAm; } ?></th>
                                        <th scope="row"><?php if($canDTranfPb ==null){echo("0");}else{echo $canDTranfPb; } ?></th>
                                        <th scope="row"><?php if($canDTranfCt ==null){echo("0");}else{echo $canDTranfCt; } ?></th>
                                        <th scope="row"><?php echo $totalDineroTransferencia ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                    <div class="col-sm-6 col-xl-12">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <div class="table-responsive">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Efectivo</th>
                                        <th scope="col">Deposito</th>
                                        <th scope="col">Transferecia</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Cantidad</th>
                                        <th scope="row"><?php echo $totalPagadosEfectivo ?></th>
                                        <th scope="row"><?php echo $totalPagosDeposito ?></th>
                                        <th scope="row"><?php echo $totalPagosTransferencia ?></th>
                                        <th scope="row"><?php echo $totalPagadosEfectivo + $totalPagosDeposito + $totalPagosTransferencia  ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dinero</th>
                                        <th scope="row"><?php echo $totalDineroEfectivo ?></th>
                                        <th scope="row"><?php echo $totalDineroDeposito ?></th>
                                        <th scope="row"><?php echo $totalDineroTransferencia ?></th>
                                        <th scope="row"><?php echo $totalDineroEfectivo + $totalDineroDeposito + $totalDineroTransferencia?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('#tabla_deposito').DataTable({
    	dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ],
    	responsive: true,
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
});
$(document).ready(function () {
    $('#tabla_transferencia').DataTable({
    	dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                download: 'open'
            }
        ],
    	responsive: true,
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
});
</script>