<?php
// Change working directory to project root so includes work
chdir(__DIR__ . '/../');

// Get the requested path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Default to index.php if root is requested
if ($path === '/' || $path === '') {
    $path = '/index.php';
}

$file = __DIR__ . '/..' . $path;

// Serve the PHP file if it exists
if (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    require $file;
} else {
    http_response_code(404);
    echo "404 Not Found";
}
