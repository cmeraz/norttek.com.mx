// Lógica modular de la página Telefonía
// (antes en telefonia-inline.js y previamente inline en telefoniaContent.php)
(function(){
  const youtubeVideo=document.getElementById('youtubeVideo');
  const modalSel = '#modalVideo';
  const btnVideo=document.getElementById('openVideo');
  const btnLinkus=document.getElementById('openLinkus');
  function openVideo(src){
    if(!youtubeVideo) return;
    let url=src||'';
    if(!url.includes('autoplay=1')) url+=(url.includes('?')?'&':'?')+'autoplay=1';
    youtubeVideo.src=url;
    if(window.NTModal){ NTModal.open(modalSel); }
  }
  function clearVideo(){ if(youtubeVideo){ youtubeVideo.src=''; } }
  if(btnVideo) btnVideo.addEventListener('click',()=>openVideo(btnVideo.dataset.video));
  if(btnLinkus) btnLinkus.addEventListener('click',()=>openVideo(btnLinkus.dataset.video));
  // Limpia el iframe al cerrar el modal (delegado por eventos del sistema unificado si existen)
  document.addEventListener('nt-modal:closed', (e)=>{ if(e.detail && e.detail.selector===modalSel) clearVideo(); });
})();

(function(){
  const form=document.getElementById('demoForm');
  if(!form) return;
  form.addEventListener('submit',e=>{
    e.preventDefault();
    const nombre=form.nombre.value.trim();
    const email=form.email.value.trim();
    const telefono=(form.telefono.value||'').replace(/\D+/g,'').trim();
    const emailOk=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const telOk=/^[0-9]{10,15}$/.test(telefono);
    if(nombre.length<2||!emailOk||!telOk){ if(window.NTNotify){ NTNotify.warning('Revisa los datos del formulario',{ttl:3000}); } return; }
    const msg=encodeURIComponent(`¡Hola!%0AQuiero solicitar la demo PBX.%0A%0ANombre: ${nombre}%0ACorreo: ${email}%0ATeléfono: ${telefono}`);
    window.open(`https://wa.me/526252690997?text=${msg}`,'_blank');
    form.reset();
    if(window.NTModal){ NTModal.close('#modalDemo'); }
  });
})();

window.addEventListener('load',()=>{
  const heroTitle = document.querySelector('#hero #hero-title');
  const heroSub = document.querySelector('.telefonia-hero-sub');
  const heroActions = document.querySelector('.telefonia-hero-actions');
  const elems = [heroTitle, heroSub, heroActions];
  if(window.gsap){
    const baseEase='power3.out';
    if(heroTitle) gsap.to(heroTitle,{opacity:1,y:0,duration:1.35,ease:baseEase,delay:.15});
    if(heroSub) gsap.to(heroSub,{opacity:1,y:0,duration:1.35,ease:baseEase,delay:.55});
    if(heroActions) {
      // Primero revelar el contenedor
      gsap.to(heroActions,{opacity:1,y:0,duration:1.1,ease:baseEase,delay:.95});
      // Luego cada botón escalonado
      const btns = heroActions.querySelectorAll('.nt-btn');
      btns.forEach((btn,i)=>{
        gsap.fromTo(btn,{opacity:0,y:14,scale:.96},{opacity:1,y:0,scale:1,duration:1,ease:baseEase,delay:1.05 + i*0.12});
      });
    }
  } else {
    // Fallback sin GSAP: mostrar inmediatamente
    elems.forEach(el=>{ if(!el) return; el.style.opacity='1'; el.style.transform='none'; el.classList.remove('opacity-0','translate-y-10'); });
  }
});

console.info('[telefonia.js] animaciones hero extendidas sincronizadas con headings');