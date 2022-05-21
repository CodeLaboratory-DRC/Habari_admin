@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">ajout d'un article</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post">
                        @csrf
                        <input class="form-control form-control-lg mb-3" id="titre" name="title" type="text"
                            placeholder="le titre de votre article">
                        <textarea name="content" id="editor" cols="30" rows="10"></textarea>

                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
        <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Categories</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-3 pb-2">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $categorie)
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" name="category_id"
                                            id="category1" checked>
                                        <label class="custom-control-label" for="category1">{{ $categorie->name }}</label>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center" alt="alert">
                                    Aucune catégorie existante
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <button class="btn btn-sm btn-accent" id="publish">
                                <i class="material-icons">file_copy</i> Publier
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
        </div>
    </div>
    @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script>
            
            var simplemde = new SimpleMDE({
                element: document.getElementById("editor"),
                autoDownloadFontAwesome: true,
                status: false
            });
            $('#publish').click(function () {
                var titre = $('#titre').val();
                var content = simplemde.value();
                var category_id = $('input[name="category_id"]:checked').val();
                if (titre == '') {
                    swal({
                        title: "Erreur",
                        text: "Veuillez saisir un titre",
                        icon: "error",
                        button: "OK",
                    });
                } else if (content == '') {
                    swal({
                        title: "Erreur",
                        text: "Veuillez saisir un contenu",
                        icon: "error",
                        button: "OK",
                    });
                } else {
                    $.ajax({
                        url: "{{ route('news.post') }}",
                        type: "POST",
                        data: {
                            title: titre,
                            content: content,
                            category_id: category_id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            swal({
                                title: "Succès",
                                text: "Votre article a été publié",
                                icon: "success",
                                button: "OK",
                            }).then(function () {
                                window.location.href = "/";
                            });
                        },
                        error: function (data) {
                            swal({
                                title: "Erreur",
                                text: "Une erreur est survenue",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                }
            });

        </script>
    @endpush
@endsection
