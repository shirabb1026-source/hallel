(() => {
  const section = document.querySelector('.hallel-about-page .about-manifesto');
  if (!section || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  let ticking = false;
  const render = () => {
    const rect = section.getBoundingClientRect();
    const desktop = innerWidth > 900;
    const progress = Math.max(0, Math.min(1, -rect.top / Math.max(1, rect.height)));
    const shift = desktop ? 0 : progress * 180;
    section.style.setProperty('--about-landscape-shift', `${shift.toFixed(1)}px`);
    ticking = false;
  };
  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };
  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const hero = document.querySelector('.hallel-about-page .about-hero');
  if (!hero || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const clamp = (n) => Math.min(1, Math.max(0, n));
  const smooth = (n) => {
    const x = clamp(n);
    return x * x * (3 - 2 * x);
  };
  let ticking = false;
  const render = () => {
    const rect = hero.getBoundingClientRect();
    const progress = clamp(-rect.top / Math.max(1, hero.offsetHeight * .72));
    hero.style.setProperty('--about-cut', smooth(progress / .72).toFixed(4));
    ticking = false;
  };
  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };
  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const story = document.querySelector('.story');
  if (!story || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  const animatedHeading = story.querySelector('.story__heading-line2');

  let ticking = false;
  const clamp = (n) => Math.min(1, Math.max(0, n));
  const range = (value, start, end) => {
    const x = clamp((value - start) / (end - start));
    return x * x * (3 - 2 * x);
  };

  const render = () => {
    const rect = story.getBoundingClientRect();
    const distance = Math.max(1, story.offsetHeight - innerHeight);
    const progress = clamp(-rect.top / distance);
    const fill = range(progress, .04, .28);
    const wordOpacity = 1 - range(progress, .38, .56);
    const copy = range(progress, .58, .78);
    const props = range(progress, .85, .99);

    story.style.setProperty('--story-fill', fill.toFixed(4));
    story.style.setProperty('--story-word-opacity', wordOpacity.toFixed(4));
    story.style.setProperty('--story-copy', copy.toFixed(4));
    story.style.setProperty('--story-props', props.toFixed(4));
    animatedHeading?.classList.toggle('is-title-visible', copy > .02);
    ticking = false;
  };

  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };

  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const story = document.querySelector('.ourstory, .about-timeline');
  const storyBox = story?.querySelector('.ourstory__box') || story;
  const light = story?.querySelector('.ourstory__light') || document.querySelector('.cta__shared-light');
  const cta = document.querySelector('.cta');
  const ctaStage = cta?.querySelector('.cta__stage');
  if (!storyBox || !light || !cta || !ctaStage || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const clamp = (n) => Math.min(1, Math.max(0, n));
  const smooth = (n) => {
    const x = clamp(n);
    return x * x * (3 - 2 * x);
  };
  let ticking = false;
  document.body.append(light);
  light.classList.add('ourstory__light--shared');

  const setPointer = (event, element) => {
    const rect = element.getBoundingClientRect();
    const x = clamp((event.clientX - rect.left) / rect.width) * 100;
    const y = clamp((event.clientY - rect.top) / rect.height) * 100;
    light.style.setProperty('--shared-light-x', `${event.clientX.toFixed(1)}px`);
    light.style.setProperty('--shared-light-y', `${event.clientY.toFixed(1)}px`);
    cta.style.setProperty('--spot-x', `${x.toFixed(2)}%`);
    cta.style.setProperty('--spot-y', `${y.toFixed(2)}%`);
  };

  storyBox.addEventListener('pointermove', (event) => setPointer(event, storyBox), { passive:true });
  ctaStage.addEventListener('pointermove', (event) => setPointer(event, ctaStage), { passive:true });
  ctaStage.addEventListener('pointerleave', () => {
    cta.style.setProperty('--spot-x', '50%');
    cta.style.setProperty('--spot-y', '43%');
  });

  cta.classList.add('cta--shared-light-ready');

  const render = () => {
    const rect = cta.getBoundingClientRect();
    const desktop = innerWidth > 900;
    const travel = desktop ? Math.max(1, cta.offsetHeight - innerHeight) : innerHeight + rect.height * .4;
    const progress = desktop ? clamp(-rect.top / travel) : clamp((innerHeight - rect.top) / travel);
    const storyRect = story.getBoundingClientRect();
    const storyTravel = desktop ? Math.max(1, story.offsetHeight - innerHeight) : innerHeight * .75 + storyRect.height * .5;
    const storyProgress = desktop ? clamp(-storyRect.top / storyTravel) : clamp((innerHeight * .9 - storyRect.top) / storyTravel);
    const storyLight = smooth((storyProgress - .82) / .16);
    const ctaVisible = rect.top < innerHeight && rect.bottom > 0;
    const storyVisible = storyRect.bottom > 0 && storyRect.top < innerHeight;
    const active = (storyVisible && storyLight > .001) || ctaVisible;
    const storyBoxRect = storyBox.getBoundingClientRect();
    const storyOwnsLight = storyVisible && storyBoxRect.bottom > innerHeight * .2;
    const lightLevel = storyOwnsLight ? storyLight : (ctaVisible ? 1 : storyLight);
    // Blend brightness only after the story frame has left the reading area.
    const handoff = storyOwnsLight ? 0 : clamp((innerHeight * .2 - storyBoxRect.bottom) / (innerHeight * .3));
    light.style.setProperty('--spotlight-core', (.42 - .18 * handoff).toFixed(3));
    light.style.setProperty('--spotlight-halo', (.21 - .09 * handoff).toFixed(3));
    const width = Math.min(1320, innerWidth * (.12 + lightLevel * .54 + (ctaVisible ? progress * .12 : 0)));

    light.style.setProperty('--shared-light-size', `${width.toFixed(1)}px`);
    light.style.setProperty('--shared-light-opacity', active ? lightLevel.toFixed(4) : '0');
    cta.style.setProperty('--cta-progress', progress.toFixed(4));
    cta.style.setProperty('--cta-reveal', `${(5 + progress * 39).toFixed(2)}%`);
    cta.style.setProperty('--cta-reveal-soft', `${(10 + progress * 42).toFixed(2)}%`);
    ticking = false;
  };

  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };
  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const section = document.querySelector('.ourstory');
  if (!section || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const clamp = (n) => Math.min(1, Math.max(0, n));
  const range = (value, start, end) => {
    const x = clamp((value - start) / (end - start));
    return x * x * (3 - 2 * x);
  };
  let ticking = false;

  section.classList.add('ourstory--scroll-ready');

  const box = section.querySelector('.ourstory__box');
  if (box) {
    box.addEventListener('pointermove', (event) => {
      const rect = box.getBoundingClientRect();
      const x = Math.min(92, Math.max(8, ((event.clientX - rect.left) / rect.width) * 100));
      const y = Math.min(78, Math.max(4, ((event.clientY - rect.top) / rect.height) * 100));
      section.style.setProperty('--our-light-x', `${x.toFixed(2)}%`);
      section.style.setProperty('--our-light-y', `${y.toFixed(2)}%`);
    }, { passive:true });
    box.addEventListener('pointerleave', () => {
      section.style.setProperty('--our-light-x', '50%');
      section.style.setProperty('--our-light-y', '12%');
    });
  }

  const render = () => {
    const rect = section.getBoundingClientRect();
    const desktop = innerWidth > 900;
    const travel = desktop
      ? Math.max(1, section.offsetHeight - innerHeight)
      : innerHeight * .75 + rect.height * .5;
    const progress = desktop
      ? clamp(-rect.top / travel)
      : clamp((innerHeight * .9 - rect.top) / travel);

    section.style.setProperty('--our-frame', range(progress, .03, .28).toFixed(4));
    section.style.setProperty('--our-copy', range(progress, .31, .59).toFixed(4));
    section.style.setProperty('--our-lamps', range(progress, .63, .83).toFixed(4));
    section.style.setProperty('--our-light', range(progress, .86, .98).toFixed(4));
    ticking = false;
  };

  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };

  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const section = document.querySelector('.testimonials');
  if (!section || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const clamp = (n) => Math.min(1, Math.max(0, n));
  const range = (value, start, end) => {
    const x = clamp((value - start) / (end - start));
    return x * x * (3 - 2 * x);
  };
  let ticking = false;

  section.classList.add('testimonials--scroll-ready');

  const render = () => {
    const rect = section.getBoundingClientRect();
    const desktop = innerWidth > 900;
    const travel = desktop
      ? Math.max(1, section.offsetHeight - innerHeight)
      : innerHeight * .72 + rect.height * .55;
    const progress = desktop
      ? clamp(-rect.top / travel)
      : clamp((innerHeight * .9 - rect.top) / travel);
    const headingProgress = desktop
      ? clamp((innerHeight * .95 - rect.top) / (innerHeight * .55))
      : progress;

    section.style.setProperty('--trust-heading', range(headingProgress, .02, .85).toFixed(4));
    section.style.setProperty('--trust-1', range(progress, .10, .24).toFixed(4));
    section.style.setProperty('--trust-2', range(progress, .28, .42).toFixed(4));
    section.style.setProperty('--trust-3', range(progress, .46, .60).toFixed(4));
    section.style.setProperty('--trust-4', range(progress, .64, .78).toFixed(4));
    section.style.setProperty('--trust-5', range(progress, .82, .96).toFixed(4));
    ticking = false;
  };

  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };

  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

(() => {
  const section = document.querySelector('.initiatives');
  if (!section || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const clamp = (n) => Math.min(1, Math.max(0, n));
  const range = (value, start, end) => {
    const x = clamp((value - start) / (end - start));
    return x * x * (3 - 2 * x);
  };
  let ticking = false;

  section.classList.add('initiatives--scroll-ready');

  const render = () => {
    const rect = section.getBoundingClientRect();
    const desktop = innerWidth > 900;
    const travel = desktop
      ? Math.max(1, section.offsetHeight - innerHeight)
      : innerHeight * .72 + rect.height * .45;
    const progress = desktop
      ? clamp(-rect.top / travel)
      : clamp((innerHeight * .9 - rect.top) / travel);
    const headingProgress = desktop
      ? clamp((innerHeight * .95 - rect.top) / (innerHeight * .55))
      : progress;

    section.style.setProperty('--init-heading', range(headingProgress, .02, .85).toFixed(4));
    section.style.setProperty('--init-b', range(progress, .14, .30).toFixed(4));
    section.style.setProperty('--init-d', range(progress, .34, .50).toFixed(4));
    section.style.setProperty('--init-a', range(progress, .54, .70).toFixed(4));
    section.style.setProperty('--init-c', range(progress, .74, .90).toFixed(4));
    ticking = false;
  };

  const requestRender = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(render);
  };

  addEventListener('scroll', requestRender, { passive:true });
  addEventListener('resize', requestRender, { passive:true });
  render();
})();

/* Camera focus mark follows the pointer only while it is over a project image. */
(() => {
  if (!matchMedia('(hover: hover) and (pointer: fine)').matches) return;

  document.querySelectorAll('.project-card').forEach((card) => {
    const focus = card.querySelector('.project-card__focus');
    if (!focus) return;

    let currentX = 50;
    let currentY = 50;
    let targetX = 50;
    let targetY = 50;
    let frame = 0;

    const draw = () => {
      currentX += (targetX - currentX) * .18;
      currentY += (targetY - currentY) * .18;
      focus.style.left = `${currentX.toFixed(2)}%`;
      focus.style.top = `${currentY.toFixed(2)}%`;

      if (Math.abs(targetX - currentX) > .02 || Math.abs(targetY - currentY) > .02) {
        frame = requestAnimationFrame(draw);
      } else {
        frame = 0;
      }
    };

    const animate = () => {
      if (!frame) frame = requestAnimationFrame(draw);
    };

    card.addEventListener('pointermove', (event) => {
      const rect = card.getBoundingClientRect();
      targetX = Math.min(92, Math.max(8, ((event.clientX - rect.left) / rect.width) * 100));
      targetY = Math.min(90, Math.max(10, ((event.clientY - rect.top) / rect.height) * 100));
      animate();
    }, { passive:true });

    card.addEventListener('pointerleave', () => {
      targetX = 50;
      targetY = 50;
      animate();
    });
  });
})();

/* Reveal each project card's copy in a short cinematic sequence. */
(() => {
  if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const cards = [...document.querySelectorAll('.project-card')];
  if (!cards.length) return;

  cards.forEach((card) => card.classList.add('project-card--content-ready'));

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-content-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold:.34, rootMargin:'0px 0px -8% 0px' });

  cards.forEach((card) => observer.observe(card));
})();

