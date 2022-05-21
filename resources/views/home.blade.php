@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Dashboard</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Articles</span>
                            <h6 class="stats-small__value count my-3">{{ App\Models\News::count() }}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Catégories</span>
                            <h6 class="stats-small__value count my-3">{{ App\Models\Categorie::count() }}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Visites</span>
                            <h6 class="stats-small__value count my-3">15k</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Abonnements en cours</span>
                            <h6 class="stats-small__value count my-3">2k</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    <span class="text-uppercase page-subtitle"></span>
                    <h3 class="page-title">Articles Pertinents</h3>
                </div>
            </div>
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                <div class="col-lg-4">
                    <div class="card card-small card-post mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Cuisine</h5>
                            <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Sit exercitationem saepe, veniam minus sequi ducimus, iste sint...</p>
                        </div>
                        <div class="card-footer border-top d-flex">
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                    style="background-image: url('images/eye.png');">
                                </a>
                                <div class="d-flex flex-column justify-content-center ml-3">
                                    <span class="card-post__author-name">5k vues</span>
                                </div>
                            </div>
                            <div class="my-auto ml-auto">
                                <a class="btn btn-sm btn-primary" href="#">
                                    Lire
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
                {{-- @if ($articles->isNotEmpty())
                    @foreach ($articles as $article)
                        <div class="col-lg-4">
                            <div class="card card-small card-post mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->titre }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($article->contenu, 100) }}</p>
                                </div>
                                <div class="card-footer border-top d-flex">
                                    <div class="card-post__author d-flex">
                                        <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                            style="background-image: url('images/avatars/0.jpg');"></a>
                                        <div class="d-flex flex-column justify-content-center ml-3">
                                            <span class="card-post__author-name">{{ $article->name }}</span>
                                            <small class="text-muted">{{ $article->created_at }}</small>
                                        </div>
                                    </div>
                                    <div class="my-auto ml-auto">
                                        <a class="btn btn-sm btn-primary" href="newses/{{ $article->id }}/show">
                                            Lire
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center" alt="alert">
                        Aucune article existante
                    </div>
                @endif --}}
            </div>
        </div>
        <div class="col-lg-12">
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    <span class="text-uppercase page-subtitle"></span>
                    <h3 class="page-title">Articles Récents</h3>
                </div>
            </div>
            <div class="row">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-lg-4">

                        <div class="card card-small card-post mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Cuisine</h5>
                                <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Sit exercitationem saepe, veniam minus sequi ducimus, iste sint...</p>
                            </div>
                            <div class="card-footer border-top d-flex">
                                <div class="card-post__author d-flex">
                                    <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                        style="background-image: url('images/eye.png');"></a>
                                    <div class="d-flex flex-column justify-content-center ml-3">
                                        <span class="card-post__author-name">1k vues</span>
                                    </div>
                                </div>
                                <div class="my-auto ml-auto">
                                    <a class="btn btn-sm btn-primary" href="#">
                                        Lire
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

                {{-- @if ($articles->isNotEmpty())
                    @foreach ($articles as $article)
                        <div class="col-lg-4">
                            <div class="card card-small card-post mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->titre }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($article->contenu, 100) }}</p>
                                </div>
                                <div class="card-footer border-top d-flex">
                                    <div class="card-post__author d-flex">
                                        <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                            style="background-image: url('images/avatars/0.jpg');"></a>
                                        <div class="d-flex flex-column justify-content-center ml-3">
                                            <span class="card-post__author-name">{{ $article->name }}</span>
                                            <small class="text-muted">{{ $article->created_at }}</small>
                                        </div>
                                    </div>
                                    <div class="my-auto ml-auto">
                                        <a class="btn btn-sm btn-primary" href="#">
                                            Lire
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center" alt="alert">
                        Aucune article existante
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
@endsection
