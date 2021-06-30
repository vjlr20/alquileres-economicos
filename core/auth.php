<?php
    require_once 'connect.php';
    
    class Auth extends Connect
    {
        private $pdo;

        function __construct()
        {
            $this->pdo = Connect::connection();
        }

        public function login(string $username, string $password) 
        {
            $response = NULL;

            $pass = sha1($password);
            
            $sql = "SELECT * FROM usuarios WHERE usuario = :usuario ORDER BY usuario_id DESC";
            
            $stm = $this->pdo->prepare($sql);

            $stm->bindParam(":usuario", $username);
            $stm->execute();
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            if ($pass == $result['password']) {
                session_start(['name' => 'alquileres-admin']);

                $_SESSION['code'] = $result['usuario_id'];
                $_SESSION['username'] = $result['usuario'];
                $_SESSION['email'] = $result['email'];

                $response = true;
            } else {
                $response = false;
            }
        }
    
        public function logout() 
        {
            session_start(['name' => 'alquileres-admin']);
            session_unset();

            session_destroy();
        }
    }

    $auth = new Auth();

    $action = NULL;

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = "logout";
    }

    $response = NULL;

    switch ($action) {
        case 'login':
            $response = $auth->login($_POST['username'], $_POST['password']);
            break;

        case 'logout':
            $response = $auth->logout();
            break;
    }

    header('Location: ../index.php');
?>