/* Main section titles enter one letter at a time, like the hero title. */
(() => {
  if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const titles = [...document.querySelectorAll([
    '.story__heading-line2',
    '.initiatives__title',
    '.projects__heading h2',
    '.partners__title',
    '.testimonials__title',
    '.ourstory__heading-line2',
    '.apply-form__title',
    '.ourstory__tagline',
    '.project-card__stamp'
  ].join(','))];
  if (!titles.length) return;

  const splitTitle = (title) => {
    const label = title.textContent.replace(/\s+/g, ' ').trim();
    const walker = document.createTreeWalker(title, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    while (walker.nextNode()) textNodes.push(walker.currentNode);
    let index = 0;

    textNodes.forEach((node) => {
      const fragment = document.createDocumentFragment();
      [...node.nodeValue].forEach((character) => {
        if (/\s/.test(character)) {
          fragment.append(document.createTextNode(character));
          return;
        }
        const span = document.createElement('span');
        span.className = 'section-title__char';
        span.setAttribute('aria-hidden', 'true');
        span.style.setProperty('--title-char-index', index++);
        span.textContent = character;
        fragment.append(span);
      });
      node.replaceWith(fragment);
    });

    title.setAttribute('aria-label', label);
    title.classList.add('section-title--letters-ready');
  };

  titles.forEach(splitTitle);

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-title-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold:.45, rootMargin:'0px 0px -6% 0px' });

  titles
    .filter((title) => !title.matches('.story__heading-line2'))
    .forEach((title) => observer.observe(title));
})();

