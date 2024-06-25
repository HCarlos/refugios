//var oUser = new Object();

function oObject() {
	var doctoper = [];
	var oUser = [0,false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,
				false,false,false,false,false,false,false,false,false,false,false,false,false,false,false,0];
	var minHeight = 0;
    var pHost = ["https://refugios.villahermosa.gob.mx:445/",/iphone|ipad|ipod|android/i.test(navigator.userAgent), /msie\s6/i.test(navigator.userAgent)];
    // var pHost = ["http://localhost:8000/",/iphone|ipad|ipod|android/i.test(navigator.userAgent), /msie\s6/i.test(navigator.userAgent)];
	// var pHost = ["http://refugios.tabascoweb.com/",/iphone|ipad|ipod|android/i.test(navigator.userAgent), /msie\s6/i.test(navigator.userAgent)];

	var cat = [];
	var index = 0;
	var height = 100;
	var sep = "_devch_";
	var newPos = "";
	var dom    = "";
	var id     = 0;
	var lat    = "";
	var lon    = "";
	var init   = false;

	var getInstance = function() {
		if (!oObject.singletonInstance) {
			oObject.singletonInstance = createInstance();
		}
		return oObject.singletonInstance;
	}

	var createInstance = function() {
		return {
			setDP : function(name) {
				doctoper.push(name);
				return this.getDP();
			},
			getDP : function() {
				return doctoper;
			},
			getValue : function(i) {
				return pHost[i];
			},
			setUser : function(i,value) {
				oUser[i]=value;
			},
			getUser : function(i) {
				return oUser[i];
			},
			setMinHeight : function(value) {
				minHeight=value;
			},
			getMinHeight : function() {
				return minHeight;
			}

		}
	}

	return getInstance();

}


var obj = new oObject();
obj.height = 150;
obj.sep = "_devch_";

function preloader(){
var htmlPreloader = "";
htmlPreloader+='<div class="well well-small" style="width:96%; font-size:1em;" data-percent="70%">';
htmlPreloader+='	<div class="inline middle blue bigger-110">';
htmlPreloader+='		<i class="icon-spinner icon-spin orange bigger-175"></i>';
htmlPreloader+='				Cargando...';
htmlPreloader+='	</div>';
htmlPreloader+='</div>';
return htmlPreloader;
}

function isDefined( variable) { return (typeof(window[variable]) != "undefined");}

function getPreloader(){
	return "<span class='p-pre-loader'><img src='../../images/img-web/input-loading.gif' alt=' ' /> <span>cargando...</span></span>";
}
