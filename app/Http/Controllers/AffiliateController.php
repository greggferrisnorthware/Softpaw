<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Http\Requests\StoreAffiliateRequest;
use App\Http\Requests\UpdateAffiliateRequest;
use App\Models\AffiliateLookUp;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Pet;
use App\Models\SoldBy;
use App\Models\Status;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search_everything()
    {     
        
        $affiliates = Affiliate::select('*')->get();
        // $search = $request->get('search');
        // if($search == 'all') {
            // $searchCategories = DB::table('affiliates')->select('*')->get();
        // }
        // $searchCategories = Affiliate::select('*')->where('category', '=', $search)->paginate(24);
        // $searchCategories = DB::table('affiliates')->all();


        $data = [
            // 'searchCategories' => $searchCategories,
            'affiliates' => $affiliates,
        ];

        return view('affiliates.searchEverything')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAffiliateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAffiliateRequest $request)
    {
        
        $affiliate = new Affiliate();

        if(empty($request->input('material'))) {
            $affiliate->material = 'n/a';
        }else{
            $affiliate->material = $request->input('material');
        }

        if(empty($request->input('image'))) {
            $affiliate->image = 'n/a';
        }else{
            $affiliate->image = $request->input('image');
        }

        if(empty($request->input('category_id'))) {
            $affiliate->category_id = '1';
        }else{
            $affiliate->category_id = $request->input('category_id');
        }

        if(empty($request->input('brand_id'))) {
            $affiliate->brand_id = '52';
        }else{
            $affiliate->brand_id = $request->input('brand_id');
        }

        if(empty($request->input('status_id'))) {
            $affiliate->status_id = '1';
        }else{
            $affiliate->status_id = $request->input('status_id');
        }

        if(empty($request->input('sold_by_id'))) {
            $affiliate->sold_by_id = '1';
        }else{
            $affiliate->sold_by_id = $request->input('sold_by_id');
        }

        if(empty($request->input('affiliate_look_up_id'))) {
            $affiliate->affiliate_look_up_id = '1';
        }else{
            $affiliate->affiliate_look_up_id = $request->input('affiliate_look_up_id');
        }

        if(empty($request->input('pet_id'))) {
            $affiliate->pet_id = '1';
        }else{
            $affiliate->pet_id = $request->input('pet_id');
        }

        if(empty($request->input('delivery_id'))) {
            $affiliate->delivery_id = '1';
        }else{
            $affiliate->delivery_id = $request->input('delivery_id');
        }

        if(empty($request->input('spec_1'))) {
            $affiliate->spec_1 = 'n/a';
        }else{
            $affiliate->spec_1 = ucwords(strtolower($request->input('spec_1')));
        }

        if(empty($request->input('spec_2'))) {
            $affiliate->spec_2 = 'n/a';
        }else{
            $affiliate->spec_2 = ucwords(strtolower($request->input('spec_2')));
        }

        if(empty($request->input('spec_3'))) {
            $affiliate->spec_3 = 'n/a';
        }else{
            $affiliate->spec_3 = ucwords(strtolower($request->input('spec_3')));
        }

        if(empty($request->input('spec_4'))) {
            $affiliate->spec_4 = 'n/a';
        }else{
            $affiliate->spec_4 = ucwords(strtolower($request->input('spec_4')));
        }

        if(empty($request->input('spec_1_name'))) {
            $affiliate->spec_1_name = 'n/a';
        }else{
            $affiliate->spec_1_name = ucwords(strtolower($request->input('spec_1_name')));
        }

        if(empty($request->input('spec_2_name'))) {
            $affiliate->spec_2_name = 'n/a';
        }else{
            $affiliate->spec_2_name = ucwords(strtolower($request->input('spec_2_name')));
        }

        if(empty($request->input('spec_3_name'))) {
            $affiliate->spec_3_name = 'n/a';
        }else{
            $affiliate->spec_3_name = ucwords(strtolower($request->input('spec_3_name')));
        }

        if(empty($request->input('spec_4_name'))) {
            $affiliate->spec_4_name = 'n/a';
        }else{
            $affiliate->spec_4_name = ucwords(strtolower($request->input('spec_4_name')));
        }

        if(empty($request->input('price'))) {
            $affiliate->price = '0.01';
        }else{
            $affiliate->price = $request->input('price');
        }

        if(empty($request->input('discountPrice'))) {
            $affiliate->discountPrice = '0.01';
        }else{
            $affiliate->discountPrice = $request->input('discountPrice');
        }

        if(empty($request->input('stock'))) {
            $affiliate->stock = '1';
        }else{
            $affiliate->stock = $request->input('stock');
        }

        if(empty($request->input('discount'))) {
            $affiliate->discount = 'false';
        }else{
            $affiliate->discount = $request->input('discount');
        }

        if(empty($request->input('rank'))) {
            $affiliate->rank = '0';
        }else{
            $affiliate->rank = $request->input('rank');
        }

        if(empty($request->input('keywords'))) {
            $affiliate->keywords = 'n/a';
        }else{
            $affiliate->keywords = $request->input('keywords');
        }

        if(empty($request->input('name'))) {
            $affiliate->name = 'n/a';
        }else{
            $affiliate->name = $request->input('name');
        }

        if(empty($request->input('description'))) {
            $affiliate->description = 'n/a';
        }else{
            $affiliate->description = $request->input('description');
        }

        if(empty($request->input('star'))) {
            $affiliate->star = '1';
        }else{
            $affiliate->star = $request->input('star');
        }

        if(empty($request->input('link'))) {
            $affiliate->link = 'n/a';
        }else{
            $affiliate->link = $request->input('link');
        }
        
        $affiliate->save();
        return redirect('/view-everything');
    }

    public function add_category(StoreAffiliateRequest $request)
    {
        
        $category = new Category();

        if(empty($request->input('category'))) {
            $category->category = 'n/a';
        }else{
            $category->category = $request->input('category');
        }

        $category->save();
        return redirect('/view-everything');
    }
    
    public function show_categoryed()
    { 

        $categories = Category::select('*')->get();

        $data = [
            'categories' => $categories
        ];

        // dd($data);
         return view('add_categories')->with($data);

    }

    public function add_brand(StoreAffiliateRequest $request)
    {
        
        $brand = new Brand();

        if(empty($request->input('brand'))) {
            $brand->brand = 'n/a';
        }else{
            $brand->brand = ucwords($request->input('brand'));
        }

        $brand->save();
        return redirect('update-affiliate/' .  $request->id);
     
    }

    public function add_brand_update(StoreAffiliateRequest $request)
    {
        
        $brand = new Brand();

        if(empty($request->input('brand'))) {
            $brand->brand = 'n/a';
        }else{
            $brand->brand = ucwords($request->input('brand'));
        }

        $brand->save();
        return redirect('/add-affiliates');
    }
    
    public function show_branded()
    {

        $brands = Brand::select('*')->get();

        $data = [
            'brands' => $brands
        ];

        // dd($data);
         return view('add_brands')->with($data);

    }
    
    public function show_update_branded()
    { 

        $brands = Brand::select('*')->get();

        $data = [
            'brands' => $brands
        ];

        // dd($data);
         return view('add_brands')->with($data);

    }
    
    public function update_brands($request)
    { 

        $brands = Brand::select('*')->get();

        $data = [
            'brands' => $brands
        ];

        // dd($data);
         return view('update_brands')->with($data);

    }
    
    public function show_affilieted()
    { 

        $sold_bies = SoldBy::select('*')->get();
        $affiliates_look_ups = AffiliateLookUp::select('*')->get();
        $brands = Brand::select('*')->orderBy('brand', 'asc')->get();
        $statuses = Status::select('*')->get();
        $affiliates = Affiliate::select('*')->get();
        $categories = Category::select('*')->get();
        $pets = Pet::select('*')->get();
        $deliveries = Delivery::select('*')->get();

        $data = [
            'brands' => $brands,
            'sold_bies' => $sold_bies,
            'deliveries' => $deliveries,
            'statuses' => $statuses,
            'affiliates_look_ups' => $affiliates_look_ups,
            'affiliates' => $affiliates,
            'categories' => $categories,
            'pets' => $pets
        ];

        // dd($data);
         return view('add_affiliates')->with($data);

    }
    
    public function show_updated()
    { 

        $featured_affiliates = Affiliate::select('*')->get();
        $affiliates_look_ups = AffiliateLookUp::select('*')->get();
        $statuses = Status::select('*')->get();
        $sold_bies = SoldBy::select('*')->get();
        $brands = Brand::select('*')->orderBy('brand', 'asc')->get();
        $affiliates = Affiliate::select('*')->get();
        $categories = Category::select('*')->get();
        $pets = Pet::select('*')->get();
        $deliveries = Delivery::select('*')->get();

        $data = [
            'brands' => $brands,
            'featured_affiliates' => $featured_affiliates,
            'statuses' => $statuses,
            'sold_bies' => $sold_bies,
            'statuses' => $statuses,
            'deliveries' => $deliveries,
            'affiliates_look_ups' => $affiliates_look_ups,
            'affiliates' => $affiliates,
            'categories' => $categories,
            'pets' => $pets
        ];

        // dd($data);
         return view('update_affiliates')->with($data);

    }
    
    public function show_deleted()
    {

        $featured_affiliates = Affiliate::select('*')->get();

        $data = [
            'featured_affiliates' => $featured_affiliates
        ];

        // dd($data);
         return view('delete_affiliates')->with($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliate $affiliate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function edit(Affiliate $affiliate)
    {
        //
    }

    public function update_brand(UpdateAffiliateRequest $request, Affiliate $affiliate, $id)
    {
        date_default_timezone_set('America/New_York');
        
        $brands = Brand::find($id);
    
        if(empty($request->input('brand'))) {
            $brands->brand = 'n/a';
        }else{
            $brands->brand = $request->input('brand');
        }
        
        $brands->save();
        return redirect('update-affiliates/' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAffiliateRequest  $request
     * @param  \App\Models\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAffiliateRequest $request, Affiliate $affiliate, $id)
    {
        date_default_timezone_set('America/New_York');
        
        $affiliate = Affiliate::find($id);
    
        if(empty($request->input('image'))) {
            $affiliate->image = 'n/a';
        }else{
            $affiliate->image = $request->input('image');
        }

        if(empty($request->input('category_id'))) {
            $affiliate->category_id = '1';
        }else{
            $affiliate->category_id = $request->input('category_id');
        }

        if(empty($request->input('brand_id'))) {
            $affiliate->brand_id = '52';
        }else{
            $affiliate->brand_id = $request->input('brand_id');
        }

        if(empty($request->input('status_id'))) {
            $affiliate->status_id = '1';
        }else{
            $affiliate->status_id = $request->input('status_id');
        }

        if(empty($request->input('sold_by_id'))) {
            $affiliate->sold_by_id = '1';
        }else{
            $affiliate->sold_by_id = $request->input('sold_by_id');
        }

        if(empty($request->input('affiliate_look_up_id'))) {
            $affiliate->affiliate_look_up_id = '1';
        }else{
            $affiliate->affiliate_look_up_id = $request->input('affiliate_look_up_id');
        }

        if(empty($request->input('pet_id'))) {
            $affiliate->pet_id = '1';
        }else{
            $affiliate->pet_id = $request->input('pet_id');
        }

        if(empty($request->input('delivery_id'))) {
            $affiliate->delivery_id = '1';
        }else{
            $affiliate->delivery_id = $request->input('delivery_id');
        }

        if(empty($request->input('material'))) {
            $affiliate->material = 'n/a';
        }else{
            $affiliate->material = $request->input('material');
        }

        if(empty($request->input('spec_1'))) {
            $affiliate->spec_1 = 'n/a';
        }else{
            $affiliate->spec_1 = ucwords(strtolower($request->input('spec_1')));
        }

        if(empty($request->input('spec_2'))) {
            $affiliate->spec_2 = 'n/a';
        }else{
            $affiliate->spec_2 = ucwords(strtolower($request->input('spec_2')));
        }

        if(empty($request->input('spec_3'))) {
            $affiliate->spec_3 = 'n/a';
        }else{
            $affiliate->spec_3 = ucwords(strtolower($request->input('spec_3')));
        }

        if(empty($request->input('spec_4'))) {
            $affiliate->spec_4 = 'n/a';
        }else{
            $affiliate->spec_4 = ucwords(strtolower($request->input('spec_4')));
        }

        if(empty($request->input('spec_1_name'))) {
            $affiliate->spec_1_name = 'n/a';
        }else{
            $affiliate->spec_1_name = ucwords(strtolower($request->input('spec_1_name')));
        }

        if(empty($request->input('spec_2_name'))) {
            $affiliate->spec_2_name = 'n/a';
        }else{
            $affiliate->spec_2_name = ucwords(strtolower($request->input('spec_2_name')));
        }

        if(empty($request->input('spec_3_name'))) {
            $affiliate->spec_3_name = 'n/a';
        }else{
            $affiliate->spec_3_name = ucwords(strtolower($request->input('spec_3_name')));
        }

        if(empty($request->input('spec_4_name'))) {
            $affiliate->spec_4_name = 'n/a';
        }else{
            $affiliate->spec_4_name = ucwords(strtolower($request->input('spec_4_name')));
        }
        
        if(empty($request->input('price'))) {
            $affiliate->price = '0.01';
        }else{
            $affiliate->price = $request->input('price');
        }

        if(empty($request->input('discountPrice'))) {
            $affiliate->discountPrice = '0.01';
        }else{
            $affiliate->discountPrice = $request->input('discountPrice');
        }

        if(empty($request->input('stock'))) {
            $affiliate->stock = '1';
        }else{
            $affiliate->stock = $request->input('stock');
        }

        if(empty($request->input('discount'))) {
            $affiliate->discount = 'false';
        }else{
            $affiliate->discount = $request->input('discount');
        }

        if(empty($request->input('rank'))) {
            $affiliate->rank = '0';
        }else{
            $affiliate->rank = $request->input('rank');
        }

        if(empty($request->input('keywords'))) {
            $affiliate->keywords = 'n/a';
        }else{
            $affiliate->keywords = $request->input('keywords');
        }

        if(empty($request->input('name'))) {
            $affiliate->name = 'n/a';
        }else{
            $affiliate->name = $request->input('name');
        }

        if(empty($request->input('description'))) {
            $affiliate->description = 'n/a';
        }else{
            $affiliate->description = $request->input('description');
        }

        if(empty($request->input('star'))) {
            $affiliate->star = '1';
        }else{
            $affiliate->star = $request->input('star');
        }

        if(empty($request->input('link'))) {
            $affiliate->link = 'n/a';
        }else{
            $affiliate->link = $request->input('link');
        }

        // if(!empty($request->input('fuhacker'))) {
        //     return redirect('/');
        // }
        
        $affiliate->save();
        return redirect('view-single-affiliate/' . $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Affiliate::where('id', $id)->get()->each->delete();
        return redirect('/view-everything');
        
    }
}