import{_ as m}from"./AuthenticatedLayout--0mUGdwF.js";import{B as r}from"./BreadcrumbItem-B0y3gksR.js";import{_ as c}from"./SecondaryButton-VX66tXRy.js";import u from"./Details-9S8RhCpR.js";import b from"./Questions-VoxjKb5b.js";import{Z as p,i as l}from"./@inertiajs-z7GmGqK5.js";import{_ as f}from"./ActivityLog-FZdAs2aS.js";import{f as _,g,l as e,u as s,k as a,F as h,q as o,p as t,x}from"./@vue-3a91xcaC.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./TextInput-vw_gM44n.js";import"./PrimaryButton-D_Kub3Ai.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const q={class:"py-4"},y={class:"mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"},v={class:"p-4 bg-white shadow sm:p-8 sm:rounded-lg"},z={class:"text-xl font-semibold leading-6 text-gray-900"},k={class:"flex justify-between mb-4 border-b border-gray-200"},w=t("ul",{class:"flex flex-wrap -mb-px text-sm font-medium text-center",id:"default-tab","data-tabs-toggle":"#default-tab-content",role:"tablist"},[t("li",{class:"me-2",role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg",id:"details-tab","data-tabs-target":"#details",type:"button",role:"tab","aria-controls":"details","aria-selected":"false"}," details ")]),t("li",{class:"me-2",role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"questions-tab","data-tabs-target":"#questions",type:"button",role:"tab","aria-controls":"questions","aria-selected":"false"}," questions ")]),t("li",{role:"presentation"},[t("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"logs-tab","data-tabs-target":"#logs",type:"button",role:"tab","aria-controls":"logs","aria-selected":"false"}," logs ")])],-1),B={id:"default-tab-content"},j={class:"hidden p-4 rounded-lg",id:"details",role:"tabpanel","aria-labelledby":"details-tab"},$={class:"hidden p-4 rounded-lg",id:"questions",role:"tabpanel","aria-labelledby":"questions-tab"},E={class:"hidden p-4 rounded-lg",id:"logs",role:"tabpanel","aria-labelledby":"logs-tab"},dt={__name:"Edit",props:{quiz:Object,station_id:Number,stations:Object,questions:Object,activities:Object},setup(i){const d=()=>{window.history.back()};return(n,N)=>(_(),g(h,null,[e(s(p),{title:"Edit Quiz"}),e(m,null,{breadcrumb:a(()=>[e(r,null,{default:a(()=>[e(s(l),{href:n.route("quizzes.index"),class:"ml-4 text-sm font-medium"},{default:a(()=>[o(" Quizzes ")]),_:1},8,["href"])]),_:1}),e(r,null,{default:a(()=>[e(s(l),{href:"#",class:"ml-4 text-sm font-medium"},{default:a(()=>[o(" Edit ")]),_:1})]),_:1})]),default:a(()=>[t("div",q,[t("div",y,[t("div",v,[t("h1",z,x(i.quiz.name),1),t("div",k,[w,e(c,{class:"px-4 my-2 me-2",onClick:d},{default:a(()=>[o(" Back ")]),_:1})]),t("div",B,[t("div",j,[e(u,{quiz:i.quiz,stations:i.stations},null,8,["quiz","stations"])]),t("div",$,[e(b,{quiz:i.quiz,questions:i.questions},null,8,["quiz","questions"])]),t("div",E,[e(f,{activities:i.activities},null,8,["activities"])])])])])])]),_:1})],64))}};export{dt as default};
