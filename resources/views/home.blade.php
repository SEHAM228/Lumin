@extends('layouts.app')

@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="card p-4">
            <div class="row">
                @isset($postsPremium)
                    @foreach ($postsPremium as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset($post->photo)}}" class="card-img-top" alt="{{ $post->title_en }}" height="300" >
                            <div class="card-body">
                                <div class="d-flex justify-content-center my-3">
                                    <span class="badge bg-danger">
                                        <i class="fas fa-clock me-1"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                    <span class="badge bg-success">
    <i class="fas fa-user me-1"></i>
    {{ $post->user->name }}
</span>
                                </div>
                                <h5 class="card-title fw-bold">{{ $post->title_en }}</h5>
                                <p class="card-text">{{ Str::limit($post->body_en, 100) }}</p>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endisset

                @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($post->photo) }}" class="card-img-top" alt="{{ $post->title_en }}" height="300" >
                        <div class="card-body">
                        <div class="d-flex justify-content-center my-3">
                                    <span class="badge bg-danger">
                                        <i class="fas fa-clock me-1"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                    <span class="badge bg-success">
                                        <i class="fas fa-user me-1"></i>
                                        {{$post->user->name}}
                                    </span>
                                </div>
                            <h5 class="card-title fw-bold">{{ $post->title_en }}</h5>
                            <p class="card-text">{{ Str::limit($post->body_en, 100) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-center">
                    {{$posts->links()}}
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
