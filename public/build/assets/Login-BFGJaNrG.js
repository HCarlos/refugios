import{h as v,i as b,v as k,o as n,c as x,T as y,e as i,w as m,a as o,u as t,Z as V,d as s,t as C,g as f,f as $,j as B,b as p,n as j}from"./app-C7NNh9Z4.js";import{_ as N}from"./GuestLayout-eMVEubmu.js";import{_}from"./InputError-C6AmfIt9.js";import{_ as h,a as w}from"./TextInput-b0OPyEg5.js";import{_ as U}from"./AceptarButton-rJFE6Eqi.js";const q=["value"],R={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const c=e,d=l,a=v({get(){return d.checked},set(r){c("update:checked",r)}});return(r,u)=>b((n(),x("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":u[0]||(u[0]=g=>a.value=g),class:"text-purple-600 form-checkbox focus:shadow-outline-purple focus:border-purple-400 focus:outline-none dark:focus:shadow-outline-gray"},null,8,q)),[[k,a.value]])}},S={class:"flex flex-col overflow-y-auto md:flex-row"},D=s("div",{class:"h-32 md:h-auto md:w-1/2"},[s("img",{"aria-hidden":"true",class:"object-cover w-full h-full",src:"/images/login-office.jpeg",alt:"Office"})],-1),I={class:"flex items-center justify-center p-6 sm:p-12 md:w-1/2"},L={class:"w-full"},M=s("h1",{class:"mb-4 text-xl font-semibold text-gray-700"},"Ingresar",-1),O={key:0,class:"mb-4 text-sm font-medium text-green-600"},P={class:"mt-4"},T={class:"mt-4"},z={class:"block mt-4"},A={class:"flex items-center"},E=s("span",{class:"ml-2 text-sm text-gray-600"},"Recordar",-1),F={class:"flex items-center justify-end mt-4"},Q={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=y({username:"",password:"",remember:!1}),c=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(d,a)=>(n(),i(N,null,{default:m(()=>[o(t(V),{title:"Log in"}),s("div",S,[D,s("div",I,[s("div",L,[M,l.status?(n(),x("div",O,C(l.status),1)):f("",!0),s("form",{onSubmit:$(c,["prevent"])},[s("div",P,[o(h,{for:"username",value:"Nombre de Usuario"}),o(w,{id:"username",type:"username",class:"block w-full mt-1",modelValue:t(e).username,"onUpdate:modelValue":a[0]||(a[0]=r=>t(e).username=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(_,{class:"mt-2",message:t(e).errors.username},null,8,["message"])]),s("div",T,[o(h,{for:"password",value:"Contraseña"}),o(w,{id:"password",type:"password",class:"block w-full mt-1",modelValue:t(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>t(e).password=r),required:"",autocomplete:"current-password"},null,8,["modelValue"]),o(_,{class:"mt-2",message:t(e).errors.password},null,8,["message"])]),s("div",z,[s("label",A,[o(R,{name:"remember",checked:t(e).remember,"onUpdate:checked":a[2]||(a[2]=r=>t(e).remember=r)},null,8,["checked"]),E])]),s("div",F,[l.canResetPassword?(n(),i(t(B),{key:0,href:d.route("password.request"),class:"text-sm text-gray-600 underline hover:text-gray-900"},{default:m(()=>[p(" Olvidó su Contraseña? ")]),_:1},8,["href"])):f("",!0),o(U,{class:j(["ml-4",{"opacity-25":t(e).processing}]),disabled:t(e).processing},{default:m(()=>[p(" Ingresar ")]),_:1},8,["class","disabled"])])],32)])])])]),_:1}))}};export{Q as default};