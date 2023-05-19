<!DOCTYPE php>
<html lang="en">

<?php // ID CHECKER

    if (!isset($_COOKIE["Project"]))
    {
        ?>
        <script>
            window.location.href = "Projects.php";
        </script>
        <?php
    }

    if (!is_dir("Share/".$_COOKIE["Project"]))
    {
        ?>
        <script>
            window.location.href = "Projects.php";
        </script>
        <?php
    }

?>


<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>PHP - Pygame Zero</title>
    <meta name="title" content="PHP - Pygame Zero">
    <meta name="description" content="Run Python With The Module Pygame Zero Online For Free">
    <meta name="author" content="MagmaMc">
    <meta name="keywords" content="Skulpt, pygame, python, pyzero, online, pygame-zero">
    <meta name="theme-color" content="hsl(256, 54%, 15%)">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://python.magma-mc.net">
    <meta property="og:title" content="PHP - Pygame Zero">
    <meta property="og:description" content="Run Python With The Module Pygame Zero Online For Free">
    <meta property="og:image" content="http://magma-mc.net/Assets/Png/Image.png">


    
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://python.magma-mc.net">
    <meta property="twitter:title" content="PHP - Pygame Zero">
    <meta property="twitter:description" content="Run Python With The Module Pygame Zero Online For Free">
    <meta name="twitter:site" content="@SMLkaiellis">
    <meta name="twitter:creator" content="@SMLkaiellis">
    <meta property="twitter:image" content="http://magma-mc.net/Assets/Png/Image.png">

    <!-- Import -->

    
    <link href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" rel='stylesheet' type='text/css'>

    <script src="./Base/Skulpt/skulpt.min.js" type="text/javascript"></script>
    <script src="./Base/Skulpt/skulpt-stdlib.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" type="text/javascript"></script>
    <script>
        
    var isloaded = false;
    $(window).on('load', function() {
        LoadCSS("https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css");
        LoadCSS("http://fonts.googleapis.com/css?family=Roboto");
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-inline_autocomplete.min.js")
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-prompt.min.js")
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-whitespace.min.js")
        
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-language_tools.min.js")
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-beautify.min.js")
        LoadJS("https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ext-code_lens.min.js")
    });

    </script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.21.1/ace.min.js" type="text/javascript"></script>


    <script defer src="./Assets/JS/Editor.js" type="text/javascript"></script>
    <script src="./Assets/JS/main.js" type="text/javascript"></script>
    <script src="./Modules/Audio/GetAudio.php?Project=<?php echo $_COOKIE["Project"]; ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="./Assets/css/Custom.css"> 

</head>

<div id="loading-screen">
  <div class="loading-content">
    <i class="fas fa-spinner fa-spin"></i>
    <h3>Loading...</h3>
  </div>
</div>


<embed type="text/html" src="../Assets/HTML/nav_home.html"  width="100%" height="14%"> 
<body id="main" style="background: #1c1c1c; color: white; text-align: center;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

    <div class="col-md-8">

        <div id="Player">

        </div>
    </div>

    <div class="row">
        <div class="col-xs-6" id="editorsplace">
            <div id=editor style="border: 1px solid black; border: 0px;"></div>
        </div>
        <div class="col-xs-6" id="editorsplace"></div>

        <div class="output">
            <h3>Console</h3>
            <pre id="output" name="Output" class="text-left" style="background-color: #141414; color:#f8f8f8; border: 0px;"></pre>
            <a class="btn btn-primary" id="runbutton" title="Run">Run code <span class="glyphicon glyphicon-play"></span></a>
        <a class="btn btn-info" id="file" href="Share/?ID=<?php echo $_COOKIE["Project"]; ?>" title="Share">Share <span class="glyphicon glyphicon-share"></span></a>

        </div>
    </div>
    <div id="backdrop"></div>

<script type="text/javascript">
    const UserID = Cookies.get("Project");
    var editor = ace.edit("editor");
    editor.setValue(
        $.ajax({
		type: "GET",
		url: "Share/"+UserID+"/main.py",
		async: false
	}).responseText, -1
    );
    
    function close_force() 
    {
        document.getElementById("main").className = ""
        document.getElementById("Player").innerHTML = ""
        removeElementsByClass("modal-backdrop in")
    }   
    function ResetCanvas() 
    {
        var target = document.getElementById("Player");
        // clear canvas container
        while (target.firstChild) {
            target.removeChild(target.firstChild);
        }
        return target;
    }

//#region libraries
        const ModulesDir = './Modules/';
        <?php echo file_get_contents("Assets/JS/Modules.js"); ?>
            'Sounds': {
                path: 'Share/'+UserID+'/Audio.js', // Sounds Module Used For pgzero
            }
        }
//#endregion

        <?php echo file_get_contents("Assets/JS/CreateRunScreen.js"); ?>

setInterval(function()
{
    $.ajax({
		type: "GET",
		url: "SaveData.php?Token="+Cookies.get("Token")+"&Project="+UserID+"&Data="+encodeURIComponent(editor.getValue()),
		async: false
	});
}, 2000);

function runCode() {
    Console.Clear();
    Sk.configure({
        inputfun: function (prompt) {
            return window.prompt(prompt);
        },
        inputfunTakesPrompt: true,
        output: Console.Print,
        read: builtinRead
    });
    Sk.main_canvas = document.createElement("canvas");
    Sk.quitHandler = function() {
        $('.modal').modal('hide');
    };
    CreateRunScreen();
    
    function getcode() {
        return e;
        
    }
    (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = 'game';
    
    function GetCustomModules() {
        <?php
            $CustomModulesLength = 0;
        echo 'return `';
        try {
            $folder = "./Share/".$_REQUEST["ID"]."/files/";
            if (is_dir($folder)){
            $scanned_directory = array_diff(scandir($folder), array('..', '.'));
            foreach($scanned_directory as $filename){
                echo file_get_contents($folder.$filename)."\n";
                $CustomModulesLength += count(file($folder.$filename));
            }
        }
        } catch(Exception) {}
        echo '`';
        ?>
    }

    Sk.misceval.asyncToPromise(function() {
        try {
            return Sk.importMainWithBody("<stdin>", false, GetPgzeroTop() + editor.getValue() + GetPgzeroBottom(), true);
        } catch (e) {
            e.traceback[0].lineno -= 1854 + <?php echo $CustomModulesLength ?>;
            console.log(e)
            alert(e)
            setTimeout(function(){location.reload(true)}, 1000);
            

        }
    })

}


$("#runbutton").click(function() {
    runCode();
});
</script>