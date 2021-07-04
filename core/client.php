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
            //cod$e...
            $result = null;
            $sql = "INSERT INTO clientes(nombres, apellidos, dui, telefono) VALUES ('" . $nombre . "','" . $apellido . "','" . $DUI . "','" . $Ntelefono . "')";

            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    public function updateClient($clientID,$nombre, $apellido, $DUI, $telefono)
    {
        try {
            //code...
            $result = null;
            $sql = "UPDATE clientes SET nombres=:nombres,apellidos=:apellidos,dui=:dui,telefono=:telefono WHERE cliente_id = :cliente_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":nombres", $nombre);
            $stm->bindParam(":apellidos", $apellido);
            $stm->bindParam(":dui", $DUI);
            $stm->bindParam(":telefono", $telefono);
            $stm->bindParam(":cliente_id",$clientID);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    public function deleteClient($clientID){
        try {
            //code...
            $result = null;
            $sql = "DELETE FROM `clientes` WHERE cliente_id =:cliente_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":cliente_id",$clientID);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    // eliminar los registros de alquileres del cliente
    public function deleteClientRentals($client){
        try {
            //code...
            $result = null;
            $sql = "DELETE FROM `alquileres` WHERE cliente_id = :cliente_id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":cliente_id",$client);
            $stm->execute();
            return $result;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
        }
    }
    // ultimo cliente ingresado de
    public function getLastClient()
    {
        try {
            //code...
            $rs = null;
            $sql = "select cliente_id from clientes ORDER BY cliente_id DESC LIMIT 1;";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();

            $rs = $stm->fetchColumn();

            return $rs;
        } catch (Throwable $th) {
            //throw $th;
            die($th->getMessage());
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
        $nombres = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $Ntelefono = $_REQUEST['telefono'];
        $DUI = $_REQUEST['dui'];

        $send = $client->insertClient($nombres, $apellido, $Ntelefono, $DUI);
        // obtener el ultimo cliente ingresado en
        $last = $client->getLastClient();


        header("Location: ../index.php?page=alquileres&code=" . $last);
        break;

    case 'update':
        $nombres = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $Ntelefono = $_REQUEST['telefono'];
        $DUI = $_REQUEST['dui'];
        $clientID = $_REQUEST['clientID'];

        $send = $client->updateClient($clientID,$nombres, $apellido, $DUI, $Ntelefono);
        echo "aqui";  
        header ('Location: ../index.php');
        break;

    case 'delete':
        $clientID = $_REQUEST['clientID'];  
        // eliminar los alquileres del clientes
        $send = $client->deleteClientRentals($clientID);
        // eliminar al cliente
        $send = $client->deleteClient($clientID);

        header ('Location: ../index.php');
        break;
}
