import{_ as Y}from"./AuthenticatedLayout-Kh0Z_ccT.js";import{k as i,T as oo,m as eo,c as ao,a as s,u as d,w as l,F as to,o as so,Z as lo,b as r,t as p,d as a,r as v,q as io}from"./app-ZHI9JMuZ.js";import{_ as V,a as O}from"./Modal-YHMpnetb.js";import{_ as x}from"./PrimaryButton-Ct5-wMUW.js";import{_ as no}from"./AlertSuccess-mEDa8q3V.js";import{_ as L}from"./SelectGroup-CHKqvas_.js";import{_ as ro}from"./AlertWarning-Mtcy9HPA.js";import{_ as N}from"./AceptarButton-CNreLJdy.js";import{D as B,V as E}from"./dataTables.responsive-BhO33jlh.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./InputError-BLVYMVku.js";/*! Bootstrap 5 styling wrapper for Select
 * © SpryMedia Ltd - datatables.net/license
 */B.select.classes.checkbox="form-check-input";const uo={class:"p-4 bg-white rounded-lg shadow-xs"},co={class:"inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md"},go={class:"px-4 py-2 -mx-3"},fo={class:"mx-3"},mo=a("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[a("path",{"fill-rule":"evenodd",d:"M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z","clip-rule":"evenodd"})],-1),po=a("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[a("path",{d:"M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z"}),a("path",{d:"M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z"})],-1),vo=a("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[a("path",{"fill-rule":"evenodd",d:"M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM6.262 6.072a8.25 8.25 0 1 0 10.562-.766 4.5 4.5 0 0 1-1.318 1.357L14.25 7.5l.165.33a.809.809 0 0 1-1.086 1.085l-.604-.302a1.125 1.125 0 0 0-1.298.21l-.132.131c-.439.44-.439 1.152 0 1.591l.296.296c.256.257.622.374.98.314l1.17-.195c.323-.054.654.036.905.245l1.33 1.108c.32.267.46.694.358 1.1a8.7 8.7 0 0 1-2.288 4.04l-.723.724a1.125 1.125 0 0 1-1.298.21l-.153-.076a1.125 1.125 0 0 1-.622-1.006v-1.089c0-.298-.119-.585-.33-.796l-1.347-1.347a1.125 1.125 0 0 1-.21-1.298L9.75 12l-1.64-1.64a6 6 0 0 1-1.676-3.257l-.172-1.03Z","clip-rule":"evenodd"})],-1),_o=a("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor",class:"size-6"},[a("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"})],-1),ho=a("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[a("path",{"fill-rule":"evenodd",d:"M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z","clip-rule":"evenodd"})],-1),wo={class:"overflow-hidden mb-8 w-full rounded-lg border shadow-xs"},xo={class:"overflow-x-auto w-full"},bo=a("thead",null,[a("tr",{class:"text-xs font-bold tracking-wide text-left text-blue-500 uppercase bg-gray-300 border-b"},[a("th",{class:"px-4 py-3"},"ID"),a("th",{class:"px-4 py-3"},"Número"),a("th",{class:"px-4 py-3"},"Refugio"),a("th",{class:"px-4 py-3"},"Ubicación"),a("th",{class:"px-4 py-3"},"Infraestructra"),a("th",{class:"px-4 py-3"},"Capacidad"),a("th",{class:"px-4 py-3"},"Enlace"),a("th",{class:"px-4 py-3"},"Teléfonos")])],-1),Co=a("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[a("path",{"fill-rule":"evenodd",d:"M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z","clip-rule":"evenodd"})],-1),yo={class:"p-6"},Mo={class:"text-2x1 font-medium text-orange-700"},Ro={class:"text-2x1 font-medium text-purple-800"},ko={class:"m-6 flex justify-end"},Eo={class:"p-6"},Bo=a("br",null,null,-1),$o=a("br",null,null,-1),Ao={class:"text-2x1 font-medium text-orange-700"},Zo={class:"text-2x1 font-medium text-purple-800"},jo={class:"m-6 flex justify-end"},Uo={__name:"ListaColoniasDT",props:{Colonias:{type:Object},Refugios:{type:Object},flash:{type:Object}},setup(T){E.use(B),E.use(B);const $=i([]),A=i([]);let u=i([]),_=i([]);const n=T,e=oo({id:0,refugio_id:0,numero:0,latitud:0,longitud:0,activado:0,refugiocolonia_id:0,zona:"",refugioruta_id:0,ruta:"",colonia1_id:0,colonia1:"",colonia_id:0,colonia:"",comunidad_id:0,comunidad:"",tipocomunidad_id:0,tipocomunidad:0,nuevo_refugio_id:0,nuevo_refugio:""});n.Colonias.map(o=>$.value.push({id:o.id,text:o.colonia+" "+o.comunidad+" "+o.id})),n.Refugios.map(o=>A.value.push({id:o.id,text:o.refugio+" ("+o.numero+")"}));const b=i(!1),C=i(!1),y=i(!1),g=i(!1),M=i("hidden"),h=i("hidden"),w=i(n.flash.success!=null?n.flash.success:""),Z=i();let j;const D=i([]),f=i(0);eo(function(){j=Z.value.dt});const z=o=>{h.value="hidden",u.value=[],e.id=o.target.value,console.log(e.id),I()},I=async()=>{y.value=!1,g.value=!1,console.log(e.id),_.value=[];try{const o=await io.post("getRefugiosFromColoniasAuth",e).then(t=>{console.log("Datos recibidos:",t.data.refugios.original.mensaje),t.data.refugios.original.mensaje==="OK"?(u.value=t.data.refugios.original,console.log("Colonia recibida:",t.data.colonia.colonia),_.value=t.data.colonia,U(_.value),y.value=!0):h.value="block"}).catch(t=>{console.log("Error:",t.message)})}catch(o){console.error("Error al obtener los datos: ",o.message)}},F=[{data:"id",title:"ID"},{data:"numero",title:"#"},{data:"refugio",title:"REFUGIO"},{data:"ubicacion",title:"UBICACION"},{data:"infraestructura",title:"INFRAESTRUCTURA"},{data:"capacidad",title:"CAPACIDAD"},{data:"enlace",title:"ENLACE"},{data:"telefonos",title:"TELEFONOS"}];let H={dom:"Bftip",language:{url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json"},buttons:["csv","excel","pdf","print"],responsive:!0,select:!0,processing:!0,paging:!0,lengthMenu:[[10,25,50,75,100,-1],["10","25","50","75","100","Todos"]],displayLength:10};const U=o=>{e.id=o.id,e.numero=o.numero,e.colonia1=o.colonia1,e.colonia1_id=o.colonia1_id,e.colonia=o.colonia,e.colonia_id=o.colonia_id,e.activado=o.activado,e.comunidad=o.comunidad,e.comunidad_id=o.comunidad_id,e.tipocomunidad=o.tipocomunidad,e.tipocomunidad_id=o.tipocomunidad_id,e.refugio_id=o.refugio_id,e.refugiocolonia_id=o.refugiocolonia_id,e.refugioruta_id=o.refugioruta_id,e.ruta=o.ruta,e.zona=o.zona,e.latitud=o.latitud,e.longitud=o.longitud},P=async o=>{h.value="hidden",o.target.options.selectedIndex>-1&&(e.nuevo_refugio_id=o.target.value,e.nuevo_refugio=o.target.options[o.target.options.selectedIndex].text,console.log(e.nuevo_refugio_id+"_"+e.colonia_id))},K=o=>{e.refugio_id=o,b.value=!0},q=o=>{C.value=!0},R=()=>{b.value=!1},k=()=>{C.value=!1},Q=()=>{console.log(e.refugio_id+" "+e.id),e.post(route("coloniarefugio.destroy",e),{onSuccess:()=>{n.flash.mensaje==="OK"?m(n.flash.success):m(n.flash.error)},onError:()=>{m(n.flash.error)}})},G=()=>{console.log(e.nuevo_refugio_id+" "+e.id),e.post(route("coloniarefugio.add",e),{onSuccess:()=>{n.flash.mensaje==="OK"?m(n.flash.success):m(n.flash.error)},onError:()=>{m(n.flash.error)}})};function S(){g.value=!1,f.value=0,j.rows({selected:!0}).every(function(){let o=u.value.data.indexOf(this.data());o>=0&&(e.refugio_id=u.value.data[o].id,e.refugio=u.value.data[o].refugio,f.value=u.value.data[o].id,g.value=!0,console.log(f.value+" "+u.value.data[o].id," => ",u.value.data[o].refugio))})}const m=o=>{R(),k(),w.value=o,console.log(w.value),M.value="block bg-warning-800",setTimeout(()=>{M.value="hidden",w.value="",I()},3e3)},X=o=>{window.open("/refugio.edit/"+o)},J=o=>{window.open("/refugios-getPosition.php?id="+o)};var W="Asignar Refugio a Colonia";return(o,t)=>(so(),ao(to,null,[s(d(lo),{title:"Colonias"}),s(Y,null,{header:l(()=>[r(p(d(W)),1)]),default:l(()=>[a("div",uo,[a("div",co,[a("div",go,[a("div",fo,[s(L,{opciones:$.value,onChange:t[0]||(t[0]=c=>z(c)),errors:d(e).errors.colonia_id,"class-especial":"em25 bg-yellow-50"},null,8,["opciones","errors"])])]),s(x,{show:y.value,onClick:t[1]||(t[1]=c=>q(d(e))),title:"Agregar refugio",type:"default",classBtn:"px-3 py-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 rojo-morena border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald"},{default:l(()=>[v(o.$slots,"icon",{},()=>[mo])]),_:3},8,["show"]),s(x,{show:g.value,onClick:t[2]||(t[2]=c=>X(f.value)),title:"Editar refugio",type:"default",classBtn:"px-3 py-2 mt-3 ml-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-emerald-600 border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald"},{default:l(()=>[v(o.$slots,"icon",{},()=>[po])]),_:3},8,["show"]),s(x,{show:g.value,onClick:t[3]||(t[3]=c=>J(f.value)),title:"Editar ubicación",type:"default",classBtn:"px-3 py-2 ml-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-orange-600 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-orange"},{default:l(()=>[v(o.$slots,"icon",{},()=>[vo])]),_:3},8,["show"]),s(x,{show:g.value,onClick:t[4]||(t[4]=c=>K(f.value)),title:"Eliminar refugio","class-btn":"px-3 py-2 ml-3 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"},{default:l(()=>[_o]),_:1},8,["show"])]),s(no,{classMsg:M.value,Msg:w.value,classIcon:"text-green-800"},{default:l(()=>[v(o.$slots,"icon",{},()=>[ho])]),_:3},8,["classMsg","Msg"]),a("div",wo,[a("div",xo,[s(d(E),{data:d(u).data,columns:F,options:d(H),ref_key:"table",ref:Z,onSelect:S,onDeselect:S,class:"table table-striped table-bordered table-hover w-full whitespace-no-wrap display"},{default:l(()=>[bo]),_:1},8,["data","options"]),s(ro,{classMsg:h.value,Msg:"No se encontraron Refugios",classIcon:"text-orange-800"},{default:l(()=>[v(o.$slots,"icon",{},()=>[Co])]),_:3},8,["classMsg"])])])]),s(V,{show:b.value,onClose:R},{default:l(()=>[a("div",yo,[a("p",null,[r(" ¿Quiéres quitar "),a("span",Mo,p(d(_).colonia),1),r(" del refugio "),a("span",Ro,p(d(e).refugio),1),r(" ? ")])]),a("div",ko,[s(N,{onClick:Q},{default:l(()=>[r("Si, elimínalo")]),_:1}),s(O,{onClick:R,class:"ml-4"},{default:l(()=>[r("Cancelar")]),_:1})])]),_:1},8,["show"]),s(V,{show:C.value,onClose:k},{default:l(()=>[a("div",Eo,[s(L,{opciones:A.value,onChange:t[5]||(t[5]=c=>P(c)),errors:d(e).errors.refugio,"class-especial":"em25 bg-yellow-50",modelValue:D.value,"onUpdate:modelValue":t[6]||(t[6]=c=>D.value=c)},null,8,["opciones","errors","modelValue"]),Bo,$o,a("p",null,[r(" ¿Quiéres agregar el refugio "),a("span",Ao,p(d(e).nuevo_refugio),1),r(" a la colonia "),a("span",Zo,p(d(e).colonia),1),r(" ? ")])]),a("div",jo,[s(N,{onClick:G},{default:l(()=>[r("Agregar")]),_:1}),s(O,{onClick:k,class:"ml-4"},{default:l(()=>[r("Cancelar")]),_:1})])]),_:1},8,["show"])]),_:3})],64))}};export{Uo as default};