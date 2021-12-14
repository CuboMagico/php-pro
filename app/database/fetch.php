<?php

    function all ($table, $fields = "*") {
        try {
            $connection = connection();

            $query = $connection->query("SELECT $fields from $table");
            return $query->fetchAll();

        } catch (PDOException $e) {
            var_dump($e);
        }
    }


    function findBy ($table, $value, $field, $fields = "*") {
        try {

            $connection = connection();

            $prepare = $connection->prepare("SELECT $fields FROM $table WHERE $field = :$field");
            $prepare->execute([
                $field => $value
            ]);

            return $prepare->fetch();
            
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

?>