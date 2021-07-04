<?php
    require_once 'core/client.php';

    date_default_timezone_set('America/El_Salvador');

    $res = $client->getCliente(intval($_GET['code']));

?>
<div class="container-fluid">
    <div class="mb-3">
        <h3 class="text-center">Nuevo alquiler del cliente: <span class="text-success"><?php echo $res['nombres'] ?>&nbsp;<?php echo $res['apellidos'] ?></span></h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="core/rentals.php" method="POST">
                        <input type="hidden" value="insert" name="action">
                        <input type="hidden" value="<?php echo $res['cliente_id']; ?>" name="cliente_id">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="detalles_label" class="label-form mb-2">Detalles del alquiler:</label>
                                <textarea class="form-control " name="detalles" id="" cols="30" rows="10"
                                    required></textarea>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-2">
                                    <label for="" class="form-label">Fecha entrega alquiler</label>
                                    <!-- min="2011-02-20T20:20"
                                         max="2031-02-20T20:20" -->
                                    <?php 
                                        // Pasar formato en PHP
                                        //echo date('d/m/Y g:i a'); 
                                    ?>
                                    <input class="form-control" type="datetime-local"
                                        min="2021-07-03T19:00" name="fecha" required />
                                </div>
                                <div class="mb-5">
                                    <label for="" class="form-label mt-3">Ingrese total</label>
                                    <input class="form-control" type="number" name="total" required />
                                </div>
                                <div class="mb-5">
                                    <label for="" class="form-label mt-3">Estado</label>
                                    <select class="form-control" name="estado" id="estado" required>
                                        <option value="Pago completo">Pago completo</option>
                                        <option value="Pago parcial">Pago parcial</option>
                                        <option value="Primas">Prima</option>
                                    </select>
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