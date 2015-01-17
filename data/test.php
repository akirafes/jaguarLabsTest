<?php
require('includes.php');
header('Content-type: application/json');
$vars = \utils\PhpVar::init();

$json = '{"numeros":[1,6,10,19971.15564,11,56.7],"fileName":"otrotest.txt"}';
$json = json_decode($json);
$fileName = "./files/".$json->fileName;
$contenido = $json->numeros;
$contenido = implode(",",$contenido);

/*$fileName = $vars->varGet('archivo','default.txt');
$contenido = $vars->varGet('contenido',0);*/

$archivo = new \utils\FileAdmin($fileName);
$numero = new \app\Numeros($archivo);
/*$numero->readFile(',','<br>');
echo $numero->content;*/
$numero->content = $contenido;
$numero->writeFile(",","\n");
$numero->readFile("\n","<br>");
echo $numero->getJson();
exit(0);

