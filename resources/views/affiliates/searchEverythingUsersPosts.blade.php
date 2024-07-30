<?php 
        $category = '';
            foreach($posts as $post) {
                if(stripos($post->name, $_POST['everything2']) !== false || stripos($post->category->category, $_POST['everything2']) !== false || stripos($post->pet->pet, $_POST['everything2']) !== false || stripos($post->brand->brand, $_POST['everything2']) !== false) {
                    $category .= '<div class="using">';
                    $category .= '<div class="row">';
                    $category .= '<div class="col-md-12">';
                        $category .= '<ul>';
                            $category .= '<li><a href="/blog/' . $post->pet->pet . '/' . $post->category->category . '/' . $post->brand->brand . '/' . $post->slug . '">view post</a></li>';
                            $category .= '<li><a href="view-single-post/' . $post->id . '">view card</a></li>';
                            $category .= '<li><a href="update-post/' . $post->id . '">update product</a></li>';
                            $category .= '<li><a href="delete-post/' . $post->id . '">delete product</a></li>';
                        $category .= '</ul>';
                    $category .= '</div>';
                    $category .= '</div>';
                    $category .= '<div class="row">';
                    $category .= '<div class="col-md-6">';
                    $category .= '<small>Name:</small>';
                        $category .= $post->name;
                    $category .= '</div>';
                    $category .= '<div class="col-md-2">';
                    $category .= '<small>Author:</small>';
                        $category .= $post->author;
                    $category .= '</div>';
                    $category .= '<div class="col-md-2">';
                    $category .= '<small>Category:</small>';
                        $category .= $post->category->category;
                    $category .= '</div>';
                    $category .= '<div class="col-md-2">';
                    $category .= '<small>Pet:</small>';
                        $category .= $post->pet->pet;
                    $category .= '</div>';
                    $category .= '</div>';
        $category .= '</div>';
        $category .= '<div class="tiny-break"></div>';
                }
            }

echo $category;  

?>