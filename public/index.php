<?php

    require "bootstrap.php";
    
    try {
        $router = router();

        extract($router["data"]);

        if (!isset($router["view"])) {
            throw new Exception("Parametro view não passado");
        }

        if (!file_exists(VIEWS.$router["view"])) {
            throw new Exception("O arquivo da view não existe");
        }

        $view = $router["view"];

        require VIEWS."master.php";

    } catch (Exception $e) {
        var_dump($e->getMessage());
    }

?>