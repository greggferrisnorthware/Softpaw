<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Affiliate;
use App\Models\AffiliateLookUp;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CatTable;
use App\Models\Delivery;
use App\Models\DogTable;
use App\Models\Pet;
use App\Models\SoldBy;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Blog::select('*')->orderBy('created_at', 'desc')->paginate(12);
        $search_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();
        $meta = Blog::select('meta_robot', 'meta_keywords', 'meta_description', 'meta_author')->get();
        $deliveries = Delivery::select('*')->get();
        $toys = Affiliate::select('*')->get();
        // $search_posts = Blog::select('*')->get();

        $data = [
            'toys' => $toys,
            'meta' => $meta,
            'posts' => $posts,
            'deliveries' => $deliveries,
            // 'search_posts' => $search_posts,
            'search_pets' => $search_pets,
            'search_categories' => $search_categories
        ];

        // dd($data);
         return view('blog.index')->with($data);

    }

    public function searchable_categories()
    {

        $posts = Blog::select('*')->get();
        $searchable_categories = Category::select('*')->get();

        $data = [
            'posts' => $posts,
            'searchable_categories' => $searchable_categories
        ];

        // dd($data);
         return view('blog/searchable/categories')->with($data);

    }

    public function searchable_pets()
    {

        $posts = Blog::select('*')->get();
        $searchable_pets = Pet::select('*')->get();

        $data = [
            'posts' => $posts,
            'searchable_pets' => $searchable_pets
        ];

        // dd($data);
         return view('blog/searchable/blog_pets')->with($data);

    }

    public function show_posted()
    {

        $brands = Brand::select('*')->get();
        $categories = Category::select('*')->get();
        $pets = Pet::select('*')->get();

        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'pets' => $pets
        ];

        // dd($data);
         return view('add_posts')->with($data);

    }

    public function affiliate_searchable_pets()
    {

        $affiliates = Affiliate::select('*')->get();
        $searchable_pets = Pet::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'searchable_pets' => $searchable_pets
        ];

        // dd($data);
         return view('blog/searchable/affiliate_pets')->with($data);

    }

    public function searchable_affiliates()
    {

        $affiliates = Affiliate::select('*')->get();
        $searchable_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'searchable_categories' => $searchable_categories,
            'search_pets' => $search_pets
        ];

        // dd($data);
         return view('blog/searchable/affiliates')->with($data);

    }

    public function searchable_all_affiliates_aside()
    {

        $affiliates = Affiliate::select('*')->limit(5)->get();
        $searchable_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'searchable_categories' => $searchable_categories,
            'search_pets' => $search_pets
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates_aside')->with($data);

    }

    public function searchable_all_affiliates_post_aside()
    {

        $posts = Blog::select('*')->orderBy('created_at', 'desc')->limit(5)->get();
        $affiliates = Affiliate::select('*')->get();
        $searchable_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();

        $data = [
            'posts' => $posts,
            'affiliates' => $affiliates,
            'searchable_categories' => $searchable_categories,
            'search_pets' => $search_pets
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates_post_aside')->with($data);

    }

    public function searchable_affiliates_page()
    {

        $affiliates = Affiliate::select('*')->get();
        $searchable_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'searchable_categories' => $searchable_categories,
            'search_pets' => $search_pets
        ];

        // dd($data);
         return view('blog/searchable/affiliates_page')->with($data);

    }

    public function searchable_all_brands()
    {

        $affiliates = Affiliate::select('*')->get();

        $data = [
            'affiliates' => $affiliates
        ];

        // dd($data);
         return view('blog/searchable/all_brands')->with($data);

    }

    public function searchable_all_categories()
    {

        $posts = Blog::select('*')->get();
        $allCategories = Category::select('category')->get();

        $data = [
            'posts' => $posts,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_categories')->with($data);

    }

    public function searchable_all_categories_mobile()
    {

        $posts = Blog::select('*')->get();
        $allCategories = Category::select('category')->get();

        $data = [
            'posts' => $posts,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_categories_mobile')->with($data);

    }

    public function searchable_all_affiliates()
    {

        $affiliates = Affiliate::select('*')->get();
        $allCategories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates')->with($data);

    } 

    public function searchable_all_affiliates_mobile()
    {

        $affiliates = Affiliate::select('*')->get();
        $allCategories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates_mobile')->with($data);

    }   

    public function searchable_all_affiliates_other()
    {

        $affiliates = Affiliate::select('*')->get();
        $allCategories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates_other')->with($data);

    }  

    public function searchable_all_affiliates_other_mobile()
    {

        $affiliates = Affiliate::select('*')->get();
        $allCategories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'allCategories' => $allCategories
        ];

        // dd($data);
         return view('blog/searchable/all_affiliates_other_mobile')->with($data);

    }   

    public function sitemap()
    {
         
        $posts = Blog::select('*')->get();


        $data = [
            'posts' => $posts,
        ];

        return view('sitemap')->with($data);
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
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {    
        
        date_default_timezone_set('America/New_York');
        
        $posts = new Blog;

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_large' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploaded_image = $request->file('image');
        $uploaded_image_large = $request->file('image_large');
        // dd($uploaded_image->getClientOriginalName());

        if(empty($request->file('image'))) {
            $posts->image = 'placeholder.png';
        }else{
            $image = $uploaded_image->getClientOriginalName();
            $request->image->move(public_path('blog-uploads'), $image);
            $posts->image = preg_replace('#[/\\\\]+#', '/', $image);
        }

        if(empty($request->file('image_large'))) {
            $posts->image_large = 'placeholder.png';
        }else{
            $image_large = $uploaded_image_large->getClientOriginalName();
            $request->image_large->move(public_path('blog-uploads'), $image_large);
            $posts->image_large = preg_replace('#[/\\\\]+#', '/', $image_large);
        }

        if(empty($request->input('category_id'))) {
            $posts->category_id = '1';
        }else{
            $posts->category_id = $request->input('category_id');
        }

        if(empty($request->input('pet_id'))) {
            $posts->pet_id = '1';
        }else{
            $posts->pet_id = $request->input('pet_id');
        }

        if(empty($request->input('brand_id'))) {
            $posts->brand_id = '320';
        }else{
            $posts->brand_id = $request->input('brand_id');
        }

        if(empty($request->input('meta_robot'))) {
            $posts->meta_robot = 'noindex, nofollow';
        }else{
            $posts->meta_robot = $request->input('meta_robot');
        }

        if(empty($request->input('meta_description'))) {
            $posts->meta_description = 'n/a';
        }else{
            $posts->meta_description = $request->input('meta_description');
        }

        if(empty($request->input('meta_keywords'))) {
            $posts->meta_keywords = 'n/a';
        }else{
            $posts->meta_keywords = $request->input('meta_keywords');
        }

        if(empty($request->input('meta_author'))) {
            $posts->meta_author = 'n/a';
        }else{
            $posts->meta_author = $request->input('meta_author');
        }

        if(empty($request->input('meta_title'))) {
            $posts->meta_title = 'n/a';
        }else{
            $posts->meta_title = $request->input('meta_title');
        }

        if(empty($request->input('alternative_headline'))) {
            $posts->alternative_headline = 'n/a';
        }else{
            $posts->alternative_headline = $request->input('alternative_headline');
        }

        if(empty($request->input('name'))) {
            $posts->name = 'n/a';
        }else{
            $posts->name = $request->input('name');
        }

        if(empty($request->input('description'))) {
            $posts->description = 'n/a';
        }else{
            $posts->description = $request->input('description');
        }

        if(empty($request->input('description_bottom'))) {
            $posts->description_bottom = 'n/a';
        }else{
            $posts->description_bottom = $request->input('description_bottom');
        }

        if(empty($request->input('author'))) {
            $posts->author = 'n/a';
        }else{
            $posts->author = $request->input('author');
        }

        if(empty($request->input('slug'))) {
            $posts->slug = 'slug';
        }else{
            $posts->slug = $request->input('slug');
        }

        if(empty($request->input('link'))) {
            $posts->link = 'n/a';
        }else{
            $posts->link = $request->input('link');
        }

        if(empty($request->input('keywords'))) {
            $posts->keywords = 'n/a';
        }else{
            $posts->keywords = $request->input('keywords');
        }

        $posts->save();
        
        return redirect('/view-everything');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

        $count_affiliates = Affiliate::count();
        $pet_cares = Affiliate::select('*')
        ->where('category_id', '=', 1)
        ->orderBy('price', 'desc')
        ->offset(0)
        ->limit(10)
        ->get();
        $catnips = Affiliate::select('*')
        ->where('description', 'LIKE', '%catnip%')
        ->orWhere('name', 'LIKE', '%catnip%')
        // ->orderBy('price', 'desc')
        ->offset(0)
        ->limit(10)
        ->get();
        $toys = Affiliate::select('*')
        ->where('description', 'LIKE', '%toy%')
        ->orWhere('name', 'LIKE', '%toy%')
        ->orderBy('price', 'desc')
        ->offset(0)
        ->limit(10)
        ->get();
        $metas = Blog::select('meta_robot', 'meta_keywords', 'meta_description', 'meta_author')->get();
        $posts = Blog::select('*')->orderBy('created_at', 'desc')->get();
        $featured_affiliates = Affiliate::select('*')->whereIn('rank', array(1, 2, 3, 4, 5))->orderBy('rank', 'asc')->get();
        $affiliates = Affiliate::select('*')->orderBy('rank', 'asc')->get();
        // dd($affiliates);
        $search_affiliates = Affiliate::select('*')->get();
        $search_brands = Brand::select('*')->get();
        $search_categories = Category::select('*')->get();
        $search_pets = Pet::select('*')->get();
        $dog_tables_heads = DogTable::select('size','weight','coat','color','temperament','characteristics','energy','shedding','health','food','history','facts')->orderBy('breed', 'asc')->distinct('size','weight','coat','color','temperament','characteristics','energy','shedding','health','food','history','facts')->get();
        $dog_tables_bodies = DogTable::select('*')->orderBy('breed', 'asc')->get();
        $cat_tables_heads = CatTable::select('size','weight','coat','color','temperament','characteristics','energy','shedding','health','food','history','facts')->distinct()->get();
        $cat_tables_bodies = CatTable::select('*')->orderBy('breed', 'asc')->get();
        $search_posts = Blog::select('*')->get();
        $cat_tables_columns = Schema::getColumnListing('cat_tables');
        $dog_tables_columns = Schema::getColumnListing('dog_tables');
        // dd($columns);

        $data = [
            'metas' => $metas,
            'pet_cares' => $pet_cares,
            'toys' => $toys,
            'catnips' => $catnips,
            'posts' => $posts,
            'count_affiliates' => $count_affiliates,
            'cat_tables_columns' => $cat_tables_columns,
            'dog_tables_columns' => $dog_tables_columns,
            'search_posts' => $search_posts,
            'featured_affiliates' => $featured_affiliates,
            'affiliates' => $affiliates,
            'dog_tables_heads' => $dog_tables_heads,
            'dog_tables_bodies' => $dog_tables_bodies,
            'cat_tables_heads' => $cat_tables_heads,
            'cat_tables_bodies' => $cat_tables_bodies,
            'search_categories' => $search_categories,
            'search_affiliates' => $search_affiliates,
            'search_brands' => $search_brands,
            'search_pets' => $search_pets
        ];
        
        return view('/blog/show')->with($data);
    }

    // public function bundle()
    // {

        
    //     $metas = Blog::select('meta_robot', 'meta_keywords', 'meta_description', 'meta_author')->get();
        
    //     dd($metas);
    //     $data = ['metas' => $metas]; 
        
    //     return view('/includes/bundle')->with($data);

    //     // return $this->belongsTo(Blog::class);

    // }

    // public function pet()
    // {

    //     return $this->belongsTo(Pet::class);

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $posts, $id)
    {
    
        date_default_timezone_set('America/New_York');
        
        $posts = Blog::find($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_large' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploaded_image = $request->file('image');
        $uploaded_image_large = $request->file('image_large');
        // dd($uploaded_image->getClientOriginalName());

        if(!empty($request->file('image'))) {
            $image = $uploaded_image->getClientOriginalName();
            $request->image->move(public_path('blog-uploads'), $image);
            $posts->image = preg_replace('#[/\\\\]+#', '/', $image);
        }

        if(!empty($request->file('image_large'))) {
            $image_large = $uploaded_image_large->getClientOriginalName();
            $request->image_large->move(public_path('blog-uploads'), $image_large);
            $posts->image_large = preg_replace('#[/\\\\]+#', '/', $image_large);
        }

        if(empty($request->input('category_id'))) {
            $posts->category_id = '1';
        }else{
            $posts->category_id = $request->input('category_id');
        }

        if(empty($request->input('pet_id'))) {
            $posts->pet_id = '1';
        }else{
            $posts->pet_id = $request->input('pet_id');
        }

        if(empty($request->input('brand_id'))) {
            $posts->brand_id = '320';
        }else{
            $posts->brand_id = $request->input('brand_id');
        }

        if(empty($request->input('meta_robot'))) {
            $posts->meta_robot = 'noindex, nofollow';
        }else{
            $posts->meta_robot = $request->input('meta_robot');
        }

        if(empty($request->input('meta_description'))) {
            $posts->meta_description = 'n/a';
        }else{
            $posts->meta_description = $request->input('meta_description');
        }

        if(empty($request->input('meta_keywords'))) {
            $posts->meta_keywords = 'n/a';
        }else{
            $posts->meta_keywords = $request->input('meta_keywords');
        }

        if(empty($request->input('meta_author'))) {
            $posts->meta_author = 'n/a';
        }else{
            $posts->meta_author = $request->input('meta_author');
        }

        if(empty($request->input('meta_title'))) {
            $posts->meta_title = 'n/a';
        }else{
            $posts->meta_title = $request->input('meta_title');
        }

        if(empty($request->input('alternative_headline'))) {
            $posts->alternative_headline = 'n/a';
        }else{
            $posts->alternative_headline = $request->input('alternative_headline');
        }

        if(empty($request->input('name'))) {
            $posts->name = 'n/a';
        }else{
            $posts->name = $request->input('name');
        }

        if(empty($request->input('description'))) {
            $posts->description = 'n/a';
        }else{
            $posts->description = $request->input('description');
        }

        if(empty($request->input('description_bottom'))) {
            $posts->description_bottom = 'n/a';
        }else{
            $posts->description_bottom = $request->input('description_bottom');
        }

        if(empty($request->input('author'))) {
            $posts->author = 'n/a';
        }else{
            $posts->author = $request->input('author');
        }

        if(empty($request->input('slug'))) {
            $posts->slug = 'slug';
        }else{
            $posts->slug = $request->input('slug');
        }

        if(empty($request->input('link'))) {
            $posts->link = 'n/a';
        }else{
            $posts->link = $request->input('link');
        }

        if(empty($request->input('keywords'))) {
            $posts->keywords = 'n/a';
        }else{
            $posts->keywords = $request->input('keywords');
        }

        // if(!empty($request->input('fuhacker'))) {
        //     return redirect('/');
        // }
        
        $posts->save();
        return redirect('view-single-post/' . $id);
    }
    
    public function show_updated()
    { 

        $featured_affiliates = Affiliate::select('*')->get();
        $affiliates_look_ups = AffiliateLookUp::select('*')->get();
        $statuses = Status::select('*')->get();
        $posts = Blog::select('*')->get();
        $sold_bies = SoldBy::select('*')->get();
        $brands = Brand::select('*')->get();
        $affiliates = Affiliate::select('*')->get();
        $categories = Category::select('*')->get();
        $pets = Pet::select('*')->get();

        $data = [
            'brands' => $brands,
            'featured_affiliates' => $featured_affiliates,
            'statuses' => $statuses,
            'posts' => $posts,
            'sold_bies' => $sold_bies,
            'affiliates_look_ups' => $affiliates_look_ups,
            'affiliates' => $affiliates,
            'categories' => $categories,
            'pets' => $pets
        ];

        // dd($data);
         return view('update_posts')->with($data);

    }
    
    public function show_deleted()
    {

        $posts = Blog::select('*')->get();

        $data = [
            'posts' => $posts
        ];

        // dd($data);
         return view('delete_posts')->with($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Blog::where('id', $id)->get()->each->delete();
        return redirect('/view-everything');
        
    }
}