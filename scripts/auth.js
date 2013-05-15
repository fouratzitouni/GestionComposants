alert("on");
$(document).ready(function(e) {
	alert("ready");
	$('#valid').on('click',function(e){
		var data = new Array();
			data[0] = $('#login').val();
			data[1] = $('#pass').val();
			data[2] = $('#activecb').prop('checked');
		alert("clicked");
		$.ajax({
			type: "GET",
			url: "http://localhost/GestionComposants/admin/auth/",
			data: data,
			success: function(){ alert("ok");},
			error: function(){alert("error");}
		});
	});
	
});




