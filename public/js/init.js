// JavaScript Document



// $(document).on("ready",init);



/*
function init(){
	//alert("Init");
	//var obj01 = new oObject();

	if($(".oMap").length){
			//alert("INICIADO...");
		$(".oMap").on("click",function(event){
			event.preventDefault();

			var ids = event.currentTarget.id;
			//alert(ids[0]);
			var PARAMS = {id:ids}; 
			var url = obj.getValue(0)+"locationPoint.php";
			//var url = "http://siac.tabascoweb.com/locationPoint.php";

			var temp=document.createElement("form");
			temp.action=url;
			temp.method="POST";
			temp.target="_blank";
			temp.style.display="none";
			for(var x in PARAMS) {
				var opt=document.createElement("textarea");
				opt.name=x;
				opt.value=PARAMS[x];
				temp.appendChild(opt);
			}
			document.body.appendChild(temp);
			temp.submit();
			return temp;
		});
	}

	//stream.on("servidor", jsNewReg);
   
}
	
*/

/*

function jsNewReg(datosServer){
	var ms = datosServer.mensaje.split(".");

	if (ms[0]=="MOD"){
		$.post("http://siac.tabascoweb.com/php/01/getDataCat.php", { o:200, t:5004, p:1,c:"ntipo="+ms[2],from:0,cantidad:30 },
		function(json){
			$.each(json, function(i, item) {
				var img = item.imagen.split(".");
				var img1 = "http://dc.tabascoweb.com/php/01/uploads/"+img[0]+"-s."+img[1];
				var img2 = "http://dc.tabascoweb.com/php/01/uploads/"+img;
	 	          window.location.reload();  
			});
 		}, "json");
	   
	}
}

*/



