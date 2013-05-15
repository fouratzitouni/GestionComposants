<?php


if(isset($_GET['all']) || isset($_GET['nom']))
{
	$con = mysql_connect("localhost","root","root"); // $server $db_login $db_password
	mysql_select_db("gl",$con); // $db_name
	if(isset($_GET['all']))
	{
		$rep = mysql_query("SELECT * FROM RP;");
	}
	if(isset($_GET['nom']))
	{
		$nom = $_GET['nom'];
		$rep = mysql_query("SELECT * FROM RP WHERE nom LIKE '%".$nom."%';") or die(mysql_error());
	}
	header("content-type: text/html");
	echo "<table border='1' id='tableau'>\n";
	echo "<thead>\n";
	echo "<tr><td>Id</td><td>Nom</td><td>Login</td><td>Email</td><td>Modifier</td><td>Supprimer</td></tr>\n";
	echo "</thead><tbody>\n";
	while($ligne = mysql_fetch_array($rep))
	{
		echo "<tr><td class='id'>".$ligne["id"]."</td>";
		echo "<td class='nom'>".$ligne["nom"]."</td>";
		echo "<td class='login'>".$ligne["login"]."</td>";
		echo "<td class='email'>".$ligne["email"]."</td>";
		echo "<td><img class='edit' src='edit.jpg' alt='Modifier' /></td>";
		echo "<td><img class='del' src='delete.png' alt='Supprimer' /></td></tr>";
		echo "\n";
	}
	echo "</tbody></table>\n";
	/*echo "<script type='text/javascript' src='jquery.js'></script>\n";*/
	echo "<script src='fetchRP.js' type='text/javascript'></script>\n";
	mysql_close();
}
if(isset($_GET['del']))
{
	$id = $_GET['del'];
	$rp = new ResponsableProjet($id);
	$rp->deleteFromBase();
}
if(isset($_GET['mod']))
{
	$id = $_GET['mod'];
	$rp = new ResponsableProjet($id);
	$rp->updateRP($id,$_GET['n'],$_GET['l'],$_GET['m'],$_GET['e']);
}
?>