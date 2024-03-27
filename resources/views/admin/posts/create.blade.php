@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h3 class="mt-3">Create new post</h3>
            </div>
            <hr>
            <div class="card-body p-3">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Title Input -->
                            <div class="form-group row">
                                <label for="title_en" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title') }}" placeholder="Title">
                                    @error('title_en')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Category Dropdown -->
                            <div class="form-group row my-3">
                                <label for="category_id" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category_id" class="form-control
                                    form-control @error('category_id') is-invalid @enderror">
                                        <option selected disabled>Choose a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name_en}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Body Textarea -->
                            <div class="form-group row my-3">
                                <label for="body" class="col-sm-3 col-form-label">Body</label>
                                <div class="col-sm-9">
                                    <textarea name="body_en" class="form-control @error('body_en') is-invalid @enderror" placeholder="Body">{{ old('body') }}</textarea>
                                    @error('body_en')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Image Input -->
                            <div class="form-group row my-3">
                                <label for="photo" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" />
                                    @error('photo')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Tags Checkboxes -->
                            <div class="form-group row">
                                 <label class="col-sm-3 col-form-label">Tags</label>
                                      <div class="col-sm-9 d-flex flex-wrap">
                                            @foreach($tags as $tag)
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" id="tag{{ $tag->id }}" class="form-check-input" name="tags[]" value="{{ $tag->id }}">
                                                    <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                                </div>
                                            @endforeach
                                     </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row my-3">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
