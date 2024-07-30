<?php 

     $category = '<div class="view-all-area blog">';
        $category .= '<div class="row justify-content-center">';
            foreach($posts as $post) {
                if(!empty($_POST['allCategory'])) {
                    if(stripos($post->name, $_POST['allCategory']) !== false || stripos($post->category->category, $_POST['allCategory']) !== false || stripos($post->pet->pet, $_POST['allCategory']) !== false) {
                        $category .= '<div class="col-md-3 no-pad">';
                            $category .= '<a class="product" href="/blog/' . $post->pet->pet . '/' . str_replace(' ', '-', strtolower($post->category->category)) . '/' . str_replace(' ', '-', strtolower($post->brand->brand)) . '/' . str_replace(' ', '-', strtolower($post->slug)) . '">';
                                $category .= '<span>' . $post->name . '</span>';
                            $category .= '</a>';
                        $category .= '</div>';
                    }
                }
            }
        $category .= '</div>';
    $category .= '</div>';

    echo $category;  

?>