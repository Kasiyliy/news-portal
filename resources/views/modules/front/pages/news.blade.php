@extends('modules.front.layouts.app-main')

@section('content')
    <section class="news__block">
        <div class="container">
            <div class="news__block__inner">
                <h1>Жаңалықтар</h1>
                <div class="row news__block__content">
                    <div class="col-12 col-lg-5 col-md-12 mt-4 news__block__slider">
                        <h2>Соңғы жаңалықтар</h2>
                        <div class="owl-carousel carousel-testimony">
                            @foreach($last_news as $last_n)
                                @php $count++; @endphp
                                <div class="item">
                                    <i class="fa fa-angle-left fa-2x slider-icon-back"></i>
                                    <p class="count-img">{{$count}}/{{$last_news->count()}}</p>
                                    <i class="fa fa-shopping-cart fa-lg slider-icon-cart"></i>
                                    <div class="photos">
                                        <img src="{{asset($last_n->image_path)}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mt-4 mx-auto news__block__image">
                        <div class="news__block__image_inner">
                            <img src="{{asset('modules/front/assets/img/operator-img.png')}}" alt="operator">
                            <a class="news__block__image_content" href="{{route('news.detail', 1)}}">
                                <p>БЖЗҚ-да МЗЖ бойынша зейнетақы
                                    шоттары автоматты түрде ашылады</p>
                                <div class="d-flex">
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                        <p>115</p>
                                    </div>
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}"
                                             alt="calendar">
                                        <p>25.08.2020</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="news__block__image_inner">
                            <img src="{{asset('modules/front/assets/img/operator-img.png')}}" alt="operator">
                            <div class="news__block__image_content">
                                <p>БЖЗҚ-да МЗЖ бойынша зейнетақы
                                    шоттары автоматты түрде ашылады</p>
                                <div class="d-flex">
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                        <p>115</p>
                                    </div>
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}"
                                             alt="calendar">
                                        <p>25.08.2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news__block__image_inner">
                            <img src="{{asset('modules/front/assets/img/operator-img.png')}}" alt="operator">
                            <div class="news__block__image_content">
                                <p>БЖЗҚ-да МЗЖ бойынша зейнетақы
                                    шоттары автоматты түрде ашылады</p>
                                <div class="d-flex">
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                        <p>115</p>
                                    </div>
                                    <div class="d-flex news__block__date">
                                        <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}"
                                             alt="calendar">
                                        <p>25.08.2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-12 mt-4 news__block__collection">
                        @foreach($news as $n)
                        <div class="d-block">
                            <a href="{{route('news.detail', $n->id)}}"><h3>{{$n->title}}</h3></a>
                            <div class="d-flex">
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                    <p>{{$n->viewed_count}}</p>
                                </div>
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}" alt="calendar">
                                    <p>{{$n->created_at->format('Y-m-d')}}</p>
                                </div>
                            </div>

                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news__bottom">
        <div class="container mt-5">
            <div class="row">
                @foreach($news as $n)
                    <div class="col-12 col-lg-4 col-md-6 mt-4">
                        <a href="{{route('news.detail', 1)}}">
                            <div class="news__bottom__inner-card">
                                <div class="news__bottom__image">
                                    <img src="{{asset($n->image_path)}}" alt="" >
                                </div>
                                <h5>

                                    {{strlen($n->title) > 111 ?
                                    mb_substr($n->title,0,111)."..."
                                            : $n->title}}

                                </h5>
                                <div class="d-flex">
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/eye_green-icon.png')}}" alt="eye">
                                        <p>{{$n->viewed_count}}</p>
                                    </div>
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/calendar_green-icon.png')}}"
                                             alt="calendar">
                                        <p>{{$n->created_at->format('Y-m-d')}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
