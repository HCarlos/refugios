import{h as b,i as h,v as k,o as n,c as v,T as y,e as c,w as u,a,u as o,Z as V,d as t,t as C,g as f,f as $,j as B,b as p,n as j}from"./app-D4LyjXdY.js";import{_ as N}from"./GuestLayout-C4Dpa4ZS.js";import{_ as w}from"./InputError-BOHiLteU.js";import{_ as x,a as g}from"./TextInput-DzqlcjRN.js";import{_ as U}from"./AceptarButton-jqVzyU3Y.js";const q=["value"],R={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:s}){const d=s,m=l,e=b({get(){return m.checked},set(r){d("update:checked",r)}});return(r,i)=>h((n(),v("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":i[0]||(i[0]=_=>e.value=_),class:"text-purple-600 form-checkbox focus:shadow-outline-purple focus:border-purple-400 focus:outline-none dark:focus:shadow-outline-gray"},null,8,q)),[[k,e.value]])}},S={class:"flex flex-col overflow-y-auto md:flex-row"},D={class:"flex items-center justify-center p-6 sm:p-12 md:w-1/2"},I={class:"w-full"},L={key:0,class:"mb-4 text-sm font-medium text-green-600"},M={class:"mt-4"},O={class:"mt-4"},P={class:"block mt-4"},T={class:"flex items-center"},z={class:"flex items-center justify-end mt-4"},H={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const s=y({username:"",password:"",remember:!1}),d=()=>{s.post(route("login"),{onFinish:()=>s.reset("password")})};return(m,e)=>(n(),c(N,null,{default:u(()=>[a(o(V),{title:"Log in"}),t("div",S,[e[7]||(e[7]=t("div",{class:"h-32 md:h-auto md:w-1/2"},[t("img",{"aria-hidden":"true",class:"object-cover w-full h-full",src:"/images/login-office.jpeg",alt:"Office"})],-1)),t("div",D,[t("div",I,[e[6]||(e[6]=t("h1",{class:"mb-4 text-xl font-semibold text-gray-700"},"Ingresar",-1)),l.status?(n(),v("div",L,C(l.status),1)):f("",!0),t("form",{onSubmit:$(d,["prevent"])},[t("div",M,[a(x,{for:"username",value:"Nombre de Usuario"}),a(g,{id:"username",type:"username",class:"block w-full mt-1",modelValue:o(s).username,"onUpdate:modelValue":e[0]||(e[0]=r=>o(s).username=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(w,{class:"mt-2",message:o(s).errors.username},null,8,["message"])]),t("div",O,[a(x,{for:"password",value:"Contraseña"}),a(g,{id:"password",type:"password",class:"block w-full mt-1",modelValue:o(s).password,"onUpdate:modelValue":e[1]||(e[1]=r=>o(s).password=r),required:"",autocomplete:"current-password"},null,8,["modelValue"]),a(w,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),t("div",P,[t("label",T,[a(R,{name:"remember",checked:o(s).remember,"onUpdate:checked":e[2]||(e[2]=r=>o(s).remember=r)},null,8,["checked"]),e[3]||(e[3]=t("span",{class:"ml-2 text-sm text-gray-600"},"Recordar",-1))])]),t("div",z,[l.canResetPassword?(n(),c(o(B),{key:0,href:m.route("password.request"),class:"text-sm text-gray-600 underline hover:text-gray-900"},{default:u(()=>e[4]||(e[4]=[p(" Olvidó su Contraseña? ")])),_:1},8,["href"])):f("",!0),a(U,{class:j(["ml-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:u(()=>e[5]||(e[5]=[p(" Ingresar ")])),_:1},8,["class","disabled"])])],32)])])])]),_:1}))}};export{H as default};