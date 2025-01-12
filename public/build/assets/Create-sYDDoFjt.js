import{r as c,f as p,j as h,k as v,p as e,v as V,l as s,z as _,D as w,g as f,C as x,x as q,B as k,F as $,q as C}from"./@vue-ioZSKZPS.js";import{O as T}from"./@inertiajs-bduIXNZ8.js";import{_ as U}from"./AuthenticatedLayout-CjvYm6R6.js";import{P as Q}from"./PrimaryButton-Sc2Na1gZ.js";import{_ as r,a as u,b as n}from"./TextInput-Dtkq3uY1.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";const S={class:"py-12"},B={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},j={class:"bg-white shadow-sm sm:rounded-lg"},D={class:"p-6"},N=e("h2",{class:"text-2xl font-bold mb-6"}," Create New Survey ",-1),E={class:"space-y-4"},F={class:"grid grid-cols-2 gap-4"},M={class:"space-y-6"},R=e("h3",{class:"text-lg font-medium"}," Questions ",-1),O={class:"flex justify-between items-start"},P={class:"font-medium"},z=["onClick","disabled"],A={class:"space-y-4"},L=["id","onUpdate:modelValue"],G=e("option",{value:"rating"}," Rating (1-5) ",-1),H=e("option",{value:"text"}," Text Response ",-1),I=[G,H],J={class:"flex justify-end"},we={__name:"Create",setup(K){const t=c({title:"",description:"",start_time:"",end_time:"",questions:[{question:"",type:"rating",order:1}]}),m=c(!1),g=()=>{t.value.questions.push({question:"",type:"rating",order:t.value.questions.length+1})},b=a=>{t.value.questions.splice(a,1),t.value.questions.forEach((l,o)=>{l.order=o+1})},y=()=>{m.value=!0,T.post(route("surveys.store"),t.value,{onFinish:()=>m.value=!1})};return(a,l)=>(p(),h(U,null,{default:v(()=>[e("div",S,[e("div",B,[e("div",j,[e("div",D,[N,e("form",{onSubmit:V(y,["prevent"]),class:"space-y-6"},[e("div",E,[e("div",null,[s(r,{for:"title",value:"Survey Title"}),s(u,{id:"title",type:"text",modelValue:t.value.title,"onUpdate:modelValue":l[0]||(l[0]=o=>t.value.title=o),class:"mt-1 block w-full",required:""},null,8,["modelValue"]),s(n,{message:a.$page.props.errors.title,class:"mt-2"},null,8,["message"])]),e("div",null,[s(r,{for:"description",value:"Description"}),_(e("textarea",{id:"description","onUpdate:modelValue":l[1]||(l[1]=o=>t.value.description=o),class:"mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500",rows:"3"},null,512),[[w,t.value.description]]),s(n,{message:a.$page.props.errors.description,class:"mt-2"},null,8,["message"])]),e("div",F,[e("div",null,[s(r,{for:"start_time",value:"Start Time"}),s(u,{id:"start_time",type:"datetime-local",modelValue:t.value.start_time,"onUpdate:modelValue":l[2]||(l[2]=o=>t.value.start_time=o),class:"mt-1 block w-full",required:""},null,8,["modelValue"]),s(n,{message:a.$page.props.errors.start_time,class:"mt-2"},null,8,["message"])]),e("div",null,[s(r,{for:"end_time",value:"End Time"}),s(u,{id:"end_time",type:"datetime-local",modelValue:t.value.end_time,"onUpdate:modelValue":l[3]||(l[3]=o=>t.value.end_time=o),class:"mt-1 block w-full",required:""},null,8,["modelValue"]),s(n,{message:a.$page.props.errors.end_time,class:"mt-2"},null,8,["message"])])])]),e("div",M,[e("div",{class:"flex justify-between items-center"},[R,e("button",{type:"button",onClick:g,class:"text-sm bg-gray-100 px-3 py-2 rounded-md hover:bg-gray-200"}," Add Question ")]),(p(!0),f($,null,x(t.value.questions,(o,i)=>(p(),f("div",{key:i,class:"p-4 border rounded-lg space-y-4"},[e("div",O,[e("h4",P," Question "+q(i+1),1),e("button",{type:"button",onClick:d=>b(i),class:"text-red-600 hover:text-red-800",disabled:t.value.questions.length===1}," Remove ",8,z)]),e("div",A,[e("div",null,[s(r,{for:"question-"+i,value:"Question Text"},null,8,["for"]),s(u,{id:"question-"+i,type:"text",modelValue:o.question,"onUpdate:modelValue":d=>o.question=d,class:"mt-1 block w-full",required:""},null,8,["id","modelValue","onUpdate:modelValue"])]),e("div",null,[s(r,{for:"type-"+i,value:"Question Type"},null,8,["for"]),_(e("select",{id:"type-"+i,"onUpdate:modelValue":d=>o.type=d,class:"mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500",required:""},I,8,L),[[k,o.type]])])])]))),128))]),e("div",J,[s(Q,{disabled:m.value},{default:v(()=>[C(" Create Survey ")]),_:1},8,["disabled"])])],32)])])])])]),_:1}))}};export{we as default};
