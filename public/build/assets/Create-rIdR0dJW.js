import{f as p,g as u,l as e,u as s,k as i,F as c,q as l,p as t,v as b,z as v,B as k,C as h,x as w}from"./@vue-3a91xcaC.js";import{_ as V}from"./AuthenticatedLayout--0mUGdwF.js";import{B as f}from"./BreadcrumbItem-B0y3gksR.js";import{_ as m,a as g,b as n}from"./TextInput-vw_gM44n.js";import{P as B}from"./PrimaryButton-D_Kub3Ai.js";import{_ as C}from"./SecondaryButton-VX66tXRy.js";import{T as S,Z as $,i as _}from"./@inertiajs-z7GmGqK5.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const N={class:"py-4"},q={class:"mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"},D={class:"p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"},T={class:"flex justify-between"},U=t("div",null,[t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Station Information "),t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Create new station. ")],-1),F=["value"],I={class:"flex items-center gap-4"},pe={__name:"Create",setup(M){const o=S({name:"",type:"",description:""}),y=["product","team building"],x=()=>{window.history.back()};return(d,a)=>(p(),u(c,null,[e(s($),{title:"Create Station"}),e(V,null,{breadcrumb:i(()=>[e(f,null,{default:i(()=>[e(s(_),{href:d.route("stations.index"),class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:i(()=>[l(" Stations ")]),_:1},8,["href"])]),_:1}),e(f,null,{default:i(()=>[e(s(_),{href:"#",class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:i(()=>[l(" Create ")]),_:1})]),_:1})]),default:i(()=>[t("div",N,[t("div",q,[t("div",D,[t("section",null,[t("header",T,[U,e(C,{class:"px-4 my-2 me-2",onClick:x},{default:i(()=>[l(" Back ")]),_:1})]),t("form",{onSubmit:a[3]||(a[3]=b(r=>s(o).post(d.route("stations.store")),["prevent"])),class:"mt-6 space-y-6"},[t("div",null,[e(m,{for:"name",value:"Name"}),e(g,{id:"name",type:"text",class:"block w-full mt-1",modelValue:s(o).name,"onUpdate:modelValue":a[0]||(a[0]=r=>s(o).name=r),required:"",autofocus:""},null,8,["modelValue"]),e(n,{class:"mt-2",message:s(o).errors.name},null,8,["message"])]),t("div",null,[e(m,{for:"type",value:"Type"}),v(t("select",{required:"","onUpdate:modelValue":a[1]||(a[1]=r=>s(o).type=r),class:"block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"},[(p(),u(c,null,h(y,r=>t("option",{value:r},w(r),9,F)),64))],512),[[k,s(o).type]]),e(n,{message:s(o).errors.type,class:"mt-2"},null,8,["message"])]),t("div",null,[e(m,{for:"description",value:"Description (optional)"}),e(g,{id:"description",type:"text",class:"block w-full mt-1",modelValue:s(o).description,"onUpdate:modelValue":a[2]||(a[2]=r=>s(o).description=r)},null,8,["modelValue"]),e(n,{class:"mt-2",message:s(o).errors.description},null,8,["message"])]),t("div",I,[e(B,{disabled:s(o).processing},{default:i(()=>[l("Save")]),_:1},8,["disabled"])])],32)])])])])]),_:1})],64))}};export{pe as default};
