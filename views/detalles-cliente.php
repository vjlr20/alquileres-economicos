<?php
    require_once 'core/client.php';

    $response = $client->getCliente(intval($_GET['code']));
?>
<div class="container-fluid">
    <div class="text-center">
        <h3>Se detalla la informacion de nuestro cliente: <span
                class="text-success"><?php echo $response['nombres'] . " " . $response['apellidos'] ?></span></h3>
    </div>
    <div class="mb-2">
        <a href="index.php" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
    </div>
    <div class="container-fluid">
        <div class="text-center">
            <form action="core/client.php" method="POST">
                <input type="hidden" value="<?php echo $_GET['code']; ?>" name="clientID">
                <input type="hidden" value="delete" name='action'>
                <p class="d-inline">Si desea eliminar a su cliente, haga click aquí</p>&nbsp;&nbsp;&nbsp;<input
                    type="submit" class="btn btn-danger" value="eliminar">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 justify-content-center align-items-center d-flex">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="core/client.php">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            placeholder="Nombres" value="<?php echo $response['nombres']; ?>"
                                            pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido"
                                            placeholder="Apellidos" value="<?php echo $response['apellidos']; ?>"
                                            pattern="^[a-zA-Z\s]+$" title="Solo se acepta letras" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="numContacto" class="form-label">Numero de contacto</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $response['telefono']; ?>" id="contacto" name="telefono"
                                            placeholder="00000000" pattern="^[2|6|7]\d{7}$"
                                            oninvalid="this.setCustomValidity('Utilice un formato de 8 digitos sin guion')"
                                            oninput="this.setCustomValidity('')" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="dui" class="form-label">DUI</label>
                                        <input type="text" class="form-control" value="<?php echo $response['dui'] ?>"
                                            id="dui" name="dui" placeholder="00000000-0" placeholder="00000000-0"
                                            pattern="^\d{8}-\d{1}$"
                                            oninvalid="this.setCustomValidity('Utilice un formato de 8 digitos seguidos de un guion y un digito (********-*)')"
                                            oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="text" hidden name='action' value='update'>
                                <input type="text" value="<?php echo $_GET['code']; ?>" name="clientID" hidden>
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