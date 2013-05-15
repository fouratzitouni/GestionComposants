$(document).ready(function(e) {
	loadAll();
});

$('#nom_rp').change(function(){
	var val = $('#nom_rp').val();
	if(val != "")
	{
		$url = "fetchRP.php?nom="+val;
		$('#liste').load($url).error(function(){alert('Some Error !');});
	}
	else
	{
		loadAll();
	}
	});
$('#btn_close').click(function(){
	$('#popup, #fade').fadeOut();
	});	
function editRP(id,n,l,e)
{
	$('#f_nom_rp').val(n);
	$('#f_login_rp').val(l);
	$('#f_email_rp').val(e);
	$('#popup').fadeIn();
	$('body').append('<div id="fade"></div>');
	$('#fade').fadeIn();
	$('#f_envoi').click(function(){
		var nom = $('#f_nom_rp').val();
		var login = $('#f_login_rp').val();
		var email = $('#f_email_rp').val();
		var mdp = $('#f_mdp_rp').val();
		var mdp2 = $('#f_mdp_rp2').val();
		if(nom != "" && login != "" && email != "" && mdp != "" && mdp == mdp2)
		{
			$.ajax({
				url : "fetchRP.php?mod="+id+"&n="+nom+"&l="+login+"&e="+email+"&m="+mdp,
				success : function(){$('#success').fadeIn();
									$('#popup, #fade, #success').fadeOut(2000);
									loadAll();},
				error : function(){alert("Some Error !!!");}
				});
		}
		else
		{
			alert("Verifer les informations !!");
		}
	});
}
function deleteRP(id)
{
	$.ajax({
		url : "fetchRP.php?del="+id,
		success: function(){loadAll();},
		error : function(){alert('Some Error!!!');}
	});
}
function loadAll()
{
	$('#nom_rp').val('');
	$('#liste').load("fetchRP.php?all=true").error(function(){alert('Some Error !');});
}