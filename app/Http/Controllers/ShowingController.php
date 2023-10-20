<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showing;

class ShowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showings = Showing::active()->orderBy('showing_datetime', 'asc')
                    ->get();
                    
        return view('showings.index')
                ->with(['showings' => $showings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showing = Showing::findOrFail($id);
        return view('showings.show')->with(['showing'=> $showing]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
