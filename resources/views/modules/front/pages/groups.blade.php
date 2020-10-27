@extends ('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
            position: static !important;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
        }
        .swiper-button-next, .swiper-button-prev {
            position: absolute;
            top: 30%!important;
            width: 4%;
            height: 70%;
            /*margin-top: 0!important;*/
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00656D;
        }
        .swiper-button-next{
           margin-right: 60px;
        }
        .swiper-button-prev{
            margin-left: 60px;
        }
        .swiper-button-next:hover,.swiper-button-prev:hover{

            background-color:  #F8A555;

        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жастар ұйымдары</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>


        <div class="container my-5">
{{--            <div class="row">--}}
{{--                <div class="col-sm-12 col-lg-3">--}}
{{--                    <ul class="list-group bs-4" id="groups">--}}
{{--                        @foreach($groups as $group)--}}
{{--                            <li onclick="chooseContent(this, {{$group}})" class="list-group-item cursor d-flex justify-content-between">--}}
{{--                                <span>{{$group->name}}</span><b>></b>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-lg-9">--}}
{{--                    <div class="card bs-4 d-flex p-3" id="list-group-content">--}}
{{--                        <span>--}}
{{--                            не выбрано--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($groups as $group)
                            <div class="swiper-slide">
                                <div class="card">
                                <div><h1>{{$group->name}}</h1></div>
                                <p>{!! $group->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

@endsection


@section('scripts')
    <script>
        let currentChosenEl = null;
        const content = document.getElementById('list-group-content');
        start();
        function chooseContent(el, group) {
            if (currentChosenEl) {
                currentChosenEl.classList.remove('bg-sj-gray');
            }
            currentChosenEl = el;
            content.innerHTML = group.description;
            currentChosenEl.classList.add('bg-sj-gray');
        }

        function start() {
            currentChosenEl = document.getElementById('groups').children[0];
            if(currentChosenEl) {
                currentChosenEl.classList.add('bg-sj-gray');
            }
            content.innerHTML = `{!! $groups->first() ? $groups->first()->description : 'Ұйымдар жоқ!' !!}`;
        }


    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>

        var swiper = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
