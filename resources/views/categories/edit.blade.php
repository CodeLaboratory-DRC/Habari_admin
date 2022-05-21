@extends('templates.app')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle"></span>
                <h3 class="page-title">Modifier la catégorie {{ $categorie->name }}</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Default Light Table -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">modifier la catégorie</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('categories.update', $categorie) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="editors_id" value="{{ $editor->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="title">Nom </label>
                                                <input type="text" name="name" class="form-control" id="title"
                                                    placeholder="HTML" value="{{ $categorie->name }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="title">Description </label>
                                                <input type="text" name="overview" class="form-control" id="title"
                                                    placeholder="HTML" value="{{ $categorie->overview }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-accent">modifier</button>
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
