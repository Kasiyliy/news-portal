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
            font-size: 0.5em;
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
                                <a href="{{route('programs')}}">Толығырақ оқу ➞</a>
                                <h1>01</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
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
                                <a href="{{route('groups')}}">Толығырақ оқу ➞</a>
                                <h1>03</h1>
                            </div>
                        </div>
                    </div>
                    <div class="info__card col-12 col-lg-4 col-md-6 mt-4 pl-0">
                        <div class="info__card__head reverse">
                            <img src="{{asset('modules/front/assets/img/t-icon.png')}}" alt="">
                            <h2>Форум / Сауалнама</h2>
                        </div>
                        <div class="info__card__content reverse">
                            <p>Мемлекеттік бағдарлама - ресурстар, орындаушылар, ғылыми-зерттеу, өндірістік,
                                әлеуметтік-экономикалық, ұйымдық және басқа шаралар. </p>
                            <div class="info__card__link">
                                <a href="{{route('forum.forum-questionnaire')}}">Толығырақ оқу ➞</a>
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
                                <a href="">Толығырақ оқу ➞</a>
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
                <div class="about__image col-12 col-lg-6 col-md-6 ">
                    <img src="{{asset('modules/front/assets/img/about.png')}}" alt="about">
                </div>
                <div class="about__content col-12 col-lg-6 col-md-6 ">
                    <h1>Сайт туралы </h1>
                    <p>Жамбыл облысы әкімдігінің жастар саясаты мәселелері басқармасының тапсыры бойынша Әулие-ата
                        жастарына арналған <a href="{{route('about')}}">толығырақ...</a></p>
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
            <div id="myCanvasContainer" class="d-flex">
                <canvas width="1110" height="550" id="myCanvas" style="" class="m-auto">
                    <div class="region region-tags">
                        <div class="block egov-block egov-block-simple" id="tags">
                            <p><a href="#" onclick="event.preventDefault()">Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар<br/>бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,<br/>жастардың жалпы назары мектепке аударылуы керек.</a></p>
                            <p><a href="#" onclick="event.preventDefault()">Біз тәуелсіздігінен айрылып қалған елдердің тағдырынан тиісті <br/>қорытынды шығарып, тағылымы мол сабақ алдық.</a></p>
                            <p><a href="#" onclick="event.preventDefault()">Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар<br/>бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,<br/>жастардың жалпы назары мектепке аударылуы керек.</a></p>
                            <p><a href="#" onclick="event.preventDefault()">Біз тәуелсіздігінен айрылып қалған елдердің тағдырынан тиісті <br/>қорытынды шығарып, тағылымы мол сабақ алдық.</a></p>
                            <p><a href="#" onclick="event.preventDefault()">Жастардың бүгінгі міндеті - оқу, білім, тәрбие жұмыстары. Жастар<br/>бүгін сөзден іске көшетін заман. Білімсіз істің реті болмайды. Сондықтан,<br/>жастардың жалпы назары мектепке аударылуы керек.</a></p>

                        </div>
                    </div>
                </canvas>
            </div>
        </div>
    </section>



{{--    <section class="slider">--}}
{{--        <div class="container">--}}
{{--            <div class="swiper-container slider">--}}
{{--                <div class="swiper-wrapper slider">--}}
{{--                    @foreach($slider as $s)--}}
{{--                        <div class="swiper-slide slider row slider-reverse-block">--}}
{{--                            <div class="swiper-text col-md-12 col-lg-5 ml-5">--}}
{{--                                <h1>{{$s->title}}</h1>--}}
{{--                            </div>--}}
{{--                            <div class="swiper-img col-md-6 col-lg-5 ml-4">--}}
{{--                                <img src="{{asset($s->image_path)}}" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <!-- Add Pagination -->--}}
{{--                <div class="swiper-pagination slider" id="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

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
                        <div class="col-12 col-lg-3">
                            <a href="{{route('news.detail', $n->id)}}">
                                <img src="{{asset($n->image_path)}}" alt="" width="210" height="143.17">
                                <p>{{strlen($n->title) > 111 ?
                                    mb_substr($n->title,0,111)."..."
                                            : $n->title}}</p>
                            </a>
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
            if (!$('#myCanvas').tagcanvas({
                textColour: '#000000',
                outlineColour: '#F8A555',
                reverse: true,
                depth: 0.8,
                maxSpeed: 0.05
            }, 'tags')) {
                // something went wrong, hide the canvas container
                $('#myCanvasContainer').hide();
            }
        });
    </script>
    <script>
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

    </script>

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

        var swiper = new Swiper('.swiper-container.calendar', {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                clickable: true,
            },
        });

    </script>
    <script>
        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};
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
