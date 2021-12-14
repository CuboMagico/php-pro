<?php

    function connection () {
        return new PDO("mysql:host=localhost;dbname=club-fullstack-php-pro", "root", "Maciel64!", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }