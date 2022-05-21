@extends('templates.app')
@section('content')
    <div class="row">

        <div class="col-lg-4">
            <div class="card card-small card-post mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text text-muted">{{ $news->content }}</p>
                </div>
                <div class="card-footer border-top d-flex">
                    <div class="card-post__author d-flex">
                        <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                            style="background-image: url('images/avatars/0.jpg');"></a>
                        <div class="d-flex flex-column justify-content-center ml-3">
                            <span class="card-post__author-name">{{ $news->name }}</span>
                            <small class="text-muted">{{ $news->created_at }}</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
