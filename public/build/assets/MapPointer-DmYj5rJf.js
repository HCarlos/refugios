import{k as c,c as r,d as a,t as s,b as e,P as f,F as v,o as p}from"./app-D4LyjXdY.js";import{_ as u}from"./_plugin-vue_export-helper-DlAUqK2U.js";const b={class:"section-breadcrumb section-color-graydarker"},m={class:"container"},g={class:"breadcrumb"},_={class:"active"},h={class:"section-content section-portfolio",id:"section-portfolio"},k={class:"container"},x={class:"section-title"},y={id:"domicilio"},R={class:"post-footer section-content section-content-mini section-color-graydark"},w={class:"container"},C={__name:"MapPointer",props:{Refugio:{type:Object},flash:{type:Object}},setup(n){const t=n,d=c(0),l=c(0);return console.log(t.Refugio.latitud,t.Refugios.longitud),d.value=t.Refugio.latitud,l.value=t.Refugio.longitud,(i,o)=>(p(),r(v,null,[a("section",b,[a("div",m,[a("ul",g,[a("li",_,s(i.Refugios.refugio),1)])])]),a("section",h,[a("div",k,[a("h2",x,[o[0]||(o[0]=e(" Ubicación Google: ")),a("small",y,s(i.Refugios.ubicacion_google),1)]),o[1]||(o[1]=f('<div class="row" data-v-1fc59af5><section class="section-content section-map-background" id="section-map-background" data-v-1fc59af5><div class="map map-background" id="mapDen" data-v-1fc59af5></div><div class="hidden-phone" data-v-1fc59af5><div class="container" data-v-1fc59af5><div class="row" data-v-1fc59af5><div class="span3 offset8" data-v-1fc59af5><div class="box box-shadow" data-v-1fc59af5><h3 class="box-title" data-v-1fc59af5><strong data-v-1fc59af5>Ficha de Datos</strong></h3><div class="box-content" data-v-1fc59af5><p data-v-1fc59af5><br data-v-1fc59af5><br data-v-1fc59af5><a class="btn btn-small btn-primary" id="updateDom" href="#" data-v-1fc59af5><i class="icon-save" data-v-1fc59af5></i> Actualizar Ubicación </a><br data-v-1fc59af5><br data-v-1fc59af5><a class="btn btn-small btn-secondary" id="closeWindowMap" href="#" data-v-1fc59af5><i class="icon-remove" data-v-1fc59af5></i> Cerrar Ventana </a></p></div></div></div></div></div></div></section></div>',1))])]),a("div",R,[a("div",w,[o[2]||(o[2]=a("p",{class:"pull-right"},[e(" CMI | "),a("a",{href:"https://villahermosa.gob.mx",title:"Coordinación de Modernización e Innovación"},"villahermnosa.gob.mx")],-1)),a("p",null,"H. Ayuntamiento Constitucional de Centro | "+s(Date.now("Y"))+" © Todos los derechos reservados",1)])])],64))}},V=u(C,[["__scopeId","data-v-1fc59af5"]]);export{V as default};