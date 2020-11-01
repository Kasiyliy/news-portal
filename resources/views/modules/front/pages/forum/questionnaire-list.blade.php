@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>

        .img {
            object-fit: contain;
            height: 60px;
            width: 60px;
        }

        .img-rounded {
            border-radius: 50%;
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
            <div class="row">
                @foreach($survey as $surv)
                    <div class="col-md-3 d-flex flex-column align-items-center justify-content-center">
                        <img class="img img-rounded" src="{{asset($surv->image_path)}}">
                        <a href="{{route('forum.questionnaire', $surv->id)}}">{{$surv->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
