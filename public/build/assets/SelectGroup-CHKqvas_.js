import{_ as f}from"./InputError-BLVYMVku.js";import{k as p,m as h,o as n,c as r,d as e,t as u,u as x,n as y,F as i,p as v,a as b}from"./app-ZHI9JMuZ.js";const _={class:"block text-sm"},k={class:"text-gray-700 dark:text-gray-400"},w={class:"relative text-gray-500 focus-within:text-gray-700 gray:focus-within:text-gray-700"},L=["value"],V=e("option",{value:"-1",selected:""},"Selecciona una opción",-1),M=["value"],B=e("div",{class:"absolute inset-y-0 flex items-center ml-2 pointer-events-none"},[e("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",class:"size-6"},[e("path",{d:"M5.625 3.75a2.625 2.625 0 1 0 0 5.25h12.75a2.625 2.625 0 0 0 0-5.25H5.625ZM3.75 11.25a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5H3.75ZM3 15.75a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75ZM3.75 18.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5H3.75Z"})])],-1),C={__name:"SelectGroup",props:["textLabel","opciones","modelValue","isLegend","errors","classEspecial","change"],emits:["update:modelValue","change"],setup(s){const l=s,d=l.textLabel==null?"":l.textLabel,g=l.isLegend!=null,a=p(null);return h(()=>{a.value.hasAttribute("autofocus")&&a.value.focus(),g||(a.selected=!0)}),(c,o)=>(n(),r(i,null,[e("label",_,[e("span",k,u(x(d)),1),e("div",w,[e("select",{class:y(["block w-full pl-10 mt-1 text-sm cols-1 text-dark text-dark-100 border-gray-700 bg-gray-50 focus:border-gray-700 focus:outline-none focus:shadow-outline-gray gray:focus:shadow-outline-gray form-input rounded-md",s.classEspecial]),value:s.modelValue,onInput:o[0]||(o[0]=t=>c.$emit("update:modelValue",t.target.value)),onChange:o[1]||(o[1]=t=>c.$emit("change",t)),ref_key:"select",ref:a},[V,(n(!0),r(i,null,v(s.opciones,(t,m)=>(n(),r("option",{key:m,value:t.id},u(t.text),9,M))),128))],42,L),B])]),b(f,{class:"mt-1",message:s.errors},null,8,["message"])],64))}};export{C as _};