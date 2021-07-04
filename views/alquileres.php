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
                <div class="card-body">
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
                            <h6 class="card-text d-inline">Teléfono:</h6>&nbsp;<p class="card-text d-inline" style="font-size: 15px;"><?php echo $res['telefono']; ?>&nbsp;<a href="tel:+503<?php echo $res['telefono']; ?>" class="btn btn-warning">Llamar</a> <a href="https://api.whatsapp.com/send?phone=+503 <?php echo $res['telefono']; ?>&text=Le%20saludamos%20de%20parte%20de%20Alquileres%20econ%C3%B3micos%20%F0%9F%98%80,%20es%20un%20gusto%20tratar%20con:%20<?php echo $res['nombres'] ?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg> Whatsapp</a> </p>
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