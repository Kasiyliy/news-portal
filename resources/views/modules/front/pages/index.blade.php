@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection

@section('content')

    <x-front.front-header/>

    <section class="info">
        <div class="container">
            <div class="info__inner">
                <div class="info__content">
                    <div class="info__card">
                        <div class="info__card__head">
                            <img src="assets/img/school-icon.png" alt="school">
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
                    <div class="info__card">
                        <div class="info__card__head">
                            <img src="assets/img/people-icon.png" alt="">
                            <h2>Мемлекеттік бағдарламалар</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>02</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card">
                        <div class="info__card__head">
                            <img src="assets/img/building-icon.png" alt="">
                            <h2>Мемлекеттік бағдарламалар</h2>
                        </div>
                        <div class="info__card__content">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>03</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card">
                        <div class="info__card__head reverse">
                            <img src="assets/img/t-icon.png" alt="">
                            <h2>Мемлекеттік бағдарламалар</h2>
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
                    <div class="info__card">
                        <div class="info__card__head reverse">
                            <img src="assets/img/sigma-icon.png" alt="">
                            <h2>Мемлекеттік бағдарламалар</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="">Толығырақ оқу ➞</a>
                                <h1>05</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card">
                        <div class="info__card__head reverse">
                            <img src="assets/img/tasks-icon.png" alt="">
                            <h2>Мемлекеттік бағдарламалар</h2>
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
            <div class="about__inner">
                <div class="about__image">
                    <img src="assets/img/about.png" alt="about">
                </div>
                <div class="about__content">
                    <h1>Жоба туралы </h1>
                    <p>Жамбыл облысы әкімдігінің жастар саясаты мәселелері басқармасының тапсыры бойынша Әулие-ата
                        жастарына арналған <a href="">толығырақ...</a></p>
                    <div class="about__icons">
                        <div class="about__icons__content">
                            <img src="assets/img/clock-icon.png" alt="clock">
                            <p>Уақыт үнемдеу</p>
                        </div>
                        <div class="about__icons__content">
                            <img src="assets/img/attention-icon.png" alt="attention">
                            <p>Ақпаратқа қолжетімділік</p>
                        </div>
                        <div class="about__icons__content">
                            <img src="assets/img/mobile-icon.png" alt="mobile">
                            <p>Мобильді қосымша</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="numbers">
        <div class="container">
            <div class="numbers__inner">
                <div class="numbers__content">
                    <h1 class="number">37 000</h1>
                    <p>Жастар саны</p>
                </div>
                <div class="numbers__content">
                    <h1 class="number">13</h1>
                    <p>Мемлекеттік бағдарламалар</p>
                </div>
                <div class="numbers__content">
                    <h1 class="number">500</h1>
                    <p>Еріктілер саны</p>
                </div>
                <div class="numbers__content">
                    <h1 class="number">11</h1>
                    <p>Ресурстық орталық</p>
                </div>
            </div>
        </div>
    </section>

    <section class="slider">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                    <div class="swiper-slide">Slide 10</div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="calendar">
        <div class="container">
            <h1>Іс-шара күнтізбесі</h1>
            <div class="calendar__inner">
                <div class="calendar__general">

                </div>
                <div class="calendar__detail">
                    <h2>30 тамыз </h2>
                    <h3>Конституция күні</h3>
                    <div class="calendar__detail-button">
                        <button>Толық көру</button>
                        <button>Іс-шараны ұсыну</button>
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
                    <div class="col d-flex text-center">
                        <img src="assets/img/tractor-icon.png" alt="tractor">
                        <p>Ауыл шаруашылығы</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/ball-icon.png" alt="ball">
                        <p>Спорт</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/medal-icon.png" alt="medal">
                        <p>Топ бизнес</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex text-center">
                        <img src="assets/img/car-icon.png" alt="car">
                        <p>Автобизнес</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/graduate-icon.png" alt="graduate">
                        <p>Білім</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/heart-icon.png" alt="heart">
                        <p>Хобби-бизнес</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex text-center">
                        <img src="assets/img/ie-icon.png" alt="ie">
                        <p>Интернет-бизнес</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/mouse-icon.png" alt="mouse">
                        <p>Сауда</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/fork-icon.png" alt="fork">
                        <p>Тағам өнеркәсібі</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex text-center">
                        <img src="assets/img/build-icon.png" alt="build">
                        <p>Құрылыс</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/industry-icon.png" alt="industry">
                        <p>Жеңіл өнеркәсіп</p>
                    </div>
                    <div class="col d-flex text-center">
                        <img src="assets/img/wallet-icon.png" alt="wallet">
                        <p>Басқалары</p>
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
                    <div class="col">
                        <img src="assets/img/news-image.png" alt="">
                        <p>Шетелге тұрақты тұруға кетуге байланысты зейнетақы жинақтарын қалай алуға болады?</p>
                    </div>
                    <div class="col">
                        <img src="assets/img/news-image.png" alt="">
                        <p>Бос мемлекеттік әкімшілік лауазымдарға орналасуға жалпы конкурс туралы хабарландыру</p>
                    </div>
                    <div class="col">
                        <img src="assets/img/news-image.png" alt="">
                        <p>«Тегін заңгерлік кеңестер. Мамандардың заңгерлік көмегі» республикалық бағдарламасы Қазақстан
                            бойынша тұрақты түрде жаңа форматта</p>
                    </div>
                    <div class="col">
                        <img src="assets/img/news-image.png" alt="">
                        <p>«БЖЗҚ» АҚ өзекті сауалдарға жауап береді </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection