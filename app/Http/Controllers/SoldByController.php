<?php

namespace App\Http\Controllers;

use App\Models\SoldBy;
use App\Http\Requests\StoreSoldByRequest;
use App\Http\Requests\UpdateSoldByRequest;

class SoldByController extends Controller
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
     * @param  \App\Http\Requests\StoreSoldByRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoldByRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoldBy  $soldBy
     * @return \Illuminate\Http\Response
     */
    public function show(SoldBy $soldBy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoldBy  $soldBy
     * @return \Illuminate\Http\Response
     */
    public function edit(SoldBy $soldBy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoldByRequest  $request
     * @param  \App\Models\SoldBy  $soldBy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoldByRequest $request, SoldBy $soldBy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoldBy  $soldBy
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoldBy $soldBy)
    {
        //
    }
}
