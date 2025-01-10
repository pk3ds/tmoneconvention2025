import{_ as m}from"./AuthenticatedLayout--0mUGdwF.js";import{B as l}from"./BreadcrumbItem-B0y3gksR.js";import{_ as u}from"./SecondaryButton-VX66tXRy.js";import _ from"./Details-NU-Sn4PA.js";import b from"./Options-WjKzXgAV.js";import{_ as f}from"./ActivityLog-FZdAs2aS.js";import{T as g,Z as h,i as d}from"./@inertiajs-z7GmGqK5.js";import{f as x,g as y,l as e,u as a,k as s,F as q,q as n,p as o,x as v}from"./@vue-3a91xcaC.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./TextInput-vw_gM44n.js";import"./PrimaryButton-D_Kub3Ai.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const k={class:"py-4"},w={class:"mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"},B={class:"p-4 bg-white shadow sm:p-8 sm:rounded-lg"},j={class:"text-xl font-semibold leading-6 text-gray-900"},$={class:"flex justify-between mb-4 border-b border-gray-200"},E=o("ul",{class:"flex flex-wrap -mb-px text-sm font-medium text-center",id:"default-tab","data-tabs-toggle":"#default-tab-content",role:"tablist"},[o("li",{class:"me-2",role:"presentation"},[o("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg",id:"details-tab","data-tabs-target":"#details",type:"button",role:"tab","aria-controls":"details","aria-selected":"false"}," details ")]),o("li",{class:"me-2",role:"presentation"},[o("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"options-tab","data-tabs-target":"#options",type:"button",role:"tab","aria-controls":"options","aria-selected":"false"}," options ")]),o("li",{role:"presentation"},[o("button",{class:"inline-block p-4 capitalize border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300",id:"logs-tab","data-tabs-target":"#logs",type:"button",role:"tab","aria-controls":"logs","aria-selected":"false"}," logs ")])],-1),N={id:"default-tab-content"},O={class:"hidden p-4 rounded-lg",id:"details",role:"tabpanel","aria-labelledby":"details-tab"},z={class:"hidden p-4 rounded-lg",id:"options",role:"tabpanel","aria-labelledby":"options-tab"},V={class:"hidden p-4 rounded-lg",id:"logs",role:"tabpanel","aria-labelledby":"logs-tab"},pt={__name:"Edit",props:{station_id:Number,stations:Object,types:Object,question:Object,activities:Object},setup(i){const t=i,r=g({station_id:t.station_id??t.question.station_id,name:t.question.name,question_type_id:t.question.question_type_id,option_one_id:t.question.options[0].id,option_one:t.question.options[0].name,option_one_correct:t.question.options[0].is_correct,option_two_id:t.question.options[1].id,option_two:t.question.options[1].name,option_two_correct:t.question.options[1].is_correct,option_three_id:t.question.options[2].id,option_three:t.question.options[2].name,option_three_correct:t.question.options[2].is_correct,option_four_id:t.question.options[3].id,option_four:t.question.options[3].name,option_four_correct:t.question.options[3].is_correct}),c=()=>{window.history.back()};return(p,C)=>(x(),y(q,null,[e(a(h),{title:"Edit Question"}),e(m,null,{breadcrumb:s(()=>[e(l,null,{default:s(()=>[e(a(d),{href:p.route("questions.index"),class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:s(()=>[n(" Questions ")]),_:1},8,["href"])]),_:1}),e(l,null,{default:s(()=>[e(a(d),{href:"#",class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:s(()=>[n(" Edit ")]),_:1})]),_:1})]),default:s(()=>[o("div",k,[o("div",w,[o("div",B,[o("h1",j,v(i.question.name),1),o("div",$,[E,e(u,{class:"px-4 my-2 me-2",onClick:c},{default:s(()=>[n(" Back ")]),_:1})]),o("div",N,[o("div",O,[e(_,{form:a(r),station_id:i.station_id,stations:i.stations,types:i.types,question:i.question},null,8,["form","station_id","stations","types","question"])]),o("div",z,[e(b,{form:a(r),question:i.question},null,8,["form","question"])]),o("div",V,[e(f,{activities:i.activities},null,8,["activities"])])])])])])]),_:1})],64))}};export{pt as default};
