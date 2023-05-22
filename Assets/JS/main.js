/*! js-cookie v3.0.0-rc.1 | MIT */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,r=e.Cookies=t();r.noConflict=function(){return e.Cookies=n,r}}())}(this,function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)e[r]=n[r]}return e}var t={read:function(e){return e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}};return function n(r,o){function i(t,n,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape),n=r.write(n,t);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n+c}}return Object.create({set:i,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var n=document.cookie?document.cookie.split("; "):[],o={},i=0;i<n.length;i++){var c=n[i].split("="),u=c.slice(1).join("=");'"'===u[0]&&(u=u.slice(1,-1));try{var f=t.read(c[0]);if(o[f]=r.read(u,f),e===f)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){i(t,"",e({},n,{expires:-1}))},withAttributes:function(t){return n(this.converter,e({},this.attributes,t))},withConverter:function(t){return n(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(r)}})}(t,{path:"/"})});



function removeElementsByClass(className) {
	const elements = document.getElementsByClassName(className);
	while (elements.length > 0) {
		elements[0].parentNode.removeChild(elements[0]);
	}
}

function removeElementsById(IdName) {
	const elements = document.getElementById(IdName);
	while (elements.length > 0) {
		elements[0].parentNode.removeChild(elements[0]);
	}
}
function getLineCount(str) {
	// Split the string by line breaks and count the number of resulting lines
	var lines = str.split("\n");
	return lines.length;
  }
  
  
function GetPgzeroTop() 
{
	return $.ajax({
		type: "GET",
		url: "../Base/Mapper_Top.py",
		async: false
	}).responseText;
}

function GetCode(ProjectID)
{
	return $.ajax({
		type: "GET",
		url: "../Share/"+ProjectID+"/main.py",
		async: false
	}).responseText;

}

function GetPgzeroBottom() 
{
	return $.ajax({
		type: "GET",
		url: "../Base/Mapper_Bottom.py",
		async: false
	}).responseText;
}

function LoadCSS(url) {
  var link = document.createElement('link');
  link.rel = 'stylesheet';
  link.href = url;

  document.head.appendChild(link);
}
function LoadJS(url) {
  return new Promise(function(resolve, reject) {
	var script = document.createElement('script');
	script.src = url;
	script.async = true;

	script.onload = function() {
	  resolve();
	};

	script.onerror = function() {
	  reject(new Error('Failed to load script: ' + url));
	};

	document.head.appendChild(script);
  });
}
