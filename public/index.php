<?php

    require "bootstrap.php";
    
    try {
        $router = router();

        if (!isset($router["view"])) {
            throw new Exception("Parametro view não passado");
        }

        if (!isset($router["data"])) {
            throw new Exception("Parametro data não passado");
        }

        if (!isset($router["data"]["title"])) {
            throw new Exception("Parametro title não passado");
        }

        if (!file_exists(VIEWS.$router["view"])) {
            throw new Exception("O arquivo da view não existe");
        }

        extract($router["data"]);

        $view = $router["view"];

        require VIEWS."master.php";

    } catch (Exception $e) {
        var_dump($e->getMessage());
    }

?>