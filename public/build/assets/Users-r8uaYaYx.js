import{f as a,g as l,p as t,F as p,C as h,x as s}from"./@vue-3a91xcaC.js";const y=t("header",{class:"flex justify-between"},[t("div",null,[t("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Attendees Information "),t("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," View users checked in to the session. ")])],-1),g={class:"mt-8 -mx-4 sm:-mx-0"},f={key:0,class:"text-base leading-6 text-gray-900"},u={key:1,class:"min-w-full divide-y divide-gray-300"},b=t("thead",null,[t("tr",null,[t("th",{scope:"col",class:"py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"}," Name "),t("th",{scope:"col",class:"hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"}," Staff ID "),t("th",{scope:"col",class:"hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"}," Group "),t("th",{scope:"col",class:"hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell"}," Points "),t("th",{scope:"col",class:"px-3 py-3.5 text-left text-sm font-semibold text-gray-900"}," Check In Time ")])],-1),w={class:"bg-white divide-y divide-gray-200"},v={class:"w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-0"},k={class:"flex gap-2"},D={class:"font-normal lg:hidden"},I=t("dt",{class:"sr-only"},"Staff ID",-1),S={class:"mt-1 text-gray-700 truncate"},B=t("dt",{class:"sr-only"},"Group",-1),F={class:"mt-1 text-gray-700 truncate"},N=t("dt",{class:"sr-only sm:hidden"},"Points",-1),j={class:"mt-1 text-gray-500 truncate sm:hidden"},A={class:"hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"},C={class:"hidden px-3 py-4 text-sm text-gray-500 lg:table-cell"},G={class:"hidden px-3 py-4 text-sm text-gray-500 sm:table-cell"},L={class:"px-3 py-4 text-sm text-gray-500 capitalize"},V={__name:"Users",props:{session:Object},setup(o){const _=n=>new Intl.DateTimeFormat("en-my",{dateStyle:"medium",timeStyle:"short",timeZone:"Asia/Kuala_Lumpur",hour12:!1}).format(new Date(n));return(n,P)=>{var d;return a(),l(p,null,[y,t("div",g,[((d=o.session.users)==null?void 0:d.length)<=0?(a(),l("h1",f," No users to display ")):(a(),l("table",u,[b,t("tbody",w,[(a(!0),l(p,null,h(o.session.users,e=>{var c,i,m,r,x;return a(),l("tr",null,[t("td",v,[t("span",k,s(e.name),1),t("dl",D,[I,t("dd",S,s(e.staff_id),1),B,t("dd",F,s((c=e.group)==null?void 0:c.name),1),N,t("dd",j,s((i=e.pivot)==null?void 0:i.points),1)])]),t("td",A,s(e.staff_id),1),t("td",C,s((m=e.group)==null?void 0:m.name),1),t("td",G,s((r=e.pivot)==null?void 0:r.points),1),t("td",L,s(_((x=e.pivot)==null?void 0:x.created_at)),1)])}),256))])]))])],64)}}};export{V as default};
