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
</head>
<body class="page-blog">

  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <nav>
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
      <li><a href="blog" aria-current="page">Blog</a></li>
      <li><a href="index.php#why">Why Us</a></li>
      <li><a href="index.php#cta" class="nav-cta">Get Started</a></li>
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
        <div class="blog-grid" id="posts-grid"><div class="blog-spinner"></div></div>
        <div class="blog-pagination" id="pagination"></div>
      </div>
    </div>
  </div>
</div>

<!-- SINGLE POST VIEW -->
<div id="post-view">
  <div class="blog-post-hero">
    <div class="blog-breadcrumb">
      <a href="#" onclick="showList();return false;">Blog</a> &rsaquo; <span id="post-cat-crumb"></span>
    </div>
    <h1 id="post-title-el"></h1>
    <div class="blog-post-meta">
      <span id="post-date-el"></span>
      <span id="post-cat-el"></span>
    </div>
  </div>
  <img id="post-cover" class="blog-post-cover" src="" alt="" style="display:none">
  <article class="blog-post-body">
    <a href="#" class="blog-back" onclick="showList();return false;">&#8592; Back to Blog</a>
    <div id="post-tags" class="blog-tags"></div>
    <div id="post-html" class="blog-post-content"></div>
    <a href="#" class="blog-back" onclick="showList();return false;" style="margin-top:3rem">&#8592; Back to Blog</a>
  </article>
</div>

<?php include __DIR__ . '/footer.php'; ?>

<script src="script.js"></script>
<script>
const API = 'api.php'; // change to full URL if needed: 'https://yourdomain.com/api.php'
let curPage=1,curCat='',curSearch='',totalPages=1;
document.getElementById('canonical').href=location.href;

async function loadPosts(page=1){
  curPage=page;
  document.getElementById('posts-grid').innerHTML='<div class="blog-spinner"></div>';
  const p=new URLSearchParams({page,limit:6});
  if(curCat) p.set('category',curCat);
  if(curSearch) p.set('search',curSearch);
  try{
    const r=await fetch(`${API}/posts?${p}`);
    const d=await r.json();
    totalPages=d.pages||1;
    renderPosts(d.posts||[]);
    renderPagination();
  }catch{
    document.getElementById('posts-grid').innerHTML='<div class="blog-empty"><h3>Could not load posts</h3><p>Check your API connection.</p></div>';
  }
}

function renderPosts(posts){
  const g=document.getElementById('posts-grid');
  if(!posts.length){g.innerHTML='<div class="blog-empty"><h3>No posts found</h3><p>Try a different search or category.</p></div>';return;}
  g.innerHTML=posts.map(p=>{
    const img=p.cover_image?`<img class="blog-card__img" src="${e(p.cover_image)}" alt="${e(p.title)}" loading="lazy">`:`<div class="blog-card__placeholder"><span>YM</span></div>`;
    const dt=new Date(p.created_at).toLocaleDateString('en-MY',{day:'numeric',month:'short',year:'numeric'});
    return`<article class="blog-card" onclick="loadPost('${e(p.slug)}')" tabindex="0" onkeydown="if(event.key==='Enter')loadPost('${e(p.slug)}')">
      ${img}
      <div class="blog-card__body">
        <div class="blog-card__meta">
          ${p.category?`<span class="blog-card__cat">${e(p.category)}</span>`:''}
          <span class="blog-card__date">${dt}</span>
        </div>
        <h2 class="blog-card__title">${e(p.title)}</h2>
        <p class="blog-card__excerpt">${e(p.excerpt||'')}</p>
        <div class="blog-card__foot">Read more <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></div>
      </div>
    </article>`;
  }).join('');
}

