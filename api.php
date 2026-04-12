<?php
// ============================================================
//  YM SUCCESS Blog API  —  api
//  Place this file on your server alongside blog & admin
// ============================================================

// ── 1. DATABASE CONFIG ──────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'ymsukfxv_blog');
define('DB_USER', 'ymsukfxv_fadhil');
define('DB_PASS', 'vGJHQRlpRFMS');

// ── 2. CORS & HEADERS ───────────────────────────────────────
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

// ── FIX: define $isLocalHost sebelum guna ──────────────────
$isLocalHost = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']);

set_exception_handler(function (Throwable $e): void {
    if (!headers_sent()) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code(500);
    }
    $debug = (bool)($GLOBALS['API_IS_LOCAL'] ?? false);
    echo json_encode([
        'error'   => 'Server error',
        'message' => $debug ? $e->getMessage() : 'Please check server logs.',
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
});
$GLOBALS['API_IS_LOCAL'] = $isLocalHost;

// ── 3. DB CONNECTION ────────────────────────────────────────
function db(): PDO {
    static $pdo;
    if (!$pdo) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER, DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }
    return $pdo;
}

// ── 4. HELPERS ───────────────────────────────────────────────
function json_out($data, int $code = 200): void {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function slugify(string $text): string {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', $text);
    return trim($text, '-');
}

function get_bearer_token(): string {
    $auth = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

    if (!$auth && isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
        $auth = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    }

    if (!$auth && function_exists('getallheaders')) {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $auth = $headers['Authorization'];
        } elseif (isset($headers['authorization'])) {
            $auth = $headers['authorization'];
        }
    }

    if (preg_match('/Bearer\s+(.+)/i', $auth, $m)) {
        return trim($m[1]);
    }
    return '';
}

function auth_required(): void {
    $token = get_bearer_token();
    if ($token === '') json_out(['error' => 'Unauthorized'], 401);
    $st = db()->prepare('SELECT user_id FROM admin_sessions WHERE token = ? AND expires_at > NOW()');
    $st->execute([$token]);
    if (!$st->fetch()) json_out(['error' => 'Unauthorized'], 401);
}

// ── 5. ROUTER ────────────────────────────────────────────────
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path   = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$parts  = explode('/', $path);

$idx = array_search('api', $parts, true);
if ($idx !== false) {
    $parts = array_slice($parts, $idx + 1);
}
$resource = $parts[0] ?? '';
$id       = $parts[1] ?? null;

if (isset($_GET['r']) && is_string($_GET['r']) && $_GET['r'] !== '') {
    $resource = $_GET['r'];
    if (isset($_GET['id']) && $_GET['id'] !== '' && $_GET['id'] !== null) {
        $id = (string)$_GET['id'];
    }
}

// ── 5a. AUTH ────────────────────────────────────────────────
if ($resource === 'login' && $method === 'POST') {
    $body = json_decode(file_get_contents('php://input'), true);
    $username = trim((string)($body['username'] ?? ''));
    $inputPassword = trim((string)($body['password'] ?? ''));

    $st = db()->prepare('SELECT id, password_hash FROM admin_users WHERE username = ?');
    $st->execute([$username]);
    $user = $st->fetch();

    $isValid = $user && password_verify($inputPassword, $user['password_hash']);

    if (!$isValid) {
        json_out(['error' => 'Invalid credentials'], 401);
    }

    $token = bin2hex(random_bytes(32));
    $ins = db()->prepare('INSERT INTO admin_sessions (token, user_id, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 8 HOUR))');
    $ins->execute([$token, $user['id']]);
    json_out(['token' => $token]);
}

if ($resource === 'logout' && $method === 'POST') {
    $token = get_bearer_token();
    if ($token !== '') {
        $st = db()->prepare('DELETE FROM admin_sessions WHERE token = ?');
        $st->execute([$token]);
    }
    json_out(['ok' => true]);
}

