<?php

    function redirect ($to) {
        return header("Location: " . $to);
    }


    function setMessageAndRedirect ($to, $index, $message) {
        setFlash($index, $message);
        return redirect($to);
    }

?>