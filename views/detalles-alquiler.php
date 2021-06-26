<div class="container-fluid">
    <div class="mb-4">
        <h2 class="text-center">Se detalla la informacion del alquiler.</h2>
    </div>
    <div class="mb-2">
        <form action="">
            <a href="index.php?page=alquileres&code=1" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
        </form>
    </div>
    <div class="mb-4">
        <div class="text-center">
            <p class="d-inline">Si desea eliminar a su cliente, haga click aquí</p>&nbsp;&nbsp;&nbsp;
            <form class="d-inline">
                <input type="hidden" name="code" id="code" value="1">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="detalles_label" class="label-form mb-2">Detalles del alquiler:</label>
                        <textarea class="form-control " name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-2">
                            <label for="" class="form-label">Fecha en que se registro este alquiler</label>
                            <input type="date" class="form-control" readonly>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Fecha entrega alquiler</label>
                            <input class="form-control" type="date" name="" />
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label mt-3">Ingrese total</label>
                            <input class="form-control" type="number" name="" />
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success mt-2" type="button">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
