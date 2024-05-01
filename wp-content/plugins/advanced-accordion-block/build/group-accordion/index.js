(()=>{"use strict";(()=>{const e=window.wp.blocks,o=JSON.parse('{"apiVersion":2,"name":"aab/group-accordion","version":"0.1.0","title":"Group Accordion","category":"accordion-block","description":"Build Accordion and FAQs Easily.","supports":{"html":false,"anchor":true},"attributes":{"uniqueId":{"type":"string"},"activeAccordionBorder":{"type":"object","default":{"width":"1px","color":"#77b5f7","style":"solid"}}},"textdomain":"advanced-accordion-block","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}'),c=window.wp.element,a=window.wp.components,{__}=wp.i18n,n=[{name:__("Black","advanced-accordion-block"),color:"#000000"},{name:__("White","advanced-accordion-block"),color:"#ffffff"},{name:__("Red","advanced-accordion-block"),color:"#ff0000"},{name:__("Green","advanced-accordion-block"),color:"#00ff00"},{name:__("Blue","advanced-accordion-block"),color:"#0000ff"},{name:__("Yellow","advanced-accordion-block"),color:"#ffff00"}],t=window.wp.blockEditor,r=window.wp.i18n,i=(0,c.createElement)("svg",{width:"17px",height:"17px",viewBox:"0 0 17 17",version:"1.1"},(0,c.createElement)("path",{d:"M0 0v17h17v-17h-17zM16 1v9h-15v-9h15zM16 11v2h-15v-2h15zM1 16v-2h15v2h-15z",fill:"#77b5f7"}));(0,e.registerBlockType)(o,{icon:{src:i,foreground:"#77b5f7"},edit:e=>{let{attributes:o,setAttributes:i,clientId:l}=e;const{uniqueId:d,activeAccordionBorder:s}=o;return i({uniqueId:l}),(0,c.createElement)(c.Fragment,null,(0,c.createElement)("style",null,`.aagb_accordion_${d} .aagb__accordion_active { border: ${s.width} ${s.style} ${s.color} !important; }`,`.aagb_accordion_${d} .aagb__accordion_body--show { border-top: ${s.width} ${s.style} ${s.color} !important; }`),(0,c.createElement)(t.InspectorControls,null,(0,c.createElement)(a.PanelBody,{initialOpen:!1,title:(0,r.__)("Active Accordion Style","advanced-accordion-block")},(0,c.createElement)(a.__experimentalBorderControl,{colors:n,label:(0,r.__)("Border","advanced-accordion-block"),onChange:e=>i({activeAccordionBorder:e}),value:s,withSlider:!0}))),(0,c.createElement)("div",(0,t.useBlockProps)({className:`aagb_accordion_${d}`}),(0,c.createElement)(t.InnerBlocks,{allowedBlocks:["aab/accordion-item"],template:[["aab/accordion-item"]]})))},save:e=>{let{attributes:o}=e;const{uniqueId:a}=o;return(0,c.createElement)("div",t.useBlockProps.save({className:`aagb_accordion_${a}`}),(0,c.createElement)(t.InnerBlocks.Content,null))}})})()})();