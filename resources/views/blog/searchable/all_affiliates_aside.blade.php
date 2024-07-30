<?php

    $count = 1;
    $category = '<ul>';
        foreach($affiliates as $affiliate) {
            if($affiliate->pet->pet == $_POST['pet']) {
                if(!empty($_POST['allCategoryAside'])) {
                    if(stripos($affiliate->name, $_POST['allCategoryAside']) !== false || stripos($affiliate->category->category, $_POST['allCategoryAside']) !== false || stripos($affiliate->pet->pet, $_POST['allCategoryAside']) !== false || stripos($affiliate->spec_1, $_POST['allCategoryAside']) !== false || stripos($affiliate->spec_2, $_POST['allCategoryAside']) !== false || stripos($affiliate->spec_3, $_POST['allCategoryAside']) !== false || stripos($affiliate->spec_4, $_POST['allCategoryAside']) !== false || stripos($affiliate->brand->brand, $_POST['allCategoryAside']) !== false) {
                        $category .= '<li class="relative">
                            <a class="product-aside" rel="sponsored" href="' . $affiliate->link . '" target="_blank">
                                <div class="aside-image">
                                    <img src="' . $affiliate->image . '" alt="' . ucwords($affiliate->pet->pet) . ', ' . ucwords($affiliate->category->category) . ', ' . ucwords($affiliate->brand->brand) . '" title="' . ucwords($affiliate->pet->pet) . ', ' . ucwords($affiliate->category->category) . ', ' . ucwords($affiliate->brand->brand) . '" />
                                </div>

                                <div class="aside-content">
                                    ' . substr($affiliate->name, 0, 75) . ' ...

                                    <div class="breaking"></div>

                                    <small class="animal">' . ucwords($affiliate->pet->pet) . '</small> <small class="cat">' . ucwords($affiliate->category->category) . '</small> <small class="brand">' . ucwords($affiliate->brand->brand) . '</small><div class="breaking"></div><small class="price">Price: $' . $affiliate->price . '</small>
                                </div>
                            </a>
                        </li>';
                    }
                }else{
                    if($count < 6) {
                        $category .= '<li class="relative">
                            <a class="product-aside" rel="sponsored" href="' . $affiliate->link . '" target="_blank">
                                <div class="aside-image">
                                    <img src="' . $affiliate->image . '" alt="' . ucwords($affiliate->pet->pet) . ', ' . ucwords($affiliate->category->category) . ', ' . ucwords($affiliate->brand->brand) . '" title="' . ucwords($affiliate->pet->pet) . ', ' . ucwords($affiliate->category->category) . ', ' . ucwords($affiliate->brand->brand) . '" />
                                </div>

                                <div class="aside-content">
                                    ' . substr($affiliate->name, 0, 75) . ' ...

                                    <div class="breaking"></div>

                                    <small class="animal">' . ucwords($affiliate->pet->pet) . '</small> <small class="cat">' . ucwords($affiliate->category->category) . '</small> <small class="brand">' . ucwords($affiliate->brand->brand) . '</small><div class="breaking"></div><small class="price">Price: $' . $affiliate->price . '</small>
                                </div>
                            </a>
                        </li>';
                    }
                }
            }
        $count++;
    }

    $category .= '</ul>';

    echo $category;  

?>