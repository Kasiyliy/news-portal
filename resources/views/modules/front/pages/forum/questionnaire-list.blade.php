@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .survey__list-btn:hover{
            background-color: #00656D;
            border-color: #00656D;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Сауалнама</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>
            </div>
        </div>
    </section>


    <section class="min__content">
        <div class="container justify-content-center my-4">
            <div class="row col-md-12">
                @foreach($survey as $surv)
                    <a href="{{route('forum.questionnaire', $surv->id)}}" type="button" class="btn btn-outline-info btn-block survey__list-btn text-left">{{$surv->title}}</a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
