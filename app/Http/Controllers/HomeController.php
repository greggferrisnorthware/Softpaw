<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Affiliate;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    public function view_everything(Request $request)
    {

        $affiliates = Affiliate::select('*')->orderBy('created_at', 'desc')->paginate(10);
        $posts = Blog::select('*')->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'affiliates' => $affiliates,
            'posts' => $posts
        ];

         return view('/view_everything')->with($data);
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

        return view('affiliates.searchEverythingUsers')->with($data);

    }

    public function search_posts_everything()
    {     
        
        $posts = Blog::select('*')->get();
        // $search = $request->get('search');
        // if($search == 'all') {
            // $searchCategories = DB::table('affiliates')->select('*')->get();
        // }
        // $searchCategories = Affiliate::select('*')->where('category', '=', $search)->paginate(24);
        // $searchCategories = DB::table('affiliates')->all();


        $data = [
            // 'searchCategories' => $searchCategories,
            'posts' => $posts,
        ];

        return view('affiliates.searchEverythingUsersPosts')->with($data);

    }

    public function view_single_affiliate()
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

        return view('/view_single_affiliate')->with($data);

    }

    public function view_single_post()
    {     
        
        $posts = Blog::select('*')->get();
        // $search = $request->get('search');
        // if($search == 'all') {
            // $searchCategories = DB::table('affiliates')->select('*')->get();
        // }
        // $searchCategories = Affiliate::select('*')->where('category', '=', $search)->paginate(24);
        // $searchCategories = DB::table('affiliates')->all();


        $data = [
            // 'searchCategories' => $searchCategories,
            'posts' => $posts,
        ];

        return view('/view_single_post')->with($data);

    }
}