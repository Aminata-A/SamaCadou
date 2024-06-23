@include('layouts.nav')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="">
                <div class="card-body">
                    <h1 class="card-title">{{ $idea->title }}</h1>
                    <p class="card-text">{{ $idea->description }}</p>
                    <p><strong>Statut:</strong> {{ $idea->status }}</p>
                    <p><strong>Auteur:</strong> {{ $idea->name }}</p>
                    <p><strong>Adresse Email:</strong> {{ $idea->email }}</p>
                    
                    <!-- Form for approving or rejecting the idea -->
                    @auth
                    <form method="POST" action="{{ route('ideas.update', $idea->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="status">Statut</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_approved" value="approved" {{ $idea->status == 'approved' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_approved">Approuver</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status_rejected" value="rejected" {{ $idea->status == 'rejected' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_rejected">Rejeter</label>
                            </div>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                    
                    <!-- Form for deleting the idea -->
                    <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer l'idée</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://img.freepik.com/premium-vector/creative-concept-idea-key-success-teamwork-vector-flat-modern-design-illustration_566886-612.jpg?w=826" alt="Image" class="img-fluid">
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <!-- Display comments -->
            <h3>Commentaires</h3>
            <div class="comment-section">
                @foreach ($comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>{{ $comment->name }}</strong><br>
                                    {{ $comment->content }}
                                </div>
                                <div class="text-muted text-right">
                                    {{ $comment->created_at->format('d/m/Y H:i') }}
                                    @auth
                                    <!-- Form for deleting a comment -->
                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-link text-danger p-0 ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </button>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <!-- Form for adding a comment -->
            <h3>Ajouter un commentaire</h3>
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Commentaire</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3"></textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
@endsection
