<?php

require_once 'MagmaMc.UAS.PHP/MagmaMc.UAS.php';

UserData->Login("http://".$_SERVER['HTTP_HOST']."/MagmaMc.UAS.PHP/HandleLogin.php");

?>
<!DOCTYPE html>
<html lang="en" encoding="UTF-8" >
        <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Projects</title>
        <meta name="title" content="Projects">
        <meta name="description" content="Run Python With The Module Pygame Zero Online For Free">
        <meta name="author" content="MagmaMc">
        <meta name="keywords" content="Skulpt, pygame, python, pyzero, online, pygame-zero">
        <meta name="theme-color" content="hsl(256, 54%, 15%)">

        <meta property="og:type" content="website">
        <meta property="og:url" content="https://python.magma-mc.net">
        <meta property="og:title" content="v">
        <meta property="og:description" content="Run Python With The Module Pygame Zero Online For Free">
        <meta property="og:image" content="http://magma-mc.net/Assets/Png/Image.png">


        
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://python.magma-mc.net">
        <meta property="twitter:title" content="Projects">
        <meta property="twitter:description" content="Run Python With The Module Pygame Zero Online For Free">
        <meta name="twitter:site" content="@SMLkaiellis">
        <meta name="twitter:creator" content="@SMLkaiellis">
        <meta property="twitter:image" content="http://magma-mc.net/Assets/Png/Image.png">

        <!-- Import -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="../Assets/JS/main.js" type="text/javascript"></script>
        <link rel="stylesheet" href="./Assets/CSS/Custom.css"> 

    </head>
    
    <embed type="text/html" src="../Assets/HTML/nav_Projects.html"  width="100%"> 
    
<body id="main" style="background: #1c1c1c; color: white; text-align: center;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

    <script>
        function CreateProject(prompt){
            prompt = window.prompt(prompt)
            if (prompt !== null) {
                if (prompt.length >= 5)
                    window.parent.location.href = "../CreateProject.php?Project="+b+"&Token="+Cookies.get("Token");

                else {
                    alert("Project Name Needs to be Atleast 5 characters");
                    CreateProject(prompt)
                }
            }       
        }
    </script>
    <header style="text-align: center;" >
        <h1>Python Projects</h1>
        <p class="center">Run PyGame (Zero) Directly From Your Brower</p>
        <button type="button" class="btn btn-primary" onclick="CreateProject('ProjectName')">Create A Project</button>
    </header>               
</body>
<?php

$a = array("primary", "danger", "success", "warning", "info", "secondary

");
$b = rand(0,5);
if ($handle = opendir('Share/')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            if ($entry !== "index.php" and $entry !== "OwnerIDs.db") {
                $OwnerFile = fopen("./Share/".$entry."/OwnerIDs.db", "c+");
                $owners = fread($OwnerFile, filesize("./Share/".$entry."/OwnerIDs.db"));
                fclose($OwnerFile);
                if (strpos($owners, $_COOKIE["Token"]) !== false) {
                    $b += 1;
                    if ($b == 6){
                        $b = 0;
                    }
                    echo "<button class='btn btn-".$a[$b] ."' onclick='Cookies.set(`Project`, `$entry`);window.location.href =`../?ID=$entry`'>$entry</button></br>";
                }
            }
        }
    }

    closedir($handle);
}

?>

</html>