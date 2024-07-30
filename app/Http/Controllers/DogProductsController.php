<?php

namespace App\Http\Controllers;

use App\Models\DogProducts;
use App\Http\Requests\StoreDogProductsRequest;
use App\Http\Requests\UpdateDogProductsRequest;
use App\Models\Affiliate;
use App\Models\Category;

class DogProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_affiliates = Affiliate::select('*')->whereIn('rank', array(1, 2, 3, 4))->orderBy('rank', 'asc')->get();
        $affiliates = Affiliate::select('*')->get();
        $search_categories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'search_categories' => $search_categories,
            'featured_affiliates' => $featured_affiliates
        ];

        // dd($data);
         return view('/dog-products/index')->with($data);
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
     * @param  \App\Http\Requests\StoreDogProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDogProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DogProducts  $dogProducts
     * @return \Illuminate\Http\Response
     */
    public function show(DogProducts $dogProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DogProducts  $dogProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(DogProducts $dogProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDogProductsRequest  $request
     * @param  \App\Models\DogProducts  $dogProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDogProductsRequest $request, DogProducts $dogProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DogProducts  $dogProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(DogProducts $dogProducts)
    {
        //
    }
}