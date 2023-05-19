var isloaded = true;
var $builtinmodule = function(name) {
    var pgzero = {};

    pgzero.go = new Sk.builtin.func(function() {
        console.log("pgzero loaded");
    });

    return pgzero;
};
