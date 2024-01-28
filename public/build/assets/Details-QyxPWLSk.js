import{f as d,g as p,N as o,Y as r,bd as e,bz as b,bo as y,F as u,aR as x,bx as v,bC as k,b4 as V,X as _}from"./@vue-vmfQIgrK.js";import{a as c,b as n,_ as l}from"./TextInput-zxpUzsZb.js";import{P as w}from"./PrimaryButton-hlC71LOP.js";import{T as N}from"./@inertiajs-ju8D2hAz.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const S=o("header",{class:"flex justify-between"},[o("div",null,[o("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Station Information "),o("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Edit existing station. ")])],-1),B=["value"],D={class:"flex items-center gap-4"},Q={__name:"Details",props:{station:Object},setup(m){const i=m,t=N({name:i.station.name,type:i.station.type,description:i.station.description}),f=["product","team building"];return(g,a)=>(d(),p(u,null,[S,o("form",{onSubmit:a[3]||(a[3]=k(s=>e(t).patch(g.route("stations.update",m.station)),["prevent"])),class:"mt-6 space-y-6"},[o("div",null,[r(l,{for:"name",value:"Name"}),r(c,{id:"name",type:"text",class:"block w-full mt-1",modelValue:e(t).name,"onUpdate:modelValue":a[0]||(a[0]=s=>e(t).name=s),required:"",autofocus:""},null,8,["modelValue"]),r(n,{class:"mt-2",message:e(t).errors.name},null,8,["message"])]),o("div",null,[r(l,{for:"type",value:"Type"}),b(o("select",{required:"","onUpdate:modelValue":a[1]||(a[1]=s=>e(t).type=s),class:"block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"},[(d(),p(u,null,x(f,s=>o("option",{value:s},V(s),9,B)),64))],512),[[y,e(t).type]]),r(n,{message:e(t).errors.type,class:"mt-2"},null,8,["message"])]),o("div",null,[r(l,{for:"description",value:"Description (optional)"}),r(c,{id:"description",type:"text",class:"block w-full mt-1",modelValue:e(t).description,"onUpdate:modelValue":a[2]||(a[2]=s=>e(t).description=s)},null,8,["modelValue"]),r(n,{class:"mt-2",message:e(t).errors.description},null,8,["message"])]),o("div",D,[r(w,{disabled:e(t).processing},{default:v(()=>[_("Save")]),_:1},8,["disabled"])])],32)],64))}};export{Q as default};
