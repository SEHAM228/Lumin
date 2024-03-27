@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('posts.index') }}">Posts</a></h5>
                <!-- Contenu de la carte pour les posts -->
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('posts.index') }}">Categories</a></h5>
                <!-- Contenu de la carte pour les catégories -->
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('posts.index') }}">Tags</a></h5>
                <!-- Contenu de la carte pour les tags -->
            </div>
        </div>
    </div>
</div>
@endsection

