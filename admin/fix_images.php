<?php
$dirs = [__DIR__, __DIR__ . '/includes'];

foreach ($dirs as $dir) {
    $files = glob($dir . '/*.php');
    foreach ($files as $file) {
        $content = file_get_contents($file);
        
        $original = $content;
        
        // Replace src="src/images/ with src="src/images/
        $content = str_replace('src="src/images/', 'src="src/images/', $content);
        // Replace src="src/images/ with src="src/images/ (only if not already src="src/images/")
        // A simple way is to replace src="src/images/ with src="src/images/ and then fix any src="src/images/
        $content = str_replace('src="src/images/', 'src="src/images/', $content);
        $content = str_replace('src="src/images/', 'src="src/images/', $content);

        // Do the same for href
        $content = str_replace('href="src/images/', 'href="src/images/', $content);
        $content = str_replace('href="src/images/', 'href="src/images/', $content);
        $content = str_replace('href="src/images/', 'href="src/images/', $content);

        if ($content !== $original) {
            file_put_contents($file, $content);
            echo "Fixed images in " . basename($file) . "\n";
        }
    }
}
echo "Done fixing image paths.\n";
