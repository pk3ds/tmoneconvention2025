import{L as d,r as t,o as l,z as n,D as i,f as c,g as f}from"./@vue-3a91xcaC.js";const g={__name:"NumberInput",props:{modelValue:{type:Number,required:!0},modelModifiers:{}},emits:["update:modelValue"],setup(u,{expose:a}){const o=d(u,"modelValue"),e=t(null);return l(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),a({focus:()=>e.value.focus()}),(m,r)=>n((c(),f("input",{class:"border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600","onUpdate:modelValue":r[0]||(r[0]=s=>o.value=s),ref_key:"input",ref:e},null,512)),[[i,o.value]])}};export{g as _};
