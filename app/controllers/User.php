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
                "email" => "required|unique:users",
                "password" => "required|maxlen:20",
            ]);
            

            if (!$validate) {
                return redirect("/user/create");
            }

            $validate["password"] = password_hash($validate["password"], PASSWORD_DEFAULT);

            $created = create("users", $validate);

            if (!$created) {
                setFlash("signup", "Não foi possível realizar o cadastro, tente novamente em alguns segundos");
                return redirect("/user/create");
            }

            return redirect("/login");
        }
    }