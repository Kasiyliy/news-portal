@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>

        .img {
            object-fit: cover;
            height: 180px;
            width: 180px;
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
                    <div class="col-12 col-sm-6 col-md-3 p-1 d-flex flex-column align-items-center justify-content-center">
                        <img class="img img-rounded m-2" src="{{asset($surv->image_path)}}">
                        <a class="text-black-50" href="{{route('forum.questionnaire', $surv->id)}}">{{$surv->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
