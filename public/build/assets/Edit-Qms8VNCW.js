import{_ as m}from"./AuthenticatedLayout--0mUGdwF.js";import{B as r}from"./BreadcrumbItem-B0y3gksR.js";import{_ as c}from"./SecondaryButton-VX66tXRy.js";import p from"./Details-Ry5ghGLF.js";import b from"./Users-r8uaYaYx.js";import{_ as u}from"./ActivityLog-FZdAs2aS.js";import{Z as f,i as l}from"./@inertiajs-z7GmGqK5.js";import{f as _,g,l as e,u as o,k as s,F as h,q as i,p as t,x}from"./@vue-3a91xcaC.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./TextInput-vw_gM44n.js";import"./PrimaryButton-D_Kub3Ai.js";import"./qrcode-vue3-eOzeECfp.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const y={class:"py-4"},v={class:"mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"},k={class:"p-4 bg-white shadow sm:p-8 sm:rounded-lg"},w={class:"text-xl font-semibold leading-6 text-gray-900"},B={class:"flex justify-between mb-4 border-b border-gray-200"},$=t("ul",{class:"flex flex-wrap -mb-px text-sm font-medium text-center",id:"default-tab","data-tabs-toggle":"#default-tab-content",role:"tablist"},[t("li",{class:"me-2",role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg",id:"details-tab","data-tabs-target":"#details",type:"button",role:"tab","aria-controls":"details","aria-selected":"false"}," details ")]),t("li",{class:"me-2",role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"users-tab","data-tabs-target":"#users",type:"button",role:"tab","aria-controls":"users","aria-selected":"false"}," users ")]),t("li",{role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"logs-tab","data-tabs-target":"#logs",type:"button",role:"tab","aria-controls":"logs","aria-selected":"false"}," logs ")])],-1),E={id:"default-tab-content"},j={class:"hidden p-4 rounded-lg",id:"details",role:"tabpanel","aria-labelledby":"details-tab"},z={class:"hidden p-4 rounded-lg",id:"users",role:"tabpanel","aria-labelledby":"users-tab"},N={class:"hidden p-4 rounded-lg",id:"logs",role:"tabpanel","aria-labelledby":"logs-tab"},nt={__name:"Edit",props:{session:Object,activities:Object},setup(a){const d=()=>{window.history.back()};return(n,S)=>(_(),g(h,null,[e(o(f),{title:"Edit Session"}),e(m,null,{breadcrumb:s(()=>[e(r,null,{default:s(()=>[e(o(l),{href:n.route("sessions.index"),class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:s(()=>[i(" Sessions ")]),_:1},8,["href"])]),_:1}),e(r,null,{default:s(()=>[e(o(l),{href:"#",class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:s(()=>[i(" Edit ")]),_:1})]),_:1})]),default:s(()=>[t("div",y,[t("div",v,[t("div",k,[t("h1",w,x(a.session.name),1),t("div",B,[$,e(c,{class:"px-4 my-2 me-2",onClick:d},{default:s(()=>[i(" Back ")]),_:1})]),t("div",E,[t("div",j,[e(p,{session:a.session},null,8,["session"])]),t("div",z,[e(b,{session:a.session},null,8,["session"])]),t("div",N,[e(u,{activities:a.activities},null,8,["activities"])])])])])])]),_:1})],64))}};export{nt as default};
