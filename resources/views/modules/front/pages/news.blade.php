@extends('modules.front.layouts.app-main')

@section('content')
    <section class="news__block">
        <div class="container">
            <div class="news__block__inner">
                <h1>Жаңалықтар</h1>
                <div class="row news__block__content">
                    <div class="col-12 col-lg-5 col-md-12 mt-4 news__block__slider">
                        <h2>Соңғы жаңалықтар</h2>
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
                        <div class="d-block">
                            <a href="{{route('news.detail', 1)}}"><h3>БЖЗҚ шоттарының саны 11 6 миллионнан асты</h3></a>
                            <div class="d-flex">
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                    <p>115</p>
                                </div>
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}" alt="calendar">
                                    <p>25.08.2020</p>
                                </div>
                            </div>

                        </div>
                        <div class="d-block">
                            <h3>БЖЗҚ шоттарының саны 11 6 миллионнан асты</h3>
                            <div class="d-flex">
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                    <p>115</p>
                                </div>
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}" alt="calendar">
                                    <p>25.08.2020</p>
                                </div>
                            </div>

                        </div>
                        <div class="d-block">
                            <h3>БЖЗҚ шоттарының саны 11 6 миллионнан асты</h3>
                            <div class="d-flex">
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                    <p>115</p>
                                </div>
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}" alt="calendar">
                                    <p>25.08.2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news__bottom">
        <div class="container mt-5">
            <div class="row">
                @for($i = 0; $i < 10; $i++)
                    <div class="col-12 col-lg-4 col-md-6 mt-4">
                        <a href="{{route('news.detail', 1)}}">
                            <div class="news__bottom__inner-card">
                                <div class="news__bottom__image">
                                    <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" alt="">
                                </div>
                                <h5>

                                    {{strlen('Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?') > 111 ?
                                    mb_substr('Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?',0,111)."..."
                                            : 'Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?'}}

                                </h5>
                                <div class="d-flex">
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/eye_green-icon.png')}}" alt="eye">
                                        <p>115</p>
                                    </div>
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/calendar_green-icon.png')}}"
                                             alt="calendar">
                                        <p>25.08.2020</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </section>

@endsection
