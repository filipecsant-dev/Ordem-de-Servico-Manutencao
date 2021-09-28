$(document).ready(function(){
	var click = 0;

	$('.navbar').on("click", '#admin', function(){
		click ++;

		if(click === 3){
			var admin = prompt("Digite a senha:");

			if(admin === "AdminNorp"){
				$('#adminn').show();
				$('#adminn2').show();
			}
			click = 0;
		}

	});
});