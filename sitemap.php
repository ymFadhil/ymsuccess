<?php
// Set XML header
header('Content-Type: application/xml; charset=utf-8');

// Base URL of your website
$base_url = 'https://ymsuccess.com'; // Change if needed

// Current date
$lastmod = date('Y-m-d');

// List all pages
$pages = [
    ['/new', '1.0', 'weekly'],
];

// Start XML output (no whitespace above this line)
echo '<?'.'xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

// Loop through pages
foreach ($pages as $page) {
    [$url_path, $priority, $freq] = $page;
    $full_url = $base_url . $url_path;

    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($full_url, ENT_XML1, 'UTF-8') . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$freq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
