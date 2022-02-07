@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center">
         {{-- nome utente loggato --}}
         <h2>Ciao {{ Auth::user()->name }}!</h2>

         {{-- post id --}}
         <h4>Ecco il post numero: {{ $post->id }}!</h4>

         {{-- titolo del post --}}
         <h3 class="my-3">
            Titolo: {{ $post->title_post }}
         </h3>

         @if ($post->category)
            <h4>
               Categoria: {{$post->category->name}}
            </h4>
         @else
            <h5 style="color: red">
               Nessuna categoria
            </h5>
         @endif

         @forelse ($post->tags as $tag)
            <span class="badge rounded-pill bg-info text-white">
               {{ $tag->name }}
            </span>
         @empty
            
         @endforelse


         {{-- contenuto del post --}}
         <p class="my-3">
            Contenuto: {{$post->content}}
         </p>

         {{-- slug del titolo --}}
         <p class="my-3">
            Slug: {{$post->slug}}
         </p>

         {{-- data creazione post --}}
         <p class="my-3">
            Data creazione: {{$post->created_at}}
         </p>

         {{-- data ultima modifica post --}}
         <p class="my-3">
            Data ultima modifica: {{$post->updated_at}}
         </p>

         <div class="row">

            <a href="{{route('admin.posts.edit', $post) }}" type="button" class="btn btn-warning mr-3">
               Edit
            </a>

            {{-- per la funzione delete bisogna NECESSARIAMENTE usare il form con il @method DELETE e @csrf --}}
            <form onsubmit="return confirm('Sicuro di voler eliminare {{ $post->title }}')" 
               action="{{ route('admin.posts.destroy', $post) }}" method="POST">
               @csrf
               @method('DELETE')

               <button type="submit" type="button" class="btn btn-danger">Delete</button>

            </form>

         </div>
         

         
      </div>
</div>
@endsection

@section('title_page')
   Show Post
@endsection