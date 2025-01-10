import{f as b,g as x,p as t,l as a,k as i,v as u,z as p,D as f,u as l,F as y,E as h,q as d}from"./@vue-3a91xcaC.js";import{a as k,b as v,_ as g}from"./TextInput-vw_gM44n.js";import{_ as w}from"./NumberInput-kSyx-riH.js";import{P as n}from"./PrimaryButton-D_Kub3Ai.js";import{T as V}from"./@inertiajs-z7GmGqK5.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const j=t("header",null,[t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Group Information "),t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Edit existing group. ")],-1),P={class:"flex items-center justify-between gap-4"},S={id:"points-modal",tabindex:"-1","aria-hidden":"true",class:"hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"},$={class:"relative w-full max-w-md max-h-full p-4"},B={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},N=h('<div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600"><h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Input Group Points </h3><button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="points-modal"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path></svg><span class="sr-only">Close modal</span></button></div>',1),U={class:"p-4 md:p-5"},_=t("label",{for:"points",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Points",-1),q=t("label",{for:"remarks",class:"block mb-2 text-sm font-medium text-gray-900 dark:text-white"},"Remarks",-1),M={class:"flex justify-end"},at={__name:"Details",props:{form:Object,group:Object},setup(r){const s=V({points:"",remarks:""});return(m,e)=>(b(),x(y,null,[j,t("form",{onSubmit:e[2]||(e[2]=u(o=>r.form.patch(m.route("groups.update",r.group)),["prevent"])),class:"mt-6 space-y-6"},[t("div",null,[a(g,{for:"name",value:"Name"}),a(k,{id:"name",type:"text",class:"block w-full mt-1",modelValue:r.form.name,"onUpdate:modelValue":e[0]||(e[0]=o=>r.form.name=o),required:"",autofocus:""},null,8,["modelValue"]),a(v,{class:"mt-2",message:r.form.errors.name},null,8,["message"])]),t("div",null,[a(g,{for:"points",value:"Points"}),a(w,{id:"points",type:"text",class:"block w-full mt-1",modelValue:r.form.points,"onUpdate:modelValue":e[1]||(e[1]=o=>r.form.points=o),readonly:""},null,8,["modelValue"])]),t("div",P,[a(n,{disabled:r.form.processing},{default:i(()=>[d(" Save ")]),_:1},8,["disabled"]),a(n,{disabled:r.form.processing,type:"button","data-modal-target":"points-modal","data-modal-toggle":"points-modal"},{default:i(()=>[d(" Points ")]),_:1},8,["disabled"])])],32),t("div",S,[t("div",$,[t("div",B,[N,t("div",U,[t("form",{onSubmit:e[5]||(e[5]=u(o=>{l(s).patch(m.route("groups.points",r.group),{preserveScroll:!0,onSuccess:c=>{r.form.points=c.props.group.points,l(s).points="",l(s).remarks=""}})},["prevent"])),class:"space-y-5"},[t("div",null,[_,p(t("input",{type:"text",name:"points","onUpdate:modelValue":e[3]||(e[3]=o=>l(s).points=o),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white",required:""},null,512),[[f,l(s).points]])]),t("div",null,[q,p(t("input",{type:"text",name:"remarks","onUpdate:modelValue":e[4]||(e[4]=o=>l(s).remarks=o),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white",required:""},null,512),[[f,l(s).remarks]])]),t("div",M,[a(n,{"data-modal-hide":"points-modal"},{default:i(()=>[d(" Update ")]),_:1})])],32)])])])])],64))}};export{at as default};
