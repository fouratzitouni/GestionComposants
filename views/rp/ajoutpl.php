<h2>Ajouter un Produit logiciel</h2>
<form method="POST" action="http://localhost/GestionComposants/rp/ajoutpl">
<table>
				<tr> 
				<td>Titre</td> <td><input type="text" name="titre" required/></td>
				</tr>
                
                <tr> 
				<td>Type</td> <td><select name="type"><option>Open Source</option><option>Freeware</option><option>Shareware</option>
                </select></td>
				</tr>

				<tr> 
				<td>Nature</td><td><select name="nature"><option>Source</option><option>Library</option><option>Executable</option>
                </select></td>
				</tr>

				<tr>
				<td>Licence</td> <td><select name="licence"><option>Licence Art Libre</option>
<option>Licence CeCILL</option>
<option>CC-BY-SA</option>
<option>GFDL</option>
<option>GPL</option>
<option>LGPL</option></select>
				</td> 
				</tr>
                
                <tr> 
				<td>Client</td> <td><input type="text" name="client" /></td>
				</tr>
                
                

				<tr><td>Cout</td> <td><input type="text" name="cout" required/></td> 
				</tr>

				<tr> 
				<td>Version</td> <td><input type="text" name="version" required /></td>
				</tr>
                
                <td>Etat</td> <td><select name="etat"><option>En developpement</option>
<option>Termine</option>
<option>Analyse</option>
</select>
				</td> 
				</tr>

				<tr> <td colspan="2" align="center"> <input type="submit" value="Valider"/></td> 
				</tr>
</table>
</form>