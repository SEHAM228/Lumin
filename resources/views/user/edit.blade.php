@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Add form fields here, such as name, email, profile picture upload, etc. -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>
<!-- ... (previous form fields) -->

<div class="form-group">
    <label for="about">About</label>
    <textarea id="about" name="about" class="form-control" value="{{ auth()->user()->about }}" required>{{ auth()->user()->about }}</textarea>
</div>

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

<!-- ... (continue with other form fields) -->

                        <!-- Add more fields as needed -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
