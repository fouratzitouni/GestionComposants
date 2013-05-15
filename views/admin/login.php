<h2>Authentification</h2>

	<p>Entrer votre login : </p>
		<input type="text" name="login" id="login">
	
	<p>Entrer votre mot de passe : </P>
		<input type="password" name="pass" id="pass">
		
	<br/><input type="checkbox" name="checkbox" id="activecb">Garder ma session active
		
	<br/><br/><input type="button" value="Se connecter" name="valid" id="valid">
	
	<br/><br/>
<script language="javascript" src="../scripts/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(e) {
	$('#valid').on('click',function(e){
		var data = {
			login: $('#login').val(),
			pass: $('#pass').val(),
			cb: $('#activecb').prop('checked')
		}
		alert(data);
		$.ajax({
			type: "POST",
			url: "auth",
			data: data,
			success: function(){ location.href = "index";}
		});
	});
	
});


</script>

<script language="javascript" src="../scripts/auth.js"></script>
