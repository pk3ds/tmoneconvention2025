import{r as s,o as f,e as u,f as h,g as p,p as t,x as o,q as r}from"./@vue-ioZSKZPS.js";const v={class:"relative px-6 bg-white isolate py-14 lg:px-8"},m={class:"max-w-2xl py-12 mx-auto"},F={class:"text-center"},g=t("h1",{class:"my-6 text-2xl tracking-tight text-gray-900 uppercase font-title sm:text-4xl"},[r(" TM One Convention 2025 "),t("br"),r(" Countdown ")],-1),E={class:"flex items-center justify-center gap-8 p-4"},y={class:"flex flex-col items-center"},w={class:"text-4xl font-bold text-[#FF5E00]"},M=t("span",{class:"text-lg text-[#FF5E00]"},"Days",-1),b={class:"flex flex-col items-center"},D={class:"text-4xl font-bold text-[#FF5E00]"},T=t("span",{class:"text-lg text-[#FF5E00]"},"Hours",-1),k={class:"flex flex-col items-center"},B={class:"text-4xl font-bold text-[#FF5E00]"},C=t("span",{class:"text-lg text-[#FF5E00]"},"Mins",-1),I={class:"flex flex-col items-center"},N={class:"text-4xl font-bold text-[#FF5E00]"},S=t("span",{class:"text-lg text-[#FF5E00]"},"Secs",-1),q={__name:"Countdown",setup(V){const a=s(0),l=s(0),c=s(0),i=s(0),n=s(null),x=()=>{const _=new Date("2025-01-14 07:00:00").getTime(),d=new Date().getTime(),e=_-d;e>0&&(a.value=Math.floor(e/(1e3*60*60*24)),l.value=Math.floor(e%(1e3*60*60*24)/(1e3*60*60)),c.value=Math.floor(e%(1e3*60*60)/(1e3*60)),i.value=Math.floor(e%(1e3*60)/1e3))};return f(()=>{x(),n.value=setInterval(x,1e3)}),u(()=>{n.value&&clearInterval(n.value)}),(_,d)=>(h(),p("div",v,[t("div",m,[t("div",F,[g,t("div",E,[t("div",y,[t("span",w,o(a.value),1),M]),t("div",b,[t("span",D,o(l.value),1),T]),t("div",k,[t("span",B,o(c.value),1),C]),t("div",I,[t("span",N,o(i.value),1),S])])])])]))}};export{q as default};
