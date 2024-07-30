<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Affiliate;
use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Psr7\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $featured_affiliates_home = Affiliate::select('*')->get();
        $search_affiliates_home = Affiliate::select('*')->limit(24)->get();
        $featured_affiliates = Affiliate::select('*')->whereIn('rank', array(1, 2, 3, 4, 5))->orderBy('rank', 'asc')->limit(5)->get();
        $affiliates = Affiliate::select('*')->paginate(5);
        $search_categories = Category::select('*')->get();
        $toys = Affiliate::select('*')->get();

        $data = [
            'toys' => $toys,
            'affiliates' => $affiliates,
            'search_categories' => $search_categories,
            'featured_affiliates_home' => $featured_affiliates_home,
            'search_affiliates_home' => $search_affiliates_home,
            'featured_affiliates' => $featured_affiliates
        ];

        // dd($data);
         return view('/index')->with($data);
        //  return view('index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $featured_affiliates_1 = Affiliate::select('*')->where('rank', '=', '1')->get();
        $featured_affiliates_2 = Affiliate::select('*')->where('rank', '=', '2')->get();
        $featured_affiliates_3 = Affiliate::select('*')->where('rank', '=', '3')->get();
        $featured_affiliates_4 = Affiliate::select('*')->where('rank', '=', '4')->get();
        $affiliates2 = new Affiliate();
        $affiliates2->q = $request->input('q');

        $data = [
            'affiliates2' => $affiliates2,
            'featured_affiliates_1' => $featured_affiliates_1,
            'featured_affiliates_2' => $featured_affiliates_2,
            'featured_affiliates_3' => $featured_affiliates_3,
            'featured_affiliates_4' => $featured_affiliates_4,
        ];

        // dd($data);
         return view('/search?q=' . $affiliates2)->with($data);

    }

}