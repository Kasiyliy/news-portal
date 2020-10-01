@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .categories {
            background-color: #f2f3f5;
        }

        .btn__answer {
            background-color: #F8A555;
            color: #FFFFFF !important;
        }

        .news__detail {
            background-color: #f2f3f5;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #FFFFFF;
            border-bottom: 30px solid #f2f3f5;
            margin: 0;
        }

        .card-body {
            border-bottom: 1px solid #f2f3f5;
        }

        .user__img {
            width: 90px;
            height: 90px;
        }

        .user__img img {
            width: 100%;
            border-radius: 50%;
            height: 100%;
            object-fit: cover;
        }

        .user__info {
            text-align: center;
            width: 100%;
        }

        .topic__title p {
            font-size: 13px;
            color: #718096;
        }

        .btn-label {
            padding: 4px;
            font-size: 12px;
        }

        .answer__button {
            align-self: flex-end;
        }

        .answer__button button {
            background-color: #00656D;
            color: #FFFFFF !important;
        }

        .tox.tox-tinymce {
            height: 300px !important;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>{{$topic->category->name}}</h1>
                <div class="mt-3 pb-3 d-flex justify-content-between">
                    <a href="{{url()->previous()}}">← Қайта оралу </a>
                    <a href="#" class="btn btn-sm btn__answer">Жауап беру</a>
                </div>

            </div>
        </div>
    </section>
    <section class="categories pb-5">
        <div class="container">
            <div class="card w-100">
                <div class="card-header row">
                    <div class="col-2 row flex-column align-items-center">
                        <div class="user__img mb-3">
                            <img
                                src="{{asset($topic->author->avatar_path ? $topic->author->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                alt="">
                        </div>
                        <div class="user__info">
                            <h5>{{$topic->author->name}}</h5>
                        </div>
                    </div>
                    <div class="col-10 d-flex flex-column justify-content-between ">
                        <div class="topic__title">
                            <p>Опубликовано {{date('d-m-Y H:i', strtotime($topic->created_at))}}</p>
                            <h4>{{$topic->title}}</h4>
                        </div>
                        <div class="topic__label">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-label disabled">
                                {{$topic->category->name}}
                            </button>
                        </div>
                    </div>
                </div>
                @if(count($topic->messages) == 0)
                    <p class="m-0 p-0">Бұл сұраққа жауап жоқ. Бірінші болып жауап беріңіз!</p>
                @endif
                @foreach($topic->messages as $message)
                    <div class="card-body row">
                        <div class="col-2 row flex-column align-items-center">
                            <div class="user__img mb-3">
                                <img
                                    src="{{asset($topic->author->avatar_path ? $topic->author->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                    alt="">
                            </div>
                            <div class="user__info">
                                <h5>{{$topic->author->name}}</h5>
                            </div>
                        </div>
                        <div class="col-10 d-flex flex-column justify-content-between ">
                            <div class="topic__title">
                                <p>Опубликовано {{date('d-m-Y H:i', strtotime($topic->created_at))}}</p>
                                <h4>{{$topic->title}}</h4>
                            </div>
                            <div class="topic__label">
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-label disabled">
                                    {{$topic->category->name}}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="card-body row">
                    <form action="{{route('forum.category.messages.post', request()->route('id'))}}" method="post"
                          enctype="multipart/form-data" class="needs-validation w-100 d-flex flex-column p-4"
                          novalidate>
                        {{csrf_field()}}
                        <textarea id="mytextarea" placeholder="Жауап жазу" name="text" class="form-control"
                                  required></textarea>
                        <div class="invalid-tooltip">
                            Тақырыпты толтырыңыз
                        </div>
                        <div class="answer__button">
                            <button type="submit" class="btn mt-3 pr-5 pl-5">Жауап жазу</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
@endsection
