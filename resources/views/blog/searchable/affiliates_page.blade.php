<?php 

         $category = '<div class="view-all-area">';
        $category .= '<div class="row justify-content-center">';
            foreach($affiliates as $affiliate) {
                if($affiliate->category->category == $_POST['search_affiliate']) {
                    $category .= '<div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 no-pad">';
                            $category .= '<a class="product" rel="sponsored" href="' . $affiliate->link . '" target="_blank">';
                                $category .= '<div class="image-contain">';
                                    $category .= '<img src="' . $affiliate->image . '" title="' . ucwords($affiliate->pet->pet) . ' ' . ucwords($affiliate->category->category) . '" alt="' . ucwords($affiliate->pet->pet) . ' ' . ucwords($affiliate->category->category) . '" />';
                                    $category .= '<span class="' . $affiliate->brand . '"></span>';
                                    $category .= '</div>';
                                    $category .= '<div class="product-body">';         
                                    $category .= '<span><small class="animal">' . ucwords($affiliate->pet->pet) . '</small> <small class="cat">' . ucwords($affiliate->category->category) . '</small> <small class="brand">' . ucwords($affiliate->brand->brand) . '</small></span>';
                                    $category .= '<span>' . substr($affiliate->name, 0, 140) . ' ...</span>';
                                    $category .= '<ul class="affiliated-specs">';
                                        $category .= '<li class="spec-adjust">' . $affiliate->spec_1_name . ':</li>';
                                        $category .= '<li class="spec-adjust-span">' . $affiliate->spec_1 . '</li>';
                                        $category .= '<li class="spec-adjust">' . $affiliate->spec_2_name . ':</li>';
                                        $category .= '<li class="spec-adjust-span">' . $affiliate->spec_2 . '</li>';
                                        $category .= '<li class="spec-adjust">' . $affiliate->spec_3_name . ':</li>';
                                        $category .= '<li class="spec-adjust-span">' . $affiliate->spec_3 . '</li>';
                                        $category .= '<li class="spec-adjust">' . $affiliate->spec_4_name . ':</li>';
                                        $category .= '<li class="spec-adjust-span">' . $affiliate->spec_4 . '</li>';
                                    $category .= '</ul>';
                                $category .= '<span class="delivery">' . $affiliate->delivery->delivery . '</span>';
                                $category .= '<div class="break"></div>';
                                    if($affiliate->star == 5) {
                                        $category .= '<img class="star-5" src="/images/star-' . $affiliate->star . '.png"
                                        alt="star ' . $affiliate->star . '" />';
                                    }else{
                                        $category .= '<img class="star" src="/images/star-' . $affiliate->star . '.png"
                                        alt="star ' . $affiliate->star . '" />';
                                    }
                                    $category .= '<div class="pricer">';
                                    $category .= '<small>$' . $affiliate->price . '</small>';
                                    $category .= '</div>';
                                    $category .= '<span class="click-here">View ' . ucwords($affiliate->category->category) . '</span>';
                                $category .= '</div>';
                            $category .= '</a>';
                        $category .= '</div>';
                }
            }
        $category .= '</div>';
    $category .= '</div>';

    echo $category;  

?>