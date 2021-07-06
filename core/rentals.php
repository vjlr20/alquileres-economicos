<?php
require_once 'connect.php';

class Rental extends Connect
{
    private $pdo;

    function __construct()
    {
        $this->pdo = Connect::connection();
    }

    public function insertarAlquiler($cliente, $detalles, $total, $fecha, $estadoPaga, $direccion)
    {
        try {
            $result = NULL;

            $sql = "INSERT INTO alquileres (cliente_id, productos, total, fecha_entrega, estado, Direccion) VALUES ('" . $cliente . "', '" . $detalles . "', " . $total . ", '" . $fecha . "', '" . $estadoPaga . "','" . $direccion . "')";
            // var_dump($sql);
            $stm = $this->pdo->prepare($sql);

            // $stm->bindParam(":cliente", $cliente);
            // $stm->bindParam(":detalles", $detalles);
            // $stm->bindParam(":total", $total);
            // $stm->bindParam(":fecha", $fecha);
            // $stm->bindParam(":estado", "1");

            $stm->execute();

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function updateRentals($idAlquiler, $detalles, $total, $fecha, $estadoPaga, $direccion)
    {
        try {
            //code...
            $result = null;
            $sql = "UPDATE `alquileres` SET `productos`=:productos,`total`=:total,`fecha_entrega`=:fecha_entrega,`estado`=:estado,`Direccion`=:Direccion WHERE alquileres_id = :alquileres_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":productos", $detalles);
            $stm->bindParam(":total", $total);
            $stm->bindParam(":fecha_entrega", $fecha);
            $stm->bindParam(":estado", $estadoPaga);
            $stm->bindParam(":Direccion", $direccion);
            $stm->bindParam(":alquileres_id", $idAlquiler);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    public function deleteRental($idAlquiler)
    {
        try {
            //code...
            $result = null;

            $sql = "DELETE FROM alquileres WHERE alquileres_id = :alquileres_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':alquileres_id', $idAlquiler);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    public function getRental($id)
    {
        try {
            //code...
            $result = null;
            $sql = "SELECT * FROM alquileres WHERE alquileres_id = :alquileres_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":alquileres_id", $id);
            $stm->execute();

            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }

    public function listRentals($id)
    {
        try {
            $result = NULL;

            $sql = "SELECT * FROM alquileres WHERE cliente_id = :cliente";

            $stm = $this->pdo->prepare($sql);

            $stm->bindParam(":cliente", $id);

            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listDayRental()
    {
        try {
            //code...
            $result = null;
            $sql = "SELECT alquileres.alquileres_id, alquileres.fecha_entrega, alquileres.productos, alquileres.cliente_id, alquileres.direccion, clientes.nombres, clientes.apellidos FROM alquileres INNER JOIN clientes on alquileres.cliente_id = clientes.cliente_id WHERE DATE(alquileres.fecha_entrega) = CURDATE() ORDER BY `alquileres`.`fecha_entrega` ASC";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    public function formattedDate($date, $accion)
    {
        $formattedDate = null;
        $separarEspacio = explode(" ", $date);
        if ($accion == "full") {
            $newDate = $separarEspacio[0] . "T";
            $deleteSeconds = explode(":", $separarEspacio[1]);
            $formattedDate = $newDate . $deleteSeconds[0] . ":" . $deleteSeconds[1];

            return $formattedDate;
        } else {
            $deleteSeconds = explode(":", $separarEspacio[1]);
            $formattedDate = $deleteSeconds[0] . ":" . $deleteSeconds[1];

            return $formattedDate;
        }
    }
}

$rental = new Rental();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "list";
}

$response = NULL;

switch ($action) {
    case 'insert':
        $detallesAlquiler = $_POST['detalles'];
        $fechaAlquiler = $_POST['fecha'];
        $totalAlquiler = $_POST['total'];
        $idCliente = $_POST['cliente_id'];
        $estadoPaga = $_POST['estado'];
        $direccion = $_POST['direccion'];

        $res = $rental->insertarAlquiler($idCliente, $detallesAlquiler, $totalAlquiler, $fechaAlquiler, $estadoPaga, $direccion);

        header("Location: ../index.php?page=alquileres&code=" . $idCliente);
        break;

    case 'update':
        $idAlquiler = $_POST['alquiler_id'];
        $detallesAlquiler = $_POST['detalles'];
        $fechaAlquiler = $_POST['fecha'];
        $totalAlquiler = $_POST['total'];
        $estadoPaga = $_POST['estado'];
        $direccion = $_POST['direccion'];
        $clienteReturn = $_POST['cliente'];

        $res = $rental->updateRentals($idAlquiler, $detallesAlquiler, $totalAlquiler, $fechaAlquiler, $estadoPaga, $direccion);

        header("Location: ../index.php?page=detalles-alquiler&code=" . $idAlquiler . "&idcliente=" . $clienteReturn);
        break;

    case 'delete':
        $idAlquiler = $_POST['alquiler_id'];
        $clienteReturn = $_POST['cliente'];
        $res = $rental->deleteRental($idAlquiler);
        header('Location: ../index.php?page=alquileres&code=' . $clienteReturn);
        break;
}