// Aim both About spotlights toward the content as the visitor scrolls.
(() => {
  const panel = document.querySelector('.hallel-about-page .about-timeline');
  if (!panel || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  let pending = false;
  const render = () => {
    const box = panel.getBoundingClientRect();
    const distance = innerHeight / 2 - (box.top + box.height / 2);
    const angle = Math.max(-34, Math.min(34, distance * .085));
    panel.style.setProperty('--about-lamp-angle', `${angle.toFixed(2)}deg`);
    pending = false;
  };
  const update = () => {
    if (pending) return;
    pending = true;
    requestAnimationFrame(render);
  };
  addEventListener('scroll', update, {passive:true});
  addEventListener('resize', update, {passive:true});
  render();
})();

// Quiet title entrances across the inner pages, preserving typography.
(() => {
  if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  const titles = document.querySelectorAll('.hallel-about-page .about-page h1, .hallel-about-page .about-page h2, .hallel-about-page .about-page h3, .hallel-about-page .about-kicker, .hallel-about-page .about-manifesto__aside, .hallel-inner-page .inner-page h2, .hallel-inner-page .inner-kicker, .hallel-inner-page .project-story > aside, .hallel-inner-page .inner-closing > p');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-about-title-visible');
      observer.unobserve(entry.target);
    });
  }, {threshold:.2, rootMargin:'0px 0px -3% 0px'});
  titles.forEach(title => {
    if (title.closest('.about-principles__list')) return;
    title.classList.add('about-title--ready');
    observer.observe(title);
  });
})();

