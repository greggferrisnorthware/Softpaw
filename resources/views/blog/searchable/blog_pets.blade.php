<?php 

    $pet = '<div class="view-all-area blog">';
        $pet .= '<div class="row justify-content-center">';
            foreach($posts as $post) {
                if($post->pet->pet == $_POST['search_pet']) {
                    $pet .= '<div class="col-md-3 no-pad">';
                        $pet .= '<a class="product" href="/blog/' . $post->pet->pet . '/' . str_replace(' ', '-', strtolower($post->category->category)) . '/' . str_replace(' ', '-', strtolower($post->brand->brand)) . '/' . str_replace(' ', '-', strtolower($post->slug)) . '">';
                            $pet .= '<div class="image-contain">';
                            $pet .= '<img src="/blog-uploads/' . $post->image . '" title="' . ucwords($post->pet->pet) . ' ' . ucwords($post->category->category) . '" alt="' . ucwords($post->pet->pet) . ' ' . ucwords($post->category->category) . '">';
                            $pet .= '<span class="avatar"></span>';
                            $pet .= '</div>';
                            $pet .= '<div class="product-body">';
                            $pet .= '<span><small class="animal">' . ucwords($post->pet->pet) . '</small> <small class="cat">' . ucwords($post->category->category) . '</small></span>';  
                            $pet .= '<span class="blog-heading">' . $post->name . '<small>Published: ' . date('m/d/Y', strtotime($post->created_at)) . '</small></span>';
                            $pet .= '<span class="paraline">' . substr($post->description, 0, 160) . ' ...</span>';
                            $pet .= '<div class="break"></div>';
                            $pet .= '<span class="click-here">Read More</span>';
                            $pet .= '</div>';
                        $pet .= '</a>';
                    $pet .= '</div>';
                }
            }
        $pet .= '</div>';
    $pet .= '</div>';

    echo $pet;  

?>