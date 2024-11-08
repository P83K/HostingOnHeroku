<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>ZAI - Projekt 1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
	
	        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
		
  </head>

  <body>

    @if(session()->has('succes'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<button type="button" class="btn btn-sm btn-outline-secondary" bg-transparent onclick="window.print();">Drukuj</button>

   


<section class="timeline">
    <div class="info">
        <img width="50" height="50" src="https://assets.codepen.io/210284/face.svg" alt="" />
        <h2>Pamiętnik wydarzeń</h2>
    </div>
    <ol>
        @foreach ($events as $event)
        <li>
            <div>
              <time>{{ $event->begin }}</time> {{ $event->name }}
            
            </div>
        </li>
        @endforeach

    </ol>
  
  </section>
   
  <script src="{{ asset('js/dasboard.js') }}" defer></script>

</body>
</html>
