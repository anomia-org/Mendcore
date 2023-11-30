import{l as w,s as k,T as y,r as C,o as i,c as l,b as a,w as u,a as s,z as L,n as d,u as t,A as _,B as f,t as p,C as b,H as c,f as n,F as S,p as U}from"./vendor-9580edd1.js";import{_ as V}from"./Navbar.vue_vue_type_script_setup_true_lang-7477f862.js";import{_ as B}from"./FlashMessages.vue_vue_type_script_setup_true_lang-5b5312d0.js";import{S as D}from"./Sidebar-1e42415c.js";import"./app-2c5c3ded.js";const F={class:"cell medium-4"},I=s("div",{class:"mb-2"},[s("div",{class:"text-2xl fw-semibold"},"Log In"),s("div",{class:"text-sm text-muted fw-semibold"},[n(" Don't have an account? "),s("a",{href:"#",class:"d-inline-block squish"},"Sign Up")])],-1),N=s("div",null,null,-1),A={class:"card card-body"},P=["onSubmit"],T={class:"mb-2"},q={key:0,class:"text-xs text-danger fw-semibold"},z={class:"mb-2"},H={key:0,class:"text-xs text-danger fw-semibold"},M={class:"align-middle flex-container align-justify"},$=["disabled"],j=s("div",{class:"mx-1 my-3 divider"},null,-1),E=["href"],G=s("i",{class:"fab fa-google me-1"},null,-1),J=s("button",{class:"mt-2 btn btn-discord btn-block"},[s("i",{class:"fab fa-discord me-1"}),n(" Log In with Discord ")],-1),Y=w({__name:"Login",setup(K){const m=k(!1),e=y({username:"",password:"",remember:!1}),h=()=>{U.get("/sanctum/csrf-cookie").then(g=>{e.post(c("auth.login.validate"),{onFinish:()=>e.reset("password")})})},x=()=>{m.value=!0};return(g,o)=>{const v=C("Link");return i(),l(S,null,[a(V),a(D,null,{default:u(()=>[a(B),s("div",F,[I,N,s("div",A,[s("form",{onSubmit:L(h,["prevent"])},[s("div",T,[s("div",{class:d([{"text-danger":t(e).errors.username},"text-xs fw-bold text-muted text-uppercase"])}," Username ",2),_(s("input",{type:"text","onUpdate:modelValue":o[0]||(o[0]=r=>t(e).username=r),class:"form",placeholder:"Username..."},null,512),[[f,t(e).username]]),t(e).errors.username?(i(),l("div",q,p(t(e).errors.username),1)):b("",!0)]),s("div",z,[s("div",{class:d([{"text-danger":t(e).errors.password},"text-xs fw-bold text-muted text-uppercase"])}," Password ",2),_(s("input",{type:"password","onUpdate:modelValue":o[1]||(o[1]=r=>t(e).password=r),class:"mb-2 form",placeholder:"Password..."},null,512),[[f,t(e).password]]),t(e).errors.password?(i(),l("div",H,p(t(e).errors.password),1)):b("",!0)]),s("div",M,[s("input",{type:"submit",class:d(["btn btn-success",{"is-loading":m.value}]),disabled:t(e).processing,onClick:x,value:"Log In"},null,10,$),a(v,{href:t(c)("auth.forgot.page"),class:"text-sm fw-semibold squish"},{default:u(()=>[n("Forgot Password?")]),_:1},8,["href"])])],40,P),j,s("a",{as:"button",href:t(c)("auth.login.google"),class:"my-2 mt-2 btn btn-secondary btn-block"},[G,n(" Log In with Google ")],8,E),J])])]),_:1})],64)}}});export{Y as default};
