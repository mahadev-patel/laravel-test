<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Laravel | Test</title>
  </head>
  <body>
    <!-- Header starts -->
    <section class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('images/symfony-logo.png')}}" alt="logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                	@if(empty(auth()->user()))
                     <li class="nav-item ">
                        <a class="nav-link" href="{{ url('login')}}">Sign In</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('register')}}">Sign Up</a>
                    </li>
                    @endif
                    
                    
                    @if(auth()->user())
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/characters')}}">List Characters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/user/characters') }}">Saved Characters</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}">Logout ({{auth()->user()->email}})</a>
                    </li>
                    

                    @endif
                </ul>
            </div>
        </nav>
    </section>
    <!-- Header ends -->
@yield('content')

    <!-- JS FILES -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>