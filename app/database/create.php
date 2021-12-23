<?php

    function create ($table, $fields) {
        try {

            $connect = connection();

            $sql = "INSERT INTO $table (";
            $sql .= implode(", ", array_keys($fields)) . ") values (";
            $sql .= ":" . implode(", :", array_keys($fields)) . ")";


            $prepare = $connect->prepare($sql);

            return $prepare->execute($fields);

        } catch (PDOException $e) {
            var_dump($e);
        }
    }


?>