// ── 5b. POSTS ────────────────────────────────────────────────
if ($resource === 'posts') {

    // GET /posts  — public listing
    if ($method === 'GET' && !$id) {
        $page     = max(1, intval($_GET['page'] ?? 1));
        $limit    = min(20, intval($_GET['limit'] ?? 6));
        $offset   = ($page - 1) * $limit;
        $cat      = $_GET['category'] ?? '';
        $search   = $_GET['search'] ?? '';

        $where = ["status = 'published'"];
        $params = [];
        if ($cat)    { $where[] = 'category = ?'; $params[] = $cat; }
        if ($search) { $where[] = '(title LIKE ? OR excerpt LIKE ?)'; $params[] = "%$search%"; $params[] = "%$search%"; }

        $w = 'WHERE ' . implode(' AND ', $where);

        $total = db()->prepare("SELECT COUNT(*) FROM posts $w");
        $total->execute($params);
        $count = (int)$total->fetchColumn();

        $st = db()->prepare("SELECT id,title,slug,excerpt,cover_image,category,tags,created_at FROM posts $w ORDER BY created_at DESC LIMIT $limit OFFSET $offset");
        $st->execute($params);

        json_out(['posts' => $st->fetchAll(), 'total' => $count, 'page' => $page, 'pages' => ceil($count / $limit)]);
    }

    // GET /posts/{slug}  — single post (public, published only)
    if ($method === 'GET' && $id) {
        $st = db()->prepare("SELECT * FROM posts WHERE slug = ? AND status = 'published'");
        $st->execute([$id]);
        $post = $st->fetch();
        if (!$post) json_out(['error' => 'Not found'], 404);
        json_out($post);
    }

    // POST /posts  — create (admin)
    if ($method === 'POST') {
        auth_required();
        $b = json_decode(file_get_contents('php://input'), true);
        $slug = slugify($b['slug'] ?? $b['title'] ?? '');
        $check = db()->prepare('SELECT COUNT(*) FROM posts WHERE slug = ?');
        $check->execute([$slug]);
        if ((int)$check->fetchColumn() > 0) $slug .= '-' . time();

        $st = db()->prepare('INSERT INTO posts (title,slug,excerpt,content,cover_image,category,tags,meta_title,meta_description,status) VALUES (?,?,?,?,?,?,?,?,?,?)');
        $st->execute([
            $b['title'] ?? '', $slug,
            $b['excerpt'] ?? '', $b['content'] ?? '',
            $b['cover_image'] ?? '', $b['category'] ?? '',
            $b['tags'] ?? '',
            $b['meta_title'] ?? $b['title'] ?? '',
            $b['meta_description'] ?? $b['excerpt'] ?? '',
            $b['status'] ?? 'draft'
        ]);
        json_out(['id' => db()->lastInsertId(), 'slug' => $slug], 201);
    }

    // PUT /posts/{id}  — update (admin)
    if ($method === 'PUT' && $id) {
        auth_required();
        $b = json_decode(file_get_contents('php://input'), true);
        $st = db()->prepare('UPDATE posts SET title=?,slug=?,excerpt=?,content=?,cover_image=?,category=?,tags=?,meta_title=?,meta_description=?,status=? WHERE id=?');
        $st->execute([
            $b['title'], $b['slug'], $b['excerpt'], $b['content'],
            $b['cover_image'] ?? '', $b['category'] ?? '', $b['tags'] ?? '',
            $b['meta_title'] ?? $b['title'], $b['meta_description'] ?? $b['excerpt'],
            $b['status'] ?? 'draft', $id
        ]);
        json_out(['ok' => true]);
    }

    // DELETE /posts/{id}  — delete (admin)
    if ($method === 'DELETE' && $id) {
        auth_required();
        $st = db()->prepare('DELETE FROM posts WHERE id = ?');
        $st->execute([$id]);
        json_out(['ok' => true]);
    }
}

// ── 5c. ADMIN: all posts including drafts ─────────────────────
if ($resource === 'admin-posts' && $method === 'GET') {
    auth_required();
    $st = db()->query('SELECT id,title,slug,status,category,created_at FROM posts ORDER BY created_at DESC');
    json_out(['posts' => $st->fetchAll()]);
}

// ── 5d. CATEGORIES ───────────────────────────────────────────
if ($resource === 'categories' && $method === 'GET') {
    $st = db()->query("SELECT DISTINCT category FROM posts WHERE status='published' AND category != '' ORDER BY category");
    json_out(['categories' => array_column($st->fetchAll(), 'category')]);
}

// ── 5e. ADMIN: single post by ID (support draft + published) ──
if ($resource === 'admin-post' && $method === 'GET') {
    auth_required();
    if (!$id) json_out(['error' => 'Missing id'], 400);
    $st = db()->prepare('SELECT * FROM posts WHERE id = ?');
    $st->execute([$id]);
    $post = $st->fetch();
    if (!$post) json_out(['error' => 'Not found'], 404);
    json_out($post);
}

json_out(['error' => 'Not found'], 404);