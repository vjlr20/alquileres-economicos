<?php
    require_once 'connect.php';

    class Client extends Connect
    {
        private $pdo;

        function __construct()
        {
            $this->pdo = Connect::connection();
        }

        public function listarClientes()
        {
            try {
                $result = NULL;

                $sql = "SELECT * FROM clientes ORDER BY cliente_id DESC";

                $stm = $this->pdo->prepare($sql);
                $stm->execute();

                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function getCliente($id)
        {
            try {
                $result = NULL;

                $sql = "SELECT * FROM clientes WHERE cliente_id = :cliente";

                $stm = $this->pdo->prepare($sql);

                $stm->bindParam(":cliente", $id);

                $stm->execute();

                $result = $stm->fetch(PDO::FETCH_ASSOC);

                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function insertClient($nombre, $apellido, $Ntelefono, $DUI)
        {
            try {
                $result = NULL;

                $sql = "INSERT INTO clientes (nombres, apellidos, dui, telefono) VALUES ('" . $nombre . "','" . $apellido . "','" . $DUI . "','" . $Ntelefono . "')";

                $stm = $this->pdo->prepare($sql);

                $stm->execute();
                
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function updateClient($clientID, $nombre, $apellido, $DUI, $telefono)
        {
            try {
                $result = NULL;

                $sql = "UPDATE clientes SET nombres = :nombres, apellidos = :apellidos, dui = :dui,telefono = :telefono WHERE cliente_id = :cliente_id";
                
                $stm = $this->pdo->prepare($sql);
                
                $stm->bindParam(":nombres", $nombre);
                $stm->bindParam(":apellidos", $apellido);
                $stm->bindParam(":dui", $DUI);
                $stm->bindParam(":telefono", $telefono);
                $stm->bindParam(":cliente_id",$clientID);
                
                $stm->execute();
                
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function deleteClient($clientID)
        {
            try {
                $result = NULL;

                $sql = "DELETE FROM `clientes` WHERE cliente_id =:cliente_id";
                
                $stm = $this->pdo->prepare($sql);
                
                $stm->bindParam(":cliente_id",$clientID);
                
                $stm->execute();
                
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // eliminar los registros de alquileres del cliente
        public function deleteClientRentals($client)
        {
            try {
                $result = NULL;

                $sql = "DELETE FROM `alquileres` WHERE cliente_id = :cliente_id";
                
                $stm = $this->pdo->prepare($sql);
                
                $stm->bindParam(":cliente_id", $client);
                
                $stm->execute();
                
                return $result;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        // ultimo cliente ingresado de
        public function getLastClient()
        {
            try {
                $rs = NULL;
                
                $sql = "SELECT cliente_id FROM clientes ORDER BY cliente_id DESC LIMIT 1;";
                
                $stm = $this->pdo->prepare($sql);
                
                $stm->execute();

                $rs = $stm->fetchColumn();

                return $rs;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    $client = new Client();

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = "list";
    }

    $response = NULL;

    switch ($action) {
        case 'list':
            $response = $client->listarClientes();
            break;

        case 'insert':
            // el ingreso de cliente
            $nombres = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $dui = $_POST['dui'];

            $send = $client->insertClient($nombres, $apellido, $telefono, $dui);

            // obtener el ultimo cliente ingresado en
            $last = $client->getLastClient();


            header("Location: ../index.php?page=alquileres&code=" . $last);
            break;

        case 'update':
            $nombres = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $dui = $_POST['dui'];
            $clientID = $_POST['clientID'];

            $send = $client->updateClient($clientID, $nombres, $apellido, $dui, $telefono);
            // echo "aqui";  
            header ('Location: ../index.php?page=alquileres&code='.$clientID);
            break;

        case 'delete':
            $clientID = $_POST['clientID'];  
            // eliminar los alquileres del clientes
            $send = $client->deleteClientRentals($clientID);
            // eliminar al cliente
            $send = $client->deleteClient($clientID);

            header ('Location: ../index.php');
            break;
    }
?>
