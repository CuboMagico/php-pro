<?php

    function controller ($uriMatches, $params) {
        [$controller, $method] = explode("@", array_values($uriMatches)[0]);
        $controllerAndPath = CONTROLLER_PATH . $controller;
        
        if (!class_exists($controllerAndPath)) {
            throw new Exception("Controller $controller não existe");
        }

        $controllerInstance = new $controllerAndPath;

        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("O metodo $method não existe no controller $controller");
        }

        return $controllerInstance->$method($params);
    }

?>