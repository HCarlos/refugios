import{h as v,i as b,v as k,o as n,c as x,T as y,e as i,w as m,a,u as t,Z as V,d as s,t as $,g as f,f as B,j as C,b as p,n as j}from"./app-B5FG3ybF.js";import{_ as N}from"./GuestLayout-CZ28uEoK.js";import{_}from"./InputError-Dy8z5tQA.js";import{_ as h,a as w}from"./TextInput-CF4gwvK5.js";import{_ as U}from"./PrimaryButton-CJOMZKt3.js";import"https://polyfill.io/v3/polyfill.min.js?features=default";import"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=weather&key=AIzaSyB0mmrw3wLssGqd1eUKWAH43GEcn5bm8-s&callback=initMap&v=weekly";const q=["value"],P={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const c=e,d=l,o=v({get(){return d.checked},set(r){c("update:checked",r)}});return(r,u)=>b((n(),x("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":u[0]||(u[0]=g=>o.value=g),class:"text-purple-600 form-checkbox focus:shadow-outline-purple focus:border-purple-400 focus:outline-none dark:focus:shadow-outline-gray"},null,8,q)),[[k,o.value]])}},R={class:"flex flex-col overflow-y-auto md:flex-row"},S=s("div",{class:"h-32 md:h-auto md:w-1/2"},[s("img",{"aria-hidden":"true",class:"object-cover w-full h-full",src:"/images/login-office.jpeg",alt:"Office"})],-1),D={class:"flex items-center justify-center p-6 sm:p-12 md:w-1/2"},I={class:"w-full"},L=s("h1",{class:"mb-4 text-xl font-semibold text-gray-700"},"Ingresar",-1),M={key:0,class:"mb-4 text-sm font-medium text-green-600"},O={class:"mt-4"},T={class:"mt-4"},z={class:"block mt-4"},A={class:"flex items-center"},E=s("span",{class:"ml-2 text-sm text-gray-600"},"Recordar",-1),F={class:"flex items-center justify-end mt-4"},X={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=y({username:"",password:"",remember:!1}),c=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(d,o)=>(n(),i(N,null,{default:m(()=>[a(t(V),{title:"Log in"}),s("div",R,[S,s("div",D,[s("div",I,[L,l.status?(n(),x("div",M,$(l.status),1)):f("",!0),s("form",{onSubmit:B(c,["prevent"])},[s("div",O,[a(h,{for:"username",value:"Nombre de Usuario"}),a(w,{id:"username",type:"username",class:"block w-full mt-1",modelValue:t(e).username,"onUpdate:modelValue":o[0]||(o[0]=r=>t(e).username=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(_,{class:"mt-2",message:t(e).errors.username},null,8,["message"])]),s("div",T,[a(h,{for:"password",value:"Password"}),a(w,{id:"password",type:"password",class:"block w-full mt-1",modelValue:t(e).password,"onUpdate:modelValue":o[1]||(o[1]=r=>t(e).password=r),required:"",autocomplete:"current-password"},null,8,["modelValue"]),a(_,{class:"mt-2",message:t(e).errors.password},null,8,["message"])]),s("div",z,[s("label",A,[a(P,{name:"remember",checked:t(e).remember,"onUpdate:checked":o[2]||(o[2]=r=>t(e).remember=r)},null,8,["checked"]),E])]),s("div",F,[l.canResetPassword?(n(),i(t(C),{key:0,href:d.route("password.request"),class:"text-sm text-gray-600 underline hover:text-gray-900"},{default:m(()=>[p(" Olvidó su password? ")]),_:1},8,["href"])):f("",!0),a(U,{class:j(["ml-4",{"opacity-25":t(e).processing}]),disabled:t(e).processing},{default:m(()=>[p(" Ingresar ")]),_:1},8,["class","disabled"])])],32)])])])]),_:1}))}};export{X as default};