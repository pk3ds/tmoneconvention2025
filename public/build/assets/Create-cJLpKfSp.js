import{P as l}from"./PrimaryButton-hlC71LOP.js";import{_ as p}from"./GuestLayout-EfpfEJsI.js";import{Z as u,i as d,O as f}from"./@inertiajs-ju8D2hAz.js";import{i as h}from"./flowbite-0yPYSvbH.js";import{o as g,f as _,g as x,Y as e,bd as n,bx as s,F as w,N as t,b4 as i,X as r}from"./@vue-vmfQIgrK.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";import"./@popperjs-zyV4rJhQ.js";const v={class:"max-w-sm p-6"},y={class:"flex items-center justify-start gap-3"},b=t("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 384 512",class:"mb-3 text-accent-orange w-7 h-7",fill:"currentColor"},[t("path",{d:"M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"})],-1),k={class:"mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"},C={class:"flex items-center justify-center gap-4 my-4"},V=t("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 576 512",class:"w-10 h-10",fill:"currentColor"},[t("path",{d:"M256 0h64c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H256c-17.7 0-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM64 64H192v48c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64zM176 437.3c0 5.9 4.8 10.7 10.7 10.7H389.3c5.9 0 10.7-4.8 10.7-10.7c0-29.5-23.9-53.3-53.3-53.3H229.3c-29.5 0-53.3 23.9-53.3 53.3zM288 352a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"})],-1),B={class:"font-medium"},M={class:"text-gray-500 dark:text-gray-400"},z=t("p",{class:"mb-6 text-sm font-normal text-gray-500"}," You made it! Before checking in, could you verify the information above? If there is anything wrong, we will gladly fix it for you. ",-1),H={class:"flex items-center justify-between"},N={class:"rounded-md text-cobalt-blue"},st={__name:"Create",props:{session:Object},setup(a){g(()=>{h()});const c=a,m=()=>{f.post(route("checkins.store",c.session.uuid))};return(o,j)=>(_(),x(w,null,[e(n(u),{title:"Check In"}),e(p,null,{default:s(()=>[t("div",v,[t("div",y,[b,t("h5",k,i(a.session.name),1)]),t("div",C,[V,t("div",B,[t("div",null,i(o.$page.props.auth.user.name),1),t("div",M,i(o.$page.props.auth.user.staff_id),1)])]),z,t("div",H,[e(l,{onClick:m},{default:s(()=>[r("Check In")]),_:1}),t("span",N,[r(" Not you? "),e(n(d),{href:o.route("logout"),method:"post",as:"button",class:"underline hover:text-ultramarine focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-light-blue"},{default:s(()=>[r(" Log Out")]),_:1},8,["href"])])])])]),_:1})],64))}};export{st as default};
