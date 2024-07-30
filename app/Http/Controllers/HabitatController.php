<?php

namespace App\Http\Controllers;

use App\Models\Habitat;
use App\Http\Requests\StoreHabitatRequest;
use App\Http\Requests\UpdateHabitatRequest;

class HabitatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Habitat::select('*')->get();
        $meta = Habitat::select('meta_robot', 'meta_keywords', 'meta_description', 'meta_author')->get();
        
        // $gibs = DB::table('blogs')
        //     ->join('categories', 'blogs.category_id', '=', 'categories.id')
        //     ->join('pets', 'blogs.pet_id', '=', 'pets.id')
        //     ->select('categories.category as ref_category', 'pets.pet as ref_pet')
        // //     // ->join('pets', 'affiliates.pet_id', '=', 'pets.id')
        // //     // ->where(['categories.id' == 'affiliates.category_id'])
        //     ->get();
        //     // dd($gibs);

        $data = [
            'meta' => $meta,
            'posts' => $posts
        ];

        // dd($data);
         return view('blog.index')->with($data);
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
     * @param  \App\Http\Requests\StoreHabitatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHabitatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Habitat  $habitat
     * @return \Illuminate\Http\Response
     */
    public function show(Habitat $habitat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Habitat  $habitat
     * @return \Illuminate\Http\Response
     */
    public function edit(Habitat $habitat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHabitatRequest  $request
     * @param  \App\Models\Habitat  $habitat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHabitatRequest $request, Habitat $habitat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habitat  $habitat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habitat $habitat)
    {
        //
    }
}