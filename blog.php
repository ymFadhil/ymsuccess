<?php
$base_url = (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'localhost')
    ? '/ymsuccess/'
    : '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title id="page-title">Blog | YM SUCCESS</title>
  <meta name="description" id="page-desc" content="Insights, news and expertise from YM SUCCESS — your trusted tech software partner.">
  <meta name="robots" content="index, follow">
  <link rel="icon" href="assets/favicon_io/favicon.ico">
  <link rel="canonical" id="canonical" href="">
  <meta property="og:type" id="og-type" content="website">
  <meta property="og:title" id="og-title" content="Blog | YM SUCCESS">
  <meta property="og:description" id="og-desc" content="Insights and expertise from YM SUCCESS.">
  <meta property="og:image" id="og-image" content="">
  <meta property="og:url" id="og-url" content="">
  <meta property="og:site_name" content="YM SUCCESS">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" id="tw-title" content="Blog | YM SUCCESS">
  <meta name="twitter:description" id="tw-desc" content="">
  <meta name="twitter:image" id="tw-image" content="">
  <script type="application/ld+json" id="ld-json">{"@context":"https://schema.org","@type":"Blog","name":"YM SUCCESS Blog","description":"Tech insights from YM SUCCESS"}</script>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="styles.css"/>
  <style>
    html { scroll-behavior: smooth; }

    /* ── READING PROGRESS BAR ── */
    #readingBar {
      position: fixed;
      top: 0;
      left: 0;
      height: 3px;
      width: 0%;
      background: linear-gradient(90deg, #C9A84C, #e8c96a);
      z-index: 9999;
      transition: width 0.15s ease;
    }

    /* ── FILTER BUTTONS ── */
    .blog-filters {
      display: flex;
      gap: 0.45rem;
      align-items: center;
      margin-bottom: 2.5rem;
      flex-wrap: wrap;
    }
    .blog-filter-btn {
      background: transparent;
      border: 1.5px solid rgba(15,14,12,0.15);
      padding: 0.32rem 1rem;
      font-family: 'Outfit', sans-serif;
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: #8A8578;
      cursor: pointer;
      border-radius: 2px;
      transition: all 0.22s ease;
    }
    .blog-filter-btn.active {
      background: #0F0E0C;
      border-color: #0F0E0C;
      color: #F5F2EB;
    }
    .blog-filter-btn:hover:not(.active) {
      border-color: #C9A84C;
      color: #0F0E0C;
      background: rgba(201,168,76,0.06);
    }

    /* ── SECTION DIVIDER ── */
    .blog-section-divider {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .blog-section-divider__line {
      flex: 1;
      height: 1px;
      background: rgba(201,168,76,0.25);
    }
    .blog-section-divider__label {
      font-size: 0.62rem;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: #8A8578;
    }

    /* ── FEATURED CARD ── */
    .blog-card-featured {
      display: grid;
      grid-template-columns: 1.1fr 1fr;
      background: #0F0E0C;
      border-radius: 6px;
      overflow: hidden;
      cursor: pointer;
      margin-bottom: 1.75rem;
      border: 1px solid transparent;
      transition: all 0.3s ease;
    }
    .blog-card-featured:hover {
      border-color: rgba(201,168,76,0.45);
      box-shadow: 0 20px 64px rgba(15,14,12,0.2);
      transform: translateY(-4px);
    }
    .blog-card-featured__img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .blog-card-featured__placeholder {
      min-height: 300px;
      background: #161410;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 5.5rem;
      color: rgba(201,168,76,0.07);
      letter-spacing: 0.1em;
      position: relative;
      overflow: hidden;
    }
    .blog-card-featured__placeholder::after {
      content: '';
      position: absolute;
      inset: 0;
      background: repeating-linear-gradient(
        45deg,
        rgba(201,168,76,0.025) 0px,
        rgba(201,168,76,0.025) 1px,
        transparent 1px,
        transparent 14px
      );
    }
    .blog-card-featured__body {
      padding: 2.75rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 0.5rem;
    }
    .blog-card-featured__super {
      font-size: 0.58rem;
      font-weight: 700;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: rgba(245,242,235,0.25);
      margin-bottom: 0.1rem;
    }
    .blog-card-featured__badge {
      font-size: 0.58rem;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: #C9A84C;
      border: 1px solid rgba(201,168,76,0.3);
      padding: 0.2rem 0.65rem;
      border-radius: 2px;
      display: inline-block;
      width: fit-content;
    }
    .blog-card-featured__date {
      font-size: 0.68rem;
      color: rgba(245,242,235,0.28);
      letter-spacing: 0.06em;
    }
    .blog-card-featured__title {
      font-size: 1.55rem;
      line-height: 1.22;
      color: #F5F2EB;
      font-weight: 700;
    }
    .blog-card-featured__excerpt {
      font-size: 0.82rem;
      color: rgba(245,242,235,0.4);
      line-height: 1.8;
    }
    .blog-card-featured__cta {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #C9A84C;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: 0.4rem;
    }
    .blog-card-featured__cta svg { transition: transform 0.22s; }
    .blog-card-featured:hover .blog-card-featured__cta svg { transform: translateX(5px); }

    /* ── GRID ── */
    .blog-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.25rem;
    }

    /* ── REGULAR CARD ── */
    .blog-card {
      background: #fff;
      border: 1px solid #EAE6DB;
      border-radius: 6px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.28s ease;
      display: flex;
      flex-direction: column;
    }
    .blog-card:hover {
      transform: translateY(-6px);
      border-color: rgba(201,168,76,0.5);
      box-shadow: 0 20px 48px rgba(15,14,12,0.1);
    }
    .blog-card__img-wrap {
      position: relative;
      overflow: hidden;
      aspect-ratio: 16/9;
    }
    .blog-card__img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.55s ease;
    }
    .blog-card:hover .blog-card__img { transform: scale(1.05); }
    .blog-card__placeholder {
      position: relative;
      aspect-ratio: 16/9;
      background: linear-gradient(135deg, #EDE9DF, #E0DDD4);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2.8rem;
      color: rgba(15,14,12,0.08);
      letter-spacing: 0.1em;
    }
    .blog-card__cat-pill {
      position: absolute;
      top: 0.75rem;
      left: 0.75rem;
      font-size: 0.58rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      background: #C9A84C;
      color: #0F0E0C;
      padding: 0.2rem 0.6rem;
      border-radius: 2px;
      z-index: 1;
    }
    .blog-card__body {
      padding: 1.25rem;
      display: flex;
      flex-direction: column;
      flex: 1;
      gap: 0.45rem;
    }
    .blog-card__meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .blog-card__date {
      font-size: 0.67rem;
      color: #8A8578;
      letter-spacing: 0.04em;
    }
    .blog-card__num {
      font-size: 0.67rem;
      font-weight: 700;
      color: rgba(201,168,76,0.65);
      letter-spacing: 0.05em;
    }
    .blog-card__title {
      font-size: 0.98rem;
      line-height: 1.3;
      color: #0F0E0C;
      font-weight: 700;
    }
    .blog-card__excerpt {
      font-size: 0.79rem;
      color: #8A8578;
      line-height: 1.75;
      flex: 1;
    }
    .blog-card__foot {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 0.6rem;
      padding-top: 0.85rem;
      border-top: 1px solid #EAE6DB;
    }
    .blog-card__cta {
      font-size: 0.63rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #0F0E0C;
      display: flex;
      align-items: center;
      gap: 0.35rem;
    }
    .blog-card__cta svg { transition: transform 0.2s; }
    .blog-card:hover .blog-card__cta svg { transform: translateX(4px); }
    .blog-card__arrow {
      width: 22px;
      height: 22px;
      background: #0F0E0C;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: background 0.22s;
    }
    .blog-card:hover .blog-card__arrow { background: #C9A84C; }

    /* ── SPINNER / EMPTY ── */
    .blog-spinner {
      grid-column: 1/-1;
      display: flex;
      justify-content: center;
      padding: 4rem;
    }
    .blog-spinner::after {
      content: '';
      width: 28px; height: 28px;
      border: 2px solid #EAE6DB;
      border-top-color: #C9A84C;
      border-radius: 50%;
      animation: ym-spin 0.7s linear infinite;
    }
    @keyframes ym-spin { to { transform: rotate(360deg); } }

    .blog-empty {
      grid-column: 1/-1;
      text-align: center;
      padding: 5rem 2rem;
      color: #8A8578;
    }
    .blog-empty h3 { font-size: 1.5rem; color: #0F0E0C; margin-bottom: 0.5rem; }

    /* ── PAGINATION ── */
    .blog-pagination {
      display: flex;
      justify-content: center;
      gap: 0.4rem;
      margin-top: 3rem;
    }
    .blog-page-btn {
      width: 36px; height: 36px;
      background: transparent;
      border: 1.5px solid rgba(15,14,12,0.15);
      color: #8A8578;
      font-family: 'Outfit', sans-serif;
      font-size: 0.8rem;
      cursor: pointer;
      border-radius: 2px;
      transition: all 0.2s;
    }
    .blog-page-btn:hover:not(:disabled) {
      background: #0F0E0C;
      color: #F5F2EB;
      border-color: #0F0E0C;
    }
    .blog-page-btn.active {
      background: #C9A84C;
      border-color: #C9A84C;
      color: #0F0E0C;
      font-weight: 700;
    }
    .blog-page-btn:disabled { opacity: 0.3; cursor: not-allowed; }

    /* ── POST BODY ── */
    .blog-post-body {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 4rem;
      line-height: 1.9;
    }

    /* ── POST CONTENT TYPOGRAPHY ── */
    .blog-post-content h2 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      letter-spacing: 0.03em;
      color: #0F0E0C;
      margin: 2.5rem 0 0.85rem;
    }
    .blog-post-content h3 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.4rem;
      letter-spacing: 0.03em;
      color: #0F0E0C;
      margin: 2rem 0 0.7rem;
    }
    .blog-post-content p {
      margin-bottom: 1.15rem;
      color: #2a2824;
    }
    .blog-post-content a {
      color: #C9A84C;
      text-decoration: none;
      border-bottom: 1px solid rgba(201,168,76,0.3);
      transition: border-color 0.2s;
    }
    .blog-post-content a:hover { border-bottom-color: #C9A84C; }
    .blog-post-content blockquote {
      border-left: 3px solid #C9A84C;
      padding: 0.75rem 1.25rem;
      background: #FAF8F3;
      margin: 1.5rem 0;
      font-style: italic;
      color: #8A8578;
    }
    .blog-post-content ul, .blog-post-content ol {
      padding-left: 1.5rem;
      margin-bottom: 1.2rem;
    }
    .blog-post-content li { margin-bottom: 0.4rem; }
    .blog-post-content code {
      background: rgba(15,14,12,0.06);
      padding: 0.15rem 0.4rem;
      border-radius: 3px;
      font-family: monospace;
      font-size: 0.85em;
    }

    /* ── TAGS ── */
    .blog-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.4rem;
      margin-bottom: 2rem;
    }
    .blog-tag {
      font-size: 0.62rem;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      background: rgba(201,168,76,0.08);
      color: #C9A84C;
      border: 1px solid rgba(201,168,76,0.22);
      padding: 0.22rem 0.7rem;
      border-radius: 2px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .blog-tag:hover { background: #C9A84C; color: #0F0E0C; }

    /* ── BACK BUTTON ── */
    .blog-back {
      display: inline-flex;
      align-items: center;
      gap: 0.45rem;
      font-size: 0.68rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #8A8578;
      text-decoration: none;
      margin-bottom: 1.75rem;
      transition: color 0.2s;
    }
    .blog-back:hover { color: #C9A84C; }

    /* ── RELATED POSTS ── */
    .related-box {
      margin-top: 3.5rem;
      padding-top: 2rem;
      border-top: 1px solid #EAE6DB;
    }
    .related-box h3 {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: #8A8578;
      margin-bottom: 1.1rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }
    .related-box h3::before { content: ''; width: 18px; height: 1px; background: #C9A84C; }
    .related-items-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 0.85rem;
    }
    .related-item {
      padding: 1.1rem;
      border: 1px solid #EAE6DB;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.22s;
      background: #FAF8F3;
    }
    .related-item:hover {
      border-color: rgba(201,168,76,0.45);
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(15,14,12,0.07);
    }
    .related-item__cat {
      font-size: 0.58rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #C9A84C;
      margin-bottom: 0.4rem;
    }
    .related-item__title {
      font-size: 0.87rem;
      font-weight: 700;
      color: #0F0E0C;
      line-height: 1.35;
    }

    /* ── ADS BOX ── */
    .ad-box {
      background: linear-gradient(135deg, #0F0E0C 0%, #1a1814 100%);
      color: #fff;
      padding: 2.25rem;
      border-radius: 6px;
      margin: 3rem 0;
      border: 1px solid rgba(201,168,76,0.28);
      position: relative;
      overflow: hidden;
    }
    .ad-box::before {
      content: '';
      position: absolute;
      top: -40px; right: -40px;
      width: 120px; height: 120px;
      border-radius: 50%;
      background: rgba(201,168,76,0.06);
    }
    .ad-label {
      font-size: 0.6rem;
      color: #C9A84C;
      margin-bottom: 0.6rem;
      text-transform: uppercase;
      letter-spacing: 0.18em;
      font-weight: 700;
    }
    .ad-box h3 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.9rem;
      letter-spacing: 0.04em;
      color: #fff;
      margin-bottom: 0.5rem;
    }
    .ad-box p {
      color: rgba(245,242,235,0.5);
      font-size: 0.84rem;
      line-height: 1.7;
      max-width: 440px;
      margin-bottom: 1.25rem;
    }
    .ad-btn {
      display: inline-block;
      margin-top: 0;
      background: #C9A84C;
      color: #0F0E0C;
      padding: 0.65rem 1.4rem;
      font-weight: 700;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      text-decoration: none;
      border-radius: 2px;
      transition: all 0.2s;
    }
    .ad-btn:hover { background: #fff; color: #0F0E0C; }

    /* ── HERO ── */
    .blog-hero {
      background: linear-gradient(160deg, #FAF8F3 0%, #EDE9DF 100%);
      border-bottom: 1px solid #EAE6DB;
      padding: 7rem 6% 3.5rem;
    }
    .blog-hero__inner { max-width: 720px; margin: 0 auto; }
    .blog-hero__title span { color: #C9A84C; }

    /* ── SEARCH ── */
    .blog-search {
      display: flex;
      max-width: 480px;
      border: 1.5px solid #EAE6DB;
      border-radius: 4px;
      overflow: hidden;
      background: #fff;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .blog-search:focus-within {
      border-color: rgba(201,168,76,0.6);
      box-shadow: 0 0 0 3px rgba(201,168,76,0.1);
    }
    .blog-search input {
      flex: 1;
      border: none;
      outline: none;
      padding: 0.9rem 1.1rem;
      font-family: 'Outfit', sans-serif;
      font-size: 0.9rem;
      color: #0F0E0C;
      background: transparent;
      min-width: 0;
    }
    .blog-search input::placeholder { color: #B5B0A6; }
    .blog-search button {
      flex-shrink: 0;
      border: none;
      background: #0F0E0C;
      color: #fff;
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 0.72rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      padding: 0 1.5rem;
      cursor: pointer;
      transition: background 0.2s;
    }
    .blog-search button:hover { background: #C9A84C; color: #0F0E0C; }

    /* ── POST HERO ── */
    .blog-post-hero {
      background: linear-gradient(160deg, #FAF8F3 0%, #EDE9DF 100%);
      padding: 5rem 6% 3rem;
      border-bottom: 1px solid #EAE6DB;
    }
    .blog-post-hero h1 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(2.2rem, 4vw, 3.8rem);
      line-height: 0.95;
      letter-spacing: 0.02em;
      color: #0F0E0C;
      max-width: 800px;
      margin-bottom: 1.1rem;
    }
    .blog-breadcrumb {
      font-size: 1rem;
      color: #8A8578;
      margin-bottom: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }
    .blog-breadcrumb a {
      color: #C9A84C;
      text-decoration: none;
      font-weight: 600;
      transition: opacity 0.2s;
    }
    .blog-breadcrumb a:hover { opacity: 0.75; }
    .blog-post-meta {
      display: flex;
      align-items: center;
      gap: 1rem;
      font-size: 1rem;
      color: #8A8578;
    }
    .blog-post-meta span + span::before {
      content: '·';
      margin-right: 1rem;
      opacity: 0.4;
    }

    /* ── COVER IMAGE ── */
    .blog-cover-wrapper {
      display: flex;
      justify-content: center;
      padding: 20px 0;
    }

    .blog-post-cover {
      width: 100%;
      max-width: 900px;
      max-height: 500px;
      object-fit: cover;

      border-radius: 16px;
      border: 1px solid rgba(0,0,0,0.06);
      box-shadow: 0 12px 35px rgba(0,0,0,0.15);

      transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    }

    .blog-post-cover:hover {
      transform: scale(1.01);
    }

    /* ─────────────────────────────
       DARK MODE — COMPLETE SYSTEM
    ───────────────────────────── */
    body.dark { background: #0D0C0A; color: #F5F2EB; }
    body.dark p, body.dark li, body.dark span { color: rgba(245,242,235,0.75); }

    body.dark nav { background: #0D0C0A; border-bottom: 1px solid rgba(255,255,255,0.07); }
    body.dark nav a { color: #F5F2EB; }
    
    body.dark .blog-post-cover {
      border: 1px solid rgba(255, 255, 255, 0.12);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.6);
    }

    body.dark .blog-hero { background: linear-gradient(160deg, #141210 0%, #0d0c0a 100%); border-bottom-color: rgba(255,255,255,0.07); }
    body.dark .blog-hero__title { color: #fff; }
    body.dark .blog-hero__lead, body.dark .blog-hero .eyebrow span { color: rgba(245,242,235,0.5); }
    body.dark .blog-search { background: #1a1814; border-color: rgba(255,255,255,0.1); }
    body.dark .blog-search input { color: #F5F2EB; }
    body.dark .blog-search input::placeholder { color: rgba(245,242,235,0.3); }

    body.dark .blog-filter-btn { border-color: rgba(255,255,255,0.12); color: rgba(245,242,235,0.55); }
    body.dark .blog-filter-btn.active { background: #C9A84C; border-color: #C9A84C; color: #0F0E0C; }
    body.dark .blog-filter-btn:hover:not(.active) { border-color: #C9A84C; color: #fff; background: rgba(201,168,76,0.08); }

    body.dark .blog-card-featured { background: #151311; border-color: rgba(255,255,255,0.07); }
    body.dark .blog-card-featured__placeholder { background: #1c1a16; }
    body.dark .blog-card-featured__title { color: #fff; }
    body.dark .blog-card-featured__excerpt { color: rgba(245,242,235,0.4); }

    body.dark .blog-card { background: #151311; border-color: rgba(255,255,255,0.07); }
    body.dark .blog-card:hover { border-color: rgba(201,168,76,0.4); }
    body.dark .blog-card__placeholder { background: linear-gradient(135deg, #1c1a16, #171512); }
    body.dark .blog-card__title { color: #fff; }
    body.dark .blog-card__excerpt { color: rgba(245,242,235,0.55); }
    body.dark .blog-card__date { color: rgba(245,242,235,0.4); }
    body.dark .blog-card__foot { border-top-color: rgba(255,255,255,0.07); }
    body.dark .blog-card__cta { color: rgba(245,242,235,0.7); }

    body.dark .blog-section-divider__line { background: rgba(201,168,76,0.18); }
    body.dark .blog-section-divider__label { color: rgba(245,242,235,0.35); }

    body.dark .blog-page-btn { border-color: rgba(255,255,255,0.12); color: rgba(245,242,235,0.45); }
    body.dark .blog-page-btn:hover:not(:disabled) { background: #F5F2EB; color: #0F0E0C; border-color: #F5F2EB; }
    body.dark .blog-page-btn.active { background: #C9A84C; border-color: #C9A84C; color: #0F0E0C; }

    body.dark .blog-post-hero { background: linear-gradient(160deg, #111009 0%, #141210 100%); border-bottom-color: rgba(255,255,255,0.07); }
    body.dark .blog-post-hero h1 { color: #fff; }
    body.dark .blog-post-meta { color: rgba(245,242,235,0.45); }
    body.dark .blog-breadcrumb { color: rgba(245,242,235,0.4); }

    body.dark .blog-post-body { background: #0F0E0C; }
    body.dark .blog-post-content { color: rgba(245,242,235,0.82); }
    body.dark .blog-post-content h2, body.dark .blog-post-content h3 { color: #fff; }
    body.dark .blog-post-content a { color: #C9A84C; }
    body.dark .blog-post-content blockquote { background: #151311; border-left-color: #C9A84C; color: rgba(245,242,235,0.55); }
    body.dark .blog-post-content code { background: rgba(255,255,255,0.08); }
    body.dark .blog-post-content p { color: rgba(245,242,235,0.78); }

    body.dark .blog-back {
      background: linear-gradient(145deg, #1b1b1b, #151515);
      color: #e5e5e5;

      border: 1px solid rgba(255,255,255,0.08);
      box-shadow: 0 10px 25px rgba(0,0,0,0.6);

      border-radius: 14px;
    }
    body.dark .blog-back { color: rgba(245,242,235,0.45); }
    body.dark .blog-back:hover { color: #C9A84C; }

    body.dark .blog-tags { background: transparent; }
    body.dark .blog-tag { background: rgba(201,168,76,0.1); color: #C9A84C; border-color: rgba(201,168,76,0.22); }
    body.dark .blog-tag:hover { background: #C9A84C; color: #0F0E0C; }

    body.dark .related-box { border-top-color: rgba(255,255,255,0.08); }
    body.dark .related-box h3 { color: rgba(245,242,235,0.35); }
    body.dark .related-item { background: #151311; border-color: rgba(255,255,255,0.07); }
    body.dark .related-item:hover { border-color: rgba(201,168,76,0.4); }
    body.dark .related-item__title { color: #fff; }

    body.dark .ad-box { background: linear-gradient(135deg, #1a1814 0%, #111009 100%); border-color: rgba(201,168,76,0.22); }
    body.dark .ad-box p { color: rgba(245,242,235,0.5); }

    body.dark #readingBar { background: linear-gradient(90deg, #C9A84C, #e8c96a); }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
      .blog-grid { grid-template-columns: repeat(2, 1fr); }
      .blog-card-featured { grid-template-columns: 1fr; }
      .blog-card-featured__placeholder { min-height: 200px; }
      .related-items-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
      .blog-grid { grid-template-columns: 1fr; }
      .related-items-grid { grid-template-columns: 1fr; }
      .blog-post-body { padding: 2rem 1.5rem; }
    }
  </style>
</head>

<div id="readingBar"></div>
<body class="page-blog">

  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <nav>
    <a href="<?= $base_url ?>" class="logo logo--img" aria-label="YMSUCCESS — home">
      <img src="assets/backgroud_picture/logo-ym.png" alt="YMSUCCESS Logo — Web Building Malaysia" width="160" height="64" decoding="async" fetchpriority="high"/>
      <div class="logo-txt">YM<span>SUCCESS</span></div>
    </a>
    <button type="button" class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Open menu">
      <span class="nav-toggle__bar" aria-hidden="true"></span>
      <span class="nav-toggle__bar" aria-hidden="true"></span>
      <span class="nav-toggle__bar" aria-hidden="true"></span>
    </button>
    <ul id="mainNav" class="nav-links">
    <li><a href="<?= $base_url ?>#packages">Packages</a></li>
    <li><a href="<?= $base_url ?>#process">Process</a></li>
    <li><a href="<?= $base_url ?>#services">Services</a></li>
    <li><a href="<?= $base_url ?>blog">Blog</a></li>
    <li><a href="<?= $base_url ?>#why">Why Us</a></li>
    <li role="none"><a href="#live-projects" role="menuitem">Portfolio</a></li>
    <li><a href="<?= $base_url ?>#cta" class="nav-cta">Get Started</a></li>
      <button id="darkToggle" class="blog-filter-btn">Dark Mode</button>
    </ul>
  </nav>
  <div class="nav-backdrop" aria-hidden="true"></div>

  <!-- LIST VIEW -->
  <div id="list-view">
    <header class="blog-hero">
      <div class="blog-hero__inner">
        <div class="eyebrow">
          <div class="eyebrow-line"></div>
          <span>YM SUCCESS Insights</span>
        </div>
        <h1 class="blog-hero__title">Tech Knowledge,<br/> Real Results</h1>
        <p class="blog-hero__lead">Latest articles, guides and updates from our team of software experts.</p>
        <div class="blog-search">
          <input type="text" id="search-input" placeholder="Search articles..." aria-label="Search posts">
          <button type="button" onclick="doSearch()">Search</button>
        </div>
      </div>
    </header>

    <div class="blog-list-wrap">
      <div class="max-w">
        <div class="blog-filters" id="cat-bar">
          <button type="button" class="blog-filter-btn active" onclick="filterCat('')" data-cat="">All</button>
        </div>
        <div class="blog-section">
          <div id="featured-wrap"></div>
          <div class="blog-section-divider" id="more-divider" style="display:none">
            <div class="blog-section-divider__line"></div>
            <span class="blog-section-divider__label">More Articles</span>
            <div class="blog-section-divider__line"></div>
          </div>
          <div class="blog-grid" id="posts-grid"></div>
          <div class="blog-pagination" id="pagination"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- SINGLE POST VIEW -->
  <div id="post-view">
    <div class="blog-post-hero"><br>
      <div class="blog-breadcrumb">
        <a href="<?= $base_url ?>blog" onclick="showList();return false;">Blog</a> &rsaquo; <span id="post-cat-crumb"></span>
      </div>
      <h1 id="post-title-el"></h1>
      <div class="blog-post-meta">
        <span id="post-date-el"></span>
        <span id="post-cat-el"></span>
      </div>
    </div>
    <div class="blog-cover-wrapper">
      <img id="post-cover" class="blog-post-cover" src="" alt="" style="display:none">
    </div>
    <article class="blog-post-body">
      <a href="" class="blog-back" onclick="showList();return false;">&#8592; Back</a>
      <div id="post-tags" class="blog-tags"></div>
      <div id="post-html" class="blog-post-content"></div>

      <!-- ADS MID ARTICLE -->
      <div class="ad-box">
        <div class="ad-label">Sponsored by YMSUCCESS</div>
        <h3>Build Your Website with Experts</h3>
        <p>Kami bantu business anda buat website professional, laju & SEO-ready. Dari landing page sampai sistem custom.</p>
        <a href="<?= $base_url ?>#cta" class="ad-btn">Get Free Consultation</a>
      </div>

      <div id="relatedPosts" class="related-box"></div>
      <a href="<?= $base_url ?>blog" class="blog-back" onclick="showList();return false;" style="margin-top:3rem">&#8592; Back</a>
    </article>

<?php include __DIR__ . '/footer.php'; ?>

<script src="script.js"></script>
<script>
const API = 'api.php';
const apiUrl = (r, params={}) => {
  const q = new URLSearchParams({r, ...params});
  return `${API}?${q.toString()}`;
};
let curPage=1, curCat='', curSearch='', totalPages=1;
document.getElementById('canonical').href = location.href;

function e(s) {
  return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

async function loadPosts(page=1) {
  curPage = page;
  document.getElementById('posts-grid').innerHTML = '<div class="blog-spinner"></div>';
  document.getElementById('featured-wrap').innerHTML = '';
  document.getElementById('more-divider').style.display = 'none';
  const p = new URLSearchParams({page, limit:7});
  if (curCat)    p.set('category', curCat);
  if (curSearch) p.set('search',   curSearch);
  try {
    const r = await fetch(apiUrl('posts', Object.fromEntries(p.entries())));
    const d = await r.json();
    totalPages = d.pages || 1;
    renderPosts(d.posts || []);
    renderPagination();
  } catch {
    document.getElementById('posts-grid').innerHTML = '<div class="blog-empty"><h3>Could not load posts</h3><p>Check your API connection.</p></div>';
  }
}

function renderPosts(posts) {
  const fw = document.getElementById('featured-wrap');
  const g  = document.getElementById('posts-grid');
  const md = document.getElementById('more-divider');

  if (!posts.length) {
    fw.innerHTML = '';
    md.style.display = 'none';
    g.innerHTML = '<div class="blog-empty"><h3>No posts found</h3><p>Try a different search or category.</p></div>';
    return;
  }

  const [first, ...rest] = posts;
  const fdt = new Date(first.created_at).toLocaleDateString('en-MY', {day:'numeric', month:'short', year:'numeric'});
  const fImg = first.cover_image
    ? `<img class="blog-card-featured__img" src="${e(first.cover_image)}" alt="${e(first.title)}">`
    : `<div class="blog-card-featured__placeholder">YM</div>`;

  fw.innerHTML = `
    <div class="blog-card-featured" onclick="loadPost('${e(first.slug)}')" tabindex="0" onkeydown="if(event.key==='Enter')loadPost('${e(first.slug)}')">
      ${fImg}
      <div class="blog-card-featured__body">
        <div class="blog-card-featured__super">Featured Article</div>
        ${first.category ? `<span class="blog-card-featured__badge">${e(first.category)}</span>` : ''}
        <div class="blog-card-featured__date">${fdt}</div>
        <div class="blog-card-featured__title">${e(first.title)}</div>
        <div class="blog-card-featured__excerpt">${e(first.excerpt || '')}</div>
        <div class="blog-card-featured__cta">Read Article
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </div>
      </div>
    </div>`;

  if (rest.length) {
    md.style.display = 'flex';
    g.innerHTML = rest.map((p, i) => {
      const dt  = new Date(p.created_at).toLocaleDateString('en-MY', {day:'numeric', month:'short', year:'numeric'});
      const num = String(i + 2).padStart(2, '0');
      const img = p.cover_image
        ? `<div class="blog-card__img-wrap">
             <img class="blog-card__img" src="${e(p.cover_image)}" alt="${e(p.title)}" loading="lazy">
             ${p.category ? `<span class="blog-card__cat-pill">${e(p.category)}</span>` : ''}
           </div>`
        : `<div class="blog-card__placeholder">
             YM
             ${p.category ? `<span class="blog-card__cat-pill">${e(p.category)}</span>` : ''}
           </div>`;
      return `
        <article class="blog-card" onclick="loadPost('${e(p.slug)}')" tabindex="0" onkeydown="if(event.key==='Enter')loadPost('${e(p.slug)}')">
          ${img}
          <div class="blog-card__body">
            <div class="blog-card__meta">
              <span class="blog-card__date">${dt}</span>
              <span class="blog-card__num">#${num}</span>
            </div>
            <h2 class="blog-card__title">${e(p.title)}</h2>
            <p class="blog-card__excerpt">${e(p.excerpt || '')}</p>
            <div class="blog-card__foot">
              <span class="blog-card__cta">Read more
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
              <div class="blog-card__arrow">
                <svg width="10" height="10" fill="none" stroke="#F5F2EB" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </div>
            </div>
          </div>
        </article>`;
    }).join('');
  } else {
    md.style.display = 'none';
    g.innerHTML = '';
  }
}

async function loadPost(slug) {
  document.getElementById('list-view').style.display = 'none';
  document.getElementById('post-view').style.display = 'block';
  document.getElementById('post-html').innerHTML = '<div class="blog-spinner"></div>';
  window.scrollTo(0,0);
  try {
    const r    = await fetch(apiUrl('posts', {id: slug}));
    const post = await r.json();
    if (post.error) throw new Error();
    const dt = new Date(post.created_at).toLocaleDateString('en-MY', {day:'numeric', month:'long', year:'numeric'});
    document.getElementById('post-title-el').textContent  = post.title;
    document.getElementById('post-date-el').textContent   = dt;
    document.getElementById('post-cat-el').textContent    = post.category || '';
    document.getElementById('post-cat-crumb').textContent = post.category || 'Article';
    const cov = document.getElementById('post-cover');
    if (post.cover_image) { cov.src = post.cover_image; cov.alt = post.title; cov.style.display = 'block'; }
    else cov.style.display = 'none';
    document.getElementById('post-html').innerHTML  = post.content;
    document.getElementById('post-tags').innerHTML  = post.tags
      ? post.tags.split(',').map(t => `<span class="blog-tag">${e(t.trim())}</span>`).join('') : '';
    const url = `${location.origin}${location.pathname}?post=${slug}`;
    document.title = `${post.meta_title || post.title} | YM SUCCESS`;
    sm('page-desc', post.meta_description || post.excerpt);
    sm('og-title',  post.meta_title || post.title);
    sm('og-desc',   post.meta_description || post.excerpt);
    sm('og-image',  post.cover_image || '');
    sm('og-type',   'article');
    sm('og-url',    url);
    sm('tw-title',  post.meta_title || post.title);
    sm('tw-desc',   post.meta_description || post.excerpt);
    sm('tw-image',  post.cover_image || '');
    document.getElementById('canonical').href = url;
    history.pushState({slug}, '', `?post=${slug}`);
    document.getElementById('ld-json').textContent = JSON.stringify({
      "@context":"https://schema.org","@type":"BlogPosting",
      "headline":post.title,"description":post.excerpt||'',
      "image":post.cover_image||'','datePublished':post.created_at,
      "dateModified":post.updated_at,
      "author":{"@type":"Organization","name":"YM SUCCESS"},
      "publisher":{"@type":"Organization","name":"YM SUCCESS","url":location.origin},
      "url":url,"keywords":post.tags||''
    });
    loadRelated(post);
  } catch {
    document.getElementById('post-html').innerHTML = '<p>Post not found.</p>';
  }
}

function showList() {
  document.getElementById('list-view').style.display = 'block';
  document.getElementById('post-view').style.display = 'none';
  document.title = 'Blog | YM SUCCESS';
  history.pushState({}, '', location.pathname);
}

async function loadCategories() {
  try {
    const r = await fetch(apiUrl('categories'));
    const d = await r.json();
    const bar = document.getElementById('cat-bar');
    (d.categories || []).forEach(cat => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'blog-filter-btn';
      btn.textContent = cat;
      btn.dataset.cat = cat;
      btn.onclick = () => filterCat(cat);
      bar.appendChild(btn);
    });
  } catch {}
}

function filterCat(cat) {
  curCat = cat; curSearch = '';
  document.getElementById('search-input').value = '';
  document.querySelectorAll('.blog-filter-btn').forEach(b => b.classList.toggle('active', b.dataset.cat === cat));
  loadPosts(1);
}

function doSearch() {
  curSearch = document.getElementById('search-input').value.trim();
  curCat = '';
  document.querySelectorAll('.blog-filter-btn').forEach(b => b.classList.toggle('active', b.dataset.cat === ''));
  loadPosts(1);
}

document.getElementById('search-input').addEventListener('keydown', ev => { if (ev.key === 'Enter') doSearch(); });

function renderPagination() {
  const el = document.getElementById('pagination');
  if (totalPages <= 1) { el.innerHTML = ''; return; }
  let h = `<button type="button" class="blog-page-btn" onclick="loadPosts(${curPage-1})" ${curPage===1?'disabled':''}>&#8249;</button>`;
  for (let i=1; i<=totalPages; i++)
    h += `<button type="button" class="blog-page-btn${i===curPage?' active':''}" onclick="loadPosts(${i})">${i}</button>`;
  h += `<button type="button" class="blog-page-btn" onclick="loadPosts(${curPage+1})" ${curPage===totalPages?'disabled':''}>&#8250;</button>`;
  el.innerHTML = h;
}

function sm(id, v) { const el = document.getElementById(id); if (el) el.content = v || ''; }

window.addEventListener('popstate', () => {
  const s = new URLSearchParams(location.search).get('post');
  if (s) loadPost(s); else showList();
});

const initSlug = new URLSearchParams(location.search).get('post');
loadCategories();
if (initSlug) loadPost(initSlug); else loadPosts(1);
</script>

<script>
const toggle = document.getElementById("darkToggle");
toggle.addEventListener("click", () => {
  document.body.classList.toggle("dark");
  localStorage.setItem("dark", document.body.classList.contains("dark"));
  toggle.textContent = document.body.classList.contains("dark") ? "Light Mode" : "Dark Mode";
});
window.addEventListener("load", () => {
  if (localStorage.getItem("dark") === "true") {
    document.body.classList.add("dark");
    toggle.textContent = "Light Mode";
  }
});
window.addEventListener("scroll", () => {
  const scrollTop = window.scrollY;
  const docHeight = document.body.scrollHeight - window.innerHeight;
  const progress = (scrollTop / docHeight) * 100;
  document.getElementById("readingBar").style.width = progress + "%";
});
</script>

<script>
function loadRelated(currentPost) {
  const box = document.getElementById("relatedPosts");
  if (!box) return;

  /* In production this would fetch from API. For now a static demo: */
  const sample = [
    { title: "Kenapa Website Lama Perlu Redesign", cat: "Web Dev" },
    { title: "Kos Website Malaysia 2026",           cat: "Business" },
    { title: "SEO Basics Untuk Business Kecil",     cat: "SEO" }
  ];

  box.innerHTML = `<h3>Related Articles</h3>
    <div class="related-items-grid">
      ${sample.map(item => `
        <div class="related-item">
          <div class="related-item__cat">${item.cat}</div>
          <div class="related-item__title">${item.title}</div>
        </div>
      `).join('')}
    </div>`;
}

window.addEventListener("load", () => {
  /* loadRelated is now called from loadPost() after content renders */
});
</script>

</body>
</html>