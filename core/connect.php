<?php
    require_once '../config/config.php';

    class Connect
    {
        protected static function connection()
        {
            try {
                $pdo = new PDO(DBMS, USER, PASSWORD);
                
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec(COLLATION);
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }

            return $pdo;
        }
    }
?>

