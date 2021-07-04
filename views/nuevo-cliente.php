<div class="container-fluid">
    <div class="text-center">
        <h3>Ingresar los Datos del Nuevo Cliente</h3>
    </div>
    <div>
        <a href="index.php" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
    </div>
    <div class="row">
        <div class="col-12 justify-content-center align-items-center d-flex">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="core/client.php" autocomplete="nope">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="nombres" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="nombres" name="nombre" placeholder="Nombres" pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required autocomplete="nope">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellido"  placeholder="Apellidos" pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="numContacto" class="form-label">Numero de contacto</label>
                                            <input type="text" class="form-control" id="contacto" name="telefono" placeholder="0000-0000" required autocomplete="nope">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="dui" class="form-label">DUI</label>
                                            <input type="text" class="form-control" id="dui" name ="dui" placeholder="00000000-0" required autocomplete="nope">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                     <input type="text" hidden name="action" value="insert">
                                    <button type="submit" class="btn btn-success">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
