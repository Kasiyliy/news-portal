@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>
        .swiper-container.slider {
            width: 100%;
            height: 500px;
        }

        .swiper-slide.slider {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-pagination.slider {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: fit-content;
            height: 100%;
            padding: 0 20px;
            background-color: rgba(0, 101, 109, 0.5);;
        }

        .swiper-text h1 {
            font-size: 22px;
            line-height: 25px;
        }

        .swiper-img img {
            width: 100%;
        }

        .swiper-container.calendar {
            width: 100%;
            height: auto;
        }

        .swiper-slide.calendar {
            background: #FFFFFF;
        }

        .swiper-pagination-bullet {
            background: #F8A555 !important;
        }

        .swiper-container-vertical > .swiper-pagination-bullets {
            left: 10px;
        }

        .fa {
            font-size: 0.5rem;
        }

        table {
            width: 100%;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            font-family: Roboto Condensed;
            font-style: normal;
            color: #00656D;

        }

        td.day {
            color: rgba(0, 0, 0, 0.95);
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            text-transform: lowercase;
        }

        td,
        #year {
            font-family: monospace;
        }

        .hover {
            background: #eee;
        }

        td.day.active {
            color: red;
        }

        #about {
            font-size: 5em !important;
            position: absolute;
            top: -35px;
            right: 15px;
        }

        #about a {
            text-decoration: none;
        }

        .title_label {

            color: #00656D;
            font-weight: bold;
        }

        .map-svg svg {
            margin-top: 0 !important;
        }

        .header__nav {
            justify-content: flex-end;
        }

        .img_logo {
            width: 100%;
        }
    </style>
    <style>
        #maps a .str0 {
            stroke: #00656D;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-miterlimit: 22.9256;
        }

        #maps a .fil1 {
            fill: rgba(0, 0, 0, .8);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        #maps a .fil0 {
            fill: rgba(0, 195, 204, 0.59);
        }

        #maps a:hover .fil0 {
            fill: #00656D;
            transition: 0.6s ease;
        }

        #maps a .current {
            fill: #00656D;
        }

        #maps a:hover .fil1 {
            fill: #333;
        }

        #maps a {
            text-decoration: none;
        }

    </style>
@endsection

