import{k as n,c as r,a as e,u as m,w as s,F as d,o as u,Z as c,b as p,t as C}from"./app-BuWHEnaa.js";import{_ as f}from"./AuthenticatedLayout-COKFtPnh.js";import _ from"./Form-BmdxsSlK.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./InputGroup-BSaPkmQ-.js";import"./InputError-DY0SectE.js";import"./SelectGroup-GSNR2jGF.js";import"./AlertSuccess-B9TR9wdG.js";import"./AceptarButton-Cov9jPuP.js";const F={__name:"Create",props:{Comunidades:{type:Object},Colonia:{type:Object}},setup(t){const o=t,i=n([]);o.Comunidades.map(a=>i.value.push({id:a.comunidad_id,text:a.comunidad}));const l=n(o.Colonia!=null?"Modificando la colonia: "+o.Colonia.id:"Colonia Nueva");return(a,x)=>(u(),r(d,null,[e(m(c),{title:"Colonias"}),e(f,null,{header:s(()=>[p(C(l.value),1)]),default:s(()=>[e(_,{Comunidades:i.value,Colonia:t.Colonia},null,8,["Comunidades","Colonia"])]),_:1})],64))}};export{F as default};