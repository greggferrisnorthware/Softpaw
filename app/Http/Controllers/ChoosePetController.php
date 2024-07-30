<?php

namespace App\Http\Controllers;

use App\Models\ChoosePet;
use App\Http\Requests\StoreChoosePetRequest;
use App\Http\Requests\UpdateChoosePetRequest;
use App\Models\Affiliate;
use App\Models\Category;

class ChoosePetController extends Controller
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
        $featured_affiliates_home = Affiliate::select('*')->limit(4)->get();
        $search_affiliates_home = Affiliate::select('*')->limit(20)->get();
        $search_categories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'featured_affiliates_home' => $featured_affiliates_home,
            'search_affiliates_home' => $search_affiliates_home,
            'featured_affiliates' => $featured_affiliates,
            'search_categories' => $search_categories
        ];

        // dd($data);
         return view('choosing-a-pet/index')->with($data);
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
     * @param  \App\Http\Requests\StoreChoosePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChoosePetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChoosePet  $choosePet
     * @return \Illuminate\Http\Response
     */
    public function show(ChoosePet $choosePet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChoosePet  $choosePet
     * @return \Illuminate\Http\Response
     */
    public function edit(ChoosePet $choosePet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChoosePetRequest  $request
     * @param  \App\Models\ChoosePet  $choosePet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChoosePetRequest $request, ChoosePet $choosePet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoosePet  $choosePet
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChoosePet $choosePet)
    {
        //
    }
}