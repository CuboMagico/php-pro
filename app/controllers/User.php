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


        function create () {

            return [
                "view" => "create.php",
                "data" => [
                    "title" => "Cadastro de usuário",
                ]
            ];
        }


        function store () {
            $validate = validate([
                "name" => "required",
                "email" => "required|unique",
                "password" => "required|maxlen",
            ]);

            if (!$validate) {
                return redirect("/user/create");
            }
        }
    }