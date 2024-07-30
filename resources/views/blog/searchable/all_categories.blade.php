<?php 

     $category = '<div class="view-all-area blog">';
        $category .= '<div class="row justify-content-center">';
            foreach($posts as $post) {
                if(stripos($post->name, $_POST['allCategory']) !== false || stripos($post->category->category, $_POST['allCategory']) !== false || stripos($post->pet->pet, $_POST['allCategory']) !== false) {
                    $category .= '<div class="col-md-3 no-pad">';
                        $category .= '<a class="product" href="/blog/' . $post->pet->pet . '/' . str_replace(' ', '-', strtolower($post->category->category)) . '/' . str_replace(' ', '-', strtolower($post->brand->brand)) . '/' . str_replace(' ', '-', strtolower($post->slug)) . '">';
                            $category .= '<div class="image-contain">';
                            $category .= '<img src="/blog-uploads/' . $post->image . '" title="' . $post->name . '" alt="' . $post->name . '">';
                            $category .= '<span class="avatar"></span>';
                            $category .= '</div>';
                            $category .= '<div class="product-body">';
                               $category .= '<span><small class="animal">' . ucwords($post->pet->pet) . '</small> <small class="cat">' . ucwords($post->category->category) . '</small></span>';   
                                $category .= '<span class="blog-heading">' . $post->name . '<small>Published: ' . date('m/d/Y', strtotime($post->created_at)) . '</small></span>';
                                $category .= '<p>' . substr($post->description, 0, 160) . ' ...</p>';
                                $category .= '<div class="break"></div>';
                                $category .= '<span class="click-here">Read More</span>';
                            $category .= '</div>';
                        $category .= '</a>';
                    $category .= '</div>';
                }
            }
        $category .= '</div>';
    $category .= '</div>';

    echo $category;  

?>