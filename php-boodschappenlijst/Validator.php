<?php

class Validator{
    public static function string($value, $min = 1, $max = INF){
        $value = trim($value);
        return (strlen($value) >= $min && strlen($value) <= $max) ? $value : FALSE;
    }
    public static function integer($value, $min = 1){
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        return $value >= $min ? $value : FALSE;
    }
    public static function decimal($value, $min = 0, $max = 2){
        $value = filter_var(str_replace(",", ".", $value), FILTER_VALIDATE_FLOAT); // return $value if True, else False

        # regex zonder concatination: /^\d+\.?\d{$min, $max}?$/
        # / / <- alles hierin is regex, voor php.
        # ^ $ <- start en eind van text.
        # \d+ <- 1 of meer digits.
        # \.? <- optioneel, een punt.
        # \d{min,max} <- minstens min digits, maximaal max digits.
        return preg_match('/^\d+\.?\d{' . $min . ',' . $max . '}?$/', $value) ? $value : FALSE;
    }
}