<?php

    function routes () {
        return require "routes.php";
    }


    function uriExactMatchesArrayValue ($uri, $routes) {
        if(array_key_exists($uri, $routes)) {
            return [$uri => $routes[$uri]];
        };

        return [];
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
        $routes = routes();

        $uriMatches = uriExactMatchesArrayValue($uri, $routes);
        if (empty($uriMatches)) {
            $uriMatches = uriDinamicMatchesArrayValue($uri, $routes);

            if(!empty($uriMatches)) {
                $params = getParamsFromDinamicUri($uri, $uriMatches);
                $formatedParams = paramsFormat($uri, $params);
            }
        }
    }

?>