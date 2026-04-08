<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Admin | YM SUCCESS</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Rich text editor -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
  <link rel="icon" href="assets/favicon_io/favicon.ico">

 <style>
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    :root{--navy:#0a1628;--navy2:#132040;--gold:#c9a84c;--gold2:#e8c76a;--cream:#f7f4ee;--text:#1a1a2e;--muted:#6b7280;--border:#e2ddd4;--white:#fff;--green:#16a34a;--red:#dc2626}
    body{font-family:'DM Sans',sans-serif;background:var(--cream);color:var(--text);min-height:100vh}

    /* ── LOGIN ── */
    #login-screen{display:flex;align-items:center;justify-content:center;min-height:100vh;padding:1rem}
    .login-box{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:2.5rem;width:100%;max-width:380px}
    .login-box h1{font-family:'Playfair Display',serif;font-size:1.5rem;color:var(--navy);margin-bottom:.25rem}
    .login-box p{font-size:.85rem;color:var(--muted);margin-bottom:1.75rem}
    .field{margin-bottom:1.1rem}
    .field label{display:block;font-size:.82rem;font-weight:500;color:var(--muted);margin-bottom:.35rem}
    .field input{width:100%;padding:.7rem .9rem;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:.9rem;outline:none;transition:border .2s}
    .field input:focus{border-color:var(--navy)}
    .btn-primary{width:100%;background:var(--navy);color:var(--gold);border:none;padding:.8rem;border-radius:8px;font-family:inherit;font-size:.9rem;font-weight:500;cursor:pointer;transition:background .2s;margin-top:.5rem}
    .btn-primary:hover{background:var(--navy2)}
    .login-err{color:var(--red);font-size:.83rem;margin-top:.75rem;text-align:center;display:none}

    /* ── SHELL ── */
    #app{display:none;min-height:100vh}
    .sidebar{position:fixed;top:0;left:0;width:220px;height:100vh;background:var(--navy);display:flex;flex-direction:column;z-index:50;border-right:1px solid rgba(201,168,76,.1)}
    .sidebar-logo{padding:1.5rem 1.25rem;font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--gold);border-bottom:1px solid rgba(255,255,255,.07)}
    .sidebar-logo span{color:var(--white)}
    .sidebar-logo small{display:block;font-family:'DM Sans',sans-serif;font-size:.7rem;color:rgba(255,255,255,.4);font-weight:400;margin-top:2px}
    .nav-item{display:flex;align-items:center;gap:.75rem;padding:.8rem 1.25rem;color:rgba(255,255,255,.6);text-decoration:none;font-size:.88rem;cursor:pointer;border:none;background:none;width:100%;text-align:left;transition:all .2s}
    .nav-item:hover,.nav-item.active{background:rgba(201,168,76,.08);color:var(--gold)}
    .nav-item svg{flex-shrink:0;opacity:.7}
    .nav-item.active svg{opacity:1}
    .sidebar-footer{margin-top:auto;padding:1rem 1.25rem;border-top:1px solid rgba(255,255,255,.07)}
    .logout-btn{display:flex;align-items:center;gap:.5rem;font-size:.82rem;color:rgba(255,255,255,.5);cursor:pointer;background:none;border:none;font-family:inherit;transition:color .2s;width:100%}
    .logout-btn:hover{color:var(--red)}
    .main{margin-left:220px;min-height:100vh;display:flex;flex-direction:column}
    .topbar{background:var(--white);border-bottom:1px solid var(--border);padding:1rem 2rem;display:flex;align-items:center;justify-content:space-between}
    .topbar h1{font-family:'Playfair Display',serif;font-size:1.25rem;color:var(--navy)}
    .topbar-actions{display:flex;gap:.75rem}
    .btn{padding:.55rem 1.1rem;border-radius:8px;font-family:inherit;font-size:.85rem;font-weight:500;cursor:pointer;border:1px solid var(--border);background:var(--white);color:var(--text);transition:all .2s}
    .btn:hover{border-color:var(--navy);color:var(--navy)}
    .btn-gold{background:var(--navy);color:var(--gold);border-color:var(--navy)}
    .btn-gold:hover{background:var(--navy2);color:var(--gold2)}
    .btn-danger{color:var(--red);border-color:#fca5a5}
    .btn-danger:hover{background:#fef2f2}
    .content{padding:2rem;flex:1}

    /* ── STATS ── */
    .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:1rem;margin-bottom:2rem}
    .stat-card{background:var(--white);border:1px solid var(--border);border-radius:12px;padding:1.25rem 1.5rem}
    .stat-card .val{font-size:2rem;font-weight:500;color:var(--navy);font-family:'Playfair Display',serif}
    .stat-card .lbl{font-size:.78rem;color:var(--muted);margin-top:.25rem}

    /* ── TABLE ── */
    .table-wrap{background:var(--white);border:1px solid var(--border);border-radius:12px;overflow:hidden}
    table{width:100%;border-collapse:collapse;font-size:.875rem}
    thead{background:var(--cream)}
    th{padding:.85rem 1.25rem;text-align:left;font-weight:500;color:var(--muted);font-size:.78rem;letter-spacing:.05em;text-transform:uppercase;border-bottom:1px solid var(--border)}
    td{padding:.85rem 1.25rem;border-bottom:1px solid #f3f0ea;vertical-align:middle}
    tr:last-child td{border-bottom:none}
    tr:hover td{background:#faf8f4}
    .badge{display:inline-block;padding:.2rem .65rem;border-radius:100px;font-size:.72rem;font-weight:500}
    .badge-pub{background:#dcfce7;color:#15803d}
    .badge-draft{background:#f3f4f6;color:#6b7280}
    .tbl-actions{display:flex;gap:.4rem}
    .tbl-btn{padding:.3rem .7rem;border-radius:6px;border:1px solid var(--border);background:transparent;font-size:.78rem;cursor:pointer;font-family:inherit;transition:all .2s}
    .tbl-btn:hover{border-color:var(--navy);color:var(--navy)}
    .tbl-btn.del{color:var(--red);border-color:#fca5a5}
    .tbl-btn.del:hover{background:#fef2f2}

    /* ── EDITOR ── */
    #editor-view{display:none}
    .editor-form{max-width:900px}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;margin-bottom:1.25rem}
    .form-group{margin-bottom:1.25rem}
    .form-group label{display:block;font-size:.82rem;font-weight:500;color:var(--muted);margin-bottom:.4rem}
    .form-group input,.form-group select,.form-group textarea{width:100%;padding:.65rem .9rem;border:1px solid var(--border);border-radius:8px;font-family:inherit;font-size:.88rem;outline:none;background:var(--white);transition:border .2s;color:var(--text)}
    .form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:var(--navy)}
    .form-group textarea{resize:vertical;min-height:80px}
    .form-group small{font-size:.75rem;color:var(--muted);margin-top:.3rem;display:block}
    .seo-box{background:var(--cream);border:1px solid var(--border);border-radius:10px;padding:1.25rem;margin-bottom:1.25rem}
    .seo-box h3{font-size:.85rem;font-weight:500;color:var(--muted);margin-bottom:1rem;text-transform:uppercase;letter-spacing:.08em}
    #quill-editor{min-height:340px;font-family:'DM Sans',sans-serif;font-size:.95rem}
    .ql-toolbar{border-radius:8px 8px 0 0;border-color:var(--border)!important}
    .ql-container{border-radius:0 0 8px 8px;border-color:var(--border)!important;font-family:'DM Sans',sans-serif}
    .editor-actions{display:flex;gap:.75rem;margin-top:1.5rem}
    .toast{position:fixed;bottom:1.5rem;right:1.5rem;background:var(--navy);color:var(--gold);padding:.75rem 1.25rem;border-radius:10px;font-size:.88rem;font-weight:500;opacity:0;pointer-events:none;transition:opacity .3s;z-index:999}
    .toast.show{opacity:1}
    .spinner{width:32px;height:32px;border:3px solid var(--border);border-top-color:var(--gold);border-radius:50%;animation:spin .8s linear infinite;margin:3rem auto}
    @keyframes spin{to{transform:rotate(360deg)}}
    @media(max-width:700px){.sidebar{width:100%;height:auto;position:static;flex-direction:row;overflow-x:auto}.main{margin-left:0}.form-row{grid-template-columns:1fr}}
  </style>
</head>
<body>

<!-- ══ LOGIN ══ -->
<div id="login-screen">
  <div class="login-box">
    <h1>YM SUCCESS</h1>
    <p>Blog admin — sign in to continue</p>
    <div class="field"><label>Username</label><input type="text" id="un" placeholder="admin" autocomplete="username"></div>
    <div class="field"><label>Password</label><input type="password" id="pw" placeholder="••••••••" autocomplete="current-password" onkeydown="if(event.key==='Enter')doLogin()"></div>
    <button class="btn-primary" onclick="doLogin()">Sign In</button>
    <p class="login-err" id="login-err">Invalid username or password.</p>
  </div>
</div>

<!-- ══ APP SHELL ══ -->
<div id="app">
  <aside class="sidebar">
    <div class="sidebar-logo">YM <span>SUCCESS</span><small>Blog Admin</small></div>
    <button class="nav-item active" id="nav-posts" onclick="showView('posts')">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 13h6M9 17h4"/></svg>All Posts
    </button>
    <button class="nav-item" id="nav-new" onclick="openEditor()">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>New Post
    </button>
    <a class="nav-item" href="blog" target="_blank">
      <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>View Blog
    </a>
    <div class="sidebar-footer">
      <button class="logout-btn" onclick="doLogout()">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>Sign out
      </button>
    </div>
  </aside>

  <div class="main">
    <!-- POSTS LIST -->
    <div id="posts-view">
      <div class="topbar">
        <h1 id="view-title">All Posts</h1>
        <div class="topbar-actions">
          <button class="btn btn-gold" onclick="openEditor()">+ New Post</button>
        </div>
      </div>
      <div class="content">
        <div class="stats" id="stats-row"></div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr><th>Title</th><th>Category</th><th>Status</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody id="posts-table"><tr><td colspan="5"><div class="spinner"></div></td></tr></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- EDITOR -->
    <div id="editor-view">
      <div class="topbar">
        <h1 id="editor-title">New Post</h1>
        <div class="topbar-actions">
          <button class="btn" onclick="showView('posts')">Cancel</button>
          <button class="btn btn-gold" onclick="savePost('draft')">Save Draft</button>
          <button class="btn btn-gold" onclick="savePost('published')" style="background:#16a34a;border-color:#16a34a;color:#fff">Publish</button>
        </div>
      </div>
      <div class="content">
        <div class="editor-form">
          <div class="form-group">
            <label>Post Title *</label>
            <input type="text" id="f-title" placeholder="Enter a compelling title..." oninput="autoSlug()">
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>URL Slug *</label>
              <input type="text" id="f-slug" placeholder="my-post-title">
              <small>Will appear as: blog?post=<span id="slug-preview">my-post-title</span></small>
            </div>
            <div class="form-group">
              <label>Category</label>
              <input type="text" id="f-category" placeholder="e.g. Technology, News, Tips">
            </div>
          </div>
          <div class="form-group">
            <label>Excerpt (short summary)</label>
            <textarea id="f-excerpt" rows="2" placeholder="Brief description shown on blog listing..."></textarea>
          </div>
          <div class="form-group">
            <label>Cover Image URL</label>
            <input type="url" id="f-image" placeholder="https://..." oninput="previewImg()">
            <img id="img-preview" src="" alt="" style="display:none;margin-top:.5rem;max-height:140px;border-radius:8px;object-fit:cover">
          </div>
          <div class="form-group">
            <label>Tags <small style="font-weight:400">(comma separated)</small></label>
            <input type="text" id="f-tags" placeholder="php, software, malaysia">
          </div>

          <!-- SEO BOX -->
          <div class="seo-box">
            <h3>&#128269; SEO Settings</h3>
            <div class="form-group">
              <label>Meta Title <small style="font-weight:400">(for Google — recommended 50–60 chars)</small></label>
              <input type="text" id="f-meta-title" placeholder="Leave blank to use post title" maxlength="70">
            </div>
            <div class="form-group" style="margin-bottom:0">
              <label>Meta Description <small style="font-weight:400">(for Google snippet — recommended 120–160 chars)</small></label>
              <textarea id="f-meta-desc" rows="2" placeholder="Leave blank to use excerpt" maxlength="320"></textarea>
              <small id="meta-count">0 / 160 chars</small>
            </div>
          </div>

          <!-- RICH TEXT EDITOR -->
          <div class="form-group">
            <label>Post Content *</label>
            <div id="quill-editor"></div>
          </div>

          <input type="hidden" id="edit-id" value="">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
const API='api.php'; // change to your full URL if needed
const apiUrl=(r,params={})=>{
  const q=new URLSearchParams({r,...params});
  return `${API}?${q.toString()}`;
};
let token=localStorage.getItem('ym_admin_token')||'';
let quill;

// ── INIT ─────────────────────────────────────────────────────
window.onload=()=>{
  if(token) showApp();
  quill=new Quill('#quill-editor',{theme:'snow',modules:{toolbar:[[{header:[1,2,3,false]}],['bold','italic','underline','strike'],['blockquote','code-block'],[{list:'ordered'},{list:'bullet'}],['link','image'],['clean']]}});
};

// ── AUTH ──────────────────────────────────────────────────────
async function doLogin(){
  const un=document.getElementById('un').value;
  const pw=document.getElementById('pw').value;
  if(!un||!pw) return;
  try{
    const r=await fetch(apiUrl('login'),{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({username:un,password:pw})});
    const d=await r.json();
    if(d.token){token=d.token;localStorage.setItem('ym_admin_token',token);showApp();}
    else{document.getElementById('login-err').style.display='block';}
  }catch{document.getElementById('login-err').style.display='block';}
}

async function doLogout(){
  await fetch(apiUrl('logout'),{method:'POST',headers:{Authorization:`Bearer ${token}`}});
  token='';localStorage.removeItem('ym_admin_token');
  document.getElementById('app').style.display='none';
  document.getElementById('login-screen').style.display='flex';
}

function showApp(){
  document.getElementById('login-screen').style.display='none';
  document.getElementById('app').style.display='block';
  loadAdminPosts();
}

function ah(){return{Authorization:`Bearer ${token}`,'Content-Type':'application/json'};}

// ── VIEWS ─────────────────────────────────────────────────────
function showView(v){
  document.getElementById('posts-view').style.display=v==='posts'?'block':'none';
  document.getElementById('editor-view').style.display=v==='editor'?'block':'none';
  document.getElementById('nav-posts').classList.toggle('active',v==='posts');
  document.getElementById('nav-new').classList.toggle('active',v==='editor');
  if(v==='posts') loadAdminPosts();
}

// ── LOAD ALL POSTS (admin) ────────────────────────────────────
async function loadAdminPosts(){
  document.getElementById('posts-table').innerHTML='<tr><td colspan="5"><div class="spinner"></div></td></tr>';
  try{
    const r=await fetch(apiUrl('admin-posts'),{headers:ah()});
    if(r.status===401){doLogout();return;}
    const d=await r.json();
    const posts=d.posts||[];
    const pub=posts.filter(p=>p.status==='published').length;
    const draft=posts.length-pub;
    document.getElementById('stats-row').innerHTML=`
      <div class="stat-card"><div class="val">${posts.length}</div><div class="lbl">Total Posts</div></div>
      <div class="stat-card"><div class="val">${pub}</div><div class="lbl">Published</div></div>
      <div class="stat-card"><div class="val">${draft}</div><div class="lbl">Drafts</div></div>`;
    if(!posts.length){document.getElementById('posts-table').innerHTML='<tr><td colspan="5" style="text-align:center;padding:3rem;color:var(--muted)">No posts yet. Create your first post!</td></tr>';return;}
    document.getElementById('posts-table').innerHTML=posts.map(p=>{
      const dt=new Date(p.created_at).toLocaleDateString('en-MY',{day:'numeric',month:'short',year:'numeric'});
      return`<tr>
        <td><strong style="color:var(--navy)">${e(p.title)}</strong><br><small style="color:var(--muted)">/blog?post=${e(p.slug)}</small></td>
        <td>${e(p.category||'—')}</td>
        <td><span class="badge badge-${p.status==='published'?'pub':'draft'}">${p.status}</span></td>
        <td style="color:var(--muted);font-size:.82rem">${dt}</td>
        <td><div class="tbl-actions">
          <button class="tbl-btn" onclick="editPost(${p.id})">Edit</button>
          <button class="tbl-btn del" onclick="deletePost(${p.id},'${e(p.title)}')">Delete</button>
        </div></td>
      </tr>`;
    }).join('');
  }catch{document.getElementById('posts-table').innerHTML='<tr><td colspan="5" style="text-align:center;padding:2rem;color:var(--red)">Error loading posts.</td></tr>';}
}

// ── EDITOR ────────────────────────────────────────────────────
function openEditor(post=null){
  document.getElementById('edit-id').value='';
  document.getElementById('f-title').value='';
  document.getElementById('f-slug').value='';
  document.getElementById('f-category').value='';
  document.getElementById('f-excerpt').value='';
  document.getElementById('f-image').value='';
  document.getElementById('f-tags').value='';
  document.getElementById('f-meta-title').value='';
  document.getElementById('f-meta-desc').value='';
  document.getElementById('img-preview').style.display='none';
  document.getElementById('slug-preview').textContent='';
  document.getElementById('editor-title').textContent='New Post';
  quill.setContents([]);
  showView('editor');
}

async function editPost(id){
  openEditor();
  document.getElementById('editor-title').textContent='Edit Post';
  try{
    // get all posts and find this one
    const r=await fetch(apiUrl('admin-posts'),{headers:ah()});
    const d=await r.json();
    const posts=d.posts||[];
    const meta=posts.find(p=>p.id===id);
    if(!meta) return;
    // fetch full post by slug
    const r2=await fetch(apiUrl('posts',{id:meta.slug}),{headers:ah()});
    const post=await r2.json();
    document.getElementById('edit-id').value=post.id;
    document.getElementById('f-title').value=post.title||'';
    document.getElementById('f-slug').value=post.slug||'';
    document.getElementById('slug-preview').textContent=post.slug||'';
    document.getElementById('f-category').value=post.category||'';
    document.getElementById('f-excerpt').value=post.excerpt||'';
    document.getElementById('f-image').value=post.cover_image||'';
    document.getElementById('f-tags').value=post.tags||'';
    document.getElementById('f-meta-title').value=post.meta_title||'';
    document.getElementById('f-meta-desc').value=post.meta_description||'';
    if(post.cover_image){const img=document.getElementById('img-preview');img.src=post.cover_image;img.style.display='block';}
    quill.clipboard.dangerouslyPasteHTML(post.content||'');
    showView('editor');
  }catch{toast('Error loading post','red');}
}

async function savePost(status){
  const title=document.getElementById('f-title').value.trim();
  const content=quill.root.innerHTML;
  if(!title){toast('Please enter a title','red');return;}
  if(quill.getText().trim().length<10){toast('Content is too short','red');return;}

  const id=document.getElementById('edit-id').value;
  const body={
    title,
    slug:document.getElementById('f-slug').value.trim()||slugify(title),
    excerpt:document.getElementById('f-excerpt').value.trim(),
    content,
    cover_image:document.getElementById('f-image').value.trim(),
    category:document.getElementById('f-category').value.trim(),
    tags:document.getElementById('f-tags').value.trim(),
    meta_title:document.getElementById('f-meta-title').value.trim(),
    meta_description:document.getElementById('f-meta-desc').value.trim(),
    status
  };

  try{
    let r;
    if(id){
      r=await fetch(apiUrl('posts',{id}),{method:'PUT',headers:ah(),body:JSON.stringify(body)});
    }else{
      r=await fetch(apiUrl('posts'),{method:'POST',headers:ah(),body:JSON.stringify(body)});
    }
    if(r.ok){
      toast(status==='published'?'Post published!':'Draft saved');
      setTimeout(()=>showView('posts'),900);
    }else{toast('Error saving post','red');}
  }catch{toast('Connection error','red');}
}

async function deletePost(id,title){
  if(!confirm(`Delete "${title}"? This cannot be undone.`)) return;
  try{
    const r=await fetch(apiUrl('posts',{id}),{method:'DELETE',headers:ah()});
    if(r.ok){toast('Post deleted');loadAdminPosts();}
    else toast('Error deleting post','red');
  }catch{toast('Connection error','red');}
}

// ── HELPERS ────────────────────────────────────────────────────
function autoSlug(){
  const t=document.getElementById('f-title').value;
  const s=slugify(t);
  document.getElementById('f-slug').value=s;
  document.getElementById('slug-preview').textContent=s;
}

function slugify(t){return t.toLowerCase().trim().replace(/[^a-z0-9\s-]/g,'').replace(/[\s-]+/g,'-').replace(/^-+|-+$/g,'');}

function previewImg(){
  const url=document.getElementById('f-image').value.trim();
  const img=document.getElementById('img-preview');
  if(url){img.src=url;img.style.display='block';}else img.style.display='none';
}

document.addEventListener('input',ev=>{
  if(ev.target.id==='f-meta-desc'){
    document.getElementById('meta-count').textContent=`${ev.target.value.length} / 160 chars`;
  }
  if(ev.target.id==='f-slug'){
    document.getElementById('slug-preview').textContent=ev.target.value;
  }
});

function e(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}

function toast(msg,type=''){
  const t=document.getElementById('toast');
  t.textContent=msg;
  t.style.background=type==='red'?'var(--red)':'var(--navy)';
  t.style.color=type==='red'?'#fff':'var(--gold)';
  t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),2800);
}
</script>
</body>
</html>
