import{f as n,g as u,Y as o,bd as e,bx as i,F as f,X as p,N as a,bC as U,bz as _,bo as b,aR as k,b4 as w,M as v}from"./@vue-vmfQIgrK.js";import{_ as h}from"./AuthenticatedLayout-FGKIiXsT.js";import{B as y}from"./BreadcrumbItem-kNqApY2O.js";import{_ as t,a as d,b as m}from"./TextInput-aHMkE20r.js";import{P as C}from"./PrimaryButton-hlC71LOP.js";import{_ as N}from"./SecondaryButton-6u1BOUWh.js";import{T as q,Z as B,i as x}from"./@inertiajs-ju8D2hAz.js";import"./flowbite-0yPYSvbH.js";import"./@popperjs-zyV4rJhQ.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./axios-mNEckKTA.js";import"./deepmerge-LjH1GvcH.js";import"./call-bind-C9g98eDj.js";import"./get-intrinsic-PI8GGpBQ.js";import"./has-symbols-fNtejGuA.js";import"./has-proto-dzJH2Y5C.js";import"./function-bind-HMk2skFd.js";import"./hasown-iNtpzeJm.js";import"./set-function-length-Q9qN-rEI.js";import"./define-data-property-0n4USnm6.js";import"./has-property-descriptors-CncpgOAI.js";import"./gopd-l1hRYync.js";import"./qs-NiufHlhl.js";import"./side-channel-DQESS8qD.js";import"./object-inspect-upD72wnW.js";import"./nprogress-eK4H2Raz.js";import"./lodash.clonedeep-ONeKF3hD.js";import"./lodash.isequal-8drsGctg.js";const P={class:"py-4"},$={class:"mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"},S={class:"p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg"},j={class:"flex justify-between"},D=a("div",null,[a("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," User Information "),a("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Create new user. ")],-1),I=["value"],M=["value"],R={key:0},E={key:1},F={class:"flex items-center gap-4"},ce={__name:"Create",props:{groups:Object,roles:Object},setup(c){const s=q({name:"",staff_id:"",phone_no:"",email:"",room_no:"",pickup_location:"",group_id:"",role:"",password:"",password_confirmation:""}),V=()=>{window.history.back()};return(g,r)=>(n(),u(f,null,[o(e(B),{title:"Create User"}),o(h,null,{breadcrumb:i(()=>[o(y,null,{default:i(()=>[o(e(x),{href:g.route("users.index"),class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:i(()=>[p(" Users ")]),_:1},8,["href"])]),_:1}),o(y,null,{default:i(()=>[o(e(x),{href:"#",class:"ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"},{default:i(()=>[p(" Create ")]),_:1})]),_:1})]),default:i(()=>[a("div",P,[a("div",$,[a("div",S,[a("section",null,[a("header",j,[D,o(N,{class:"px-4 my-2 me-2",onClick:V},{default:i(()=>[p(" Back ")]),_:1})]),a("form",{onSubmit:r[10]||(r[10]=U(l=>e(s).post(g.route("users.store")),["prevent"])),class:"mt-6 space-y-6"},[a("div",null,[o(t,{for:"name",value:"Name"}),o(d,{id:"name",type:"text",class:"block w-full mt-1",modelValue:e(s).name,"onUpdate:modelValue":r[0]||(r[0]=l=>e(s).name=l),required:"",autofocus:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.name},null,8,["message"])]),a("div",null,[o(t,{for:"staff_id",value:"Staff ID"}),o(d,{id:"staff_id",type:"text",class:"block w-full mt-1",modelValue:e(s).staff_id,"onUpdate:modelValue":r[1]||(r[1]=l=>e(s).staff_id=l),required:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.staff_id},null,8,["message"])]),a("div",null,[o(t,{for:"phone_no",value:"Phone No"}),o(d,{id:"phone_no",type:"text",class:"block w-full mt-1",modelValue:e(s).phone_no,"onUpdate:modelValue":r[2]||(r[2]=l=>e(s).phone_no=l),required:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.phone_no},null,8,["message"])]),a("div",null,[o(t,{for:"email",value:"Email"}),o(d,{id:"email",type:"email",class:"block w-full mt-1",modelValue:e(s).email,"onUpdate:modelValue":r[3]||(r[3]=l=>e(s).email=l),required:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),a("div",null,[o(t,{for:"room_no",value:"Room No (optional)"}),o(d,{id:"room_no",type:"text",class:"block w-full mt-1",modelValue:e(s).room_no,"onUpdate:modelValue":r[4]||(r[4]=l=>e(s).room_no=l)},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.room_no},null,8,["message"])]),a("div",null,[o(t,{for:"pickup_location",value:"Pickup Location (optional)"}),o(d,{id:"pickup_location",type:"text",class:"block w-full mt-1",modelValue:e(s).pickup_location,"onUpdate:modelValue":r[5]||(r[5]=l=>e(s).pickup_location=l)},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.pickup_location},null,8,["message"])]),a("div",null,[o(t,{for:"group_id",value:"Group (optional)"}),_(a("select",{"onUpdate:modelValue":r[6]||(r[6]=l=>e(s).group_id=l),class:"block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"},[(n(!0),u(f,null,k(c.groups,l=>(n(),u("option",{value:l.id},w(l.name),9,I))),256))],512),[[b,e(s).group_id]]),o(m,{message:e(s).errors.group_id,class:"mt-2"},null,8,["message"])]),a("div",null,[o(t,{for:"role",value:"Role"}),_(a("select",{required:"","onUpdate:modelValue":r[7]||(r[7]=l=>e(s).role=l),class:"block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"},[(n(!0),u(f,null,k(c.roles,l=>(n(),u("option",{value:l.name},w(l.name),9,M))),256))],512),[[b,e(s).role]]),o(m,{message:e(s).errors.role,class:"mt-2"},null,8,["message"])]),e(s).role!="user"?(n(),u("div",R,[o(t,{for:"password",value:"Password"}),o(d,{id:"password",type:"password",class:"block w-full mt-1",modelValue:e(s).password,"onUpdate:modelValue":r[8]||(r[8]=l=>e(s).password=l),required:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password},null,8,["message"])])):v("",!0),e(s).role!="user"?(n(),u("div",E,[o(t,{for:"password",value:"Confirm Password"}),o(d,{id:"password_confirmation",type:"password",class:"block w-full mt-1",modelValue:e(s).password_confirmation,"onUpdate:modelValue":r[9]||(r[9]=l=>e(s).password_confirmation=l),required:""},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])])):v("",!0),a("div",F,[o(C,{disabled:e(s).processing},{default:i(()=>[p("Save")]),_:1},8,["disabled"])])],32)])])])])]),_:1})],64))}};export{ce as default};
