@extends ('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        .swiper-container {
            width: 89%;
            /*height: 100%;*/
            position: static !important;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            word-wrap:break-word;
            overflow: hidden;

        }
        .swiper-button-next, .swiper-button-prev {
            position: absolute;
            top: 30%!important;
            width: 4%;
            height: 50%;
            /*margin-top: 0!important;*/
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00656D;
        }
        .swiper-button-next{
           margin-right: 156px;
        }
        .swiper-button-prev{
            margin-left: 156px;
        }
        /*.swiper-button-next:hover,.swiper-button-prev:hover{*/

        /*    background-color:  #F8A555;*/

        /*}*/
        .group{
            /*display: table-cell;*/
            height: 50%;
        }

        @media only screen and (max-width: 600px) {
            .swiper-button-next{
                margin-right: 0;
            }
            .swiper-button-prev{
                margin-left: 0;
            }
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

    <section class="categories pb-5">
        <div class="container ">
            <div class="group">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach($groups as $group)
                            <div class="swiper-slide">
{{--                                <div class="card">--}}
                                <div><h1>{{$group->name}}</h1></div>
                                <p>{!! $group->description !!}</p>
{{--                                </div>--}}
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>

</section>
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
