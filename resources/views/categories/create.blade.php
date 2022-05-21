@extends('templates.app')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle"></span>
                <h3 class="page-title">Ajoutez une catégorie</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Default Light Table -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Ajouter une catégorie</h6>
                        @if (session('success'))
                            <div class="alert alert-success text-center msg" id="error">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        @if (session('alert'))
                            <div class="alert alert-success text-center msg" id="error">
                                <strong>{{ session('alert') }}</strong>
                            </div>
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('categorie.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="editors_id" value="{{ $editor->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="title">Nom </label>
                                                <input type="text" name="name" class="form-control" id="title"
                                                    placeholder="Economie" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="overview">Description </label>
                                                <input type="text" name="overview" class="form-control" id="overview"
                                                    placeholder="inserez une description" value="{{ old('overview') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-accent">Créer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Default Light Table -->
    </div>
@endsection