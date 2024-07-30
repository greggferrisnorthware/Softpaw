<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL .
'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

    // pages
    echo '<url>' . PHP_EOL;
        echo '<loc>https://soft-paw.com</loc>' . PHP_EOL;
        echo '</url>' . PHP_EOL;

    echo '<url>' . PHP_EOL;
        echo '<loc>https://soft-paw.com/blog</loc>' . PHP_EOL;
        echo '</url>' . PHP_EOL;

    // posts
    foreach($posts as $post) {
    echo '<url>' . PHP_EOL;
        echo '<loc>https://soft-paw.com/blog/' . str_replace(' ', '-', strtolower($post->pet->pet)) . '/' .
            str_replace(' ', '-', strtolower($post->category->category)) . '/' . str_replace(' ', '-',
            strtolower($post->slug)) . '</loc>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }

    // other pages

    // echo '<url>' . PHP_EOL;
        // echo '<loc>https://soft-paw.com/pet-care</loc>' . PHP_EOL;
        // echo '</url>' . PHP_EOL;

    // echo '<url>' . PHP_EOL;
        // echo '<loc>https://soft-paw.com/pet-care/puppy</loc>' . PHP_EOL;
        // echo '</url>' . PHP_EOL;

    // others ...
    // foreach($posts as $post) {
    // echo '<url>' . PHP_EOL;
        // echo '<loc>https://soft-paw.com/blog/' . $post->pet->pet . '/' . $post->category->category . '/' .
            // $post->slug . '</loc>' . PHP_EOL;
        // echo '</url>' . PHP_EOL;
    // }

    echo '</urlset>' . PHP_EOL;
?>