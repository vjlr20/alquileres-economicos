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
        $detallesAlquiler = $_REQUEST['detalles'];
        $fechaAlquiler = $_REQUEST['fecha'];
        $totalAlquiler = $_REQUEST['total'];
        // $clienteID = $_REQUEST['clienteid']; pasar el id del cliente al que se le va a relacionar la venta de alquiler 


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "alquileres_economicos";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // para probar le paso por defeto el id cliente "1", el estado igual en "1"
        $sql = "INSERT INTO alquileres( cliente_id, `productos`, `total`, `fecha_entrega`, `estado`) VALUES ('1','" . $detallesAlquiler . "','" . $totalAlquiler . "','" . $fechaAlquiler . "','1')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.php?page=alquileres&code=1");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();



        break;

    case 'update':

        break;

    case 'delete':

        break;
}
