@extends('layout.master')
@section('title', 'Register with Us')

@section('content')
<form class="row g-3" action="{{route('auth.register')}}" method="POST">
    @csrf
    <div class="col-12">
      <label for="fullname" class="form-label">Fullname</label>
      <input type="text" class="@error('fullname') is-invalid @enderror form-control" value="{{old('fullname')}}"  name="fullname" placeholder="Enter your fullname" required>
      @error('fullname')
          <div class="invalid-feedback">
            {{$message}}
          </div>
      @enderror
    </div>
    <div class="col-12">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email"  required>
    </div>
    <div class="col-md-12">
      <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="col-md-12">
      <label for="password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Register</button>
    </div>
  </form>
@endsection