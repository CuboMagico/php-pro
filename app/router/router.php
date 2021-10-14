<?php

    function routes () {
        return require "routes.php";
    }

    function UriExactMatchesArrayValue ($uri, $routes) {
        if(array_key_exists($uri, $routes)) {
            echo "existe";
        };
    }

    function router () {
        $uri = str_replace("/club-full-stack-php-profissional/public", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $routes = routes();
        
        UriExactMatchesArrayValue($uri, $routes);
    }