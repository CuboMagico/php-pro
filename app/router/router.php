<?php

    function routes () {
        return require "routes.php";
    }


    function uriExactMatchesArrayValue ($uri, $routes) {
        return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
    }


    function uriDinamicMatchesArrayValue ($uri, $routes) {
        return array_filter($routes, function($value) use($uri){
            
            $regex = str_replace("/", "\/", $value);
            return preg_match("/^$regex$/", $uri);

        }, ARRAY_FILTER_USE_KEY);
    }


    function getParamsFromDinamicUri ($uri, $uriMatches) {
        $match = array_keys($uriMatches)[0];

        $uriParams = array_diff(
            explode("/", ltrim($uri, "/")),
            explode("/", ltrim($match, "/"))
        );

        return $uriParams;
    }


    function paramsFormat ($uri, $params) {

        $uri = explode("/", ltrim($uri, "/"));
        $parData = [];

        foreach ($params as $index => $param) {
            $parData[$uri[$index - 1]] = $param;
        }

        return $parData;
    }


    function router () {
        $uri = str_replace("/club-full-stack-php-profissional/public", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $routes = routes()[$requestMethod];

        $uriMatches = uriExactMatchesArrayValue($uri, $routes);

        
        $params = [];
        if (empty($uriMatches)) {
            $uriMatches = uriDinamicMatchesArrayValue($uri, $routes);

            if(!empty($uriMatches)) {
                $params = getParamsFromDinamicUri($uri, $uriMatches);
                $params = paramsFormat($uri, $params);
            }
        }

        if (!empty($uriMatches)) {
            return controller($uriMatches, $params);
        }

        throw new Exception("Deu ruim...");
    }

?>