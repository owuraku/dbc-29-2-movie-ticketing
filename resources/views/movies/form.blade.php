@php
  $title = old('title') ? old('title') : $movie->title;
  $genre = old('genre') ? old('genre') : $movie->genre;
  $description= old('description') ? old('description') : $movie->description;
@endphp
<form action="{{$action}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @isset($edit)
      @method('PATCH')
      {{-- <input type="hidden" name="_method" value="DELETE"> --}}
    @endisset
    {{-- title --}}
    <div class="col-12">
        <label for="title" class="form-label">Movie Title</label>
        <input type="text" class="@error('title') is-invalid @enderror form-control" value="{{$title}}"  name="title" placeholder="Enter the movie title" required>
        @error('title')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
    {{-- description --}}
    <div class="col-12">
        <label for="description" class="form-label">Movie Description</label>
        <textarea class="@error('description') is-invalid @enderror form-control" rows="5"  name="description" placeholder="Enter the movie description" required>{{$description}}</textarea>
        @error('description')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
    {{-- genre --}}
    <div class="col-12">
        <label for="genre" class="form-label">Movie Genre</label>
        <input type="text" class="@error('genre') is-invalid @enderror form-control" value="{{$genre}}"  name="genre" placeholder="Enter the movie genre" required>
        @error('genre')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
    {{-- poster/image --}}
    @isset($edit)
      <img src="{{$movie->poster}}" height="80px" alt="">
    @endisset
    <div class="col-12">
        <label for="poster" class="form-label">Select Movie Poster</label>
        <input class="form-control @error('poster') is-invalid @enderror" type="file" name="poster">
        @error('poster')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
  </form>