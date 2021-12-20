<?php

    function validate (array $validations) {
        foreach ($validations as $field => $validation) {
            if (!str_contains($validation, "|")) {
                $result[$field] = $validation($field);
            }
        }

        if (in_array(false, $result)) {
            return false;
        }

        return $result;
    }


    function required ($field) {
        if (empty($_POST[$field])) {
            setFlash($field, "O campo não pode ser vazio");
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }

?>