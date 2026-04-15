/* ════════════════════════════════════════════
    script.js — SD Negeri 56 Prabumulih
════════════════════════════════════════════ */

/* ── Navbar: shadow on scroll + active link ── */
const navbar = document.getElementById('navbar');
const navLinks = document.querySelectorAll('.nav-links a');
const sections = document.querySelectorAll('section[id], .smart, .ppdb');
const bttBtn = document.getElementById('btt');

window.addEventListener('scroll', () => {
  // navbar shadow
  navbar.classList.toggle('scrolled', window.scrollY > 40);

  // back to top visibility
  bttBtn.classList.toggle('show', window.scrollY > 400);

  // active nav link highlight
  let current = '';
  sections.forEach(sec => {
    if (window.scrollY >= sec.offsetTop - 120) current = sec.id;
  });
  navLinks.forEach(a => {
    a.classList.remove('active');
    if (a.getAttribute('href') === '#' + current) a.classList.add('active');
  });
});

/* ── Back to top ── */
bttBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ── Mobile hamburger menu ── */
const ham        = document.getElementById('ham');
const mobileMenu = document.getElementById('mobileMenu');
const mmClose    = document.getElementById('mmClose');

ham.addEventListener('click', () => mobileMenu.classList.add('open'));
mmClose.addEventListener('click', closeMM);

function closeMM() {
  mobileMenu.classList.remove('open');
}

// close mobile menu when any anchor link inside it is clicked
mobileMenu.querySelectorAll('a').forEach(a => {
  a.addEventListener('click', closeMM);
});

/* ── Bottom nav (mobile) ── */
const bottomNav = document.getElementById('bottomNav');
if (bottomNav) {
  const navItems = bottomNav.querySelectorAll('.bn-item');
  
  // Set active state based on current page
  function updateBottomNavActive() {
    const currentPage = document.body.getAttribute('data-page') || 'home';
    navItems.forEach(item => {
      if (item.getAttribute('data-page') === currentPage) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }
  
  // Add click handlers with visual feedback
  navItems.forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Add ripple effect
      const ripple = document.createElement('span');
      ripple.classList.add('bn-ripple');
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
      
      // Update active state
      navItems.forEach(i => i.classList.remove('active'));
      this.classList.add('active');
      
      // Navigate after brief animation
      setTimeout(() => {
        window.location.href = this.href;
      }, 200);
    });
  });
  
  // Initialize on page load
  updateBottomNavActive();
}

/* ── Reveal on scroll (IntersectionObserver) ── */
const revealEls = document.querySelectorAll('.reveal');
const revealObs = new IntersectionObserver(
  entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        revealObs.unobserve(e.target);
      }
    });
  },
  { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
);
revealEls.forEach(el => revealObs.observe(el));

/* ── Count-up animation (Stats Bar) ── */
const statNums = document.querySelectorAll('.stn[data-target]');
const statObs  = new IntersectionObserver(
  entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el     = e.target;
      const target = +el.dataset.target;
      const label  = el.closest('.stat-tile').querySelector('.stl').textContent;
      const suffix = label.includes('%') ? '%' : '+';
      let current  = 0;
      const step   = target / 60;

      const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = Math.floor(current) + (current >= target ? suffix : '');
        if (current >= target) clearInterval(timer);
      }, 16);

      statObs.unobserve(el);
    });
  },
  { threshold: 0.5 }
);
statNums.forEach(n => statObs.observe(n));

/* ── Program tab filter ── */
function filterProg(btn, cat) {
  document.querySelectorAll('.p-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');

  document.querySelectorAll('.prog-card').forEach(card => {
    const match = cat === 'all' || card.dataset.cat === cat;
    if (match) {
      card.style.display = '';
      card.style.opacity = '0';
      card.style.transform = 'translateY(20px)';
      setTimeout(() => {
        card.style.transition = 'all 0.4s';
        card.style.opacity    = '1';
        card.style.transform  = '';
      }, 50);
    } else {
      card.style.display = 'none';
    }
  });
}

/* ── Gallery filter (visual highlight only) ── */
document.querySelectorAll('.gf').forEach(btn => {
  btn.addEventListener('click', function () {
    document.querySelectorAll('.gf').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
  });
});

/* ── Calendar widget ── */
const CAL_MONTHS = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
const CAL_SHORT  = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
const CAL_EVENTS = {
  '2026-2-24': true, '2026-2-28': true,
  '2026-3-5':  true, '2026-3-10': true, '2026-3-15': true
};
let calYear = 2026, calMonth = 1; // 0-based month; 1 = February

function calMove(dir) {
  calMonth += dir;
  if (calMonth > 11) { calMonth = 0; calYear++; }
  if (calMonth < 0)  { calMonth = 11; calYear--; }
  renderCal();
}

function renderCal() {
  document.getElementById('calLabel').textContent = CAL_SHORT[calMonth] + ' ' + calYear;

  const grid    = document.getElementById('calGrid');
  const today   = new Date();
  const firstDay = new Date(calYear, calMonth, 1).getDay();
  const offset  = firstDay === 0 ? 6 : firstDay - 1; // Mon-first offset
  const total   = new Date(calYear, calMonth + 1, 0).getDate();
  const prevEnd = new Date(calYear, calMonth, 0).getDate();

  const DAY_HEADERS = ['S','S','R','K','J','S','M'];
  let html = DAY_HEADERS.map(d => `<div class="cal-dn">${d}</div>`).join('');

  // trailing days from previous month
  for (let i = offset - 1; i >= 0; i--) {
    html += `<div class="cal-d other">${prevEnd - i}</div>`;
  }

  // current month days
  for (let d = 1; d <= total; d++) {
    const key     = `${calYear}-${calMonth + 1}-${d}`;
    const isToday = d === today.getDate() && calMonth === today.getMonth() && calYear === today.getFullYear();
    const isEvent = CAL_EVENTS[key];
    const cls     = isToday ? ' today' : isEvent ? ' event' : '';
    html += `<div class="cal-d${cls}">${d}</div>`;
  }

  // leading days from next month
  const filled  = offset + total;
  const remain  = filled % 7 === 0 ? 0 : 7 - (filled % 7);
  for (let d = 1; d <= remain; d++) {
    html += `<div class="cal-d other">${d}</div>`;
  }

  grid.innerHTML = html;
}

renderCal(); // initial render

/* ── Notification sheet ── */
const sheetOv = document.getElementById('sheetOv');

function openSheet()  { sheetOv.classList.add('open'); }
function closeSheet() { sheetOv.classList.remove('open'); }

sheetOv.addEventListener('click', function (e) {
  if (e.target === this) closeSheet();
});

/* ── Contact form submission ── */
function sendForm() {
  const name  = document.getElementById('f-name').value.trim();
  const email = document.getElementById('f-email').value.trim();
  const msg   = document.getElementById('f-msg').value.trim();

  if (!name || !email || !msg) {
    alert('Mohon lengkapi nama, email, dan pesan Anda.');
    return;
  }

  document.getElementById('formWrap').style.display = 'none';
  document.getElementById('formOk').style.display   = 'block';
}