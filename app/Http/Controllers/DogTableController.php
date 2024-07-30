<?php

namespace App\Http\Controllers;

use App\Models\DogTable;
use App\Http\Requests\StoreDogTableRequest;
use App\Http\Requests\UpdateDogTableRequest;

class DogTableController extends Controller
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
     * @param  \App\Http\Requests\StoreDogTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDogTableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DogTable  $dogTable
     * @return \Illuminate\Http\Response
     */
    public function show(DogTable $dogTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DogTable  $dogTable
     * @return \Illuminate\Http\Response
     */
    public function edit(DogTable $dogTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDogTableRequest  $request
     * @param  \App\Models\DogTable  $dogTable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDogTableRequest $request, DogTable $dogTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DogTable  $dogTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(DogTable $dogTable)
    {
        //
    }
}
