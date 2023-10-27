<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{

    private $validationRules = [
        "title"=> ["required","min:5","max:255"],
        "description" => ["required","min:10","max:255"],
        "genre" => ["required","min:10","max:255"],
        "poster" => ["image", "max:1024"],
    ];
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
        return view("movies.create")->with("movie", new Movie());
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // add required to poster validation
        $this->validationRules["poster"][] = "required";
        // 1st argument = rules
        // 2nd argument = custom messages
        // 3rd argument = attribute name
        $data = $request->validate(
            $this->validationRules
        // ,[
        //     "poster.required"=> "You need to select a movie poster",
        //     "poster.required"=> "You need to select a movie poster"
        // ],[
        //    "m_title" => "Movie Title" ]
        );

        try {
            $posterImage = $request->file("poster");
            $path = $posterImage->store("movies", "images");
            $data['poster'] = $path;
            $movie = Movie::create($data);

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
        return view("movies.edit")
        ->with("movie", Movie::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validationRules["poster"][] = "nullable";
        $data = $request->validate($this->validationRules);

        $movie = Movie::findOrFail($id);
        $movie->title = $data['title'];
        $movie->description = $data['description'];
        $movie->genre = $data['genre'];

        if($request->hasFile('poster')){
            $posterImage = $request->file("poster");
            $path = $posterImage->store("movies", "images");
            $movie->poster = $path;
        }

        $movie->save();
        return redirect()->route('movies.index')->with([
            "message"=> "$movie->title edited successfully",
            "status" => "success"
        ]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        try {
            $movie->delete();
        return redirect()->route('movies.index')->with([
            "message"=> "$movie->title deleted successfully",
            "status" => "success" 
        ]);
        } catch (\Throwable $th) {
            Log::error('Deleting movie unsuccessful '. $th->getMessage());
            return redirect()->route('movies.index')->with([
                "message"=> "Unable to delete movie : $movie->title",
                "status" => "danger"
            ]);
        }

       
        //
    }
}
