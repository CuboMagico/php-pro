<?php

    function validate (array $validations) {
        $result = [];
        $param = "";

        foreach ($validations as $field => $validation) {
            $result[$field] = (!str_contains($validation, "|")) ? 
            singleValidation($validation, $field, $param) :
            multipleValidations($validation, $field, $param);
        }

        if (in_array(false, $result)) {
            return false;
        }

        return $result;
    }


    function singleValidation ($validation, $field, $param) {
        if (str_contains($validation, ":")) {
            [$validation, $param] = explode(":", $validation);
        }

        return $validation($field, $param);
    }

    

    function multipleValidations ($validation, $field, $param) {
        $explodedPipe = explode("|", $validation);

        foreach ($explodedPipe as $validation) {
            if (str_contains($validation, ":")) {
                [$validation, $param] = explode(":", $validation);
            }
            $result = $validation($field, $param);

            if (!$result) {
                break;
            }
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


    function email ($field) {
        $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if(!$emailIsValid) {
            setFlash($field, "O campo precisa ser um email válido");
            return false;
        }

        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }


    function unique ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        $user = findBy($param, $data, $field);

        if ($user) {
            setFlash($field, "Campo já cadastrado");
            return false;
        }

        return $data;
    }


    function maxlen ($field, $param) {
        $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        if (strlen($data) > $param) {
            setFlash($field, "O campo não pode ter mais que $param caracteres");
            return false;
        }

        return $data;
    }

?>