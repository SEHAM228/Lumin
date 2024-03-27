
@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title_en }}</td>
                    <td>{{ $post->body_en }}</td>
                    <td>
                       
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

 
