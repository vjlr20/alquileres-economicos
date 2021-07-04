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
        public function insertClient($nombre, $apellido, $Ntelefono, $DUI){
            try {
                //cod$e...
                $result = null;
                $sql = "INSERT INTO `clientes`(`cliente_id`, `nombres`, `apellidos`, `dui`, `telefono`, `fecha_registro`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')"
            } catch (\Throwable $th) {
                //throw $th;
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

           $send -> insertClient($nombres, $apellido, $Ntelef, $DUI);

           
            break;

        case 'update':
            
            break;

        case 'delete':

            break;
    }

?>


