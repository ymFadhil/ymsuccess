<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Free invoice generator Malaysia. Create professional invoices, quotations, receipts & purchase orders instantly.">
  <meta name="keywords" content="invoice generator malaysia, free invoice generator, create invoice online, invoice maker, quotation generator">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://ymsuccess.com/invoice-generate">
  <meta property="og:title" content="Free Invoice Generator – YM Success">
  <meta property="og:description" content="Create invoices instantly. Free, fast and professional.">
  <meta property="og:url" content="https://ymsuccess.com/invoice-generate">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://ymsuccess.com/assets/backgroud_picture/logo-ym.png">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Free Invoice Generator – YM Success">
  <meta name="twitter:description" content="Generate invoices online instantly.">
  <link rel="icon" href="assets/favicon_io/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="styles.css"/>
  <title>Free Invoice Generator Malaysia | Create Invoice Online – YM Success</title>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --accent: #185FA5;
      --accent-light: #e8f2fc;
      --accent-mid: #b5d4f4;
      --accent-dark: #0c447c;
      --bg: #f2f1ed;
      --surface: #ffffff;
      --panel: #faf9f7;
      --border: rgba(0,0,0,0.08);
      --border-md: rgba(0,0,0,0.14);
      --text: #1a1917;
      --muted: #6b6963;
      --faint: #a8a5a0;
      --danger: #a32d2d;
      --danger-bg: #fcebeb;
      --radius: 10px;
      --radius-lg: 16px;
      --radius-xl: 22px;
      --shadow-card: 0 1px 3px rgba(0,0,0,0.06), 0 8px 32px rgba(0,0,0,0.06);
      --shadow-doc: 0 2px 8px rgba(0,0,0,0.05), 0 20px 60px rgba(0,0,0,0.1);
      /* Fixed site nav (see styles.css) */
      --nav-fixed-h: 80px;
    }

    body.page-invoice-gen {
      font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    .invoice-page-shell {
      padding-top: var(--nav-fixed-h);
    }

    /* ─── LAYOUT ─── */
    .layout {
      display: grid;
      grid-template-columns: 280px 1fr;
      min-height: calc(100vh - var(--nav-fixed-h));
    }

    /* ─── PANEL ─── */
    .panel {
      background: var(--panel);
      border-right: 1px solid var(--border);
      padding: 20px 16px;
      position: sticky;
      top: var(--nav-fixed-h);
      height: calc(100vh - var(--nav-fixed-h));
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: var(--border-md) transparent;
    }

    .panel-section {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 14px;
      margin-bottom: 10px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }

    .panel-section-title {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--faint);
      margin-bottom: 10px;
    }

    /* doc type pills */
    .type-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5px; }
    .type-pill {
      padding: 7px 6px; font-size: 12px; font-weight: 500;
      font-family: inherit; cursor: pointer; text-align: center;
      border-radius: 8px; border: 1px solid var(--border-md);
      background: transparent; color: var(--muted);
      transition: all 0.15s;
    }
    .type-pill:hover { color: var(--accent); border-color: var(--accent-mid); background: var(--accent-light); }
    .type-pill.active {
      background: var(--accent); color: white; border-color: var(--accent);
      box-shadow: 0 2px 8px rgba(24,95,165,0.25);
    }

    /* upload zone */
    .upload-zone {
      border: 1.5px dashed var(--border-md);
      border-radius: var(--radius);
      padding: 16px 10px;
      text-align: center;
      cursor: pointer;
      transition: all 0.15s;
      color: var(--muted);
    }
    .upload-zone:hover, .upload-zone.drag {
      border-color: var(--accent);
      background: var(--accent-light);
      color: var(--accent-dark);
    }
    .upload-zone svg { width: 20px; height: 20px; opacity: 0.5; margin-bottom: 6px; }
    .upload-zone p { font-size: 11px; line-height: 1.5; }

    .logo-preview {
      display: none;
      align-items: center;
      gap: 8px;
      padding: 8px 10px;
      background: var(--accent-light);
      border-radius: var(--radius);
      border: 1px solid var(--accent-mid);
    }
    .logo-preview img { max-width: 48px; max-height: 28px; object-fit: contain; border-radius: 4px; }
    .logo-preview-name { font-size: 11px; color: var(--muted); flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .logo-rm-btn {
      background: none; border: none; cursor: pointer;
      font-size: 14px; color: var(--faint); padding: 2px;
      border-radius: 4px; line-height: 1;
    }
    .logo-rm-btn:hover { color: var(--danger); background: var(--danger-bg); }

    .logo-size-row {
      display: none;
      align-items: center;
      gap: 8px;
      margin-top: 8px;
    }
    .logo-size-row label { font-size: 11px; color: var(--muted); white-space: nowrap; }
    .logo-size-row input[type=range] { flex: 1; accent-color: var(--accent); }
    .logo-size-row .sz { font-size: 11px; color: var(--faint); min-width: 32px; }

    /* color dots */
    .color-row { display: flex; gap: 6px; flex-wrap: wrap; }
    .color-dot {
      width: 24px; height: 24px; border-radius: 50%; cursor: pointer;
      border: 2.5px solid transparent; transition: all 0.15s;
    }
    .color-dot:hover { transform: scale(1.1); }
    .color-dot.selected { border-color: var(--text); box-shadow: 0 0 0 3px rgba(0,0,0,0.08); }

    /* inputs */
    .p-input {
      width: 100%; padding: 7px 10px;
      font-size: 12px; font-family: inherit;
      border: 1px solid var(--border-md); border-radius: 8px;
      background: var(--bg); color: var(--text);
      margin-bottom: 6px; transition: border-color 0.15s;
    }
    .p-input:focus { outline: none; border-color: var(--accent); background: white; }
    .p-input:last-child { margin-bottom: 0; }

    .p-check-row { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; }
    .p-check-row label { font-size: 12px; color: var(--muted); cursor: pointer; flex: 1; }
    .p-check-row input[type=checkbox] { accent-color: var(--accent); width: 14px; height: 14px; flex-shrink: 0; }

    .tax-row { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
    .tax-input {
      width: 60px; padding: 6px 8px; font-size: 12px; font-family: inherit;
      border: 1px solid var(--border-md); border-radius: 8px;
      background: var(--bg); color: var(--text); text-align: center;
      transition: border-color 0.15s;
    }
    .tax-input:focus { outline: none; border-color: var(--accent); background: white; }
    .tax-label { font-size: 12px; color: var(--muted); }

    /* mobile panel toggle */
    .panel-toggle-bar {
      display: none;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      cursor: pointer;
      user-select: none;
    }
    .panel-toggle-bar span { font-size: 13px; font-weight: 500; color: var(--muted); display: flex; align-items: center; gap: 6px; }
    .panel-toggle-bar .arrow { font-size: 10px; transition: transform 0.2s; }
    .panel-toggle-bar.open .arrow { transform: rotate(180deg); }

    /* ─── CANVAS ─── */
    .canvas { padding: 32px 24px; background: var(--bg); }

    /* ─── DOC ─── */
    .doc {
      background: var(--surface);
      border-radius: var(--radius-xl);
      max-width: 820px;
      margin: 0 auto;
      box-shadow: var(--shadow-doc);
      overflow: hidden;
    }

    .doc-inner { padding: 52px; }

    /* doc header */
    .doc-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px; }

    .doc-left {}
    .doc-type-label {
      font-family: 'DM Serif Display', Georgia, serif;
      font-size: 40px;
      line-height: 1;
      color: var(--accent);
      letter-spacing: -0.02em;
      cursor: text;
    }
    .doc-num {
      font-size: 12px; color: var(--faint);
      margin-top: 6px; cursor: text;
    }
    .doc-num:hover, .doc-type-label:hover { background: rgba(24,95,165,0.06); border-radius: 4px; }

    .doc-right { display: flex; flex-direction: column; align-items: flex-end; gap: 10px; }

    .logo-wrap-doc { display: flex; justify-content: flex-end; }
    .doc-logo-img { object-fit: contain; border-radius: 6px; display: none; }

    .upload-placeholder-doc {
      border: 1.5px dashed var(--border-md);
      border-radius: 8px;
      padding: 8px 14px;
      cursor: pointer;
      color: var(--faint);
      font-size: 11px;
      text-align: center;
      transition: all 0.15s;
    }
    .upload-placeholder-doc:hover {
      border-color: var(--accent); background: var(--accent-light); color: var(--accent-dark);
    }

    .co-block { text-align: right; }
    .co-name { font-size: 16px; font-weight: 600; letter-spacing: -0.02em; }
    .co-sub { font-size: 12px; color: var(--muted); margin-top: 2px; }
    [contenteditable] { outline: none; cursor: text; border-radius: 3px; transition: background 0.1s; }
    [contenteditable]:hover { background: rgba(24,95,165,0.05); }
    [contenteditable]:focus { background: rgba(24,95,165,0.09); }

    /* accent stripe */
    .accent-stripe {
      height: 4px;
      background: var(--accent);
      margin-bottom: 32px;
    }

    /* meta grid */
    .meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; margin-bottom: 40px; }
    .meta-block {}
    .meta-lbl {
      font-size: 9px; font-weight: 700; letter-spacing: 0.1em;
      text-transform: uppercase; color: var(--faint);
      display: block; margin-bottom: 6px;
    }
    .meta-val { font-size: 13px; color: var(--text); min-height: 18px; line-height: 1.6; }
    .meta-val.strong { font-size: 15px; font-weight: 600; }
    .meta-block--right { text-align: right; }
    .meta-spacer { height: 14px; }

    /* table */
    .table-scroll { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin-bottom: 16px; }

    table.items { width: 100%; border-collapse: collapse; }
    table.items thead tr { border-bottom: 2px solid var(--accent); }
    table.items thead th {
      padding: 10px 12px; font-size: 9px; font-weight: 700;
      text-transform: uppercase; letter-spacing: 0.08em;
      color: var(--muted); text-align: left;
    }
    table.items thead th:not(:first-child) { text-align: right; }
    table.items thead th:last-child { text-align: center; }

    table.items tbody tr { border-bottom: 1px solid var(--border); transition: background 0.1s; }
    table.items tbody tr:hover { background: #faf9f7; }
    table.items tbody td { padding: 12px 12px; font-size: 13px; vertical-align: middle; }
    table.items tbody td:not(:first-child) { text-align: right; }
    table.items tbody td:last-child { text-align: center; }

    .num-input {
      text-align: right; border: 1px solid transparent;
      border-radius: 6px; padding: 5px 8px;
      font-size: 13px; font-family: inherit;
      background: transparent; color: var(--text);
      transition: all 0.15s; width: 100%;
    }
    .num-input:hover { border-color: var(--border-md); background: var(--bg); }
    .num-input:focus { outline: none; border-color: var(--accent); background: white; }

    .del-btn {
      background: none; border: none; cursor: pointer;
      color: var(--faint); font-size: 13px;
      width: 26px; height: 26px; border-radius: 6px;
      display: flex; align-items: center; justify-content: center;
      transition: all 0.15s; margin: 0 auto;
    }
    .del-btn:hover { color: var(--danger); background: var(--danger-bg); }

    .add-row-btn {
      width: 100%; padding: 10px;
      font-size: 12px; font-weight: 500; font-family: inherit;
      color: var(--muted); background: var(--bg);
      border: 1.5px dashed var(--border-md); border-radius: var(--radius);
      cursor: pointer; margin-bottom: 32px; transition: all 0.15s;
      display: flex; align-items: center; justify-content: center; gap: 6px;
    }
    .add-row-btn:hover { background: var(--accent-light); color: var(--accent-dark); border-color: var(--accent); }

    /* totals */
    .totals-wrap { display: flex; justify-content: flex-end; margin-bottom: 36px; }
    .totals-box {
      width: 300px;
      background: var(--panel);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      overflow: hidden;
    }
    .t-row {
      display: flex; justify-content: space-between; align-items: center;
      padding: 10px 16px; font-size: 13px;
      border-bottom: 1px solid var(--border);
    }
    .t-row:last-child { border-bottom: none; }
    .t-row .t-lbl { color: var(--muted); }
    .t-row.total-row {
      background: var(--accent);
      padding: 14px 16px;
    }
    .t-row.total-row .t-lbl { color: rgba(255,255,255,0.75); font-size: 12px; font-weight: 500; }
    .t-row.total-row .t-amt { color: white; font-size: 18px; font-weight: 700; letter-spacing: -0.02em; }

    /* notes */
    .notes-wrap { border-top: 1px solid var(--border); padding-top: 24px; }
    .notes-lbl {
      font-size: 9px; font-weight: 700; letter-spacing: 0.1em;
      text-transform: uppercase; color: var(--faint);
      display: block; margin-bottom: 10px;
    }
    .notes-area {
      width: 100%; min-height: 140px;
      font-size: 12px; font-family: inherit; color: var(--muted);
      border: 1px solid var(--border); border-radius: var(--radius);
      padding: 12px 14px; resize: vertical; background: var(--bg); line-height: 1.7;
      transition: border-color 0.15s;
    }
    .notes-area:focus { outline: none; border-color: var(--accent); background: white; }
    .notes-area::placeholder { color: var(--faint); }

    /* footer */
    .doc-footer-strip {
      background: var(--bg);
      border-top: 1px solid var(--border);
      padding: 14px 52px;
      text-align: center;
      font-size: 10px;
      color: var(--faint);
    }
    .doc-footer-strip a { color: var(--faint); text-decoration: none; }
    .doc-footer-strip a:hover { color: var(--accent); }

    /* Print — below document (screen only) */
    .canvas-print-wrap {
      max-width: 820px;
      margin: 0 auto;
      padding: 20px clamp(16px, 4vw, 24px) 32px;
    }
    .print-doc-btn {
      width: 100%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 14px 22px;
      font-size: 14px;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
      border: none;
      border-radius: var(--radius);
      background: var(--accent);
      color: white;
      transition: background 0.15s, transform 0.15s;
      box-shadow: 0 2px 14px rgba(24,95,165,0.28);
      -webkit-tap-highlight-color: transparent;
    }
    .print-doc-btn:hover { background: var(--accent-dark); transform: translateY(-1px); }
    .print-doc-btn svg { width: 16px; height: 16px; fill: currentColor; flex-shrink: 0; }

    input[type=file] { display: none; }

    /* ─── PRINT ─── */
    @media print {
      body.page-invoice-gen { background: white; }
      .page-invoice-gen nav,
      .page-invoice-gen .nav-backdrop,
      .page-invoice-gen .invoice-page-shell { padding-top: 0 !important; }
      .panel, .panel-toggle-bar { display: none !important; }
      .layout { grid-template-columns: 1fr; }
      .canvas { padding: 0; }
      .doc { border-radius: 0; box-shadow: none; max-width: 100%; }
      .canvas-print-wrap { display: none !important; }
      .add-row-btn, .del-btn, .upload-placeholder-doc, .footer, .nav-invoice-gen { display: none !important; }
      .notes-area { border: none; padding: 0; resize: none; min-height: unset; background: white; }
      .num-input { border: none; padding: 0; background: white; }
      .doc-inner { padding: 40px; }
    }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1080px) {
      .layout { grid-template-columns: 240px 1fr; }
      .panel { padding: 16px 12px; }
    }

    @media (max-width: 900px) {
      .layout { grid-template-columns: 1fr; display: block; }
      .panel {
        display: none;
        position: static;
        height: auto;
        overflow: visible;
        border-right: none;
        border-bottom: 1px solid var(--border);
      }
      .panel.open { display: block; }
      .panel-toggle-bar { display: flex; }
    }

    @media (max-width: 680px) {
      .canvas-print-wrap { padding: 16px 12px 28px; }
      .print-doc-btn { padding: 12px 18px; font-size: 13px; }
      .canvas { padding: 16px 10px; }
      .doc-inner { padding: 24px 20px; }
      .doc-footer-strip { padding: 12px 20px; }
      .doc-header {
        flex-direction: column;
        gap: 20px;
        margin-bottom: 24px;
      }
      .doc-right { align-items: flex-start; }
      .co-block { text-align: left; }
      .meta-grid { grid-template-columns: 1fr; gap: 20px; }
      .meta-block--right { text-align: left; }
      table.items { min-width: 500px; font-size: 12px; }
      table.items thead th, table.items tbody td { padding: 9px 8px; }
      .totals-wrap { justify-content: stretch; }
      .totals-box { width: 100%; }
      .doc-type-label { font-size: 32px; }
    }

    @media (max-width: 400px) {
      .doc-inner { padding: 18px 14px; }
      table.items { min-width: 460px; }
    }
    
    @media print {
  .accent-stripe {
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
  }
}
  </style>
