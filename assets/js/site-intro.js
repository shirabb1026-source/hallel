(() => {
  const intro = document.querySelector('.site-intro');
  if (!intro) return;

  if (matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.body.classList.remove('site-intro-active');
    intro.remove();
    return;
  }

  document.body.classList.add('site-intro-active');

  const exit = () => {
    if (intro.classList.contains('is-logo-out')) return;
    intro.classList.add('is-logo-out');
    window.setTimeout(() => {
      intro.classList.add('is-exiting');
    }, 290);
    window.setTimeout(() => {
      document.body.classList.remove('site-intro-active');
      intro.remove();
    }, 1700);
  };

  window.setTimeout(exit, 900);
  intro.addEventListener('click', exit, { once:true });
})();

(() => {
  const videos = [...document.querySelectorAll('.project-card__video')];
  if (!videos.length) return;

  const play = () => videos.forEach((video) => {
    video.muted = true;
    const promise = video.play();
    if (promise) promise.catch(() => {});
  });

  videos.forEach((video) => video.addEventListener('canplay', play, { once:true }));
  addEventListener('pageshow', play);
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) play();
  });
  play();
})();
