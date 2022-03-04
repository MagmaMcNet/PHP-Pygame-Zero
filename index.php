<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>MagmaMc - pgzero online</title>
    <meta name="author" content="MagmMc">
    <meta name="description" content="Runs python code online">
    <meta name="keywords" content="Skulpt, pygame, pyzero, online, pygame-zero">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="🌐 MagmaMc - pgzero online">
    <meta name="twitter:description" content="Runs python code online">
    <meta name="twitter:site" content="@SMLkaiellis">
    <meta name="twitter:creator" content="@SMLkaiellis">
    <meta name="twitter:image" content="./logo.gif">

    <meta property="og:title" content="🌐 MagmaMc - pgzero online">
    <meta property="og:description" content="Runs python code online">
    <meta property="og:url" content="https://magma-mc.net:5000/">
    <meta property="og:site_name" content="magma-mc.net">
    <meta property="og:type" content="website">
    <meta content="#306998" data-react-helmet="true" name="theme-color">
    <meta property="og:image" content="./logo.gif">

    <meta property="fb:app_id" content="100075697834863">

    <!-- Import -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2295738695724894" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="./Base/Skulpt/skulpt.min.js" type="text/javascript"></script>
    <script src="./Base/Skulpt/skulpt-stdlib.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js" type="text/javascript"></script>
    <script src="./Base/main.js" type="text/javascript"></script>

</head>
<script type="text/javascript">
<?php
if(isset($_GET["ID"])){
    ?>
        id =  new URLSearchParams(window.location.search).get('ID')
        Cookies.set("ID", id)
        if(Cookies.get("ID") !== id) {
            location.reload()
        }
    <?php
	if(!is_dir("Share/".$_GET["ID"])){
		mkdir("Share/".$_GET["ID"], 0777, true);
		mkdir("Share/".$_GET["ID"]."/images", 0777, true);
		mkdir("Share/".$_GET["ID"]."/sounds", 0777, true);
		$mainfile = fopen("Share/".$_GET["ID"]."/main.py", "c");
		$myfile = fopen("Base/default.py", "r") or die("Unable to open file!");
		fwrite($mainfile, fread($myfile,filesize("Base/default.py")));
		fclose($mainfile);
		fclose($myfile);
        echo 'Location.reload()';
	}
	
} else {
	?>
		window.location.href = "?ID="+Cookies.get("UserID");
	<?php
}
?>
</script>
<body id="main" style="background: #1c1c1c; color: white; text-align: center;">
    <div>
        <header>
            <h1>Pygame Zero</h1>
        </header>
    </div>
    <div class="row">

    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div id="mycanvas">

        </div>
    </div>

    <div class="row">
        <div class="col-xs-6" id="editorsplace">
            <div id=editor style="border: 1px solid black; border: 0px;"></div>
        </div>
        <a class="btn btn-primary col-md-2" id="runbutton">Run code<span class="glyphicon glyphicon-play"></span></a>
        <button class="btn btn-primary col-md-2" id="download" onclick="download()">Download</button>
        <a class="btn btn-primary col-md-2" id="file" href="fileexplorer.php">File Explorer</a>
    </div>
    <h2>
        Console
    </h2>
    <pre id="output" class="text-left" style="background-color: #141414; color:#f8f8f8; border: 0px;"></pre>

    </div>
    <div class="col-md-5"></div>
    <div class="col-md-5"></div>

    </div>
    <div class="col-md-2"></div>
    <div id="backdrop"></div>
    
    <?php
    include 'mainjs.php';
    ?>
</body>

</html>
<script async type="text/javascript">
    function savecode() {
        var data = new FormData();
        data.append("data" , editor.getValue());
        data.append("ID" , Cookies.get('ID'));
        var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
        xhr.open( 'post', 'write.php', true );
        xhr.send(data);

        setTimeout(savecode, 4000);
    }

savecode();
</script>
<?php 
// Create ZIP file

function download() {
	$filename = "Zip/".$_COOKIE["ID"].".zip";
	$zip = new ZipArchive();
	if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
	    exit("cannot open <$filename>\n");
	}
	
	$dir = "Share/".$_COOKIE["ID"]."/";
	
	// Create zip
	createZip($zip,$dir);
	$zip->close();
}
// Create zip
function createZip($zip,$dir){
    if (is_dir($dir)){

        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){
                        
                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);
                            $folder = $dir.$file.'/';
                            
                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }
                    
                }
                    
            }
            closedir($dh);
        }
    }
}



?>