<div class="container-fluid">
    <div class="mb-3">
        <h3 class="text-center">Nuevo alquiler del cliente: <span class="text-success">Edwin Rosales</span></h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="core/rentals.php" method="POST">
                        <input type="hidden" value="insert" name="action">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="detalles_label" class="label-form mb-2">Detalles del alquiler:</label>
                                <textarea class="form-control " name="detalles" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label for="" class="form-label">Fecha entrega alquiler</label>
                                    <input class="form-control" type="date" name="fecha" required />
                                </div>
                                <div class="mb-5">
                                    <label for="" class="form-label mt-3">Ingrese total</label>
                                    <input class="form-control" type="number" name="total" required />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-grid gap-2">
                                            <input class="btn btn-success mt-2" type="submit" value="ingresar" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-grid gap-2">
                                            <a href="index.php" class="btn btn-danger mt-2">Cancelar</a>
                                        </div>
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