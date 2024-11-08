@extends('events.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
       <h1 class="h2">Utwórz wydarzenie</h1>
   </div>
   @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif

   <form action="{{ route('events.store') }}" method="POST", enctype="multipart/form-data">
       @csrf
           <div class="form-group">
               <label for="name">Nazwa</label>
               <input class="form-control" id="name" name="name" value="{{ old('name') }}" type="text">
           </div>		
           <div class="form-group">
               <label for="detail">Opis</label>
               <input class="form-control" id="detail" name="detail" value="{{ old('detail') }}" type="text">
           </div>
           <div class="form-group">
               <label for="begin">Data rozpoczecia (RRRR-MM-DD)</label>
               <input class="form-control datepicker" id="begin" name="begin" value="{{ old('begin') }}" type="text">
           </div>
           <div class="form-group">
               <label for="end">Data zakonczenia (RRRR-MM-DD)</label>
               <input class="form-control datepicker" id="end" name="end" value="{{ old('end') }}" type="text">
           </div>
           <div class="form-group">
               <label for="category">Kategoria</label>
               <input class="form-control" id="category" name="category" value="{{ old('category') }}" type="text">
           </div>
           <div class="form-group">
            <label for="graphics">Grafika</label>
            <input class="form-control" id="graphics" name="graphics" value="{{ old('graphics') }}" type="file">
        </div>
           
           <button type="submit" class="btn btn-success">Wyślij</button>
       </form>

@endsection