</head>
<body class="page-invoice-gen">

  <nav class="nav-invoice-gen">
    <a href="index.php" class="logo logo--img" aria-label="YMSUCCESS — home">
      <img src="assets/backgroud_picture/logo-ym.png" alt="" width="160" height="64" decoding="async" fetchpriority="high"/>
      <div class="logo-txt">YM<span>SUCCESS</span></div>
    </a>
    <button type="button" class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Open menu">
      <span class="nav-toggle__bar" aria-hidden="true"></span>
      <span class="nav-toggle__bar" aria-hidden="true"></span>
      <span class="nav-toggle__bar" aria-hidden="true"></span>
    </button>
    <ul id="mainNav" class="nav-links">
      <li><a href="index.php#packages">Packages</a></li>
      <li><a href="index.php#process">Process</a></li>
      <li><a href="index.php#services">Services</a></li>
      <li><a href="blog">Blog</a></li>
      <li><a href="index.php#why">Why Us</a></li>
      <li><a href="index.php#cta" class="nav-cta">Get Started</a></li>
    </ul>
  </nav>
  <div class="nav-backdrop" aria-hidden="true"></div>

  <div class="invoice-page-shell">

<!-- MOBILE PANEL TOGGLE -->
<div class="panel-toggle-bar" id="panelToggle" onclick="togglePanel()">
  <span>
    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" style="flex-shrink:0"><path d="M1 3h12M1 7h12M1 11h12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
    Document settings
  </span>
  <span class="arrow">▾</span>
