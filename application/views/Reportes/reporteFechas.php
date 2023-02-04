<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <div class="row g-4">
                <form action="<?php echo site_url(); ?>/reportes/reporteVista" method="post" enctype="multipart/form-data">
                    <div class="col-sm-6 col-xl-12" >
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" >
                            <div class="ms-4">
                                <p class="mb-2">Seleccione la Fecha de Inicio:</p>
                                <hr>
                                <input type="date"   name="fechaInicio" id="fechaInicio" required><br /><br />
                                <hr>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Seleccione la Fecha de Fin:</p>
                                <hr>
                                <input type="date" name="fechaFin" id="fechaFin" required><br /><br />
                                <hr>
                            </div>
                            <div class="ms-4">
                                <hr>
                                <button type="submit" name="button"  class="btn btn-success m-2">Aceptar</a></button>
                                <hr>
                            </div>
                        </div>
                    </div>                  
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
