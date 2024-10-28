<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;
use App\Models\Sign;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSignRequest $request)
    {
        return response()->json(['Test'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sign $sign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignRequest $request, Sign $sign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sign $sign)
    {
        //
    }
}
