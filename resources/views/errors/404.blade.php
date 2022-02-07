@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center text-center">

         <h2>Ciao {{ Auth::user()->name }}!</h2>

         <h4>Pagina non trovata</h4>

         <p>
            {{$exception->getMessage()}}
         </p>
         
      </div>
</div>
@endsection

@section('title_page')
   Error 404 
@endsection