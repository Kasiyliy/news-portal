@extends ('modules.front.layouts.app-main')
@section('styles')
    <style>
        .news__detail__inner h1::after {
            width: 50%;
            background-color: #00656D;
        }

        .forum-questionnaire {
            text-align: center;
            padding: 150px 0 150px 0;
            font-style: normal;
            font-weight: normal;
            font-size: 48px;
            line-height: 56px;
            color: #000000;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        }

        .forum {
            background-color: #F8A555;;
        }
        .questionnaire {
            background-color: #00656D;;
        }

        .forum:hover {
            text-decoration: none;
            color: #000000;
            background-color: #ffab56;;
        }
        .questionnaire:hover {
            text-decoration: none;
            color: #000000;
            background-color: #00838b;;
        }
        @media(max-width: 576px) {
            .forum-questionnaire {
                padding: 100px 0 100px 0;
            }
        }
        @media(max-width: 976px) {
            .forum-questionnaire {
                font-size: 36px;
                padding: 100px 0 100px 0;
            }
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Форум / Сауалнама</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container justify-content-center my-4">
            <div class="row col-md-12">
                <a href="
{{--{{route('forum.categories')}}--}}
                    " class="forum-questionnaire forum col-12 col-md-4 offset-md-1">Форум</a>
                <a href="{{route('forum.questionnaire.list')}}" class="forum-questionnaire questionnaire col-12 col-md-4 offset-md-2">Сауалнама</a>
            </div>
        </div>
    </section>
@endsection
