<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 16/01/2015
 * Time: 11:43 PM
 */

namespace app;
// Definimos una interface, con el metodo que
// es necesario para nuestra clase dependiente.


use utils\File;

class Numeros {
    public  $file;
    public  $content;
    public $separator;
    public $formater;
    private $json;


    // Usamos el typehint ILogger para forzar que
    // la dependencia debe implementar esa interface.
    public function __construct(File $file)
    {
        $this->file = $file;

    }

    public function getJson(){
        return $this->json;
    }

    public function readFile($separator = ",", $formater = "<br>"){
        $this->file->readFile();
        $this->content = str_replace($separator,$formater,$this->file->content);
        $this->json = json_encode(explode($separator,$this->file->content));
    }

    public  function writeFile($separator = ",", $formater = "<br>"){
        $this->content = str_replace($separator,$formater,$this->content);
        $this->file->content = $this->content;
        $this->json = json_encode(explode($separator,$this->file->content));
        $this->file->writeFile();
    }


}