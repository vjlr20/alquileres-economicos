<?php
    require_once 'components/navbar.php';
?>
<section class="py-4">
    <div class="container">
        <?php
            if (!isset($_GET['page'])) {
                require_once 'views/inicio.php';
            } else {
                $page = $_GET['page'];

                $route = 'views/' . $page . '.php';

                if (file_exists($route)) {
                    require_once $route;
                } else {
                    require_once 'views/errors/404.php';
                }
            }
        ?>
    </div>
</section>
