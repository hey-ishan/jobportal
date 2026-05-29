<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/app'));
foreach ($files as $file) {
    if ($file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        $count = 0;
        $content = preg_replace_callback('/protected\s+\$dates\s*=\s*\[(.*?)\];/is', function($matches) {
            $items = explode(',', $matches[1]);
            $casts = [];
            foreach ($items as $item) {
                $item = trim($item);
                if (!empty($item)) {
                    $casts[] = $item . ' => \'datetime\'';
                }
            }
            return 'protected $casts = [' . implode(', ', $casts) . '];';
        }, $content, -1, $count);
        
        if ($count > 0) {
            file_put_contents($file->getPathname(), $content);
            echo "Updated " . $file->getFilename() . "\n";
        }
    }
}
echo "Done.\n";
