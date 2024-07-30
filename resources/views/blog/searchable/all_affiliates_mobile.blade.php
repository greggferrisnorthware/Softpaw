<?php 

     $category = '<div class="view-all-area">';
        $category .= '<div class="row justify-content-center">';
            foreach($affiliates as $affiliate) {
                if(!empty($_POST['allCategory'])) {
                    if($affiliate->pet->pet == $_POST['pet']) {
                        if(stripos($affiliate->name, $_POST['allCategory']) !== false || stripos($affiliate->category->category, $_POST['allCategory']) !== false || stripos($affiliate->pet->pet, $_POST['allCategory']) !== false || stripos($affiliate->spec_1, $_POST['allCategory']) !== false || stripos($affiliate->spec_2, $_POST['allCategory']) !== false || stripos($affiliate->spec_3, $_POST['allCategory']) !== false || stripos($affiliate->spec_4, $_POST['allCategory']) !== false || stripos($affiliate->brand->brand, $_POST['allCategory']) !== false) {
                            $category .= '<div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 no-pad">';
                                $category .= '<a class="product" rel="sponsored" href="' . $affiliate->link . '" target="_blank">';
                                    $category .= '<span>' . $affiliate->name . '</span>';
                                $category .= '</a>';
                            $category .= '</div>';
                        }
                    }
                }
            }
        $category .= '</div>';
    $category .= '</div>';

    echo $category;  

?>