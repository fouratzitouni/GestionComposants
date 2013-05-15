<form name="form1" method="POST" action="http://localhost/GestionComposants/admin/edit">
<table>
<tr><td>
	<label for="oldpassword">Ancien mot de passe :</label></td>
	<td><input type="password" name="oldpassword" id="oldpassword" /></td></tr>
	<tr><td><label for="nom">Nom :</label></td>
	<td><input type="text" name="nom" id="nom" /> </td></tr>
	
	
	<tr><td><label for="password">Mot de passe :</label></td>
	<td><input type="password" name="password" id="password" /> </td></tr>
	
	<tr><td><label for="verifpassword">Verification de mot de passe :</label></td>
	<td><input type="password" name="verifpassword" id="verifpassword" /> </td></tr>
	
	<tr><td><label for="email">Email :</label></td>
	<td><input type="text" name="email" id="email" /> </td></tr>
	<tr><td></td><td>
	<input type="submit" name="button" id="button" value="Valider" /></td></tr>
</table>

</form>