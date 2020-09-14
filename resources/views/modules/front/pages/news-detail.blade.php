@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жаңалықтар</h1>
                <a href="{{route('news')}}">← Жаңалықтар айдарына өту </a>
                <div class="news__detail__inner-header">
                    <h2>{{$news->title}}</h2>
                    <div class="d-flex">
                        <div class=" d-flex news__bottom__date">
                            <img src="{{asset('modules/front/assets/img/eye_green-icon.png')}}" alt="eye" >
                            <p>{{$news->viewed_count}}</p>
                        </div>
                        <div class=" d-flex news__bottom__date">
                            <img src="{{asset('modules/front/assets/img/calendar_green-icon.png')}}" alt="calendar">
                            <p>{{$news->created_at->format('Y-m-d')}}</p>
                        </div>
                    </div>
                </div>
                <div class="news__detail__inner-content my-5">
                    <img src="{{asset($news->image_path)}}" alt="newsdetail" width="539" height="1004">
                    <p>
                    <div>
                        {!! $news->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
