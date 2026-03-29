<?php
// AUTO detect base URL
// Local: site dalam folder ymsuccess (e.g. http://localhost/ymsuccess)
// Server: site terus dalam public_html (e.g. https://ymsuccess.com) – jangan tambah /ymsuccess
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

$is_local = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);
if ($is_local) {
    $base_url .= "/ymsuccess";
}

// Base path (without protocol and domain) for relative paths
$base_path_relative = $is_local ? "/ymsuccess" : '';

// ── MySQL (CapitalEdge / optional apps) ─────────────────────
// Override via environment or edit defaults below. Create DB & import CapitalEdge/setup.sql.
if (!defined('DB_HOST')) {
    define('DB_HOST', getenv('localhost') ?: '127.0.0.1');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', getenv('ymhuewpx_kc') ?: 'kaki_capital');
}
if (!defined('DB_USER')) {
    define('DB_USER', getenv('ymhuewpx_user') ?: 'root');
}
if (!defined('DB_PASS')) {
    $envPass = getenv('U[J@]GgR9@q');
    define('DB_PASS', $envPass === false ? '' : (string) $envPass);
}
if (!defined('DB_CHARSET')) {
    define('DB_CHARSET', 'utf8mb4');
}
?>