// Reveal each complete principle row as it enters the reading area.
(() => {
  if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  const rows = document.querySelectorAll('.hallel-about-page .about-principles__list article');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-principle-visible');
      observer.unobserve(entry.target);
    });
  }, {threshold:.25, rootMargin:'0px 0px -12% 0px'});
  rows.forEach((row, index) => {
    row.classList.add('principle-row--ready');
    row.style.setProperty('--principle-delay', `${index * 80}ms`);
    observer.observe(row);
  });
})();

// Scroll-linked progress for the project journey.
(() => {
 const section = document.querySelector('.project-detail .project-process:not(.project-goals)');
 if (!section || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
 const steps = [...section.querySelectorAll('.project-process__steps article')];
 section.classList.add('process-scroll-ready');
 let pending = false;
 const render = () => {
  const box = section.querySelector('.project-process__steps').getBoundingClientRect();
  const progress = Math.max(0, Math.min(1, (innerHeight * .85 - box.top) / (innerHeight * .65)));
  section.style.setProperty('--process-progress', progress.toFixed(3));
  steps.forEach((step, index) => {
   const reveal = Math.max(0, Math.min(1, (progress - index * .30) / .30));
   step.style.opacity = reveal.toFixed(3);
   step.style.clipPath = `inset(0 0 ${(100 * (1-reveal)).toFixed(1)}% 0)`;
   step.style.translate = `0 ${(18 * (1-reveal)).toFixed(1)}px`;
  });
  pending = false;
 };
 const update = () => {if (!pending) {pending=true;requestAnimationFrame(render);}};
 addEventListener('scroll',update,{passive:true});
 addEventListener('resize',update,{passive:true});
 render();
})();

// Reveal the initiative icons as the visitor scrolls past each card.
(() => {
  const icons = [...document.querySelectorAll('.project-goals .project-goals__icon img')];
  if (!icons.length || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  document.querySelector('.project-goals').classList.add('icons-scroll-ready');
  let pending = false;
  const render = () => {
    icons.forEach(icon => {
      const top = icon.parentElement.getBoundingClientRect().top;
      const progress = Math.max(0, Math.min(1, (innerHeight * .88 - top) / (innerHeight * .3)));
      icon.style.opacity = progress.toFixed(3);
      icon.style.transform = `translateY(${(20 * (1 - progress)).toFixed(1)}px) scale(${(.9 + .1 * progress).toFixed(3)})`;
    });
    pending = false;
  };
  const update = () => { if (!pending) { pending = true; requestAnimationFrame(render); } };
  addEventListener('scroll', update, {passive:true});
  addEventListener('resize', update);
  render();
})();

// One clear cinematic entrance per project; scrolling remains native.
(() => {
 const cards = [...document.querySelectorAll('.home .project-card')];
 if (!cards.length || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
 cards.forEach(card => {
  card.classList.remove('project-card--content-ready');
  card.classList.add('project-card--cinematic');
 });
 const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
   if (!entry.isIntersecting) return;
   entry.target.classList.add('is-cinema-visible');
   observer.unobserve(entry.target);
  });
 }, {threshold:.18, rootMargin:'0px 0px -5% 0px'});
 cards.forEach(card => observer.observe(card));
 let pending = false;
 const render = () => {
  cards.forEach(card => {
   const box = card.getBoundingClientRect();
   const progress = Math.max(0, Math.min(1, (innerHeight - box.top) / (innerHeight + box.height)));
   card.style.setProperty('--project-zoom', (1.055 - .055 * progress).toFixed(4));
  });
  pending = false;
 };
 const update = () => { if (!pending) { pending = true; requestAnimationFrame(render); } };
 addEventListener('scroll', update, {passive:true});
 addEventListener('resize', update);
 render();
})();

