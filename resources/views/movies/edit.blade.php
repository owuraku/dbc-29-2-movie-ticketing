@extends('layout.master')
@section('title', "Edit a Movie")

@section('content')
    <h1>Edit "{{ $movie->title }}" Movie</h1>
    @component('movies.form', [ 'action' => route('movies.update', $movie->id), 'movie' => $movie, 'edit' => true ])
    @endcomponent
@endsection