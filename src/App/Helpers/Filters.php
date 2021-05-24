<?php
namespace App\Helpers;

class Filters{
    public static function required(){
        return [
            "filter"=>FILTER_CALLBACK,
            "options"=> function($input){
                $sanatized = filter_var($input, FILTER_SANITIZE_STRING,
                    FILTER_REQUIRE_SCALAR | FILTER_FLAG_STRIP_LOW |
                    FILTER_FLAG_STRIP_HIGH);
                $result = ($sanatized && strlen($sanatized) > 0)? $sanatized : false;
                return $result;
            }
        ];
    }
    public static function phoneNumber(){
        return [
            "filter" => FILTER_VALIDATE_REGEXP,
            "flags" => FILTER_REQUIRE_SCALAR,
            "options" =>["regexp"=>"/[0-9]{3}-[0-9]{3}-[0-9]{4}/"]
        ];
    }
    public static function positiveNumber(){
        return [
            "filter" => FILTER_VALIDATE_REGEXP,
            "flags" => FILTER_REQUIRE_SCALAR,
            "options" => ["regexp"=>"/^\d+$/"]
        ];
    }
}