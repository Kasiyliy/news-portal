
@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Іс-шара</h1>
                <a href="{{route('welcome')}}">← Қайта оралу </a>
            </div>
            <div class="news__detail__inner-header">
                <h2>А.Құнанбайұлының 175 жылдығына арналған іс-шара</h2>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="about__inner my-5">
                <div class="row mb-5">
                    <div class="about__main-img  col-md-12 col-lg-10">
                        <img id="expandedImg" src="{{asset('modules/front/assets/img/event.png')}}">
                    </div>
                    <div class="about__tab-img col-md-12 col-lg-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper about__tab-img">

                                    <div class="about__gallery swiper-slide">
                                        <img src="{{asset('modules/front/assets/img/event.png')}}" onclick="myFunction(this);"
                                             alt="">
                                    </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/event.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/logo.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/event.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/logo.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/logo.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>
                                <div class="about__gallery swiper-slide">
                                    <img src="{{asset('modules/front/assets/img/logo.png')}}" onclick="myFunction(this);"
                                         alt="">
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    Тұрғындардың тілдік мәдениетін арттыру және рухани тәрбие беру үшін Ұлы ойшыл ақынның мұрасын зерделеу, ұғыну және дәріптеу мақсатында ай сайын, кестеге сәйкес, әр ауылдық округ А. Құнанбайұлының 175 жылдығына орай іс-шара ұйымдастыруда. Ережеге сәйкес, эстафетаны ай сайын келесі ауылдық округке жолдауы керек. Үстіміздегі жылдың 12 наурызында аталмыш іс-шара Белоглин ауылдық округінің Белоглин ауылының ауылдық клубында өткізілді. Ауыл тұрғындарының ұйымдастыруымен А. Құнанбайұлының 175 жылдығына арналған «Абай» қойылымы сахналанды. Іс-шараға ауыл тұрғындары, мемлекеттік қызметшілер, мектеп мұғалімдері мен оқушылары қатысты.
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
        }

        let screenSize = $(window).width();
        if (screenSize < 992) {
            let reverse = document.getElementsByClassName('slider-reverse-block');
            for (let i = 0; i < reverse.length; i++) {
                reverse[i].style.flexFlow = 'wrap-reverse';
            }
        }

        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 2,
            direction: screenSize < 992 ? 'horizontal' : 'vertical',
            breakpoints: {
                640: {
                    slidesPerView: 4,
                }
            }
        });
    </script>

@endsection
