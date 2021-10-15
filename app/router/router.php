<?php

    function routes () {
        return require "routes.php";
    }


    function UriExactMatchesArrayValue ($uri, $routes) {
        if(array_key_exists($uri, $routes)) {
            return [$uri => $routes[$uri]];
        };

        return [];
    }


    function UriDinamicMatchesArrayValue ($uri, $routes) {
        return array_filter($routes, function($value) use($uri){
            
            $regex = str_replace("/", "\/", $value);
            return preg_match("/^$regex$/", $uri);

        }, ARRAY_FILTER_USE_KEY);
    }


    function router () {
        $uri = str_replace("/club-full-stack-php-profissional/public", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $routes = routes();

        $UriMatches = UriExactMatchesArrayValue($uri, $routes);
        if (empty($UriMatches)) {
            $UriMatches = UriDinamicMatchesArrayValue($uri, $routes);
        }

        var_dump($UriMatches);

    }


?>