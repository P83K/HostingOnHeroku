@extends('events.layout')

@section('content')
@if(session()->has('succes'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Wszystkie wydarzenia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"> Nowe wydarzenie</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


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
             
              <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Szczegóły</a>
                 @auth
                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edytuj</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Usuń</button>
                @endauth
            </form>
            
            </div>
        </li>
        @endforeach

    </ol>
  
  </section>
   
  <script src="{{ asset('js/dasboard.js') }}" defer></script>
@endsection

