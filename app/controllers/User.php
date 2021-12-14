<?php
    namespace app\controllers;

    class User {

        function index ($params) {
    
            $user = findBy("users", $params["user"], "id");
            
            return [
                "view" => "user.php",
                "data" => [
                    "title" => "User", 
                    "user" => $user
                ]
            ];
        }

        function show ($params) {
            if (!isset($params)) {
                return redirect("/");
            }
        }
    }