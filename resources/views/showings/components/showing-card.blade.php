<div class="card col">
  <img src="{{$showing->movie->poster}}" class="card-img-top" alt="Movie Poster">
  <div class="card-body">
    <h5 class="card-title">{{$showing->movie->title}} </h5>
    <h5 class="card-title">{{ $showing->formattedDate()}} at {{ $showing->formattedTime()}}</h5>
    <p class="card-text">{{$showing->movie->description}}</p>
    
    @if($showButton)
    <a href="{{route('showings.show', $showing->id)}}" class="btn btn-primary">Buy Ticket GHS {{$showing->price}}</a>
    @endif
  </div>
</div>







