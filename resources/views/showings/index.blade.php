@extends('layout.master')
@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($showings as $showing)
    @component('showings.components.showing-card', [ 'showing' => $showing, 'showButton' => true ])
    @endcomponent
@endforeach
</div>
@endsection