// Keep pointer aiming stable while the sticky stage moves during scrolling.
(() => {
 const panel = document.querySelector('.home .ourstory__stage');
 const section = document.querySelector('.home .ourstory');
 if (!panel || !section || !matchMedia('(hover:hover) and (pointer:fine)').matches || matchMedia('(prefers-reduced-motion: reduce)').matches) return;
 let frame = 0, pointer = null;
 const render = () => {
  frame = 0;
  if (!pointer) return;
  const box = panel.getBoundingClientRect();
  if (box.bottom <= 0 || box.top >= innerHeight) return;
  const x = Math.max(0, Math.min(1, (pointer.x - box.left) / box.width));
  const targetY = pointer.y - (box.top + box.height * .48);
  const right = Math.max(-34, Math.min(34, -Math.atan2(targetY, Math.max(box.width * .18, (1-x) * box.width)) * 180 / Math.PI * 1.45));
  const left = Math.max(-34, Math.min(34, -Math.atan2(targetY, Math.max(box.width * .18, x * box.width)) * 180 / Math.PI * 1.45));
  section.style.setProperty('--our-pointer-right', `${right.toFixed(2)}deg`);
  section.style.setProperty('--our-pointer-left', `${left.toFixed(2)}deg`);
 };
 const update = () => { if (!frame) frame = requestAnimationFrame(render); };
 addEventListener('pointermove', event => {pointer = {x:event.clientX,y:event.clientY};update();}, {passive:true});
 addEventListener('scroll', update, {passive:true});
 addEventListener('resize', update, {passive:true});
})();
