@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Votre profil</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card  mb-4 ">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="images/user_icon.png" alt="User Avatar" width="110">
                    </div>
                    <h4 class="mb-0">{{ $user->name }}</h4>
                    <span class="text-muted d-block mb-2"></span>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item p-4">
                        Nom: {{ $user->name }}
                    </li>
                    <li class="list-group-item p-4">
                        Téléphone: {{ $user->phone }}
                    </li>
                    <li class="list-group-item p-4">
                        Adresse mail: {{ $user->email }}
                    </li>
                    <li class="list-group-item p-4">
                        Accès: {{ $user->role }}
                </ul>
            </div>
        </div>

    </div>
@endsection
