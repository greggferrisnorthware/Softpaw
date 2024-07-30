<?php

namespace App\Http\Controllers;

use App\Models\CatProducts;
use App\Http\Requests\StoreCatProductsRequest;
use App\Http\Requests\UpdateCatProductsRequest;
use App\Models\Affiliate;
use App\Models\Category;

class CatProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $featured_affiliates = Affiliate::select('*')->whereIn('rank', array(1, 2, 3, 4, 5))->orderBy('rank', 'asc')->get();
        $affiliates = Affiliate::select('*')->get();
        $search_categories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'search_categories' => $search_categories,
            'featured_affiliates' => $featured_affiliates
        ];

        // dd($data);
         return view('/cat-products/index')->with($data);
        //  return view('index');
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
     * @param  \App\Http\Requests\StoreCatProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatProducts  $catProducts
     * @return \Illuminate\Http\Response
     */
    public function show(CatProducts $catProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatProducts  $catProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(CatProducts $catProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatProductsRequest  $request
     * @param  \App\Models\CatProducts  $catProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatProductsRequest $request, CatProducts $catProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatProducts  $catProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatProducts $catProducts)
    {
        //
    }
}