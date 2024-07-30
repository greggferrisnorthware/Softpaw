<?php 

$category = '<div class="medium-break"></div>';
    $category .= '<div class="view-all-area">';
        $category .= '<div class="row justify-content-center">';
            foreach($affiliates as $affiliate) {
                if(stripos($affiliate->name, $_POST['everything']) !== false || stripos($affiliate->category->category, $_POST['everything']) !== false || stripos($affiliate->pet->pet, $_POST['everything']) !== false || stripos($affiliate->brand->brand, $_POST['everything']) !== false || stripos($affiliate->spec_1, $_POST['everything']) !== false || stripos($affiliate->spec_2, $_POST['everything']) !== false || stripos($affiliate->spec_3, $_POST['everything']) !== false || stripos($affiliate->spec_4, $_POST['everything']) !== false) {
                    $category .= '<div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2">';
                        $category .= '<a rel="sponsored" class="product" href="' . $affiliate->link . '" target="_blank">';
                            // if($affiliate->status !== null) {
                            //      $category .= '<span class="status">' . $affiliate->status . '</span>';
                            // }
                            $category .= '<div class="image-contain">';
                            $category .= '<img src="' . $affiliate->image . '" title="' . $affiliate->name . '" alt="' . $affiliate->name . '">';
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
                                // $category .= '<p>' . substr($affiliate->description, 0, 60) . ' ...</p>';
                                if($affiliate->star == 5) {
                                    $category .= '<img class="star-5" src="/images/star-' . $affiliate->star . '.png"
                                    alt="star ' . $affiliate->star . '" />';
                                }else{
                                    $category .= '<img class="star" src="/images/star-' . $affiliate->star . '.png"
                                    alt="star ' . $affiliate->star . '" />';
                                }
                                $category .= '<div class="break"></div>';
                                // $category .= '<span>In stock:' . $affiliate->stock . '</span>';
                                $category .= '<div class="break"></div>';
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
    $category .= '<div class="medium-break"></div>';

echo $category;  

?>