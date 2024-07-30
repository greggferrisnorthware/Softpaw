<?php

    $count = 1;
    $category = '<ul>';
        foreach($posts as $post) {
            if(!empty($_POST['allCategoryPostAside'])) {
                if(stripos($post->name, $_POST['allCategoryPostAside']) !== false || stripos($post->category->category, $_POST['allCategoryPostAside']) !== false || stripos($post->pet->pet, $_POST['allCategoryPostAside']) !== false || stripos($post->spec_1, $_POST['allCategoryPostAside']) !== false || stripos($post->spec_2, $_POST['allCategoryPostAside']) !== false || stripos($post->spec_3, $_POST['allCategoryPostAside']) !== false || stripos($post->spec_4, $_POST['allCategoryPostAside']) !== false || stripos($post->brand->brand, $_POST['allCategoryPostAside']) !== false) {
                        $category .= '<li><a class="post-aside" href="' . $post->link . '">' . substr($post->name, 0, 75) . ' ...<span class="aside-date">Published: ' . $post->created_at . '</span><small class="animal">' . ucwords($post->pet->pet) . '</small> <small class="cat">' . ucwords($post->category->category) . '</small></a></li>';
                }
            }else{
                if($count < 6) {
                    $category .= '<li><a class="post-aside" href="' . $post->link . '">' . substr($post->name, 0, 75) . ' ...<span class="aside-date">Published: ' . $post->created_at . '</span><small class="animal">' . ucwords($post->pet->pet) . '</small> <small class="cat">' . ucwords($post->category->category) . '</small></a></li>';
                }
            }
            $count++;
        }

    $category .= '</ul>';

    echo $category;  

?>