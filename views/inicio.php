<?php
require_once 'core/client.php';
?>
<div class="container-fluid">
    <center>
        <div class="pb-3">
            <h2>Nuestros clientes</h2>
        </div>
        <div class="pb-3">
            <h4>Se detalla la lista de clientes que han alquilado productos</h4>
        </div>
    </center>
    <div class="table-responsive text-center">
        <table id="myTable" class="table table-striped table-hover pt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>DUI</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($response) > 0) {
                    $i = 0;
                    foreach ($response as $row) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['dui']; ?></td>
                            <td>
                                <a href="index.php?page=alquileres&code=<?php echo $row['cliente_id'] ?>" class="btn btn-success">Ver alquileres</a>
                            </td>
                            <td>
                                <a href="index.php?page=detalles-cliente&code=<?php echo $row['cliente_id'] ?>" class="btn btn-info">Ver cliente</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">No se encontraron registros</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>