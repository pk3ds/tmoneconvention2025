import{f,g as _,aS as w,r as m,Y as s,bx as a,N as t,n as x,X as i,bd as o,bA as h,av as b}from"./@vue-vmfQIgrK.js";import{_ as k}from"./_plugin-vue_export-helper-x3n3nnut.js";import{_ as v,a as $,b as C}from"./TextInput-aHMkE20r.js";import{_ as D}from"./Modal-u02dlncR.js";import{_ as V}from"./SecondaryButton-6u1BOUWh.js";import{T as A}from"./@inertiajs-ju8D2hAz.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const B={},U={class:"inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md font-title hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"};function N(c,r){return f(),_("button",U,[w(c.$slots,"default")])}const p=k(B,[["render",N]]),S={class:"space-y-6"},P=t("header",null,[t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"},"Delete Account"),t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ")],-1),T={class:"p-6"},E=t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Are you sure you want to delete your account? ",-1),F=t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1),I={class:"mt-6"},K={class:"mt-6 flex justify-end"},de={__name:"DeleteUserForm",setup(c){const r=m(!1),n=m(null),e=A({password:""}),y=()=>{r.value=!0,x(()=>n.value.focus())},d=()=>{e.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>l(),onError:()=>n.value.focus(),onFinish:()=>e.reset()})},l=()=>{r.value=!1,e.reset()};return(O,u)=>(f(),_("section",S,[P,s(p,{onClick:y},{default:a(()=>[i("Delete Account")]),_:1}),s(D,{show:r.value,onClose:l},{default:a(()=>[t("div",T,[E,F,t("div",I,[s(v,{for:"password",value:"Password",class:"sr-only"}),s($,{id:"password",ref_key:"passwordInput",ref:n,modelValue:o(e).password,"onUpdate:modelValue":u[0]||(u[0]=g=>o(e).password=g),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:h(d,["enter"])},null,8,["modelValue"]),s(C,{message:o(e).errors.password,class:"mt-2"},null,8,["message"])]),t("div",K,[s(V,{onClick:l},{default:a(()=>[i(" Cancel ")]),_:1}),s(p,{class:b(["ms-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:d},{default:a(()=>[i(" Delete Account ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{de as default};
