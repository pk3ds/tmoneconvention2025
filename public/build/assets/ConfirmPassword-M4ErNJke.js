import{f as p,L as n,bx as e,Y as r,bd as o,N as t,X as d,av as l,bC as c}from"./@vue-vmfQIgrK.js";import{_ as f}from"./GuestLayout-EfpfEJsI.js";import{_ as u,a as _,b as w}from"./TextInput-aHMkE20r.js";import{P as b}from"./PrimaryButton-hlC71LOP.js";import{T as x,Z as g}from"./@inertiajs-ju8D2hAz.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const y=t("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),h={class:"flex justify-end mt-4"},O={__name:"ConfirmPassword",setup(v){const s=x({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return(C,a)=>(p(),n(f,null,{default:e(()=>[r(o(g),{title:"Confirm Password"}),y,t("form",{onSubmit:c(i,["prevent"])},[t("div",null,[r(u,{for:"password",value:"Password"}),r(_,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":a[0]||(a[0]=m=>o(s).password=m),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),r(w,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),t("div",h,[r(b,{class:l(["ms-4",{"opacity-25":o(s).processing}]),disabled:o(s).processing},{default:e(()=>[d(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{O as default};
