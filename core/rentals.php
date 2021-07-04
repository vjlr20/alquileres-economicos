<?php
    require_once 'connect.php';

    class Rental extends Connect
    {
        private $pdo;

        function __construct()
        {
            $this->pdo = Connect::connection();
        }

        public function insertarAlquiler($cliente, $detalles, $total, $fecha, $estadoPaga)
        {
            try {
                $result = NULL;

                $sql = "INSERT INTO alquileres (cliente_id, productos, total, fecha_entrega, estado) VALUES ('".$cliente."', '".$detalles."', ".$total.", '".$fecha."', '".$estadoPaga."')";
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
            // si funciona bien no duplica nada 
            $res = $rental->insertarAlquiler($idCliente, $detallesAlquiler, $totalAlquiler, $fechaAlquiler, $estadoPaga);

            header("Location: ../index.php?page=alquileres&code=1");
            break;

        case 'update':

            break;

        case 'delete':

            break;
    }
?>


