<form method="POST" id="ResponsableProjet" action="http://localhost/GestionComposants/admin/addrp">
			<table>
				<tr> 
				<td>Nom et Prenom</td> <td><input type="text" name="name" required /></td>
				</tr>

				<tr> 
				<td>Login</td><td><input type="text" name="login" required/></td>
				</tr>

				<tr>
				<td>Password</td> <td><input type="password" name="password" required/></td> 
				</tr>

				<tr><td>Confirmer Password</td> <td><input type="password" name="password2" required/></td> 
				</tr>

				<tr> 
				<td>Adresse Mail</td> <td><input type="email" name="mail" required /></td>
				</tr>

				<tr> <td colspan="2" align="center"> <input type="submit" value="Valider"/></td> 
				</tr>
			</table>
</form>