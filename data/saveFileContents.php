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
$content = json_decode(file_get_contents('php://input'), true);
$valores = "";
foreach($content as $val){
    $valores .= $val['value'].",";
}
$valores = substr($valores,0,-1);
$numero->content = $valores;
$numero->writeFile(",",",");
$response["status"] = "ok";
echo json_encode($response);
exit(0);


