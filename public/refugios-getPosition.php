<?php

$id = $_GET["id"];

date_default_timezone_set('America/Mexico_City');

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Refujios Temporales | Municipio de Centro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="particularity.com" name="author">

    <link href="ico/favicon.png" rel="shortcut icon">
    <link href="ico/favicon-72-72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="ico/favicon-114-114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link href="css/style-t1.css" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">

<style >

html,body{

margin:0px;

height: 100% !important;

}
#users-contain {position:relative; width:96.7%;}
#formBody {position:relative; width:96.7%;}
#users-contain{ padding:1em; overflow:scroll; overflow-x:hidden;  text-align:left;}
#formBody > #h3{ padding:0.4em 0.5em; margin-bottom:0.8em; text-align:left;}
#formBody > #h3 span{ display:inline-block;}
#edad { width:50px;}
#users-contain{ overflow-y:scroll;}
.fondoBlanco{ background-color:#FFF !important ; color: #666;}
</style>

</head>
<body>
  <!-- .................................... $header .................................... -->
  <header class="navbar-fixed-top fondo-institucional" >
      <div class="navbar ">
          <a class="btn btn-navbar fondo-institucional" data-target="nav-collapse" data-toggle="collapse">
            <i class="icon-reorder"></i>
          </a>
          <a class="brand span6 text-white" href="#">
            <span style="color: #FFF; margin-left: 2em !important;">H. Ayuntamiento Constitucional de Centro </span>
          </a>

          <nav class="nav-collapse collapse">
              <div class="pull-right mr-2 mt-05 " style="height: 40px !important;" ><a href="https://villahermosa.gob.mx"><img src="images/logo_centro_80_pixeles_002.png" height="20" style="height:40px !important;"> </img></a></div>
          </nav>
      </div>
  </header>
  <!-- .................................... $breadcrumb .................................... -->
  <div class=" section-color-graydarker" style=":0em !important; padding-bottom: 0px !important; ">
    <div class="container" style="margin-top: 0px !important; padding: 0px !important;">
      <ul class="breadcrumb">
        <li class="active nombreRefugio"></li>
      </ul>
    </div>
  </div>
  <!-- .................................... $Portfolio .................................... -->
  <div id="section-portfolio" style="padding-top: 1em !important;">
    <div class="container">
      <h2 style="padding-bottom: 0px !important;" >
          <i class="fa-solid fa-earth text-info"></i>
        Ubicación Google:
        <small id="domicilio"></small>
      </h2>
          <!-- .................................... $MAP on background .................................... -->
            <div class="map map-background" id="mapDen" style="height: 70vh !important; display: block !important; margin-bottom: 2em !important;" ></div>

                      <div class="span3 offset8" style="position: absolute !important; top: 45vh !important;">
                        <div class="box box-shadow">
                          <h3 class="box-title">
                            <strong>Ficha de Datos</strong>
                          </h3>
                          <div class="box-content">
                            <p>
                           <br>
                           <br>
                           <a class="btn btn-small btn-primary" id="updateDom" href="#">
                                <i class="fa-solid fa-save "></i>
                                Actualizar Ubicación
                               </a>
                           <br>
                           <br>
                           <a class="btn btn-small btn-secondary" id="closeWindowMap" href="#">
                               <i class="fa-solid fa-xmark mr-1"></i>
                                Cerrar Ventana
                               </a>
                            </p>
                          </div>

                        </div>



    	 </div>
    </div>
  </div>

  <!-- .................................... $post-footer .................................... -->
  <div class="post-footer section-content section-content-mini section-color-graydark">
    <div class="container">
      <p class="pull-right">
        CMI |
        <a href="https://villahermosa.gob.mx" title="Coordinación de Modernización e Innovación">villahermnosa.gob.mx</a>
      </p>
      <p>H. Ayuntamiento Constitucional de Centro | <?php echo date('Y'); ?> &copy;  Todos los derechos reservados</p>
    </div>
  </div>
  <!-- .................................... $scripts .................................... -->
  <script src="js/libs/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="js/script.js"></script>

  <script src="js/libs/modernizr.min.js"></script>
  <script  src="js/01/base.js"></script>
  <script  src="js/init.js"></script>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=weather&key=AIzaSyB0mmrw3wLssGqd1eUKWAH43GEcn5bm8-s&callback=initMap&v=weekly"></script>


  <script>

  var Id = <?php echo $id ?>;
  var Refugio = [];
  // alert(obj.getValue(0)+"getrefugio/"+Id);
  $.get(obj.getValue(0)+"getrefugio/"+Id, {  },
      function(json){
          if (json.mensaje === "OK") {
              $.each(json.data, function(i, item) {
                  Refugio = item;
                  Refugio.LL = new google.maps.LatLng(item.latitud, item.longitud);
                  $(".nombreRefugio").html(item.refugio);
                  $("#domicilio").html(Refugio.ubicacion_google);
                  // alert(Refugio.latitud);
              });
              inicio();
          }else{
              console.log("Error: No data");
          }
      }, "json");


function inicio() {

    var lat = Refugio.latitud === 0 ? 17.998887170641467 : Refugio.latitud;
    var lon = Refugio.longitud === 0 ? -92.94474352674484 : Refugio.longitud;


    obj.id = Refugio.id;
    obj.dom = "'" + Refugio.ubicacion_google + "'";
    obj.init = true;

    $("#updateDom").hide();

    tM = google.maps.MapTypeId.ROADMAP;

    var latlng = new google.maps.LatLng(lat, lon);
    var myOptions = {
        zoom: 17,
        center: latlng,
        mapTypeControl: false,
        mapMaker: true,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: tM
    };

    var map = new google.maps.Map(document.getElementById("mapDen"), myOptions);
    var img = Refugio.zona === 'RURAL' ? 'images/z2.png' : 'images/z1.png';
    var image = {
        url: img,
        size: new google.maps.Size(28, 32),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(14, 32)
    };

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        optimized: false,
        icon: image,
        visible: true,
        title: "Arrastre a una nueva posición",
        draggable: true
    });
    dom = geocodePosition(marker.getPosition());
    // alert(dom);
    obj.newPos = "";
    google.maps.event.addListener(marker, 'dragend', function () {
        obj.init = false;
        geocodePosition(marker.getPosition());
    });


    function geocodePosition(pos) {
        geocoder = new google.maps.Geocoder();
        geocoder.geocode
        ({
                latLng: pos
            },
            function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    // alert(dom);
                    if (dom !== "undefined") {
                        if (obj.dom === "") {
                            obj.dom = results[0].formatted_address;
                            obj.newPos = marker.position;
                            updateCurrentPos();
                        } else {
                            obj.dom = results[0].formatted_address;
                            obj.newPos = marker.position;
                            if (!obj.init) {
                                $("#updateDom").show();
                            }
                        }
                        $("#domicilio").text(results[0].formatted_address);
                        //alert(obj.dom);
                    }
                    $("#mapSearchInput").val(results[0].formatted_address);
                    $("#mapErrorMsg").hide(100);
                } else {
                    $("#mapErrorMsg").html('Cannot determine address at this location.' + status).show(100);
                }
            }
        );
    }



  $("#updateDom").on("click", function (event) {
      event.preventDefault();
      updateCurrentPos();
  })



  function updateCurrentPos() {
      var queryString = "dom="+obj.dom+"&pos="+obj.newPos+"&id="+obj.id;
      // $.get(obj.getValue(0) + "savenewposition/", {dom: obj.dom, pos: obj.newPos, id: obj.id},
      $.get(obj.getValue(0) + "savenewposition/"+obj.dom+"/"+obj.newPos+"/"+obj.id,{},
          function (response) {
              alert(response.data);
          }, "json");
  }

  $("#closeWindowMap").on("click",function(event){
      event.preventDefault();
      window.close();
      return false;
  });
}


  </script>







</body>

</html>