@section('content')
    <section class="info">
        <div class="container">
            <div class="info__inner">
                <div class="info__content">
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/school-icon.png')}}" alt="school">
                            <h2>Мемлекеттік бағдарламалар</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a class="text-white" href="{{route('programs')}}">Толығырақ оқу ➞</a>
                                <h1>01</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/people-icon.png')}}" alt="">
                            <h2>Әулие-ата үміті</h2>
                        </div>
                        <div class="info__card__content">
                            <p>
                                Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар.
                            </p>
                            <div class="info__card__link">
                                <a class="text-white" href="#">Толығырақ оқу ➞</a>
                                <h1>02</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head">
                            <img src="{{asset('modules/front/assets/img/building-icon.png')}}" alt="">
                            <h2>Жастар
                                ұйымдары</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a class="text-white" href="{{route('groups')}}">Толығырақ оқу ➞</a>
                                <h1>03</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/t-icon.png')}}" alt="">
                            <h2>Форум</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="{{route('forum.categories')}}">Толығырақ оқу ➞</a>
                                <h1>04</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
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
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/tasks-icon.png')}}" alt="">
                            <h2>Еріктілер</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="{{route('prominent.info')}}">Толығырақ оқу ➞</a>
                                <h1>06</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about_section">
        <div class="container">

            <div class="row">
                <div class="about__content col-12 col-lg-12 col-md-12">
                    <h1>Сайт туралы </h1>

                    <div class="row">
                        <div class="about__image col-12 col-lg-6 col-md-6 ">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="mt-12 flex flex-col lg:flex-row">
                                            <div class="inline-block h-full w-1/2 map-svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                     style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd;margin-top: -20px;width: 95%;margin-left: 2.5%;"
                                                     width="665px" height="auto" marginTop="0!important" version="1.1"
                                                     viewBox="0 0 591.31 428.07"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="maps">
                <metadata id="mapLayer"></metadata>

                <a href="{{route('resource', ['id' => 3])}}">
                    <path class="fil0 str0 {{request()->route('id') == 3 ? 'current' : ''}}"
                          d="M408.82 1.01c-3.75,10.3 -11.66,19.94 -11.25,30.88 0.65,17.36 7.33,32.11 10.99,48.16l-19.63 2.88 0.27 16.75 29.83 -3.67 -0.78 17.54 14.65 15.18 5.76 -0.79 23.03 20.41 -1.57 18.85 -18.32 5.76 -16.75 -8.38 -6.8 -8.9 -8.64 1.05 2.62 21.46 11.9 1.57 11.19 25.97 -13.21 2.36 -12.17 9.95 -0.53 5.75c-14.21,8.77 -27.13,13.22 -45.01,13.74 -6.89,6.98 -9.07,13.04 -9.68,20.94l-7.33 0.52 -17.8 -8.37 -3.79 0.85 0.19 3.34 -12.88 1.43 -21.59 -5.88 -9.56 -1.57 -12.43 -6.68 -28.39 -3.4 -10.87 5.63 -9.48 -2.81 -5.5 -27.22 -76.62 -29.24 16.49 -28.01c4.08,-6.93 3.14,-15.79 4.71,-23.68 1.25,-6.3 9.59,-8.55 14.39,-12.82 5.38,-4.8 14.31,-1.75 21.46,-2.62 2.78,-0.34 1.05,-23.03 1.57,-34.55 0.43,-9.51 5.24,-18.32 7.85,-27.48 2.95,-10.3 -2.44,-21.28 -3.66,-31.92 -0.82,-7.17 3.66,-13.96 5.49,-20.94l201.85 -2.04z"></path>
                    <g>
                        <text x="267.67" y="122.28" class="fil1 fnt0">Мойынқұм</text>
                        <text x="276.11" y="134.25" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 4])}}">
                    <path class="fil0 str0 {{request()->route('id') == 4 ? 'current' : ''}}"
                          d="M215.29 214.31l5.5 27.22 -6.15 2.74c-2.36,13.66 -5.97,39.57 -7.07,40.96 -2.53,3.18 -14.16,4.7 -25.39,6.28l-3.4 6.81 -0.69 4.89 -12.13 1.39c-6.43,0.73 -14.6,-3.07 -19.37,1.31 -3.14,2.87 -9.01,4.39 -9.42,8.63 -0.39,4.08 2.62,6.98 3.93,10.47l-10.21 9.68 4.71 12.57 -4.97 -0.27 -2.88 -4.97 -10.21 1.05 -2.09 1.83 -20.68 6.02 -9.42 -12.3 -4.97 -11.25 -7.33 0.26 -2.16 -5.17 0.26 -8.89c0.27,-9.35 12.31,-18.54 18.84,-24.08l10.47 3.4 18.32 -13.08 -4.45 -12.3 1.05 -6.02 -6.28 -7.59 6.28 -4.71 -5.76 -6.81 -5.23 -5.49 0.52 -4.45 2.88 -18.32c0.6,-3.82 -0.87,-7.68 -1.31,-11.52l-1.83 -8.11 3.4 -6.28 30.62 -3.14 76.62 29.24z"></path>
                    <g>
                        <text x="146.72" y="239.18" class="fil1 fnt0">Талас</text>
                        <text x="142.18" y="251.15" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 2])}}">
                    <path class="fil0 str0 {{request()->route('id') == 2 ? 'current' : ''}}"
                          d="M1.01 5.14l205.96 -2.09c-1.83,6.98 -6.31,13.77 -5.49,20.94 1.22,10.64 6.61,21.62 3.66,31.92 -2.61,9.16 -7.42,17.97 -7.85,27.48 -0.52,11.52 1.21,34.21 -1.57,34.55 -7.15,0.87 -16.08,-2.18 -21.46,2.62 -4.8,4.27 -13.14,6.52 -14.39,12.82 -1.57,7.89 -0.63,16.75 -4.71,23.68l-16.49 28.01 -30.62 3.14 -3.4 6.28 1.83 8.11c0.44,3.84 1.91,7.7 1.31,11.52l-2.88 18.32 -0.52 4.45 5.23 5.49 5.76 6.81 -6.28 4.71 6.28 7.59 -1.05 6.02 4.45 12.3 -18.32 13.08 -10.47 -3.4c-6.53,5.54 -18.57,14.73 -18.84,24.08l-0.22 8.99 -6.32 4.09 -5.24 -6.54 -11.25 1.05 -2.88 -4.19 -12.82 -13.35 -9.95 -4.71 25.39 -34.55 1.83 -36.64 9.42 -8.63 -7.33 -77.99 -13.08 -38.21 -12.04 -37.16 -12.56 -35.07 -13.09 -25.52z"></path>
                    <g>
                        <text x="80.72" y="75.52" class="fil1 fnt0">Сарысу</text>
                        <text x="81.42" y="87.49" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 5])}}">
                    <path class="fil0 str0 {{request()->route('id') == 5 ? 'current' : ''}}"
                          d="M490.35 184.34c-5.1,6.85 -7.2,17.36 -13.35,23.29 1.22,6.11 3.31,15.58 1.7,21.59l-2.48 9.3 8.14 10.56 -6.38 0.43 -3.14 5.49 -2.74 -0.52 -3.14 3.4 2.74 6.94 -18.45 17.27 -6.41 -1.57c-3.53,3.75 -5.96,9.01 -10.6,11.25l-3.79 1.84 6.67 19.62 -4.05 7.07 -14.4 2.35 -12.56 -9.42 -6.67 1.7c-4.37,-2.74 -10.13,-4.02 -13.09,-8.24l-5.23 -7.46 -6.55 -3.4 -0.13 -6.28 -5.76 -6.68 -4.18 -0.52 -11.13 -13.74 -21.98 -2.35 -7.41 -11.71 -0.18 -3.08 3.79 -0.85 17.8 8.37 7.33 -0.52c0.61,-7.9 2.79,-13.96 9.68,-20.94 17.88,-0.52 30.8,-4.97 45.01,-13.74 0.18,-1.92 0.35,-3.84 0.53,-5.75l12.17 -9.95 13.21 -2.36 -11.19 -25.97 -11.9 -1.57 -2.62 -21.46 8.64 -1.05 6.8 8.9 16.75 8.38 18.32 -5.76 30.23 17.14z"></path>
                    <g>
                        <text x="423.18" y="240.76" class="fil1 fnt0">Шу</text>
                        <text x="411.53" y="252.72" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 8])}}">
                    <path class="fil0 str0 {{request()->route('id') == 8 ? 'current' : ''}}"
                          d="M509.39 191.64l14.43 12.46 4.19 14.91 -4.19 4.98 -1.57 18.06 -19.89 23.81 8.12 8.11c1.48,-0.43 2.96,-1.74 4.44,-1.31l8.9 2.62 14.92 0.26 1.05 3.41 -10.47 14.13c0.35,3.84 -0.65,8.05 1.05,11.51l6.54 13.35 24.34 9.68 -5.5 9.16 13.87 0.53 16.49 -4.98 4.19 4.19 -12.57 7.85 -2.09 8.38 -2.36 4.45 -21.46 1.57c-8.63,-1.4 -18.02,-0.41 -25.9,-4.19l-25.65 -12.3 -17.01 -0.26 -25.65 -18.32 -22.54 -3.4 4.05 -7.07 -6.67 -19.62 3.79 -1.84c4.64,-2.24 7.07,-7.5 10.6,-11.25l6.41 1.57 18.45 -17.27 -2.74 -6.94 3.14 -3.4 2.74 0.52 3.14 -5.49 6.38 -0.43 -8.14 -10.56 2.48 -9.3c1.61,-6.01 -0.48,-15.48 -1.7,-21.59 6.15,-5.93 8.25,-16.44 13.35,-23.29 6.19,-0.74 14.64,3.49 19.04,7.3z"></path>
                    <g>
                        <text x="471.78" y="301.1" class="fil1 fnt0">Қордай</text>
                        <text x="471.11" y="313.07" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 6])}}">
                    <path class="fil0 str0 {{request()->route('id') == 6 ? 'current' : ''}}"
                          d="M269.75 242.23c1.88,1.65 3.45,3.4 3.33,5.7 -0.13,2.48 0.92,5.34 -0.39,7.46l-2.36 3.79 7.07 25.65 16.88 -9.16c2.88,8.55 2.18,19.35 8.64,25.65l10.73 10.46 12.82 -1.57c7.59,6.55 22.77,9.61 22.77,19.63l0 15.18c-2.97,4.97 -6.79,9.53 -8.9,14.92 -1.57,4.01 -4.56,7.73 -4.71,12.04l-0.26 7.32 6.8 6.29 -0.78 4.45 -10.73 10.2 26.69 0.79 23.03 12.82 9.42 -5.23 -12.56 -10.73 4.84 -50.51c5.06,-4.89 8.25,-13.46 15.18,-14.66 3.54,-0.61 7.56,0.07 10.6,-1.83l13.25 -8.31 -0.44 0.07 -12.56 -9.42 -6.67 1.7c-4.37,-2.74 -10.13,-4.02 -13.09,-8.24l-5.23 -7.46 -6.55 -3.4 -0.13 -6.28 -5.76 -6.68 -4.18 -0.52 -11.13 -13.74 -21.98 -2.35 -7.4 -11.45 -12.88 1.43 -21.59 -5.88 -9.56 -1.57 -12.21 -6.56z"></path>
                    <g>
                        <text x="319.05" y="287.03" class="fil1 fnt0">Меркі</text>
                        <text x="315.41" y="299" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 11])}}">
                    <path class="fil0 str0 {{request()->route('id') == 11 ? 'current' : ''}}"
                          d="M260.85 241.07l3.21 4.89c0.09,3.23 1.31,6.64 0.26,9.69 -1.57,4.53 -5.5,8.87 -4.71,13.6l1.31 7.86c-2.45,6.63 -6.86,12.84 -7.33,19.89 -0.17,2.61 0.17,5.32 -0.52,7.85l-1.84 6.67 -7.59 6.28 -0.39 3.01c-1.74,-0.26 -3.88,-1.91 -5.23,-0.78 -1.31,1.09 -3.96,1.57 -3.93,3.27 0.05,2.14 -1.28,4.81 0.13,6.41l4.98 5.63 -3.93 5.88 3.53 5.63 -7.19 6.28c0.37,2.53 1.67,5.1 1.11,7.59l-2.55 11.26 4.45 -2.62 21.19 5.49 14.01 6.42 21.32 2.48 21.99 4.98 11.78 10.33 5.75 1.18 10.73 -10.2 0.78 -4.45 -6.8 -6.29 0.26 -7.32c0.15,-4.31 3.14,-8.03 4.71,-12.04 2.11,-5.39 5.93,-9.95 8.9,-14.92l0 -15.18c0,-10.02 -15.18,-13.08 -22.77,-19.63l-12.82 1.57 -10.73 -10.46c-6.46,-6.3 -5.76,-17.1 -8.64,-25.65l-16.88 9.16 -7.07 -25.65 2.36 -3.79c1.31,-2.12 0.26,-4.98 0.39,-7.46 0.12,-2.3 -1.45,-4.05 -3.33,-5.7l-0.22 -0.12 -8.68 -1.04z"></path>
                    <g>
                        <text x="262.88" y="345.94" class="fil1 fnt0">Т.Рысқұлов</text>
                        <text x="269.55" y="357.91" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 7])}}">
                    <path class="fil0 str0 {{request()->route('id') == 7 ? 'current' : ''}}"
                          d="M178.09 303.21c0.13,3.23 -0.78,6.68 0.4,9.68 1.35,3.45 4.4,6.66 4.05,10.34l-0.52 5.5c2.97,3.01 4.91,7.62 8.9,9.03l4.45 1.57 1.83 13.6 -0.39 4.85 9.16 4.31c2.44,-3.31 3.21,-10.01 7.32,-9.94l15.71 0.26 2.63 0.9 -0.02 -0.18 7.19 -6.28 -3.53 -5.63 3.93 -5.88 -4.98 -5.63c-1.41,-1.6 -0.08,-4.27 -0.13,-6.41 -0.03,-1.7 2.62,-2.18 3.93,-3.27 1.35,-1.13 3.49,0.52 5.23,0.78l0.39 -3.01 7.59 -6.28 1.84 -6.67c0.69,-2.53 0.35,-5.24 0.52,-7.85 0.47,-7.05 4.88,-13.26 7.33,-19.89l-1.31 -7.86c-0.79,-4.73 3.14,-9.07 4.71,-13.6 1.05,-3.05 -0.17,-6.46 -0.26,-9.69l-3.21 -4.89 -19.71 -2.36 -10.87 5.63 -9.65 -2.74 0.17 -0.07 -6.15 2.74c-2.36,13.66 -5.97,39.57 -7.07,40.96 -2.53,3.18 -14.16,4.7 -25.39,6.28l-3.4 6.81 -0.69 4.89z"></path>
                    <g>
                        <text x="202.56" y="304.5" class="fil1 fnt0">Байзақ</text>
                        <text x="200.92" y="316.47" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 9])}}">
                    <path class="fil0 str0 {{request()->route('id') == 9 ? 'current' : ''}}"
                          d="M141.1 325.01l14.49 4.43c0.96,2.8 0.38,6.8 2.88,8.38l15.7 9.94 -3.93 12.3 -16.49 2.36c1.84,2.27 2.77,5.79 5.5,6.8l7.07 2.62 -0.79 3.14 24.61 7.61 -24.35 26.67 -9.42 17.8 -6.54 -2.62 -5.23 -10.2 -18.06 -14.14c-4.71,-3.66 -8.89,-8.15 -14.13,-10.99l-15.97 -8.63 -1.37 -29.65 20.38 -5.93 2.09 -1.83 10.21 -1.05 2.88 4.97 4.97 0.27 -4.71 -12.57 10.21 -9.68z"></path>
                    <g>
                        <text x="107.5" y="367.06" class="fil1 fnt0">Жуалы</text>
                        <text x="106.2" y="379.03" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>

                <a href="{{route('resource', ['id' => 10])}}">
                    <path class="fil0 str0 {{request()->route('id') == 10 ? 'current' : ''}}"
                          d="M190.14 382.59l2.15 -5.19c5.47,3.4 8.65,-2.38 13.08,-2.36l20.29 0.13 4.51 -3.19 2.55 -11.26c0.55,-2.43 -0.68,-4.94 -1.09,-7.41l-2.63 -0.9 -15.71 -0.26c-4.11,-0.07 -4.88,6.63 -7.32,9.94l-9.16 -4.31 0.39 -4.85 -1.83 -13.6 -4.45 -1.57c-3.99,-1.41 -5.93,-6.02 -8.9,-9.03l0.52 -5.5c0.35,-3.68 -2.7,-6.89 -4.05,-10.34 -1.18,-3 -0.27,-6.45 -0.4,-9.68l-12.13 1.39c-6.46,0.43 -14.6,-3.07 -19.37,1.31 -3.14,2.87 -9.01,4.39 -9.42,8.63 -0.39,4.08 2.62,6.98 3.93,10.47l14.49 4.43c0.96,2.8 0.38,6.8 2.88,8.38l15.7 9.94 -3.93 12.3 -16.49 2.36c1.84,2.27 2.77,5.79 5.5,6.8l7.07 2.62 -0.79 3.14 24.61 7.61z"></path>
                    <g>
                        <text x="174.26" y="361.94" class="fil1 fnt0">Жамбыл</text>
                        <text x="177.31" y="373.9" class="fil1 fnt0">ауданы</text>
                    </g>
                </a>
            </g>
        </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about__content inner col-12 col-lg-6 col-md-6 ">
                            <p class="overlay-text p-5">
                                Жастар ресурстық орталықтар 2015 жылы ашылған Жастар ресурстық орталықтар 2015 жылы ашылған Жастар ресурстық орталықтар 2015 жылы ашылған
                            </p>
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
                        <h1 data-purecounter-start="0"
                            data-purecounter-end="{{$count->count}}"
                            class="purecounter">0</h1>
                        <p>{{$count->title}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="slider">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="quote">
                        <span class="quote-sign fa fa-quote-right">
                        </span>
                        <span class="quote-text">
                            Біз тәуелсіздігінен айрылып қалған елдердің тағдырынан тиісті қорытынды шығарып, тағылымы мол сабақ алдық.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="calendar" id="event">
        <div class="container">
            <h1>Іс-шара күнтізбесі</h1>
            <div class="calendar__inner row pb-5 justify-content-around">
                <div class="calendar__general col-md-12 col-lg-4">
                    <h1 class="text-center"><a id="left"><i class="fa fa-chevron-left"> </i></a><span>&nbsp;</span><span
                                id="month"> </span><span>&nbsp;</span><span id="year"> </span><span>&nbsp;</span><a
                                id="right"><i class="fa fa-chevron-right"> </i></a></h1>
                    <table class="table"></table>
                </div>
                <div class="calendar__detail col-md-12 col-lg-6">
                    <h2 id="calendar-title"></h2>
                    <div class="swiper-container calendar">
                        <div class="swiper-wrapper" id="swiper-wrapper">
                            {{--слайдер--}}
                        </div>
                        <div class="swiper-pagination"></div>
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
                    @foreach($business_categories as $business_category)
                        <div class="business__item col-10 mx-auto col-lg-4  text-center">
                            <a class="d-flex" href="{{route('business',$business_category->id)}}">
                                <img src="{{asset($business_category->image_path)}}" alt="tractor" height="36">
                                <p>{{$business_category->name}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <section class="news" id="news">
        <div class="container">
            <div class="news__inner">
                <h1 onclick="location.href='{{route('news')}}';">Жаңалықтар мен хабарландырулар </h1>
                <div class="row">
                    @foreach($news as $n)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="news__body">
                                <a href="{{route('news.detail', $n->id)}}">
                                    <img class="news__img" src="{{asset($n->image_path)}}">
                                    <p>
                                        {{strlen($n->title) > 111 ?
                                    mb_substr($n->title,0,111)."..."
                                            : $n->title}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="upward">
        <a href="#header" class="open__button" id="myBtn">
            <i class="fa fa-chevron-up fa-2x"></i>
        </a>
    </section>

@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/purecounter.js')}}"></script>
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
                var currentDate = new Date();

                function generateCalendar(d) {
                    function monthDays(month, year) {
                        var result = [];
                        var days = new Date(year, month, 0).getDate();
                        for (var i = 1; i <= days; i++) {
                            result.push(i);
                        }
                        return result;
                    }

                    Date.prototype.monthDays = function () {
                        var d = new Date(this.getFullYear(), this.getMonth() + 1, 0);
                        return d.getDate();
                    };
                    var details = {
                        // totalDays: monthDays(d.getMonth(), d.getFullYear()),
                        totalDays: d.monthDays(),
                        weekDays: [
                            "Жс",
                            "Дс",
                            "Сс",
                            "Ср",
                            "Бс",
                            "Жм",
                            "Сн",

                        ],
                        months: [
                            "Қаңтар",
                            "Ақпан",
                            "Наурыз",
                            "Сәуір",
                            "Мамыр",
                            "Маусым",
                            "Шілде",
                            "Тамыз",
                            "Қыркүйек",
                            "Қазан",
                            "Қараша",
                            "Желтоқсан"
                        ]
                    };
                    let title = document.getElementById('calendar-title');
                    var start = new Date(d.getFullYear(), d.getMonth()).getDay();
                    var cal = [];
                    var day = 1;
                    for (var i = 0; i <= 6; i++) {
                        cal.push(["<tr>"]);
                        for (var j = 0; j < 7; j++) {
                            if (i === 0) {
                                cal[i].push("<td>" + details.weekDays[j] + "</td>");
                            } else if (day > details.totalDays) {
                                cal[i].push("<td>&nbsp;</td>");
                            } else {
                                if (i === 1 && j < start) {
                                    cal[i].push("<td>&nbsp;</td>");
                                } else if (day === new Date().getDate() && d.getMonth() === new Date().getMonth()) {
                                    cal[i].push('<td class="day active">' + day++ + "</td>");
                                    title.innerHTML = `${new Date().getDate()} ${details.months[d.getMonth()]}`
                                } else {
                                    cal[i].push('<td class="day">' + day++ + "</td>");
                                }
                            }
                        }
                        cal[i].push("</tr>");
                    }
                    cal = cal
                        .reduce(function (a, b) {
                            return a.concat(b);
                        }, [])
                        .join("");
                    $("table").append(cal);
                    $("#month").text(details.months[d.getMonth()]);
                    $("#year").text(d.getFullYear());
                    $("td.day")

                        .mouseover(function () {
                            $(this).addClass("hover");
                        })
                        .mouseout(function () {
                            $(this).removeClass("hover");
                        })
                        .click(function () {
                            let days = document.getElementsByClassName("day");
                            for (let i = 0; i < days.length; i++) {
                                days[i].className = "day";
                            }
                            title.innerHTML = `${$(this)[0].outerText} ${details.months[d.getMonth()]}`
                            $(this).addClass("active")
                            let choosenDate = $("td.day.active").text();
                            addUpdateData(choosenDate)

                        })
                    ;
                    let swiperWrapper = document.getElementById('swiper-wrapper');

                    addUpdateData(new Date().getDate());

                    function addUpdateData(day) {
                        $(function () {
                            $.ajax({
                                method: "get",
                                url: "{{route('calendar.event')}}",
                                data: {
                                    date: `${d.getFullYear()}-${("0" + (d.getMonth() + 1)).slice(-2)}-${day}`
                                },
                                success: function (response) {
                                    let events = JSON.parse(response);
                                    getCalendar(events.events);
                                }
                            });
                        });
                    }

                    function getCalendar(events) {
                        if (events.length) {
                            swiperWrapper.innerHTML = '';
                            for (let i = 0; i < events.length; i++) {
                                swiperWrapper.insertAdjacentHTML('beforeend',
                                    `<div class="swiper-slide calendar pt-4">

                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label class = "title_label">Ұйымдастырушы:</label>
                                </div>
                                 <div class="form-group col-md-8">
                                    <label>${events[i].representative}</label>
                                </div>

                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class = "title_label">Тақырыбы:</label>
                                </div>
                                 <div class="form-group col-md-8">
                                    <label>${events[i].title}</label>
                                </div>

                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class = "title_label">Өтетін орны:</label>
                                </div>
                                 <div class="form-group col-md-8">
                                    <label>${events[i].place}</label>
                                </div>

                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class = "title_label">Телефон:</label>
                                </div>
                                 <div class="form-group col-md-8">
                                    <label>${events[i].phone}</label>
                                </div>

                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label class = "title_label">Эл.пошта:</label>
                                </div>
                                 <div class="form-group col-md-8">
                                    <label>${events[i].email}</label>
                                </div>

                              </div>

                             <div class="calendar__detail-button row">
                                {{--<div class="col-12 col-md-6 calendar__button left mt-3">--}}
                                            {{--    <button onclick="location.href='{{route('event','')}}'+'/'+${events[i].id};">Толық көру</button>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-12 col-md-6 calendar__button right mt-3">--}}
                                            {{--    <button onclick="location.href='{{route('event.send')}}';">Іс-шараны ұсыну</button>--}}
                                            {{--</div>--}}
                                        </div>
                                   </div>`);
                            }
                        } else {
                            swiperWrapper.innerHTML =
                                `<div class="swiper-slide calendar">
                                    <div class="calendar__detail-button row mb-5 mt-5">
                                        <div class="col-12 calendar__button right pb-5 pt-5 mb-5 mt-5">
                                            <h5>Бұл күнге ешқандай іс-шара белгіленбеген</h5>
                                            {{--<button onclick="location.href='{{route('event.send')}}';">Іс-шараны ұсыну</button>--}}
                                    </div>
                                </div>
                            </div>`
                        }
                        swiper.update();
                    }
                }


                $("#left").click(function () {
                    $("table").text("");
                    if (currentDate.getMonth() === 0) {
                        currentDate = new Date(currentDate.getFullYear() - 1, 11);
                        generateCalendar(currentDate);
                    } else {
                        currentDate = new Date(
                            currentDate.getFullYear(),
                            currentDate.getMonth() - 1
                        );
                        generateCalendar(currentDate);
                    }
                });
                $("#right").click(function () {
                    $("table").html("<tr></tr>");
                    if (currentDate.getMonth() === 11) {
                        currentDate = new Date(currentDate.getFullYear() + 1, 0);
                        generateCalendar(currentDate);
                    } else {
                        currentDate = new Date(
                            currentDate.getFullYear(),
                            currentDate.getMonth() + 1
                        );
                        generateCalendar(currentDate);
                    }
                });
                generateCalendar(currentDate);
            }
        );

        let screenSize = $(window).width();
        if (screenSize < 992) {
            let pagination = document.getElementById('swiper-pagination');
            pagination.style.display = "none";
            let reverse = document.getElementsByClassName('slider-reverse-block');
            for (let i = 0; i < reverse.length; i++) {
                reverse[i].style.flexFlow = 'wrap-reverse';
            }
        }

        var swiper = new Swiper('.swiper-container.calendar', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                clickable: true,
            },
        });

        var mybutton = document.getElementById("myBtn");
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
@endsection
