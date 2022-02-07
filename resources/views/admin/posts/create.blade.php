@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center">
         {{-- nome utente loggato --}}
         <h2>Ciao {{ Auth::user()->name }}, crea un nuovo post.</h2>

         @if ($errors->any())
            <div class="alert alert-danger" role="alert">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif

         {{-- per salvarlo fa aggiunta l'action (a store) con il metodo post e il @csrf --}}
         <form action="{{ route('admin.posts.store') }}" class="mt-5" method="POST">
            @csrf
            {{-- @method('POST') --}}

            {{-- input title --}}
            <div class="mb-3">
               <label for="title_post" class="form-label">Titolo Post</label>
               <input type="text" name="title_post" 
               class="form-control @error('title_post') is-invalid @enderror"
               id="title_post" placeholder="Inserisci il titolo..." 
               value="{{ old('title_post') }}">

               {{-- messaggio di errore sotto il form --}}
               @error('title_post')
                     <p style="color: red">
                        {{ $message }}!
                     </p>
               @enderror
            </div>

            {{-- input content --}}
            <div class="mb-3">
               <label for="content" class="form-label">Contenuto del Post</label>
               <textarea type="text" name="content" 
               class="form-control @error('content') is-invalid @enderror"
               id="content" placeholder="Inserisci il contenuto del post..." 
               style="height: 200px">{{ old('content') }}</textarea>

               {{-- messaggio di errore sotto il form --}}
               @error('content')
                  <p style="color: red">
                     {{ $message }}!
                  </p>
              @enderror
            </div>

            {{-- input categoria --}}
            <div class="mb-3">
               <select name="category_id" id="category_id" class="form-control" aria-label="Default select example">
                  <option value="" selected>Seleziona la categoria</option>
                  @foreach ($categoryList as $category)
                  <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                     {{ $category->name }}
                  </option>
                  @endforeach
                  
               </select>
            </div>

            {{-- input tags --}}
            <div class="mb-3">
               
               @foreach ($tags as $tag)
               <span class="mr-2 d-inline-block">

                  <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag{{$loop->iteration}}"
                  @if (in_array($tag->id, old('tags', []))) checked @endif>
                  <label for="tag{{$loop->iteration}}">{{ $tag->name }}</label>

               </span>
               @endforeach

            </div>

            {{-- bottoni salva e reset --}}
            <button type="submit" class="btn btn-success">Salva Post</button>
            <button type="reset" class="btn btn-danger">Reset Post</button>
          </form>
         
      </div>
</div>
@endsection

{{-- titolo scheda pagina --}}
@section('title_page')
   Create Post
@endsection