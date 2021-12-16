<?php

    namespace app\controllers;

    class Login {

        function index () {
            return [
                "view" => "login.php",
                "data" => [
                    "title" => "Faça seu login",
                ]
            ];
        }

        function store () {
            var_dump($_POST);
            die();
        }
    }