@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .categories {
            background-color: #f2f3f5;
        }

        .news__detail {
            background-color: #f2f3f5;
        }

        .btn__new-topic {
            background-color: #F8A555;
            color: #FFFFFF;
        }

        .modal-header {
            background-color: #00656D;
            color: #FFFFFF;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #00656D;
            color: #FFFFFF;
        }

        .card-body {
            border-bottom: 1px solid #f2f3f5;
        }

        .card-title {
            color: #0e0e12;
            font-size: 20px;
            font-weight: bold;
        }

        .card-title:hover {
            color: #2981bf;
            text-decoration: none;
        }

        .fa.fa-caret-right {
            color: #F8A555;
            font-size: 22px;
        }

        .title__block {
            transition: 0.5s;
        }

        .title__block:hover {
            padding-left: 10px;
            transition: 0.5s;
        }

        .subtitle__block span {
            font-size: 12px;
            color: #718096;
        }

        .subtitle__block i {
            font-size: 10px;
            color: #F8A555;
        }

        .user__img {
            width: 50px;
            height: 50px;
        }

        .user__img img {
            width: 100%;
            border-radius: 50%;
            height: 100%;
            object-fit: cover;
        }

        .user__info p {
            font-size: 12px;
            color: #718096;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>{{$subcategory->name}}</h1>
                <div class="mt-3 pb-3 d-flex justify-content-between">
                    <a href="{{route('forum.categories')}}">← Қайта оралу </a>
                    <button class="btn btn-sm btn__new-topic" data-toggle="modal" data-target="#exampleModal">Жаңа
                        тақырып жазу
                    </button>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('forum.category.detail.post', request()->route('id'))}}" method="post"
                  enctype="multipart/form-data" class="needs-validation" novalidate>
                {{csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Жаңа тақырып жазу</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationTooltip01">Тақырыптың аты</label>
                                <input type="text" class="form-control" name="title" id="validationTooltip01"
                                       placeholder="Тақырыптың аты" required>
                                <div class="invalid-tooltip">
                                    Тақырыпты толтырыңыз
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Жабу</button>
                        <button type="submit" class="btn btn__new-topic">Жіберу</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="categories pb-5">
        <div class="container">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="pl-2 m-0">Тақырыптар</h4>
                </div>
                @foreach($topics as $topic)
                    <div class="card-body row">
                        <div class="col-9 align-self-center">
                            <div class="title__block mb-4">
                                <i class="fa fa-caret-right pr-2"></i>
                                <a href="{{route('forum.category.messages', $topic->id)}}"
                                   class="card-title">{{$topic->title}}</a>
                            </div>
                            <div class="subtitle__block">
                                <i class="fa fa-circle"></i>
                                <span class="pr-3">
                                    @if(count($topic->messages) == 0)
                                        жауап жоқ
                                    @else
                                        {{count($topic->messages)}} жауап
                                    @endif

                                </span>
                                <i class="fa fa-circle"></i>
                                <span>{{$topic->created_at}}</span>
                            </div>

                        </div>
                        <div class="col-3 row align-items-center">
                            <div class="col-4">
                                <div class="user__img ">
                                    <img
                                        src="{{asset($topic->author->avatar_path ? $topic->author->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                        alt="">
                                </div>
                            </div>
                            <div class="user__info col-8">
                                <h5 class="text-truncate">{{$topic->author->name}}</h5>
                                <p class="text-truncate">{{$topic->author->email}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
