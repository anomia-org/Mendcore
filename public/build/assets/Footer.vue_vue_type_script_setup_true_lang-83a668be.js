import{l as _,Q as r,a1 as f,o,c as i,a as e,u as a,t as h,A as n,N as m}from"./vendor-9580edd1.js";const g={class:"footer footer-fixed"},u={class:"container py-3"},x={class:"align-middle grid-x grid-margin-x"},p={class:"cell small-1"},b={class:"gap-3 flex-container align-right align-center-sm"},v=["src"],w={class:"cell large-6"},k={class:"mb-1 text-lg fw-semibold mb-lg-0"},y=m('<div class="mb-2 flex-container-lg mb-lg-0"><a href="#" class="text-sm footer-link fw-semibold">TERMS OF SERVICE</a><a href="#" class="text-sm footer-link fw-semibold">PRIVACY POLICY</a><a href="#" class="text-sm footer-link fw-semibold">JOBS</a><a href="#" class="text-sm footer-link fw-semibold">CONTACT</a></div>',1),C={class:"cell large-5"},E={class:"gap-3 flex-container align-right align-center-sm"},B=e("i",{class:"fas fa-language"},null,-1),I=[B],L=["href"],S=e("i",{class:"fab fa-discord"},null,-1),F=[S],T=["href"],A=e("i",{class:"fab fa-twitter"},null,-1),O=[A],D=["href"],N=e("i",{class:"fab fa-twitch"},null,-1),V=[N],M=["href"],R=e("i",{class:"fab fa-tiktok"},null,-1),J=[R],P=["href"],Y=e("i",{class:"fab fa-facebook"},null,-1),Q=[Y],$={methods:{showModal(s){const t=document.getElementById(s);t&&t.classList.toggle("active")},addActiveClass(s){const t=document.getElementById(s);t&&t.classList.toggle("active")},sidebarOpen(){const s=document.getElementById("sidebar");s&&s.classList.toggle("show-for-large")},addActiveClassSSInput(s){const t=document.getElementById(s),d=c=>!c.trim().length;t&&t.addEventListener("input",function(){d(this.value)||t.classList.toggle("hide")})}}},z=_({...$,__name:"Footer",setup(s){const t=r().props;return(d,c)=>{const l=f("tippy");return o(),i("footer",g,[e("main",u,[e("div",x,[e("div",p,[e("div",b,[e("img",{src:a(t).site.icon},null,8,v)])]),e("div",w,[e("div",k," Copyright © 2023 "+h(a(t).site.name)+". All rights reserved. ",1),y]),e("div",C,[e("div",E,[n((o(),i("button",{href:"#",class:"text-2xl footer-media text-muted",content:"Language",onClick:c[0]||(c[0]=j=>d.showModal("LanguageSettings"))},I)),[[l]]),n((o(),i("a",{href:a(t).site.socials.discord,class:"text-2xl footer-media text-muted",content:"Join us on Discord"},F,8,L)),[[l]]),n((o(),i("a",{href:a(t).site.socials.twitter,class:"text-2xl footer-media text-muted",content:"Follow us on Twitter"},O,8,T)),[[l]]),n((o(),i("a",{href:a(t).site.socials.twitch,class:"text-2xl footer-media text-muted",content:"Follow us on Twitch"},V,8,D)),[[l]]),n((o(),i("a",{href:a(t).site.socials.tiktok,class:"text-2xl footer-media text-muted",content:"Follow us on TikTok"},J,8,M)),[[l]]),n((o(),i("a",{href:a(r)().props.site.socials.facebook,class:"text-2xl footer-media text-muted",content:"Follow us on Facebook"},Q,8,P)),[[l]])])])])])])}}});export{z as _};
