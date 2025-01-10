import{f as g,g as h,p as o,l as s,u as e,z as k,A as v,k as u,v as b,F as x,E as y,q as p}from"./@vue-ioZSKZPS.js";import{a as n,b as l,_ as d}from"./TextInput-Dtkq3uY1.js";import{P as f}from"./PrimaryButton-Sc2Na1gZ.js";import{T as w,i as _}from"./@inertiajs-bduIXNZ8.js";import{S as V}from"./qrcode-vue3-eOzeECfp.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const C=o("header",null,[o("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Session Information "),o("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Edit existing session. ")],-1),N={class:"flex items-center mt-4"},D=o("label",{for:"isCheckpoint",class:"ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"}," Is Checkpoint ",-1),S={class:"flex items-center justify-between gap-4"},q={id:"qr-modal",tabindex:"-1","aria-hidden":"true",class:"hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"},B={class:"relative w-full max-w-md max-h-full p-4"},j={class:"relative bg-white rounded-lg shadow dark:bg-gray-700"},O=y('<div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600"><h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Session QR Code </h3><button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="qr-modal"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path></svg><span class="sr-only">Close modal</span></button></div>',1),U={class:"p-4 md:p-5"},E={class:"flex items-center justify-center gap-4 p-4 md:p-5"},re={__name:"Details",props:{session:Object},setup(m){const i=m,t=w({name:i.session.name,description:i.session.description,start_at:i.session.start_at,end_at:i.session.end_at,isCheckpoint:i.session.isCheckpoint,checkpointNo:i.session.checkpointNo});return(c,a)=>(g(),h(x,null,[C,o("form",{onSubmit:a[6]||(a[6]=b(r=>e(t).patch(c.route("sessions.update",m.session)),["prevent"])),class:"mt-6 space-y-6"},[o("div",null,[s(d,{for:"name",value:"Name"}),s(n,{id:"name",type:"text",class:"block w-full mt-1",modelValue:e(t).name,"onUpdate:modelValue":a[0]||(a[0]=r=>e(t).name=r),required:"",autofocus:""},null,8,["modelValue"]),s(l,{class:"mt-2",message:e(t).errors.name},null,8,["message"])]),o("div",null,[s(d,{for:"description",value:"Description"}),s(n,{id:"description",type:"text",class:"block w-full mt-1",modelValue:e(t).description,"onUpdate:modelValue":a[1]||(a[1]=r=>e(t).description=r)},null,8,["modelValue"]),s(l,{class:"mt-2",message:e(t).errors.description},null,8,["message"])]),o("div",null,[s(d,{for:"start_at",value:"Start Date"}),s(n,{id:"start_at",type:"datetime-local",class:"block w-full mt-1",modelValue:e(t).start_at,"onUpdate:modelValue":a[2]||(a[2]=r=>e(t).start_at=r)},null,8,["modelValue"]),s(l,{class:"mt-2",message:e(t).errors.start_at},null,8,["message"])]),o("div",null,[s(d,{for:"end_at",value:"End Date"}),s(n,{id:"end_at",type:"datetime-local",class:"block w-full mt-1",modelValue:e(t).end_at,"onUpdate:modelValue":a[3]||(a[3]=r=>e(t).end_at=r)},null,8,["modelValue"]),s(l,{class:"mt-2",message:e(t).errors.end_at},null,8,["message"])]),o("div",null,[o("div",N,[k(o("input",{id:"isCheckpoint",type:"checkbox",class:"w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500","onUpdate:modelValue":a[4]||(a[4]=r=>e(t).isCheckpoint=r)},null,512),[[v,e(t).isCheckpoint]]),D]),s(l,{class:"mt-2",message:e(t).errors.isCheckpoint},null,8,["message"])]),o("div",null,[s(d,{for:"checkpointNo",value:"Checkpoint Number"}),s(n,{id:"checkpointNo",type:"number",class:"block w-full mt-1",modelValue:e(t).checkpointNo,"onUpdate:modelValue":a[5]||(a[5]=r=>e(t).checkpointNo=r)},null,8,["modelValue"]),s(l,{class:"mt-2",message:e(t).errors.checkpointNo},null,8,["message"])]),o("div",S,[s(f,{disabled:e(t).processing},{default:u(()=>[p(" Save ")]),_:1},8,["disabled"]),s(f,{disabled:e(t).processing,type:"button","data-modal-target":"qr-modal","data-modal-toggle":"qr-modal"},{default:u(()=>[p(" QR Code ")]),_:1},8,["disabled"])])],32),o("div",q,[o("div",B,[o("div",j,[O,o("div",U,[s(e(V),{width:1e3,height:1e3,value:c.route("checkins.store",m.session.uuid),qrOptions:{typeNumber:0,mode:"Byte",errorCorrectionLevel:"H"},image:"/images/Wording-02.png",imageOptions:{hideBackgroundDots:!0,imageSize:.4,margin:0},dotsOptions:{type:"rounded",color:"#2362DD",gradient:{type:"linear",rotation:90,colorStops:[{offset:0,color:"#99B6FF"},{offset:1,color:"#2362DD"}]}},backgroundOptions:{color:"#ffffff"},cornersSquareOptions:{type:"extra-rounded",color:"#2362DD"},cornersDotOptions:{type:"dot",color:"#180092"}},null,8,["value"])]),o("div",E,[s(e(_),{href:c.route("checkins.store",m.session.uuid)},{default:u(()=>[s(f,{"data-modal-hide":"qr-modal"},{default:u(()=>[p(" Link ")]),_:1})]),_:1},8,["href"])])])])])],64))}};export{re as default};
