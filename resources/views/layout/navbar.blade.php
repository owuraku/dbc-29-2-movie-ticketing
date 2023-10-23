<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('showings.index')}}">Home</a>
          </li>
        </ul>
      </div>
    </div>
    <div>
     
        <ul class="navbar-nav">
          @auth
          {{--  --}}
          <li class="nav-item">
            <a href="#">Welcome, {{ Auth::user()->name}}</a>
          </li>
          {{--  --}}
          <li class="nav-item">
            <form action="{{route('auth.logout')}}" method="POST">
              @csrf
              <button class="btn btn-danger" type="submit" >Logout</a>
            </form>
          </li>
          @endauth

          @guest
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('auth.register.form')}}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('auth.login.form')}}">Login</a>
            </li>
            @endguest
          </ul>
          
    </div>
  </nav>