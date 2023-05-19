<?php
//alternative way of uploading data
require_once 'MagmaMc.UAS.PHP/MagmaMc.UAS.php';
require_once 'AuthorChecker.php';

if (!isset($_REQUEST["Token"]))
{
    echo "400: bad request";
    http_response_code(400);
    exit();
}
if (!isset($_REQUEST["Data"]))
{
    echo "400: bad request";
    http_response_code(400);
    exit();
}
if (!isset($_REQUEST["Project"]))
{
    echo "400: bad request";
    http_response_code(400);
    exit();
}

if (IsAuthor($_REQUEST["Token"], $_REQUEST["Project"]))
{
	unlink("Share/".$_REQUEST["Project"]."/main.py");
    $file = fopen("Share/".$_REQUEST["Project"]."/main.py", "c+");
    fwrite($file, $_REQUEST["Data"]);
    fclose($file);
    
}
else {
    http_response_code(401);
}
?>