@extends('layout.master')
@section('title')
Buy Ticket For {{$showing->movie->title}}
@endsection

@section('content')
<div class="d-flex">
    <div class="col-12 col-md-6">
                <h1>The Movie Information</h1>
                @component('showings.components.showing-card', [ 'showing' => $showing , 'showButton' => false ]) 
                @endcomponent
    </div>

    <div class="col-12 col-md-6 container">
        <h4>How many tickets are you buying? </h4>
            @if ($showing->isSoldOut())
            <h3 class="text-danger">Sorry, This is sold out </h3>
            @else
            <form action="{{route('tickets.buy', $showing->id )}}" method="POST">
                @csrf
                <input type="number" min="1" max="{{$showing->ticketsAvailable()}}" class="form-control   @error('number_of_tickets') is-invalid @enderror " value="1" name="number_of_tickets">
                <p> {{$showing->ticketsAvailable()}} Tickets Available </p>
                @error('number_of_tickets')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <input type="submit" value="Buy" class="btn btn-success">
            </form>

        @endif
            <h1>Other showings for {{$showing->movie->title}} </h1>

            <ul class="list-group list-group-flush">
                @foreach ($showing->otherShowings() as $otherShowing)
                <li class="list-group-item">{{$otherShowing->formattedDate()}} {{$otherShowing->formattedTime()}}
                    <form action="">
                        <input type="number" min="1" placeholder="Buy for this show instead"  class="form-control">
                        <input type="submit" value="Buy" class="btn btn-sm btn-warning">
                    </form>
                </li>
                @endforeach
              </ul>
    </div>
</div>  
    <br>

   
@endsection