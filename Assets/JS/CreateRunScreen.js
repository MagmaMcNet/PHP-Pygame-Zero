function CreateRunScreen() {
    $(Sk.main_canvas).css("border", "5px solid #0e0e0e");
    var currentTarget = ResetCanvas();

    var Base = document.createElement("div");
    currentTarget.appendChild(Base);
    $(Base).addClass("modal");
    $(Base).addClass(" tab-content");
    $(Base).css("text-align", "center");


    var ExitButton = document.createElement("span");
    $(ExitButton).addClass("btn btn-primary btn-sm pull-right");
    var XIcon = document.createElement("i");
    $(XIcon).addClass("fas fa-times");
    ExitButton.appendChild(XIcon);


    var GameTitle = document.createElement("h5");
    Sk.title_container = GameTitle;
    $(GameTitle).addClass("modal-title");

    Base.appendChild(GameTitle);
    Base.appendChild(ExitButton);

    var TitleButtons = document.createElement("div");
    Base.appendChild(TitleButtons);
    $(TitleButtons).addClass("tab");

    var button1 = document.createElement("button");
    Base.appendChild(TitleButtons);
    $(TitleButtons).addClass("tab");
    $(TitleButtons).attr("onclick", "tabs(event, 'output')");


    $(ExitButton).on('click', function(){
        
        if(isloaded == true) {
            isloaded = false;
            audio_stopall();
            Sk.insertEvent("quit")
        } else {
            $('.modal').modal('hide');
        }
    });

    var ModelScreen = document.createElement("div");
    $(ModelScreen).addClass("modal-dialog modal-lg");
    $(ModelScreen).css("display", "inline-block");
    $(ModelScreen).width(self.width + 42);
    $(ModelScreen).attr("role", "document");
    Base.appendChild(ModelScreen);

    var Screen = document.createElement("div");
    $(Screen).addClass("modal-content");
    $(Screen).css("background", "#191919");
    ModelScreen.appendChild(Screen);

    var TitleBar = document.createElement("div");
    $(TitleBar).addClass("modal-header d-flex justify-content-between");
    $(TitleBar).css("border-color", "#151515");

    var nav_tab = document.createElement("ul");
    $(nav_tab).addClass("nav nav-pills");
    TitleBar.appendChild(nav_tab);

    var GameTab = document.createElement("li");
    $(GameTab).addClass("active");
    nav_tab.appendChild(GameTab);

    var ConsoleTab = document.createElement("li");
    nav_tab.appendChild(ConsoleTab);
    
    var GameButton = document.createElement("a");
    $(GameButton).attr("data-toggle", "pill");
    $(GameButton).attr("href", "#game");
    $(GameButton).text("Game");
    
    var ConsoleButton = document.createElement("a");
    $(ConsoleButton).attr("data-toggle", "pill");
    $(ConsoleButton).attr("href", "#console");
    $(ConsoleButton).text("Console");
    
    var div9 = document.createElement("div");
    $(div9).addClass("tab-pane fade");
    $(div9).attr("name", "Output");

    GameTab.appendChild(GameButton);
    ConsoleTab.appendChild(ConsoleButton);

    var GameWindow = document.createElement("div");
    $(GameWindow).addClass("tab-pane fade in active");
    $(GameWindow).attr("id", "game")
    $(GameWindow).attr("ontouchmove", 'gametouch(event)')

    var Footer = document.createElement("div");
    $(Footer).addClass("modal-footer");
    $(Footer).css("border-color", "#151515");

//#region border
    var div7 = document.createElement("div");
    $(div7).addClass("col-md-8");
    var div8 = document.createElement("div");
    $(div8).addClass("col-md-4");
//#endregion

    var div9 = document.createElement("div");
    $(div9).addClass("tab-pane fade");
    $(div9).attr("id", "console");

    var div9 = document.createElement("div");
    $(div9).addClass("tab-pane fade");
    $(div9).attr("id", "console");
    $(div9).addClass("show active"); // Add this line to make the console tab active


    var console = document.createElement("pre");
    $(console).attr("id", "console_output");
    $(console).attr("name", "Output");
    div9.appendChild(console);


    Screen.appendChild(TitleBar);
    Screen.appendChild(GameWindow);
    Screen.appendChild(div9);
    Screen.appendChild(GameWindow);


    
    //div7.appendChild(header);
    //div8.appendChild(btn1);

    GameWindow.appendChild(Sk.main_canvas);

    createArrows(Footer);
    $(Base).modal({
        backdrop: 'static',
        keyboard: false
    });
}
function createArrows(div) {
    var arrows = new Array(4);
    var direction = ["left", "right", "up", "down"];
    $(div).addClass("d-flex justify-content-center");
    for (var i = 0; i < 4; i++) {
        arrows[i] = document.createElement("span");
        div.appendChild(arrows[i]);
        $(arrows[i]).addClass("btn btn-primary btn-arrow");
        var ic = document.createElement("i");
        $(ic).addClass("fas fa-arrow-" + direction[i]);
        arrows[i].appendChild(ic);
    }


    var swapIcon = function(id) {
        $(arrows[id].firstChild).removeClass("fa-arrow-" + direction[id]).addClass("fa-arrow-circle-" + direction[id]);
    }

    var returnIcon = function(id) {
        $(arrows[id].firstChild).removeClass("fa-arrow-circle-" + direction[id]).addClass("fa-arrow-" + direction[id]);
    }

    $(arrows[0]).on('mousedown', function() {
        Sk.insertEvent("left");
        swapIcon(0);
    });
    $(arrows[0]).on('mouseup', function() {
        returnIcon(0);
    });
    $(arrows[1]).on('mousedown', function() {
        Sk.insertEvent("right");
        swapIcon(1);
    });
    $(arrows[1]).on('mouseup', function() {
        returnIcon(1);
    });
    $(arrows[2]).on('mousedown', function() {
        Sk.insertEvent("up");
        swapIcon(2);
    });
    $(arrows[2]).on('mouseup', function() {
        returnIcon(2);
    });
    $(arrows[3]).on('mousedown', function() {
        Sk.insertEvent("down");
        swapIcon(3);
    });
    $(arrows[3]).on('mouseup', function() {
        returnIcon(3);
    });

    $(document).keydown(function(e) {
        switch (e.which) {
            case 37:
                swapIcon(0);
                break;
            case 38:
                swapIcon(2);
                break;
            case 39:
                swapIcon(1);
                break;
            case 40:
                swapIcon(3);
                break;
        }
    });

    $(document).keyup(function(e) {
        switch (e.which) {
            case 37:
                returnIcon(0);
                break;
            case 38:
                returnIcon(2);
                break;
            case 39:
                returnIcon(1);
                break;
            case 40:
                returnIcon(3);
                break;
        }
    });
};