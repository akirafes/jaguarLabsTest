<?php
require_once "PhpVar.php";
require_once "FileAdmin.php";
require_once "Numeros.php";
header('Content-type: application/json');
$vars = \utils\PhpVar::init();

$fileName = $vars->varGet('archivo','default.txt');
$contenido = $vars->varGet('contenido',0);

$archivo = new \utils\FileAdmin($fileName);
$numero = new \app\Numeros($archivo);
/*$numero->readFile(',','<br>');
echo $numero->content;*/
$numero->content = $contenido;
$numero->writeFile(",","\n");
$numero->readFile("\n","<br>");
echo $numero->getJson();
exit(0);

