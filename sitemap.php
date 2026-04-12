<?php
header('Content-Type: application/xml; charset=utf-8');

// ─── Config ───────────────────────────────────────────
$base_url = 'https://ymsuccess.com';
$lastmod  = date('Y-m-d');

// Tukar ikut DB anda
$db_host = 'localhost';
$db_name = 'ymsukfxv_blog';
$db_user = 'ymsukfxv_fadhil';
$db_pass = 'vGJHQRlpRFMS';

// ─── Sambung DB ───────────────────────────────────────
try {
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8",
        $db_user,
        $db_pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    // Kalau DB error, sitemap masih berfungsi tanpa artikel
    $pdo = null;
}

// ─── Static pages ─────────────────────────────────────
$pages = [
    ['/',     '1.0', 'monthly'],
    ['/blog', '0.8', 'weekly' ],
];

// ─── Ambil artikel blog dari DB ───────────────────────
$posts = [];
if ($pdo) {
    $stmt = $pdo->query("
        SELECT slug, updated_at 
        FROM posts 
        WHERE status = 'published' 
        ORDER BY created_at DESC
    ");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// ─── Output XML ───────────────────────────────────────
echo '<?'.'xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Static pages
foreach ($pages as [$url_path, $priority, $freq]) {
    $full_url = $base_url . $url_path;
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($full_url, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$freq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

// Blog articles (dynamic)
foreach ($posts as $post) {
    $url      = $base_url . '/blog?post=' . rawurlencode($post['slug']);
    $postDate = date('Y-m-d', strtotime($post['updated_at']));

    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($url, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <lastmod>$postDate</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.6</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';