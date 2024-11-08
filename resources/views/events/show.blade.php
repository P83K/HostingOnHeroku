@extends('events.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Szczegóły wydarzenia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.index') }}"> Wróć</a>
                
            </div>
        </div>
    </div>
    
    

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nazwa:</strong>
                {{ $event->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opis:</strong>
                {{ $event->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data rozpoczęcia:</strong>
                {{ $event->begin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data zakończenia:</strong>
                {{ $event->end }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategoria:</strong>
                {{ $event->category }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grafika:</strong>
                <img style="width:400px" src = "{{asset('uploads/images/'.$event->graphics) }}" alt="">
            </div>
        </div>
    </div>

    <form action="{{ route('events.destroy',$event->id) }}" method="POST">
        @auth
       <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edytuj</a>
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-danger">Usuń</button>
       @endauth
   </form>
@endsection