<?php

namespace App\Http\Controllers;

use App\Models\PetCare;
use App\Http\Requests\StorePetCareRequest;
use App\Http\Requests\UpdatePetCareRequest;
use App\Models\Affiliate;
use App\Models\Category;

class PetCareController extends Controller
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
            'featured_affiliates' => $featured_affiliates,
            'search_categories' => $search_categories
        ];

        // dd($data);
         return view('/pet-care/index')->with($data);
        //  return view('index');
    }
    
    public function puppy_care()
    {
        $featured_affiliates = Affiliate::select('*')->whereIn('rank', array(1, 2, 3, 4))->orderBy('rank', 'asc')->get();
        $featured_affiliates_1 = Affiliate::select('*')->where('rank', '=', '1')->get();
        $featured_affiliates_2 = Affiliate::select('*')->where('rank', '=', '2')->get();
        $featured_affiliates_3 = Affiliate::select('*')->where('rank', '=', '3')->get();
        $featured_affiliates_4 = Affiliate::select('*')->where('rank', '=', '4')->get();
        $affiliates = Affiliate::select('*')->get();
        $search_categories = Category::select('*')->get();

        $data = [
            'affiliates' => $affiliates,
            'featured_affiliates' => $featured_affiliates,
            'search_categories' => $search_categories,
            'featured_affiliates_1' => $featured_affiliates_1,
            'featured_affiliates_2' => $featured_affiliates_2,
            'featured_affiliates_3' => $featured_affiliates_3,
            'featured_affiliates_4' => $featured_affiliates_4,
        ];

        // dd($data);
         return view('/pet-care/puppy_care')->with($data);
        //  return view('index');

    }

    
    // public function pet_care_table()
    // {

    //     $pet_cares = Affiliate::select('*')->get();

    //     $data = [
    //         'pet_cares' => $pet_cares
    //     ];

    //     // dd($data);
    //      return view('/tables/pet_care_table')->with($data);
    //     //  return view('index');

    // }

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
     * @param  \App\Http\Requests\StorePetCareRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetCareRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function show(PetCare $petCare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function edit(PetCare $petCare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetCareRequest  $request
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetCareRequest $request, PetCare $petCare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PetCare  $petCare
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetCare $petCare)
    {
        //
    }
}