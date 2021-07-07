<?php
require_once 'core/rentals.php';
date_default_timezone_set('America/El_Salvador');

$response = $rental->getRental(intval($_GET['code']));

?>
<div class="container-fluid">
    <div class="mb-4">
        <h2 class="text-center">Se detalla la informacion del alquiler.</h2>
    </div>
    <div class="mb-2">
        <form action="">
            <a href="index.php?page=alquileres&code=<?php echo $_GET['idcliente']; ?>" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
        </form>
    </div>
    <div class="mb-4">
        <div class="text-center">
            <p class="d-inline">Si desea eliminar este alquilere, haga click aquí</p>&nbsp;&nbsp;&nbsp;
            <form class="d-inline" method="post" action="/core/rentals.php">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="alquiler_id" value="<?php echo $_GET['code'] ?>">
                <input type="hidden" name="cliente" value="<?php echo $_GET['idcliente'] ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="../core/rentals.php" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="detalles_label" class="label-form mb-2">Detalles del alquiler:</label>
                        <textarea class="form-control " name="detalles" id="" cols="30" rows="10"><?php echo $response['productos']; ?> </textarea>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="mb-2">
                            <label for="" class="form-label">Fecha en que se registro este alquiler</label>
                            <input type="datetime-local" class="form-control" value="<?php echo $formatedDate = $rental->formattedDate($response['fecha_alquiler'], "full"); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="" class="form-label mt-3">Fecha entrega alquiler</label>
                                    <input class="form-control" value="<?php echo $formatedDate = $rental->formattedDate($response['fecha_entrega'], "full"); ?>" type="datetime-local" min="<?php echo date('Y-m-d') . "T00:00"; ?>" name="fecha" required />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="" class="form-label mt-3">Ingrese total</label>
                                    <input class="form-control" type="number" value="<?php echo $response['total'] ?>" name="total" min="0" step="0.01" required />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label ">direccion entrega</label>
                            <input class="form-control" type="text" value="<?php echo $response['direccion']; ?>" name="direccion" required />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mt-3">Estado de paga</label>

                            <select class="form-control" name="estado" id="estado" required>
                                <option value="abono" <?php echo $response['estado'] == 'abono' ? 'selected="selected"' : 'id="asd"'; ?>>Abono</option>
                                <option value="Cancelado" <?php echo $response['estado'] == 'Cancelado' ? 'selected="selected"' : ''; ?>>Cancelado</option>
                            </select>
                        </div>
                        <div class="mb-3" id="mostrar">
                           <?php 
                            if(!empty($response['abono'])){
                                ?>
                                <input type='number' name='abono' class='form-control' placeholder='ingrese el abono' min='0' step='0.01' value='<?php echo $response['abono']?>'required>
                                <?php
                            }
                           ?>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="hidden" value="<?php echo $_GET['code'] ?>" name="alquiler_id">
                            <input type="hidden" name="cliente" value="<?php echo $_GET['idcliente'] ?>">
                            <input type="hidden" value="update" name="action">
                            <button class="btn btn-success mt-2" type="submit">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="static/js/abono.js"></script>
</div>