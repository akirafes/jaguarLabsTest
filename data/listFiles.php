<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 17/01/2015
 * Time: 12:29 PM
 */
header('Content-type: application/json');
$files = scandir("./files");
foreach ($files as $file) {
    if($file != "." and $file != ".."){
        $jsonFile['type'] = 'file';
        $jsonFile['name'] = $file;
        $jsonFiles[] = $jsonFile;
    }
}
$jsonResponse['content'] = $jsonFiles;
echo json_encode($jsonResponse);
