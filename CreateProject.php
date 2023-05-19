
<script src="../Assets/JS/main.js" type="text/javascript"></script>
<?php
require_once 'MagmaMc.UAS.PHP/MagmaMc.UAS.php';
$Folder = "Share/".$_REQUEST["Project"]."/";

if (is_dir($Folder) | !UserData->VaildToken($_REQUEST["Token"]))
{
    http_response_code(400);
    echo "400: bad request";
    exit();
}

mkdir($Folder, 0777, true);
$MainFile = fopen($Folder."main.py", "c+");
fwrite($MainFile, file_get_contents("Base/default.py"));
fclose($MainFile);


mkdir($Folder."Sounds/", 0777, true);
mkdir($Folder."files/", 0777, true);

file_put_contents($Folder."OwnerIDs.db", $_REQUEST["Token"]);

?>

<script>
    Cookies.set("Project", '<?php echo $_REQUEST["Project"]?>');
    window.location.href = "../";
</script>