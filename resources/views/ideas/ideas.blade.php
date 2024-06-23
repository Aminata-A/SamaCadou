@include('layouts.nav')

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Catégories</h5>
                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('all.ideas', ['category_id' => $category->id]) }}">
                                    <i class="fas {{ $category->icon }} mr-2"></i> {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statut</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('all.ideas', ['status' => 'pending']) }}">En attente</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('all.ideas', ['status' => 'approved']) }}">Approuvées</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('all.ideas', ['status' => 'rejected']) }}">Rejetées</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($ideas as $idea)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="feature-icon mb-2">
                                    @if ($idea->category->name == 'Infrastructure')
                                        <i class="fas fa-building icon"></i>
                                    @elseif ($idea->category->name == 'Éducation')
                                        <i class="fas fa-graduation-cap icon"></i>
                                    @elseif ($idea->category->name == 'Santé')
                                        <i class="fas fa-heartbeat icon"></i>
                                    @elseif ($idea->category->name == 'Environnement')
                                        <i class="fas fa-leaf icon"></i>
                                    @endif
                                </div>
                                <h5 class="card-title">{{ $idea->title }}</h5>
                                <p class="card-text">{{ $idea->description }}</p>
                                <p class="card-text"><strong>État:</strong> {{ $idea->status === 'pending' ? 'En attente' : ucfirst($idea->status) }}</p>
                                <a href="{{ route('ideas.show', $idea->id) }}" class="btn btn-primary mt-auto">Voir détails</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p>Aucune idée trouvée.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
