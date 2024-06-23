<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .icon {
            width: 24px;
            height: 24px;
            padding: 5px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .card {
            margin-bottom: 20px;
            height: 100%;
        }
        .card .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <main class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h3>Créer une nouvelle idée</h3>
                    <form action="{{ route('ideas.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Votre nom</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Adresse Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Titre de l'idée</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category_id">Catégorie</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://img.freepik.com/free-vector/think-outside-box-concept-illustration_114360-22363.jpg?t=st=1719171558~exp=1719175158~hmac=fa35f7f6d4a3638b80b5151aed5048d5059fac4f46ff96d8ad0f60c0a9816ac8&w=740" height="100px" alt="Image" class="img-fluid">
            </div>
        </div>
        <div id="ideasCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $chunks = $ideas->chunk(4);
                @endphp
                @foreach ($chunks as $key => $chunk)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $idea)
                                <div class="col-md-3">
                                    <div class="card" id="idea-{{ $idea->id }}">
                                        <div class="card-body">
                                            <div class="feature-icon">
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
                                            <h2 class="card-title">{{ $idea->title }}</h2>
                                            <p class="card-text">{{ $idea->description }}</p>
                                            <p><strong>État:</strong> {{ $idea->status }}</p>
                                            <a href="{{ route('ideas.show', $idea->id) }}" class="icon-link">
                                                Voir détails
                                                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#ideasCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#ideasCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
