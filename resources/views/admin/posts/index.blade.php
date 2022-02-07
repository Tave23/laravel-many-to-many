@extends('layouts.app')

@section('content')
<div class="container">
      <div class="justify-content-center">
         <h2 class="text-left">Ciao {{ $loggedUser->name}}! Ecco l'elenco dei post</h2>

         {{-- post eliminato --}}
         @if (session('deleted_post'))
            <div class="alert alert-success" role="alert">
               {{ session('deleted_post') }}
            </div>
         @endif


         <table class="table my-3">
               <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titolo del post</th>
                  <th scope="col">Contenuto del post</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Tags</th>
                  <th scope="col" colspan="3"></th>
               </tr>
               </thead>

               <tbody>

               @foreach ($posts as $post)
                  
                  <tr>
                     <th scope="row">{{ $post->id }}</th>
                     <td>{{ $post->title_post }}</td>
                     <td>{{ $post->content }}</td>
                     <td>{{ $post->slug }}</td>
                     {{-- nome della categoria che va gestito con IF --}}
                     @if ($post->category)
                        <td>{{ $post->category->name }}</td>
                     @else
                        <td>Categoria mancante</td>
                     @endif

                     {{-- nome del tag va gestito con un forelse --}}
                     <td>

                        @forelse ($post->tags as $tag)
                        <span class="badge rounded-pill bg-info text-white">
                           {{ $tag->name }}
                        </span>
                        @empty
                           -
                        @endforelse

                     </td>
                     
                     
                     <td>
                        <a href="{{ route('admin.posts.show', $post) }}" type="button" class="btn btn-success ">
                           Show
                        </a>
                     </td>
                     <td>
                        <a href="{{route('admin.posts.edit', $post) }}" type="button" class="btn btn-warning">
                           Edit
                        </a>
                     </td>
                     <td>
                        
                        {{-- per la funzione delete bisogna NECESSARIAMENTE usare il form con il @method DELETE e @csrf --}}
                        <form onsubmit="return confirm('Sicuro di voler eliminare {{ $post->title }}')" 
                           action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                           @csrf
                           @method('DELETE')

                           <button type="submit" type="button" class="btn btn-danger">Delete</button>

                        </form>

                     </td>
                  </tr>

               @endforeach
               
               </tbody>
            </table>
           
            {{$posts->links()}}

               
            @foreach ($categoryList as $category)
            <h3 class="my-4">
               {{ $category->name }}
            </h3>

            <ul class="my-4 mr-5">
               @foreach ($category->posts as $post_category)

                  <li>
                     <a href="{{ route('admin.posts.show', $post_category) }}">{{ $post_category->title_post }}</a>
                  </li>

               @endforeach
            </ul>

            @endforeach


      </div>
</div>
@endsection

@section('title_page')
   Posts List
@endsection