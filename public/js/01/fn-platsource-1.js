$(document).ready(function() {
	var idrol = parseInt(sessionStorage.IdProfile);
	//hideButtuns()
	switch (idrol){
	case 2:
	case 5:
			$(".btn-group").show();

			$(".btn-group").on("click",function(){
					$("#FamilyList").show();
			});
			break;

	case 7:  //Control Escolar
			$(".btn-group").show();
			$(".btn-family").show()

			$(".btn-group").on("click",function(){
					hideBack();
					$("#GroupList").show();
			});
			$(".btn-family").on("click",function(){
					hideBack();
				$("#FamilyList").show();
			});
			//alert(idrol);
			break;

	}		

	function hideButtuns(){
		$(".btn-hijos").hide();
		$(".btn-personal").hide();
		$(".btn-group").hide();
		$(".btn-family").hide();
	}

	function hideBack(){
			$("#GroupList").hide();
			$("#FamilyList").hide();
	}
	//alert(idrol);		
});