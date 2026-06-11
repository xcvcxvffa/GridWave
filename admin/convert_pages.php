<?php
// convert_pages.php

$srcDir = __DIR__ . '/src';
$destDir = __DIR__;
$includesDir = __DIR__ . '/includes';

// Get all html files in src
$files = glob($srcDir . '/*.html');

foreach ($files as $file) {
    $basename = basename($file);
    // Skip signin and signup since we already did signin and signup might not be needed or handled separately
    if ($basename === 'signin.html' || $basename === 'signup.html') {
        continue;
    }

    $content = file_get_contents($file);

    // 1. Add auth require
    $content = "<?php require_once __DIR__ . '/includes/auth.php'; ?>\n" . $content;

    // 2. Inject CSS/JS into <head>
    $inject = "\n    <link href=\"build/style.css\" rel=\"stylesheet\">\n    <script defer src=\"build/bundle.js\"></script>\n  </head>";
    $content = str_replace("</head>", $inject, $content);

    // 3. Replace <include> tags
    $content = preg_replace_callback('/<include\s+src="([^"]+)"\s*\/?>\s*(?:<\/include>)?/is', function($matches) {
        $src = $matches[1];
        // e.g. ./partials/sidebar.html
        
        $basename = basename($src);
        
        // If it's a top-level partial we copied to includes/ (like sidebar.html)
        if (strpos($src, './partials/') === 0 && substr_count($src, '/') === 2) {
            $phpName = str_replace('.html', '.php', $basename);
            return "<?php include __DIR__ . '/includes/" . $phpName . "'; ?>";
        }
        
        // Otherwise, include it from src/ directly (like ./partials/chart/chart-01.html)
        $cleanSrc = ltrim($src, './');
        return "<?php include __DIR__ . '/src/" . $cleanSrc . "'; ?>";
    }, $content);

    // 4. Update .html links to .php links in the content (for internal links)
    $content = preg_replace('/href="([a-zA-Z0-9_-]+)\.html"/', 'href="$1.php"', $content);

    // Save to .php
    $destFile = $destDir . '/' . str_replace('.html', '.php', $basename);
    file_put_contents($destFile, $content);
    echo "Converted $basename\n";
}

// Now update the sidebar.php links
$sidebarFile = $includesDir . '/sidebar.php';
if (file_exists($sidebarFile)) {
    $sidebar = file_get_contents($sidebarFile);
    $sidebar = preg_replace('/href="([a-zA-Z0-9_-]+)\.html"/', 'href="$1.php"', $sidebar);
    // Fix specific pages if needed
    file_put_contents($sidebarFile, $sidebar);
    echo "Updated sidebar.php\n";
}

// Update header.php links
$headerFile = $includesDir . '/header.php';
if (file_exists($headerFile)) {
    $header = file_get_contents($headerFile);
    $header = preg_replace('/href="([a-zA-Z0-9_-]+)\.html"/', 'href="$1.php"', $header);
    // Let's also fix the logo path in the sidebar
    file_put_contents($headerFile, $header);
    echo "Updated header.php\n";
}

echo "All conversions complete!\n";
