// Custom cursor
const cursor = document.getElementById('cursor');
const ring   = document.getElementById('cursorRing');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove', e => {
  mx = e.clientX; my = e.clientY;
  cursor.style.left = mx+'px'; cursor.style.top = my+'px';
});
(function animRing(){
  rx += (mx-rx)*0.12; ry += (my-ry)*0.12;
  ring.style.left = rx+'px'; ring.style.top = ry+'px';
  requestAnimationFrame(animRing);
})();
document.querySelectorAll('a,button').forEach(el=>{
  el.addEventListener('mouseenter',()=>document.body.classList.add('hovering'));
  el.addEventListener('mouseleave',()=>document.body.classList.remove('hovering'));
});

// Scroll reveal
const io = new IntersectionObserver(entries=>{
  entries.forEach((e,i)=>{
    if(e.isIntersecting){ setTimeout(()=>e.target.classList.add('visible'),i*70); io.unobserve(e.target); }
  });
},{threshold:0.1});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

// Package tab toggle
function switchPkg(type, btn){
  document.querySelectorAll('.pkg-toggle button').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('pkg-new').style.display      = type==='new'      ? 'grid' : 'none';
  document.getElementById('pkg-redesign').style.display = type==='redesign' ? 'grid' : 'none';
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click', e=>{
    const id = a.getAttribute('href');
    if (id === '#' || id === '#!') return;
    const t = document.querySelector(id);
    if(t){ e.preventDefault(); window.scrollTo({top:t.offsetTop-80,behavior:'smooth'}); }
  });
});

// Contact modal → send_email.php
(function () {
  const modal = document.getElementById('contactModal');
  const form = document.getElementById('contactForm');
  const msgEl = document.getElementById('contactFormMsg');
  const submitBtn = document.getElementById('contactSubmit');
  if (!modal || !form) return;

  const submitLabel = submitBtn ? submitBtn.querySelector('span') : null;
  const defaultBtnText = submitLabel ? submitLabel.textContent : '';

  function setMsg(text, kind) {
    if (!msgEl) return;
    msgEl.textContent = text || '';
    msgEl.classList.remove('is-error', 'is-success');
    if (kind) msgEl.classList.add(kind === 'error' ? 'is-error' : 'is-success');
  }

  function openModal() {
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('contact-modal-open');
    const first = form.querySelector('input,textarea');
    if (first) setTimeout(() => first.focus(), 100);
  }

  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('contact-modal-open');
    setMsg('');
  }

  document.querySelectorAll('.js-open-contact').forEach((el) => {
    el.addEventListener('click', () => openModal());
  });
  modal.querySelectorAll('.js-close-contact').forEach((el) => {
    el.addEventListener('click', () => closeModal());
  });
  modal.querySelector('.contact-modal__panel').addEventListener('click', (e) => e.stopPropagation());
  modal.addEventListener('click', () => closeModal());

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    setMsg('');
    const fd = new FormData(form);
    if (submitBtn) {
      submitBtn.disabled = true;
      if (submitLabel) submitLabel.textContent = 'Sending…';
    }
    try {
      const res = await fetch('send_email.php', { method: 'POST', body: fd });
      const data = await res.json().catch(() => ({}));
      if (data.success) {
        setMsg(data.message || 'Message sent. We will get back to you soon.', 'success');
        form.reset();
        setTimeout(closeModal, 2200);
      } else {
        setMsg(data.message || 'Something went wrong. Please try again or use WhatsApp.', 'error');
      }
    } catch (err) {
      setMsg('Could not send. Check your connection and try again.', 'error');
    } finally {
      if (submitBtn) submitBtn.disabled = false;
      if (submitLabel) submitLabel.textContent = defaultBtnText;
    }
  });
})();