async function loadPost(slug){
  document.getElementById('list-view').style.display='none';
  document.getElementById('post-view').style.display='block';
  document.getElementById('post-html').innerHTML='<div class="blog-spinner"></div>';
  window.scrollTo(0,0);
  try{
    const r=await fetch(`${API}/posts/${slug}`);
    const post=await r.json();
    if(post.error) throw new Error();
    const dt=new Date(post.created_at).toLocaleDateString('en-MY',{day:'numeric',month:'long',year:'numeric'});
    document.getElementById('post-title-el').textContent=post.title;
    document.getElementById('post-date-el').textContent=dt;
    document.getElementById('post-cat-el').textContent=post.category||'';
    document.getElementById('post-cat-crumb').textContent=post.category||'Article';
    const cov=document.getElementById('post-cover');
    if(post.cover_image){cov.src=post.cover_image;cov.alt=post.title;cov.style.display='block';}else cov.style.display='none';
    document.getElementById('post-html').innerHTML=post.content;
    document.getElementById('post-tags').innerHTML=post.tags?post.tags.split(',').map(t=>`<span class="blog-tag">${e(t.trim())}</span>`).join(''):'';
    // SEO
    const url=`${location.origin}${location.pathname}?post=${slug}`;
    document.title=`${post.meta_title||post.title} | YM SUCCESS`;
    sm('page-desc',post.meta_description||post.excerpt);
    sm('og-title',post.meta_title||post.title);sm('og-desc',post.meta_description||post.excerpt);
    sm('og-image',post.cover_image||'');sm('og-type','article');sm('og-url',url);
    sm('tw-title',post.meta_title||post.title);sm('tw-desc',post.meta_description||post.excerpt);sm('tw-image',post.cover_image||'');
    document.getElementById('canonical').href=url;
    history.pushState({slug},'',`?post=${slug}`);
    document.getElementById('ld-json').textContent=JSON.stringify({"@context":"https://schema.org","@type":"BlogPosting","headline":post.title,"description":post.excerpt||'','image':post.cover_image||'','datePublished':post.created_at,'dateModified':post.updated_at,'author':{"@type":"Organization","name":"YM SUCCESS"},'publisher':{"@type":"Organization","name":"YM SUCCESS","url":location.origin},'url':url,'keywords':post.tags||''});
  }catch{document.getElementById('post-html').innerHTML='<p>Post not found.</p>';}
}

function showList(){
  document.getElementById('list-view').style.display='block';
  document.getElementById('post-view').style.display='none';
  document.title='Blog | YM SUCCESS';
  history.pushState({},'',location.pathname);
}

async function loadCategories(){
  try{
    const r=await fetch(`${API}/categories`);
    const d=await r.json();
    const bar=document.getElementById('cat-bar');
    (d.categories||[]).forEach(cat=>{
      const btn=document.createElement('button');
      btn.type='button';
      btn.className='blog-filter-btn';btn.textContent=cat;btn.dataset.cat=cat;
      btn.onclick=()=>filterCat(cat);bar.appendChild(btn);
    });
  }catch{}
}

function filterCat(cat){
  curCat=cat;curSearch='';
  document.getElementById('search-input').value='';
  document.querySelectorAll('.blog-filter-btn').forEach(b=>b.classList.toggle('active',b.dataset.cat===cat));
  loadPosts(1);
}

function doSearch(){
  curSearch=document.getElementById('search-input').value.trim();
  curCat='';
  document.querySelectorAll('.blog-filter-btn').forEach(b=>b.classList.toggle('active',b.dataset.cat===''));
  loadPosts(1);
}

document.getElementById('search-input').addEventListener('keydown',ev=>{if(ev.key==='Enter')doSearch();});

function renderPagination(){
  const el=document.getElementById('pagination');
  if(totalPages<=1){el.innerHTML='';return;}
  let h=`<button type="button" class="blog-page-btn" onclick="loadPosts(${curPage-1})" ${curPage===1?'disabled':''}>&#8249;</button>`;
  for(let i=1;i<=totalPages;i++) h+=`<button type="button" class="blog-page-btn${i===curPage?' active':''}" onclick="loadPosts(${i})">${i}</button>`;
  h+=`<button type="button" class="blog-page-btn" onclick="loadPosts(${curPage+1})" ${curPage===totalPages?'disabled':''}>&#8250;</button>`;
  el.innerHTML=h;
}

function e(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}
function sm(id,v){const el=document.getElementById(id);if(el)el.content=v||'';}
window.addEventListener('popstate',()=>{const s=new URLSearchParams(location.search).get('post');if(s)loadPost(s);else showList();});

const initSlug=new URLSearchParams(location.search).get('post');
loadCategories();
if(initSlug)loadPost(initSlug);else loadPosts(1);
</script>
</body>
</html>
