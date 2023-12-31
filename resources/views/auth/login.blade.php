@extends('layout.master')
@section('title', 'Welcome, Login to Continue')

@section('content')
<form action="{{route('auth.login')}}" method="POST">
    @csrf
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="{{old('email')}}">
      </div>
    </div>
    <div class="row mb-3">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
@endsection