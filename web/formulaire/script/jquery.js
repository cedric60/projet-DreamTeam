	//message qui disparait au click dans le formulaire

	$("#textarea").focus(function (e){
			e.preventDefault();
			if($("#textarea").val() == "Pouvez-vous nous en dire plus?"){
			$("#textarea").empty();
			}
	})