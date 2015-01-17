<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 16/01/2015
 * Time: 11:02 PM
 */

namespace utils;
interface File
{

    public function readFile();
    public function writeFile();
}

class FileAdmin implements File {

    public $content;
    private $filename;


    public function __construct($fileName){
        $this->filename = $fileName;
        $this->content = "";
    }

    private function fileExist(){
        return file_exists($this->filename);
    }

    private function fileSize(){
        return filesize($this->filename);
    }

    private function manipulateFile($mode){
    switch($mode) {
        case "r":
            if ($this->fileExist()) {
                $file = fopen($this->filename, $mode);
                $this->content = fread($file, $this->fileSize());
                fclose($file);
            }
            break;
        case "w":
            $file = fopen($this->filename, $mode);
            fwrite($file, $this->content);
            fclose($file);
    }

    }

    public function readFile(){
        $this->manipulateFile("r");
    }

    public  function  writeFile(){
        $this->manipulateFile("w");
    }
} 