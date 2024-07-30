<?php 
        $category = '';
            foreach($affiliates as $affiliate) {
                if(stripos($affiliate->name, $_POST['everything']) !== false || stripos($affiliate->category->category, $_POST['everything']) !== false || stripos($affiliate->pet->pet, $_POST['everything']) !== false || stripos($affiliate->brand->brand, $_POST['everything']) !== false) {        
                $category .= '<div class="using">';
                    $category .= '<div class="row">';
                    $category .= '<div class="col-md-12">';
                        $category .= '<ul>';
                            $category .= '<li><a rel="sponsored" href="' . $affiliate->link . '" target="_blank">view product</a></li>';
                            $category .= '<li><a href="view-single-affiliate/' . $affiliate->id . '">view card</a></li>';
                            $category .= '<li><a href="update-affiliate/' . $affiliate->id . '">update product</a></li>';
                            $category .= '<li><a href="delete-affiliate/' . $affiliate->id . '">delete product</a></li>';
                        $category .= '</ul>';
                    $category .= '</div>';             
                    $category .= '</div>';
                $category .= '<div class="row">';
                    $category .= '<div class="col-md-7">';
                    $category .= '<small>Name:</small>';
                        $category .= $affiliate->name;
                    $category .= '</div>';
                    $category .= '<div class="col-md-1">';
                    $category .= '<small>Rank:</small>';
                        $category .= $affiliate->rank;
                    $category .= '</div>';
                    $category .= '<div class="col-md-2">';
                    $category .= '<small>Category:</small>';
                        $category .= $affiliate->category->category;
                    $category .= '</div>';
                    $category .= '<div class="col-md-2">';
                    $category .= '<small>Pet:</small>';
                        $category .= $affiliate->pet->pet;
                    $category .= '</div>';
                    $category .= '</div>';             
                $category .= '</div>';
        $category .= '<div class="tiny-break"></div>';
                }
            }

echo $category;  

?>