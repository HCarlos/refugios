import{_ as E,a as g}from"./AuthenticatedLayout-DMmJ6t-r.js";import{_ as N}from"./Pagination-YhZwNUR6.js";import{T as S,k as d,o as m,c as h,a as o,u as x,w as a,F as v,Z,b as c,t as l,d as s,r as w,y as j}from"./app-CWdUJphf.js";import{_ as V,a as y}from"./SecondaryButton-DZc44R6m.js";import{_ as z}from"./PrimaryButton-DSdwpODv.js";import{D}from"./DangerButton-Pe_JDuH5.js";import{_ as I}from"./AlertSuccess-D3ZohZNZ.js";import{_ as L}from"./DarkButton-DT2-l40Z.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const T={class:"p-4 bg-white rounded-lg shadow-xs"},H={class:"inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md"},F={class:"px-4 py-2 -mx-3"},O={class:"mx-3"},P=s("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[s("path",{"fill-rule":"evenodd",d:"M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z","clip-rule":"evenodd"})],-1),U=s("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[s("path",{"fill-rule":"evenodd",d:"M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z","clip-rule":"evenodd"})],-1),Q={class:"overflow-hidden mb-8 w-full rounded-lg border shadow-xs"},q={class:"overflow-x-auto w-full"},A={class:"w-full whitespace-no-wrap"},G=s("thead",null,[s("tr",{class:"text-xs font-bold tracking-wide text-left text-blue-500 uppercase bg-gray-300 border-b"},[s("th",{class:"px-4 py-3"},"ID"),s("th",{class:"px-4 py-3"},"Número"),s("th",{class:"px-4 py-3"},"Refugio"),s("th",{class:"px-4 py-3"},"Ubicación"),s("th",{class:"px-4 py-3"},"Infraestructra"),s("th",{class:"px-4 py-3"},"Capacidad"),s("th",{class:"px-4 py-3"},"Enlace"),s("th",{class:"px-4 py-3"},"Teléfonos"),s("th",{class:"px-4 py-3"})])],-1),J={class:"bg-white divide-y"},K={class:"px-4 py-3 text-sm"},W={class:"px-4 py-3 text-sm"},X={class:"px-4 py-3 text-sm"},Y={class:"px-4 py-3 text-sm"},R={class:"px-4 py-3 text-xs"},ss={class:"px-4 py-3 text-sm"},es={class:"px-4 py-3 text-sm"},ts={class:"px-4 py-3 text-xs"},os={class:"px-4 py-3 text-sm"},as=s("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"size-6"},[s("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"})],-1),ls={class:"px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9"},is={class:"p-6"},cs={class:"text-2x1 font-medium text-gray-900"},ns={class:"m-6 flex justify-end"},vs={__name:"Index",props:{Refugios:{type:Object},flash:{type:Object}},setup(u){const n=u,i=S({id:"",refugio:"",ubicacion:"",ubicacion_google:"",enlace:"",telefonos:"",observaciones:"",latitud:"",longitud:"",html:"",infraestructura:"",activado:"",poligono:"",categoria:"",capacidad:"",imagen:"",refugiorutaid:""}),p=d(!1),r=d(n.flash.success!=null?n.flash.success:""),_=d(n.flash.success!=null?"":"hidden");d();const b=e=>{i.id=e.id,i.numero=e.numero,i.refugio=e.refugio,p.value=!0},f=()=>{p.value=!1},k=()=>{i.post(route("refugio.destroy",i.id),{onSuccess:()=>{M(n.flash.success)}})},C=e=>{window.open("/refugios-getPosition.php?id="+e.id)},M=e=>{f(),r.value=e,console.log(r.value),_.value="block",setTimeout(()=>{_.value="hidden",r.value=""},4200)};var $="Refugios";return(e,rs)=>(m(),h(v,null,[o(x(Z),{title:"Refugios"}),o(E,null,{header:a(()=>[c(l(x($)),1)]),default:a(()=>[s("div",T,[s("div",H,[s("div",F,[s("div",O,[o(g,{href:e.route("refugio.create"),titulo:"Nuevo refugio",captionButton:"Nuevo"},{default:a(()=>[w(e.$slots,"icon",{},()=>[P])]),_:3},8,["href"])])])]),o(I,{classMsg:_.value,Msg:r.value,classIcon:"text-green-800"},{default:a(()=>[w(e.$slots,"icon",{},()=>[U])]),_:3},8,["classMsg","Msg"]),s("div",Q,[s("div",q,[s("table",A,[G,s("tbody",J,[(m(!0),h(v,null,j(u.Refugios.data,t=>(m(),h("tr",{key:t.id,class:"text-gray-700"},[s("td",K,l(t.id),1),s("td",W,[o(g,{href:e.route("refugio.edit",t.id)},{default:a(()=>[o(y,{title:"Editar refugio"},{default:a(()=>[c(l(t.numero),1)]),_:2},1024)]),_:2},1032,["href"])]),s("td",X,[o(L,{onClick:B=>C(t),title:"Cambiar la geolocalización"},{default:a(()=>[c(l(t.refugio),1)]),_:2},1032,["onClick"])]),s("td",Y,l(t.ubicacion),1),s("td",R,l(t.infraestructura),1),s("td",ss,l(t.capacidad),1),s("td",es,l(t.enlace),1),s("td",ts,l(t.telefonos),1),s("td",os,[o(D,{onClick:B=>b(t),title:"Eliminar refugio"},{default:a(()=>[as]),_:2},1032,["onClick"])])]))),128))])])]),s("div",ls,[o(N,{links:u.Refugios.links},null,8,["links"])])])]),o(V,{show:p.value,onClose:f},{default:a(()=>[s("div",is,[s("p",null,[c(" Quiéres eliminar este refugio "),s("span",cs,l(x(i).refugio)+" ? ",1)])]),s("div",ns,[o(z,{onClick:k,class:"mr-4"},{default:a(()=>[c("Si, eliminalo")]),_:1}),o(y,{onClick:f},{default:a(()=>[c("Cancelar")]),_:1})])]),_:1},8,["show"])]),_:3})],64))}};export{vs as default};