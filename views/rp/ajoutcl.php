<h2>Ajouter un Composant logiciel</h2>
<form method="POST" action="http://localhost/GestionComposants/rp/ajoutcl">
<table>
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

				<tr><td>Cout</td> <td><input type="text" name="cout" required/></td> 
				</tr>

				<tr> 
				<td>Version</td> <td><input type="text" name="version" required /></td>
				</tr>

				<tr> <td colspan="2" align="center"> <input type="submit" value="Valider"/></td> 
				</tr>
</table>
</form>