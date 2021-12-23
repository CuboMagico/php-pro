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
            
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

            if (empty($email) || empty($password)) {
                return setMessageAndRedirect("./login", "login", "Campos vazios");
            }
            
            $user = findBy("users", $email, "email");
            
            if (!$user) {
                return setMessageAndRedirect("./login", "login", "Email ou senha inválidos");
            }
            
            if (!password_verify($password, $user->password)) {
                return setMessageAndRedirect("./login", "login", "Email ou senha inválidos");
            }

            session_start();
            $_SESSION["logged"] = $user;
            return redirect("./");
        }


        function destroy () {
            unset($_SESSION[LOGGED]);

            return redirect("/");
        }
    }