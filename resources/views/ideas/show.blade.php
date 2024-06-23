
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
            <img src="https://img.freepik.com/premium-vector/modern-vector-geometric-shapes-white-background-memphis-geometric-shapes_589744-770.jpg?w=740" alt="Image" class="img-fluid">
        </div>
    </div>
</div>
@endsection