</div>

<div class="layout">
  <!-- ─── PANEL ─── -->
  <aside class="panel" id="panel">

    <!-- Doc type -->
    <div class="panel-section">
      <div class="panel-section-title">Document type</div>
      <div class="type-grid">
        <button class="type-pill active" onclick="setType('INVOICE',this)">Invoice</button>
        <button class="type-pill" onclick="setType('QUOTATION',this)">Quotation</button>
        <button class="type-pill" onclick="setType('RECEIPT',this)">Receipt</button>
        <button class="type-pill" onclick="setType('PURCHASE ORDER',this)">P.O.</button>
      </div>
    </div>

    <!-- Logo -->
    <div class="panel-section">
      <div class="panel-section-title">Company logo</div>
      <div id="uploadZone" class="upload-zone"
        onclick="document.getElementById('logoInput').click()"
        ondragover="event.preventDefault();this.classList.add('drag')"
        ondragleave="this.classList.remove('drag')"
        ondrop="handleDrop(event)">
        <svg viewBox="0 0 20 20" fill="currentColor" style="display:block;margin:0 auto 6px;"><path d="M4 3h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1zm4 9l2-2 2 2 3-4 2 2.5V14H3v-1.5L6 9l2 3zm3-5a1 1 0 100-2 1 1 0 000 2z"/></svg>
        <p>Click or drag to upload<br><span style="font-size:10px;opacity:0.6;">PNG, JPG, SVG, WebP</span></p>
      </div>
      <div id="logoPreview" class="logo-preview">
        <img id="logoThumb" src="" alt="">
        <span class="logo-preview-name">Logo uploaded</span>
        <button class="logo-rm-btn" onclick="removeLogo()">✕</button>
      </div>
      <div class="logo-size-row" id="logoSizeRow">
        <label>Size</label>
        <input type="range" min="40" max="200" value="100" id="logoSize" oninput="updateLogoSize(this.value)">
        <span class="sz" id="logoSizeVal">100px</span>
      </div>
      <div class="p-check-row" id="showCoRow" style="margin-top:8px;display:none;">
        <input type="checkbox" id="showCoText" checked onchange="toggleCoText()">
        <label for="showCoText">Show company name</label>
      </div>
    </div>

    <!-- Accent color -->
    <div class="panel-section">
      <div class="panel-section-title">Accent color</div>
      <div class="color-row" id="colorRow"></div>
    </div>

    <!-- Currency -->
    <div class="panel-section">
      <div class="panel-section-title">Currency</div>
      <select class="p-input" id="currencySelect" onchange="setCurrency(this.value)">
        <option value="MYR">MYR – Ringgit Malaysia</option>
        <option value="USD">USD – US Dollar</option>
        <option value="SGD">SGD – Singapore Dollar</option>
        <option value="EUR">EUR – Euro</option>
        <option value="GBP">GBP – British Pound</option>
        <option value="IDR">IDR – Indonesian Rupiah</option>
      </select>
    </div>

    <!-- Tax & Discount -->
    <div class="panel-section">
      <div class="panel-section-title">Tax & discount</div>
      <div class="tax-row">
        <input class="tax-input" type="number" id="taxRate" value="0" min="0" max="100" oninput="recalc()">
        <span class="tax-label">% tax rate</span>
      </div>
      <div class="p-check-row">
        <input type="checkbox" id="showTax" onchange="recalc()">
        <label for="showTax">Show tax line</label>
      </div>
      <div class="p-check-row">
        <input type="checkbox" id="showDiscount" onchange="toggleDiscInput()">
        <label for="showDiscount">Show discount</label>
      </div>
      <input class="p-input" type="number" id="discountPct" value="0" min="0" max="100" placeholder="Discount %" oninput="recalc()" style="display:none;">
    </div>

    <!-- Date labels -->
    <div class="panel-section">
      <div class="panel-section-title">Field labels</div>
      <input class="p-input" id="dateLabel" value="Date" placeholder="Date label" oninput="document.getElementById('dateLbl').textContent=this.value">
      <input class="p-input" id="dueDateLabel" value="Due Date" placeholder="Due date label" oninput="document.getElementById('dueDateLbl').textContent=this.value">
    </div>

  </aside>

  <!-- ─── CANVAS ─── -->
  <main class="canvas">
    <div class="doc" id="doc">
      <div class="doc-inner">

        <!-- Header -->
        <div class="doc-header">
          <div class="doc-left">
            <div class="doc-type-label" id="docTitle" contenteditable="true">INVOICE</div>
            <div class="doc-num" contenteditable="true">#INV-0426-001</div>
          </div>
          <div class="doc-right">
            <div class="logo-wrap-doc">
              <img id="docLogoImg" class="doc-logo-img" src="" alt="logo" style="max-width:100px;max-height:70px;">
              <div class="upload-placeholder-doc" id="logoPlaceholderDoc" onclick="document.getElementById('logoInput').click()">+ Upload logo</div>
            </div>
            <div class="co-block" id="coBlock">
              <div class="co-name" contenteditable="true">YM SUCCESS</div>
              <div class="co-sub" contenteditable="true">info@ymsuccess.com</div>
              <div class="co-sub" contenteditable="true">+60 12-345 6789</div>
            </div>
          </div>
        </div>

        <div class="accent-stripe" id="accentStripe"></div>

        <!-- Meta -->
        <div class="meta-grid">
          <div class="meta-block">
            <span class="meta-lbl">Bill To</span>
            <div class="meta-val strong" contenteditable="true">Client Name / Company</div>
            <div class="meta-val" contenteditable="true">Address Line 1</div>
            <div class="meta-val" contenteditable="true">City, Postcode</div>
            <div class="meta-val" contenteditable="true">Malaysia</div>
          </div>
          <div class="meta-block meta-block--right">
            <span class="meta-lbl" id="dateLbl">Date</span>
            <div class="meta-val" contenteditable="true">4 April 2026</div>
            <div class="meta-spacer"></div>
            <span class="meta-lbl" id="dueDateLbl">Due Date</span>
            <div class="meta-val" contenteditable="true">4 May 2026</div>
            <div class="meta-spacer"></div>
            <span class="meta-lbl">From</span>
            <div class="meta-val" contenteditable="true">Taman Pandan Mewah</div>
            <div class="meta-val" contenteditable="true">Ampang, Selangor</div>
          </div>
        </div>

        <!-- Items table -->
        <div class="table-scroll">
          <table class="items">
            <thead>
              <tr id="tableHead">
                <th style="width:38%;">Description</th>
                <th style="width:12%;">Qty</th>
                <th style="width:20%;">Unit price</th>
                <th style="width:20%;">Amount</th>
                <th style="width:10%;"></th>
              </tr>
            </thead>
            <tbody id="itemBody"></tbody>
          </table>
        </div>

        <button class="add-row-btn" onclick="addRow()">
          <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor"><path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
          Add line item
        </button>

        <!-- Totals -->
        <div class="totals-wrap">
          <div class="totals-box">
            <div class="t-row">
              <span class="t-lbl">Subtotal</span>
              <span id="subtotalVal">RM 0.00</span>
            </div>
            <div class="t-row" id="discountRow" style="display:none;">
              <span class="t-lbl">Discount (<span id="discPctLabel">0</span>%)</span>
              <span id="discountVal">−RM 0.00</span>
            </div>
            <div class="t-row" id="taxRow" style="display:none;">
              <span class="t-lbl">Tax (<span id="taxPctLabel">0</span>%)</span>
              <span id="taxVal">RM 0.00</span>
            </div>
          </div>
        </div>

        <!-- Notes -->
        <div class="notes-wrap">
          <span class="notes-lbl">Notes / Terms & Conditions</span>
          <textarea class="notes-area" 
  placeholder="Enter notes, payment terms, or bank details…"
  oninput="autoExpand(this)"
  style="resize:none; overflow:hidden;">1. This quotation covers the cost of redesigning the website.
