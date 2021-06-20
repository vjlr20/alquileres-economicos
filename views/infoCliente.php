<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Informacion del cliente</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center d-flex">
                <div class="w-50 border p-5">
                    <div class="row">
                        <div class="col-2">
                            <button class="btn btn-primary"><i class="fas fa-arrow-left"></i></button>
                        </div>
                        <div class="col-10">
                            <span>Se detalla la informacion de nuestro cliente: @cliente (nombre)</span>
                        </div>
                        <div class="col-12 text-center mt-5">
                            Si desea eliminar a su cliente, haga click aqui: <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <form>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres">
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="numContacto" class="form-label">Numero de contacto</label>
                                    <input type="text" class="form-control" id="numContacto">
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos">
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="dui" class="form-label">DUI</label>
                                    <input type="text" class="form-control" id="dui">
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>