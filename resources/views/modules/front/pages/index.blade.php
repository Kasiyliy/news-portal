@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
@endsection

@section('content')

    <section class="info">
        <div class="container">
            <div class="info__inner">
                <div class="info__content">
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/school-icon.png')}}" alt="school">
                            <h2>Мемлекеттік бағдарламалар</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>01</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/people-icon.png')}}" alt="">
                            <h2>100 үздік есім</h2>
                        </div>
                        <div class="info__card__content">
                            <p>
                                Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар.
                            </p>
                            <div class="info__card__link">
                                <a href="{{route('prominent')}}">Толығырақ оқу ➞</a>
                                <h1>02</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/building-icon.png')}}" alt="">
                            <h2>Жастар
                                ұйымдары</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="{{route('groups')}}">Толығырақ оқу ➞</a>
                                <h1>03</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/t-icon.png')}}" alt="">
                            <h2>Форум / Сауалнама</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>04</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/sigma-icon.png')}}" alt="">
                            <h2>ГИД</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="{{route('guide')}}">Толығырақ оқу ➞</a>
                                <h1>05</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/tasks-icon.png')}}" alt="">
                            <h2>Еріктілер</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>06</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="about__image mt-5 col-12 col-lg-6 col-md-6 ">
                    <img src="{{asset('modules/front/assets/img/about.png')}}" alt="about">
                </div>
                <div class="about__content mt-5 col-12 col-lg-6 col-md-6 ">
                    <h1>Жоба туралы </h1>
                    <p>Жамбыл облысы әкімдігінің жастар саясаты мәселелері басқармасының тапсыры бойынша Әулие-ата
                        жастарына арналған <a href="">толығырақ...</a></p>
                    <div class="about__icons row">
                        <div class="about__icons__content col-3 mx-auto">
                            <img src="{{asset('modules/front/assets/img/clock-icon.png')}}" alt="clock">
                            <p>Уақыт үнемдеу</p>
                        </div>
                        <div class="about__icons__content col-3 mx-auto">
                            <img src="{{asset('modules/front/assets/img/attention-icon.png')}}" alt="attention">
                            <p>Ақпаратқа қолжетімділік</p>
                        </div>
                        <div class="about__icons__content col-3 mx-auto">
                            <img src="{{asset('modules/front/assets/img/mobile-icon.png')}}" alt="mobile">
                            <p>Мобильді қосымша</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="numbers">
        <div class="container">
            <div class="numbers__inner row">
                @foreach($about_us as $count)
                    <div class="numbers__content col-12 col-sm-6 col-lg-3 col-md-3">
                        <h1 class="number">{{$count->count}}</h1>
                        <p>{{$count->title}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="slider">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide row slider-reverse-block">
                        <div class="swiper-text col-md-12 col-lg-5 ml-5">
                            <h1>Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар
                                бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,
                                жастардың жалпы назары мектепке аударылуы керек.
                            </h1>
                        </div>
                        <div class="swiper-img col-md-6 col-lg-5 ml-4">
                            <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide row slider-reverse-block">
                        <div class="swiper-text col-md-12 col-lg-5 ml-5">
                            <h1>Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар
                                бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,
                                жастардың жалпы назары мектепке аударылуы керек.
                            </h1>
                        </div>
                        <div class="swiper-img col-md-6 col-lg-5 ml-4">
                            <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide row slider-reverse-block">
                        <div class="swiper-text col-md-12 col-lg-5 ml-5">
                            <h1>Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар
                                бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,
                                жастардың жалпы назары мектепке аударылуы керек.
                            </h1>
                        </div>
                        <div class="swiper-img col-md-6 col-lg-5 ml-4">
                            <img src="{{asset('modules/front/assets/img/Elbasy.png')}}" alt="">
                        </div>
                    </div>


                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination" id="swiper-pagination"></div>
                <!-- Add Arrows -->
                {{--                <div class="swiper-button-next-custom"><i class="fa fa-angle-double-right"></i></div>--}}
                {{--                <div class="swiper-button-prev-custom"><i class="fa fa-angle-double-left"></i></div>--}}
            </div>
        </div>
    </section>

    <section class="calendar">
        <div class="container">
            <h1>Іс-шара күнтізбесі</h1>
            <div class="calendar__inner row pb-5 justify-content-around">
                <div class="calendar__general col-md-12 col-lg-3">

                </div>
                <div class="calendar__detail col-md-12 col-lg-6">
                    <h2>30 тамыз </h2>
                    <h3>Конституция күні</h3>
                    <div class="calendar__detail-button row">
                        <div class="col-12 col-md-6 calendar__button left mt-3">
                            <button>Толық көру</button>
                        </div>
                        <div class="col-12 col-md-6 calendar__button right mt-3">
                            <button>Іс-шараны ұсыну</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="business">
        <div class="container">
            <div class="business__inner">
                <h1>Бизнес-идея</h1>
                <div class="row">
                    <div class="business__item col-10 mx-auto col-lg-4  text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/tractor-icon.png')}}" alt="tractor">
                            <p>Ауыл шаруашылығы</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/ball-icon.png')}}" alt="ball">
                            <p>Спорт</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/medal-icon.png')}}" alt="medal">
                            <p>Топ бизнес</p>
                        </a>
                    </div>

                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/car-icon.png')}}" alt="car">
                            <p>Автобизнес</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/graduate-icon.png')}}" alt="graduate">
                            <p>Білім</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/heart-icon.png')}}" alt="heart">
                            <p>Хобби-бизнес</p>
                        </a>
                    </div>

                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/ie-icon.png')}}" alt="ie">
                            <p>Интернет-бизнес</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/mouse-icon.png')}}" alt="mouse">
                            <p>Сауда</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/fork-icon.png')}}" alt="fork">
                            <p>Тағам өнеркәсібі</p>
                        </a>
                    </div>

                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/build-icon.png')}}" alt="build">
                            <p>Құрылыс</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/industry-icon.png')}}" alt="industry">
                            <p>Жеңіл өнеркәсіп</p>
                        </a>
                    </div>
                    <div class="business__item col-10 mx-auto col-lg-4 d-flex text-center">
                        <a class="d-flex" href="{{route('business')}}">
                            <img src="{{asset('modules/front/assets/img/wallet-icon.png')}}" alt="wallet">
                            <p>Басқалары</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="news__inner">
                <h1>Жаңалықтар мен хабарландырулар</h1>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <a href="{{route('news.detail', 1)}}">
                            <img src="{{asset('modules/front/assets/img/news-image.png')}}" alt="">
                            <p>Шетелге тұрақты тұруға кетуге байланысты зейнетақы жинақтарын қалай алуға болады?</p>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="{{route('news.detail', 1)}}">
                            <img src="{{asset('modules/front/assets/img/news-image.png')}}" alt="">
                            <p>Бос мемлекеттік әкімшілік лауазымдарға орналасуға жалпы конкурс туралы хабарландыру</p>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="{{route('news.detail', 1)}}">
                            <img src="{{asset('modules/front/assets/img/news-image.png')}}" alt="">
                            <p>«Тегін заңгерлік кеңестер. Мамандардың заңгерлік көмегі» республикалық бағдарламасы
                                Қазақстан бойынша тұрақты түрде жаңа форматта</p>
                        </a>

                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="{{route('news.detail', 1)}}">
                            <img src="{{asset('modules/front/assets/img/news-image.png')}}" alt="">
                            <p>«БЖЗҚ» АҚ өзекті сауалдарға жауап береді </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script>
        let screenSize = $(window).width();
        if (screenSize < 992) {
            let pagination = document.getElementById('swiper-pagination');
            pagination.style.display = "none";
            let reverse = document.getElementsByClassName('slider-reverse-block');
            for (let i = 0; i < reverse.length; i++) {
                reverse[i].style.flexFlow = 'wrap-reverse';
            }
        }

        var swiper = new Swiper('.swiper-container', {
            direction: screenSize < 992 ? 'horizontal' : 'vertical',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },
        });
    </script>

@endsection