2. Additional customisation or features will be quoted separately.
3. Kindly transfer the amount to the following bank account: 
Malayan Banking Berhad - 558172654995 (YM GROUP)
4. This is a computer-generated document;</textarea>
        </div>

      </div><!-- end doc-inner -->

      <div class="doc-footer-strip">
        Generated by <a href="https://ymsuccess.com" target="_blank">YM Success</a>
      </div>
    </div>

    <div class="canvas-print-wrap">
      <button type="button" class="print-doc-btn" onclick="window.print()">
        <svg viewBox="0 0 14 14" aria-hidden="true"><path d="M3 1h8v3H3V1zm-1 4h10a1 1 0 011 1v4a1 1 0 01-1 1h-1v2H3v-2H2a1 1 0 01-1-1V6a1 1 0 011-1zm1 1.5a.75.75 0 100 1.5.75.75 0 000-1.5zM4 10h6v2H4v-2z"/></svg>
        Print / PDF
      </button>
    </div>
  </main>
</div>

  </div><!-- .invoice-page-shell -->
<?php include __DIR__ . '/footer.php'; ?>
<input type="file" id="logoInput" accept="image/*" onchange="handleLogoFile(this.files[0])">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "YM Invoice Generator",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "MYR" },
  "description": "Free invoice generator to create invoices, quotations, and receipts online instantly."
}
</script>

