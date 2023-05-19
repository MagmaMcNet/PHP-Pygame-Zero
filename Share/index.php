<html>

<head>
    <!-- Primary Meta Tags -->
     <title>Pygame-Zero In Website</title>
    <meta name="title" content="Pygame-Zero In Website">
    <meta name="description" content="Pygame-Zero In Website">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://python.magma-mc.net/">
    <meta property="og:title" content="Pygame-Zero In Website">
    <meta property="og:description" content="Pygame-Zero In Website">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://python.magma-mc.net/">
    <meta property="twitter:title" content="Pygame-Zero In Website">
    <meta property="twitter:description" content="Pygame-Zero In Website">

    <!-- Import -->
    <script src="../Base/Skulpt/skulpt.min.js" type="text/javascript"></script>
    <script src="../Base/Skulpt/skulpt-stdlib.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="../Assets/JS/Editor.js" type="text/javascript"></script>
    <script src="../Assets/JS/main.js" type="text/javascript"></script>
	<script src="../Assets/JS/Jszip.min.js"></script>
</head>

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

        <div id="Player">

        </div>
    </div>

    <div class="row">
        <div class="col-xs-6"></div>
        <a class="btn btn-primary col-md-2" id="runbutton">Run code<span class="glyphicon glyphicon-play"></span></a>
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


    <script>
        document.getElementById("output").style['height'] = 0.6 * window.innerHeight;
        var UserID = new URLSearchParams(window.location.search).get('ID');
//#region libraries
        const ModulesDir = '../Modules/';
        <?php echo file_get_contents("../Assets/JS/Modules.js"); ?>

            'Sounds': {
                path: UserID+'/Audio.js', // Sounds Module Used For pgzero
            }
        }
//#endregion

        <?php echo file_get_contents("../Assets/JS/CreateRunScreen.js"); ?>

        function ResetCanvas() {
            var target = document.getElementById("Player");
            // clear canvas container
            while (target.firstChild) {
                target.removeChild(target.firstChild);
            }
            return target;
        }

        function builtinRead(x) {
            if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
                throw "File not found: '" + x + "'";
            return Sk.builtinFiles["files"][x];
        }


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
    
    (Sk.TurtleGraphics || (Sk.TurtleGraphics = {})).target = 'game';
    
    function GetCustomModules() 
    {
        <?php
            $CustomModulesLength = 0;
        echo 'return `';
        try {
            $folder = "./".$_REQUEST["ID"]."/files/";
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
    <?php
    $fileLines = file('../Base/Mapper_Top.py');
    $lineCount = count($fileLines);
    ?>
    Sk.misceval.asyncToPromise(function() {
        try {
            return Sk.importMainWithBody("<stdin>", false, GetPgzeroTop() + GetCode(new URLSearchParams(window.location.search).get('ID')) + GetPgzeroBottom(), true);
        } catch (e) {
            e.traceback[0].lineno -= <?php echo $lineCount+$CustomModulesLength ?>;
            console.log(e)
            alert(e)
            location.reload();
            

        }
    })

}

async function fetchText(url) {
  const response = await fetch(url);
  if (!response.ok) {
    throw new Error(`Failed to fetch ${url}: ${response.status} ${response.statusText}`);
  }
  return await response.text();
}


        $("#runbutton").click(function() {
            runCode();
        });
    </script>
</body>

</html>