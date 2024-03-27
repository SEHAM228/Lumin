@extends('layouts.app')

@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="card p-4">
        <div class="card">
  <div class="card-header">
    About
  </div>
  <div class="card-body">
    <h5 class="card-title">Tell the world about yourself</h5>
    <p class="card-text">{{ auth()->user()->about }}</p>
    <a href="{{ route('posts.myposts') }}" class="btn btn-primary">My posts</a>

  </div>
</div>
            
        </div>
    </div>
    <div class="col-md-4">
      
    <article class="card1">
    <div class="card-img">
    @if(file_exists(public_path($user->photo)) && is_file(public_path($user->photo)))
        <img src="{{ asset($user->photo) }}" class="card-img-top rounded" alt="{{ $user->name }}" height="100" width="100">
    @else
   
  <div class="profile-image">
  <span class="initials">{{ substr($user->name, 0, 1)}}</span>


</div>

    @endif
</div>

    <div class="project-info">
        <div class="flex">
            <div class="project-title">{{$user->name}}</div>
           
        </div>
        <span>Here’s where you can share more about yourself: your history, work experience, accomplishments, interests, dreams, and more.  </span>
        
        <form action="{{ route('profile.edit') }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary mx-2">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </form>

    </div>
</article>
    </div>
</div>
@endsection
<style>
  .col-md-4 {
    padding: 25px 40px;

  }
.project-info {
  padding: 25px 40px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  position: relative;
  top: -50px;
}

.project-title {
  font-weight: 700;
  font-size: 2em;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  color: black;
}

.flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.account {
  font-weight: bold;
}

.tag {
  font-weight: lighter;
  color: grey;
}

/*DELETE THIS TWO LINE*/
.delete {
  background-color: #b2b2fd;
}

.card-img div {
  width: 80%;
  height: 80%;
}
/*IF USING IMAGES*/

.card1 {
  background-color: white;
  color: black;
  width: 400px;
  max-height: 400px;
  border-radius: 8px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

.card-img {
  position: relative;
  top: -50px;
  height: 100px;
  display: flex;
  justify-content: center;
}

/* Change the .card-img div to .card-img img to use img*/
.card-img a, .card-img div {
  height: 100px;
  width: 55%;
  /* Change this width here to change the width of the color/image */
  object-fit: cover;
  border-radius: 10px;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.pv:hover {
  transform: scale(1.12);
}

.card-imgs {
  transition:  0.5s;
}


.profile-image-container {
  width: 100px;
  height: 100px;
  background-color: #333;
  border-radius: 50%; /* Pour créer une image de profil circulaire */
  display: flex;
  justify-content: center;
  align-items: center;
}

.profile-image {
  width: 80px;
  height: 80px;
  background-color: gray;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 32px;
  font-weight: bold;
  color: #333;
}

.initials {
  text-transform: uppercase;
}


  /* Styles pour la carte "About" */
  .card {
    background-color: gray;
    color: gray;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
  }

  .card-header {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
  }

  .card-body {
    padding: 20px;
  }

  .card-title {
    font-size: 1.25rem; /* Taille de la police du titre */
    margin-bottom: 10px;
  }

  .card-text {
    font-size: 1rem; /* Taille de la police du texte */
    color: #333;
  }

  /* Styles pour le bouton "My posts" */
  .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 10rem;
    text-decoration: none; /* Supprime le soulignement du lien */
  }



</style>
