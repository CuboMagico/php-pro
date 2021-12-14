<?php
    namespace app\controllers;

    class Home {

        function index ($params) {
            
            $users = all("users");

            return [
                "view" => "home.php",
                "data" => [
                    "title" => "Home",
                    "users" => $users
                    ]
            ];
        }
    }

?>