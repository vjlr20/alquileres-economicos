<?php
    require_once 'core/client.php';
    require_once 'core/rentals.php';

    $res = $client->getCliente(intval($_GET['code']));
    $ren = $rental->listRentals(intval($_GET['code']));

    // var_dump($ren);
?>
<div class="contaier-fluid">
    <div class="mb-3">
        <a href="index.php" class="btn btn-info"><i class="zmdi zmdi-long-arrow-return"></i>&nbsp;Regresar</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body" >
                    <div class="mb-3">
                        <h5 class="card-title text-center">Datos del cliente</h5>
                    </div>
                    <div class="container-fluid">
                        <div class="mb-3">                            
                            <h6 class="card-text d-inline">Cliente:</h6>&nbsp;<p class="card-text d-inline" style="font-size: 15px;">#<?php echo $res['cliente_id']; ?></p>
                        </div>
                        <div class="mb-3">
                            <h6 class="card-text d-inline">Nombres:</h6>&nbsp;<p class="card-text d-inline" style="font-size: 15px;"><?php echo $res['nombres']; ?></p>
                        </div>
                        <div class="mb-3">                            
                            <h6 class="card-text d-inline">Apellidos:</h6>&nbsp;<p class="card-text d-inline" style="font-size: 15px;"><?php echo $res['apellidos']; ?></p>
                        </div>
                        <div class="mb-3">                            
                            <h6 class="card-text d-inline">Teléfono:</h6>&nbsp;<p class="card-text d-inline" style="font-size: 15px;"><?php echo $res['telefono']; ?>&nbsp;<a href="tel:+503<?php echo $res['telefono']; ?>" class="btn btn-warning">Llamar</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <center>
        <a href="index.php?page=nuevo-alquiler&code=<?php echo $res['cliente_id']; ?>" class="btn btn-success">Nuevo alquiler</a>
    </center>
    <br>
    <div>
        <h4 class="text-center">Alquileres realizados a este cliente</h4>
        <div class="container-fluid">
            <div class="table-responsive text-center">
                <table id="myTable" class="table table-striped table-hover pt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Detalles</th>
                            <th>Precio Total ($)</th>
                            <th>Fecha de alquiler</th>
                            <th>Fecha de entrega</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (count($ren) > 0) {
                            foreach ($ren as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['alquileres_id']; ?></td>
                            <td><?php echo $row['productos']; ?></td>
                            <td>
                                <span class="text-success">
                                    <strong>$<?php echo $row['total']; ?></strong>
                                </span>
                            </td>
                            <td><?php echo $row['fecha_alquiler']; ?></td>
                            <td><?php echo $row['fecha_entrega']; ?></td>
                            <td>
                                <a href="index.php?page=detalles-alquiler&code=1" class="btn btn-primary">Ver</a>
                            </td>
                        </tr>
                    <?php
                            }
                        } else {
                    ?>
                        <tr>
                            <td colspan="6">No se encontraron registros</td>
                        </tr>
                    <?php 
                        } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
