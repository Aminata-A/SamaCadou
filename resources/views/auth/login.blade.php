<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Connexion</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Connexion</button>
                        <a href="{{ route('register')}}" class="btn btn-light">S'inscrire</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://img.freepik.com/free-vector/sign-up-concept-illustration_114360-7965.jpg?t=st=1719175513~exp=1719179113~hmac=1db7ba48c17bdb8bf192b9b9dcf850c450db59d64503286f830d89a8fa76d8dd&w=740" alt="Image" class="img-fluid">
        </div>
    </div>
@endsection
