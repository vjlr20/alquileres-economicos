<?php
    require_once 'connect.php';

    class Rental extends Connect
    {
        private $pdo;

        function __construct()
        {
            $this->pdo = Connect::connection();
        }

        public function insertarAlquiler($cliente, $detalles, $total, $fecha)
        {
            try {
                $result = NULL;

                $sql = "INSERT INTO alquileres (cliente_id, productos, total, fecha_entrega, estado) VALUES (:cliente, :detalles, :total, :fecha, :estado)";

                $stm = $this->pdo->prepare($sql);

                $stm->bindParam(":cliente", $cliente);
                $stm->bindParam(":detalles", $detalles);
                $stm->bindParam(":total", $total);
                $stm->bindParam(":fecha", $fecha);
                $stm->bindParam(":estado", 1);

                $stm->execute();

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
        case 'list':
            // $response = $client->listarClientes();
            break;

        case 'insert':
            $detallesAlquiler = $_POST['detalles'];
            $fechaAlquiler = $_POST['fecha'];
            $totalAlquiler = $_POST['total'];
            
            $res = $rental->insertarAlquiler(1, $detallesAlquiler, $fechaAlquiler, $totalAlquiler);

            header("Location: ../index.php?page=alquileres&code=1");
            break;

        case 'update':

            break;

        case 'delete':

            break;
    }
?>


