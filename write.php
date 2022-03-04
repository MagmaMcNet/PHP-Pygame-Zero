<?php
if(!empty($_POST['data'])){
    $file = fopen("Share/".$_POST["ID"]."/main.py", 'w');
    fwrite($file, $_POST['data']);
    fclose($file);
    }
?>