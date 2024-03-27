@extends('layouts.app')
@push('fontawesome')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="card p-4">
            <div class="row">
               

             
                <div class="col-md-12 mb-4">
                    <div class="card h-100">
                    <img src="{{ asset($post->photo) }}" class="card-img-top img-fluid" alt="{{ $post->title_en }}" style="max-width: 1200px; height: 400px;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $post->title_en }}</h5>
                            <a href="{{ route('user.showother', $post->user->id) }}">{{ $post->user->name }}</a>
                            <p class="card-text">{{ ($post->body_en) }}</p>
                  
                        </div>
                       
                         <div class="row my-3">
                         <td>
    @auth
        @if (auth()->user()->id == $post->user_id)
        <div class="button-container">
            <form action="{{ route('posts.edit', $post) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-warning mx-2">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </form>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
</div>
        @endif
    @endauth
</td>



                     <div class="col-md-12 mx-2">
                        Tags :
                            @foreach ($post->tags as $tag)
                            
                                <a href="{{route('tag.posts', $tag)}}" class="btn btn-outline-secondary btn-sm mx-2">
                                    {{$tag->name}}
                                </a>
                            @endforeach 
                           
                            </div>
                           
                       </div>
                        <ul>
                      
                      <li>{{ $post->title }}</li>
                      <like-component :post="{{ $post->id }}"></like-component>
                      <dis-like-component :post="{{ $post->id }}"></dis-like-component>
                      
                 </ul>


                        <hr>
                        <comments-count>

</comments-count>
<hr>
                            <comments-component :post_id="{{$post->id}}">

</comments-component>
@auth
<hr>
<add-comment
:post_id="{{$post->id}}"
:user_id="{{auth()->user()->id}}">
</add-comment>
@endauth
                    </div>
          


                </div>
            </div>
         
           
        </div>
    </div>
    <div class="col-md-4">
        <!-- Ajoutez ici le contenu des catégories -->
        <ul class="list-group">
            @foreach ($categories as $category)
          
           
            <li class="list-group-item">
           <a href="{{route('category.posts', $category)}}" class="btn btn-link fw-bold font-italic" style="color: black;">
            {{$category->name_en}}
            </a>
            <span class="badge bg-primary" style="color: black;" >
                {{$category->posts()->count()}}
            </span>
            </li>
            @endforeach
        
    </div>
</div>
@endsection
<style>
        .button-container {
            display: flex;
        
        }

        .button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>