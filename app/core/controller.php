<?php

    function controller ($uriMatches, $params) {
        [$controller, $method] = explode("@", array_values($uriMatches)[0]);
        $controllerAndPath = CONTROLLER_PATH . $controller;
        
        if (!class_exists($controllerAndPath)) {
            throw new Exception("Controller $controller não existe");
        }

        $controllerInstance = new $controllerAndPath;
        $controllerInstance->$method($params);
    }

?>