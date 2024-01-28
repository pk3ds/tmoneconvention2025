import{f as s,g as o,Y as l,bd as n,bx as c,F as h,X as u,N as t,bC as g,bz as f,bp as b,b4 as a,aR as y,M as w}from"./@vue-vmfQIgrK.js";import{_ as v}from"./AuthenticatedLayout-qzvqrgAt.js";import{B as k}from"./BreadcrumbItem-kNqApY2O.js";import{T as V,Z as M,i as N,O as B}from"./@inertiajs-ju8D2hAz.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const S={class:"py-4"},z={class:"mx-auto max-w-7xl sm:px-6 lg:px-8"},C=t("label",{for:"default-search",class:"mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"},"Search",-1),P={class:"relative"},E=t("div",{class:"absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3"},[t("svg",{class:"w-4 h-4 text-gray-500 dark:text-gray-400","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 20 20"},[t("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"})])],-1),H=t("button",{class:"text-white font-semibold absolute end-2.5 bottom-2.5 bg-cobalt-blue font-title hover:bg-ultramarine focus:ring-4 focus:outline-none focus:ring-blue-300 tracking-widest rounded-md text-xs uppercase px-4 py-2"}," Search ",-1),O={class:"overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg"},R={class:"p-6 text-gray-900 dark:text-gray-100"},T={class:"px-4 sm:px-6 lg:px-8"},j={class:"sm:flex sm:items-center"},A={class:"sm:flex-auto"},D={class:"text-base font-semibold leading-6 text-gray-900"},F=t("p",{class:"mt-2 text-sm text-gray-700"}," A list of your team members including their name, phone number and points. ",-1),I=t("div",{class:"mt-4 sm:ml-16 sm:mt-0 sm:flex-none"},null,-1),L={class:"mt-8 -mx-4 sm:-mx-0"},Z={key:0,class:"text-base leading-6 text-gray-900"},$={key:1,class:"min-w-full divide-y divide-gray-300"},U=t("thead",null,[t("tr",null,[t("th",{scope:"col",class:"py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"}," Name "),t("th",{scope:"col",class:"hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"}," Phone No "),t("th",{scope:"col",class:"px-3 py-3.5 text-left text-sm font-semibold text-gray-900"}," Points "),t("th",{scope:"col",class:"relative py-3.5 pl-3 pr-4 sm:pr-0"},[t("span",{class:"sr-only"},"Edit")])])],-1),W={class:"bg-white divide-y divide-gray-200"},X={class:"w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"},Y={class:"flex gap-2"},q={key:0,class:"w-3.5 text-gray-400",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 448 512",fill:"currentColor"},G=t("path",{d:"M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"},null,-1),J=[G],K={class:"font-normal lg:hidden"},Q=t("dt",{class:"sr-only sm:hidden"}," Phone No ",-1),tt={class:"mt-1 text-gray-500 truncate sm:hidden"},et={class:"hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"},st={class:"px-3 py-4 text-sm text-gray-500 capitalize"},zt={__name:"Index",props:{search:String,users:Object},setup(d){const m=V({search:d.search??null}),x=()=>{B.get(route("members.index",{search:m.search}))},_=(i,r)=>i.points>r.points?-1:i.points<r.points?1:0;return(i,r)=>(s(),o(h,null,[l(n(M),{title:"Members"}),l(v,null,{breadcrumb:c(()=>[l(k,null,{default:c(()=>[l(n(N),{href:"#",class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:c(()=>[u(" Members ")]),_:1})]),_:1})]),default:c(()=>{var p;return[t("div",S,[t("div",z,[t("form",{class:"mb-6",onSubmit:g(x,["prevent"])},[C,t("div",P,[E,f(t("input",{type:"search",id:"default-search","onUpdate:modelValue":r[0]||(r[0]=e=>n(m).search=e),class:"block w-full p-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-none sm:rounded-lg ps-10 focus:ring-blue-500 focus:border-blue-500",placeholder:"Search members..."},null,512),[[b,n(m).search]]),H])],32),t("div",O,[t("div",R,[t("div",T,[t("div",j,[t("div",A,[t("h1",D,a((p=i.$page.props.auth.user.group)==null?void 0:p.name)+" PWRMEMBERS ",1),F]),I]),t("div",L,[d.users.length<=0?(s(),o("h1",Z," No users to display ")):(s(),o("table",$,[U,t("tbody",W,[(s(!0),o(h,null,y(d.users.sort(_),e=>(s(),o("tr",null,[t("td",X,[t("span",Y,[u(a(e.name)+" ",1),e.deleted_at?(s(),o("svg",q,J)):w("",!0)]),t("dl",K,[Q,t("dd",tt,a(e.phone_no),1)])]),t("td",et,a(e.phone_no),1),t("td",st,a(e.points),1)]))),256))])]))])])])])])])]}),_:1})],64))}};export{zt as default};