<script>
  const COLORS = [
    { hex: '#185FA5', name: 'Navy' },
    { hex: '#0F6E56', name: 'Teal' },
    { hex: '#D85A30', name: 'Coral' },
    { hex: '#534AB7', name: 'Purple' },
    { hex: '#993556', name: 'Pink' },
    { hex: '#BA7517', name: 'Amber' },
    { hex: '#3B6D11', name: 'Forest' },
    { hex: '#2C2C2A', name: 'Dark' },
  ];

  let accent = COLORS[7].hex;
  let currency = 'MYR';
  let rowId = 0;
  let items = [];

  function autoExpand(el) {
  el.style.height = 'auto';
  el.style.height = el.scrollHeight + 'px';
}
  function init() {
  const row = document.getElementById('colorRow');
  COLORS.forEach((c, i) => {
    const d = document.createElement('div');
    d.className = 'color-dot' + (i === 7 ? ' selected' : '');
    d.style.background = c.hex;
    d.title = c.name;
    d.onclick = () => pickColor(d, c.hex);
    row.appendChild(d);
  });
  applyAccent(accent);

  // ── Default company logo via fetch → base64 ──
  fetch('assets/backgroud_picture/logo-ym.png')
    .then(r => r.blob())
    .then(blob => {
      const reader = new FileReader();
      reader.onload = e => {
        const src = e.target.result;
        const docImg = document.getElementById('docLogoImg');
        docImg.src = src;
        docImg.style.display = 'block';
        docImg.style.maxWidth = document.getElementById('logoSize').value + 'px';
        document.getElementById('logoThumb').src = src;
        document.getElementById('logoPlaceholderDoc').style.display = 'none';
        document.getElementById('uploadZone').style.display = 'none';
        document.getElementById('logoPreview').style.display = 'flex';
        document.getElementById('logoSizeRow').style.display = 'flex';
        document.getElementById('showCoRow').style.display = 'flex';
      };
      reader.readAsDataURL(blob);
    })
    .catch(() => console.warn('Default logo not found — skipping.'));
  // ── end default logo ──

  addRow('Website Redesign', 1, 3500);
  addRow('UI/UX Design', 3, 800);
  addRow('Project Management', 5, 200);

  const notes = document.querySelector('.notes-area');
  if (notes) autoExpand(notes);
}

  function pickColor(el, hex) {
    document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('selected'));
    el.classList.add('selected');
    accent = hex;
    applyAccent(hex);
  }

  function applyAccent(hex) {
    document.getElementById('accentStripe').style.background = hex;
    document.getElementById('docTitle').style.color = hex;
    document.getElementById('tableHead').style.borderBottomColor = hex;
    const totalRow = document.querySelector('.total-row');
    if (totalRow) totalRow.style.background = hex;
    document.documentElement.style.setProperty('--accent', hex);
  }

  function setType(t, btn) {
    document.querySelectorAll('.type-pill').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('docTitle').textContent = t;
  }

  function setCurrency(c) { currency = c; recalc(); }

  function fmt(n) {
    const sym = { MYR: 'RM ', USD: '$', SGD: 'S$', EUR: '€', GBP: '£', IDR: 'Rp ' }[currency] || '';
    const formatted = Number(n).toLocaleString('en-MY', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    return sym + formatted;
  }

  function handleDrop(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('drag');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) handleLogoFile(file);
  }

  function handleLogoFile(file) {
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
      const src = e.target.result;
      const docImg = document.getElementById('docLogoImg');
      docImg.src = src; docImg.style.display = 'block';
      docImg.style.maxWidth = document.getElementById('logoSize').value + 'px';
      document.getElementById('logoThumb').src = src;
      document.getElementById('logoPlaceholderDoc').style.display = 'none';
      document.getElementById('uploadZone').style.display = 'none';
      document.getElementById('logoPreview').style.display = 'flex';
      document.getElementById('logoSizeRow').style.display = 'flex';
      document.getElementById('showCoRow').style.display = 'flex';
    };
    reader.readAsDataURL(file);
  }

  function removeLogo() {
    const docImg = document.getElementById('docLogoImg');
    docImg.src = ''; docImg.style.display = 'none';
    document.getElementById('logoPlaceholderDoc').style.display = '';
    document.getElementById('uploadZone').style.display = '';
    document.getElementById('logoPreview').style.display = 'none';
    document.getElementById('logoSizeRow').style.display = 'none';
    document.getElementById('showCoRow').style.display = 'none';
    document.getElementById('logoInput').value = '';
  }

  function updateLogoSize(v) {
    document.getElementById('logoSizeVal').textContent = v + 'px';
    document.getElementById('docLogoImg').style.maxWidth = v + 'px';
  }

  function toggleCoText() {
    const show = document.getElementById('showCoText').checked;
    document.getElementById('coBlock').style.display = show ? '' : 'none';
  }

  function toggleDiscInput() {
    const show = document.getElementById('showDiscount').checked;
    document.getElementById('discountPct').style.display = show ? '' : 'none';
    recalc();
  }

  function addRow(desc = '', qty = 1, price = 0) {
    const id = 'r' + rowId++;
    items.push({ id, desc, qty, price });
    const tr = document.createElement('tr');
    tr.id = id;
    tr.innerHTML = `
      <td contenteditable="true" oninput="updateRow('${id}','desc',this.textContent)">${desc || 'Service description'}</td>
      <td><input type="number" class="num-input" value="${qty}" min="0" step="1" style="width:56px;" oninput="updateRow('${id}','qty',this.value)"></td>
      <td><input type="number" class="num-input" value="${price}" min="0" step="0.01" style="width:100px;" oninput="updateRow('${id}','price',this.value)"></td>
      <td id="${id}_amt" style="font-weight:500;">—</td>
      <td><button class="del-btn" onclick="delRow('${id}')" title="Remove">✕</button></td>
    `;
    document.getElementById('itemBody').appendChild(tr);
    recalc();
  }

  function updateRow(id, field, val) {
    const item = items.find(i => i.id === id);
    if (!item) return;
    item[field] = field === 'desc' ? val : parseFloat(val) || 0;
    recalc();
  }

  function delRow(id) {
    items = items.filter(i => i.id !== id);
    const el = document.getElementById(id);
    if (el) el.remove();
    recalc();
  }

  function recalc() {
    let sub = 0;
    items.forEach(item => {
      const amt = (item.qty || 0) * (item.price || 0);
      sub += amt;
      const el = document.getElementById(item.id + '_amt');
      if (el) el.textContent = fmt(amt);
    });

    const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;
    const discPct = parseFloat(document.getElementById('discountPct').value) || 0;
    const showTax = document.getElementById('showTax').checked;
    const showDisc = document.getElementById('showDiscount').checked;

    const discAmt = showDisc ? sub * discPct / 100 : 0;
    const afterDisc = sub - discAmt;
    const taxAmt = showTax ? afterDisc * taxRate / 100 : 0;
    const total = afterDisc + taxAmt;

    document.getElementById('subtotalVal').textContent = fmt(sub);
    document.getElementById('discountRow').style.display = showDisc ? '' : 'none';
    document.getElementById('discPctLabel').textContent = discPct;
    document.getElementById('discountVal').textContent = '−' + fmt(discAmt);
    document.getElementById('taxRow').style.display = showTax ? '' : 'none';
    document.getElementById('taxPctLabel').textContent = taxRate;
    document.getElementById('taxVal').textContent = fmt(taxAmt);
  }

  function togglePanel() {
    const panel = document.getElementById('panel');
    const toggle = document.getElementById('panelToggle');
    const open = panel.classList.toggle('open');
    toggle.classList.toggle('open', open);
  }

  init();
</script>
<script>
  (function () {
    var nav = document.querySelector('nav');
    var toggle = document.getElementById('navToggle');
    var menu = document.getElementById('mainNav');
    var backdrop = document.querySelector('.nav-backdrop');
    if (!nav || !toggle || !menu) return;

    var mq = window.matchMedia('(max-width: 1024px)');

    function setOpen(open) {
      nav.classList.toggle('is-open', open);
      document.body.classList.toggle('nav-menu-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
      if (backdrop) backdrop.setAttribute('aria-hidden', open ? 'false' : 'true');
    }

    function closeNav() {
      setOpen(false);
    }

    toggle.addEventListener('click', function () {
      setOpen(!nav.classList.contains('is-open'));
    });

    if (backdrop) backdrop.addEventListener('click', closeNav);

    menu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        if (mq.matches) closeNav();
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) closeNav();
    });

    window.addEventListener('resize', function () {
      if (!mq.matches) closeNav();
    });
  })();

</script>
</body>
</html>