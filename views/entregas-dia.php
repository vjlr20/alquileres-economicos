<?php 
require_once 'core/rentals.php';
$ren = $rental->listDayRental();


?>

<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Estas son las entregas para este dia. <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="orange" class="bi bi-box-seam" viewBox="0 0 16 16">
  <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg> </h1>
    </div>
  </div>
</section>
<div class="container-fluid">
  <div class="table-responsive text-center">
    <table class="table table-striped table-hover pt-3">
      <thead class="table-dark">
        <tr>
          <th>Hora de entrega</th>
          <th>Productos</th>
          <th>Direccion</th>
          <th class="ml-3">Cliente</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if(count($ren) > 0){
        foreach($ren as $row){
      ?>
        <tr>
          <td><input type="time" value="<?php echo $date = $rental->formattedDate($row['fecha_entrega'],"date")?>" readonly class="form-control-plaintext text-danger" ></td>
          <td><?php echo $row['productos']?></td>
          <th><?php echo $row['direccion']?></th>
          <th class="text-success"><?php echo $row['nombres']?> <?php echo $row['apellidos']?></th>
          <th><a href="index.php?page=detalles-alquiler&code=<?php echo $row['alquileres_id'];?>&idcliente=<?php echo $row['cliente_id']?>" class="btn btn-success">Ver detalles</a></th>
        </tr>
        <?php 
        }
      } else{
        ?>
        <tr>
          <td colspan="4">No hay entregas para este dia</td>
        </tr>
        <?php 
      }
        ?>
      </tbody>
    </table>
  </div>
</div>