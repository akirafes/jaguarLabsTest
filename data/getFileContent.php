<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 17/01/2015
 * Time: 02:42 PM
 */

require('includes.php');
header('Content-type: application/json');
$vars = \utils\PhpVar::init();

$fileName = "./files/".$vars->varGet('archivo','default.txt');
$archivo = new \utils\FileAdmin($fileName);
$numero = new \app\Numeros($archivo);
$numero->readFile(",",",");
$json =  $numero->getJson();
$numero->readFile(",",",");
if($json != '"error"') $jsonStatus = 'ok'; else $jsonStatus = "error";
$json = '{"formated":'.$json.',"raw":"'.$numero->content.'","status":"'.$jsonStatus.'"}';
echo $json;
exit(0);
