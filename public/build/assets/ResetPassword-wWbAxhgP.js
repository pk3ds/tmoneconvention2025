import{f as c,j as f,k as d,l as e,u as o,p as t,q as w,t as _,v as V}from"./@vue-3a91xcaC.js";import{_ as g}from"./GuestLayout-adFIUYrj.js";import{_ as i,a as m,b as l}from"./TextInput-vw_gM44n.js";import{P as k}from"./PrimaryButton-D_Kub3Ai.js";import{T as v,Z as b}from"./@inertiajs-z7GmGqK5.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const y={class:"mt-4"},P={class:"mt-4"},q={class:"flex items-center justify-end mt-4"},X={__name:"ResetPassword",props:{email:{type:String,required:!0},token:{type:String,required:!0}},setup(n){const p=n,s=v({token:p.token,email:p.email,password:"",password_confirmation:""}),u=()=>{s.post(route("password.store"),{onFinish:()=>s.reset("password","password_confirmation")})};return(x,r)=>(c(),f(g,null,{default:d(()=>[e(o(b),{title:"Reset Password"}),t("form",{onSubmit:V(u,["prevent"])},[t("div",null,[e(i,{for:"email",value:"Email"}),e(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:o(s).email,"onUpdate:modelValue":r[0]||(r[0]=a=>o(s).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),t("div",y,[e(i,{for:"password",value:"Password"}),e(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":r[1]||(r[1]=a=>o(s).password=a),required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),t("div",P,[e(i,{for:"password_confirmation",value:"Confirm Password"}),e(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:o(s).password_confirmation,"onUpdate:modelValue":r[2]||(r[2]=a=>o(s).password_confirmation=a),required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(l,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),t("div",q,[e(k,{class:_({"opacity-25":o(s).processing}),disabled:o(s).processing},{default:d(()=>[w(" Reset Password ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{X as default};
