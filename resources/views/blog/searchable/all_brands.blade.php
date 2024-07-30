<?php 

     $brand = '<div class="view-all-area">';
        $brand .= '<div class="row justify-content-center">';
            foreach($affiliates as $affiliate) {
                if(stripos($affiliate->brand, $_POST['allBrand']) !== false) {
                    $brand .= '<div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2">';
                        $brand .= '<a class="product" href="' . $affiliate->brand . '">';
                            $brand .= '<div class="image-contain">';
                            $brand .= '<img src="' . $affiliate->brand . '" title="' . $affiliate->brand . '" alt="' . $affiliate->brand . '">';
                            $brand .= '<span class="' . $affiliate->brand . '">' . $affiliate->brand . '</span>';
                            $brand .= '</div>';
                        $brand .= '</a>';
                    $brand .= '</div>';
                }
            }
        $brand .= '</div>';
    $brand .= '</div>';

    echo $brand;  

?>