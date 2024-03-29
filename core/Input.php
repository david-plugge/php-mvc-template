<?php

class Input {
    public static function sanitize($dirty) {
        return htmlentities($dirty, ENT_QUOTES, "UTF-8");
    }

    public static function get($input) {
        if (isset($_POST[$input])) {
            return self::sanitize($_POST[$input]);
        } elseif (isset($_GET[$input])) {
            return self::sanitize($_GET[$input]);
        }
    }

    public static function exists($input) {
        return (isset($_POST[$input]) || isset($_GET[$input])) && self::get($input);
    }
}