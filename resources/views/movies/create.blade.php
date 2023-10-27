@extends('layout.master')
@section('title', "Create a Movie")

@section('content')
    <h1>Add A Movie</h1>
    @component('movies.form', [ 
        'action' => route('movies.store'), 
        'movie' => $movie
        ])
    @endcomponent
@endsection