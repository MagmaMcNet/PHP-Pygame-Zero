var $builtinmodule = function (name) {
    mod = {}
    mod.play = new Sk.builtin.func(function (sound) {
		const parm = new URLSearchParams(window.location.search);
		var audio = new Audio("../Share/"+parm.get("ID")+"/sounds/"+sound.v);
		console.log("../Share/"+parm.get("ID")+"/sounds/"+sound.v);
		audio.play();
	});
	return mod
}