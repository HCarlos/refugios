
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';

import { ref } from "vue";

// import vue from "@vitejs/plugin-vue";
// import $ from "jquery";
// var $ = require( "jquery" );
// window.$ = window.jQuery = require('jquery');
// vue.use({
//     install: function(Vue, options){
//         Vue.prototype.$jQuery = require('jquery'); // you'll have this.$jQuery anywhere in your vue project
//     }
// });

// let polyfill = document.createElement('script');
// polyfill.setAttribute('src',"https://polyfill.io/v3/polyfill.min.js?features=default");
// document.head.appendChild(polyfill);

// let google = document.createElement('script');
// google.setAttribute('src',"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=weather&key=AIzaSyB0mmrw3wLssGqd1eUKWAH43GEcn5bm8-s&callback=init&v=weekly");
// document.head.appendChild(google);


const props = defineProps({
    Refugio: {type: Object},
    flash: {type: Object}
});

const latitud = ref(0);
const longitud = ref(0);

console.log(props.Refugio.latitud, props.Refugios.longitud);


latitud.value = props.Refugio.latitud;
longitud.value = props.Refugio.longitud;

/*

let id = props.Refugio.id;
let dom = props.Refugio.ubicacion_google;
let init = true;


$("#updateDom").hide();


let tM = google.maps.MapTypeId.ROADMAP;

var latlng = new google.maps.LatLng(lat,lon);
var myOptions = {
    zoom: 17,
    center: latlng,
    mapTypeControl: false,
    mapMaker:true,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: tM
};

var map = new google.maps.Map(document.getElementById("mapDen"), myOptions);
var img = "<?php echo $arr[0]->zona=='RURAL'?'/images/z2.png':'/images/z1.png'; ?>";
var image = {
    url: img,
    size: new google.maps.Size(28, 32),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 32)
};

var marker = new google.maps.Marker({
    position: latlng,
    map: map,
    optimized:false,
    icon:image,
    visible:true,
    title:"Arrastre a una nueva posición",
    draggable:true
});
dom    = geocodePosition(marker.getPosition());
let newPos = "";
google.maps.event.addListener(marker, 'dragend', function() {
    init = false;
    geocodePosition(marker.getPosition());
});

function geocodePosition(pos) {
    let geocoder = new google.maps.Geocoder();
    geocoder.geocode
    ({
            latLng: pos
        },
        function(results, status)
        {
            if (status == google.maps.GeocoderStatus.OK) {
                if (dom != "undefined"){
                    if (dom==""){
                        dom    = results[0].formatted_address;
                        newPos = marker.position;
                        updateCurrentPos();
                    }else{
                        dom    = results[0].formatted_address;
                        newPos = marker.position;
                        if (!obj.init){
                            $("#updateDom").show();
                        }
                    }
                    $("#domicilio").text(results[0].formatted_address);
                    //alert(obj.dom);
                }
                $("#mapSearchInput").val(results[0].formatted_address);
                $("#mapErrorMsg").hide(100);
            }
            else
            {
                $("#mapErrorMsg").html('Cannot determine address at this location.'+status).show(100);
            }
        }
    );
}

$("#updateDom").on("click",function(){
    updateCurrentPos();
})



function updateCurrentPos(){
    var queryString = "dom="+dom+"&pos="+newPos+"&id="+id;
    //alert(queryString);
    $.post(obj.getValue(0)+"getEC/", { o:300, t:3, p:2, c:queryString },
        function(response){

            if (response.mensaje == "OK") {
                //stream.emit("cliente", {mensaje: "R-GEO-"+<?php echo $id; ?>});
                alert("Mapa actualizado.");
                window.close();
            }else{
                alert(response.mensaje);
            }

        }, "json");
}

$("#closeWindowMap").on("click",function(event){
    event.preventDefault();
    window.close();
});

// alert("Fin");

*/

</script>

<template>

    <section class="section-breadcrumb section-color-graydarker">
        <div class="container">
            <ul class="breadcrumb">
                <li class="active">{{ Refugios.refugio }}</li>
            </ul>
        </div>
    </section>
    <!-- .................................... $Portfolio .................................... -->
    <section class="section-content section-portfolio" id="section-portfolio">
        <div class="container">
            <h2 class="section-title">
                Ubicación Google:
                <small id="domicilio"> {{ Refugios.ubicacion_google }}</small>
            </h2>
            <div class="row">





                <!-- .................................... $MAP on background .................................... -->
                <section class="section-content section-map-background" id="section-map-background">
                    <div class="map map-background" id="mapDen"></div>

                    <div class="hidden-phone">
                        <div class="container">

                            <div class="row">
                                <div class="span3 offset8">
                                    <div class="box box-shadow">
                                        <h3 class="box-title">
                                            <strong>Ficha de Datos</strong>
                                        </h3>
                                        <div class="box-content">
                                            <p>
                                                <br>
                                                <br>
                                                <a class="btn btn-small btn-primary" id="updateDom" href="#">
                                                    <i class="icon-save"></i>
                                                    Actualizar Ubicación
                                                </a>
                                                <br>
                                                <br>
                                                <a class="btn btn-small btn-secondary" id="closeWindowMap" href="#">
                                                    <i class="icon-remove"></i>
                                                    Cerrar Ventana
                                                </a>

                                            </p>
                                        </div>


                                    </div>

                                </div>
                            </div>


                        </div>














                    </div>
                </section>










            </div>
        </div>
    </section>

    <!-- .................................... $post-footer .................................... -->
    <div class="post-footer section-content section-content-mini section-color-graydark">
        <div class="container">
            <p class="pull-right">
                CMI |
                <a href="https://villahermosa.gob.mx" title="Coordinación de Modernización e Innovación">villahermnosa.gob.mx</a>
            </p>
            <p>H. Ayuntamiento Constitucional de Centro | {{ Date.now('Y') }} &copy;  Todos los derechos reservados</p>
        </div>
    </div>


  </template>

  <style scoped>
      html,body{

          margin:0px;

          height: 100%;

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
