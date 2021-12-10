<?php
    namespace app\controllers;

    class Home {

        function index ($params) {
            return [
                "view" => "home.php",
                "data" => [
                    "name" => "Maciel",
                    "teste" => "String de teste"
                    ]
            ];
        }
    }

?>