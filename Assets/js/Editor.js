


class Console {
    static Print(Text) {
        let Output = document.getElementsByName("Output");
        Text = Text.replace(/</g, '&lt;');
        Output.forEach((element) => {
            element.innerHTML += Text;
        });
    }

    static Clear() {
        let OutputElements = document.getElementsByName("Output");
        let OutputArray = Array.from(OutputElements);
        OutputArray.forEach((element) => {
            element.innerHTML = "";
        });
    }

    static Set(Text) {
        this.Clear();
        this.Print(Text);
    }
}


function builtinRead(x) {
    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
        throw "File not found: '" + x + "'";
    return Sk.builtinFiles["files"][x];
}

function EditorAutoSize() 
{
    
    editor.setOptions({
    enableSnippets: true,
    enableBasicAutocompletion: true,
    enableLiveAutocompletion: true,
    showPrintMargin: false,
    wrap: true
    });
    document.getElementById("editor").style['height'] = 0.75 * window.innerHeight;
    document.getElementById("editor").style['width'] = 0.55 * window.innerWidth;
    document.getElementById("editor").style['margin'] = "0 auto";
    document.getElementById("output").style['height'] = 0.4 * window.innerHeight;
    document.getElementById("output").style['width'] = 0.45 * window.innerWidth;
}
var editor = "";
if (document.getElementById("editor") !== null)
{
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/python");

    ace.require("ace/snippets");
    ace.require("ace/ext/language_tools");
    }

$(window).on('load', function() {
    if (document.getElementById("editor"))
        setInterval(EditorAutoSize, 150);
    if (document.getElementById("loading-screen"))
        setInterval(() => {
            $('#loading-screen').remove();
        }, 400);
});