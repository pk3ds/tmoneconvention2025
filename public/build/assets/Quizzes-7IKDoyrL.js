import{P as n}from"./PrimaryButton-hlC71LOP.js";import{i as d}from"./@inertiajs-ju8D2hAz.js";import{f as e,g as s,N as t,Y as l,bx as a,bd as p,F as x,aR as _,X as h,b4 as u,L as f,M as y}from"./@vue-vmfQIgrK.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const g={class:"sm:flex sm:items-center"},z=t("div",{class:"sm:flex-auto"},[t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Quizzes Information "),t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," View station quizzes collection. ")],-1),w={class:"mt-4 sm:ml-16 sm:mt-0 sm:flex-none"},v={class:"mt-8 -mx-4 sm:-mx-0"},b={key:0,class:"text-base leading-6 text-gray-900"},k={key:1,class:"min-w-full divide-y divide-gray-300"},V=t("thead",null,[t("tr",null,[t("th",{scope:"col",class:"py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"}," Name "),t("th",{scope:"col",class:"px-3 py-3.5 text-left text-sm font-semibold text-gray-900"}," Options "),t("th",{scope:"col",class:"relative py-3.5 pl-3 pr-4 sm:pr-0"},[t("span",{class:"sr-only"},"Edit")])])],-1),N={class:"bg-white divide-y divide-gray-200"},B={class:"w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"},L={class:"flex gap-2"},q=t("dl",{class:"font-normal lg:hidden"},null,-1),C={class:"px-3 py-4 text-sm text-gray-500 capitalize"},H={class:"px-3 py-4 text-sm text-gray-500 capitalize"},M={class:"flex flex-col justify-end gap-4 gap-y-2 md:flex-row"},j=t("svg",{class:"w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512 512",fill:"currentColor"},[t("path",{d:"M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"})],-1),ot={__name:"Quizzes",props:{station:Object},setup(i){return(r,E)=>{var c;return e(),s(x,null,[t("header",null,[t("div",g,[z,t("div",w,[l(p(d),{href:r.route("quizzes.create")},{default:a(()=>[l(n,null,{default:a(()=>[h(" Add quiz ")]),_:1})]),_:1},8,["href"])])])]),t("div",v,[((c=i.station.quizzes)==null?void 0:c.length)<=0?(e(),s("h1",b," No quizzes to display ")):(e(),s("table",k,[V,t("tbody",N,[(e(!0),s(x,null,_(i.station.quizzes,o=>{var m;return e(),s("tr",null,[t("td",B,[t("span",L,u(o.name),1),q]),t("td",C,u((m=o.options)==null?void 0:m.length),1),t("td",H,[t("div",M,[o.deleted_at?y("",!0):(e(),f(p(d),{key:0,href:r.route("quizzes.edit",o)},{default:a(()=>[l(n,null,{default:a(()=>[j]),_:1})]),_:2},1032,["href"]))])])])}),256))])]))])],64)}}};export{ot as default};
