<?php
    namespace app\controllers;

    class User {

        function index ($params) {
            echo "index do user";
            var_dump($params);
        }

        function show ($params) {
            echo "Dados do user";
            var_dump($params);
        }
    }