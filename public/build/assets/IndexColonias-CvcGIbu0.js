import{_ as j,a as I}from"./AuthenticatedLayout-COKFtPnh.js";import{T as N,k as n,m as S,c as V,a as t,u as r,w as l,F as T,o as A,Z as E,b as c,t as x,d as e,r as v}from"./app-BuWHEnaa.js";import{_ as H,a as z}from"./Modal-CZK5Uuik.js";import{_ as y}from"./PrimaryButton-Bu-PBff2.js";import{_ as L}from"./AlertSuccess-B9TR9wdG.js";import{_ as R}from"./AceptarButton-Cov9jPuP.js";import{P as g,D as C}from"./dataTables.responsive-YSWLf07y.js";import"./buttons.html5-C_K8urjs.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const U={class:"p-4 bg-white rounded-lg shadow-xs"},F={class:"inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md"},P={class:"overflow-hidden mb-8 w-full rounded-lg border shadow-xs"},Q={class:"overflow-x-auto w-full"},X={class:"p-6"},q={class:"text-2x1 font-medium text-gray-900"},G={class:"m-6 flex justify-end"},ne={__name:"IndexColonias",props:{Refugios:{type:Object},Colonias:{type:Object},$Comunidades:{type:Object},flash:{type:Object}},setup(M){g.use(C),g.use(C);const i=M,$=[{data:"id",title:"ID"},{data:"colonia",title:"COLONIA"},{data:"comunidad",title:"COMUNIDAD"}];let k={dom:"lftipr",language:{url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-MX.json"},buttons:["csv","excel","pdf","print"],responsive:!0,select:!0,processing:!0,paging:!0,lengthMenu:[[10,25,50,75,100,-1],["10","25","50","75","100","Todos"]],displayLength:100,order:[[1,"asc"]]};const d=N({id:0,colonia1_id:0,colonia1:"",colonia_id:0,colonia:"",comunidad_id:0,comunidad:"",tipocomunidad_id:0,tipocomunidad:""}),h=n(!1),f=n(!1);n(i.Refugios.length>0);const u=n(i.flash.success!=null?i.flash.success:""),p=n(i.flash.success!=null?"":"hidden"),a=n([]),w=n();let _;i.Colonias.map(function(s,o){a.value.push(s)}),S(function(){_=w.value.dt});const m=()=>{h.value=!1},O=()=>{d.post(route("colonia.destroy",d.id),{onSuccess:()=>{B(i.flash.success)}})},D=s=>{window.open("/colonia.edit/"+s)};function b(){f.value=!1,_.rows({selected:!0}).every(function(){let s=a.value.indexOf(this.data());s>=0&&(d.id=a.value[s].id,f.value=!0,console.log(d.id+" "+a.value[s].id," => ",a.value[s].colonia))})}const B=s=>{m(),u.value=s,console.log(u.value),p.value="block",setTimeout(()=>{p.value="hidden",u.value=""},4200)};var Z="Colonias";return(s,o)=>(A(),V(T,null,[t(r(E),{title:"Colonias"}),t(j,null,{header:l(()=>[c(x(r(Z)),1)]),default:l(()=>[e("div",U,[e("div",F,[t(I,{href:s.route("colonia.create"),titulo:"Nueva colonia"},{default:l(()=>[t(y,{show:!0,class:"mb-2",type:"default",classBtn:"px-3 py-2 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 rojo-morena border border-transparent rounded-lg active:bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald"},{default:l(()=>[v(s.$slots,"icon",{},()=>[o[1]||(o[1]=e("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[e("path",{"fill-rule":"evenodd",d:"M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z","clip-rule":"evenodd"})],-1))])]),_:3})]),_:3},8,["href"]),t(y,{show:f.value,onClick:o[0]||(o[0]=J=>D(r(d).id)),title:"Editar colonia",class:"ml-2 mt-1",type:"default",classBtn:"px-3 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"},{default:l(()=>[v(s.$slots,"icon",{},()=>[o[2]||(o[2]=e("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[e("path",{d:"M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z"}),e("path",{d:"M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z"})],-1))])]),_:3},8,["show"])]),t(L,{classMsg:p.value,Msg:u.value,classIcon:"text-green-800"},{default:l(()=>[v(s.$slots,"icon",{},()=>[o[3]||(o[3]=e("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[e("path",{"fill-rule":"evenodd",d:"M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z","clip-rule":"evenodd"})],-1))])]),_:3},8,["classMsg","Msg"]),e("div",P,[e("div",Q,[t(r(g),{id:"my-table-id",class:"display",columns:$,data:a.value,options:r(k),ref_key:"table",ref:w,onSelect:b,onDeselect:b},{default:l(()=>o[4]||(o[4]=[e("thead",null,[e("tr",{class:"text-xs font-bold tracking-wide text-left text-blue-500 uppercase bg-gray-300 border-b"},[e("th",{class:"px-4 py-3"},"ID"),e("th",{class:"px-4 py-3"},"COLONIA"),e("th",{class:"px-4 py-3"},"COMUNIDAD")])],-1)])),_:1},8,["data","options"])])])]),t(H,{show:h.value,onClose:m},{default:l(()=>[e("div",X,[e("p",null,[o[5]||(o[5]=c(" Quiéres eliminar este colonia ")),e("span",q,x(a.value.colonia)+" ? ",1)])]),e("div",G,[t(R,{onClick:O},{default:l(()=>o[6]||(o[6]=[c("Si, eliminalo")])),_:1}),t(z,{onClick:m,class:"ml-4"},{default:l(()=>o[7]||(o[7]=[c("Cancelar")])),_:1})])]),_:1},8,["show"])]),_:3})],64))}};export{ne as default};