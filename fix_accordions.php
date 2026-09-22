<?php
$dir = new RecursiveDirectoryIterator('resources/views/web');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/\.blade\.php$/', RegexIterator::MATCH);

foreach($files as $file) {
    $content = file_get_contents($file);
    // Find all un-collapsed buttons and their targets
    // Pattern matches: class="accordion-button" (but not collapsed) ... data-bs-target="#targetId"
    preg_match_all('/class="accordion-button"(?:(?!collapsed)[^>])*data-bs-target="#([^"]+)"/is', $content, $matches);
    
    if (!empty($matches[1])) {
        foreach($matches[1] as $targetId) {
            // Find the corresponding collapse div and add 'show' if missing
            $pattern = '/(id="' . preg_quote($targetId, '/') . '"[^>]*class="[^"]*accordion-collapse collapse)(?![^"]*show)([^"]*")/is';
            $content = preg_replace($pattern, '$1 show$2', $content);
            
            // Or if id comes after class
            $pattern2 = '/(class="[^"]*accordion-collapse collapse)(?![^"]*show)([^"]*"[^>]*id="' . preg_quote($targetId, '/') . '")/is';
            $content = preg_replace($pattern2, '$1 show$2', $content);
        }
        file_put_contents($file, $content);
        echo "Fixed " . basename($file) . " targets: " . implode(", ", $matches[1]) . "\n";
    }
}
