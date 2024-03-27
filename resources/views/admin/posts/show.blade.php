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
                        <img src="{{ $post->photo }}" class="card-img-top" alt="{{ $post->title_en }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $post->title_en }}</h5>
                            <p class="card-text">{{ ($post->body_en) }}</p>
                            
                           
                        </div>
                        <hr>
                        <ul>
                      
                      <li>{{ $post->title }}</li>
                      <like-component :post="{{ $post->id }}"></like-component>
                      <dis-like-component :post="{{ $post->id }}"></dis-like-component>
                      <hr>
                      <notification-component :notifications="{{ $notifications }}">
</notification-component>
                 </ul>
                        <hr>

                        <div class="row my-3">
                     <div class="col-md-12">
                            @foreach ($post->tags as $tag)
                                <a href="" class="btn btn-outline-secondary btn-sm">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                            </div>
                       </div>

                        <hr>
                        <comments-count>

</comments-count>
<hr>
                            <comments-component :post_id="{{$post->id}}">

</comments-component>
<hr>
<add-comment
:post_id="{{$post->id}}"
:user_id="{{auth()->user()->id}}">
</add-comment>
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
