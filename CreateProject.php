
<script src="../Assets/JS/main.js" type="text/javascript"></script>
<?php
require_once 'MagmaMc.UAS.PHP/MagmaMc.UAS.php';

if (!isset($_REQUEST["Project"]) | !isset($_REQUEST["Token"]))
{
    http_response_code(400);
    echo "400: Bad Request";
    exit();
}

$Folder = "Share/".$_REQUEST["Project"]."/";

if (is_dir($Folder))
{
    http_response_code(400);
    echo "400: Project Already Exists";
    echo "</br><button onclick=\"history.back()\">Back</button>";
    exit();
    
}
if (!UserData->VaildToken($_REQUEST["Token"]))
{
    http_response_code(400);
    echo "401: bad Token";
    echo "</br><button onclick=\"history.back()\">Back</button>";
    exit();
}

mkdir($Folder, 0777, true);
$MainFile = fopen($Folder."main.py", "c+");
fwrite($MainFile, file_get_contents("Base/default.py"));
fclose($MainFile);


mkdir($Folder."Sounds/", 0777, true);
mkdir($Folder."files/", 0777, true);
mkdir($Folder."images/", 0777, true);
file_put_contents($Folder."files/README.txt", "#Place *.py Files in here which will be automaticly included into main.py");
file_put_contents($Folder."OwnerIDs.db", $_REQUEST["Token"].",\r\n");

?>

<script>
    Cookies.set("Project", '<?php echo $_REQUEST["Project"]?>');
    window.location.href = "../";
</script>