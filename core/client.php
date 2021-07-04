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
            
            break;

        case 'update':
            
            break;

        case 'delete':
            
            break;
    }
?>

