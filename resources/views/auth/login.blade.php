@extends('layouts.app')
@section('title')
    Connectez vous pour ouvrir une session
@endsection
@section('content')
    <form action="#" method="post">
        @csrf
        <div class="input-group mb-3">
            <input name="phone" value="{{ old('phone') }}" type="text"
                class="form-control @error('phone') is-invalid @enderror" placeholder="numéro de téléphone" autocomplete="phone"
                autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
        </div>
    </form>
@endsection
