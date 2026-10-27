(() => {
  const btn = document.querySelector('.nav-toggle');
  const nav = document.getElementById('site-nav');
  if (!btn || !nav) return;
  const isEn = document.documentElement.lang && document.documentElement.lang.indexOf('en') === 0;
  const setOpen = (open) => {
    document.body.classList.toggle('nav-open', open);
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    btn.setAttribute('aria-label', open ? (isEn ? 'Close menu' : 'סגירת תפריט') : (isEn ? 'Open menu' : 'פתיחת תפריט'));
  };
  btn.addEventListener('click', () => setOpen(!document.body.classList.contains('nav-open')));
  nav.addEventListener('click', (e) => { if (e.target.closest('a')) setOpen(false); });
  addEventListener('keydown', (e) => { if (e.key === 'Escape') setOpen(false); });
  const desktop = matchMedia('(min-width: 901px)');
  desktop.addEventListener('change', (e) => { if (e.matches) setOpen(false); });
})();
