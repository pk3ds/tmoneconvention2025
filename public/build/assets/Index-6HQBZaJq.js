import{i as n,Z as f}from"./@inertiajs-ssfLaM5f.js";import{i as h}from"./flowbite-0yPYSvbH.js";import{o as b,r as _,f as t,g as m,p as e,u as r,y as g,j as i,k as o,q as l,z as p,t as x,I as v,R as y,l as d,F as w}from"./@vue-r-HUGdoc.js";import k from"./Agenda-lln7vNww.js";import C from"./Hero-eQJ28z_0.js";import $ from"./Attire-JsiFW3H_.js";import M from"./Leaderboard-vO-NJHg6.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";const j={class:"min-h-screen"},B={class:"flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"},L={class:"flex items-center space-x-3 rtl:space-x-reverse"},O={key:0,src:"/images/Logo-Wording-Color.png",class:"h-8",alt:"TM One"},N={key:1,src:"/images/Logo-Wording-Color.png",class:"h-8",alt:"TM One"},D={class:"flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse"},T=e("button",{"data-collapse-toggle":"navbar-sticky",type:"button",class:"inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200","aria-controls":"navbar-sticky","aria-expanded":"false"},[e("span",{class:"sr-only"},"Open main menu"),e("svg",{class:"w-5 h-5","aria-hidden":"true",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 17 14"},[e("path",{stroke:"currentColor","stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M1 1h15M1 7h15M1 13h15"})])],-1),V={class:"items-center justify-between hidden w-full md:flex md:w-auto md:order-1",id:"navbar-sticky"},z={class:"flex flex-col p-4 mt-4 font-medium uppercase border border-gray-100 rounded-lg font-title text-cobalt-blue md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent"},A={__name:"SiteLayout",setup(u){b(()=>{h()});let s=_(!1);return document.addEventListener("scroll",function(){document.body.getBoundingClientRect().top<-50?s.value=!0:s.value=!1}),(a,P)=>{const c=y("smooth-scroll");return t(),m("div",j,[e("nav",{class:x(["fixed top-0 z-20 w-full start-0",{"bg-white transition duration-300 ease-in border-b border-gray-300":r(s)}])},[e("div",B,[e("span",L,[r(s)?(t(),m("img",O)):g("",!0),r(s)?g("",!0):(t(),m("img",N))]),e("div",D,[a.$page.props.auth.user?(t(),i(r(n),{key:0,href:a.route("dashboard"),type:"button",class:"flex px-4 py-3 text-sm font-medium text-center text-white uppercase font-title bg-accent-orange hover:bg-cobalt-blue focus:ring-4 focus:outline-none focus:ring-blue-300"},{default:o(()=>[l(" Dashboard ")]),_:1},8,["href"])):(t(),i(r(n),{key:1,href:a.route("login"),type:"button",class:"flex px-4 py-3 text-sm font-medium text-center text-white uppercase font-title bg-accent-orange hover:bg-cobalt-blue focus:ring-4 focus:outline-none focus:ring-blue-300"},{default:o(()=>[l(" Login ")]),_:1},8,["href"])),T]),e("div",V,[e("ul",z,[e("li",null,[p((t(),i(r(n),{href:"#main",class:"block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"},{default:o(()=>[l("Main")]),_:1})),[[c]])]),e("li",null,[p((t(),i(r(n),{href:"#agenda",class:"block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"},{default:o(()=>[l("Agenda")]),_:1})),[[c]])]),e("li",null,[p((t(),i(r(n),{href:"#dress-code",class:"block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"},{default:o(()=>[l("Dress Code")]),_:1})),[[c]])]),e("li",null,[p((t(),i(r(n),{href:"#pwrteam",class:"block px-3 py-2 rounded md:bg-transparent hover:bg-gray-100 md:hover:bg-transparent hover:text-accent-orange md:p-0"},{default:o(()=>[l("Leaderboard")]),_:1})),[[c]])])])])])],2),e("div",null,[v(a.$slots,"default")])])}}},F={class:"overflow-hidden isolate pt-14",id:"main"},W={class:"",id:"agenda"},E={class:"py-12",id:"dress-code"},I={class:"py-12",id:"pwrteam"},fe={__name:"Index",props:{leaderboards:Object,groups:Object},setup(u){return(s,a)=>(t(),m(w,null,[d(r(f),{title:"TM One Convention 2025"}),d(A,null,{default:o(()=>[e("div",F,[d(C)]),e("div",W,[d(k)]),e("div",E,[d($)]),e("div",I,[d(M,{leaderboards:u.leaderboards,groups:u.groups},null,8,["leaderboards","groups"])])]),_:1})],64))}};export{fe as default};
