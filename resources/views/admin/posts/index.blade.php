@extends('layouts.admin')

@section('content')
<div class="row my-3">
    <div class="col-md-12">
        
            <div class="card-body">
              
                <hr>
                <table class="table table-hoverd">
                    <thead>
                        <tr> <!-- Added the missing 'tr' tag to define a table row -->
                                <th>ID</th>
                                <th>Title_en</th>
                                <th>Category</th>
                                <th>By</th>
                                <th>Premium</th>
                                <th>Published</th>
                                <th>Image</th>
                                <th>Added_at</th>
                        </tr> <!-- Closed the 'tr' tag for the table header row -->
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                        <tr> <!-- Added the 'tr' tag to define a table row -->
                            <td>{{ $key + 1 }}</td> <!-- Corrected the increment logic -->
                            <td><a href="{{route('posts.show',$post)}}" target="_blank">{{$post->title_en}}</a></td>
                            <td>{{ $post->category->name_fr }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if ($post->premium)
                                <a href="{{route('toggle.premium',$post)}}">
                                    <span class="badge bg-success">
                                        premium
                                    </span>
                                </a>
                                @else
                                <a href="{{route('toggle.premium',$post)}}">
                                    <span class="badge bg-info">
                                        simple
                                    </span>
                                </a>
                                @endif
                            </td>
                            <td>
                                @if ($post->published)
                                <a href="{{route('toggle.published',$post)}}">
                                    <span class="badge bg-success">
                                        published
                                    </span>
                                </a>
                                @else
                                <a href="{{route('toggle.published',$post)}}">
                                    <span class="badge bg-info">
                                        draft
                                    </span>
                                </a>
                                @endif
                            </td>
                            <td>
                                <img src="{{ $post->photo }}" width="60" height="60" class="rounded" alt="{{ $post->title_en }}">
                            </td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>
                               
                                <button onclick="if(confirm('ARE YOU SURE ?'))
                                document.getElementById({{$post->id}}).submit();
                                " class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
</button>
                                <form id="{{$post->id}}" action="{{route('posts.destroy',$post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td> <!-- Display the added_at timestamp -->
                        </tr> <!-- Closed the 'tr' tag for the table row -->
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
   
</div>
@endsection
