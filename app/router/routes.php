<?php

    return [
        "POST" => [
            "/login" => "Login@store"
        ],
        "GET" => [
            "/" => "Home@index",
            "/user/[0-9]+" => "User@index",
            "/user/[0-9]+/name/[a-z]+" => "User@show",
            "/user/create" => "User@create",
            "/login" => "Login@index",
        ]
    ];
