<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>General Solutions — Find technicians near you</title>
  <meta name="description" content="General Solutions connects clients to nearby technicians with secure login, geolocation, and detailed profiles." />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    /* base */
    html,
    body {
      height: 100%
    }

    body {
      margin: 0;
      font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, Helvetica, sans-serif;
      color: #1f2937;
      /* gray-800 */
      background: #ffffff;
      line-height: 1.55;
      scroll-behavior: smooth;
    }

    a {
      color: inherit;
      text-decoration: none
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 20px
    }

    /* compensar header fixo no scroll de âncoras */
    :is(#features, #how-it-works, #download, #about) {
      scroll-margin-top: 84px
    }

    /* header */
    header {
      position: sticky;
      top: 0;
      z-index: 50;
      backdrop-filter: saturate(180%) blur(6px);
      background: rgba(255, 255, 255, .85);
      border-bottom: 1px solid #f3f4f6;
      /* gray-100 */
    }

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 64px
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 700;
      color: #111827
    }

    .brand-badge {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: radial-gradient(120% 120% at 100% 0%, #ff9c84 0%, #e8431e 40%, #b42c12 100%);
      display: grid;
      place-items: center;
      color: #fff;
      font-weight: 800;
      box-shadow: 0 6px 16px rgba(232, 67, 30, .35);
    }

    .nav-links {
      display: flex;
      gap: 18px;
      align-items: center
    }

    .nav-links a {
      color: #374151;
      font-weight: 500
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 18px;
      border-radius: 12px;
      font-weight: 600;
      transition: .2s;
      border: 1px solid transparent;
    }

    .btn-primary {
      background: #e8431e;
      color: #fff;
      box-shadow: 0 10px 20px rgba(232, 67, 30, .25)
    }

    .btn-primary:hover {
      background: #cf3b1a
    }

    .btn-ghost {
      border-color: #e5e7eb;
      color: #1f2937;
      background: #fff
    }

    .btn-ghost:hover {
      border-color: #d1d5db;
      background: #f3f4f6
    }

    /* mobile menu */
    .menu-toggle {
      display: none
    }

    .mobile-menu {
      display: none
    }

    /* <-- garante oculto no desktop */
    @media (max-width:880px) {
      .nav-links {
        display: none
      }

      .menu-toggle {
        display: inline-flex
      }

      .mobile-menu {
        padding: 12px 0 18px;
        border-bottom: 1px solid #f3f4f6;
        background: rgba(255, 255, 255, .95);
      }

      .mobile-menu a,
      .mobile-menu .btn {
        display: block;
        width: fit-content;
        margin: 8px 0
      }

      .mobile-open .mobile-menu {
        display: block;
        padding: 20px;
      }
    }

    /* hero */
    .hero {
      position: relative;
      overflow: hidden;
      padding: 64px 0 40px;
      background: linear-gradient(180deg, #fff4f1, #ffffff 60%);
      border-bottom: 1px solid #f3f4f6;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: 1.15fr 1fr;
      gap: 40px;
      align-items: center
    }

    @media (max-width:980px) {
      .hero-grid {
        grid-template-columns: 1fr;
        gap: 26px
      }
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      font-weight: 600;
      color: #e8431e;
      background: #fff;
      border: 1px solid #e5e7eb;
      padding: 6px 10px;
      border-radius: 999px;
      box-shadow: 0 10px 30px rgba(17, 24, 39, .08);
    }

    .hero h1 {
      font-size: 42px;
      line-height: 1.15;
      margin: 14px 0 10px;
      color: #111827
    }

    .hero p {
      color: #4b5563;
      font-size: 17px;
      margin: 0 0 18px
    }

    .hero-ctas {
      display: flex;
      gap: 12px;
      flex-wrap: wrap
    }

    .hero-card {
      background: #fff;
      border: 1px solid #f3f4f6;
      border-radius: 14px;
      padding: 18px;
      box-shadow: 0 10px 30px rgba(17, 24, 39, .08);
    }

    .fake-search {
      display: flex;
      gap: 10px;
      background: #f3f4f6;
      border: 1px solid #e5e7eb;
      padding: 10px;
      border-radius: 12px;
      align-items: center;
    }

    .fake-search input {
      border: none;
      outline: none;
      background: transparent;
      flex: 1;
      font-size: 15px;
      color: #1f2937
    }

    .pill {
      font-size: 12px;
      color: #4b5563;
      background: #fff;
      border: 1px solid #e5e7eb;
      padding: 6px 10px;
      border-radius: 999px
    }

    .mock-cards {
      margin-top: 12px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px
    }

    @media (max-width:520px) {
      .mock-cards {
        grid-template-columns: 1fr
      }
    }

    .mock {
      border: 1px solid #e5e7eb;
      background: #fff;
      border-radius: 12px;
      padding: 12px;
      display: flex;
      gap: 10px;
      align-items: center
    }

    .avatar {
      flex: 0 0 40px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: radial-gradient(120% 120% at 100% 0%, #ffb3a2 0%, #e8431e 45%, #9b260e 100%)
    }

    .badge {
      font-size: 11px;
      color: #fff;
      background: #e8431e;
      padding: 4px 8px;
      border-radius: 999px
    }

    /* sections (features / how it works / about) */
    section {
      padding: 56px 0
    }

    .section-head {
      margin-bottom: 20px
    }

    .section-head h2 {
      margin: 0 0 8px;
      font-size: 28px;
      color: #111827
    }

    .section-head p {
      margin: 0;
      color: #4b5563
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px
    }

    @media (max-width:1000px) {
      .grid-3 {
        grid-template-columns: repeat(2, 1fr)
      }
    }

    @media (max-width:640px) {
      .grid-3 {
        grid-template-columns: 1fr
      }
    }

    .card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      padding: 18px;
      box-shadow: 0 10px 30px rgba(17, 24, 39, .08)
    }

    .card h3 {
      margin: 6px 0 8px;
      font-size: 18px;
      color: #111827
    }

    .card p {
      margin: 0;
      color: #4b5563
    }

    .icon {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: grid;
      place-items: center;
      background: #fff4f1;
      color: #e8431e
    }

    /* how it works (steps) */
    .steps {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px
    }

    @media (max-width:900px) {
      .steps {
        grid-template-columns: 1fr
      }
    }

    .step {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      padding: 18px;
      box-shadow: 0 10px 30px rgba(17, 24, 39, .08)
    }

    .step-num {
      width: 28px;
      height: 28px;
      border-radius: 999px;
      background: #e8431e;
      color: #fff;
      display: grid;
      place-items: center;
      font-weight: 700;
      margin-bottom: 8px
    }

    /* CTA */
    .cta {
      background: linear-gradient(90deg, #e8431e 0%, #ff6a47 100%);
      color: #fff;
      border-radius: 18px;
      padding: 26px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      box-shadow: 0 14px 32px rgba(232, 67, 30, .35);
    }

    .cta h3 {
      margin: 0 0 6px;
      font-size: 22px
    }

    .cta p {
      margin: 0;
      opacity: .95
    }

    @media (max-width:840px) {
      .cta {
        flex-direction: column;
        align-items: flex-start
      }
    }

    /* footer */
    footer {
      padding: 40px 0 28px;
      background: #0f172a;
      color: #cbd5e1;
      margin-top: 30px
    }

    .fgrid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 20px
    }

    @media (max-width:880px) {
      .fgrid {
        grid-template-columns: 1fr
      }
    }

    .foot-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #fff;
      font-weight: 700
    }

    .copyright {
      margin-top: 18px;
      padding-top: 18px;
      border-top: 1px solid rgba(255, 255, 255, .08);
      color: #94a3b8;
      font-size: 13px;
      display: flex;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: wrap;
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header>
    <div class="container nav">
      <a href="#" class="brand" aria-label="General Solutions - Home">
        <span class="brand-badge">GS</span>
        <span>General Solutions</span>
      </a>

      <nav class="nav-links" aria-label="Main navigation">
        <a href="#features">Features</a>
        <a href="#how-it-works">How it works</a>
        <a href="#about">About</a>
        <a class="btn btn-ghost" href="/technicians-create" target="_blank" rel="noopener">Become a technician</a>
        <a class="btn btn-primary text-light" style="color: #fff;" href="#download">Download the app</a>
      </nav>

      <button class="btn btn-ghost menu-toggle" id="menuBtn" aria-label="Open menu">Menu</button>
    </div>

    <div class="container mobile-menu" id="mobileMenu">
      <a href="#features">Features</a>
      <a href="#how-it-works">How it works</a>
      <a href="#about">About</a>
      <a class="btn btn-ghost" href="/technicians-create" target="_blank" rel="noopener">Become a technician</a>
      <a class="btn btn-primary text light" href=" #download">Download the app</a>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <span class="eyebrow">Find professionals near you</span>
        <h1>Hire construction professionals quickly, safely, and transparently.</h1>
        <p>Simple login, accurate geolocation, and verified profiles — all in one app. General Solutions connects those who need with those who solve.</p>
        <div class="hero-ctas">
          <a class="btn btn-primary" href="#download">Download the app</a>
          <a class="btn btn-ghost" href="/technicians-create" target="_blank" rel="noopener">I want to offer services</a>
        </div>
      </div>

      <div class="hero-card" aria-label="Demo">
        <div class="fake-search" role="search">
          <input type="text" placeholder="E.g.: Electrician, Plumber, Builder" aria-label="Professional search" />
          <span class="pill">Near me</span>
        </div>
        <div class="mock-cards" aria-hidden="true">
          <div class="mock">
            <div class="avatar"></div>
            <div>
              <strong>John Smith</strong><br>
              <small>Electrician • 1.2 Miles</small>
            </div>
          </div>
          <div class="mock">
            <div class="avatar" style="background:radial-gradient(120% 120% at 100% 0%, #ffc49a 0%, #ff6a47 45%, #a8200b 100%);"></div>
            <div>
              <strong>Mary Johnson</strong><br>
              <small>Plumber • 1.8 Miles</small>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features">
    <div class="container">
      <div class="section-head">
        <h2>Features that speed up your day</h2>
        <p>From search to contact, everything is designed to be simple and efficient.</p>
      </div>

      <div class="grid-3">
        <div class="card">
          <div class="icon">🔐</div>
          <h3>Secure login</h3>
          <p>Authentication with Google and Apple for quick and safe access.</p>
        </div>
        <div class="card">
          <div class="icon">📍</div>
          <h3>Geolocation</h3>
          <p>See first who is closest to you and save time.</p>
        </div>
        <div class="card">
          <div class="icon">🧰</div>
          <h3>Detailed profiles</h3>
          <p>Experience, services, and contacts in a single clear page.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- How it works -->
  <section id="how-it-works">
    <div class="container">
      <div class="section-head">
        <h2>How it works</h2>
        <p>In three steps you find the right professional.</p>
      </div>

      <div class="steps">
        <div class="step">
          <div class="step-num">1</div>
          <h3>Log in</h3>
          <p>Use your Google or Apple account to log in securely.</p>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <h3>Enable location</h3>
          <p>We automatically show who is closest to you.</p>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <h3>Hire</h3>
          <p>See the profile, copy the contact, and arrange directly with the professional.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="container" id="download">
    <div class="cta">
      <div>
        <h3>Ready to get started?</h3>
        <p>Download the app and find construction professionals near you.</p>
      </div>
      <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <a class="btn btn-ghost" href="https://apps.apple.com/us/app/general-solutions/id6749907081" aria-label="Coming soon on App Store"> Apple Store</a>
        <a class="btn btn-ghost" href="https://apps.apple.com/us/app/general-solutions/id6749907081" aria-label="Coming soon on Google Play">▶ Google Play</a>
        <a class="btn btn-primary" href="/technicians-create" target="_blank" rel="noopener">I want to be a technician</a>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about">
    <div class="container">
      <div class="section-head">
        <h2>About General Solutions</h2>
        <p>A platform created to connect construction professionals with clients and builders.</p>
      </div>
      <div class="grid-3">
        <div class="card">
          <h3>Mission</h3>
          <p>To create fast connections between construction professionals, clients, and builders.</p>
        </div>
        <div class="card">
          <h3>Vision</h3>
          <p>To be the leading digital platform for professional connections in the construction industry.</p>
        </div>
        <div class="card">
          <h3>Values</h3>
          <p>Transparency, agility, inclusion, and respect for the construction professionals' community.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="foot">
    <div class="container">
      <div class="fgrid">
        <div>
          <div class="foot-brand"><span class="brand-badge">GS</span> General Solutions</div>
          <p style="margin:12px 0 0;">Connecting clients and construction professionals with speed and proximity.</p>
        </div>
        <div>
          <small>Links</small><br /><br />
          <a href="#features">Features</a><br />
          <a href="#how-it-works">How it works</a><br />
          <a href="#about">About</a><br />
          <a href="https://bioemfoco.com/technicians-create" target="_blank" rel="noopener">Become a technician</a>
        </div>
        <div>
          <small>Contact</small><br /><br />
          <a href="mailto:support@generalsolutionsclub.com">support@generalsolutionsclub.com</a><br />
          <span style="color:#94a3b8">1661 E SAMPLE RD,POMPANO BEACH FL 33064
          </span>
        </div>
      </div>

      <div class="copyright">
        <span>© <span id="y"></span> General Solutions. All rights reserved.</span>
        <span><a href="#">Terms</a> • <a href="#">Privacy</a></span>
      </div>
    </div>
  </footer>

  <script>
    // mobile menu toggle
    const btn = document.getElementById('menuBtn');
    btn?.addEventListener('click', () => document.body.classList.toggle('mobile-open'));
    // year
    document.getElementById('y').textContent = new Date().getFullYear();
  </script>
</body>

</html>