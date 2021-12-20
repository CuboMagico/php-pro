<?php

    return [

        "POST" => [
            "/login" => "Login@store",
            "/user/create" => "User@store",
        ],

        "GET" => [
            "/" => "Home@index",
            "/login" => "Login@index",
            "/logout" => "Login@destroy",
            "/user/[0-9]+" => "User@index",
            "/user/[0-9]+/name/[a-z]+" => "User@show",
            "/user/create" => "User@create",
        ]
    ];
