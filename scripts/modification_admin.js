$(document).ready(function(){
	document.getElementById("nom").disabled = true;
	document.getElementById("email").disabled = true;
	document.getElementById("login").disabled = true;
	document.getElementById("verifpassword").disabled = true;
	document.getElementById("password").disabled = true;

});

$("#image").click(function(){
	document.getElementById("nom").disabled = false;
	document.getElementById("email").disabled = false;
	document.getElementById("login").disabled = false;
	document.getElementById("verifpassword").disabled = false;
	document.getElementById("password").disabled = false;

});