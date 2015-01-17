<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 16/01/2015
 * Time: 09:23 PM
 */

namespace utils;


class PhpVar
{
    private static $instancia;


    private function __construct()
    {
        //echo "He creado un " . __CLASS__ . "\n";
        $this->contador =0;
    }

private function getVariable($type,$name,$isFalse,$filter ){
    $tmp = $isFalse;

    switch($type){
        case 'get':
            $array = $_GET;
            break;
        case 'post':
            $array = $_POST;
            break;
        case 'session':
            $array = $_SESSION;
            break;
        default:
            $array = $_GET;
            break;
    }
    if(isset($array[$name])){
        $tmp = $array[$name];
    }

    if(!is_null($filter)){
        $tmp = filter_var($tmp,$filter);
    }
    return $tmp;
}

    public function varGet($name,$isFalse = false,$filter = null){

        return $this->getVariable("get",$name,$isFalse,$filter);

    }

    public function varPost($name,$isFalse = false,$filter = null){

        return $this->getVariable("post",$name,$isFalse,$filter);

    }

    public function varSession($name,$isFalse = false,$filter = null){

        return $this->getVariable("session",$name,$isFalse,$filter);

    }

    public static function init()
    {
        if (  !self::$instancia instanceof self)
        {
            self::$instancia = new self;
        }
        return self::$instancia;
    }


}