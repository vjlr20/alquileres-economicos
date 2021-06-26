<div class="container-fluid">
    <div class="text-center">
        <h3>Se detalla la informacion de nuestro cliente: <span class="text-success">Edwin Rosales</span></h3>
    </div>
    <div class="mb-2">
        <a href="index.php" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
    </div>
    <div class="container-fluid">
        <div class="text-center">
            <p class="d-inline">Si desea eliminar a su cliente, haga click aquí</p>&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-danger">Eliminar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 justify-content-center align-items-center d-flex">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form class="POST" autocomplete="nope">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="nombres" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" value="Edwin" pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required autocomplete="nope">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos" value="Rosales" pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="numContacto" class="form-label">Numero de contacto</label>
                                            <input type="text" class="form-control" value="0000-0000" id="contacto" name="contacto" placeholder="0000-0000" required autocomplete="nope">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="dui" class="form-label">DUI</label>
                                            <input type="text" class="form-control" value="0000-0000" id="dui" name ="dui" placeholder="00000000-0" required autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
