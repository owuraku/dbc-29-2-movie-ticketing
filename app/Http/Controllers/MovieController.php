<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("movies.index")->with('movies', Movie::all());
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("movies.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1st argument = rules
        // 2nd argument = custom messages
        // 3rd argument = attribute name
        $data = $request->validate([
            "title"=> ["required","min:5"],
            "description" => ["required","min:10"],
            "genre" => ["required","min:10"],
            "poster" => ["required","image", "max:1024"],
        ]
        // ,[
        //     "poster.required"=> "You need to select a movie poster",
        //     "poster.required"=> "You need to select a movie poster"
        // ],[
        //    "m_title" => "Movie Title" ]
        );

        $posterImage = $request->file("poster");
        try {
            $path = $posterImage->store("movies", "images");
            $movie = new Movie();
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->poster = $path;
            $movie->genre = $data['genre'];
            $movie->save();
            return redirect()->route('movies.index')->with([
                "message"=> "$movie->title created successfully",
                "status" => "success"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                "message"=> "Unable to create movie.",
                "status" => "danger"
            ]);
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
