@extends('events.layout')

@section('content')
@if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
<form action="{{ route('registration.post') }}" method ="POST" , enctype="multipart/form-data">
  @csrf
    <div class="mb-3">
      <label  class="form-label">Email:</label>
      <input type="email" class="form-control" name="email">

    </div>
    <div class="mb-3">
      <label class="form-label">Nazwa:</label>
      <input type="name" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label  class="form-label">Hasło:</label>
        <input type="password" class="form-control" name="password">
      </div>
    <button type="submit" class="btn btn-primary">Zarejestruj się</button>
  </form>
@endsection

