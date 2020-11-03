@extends ('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
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
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>ГИД</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <ul class="list-group bs-4">
                        @foreach($categories as $category)
                            <a href="{{route('guide', ['category_id' => $category->id])}}">
                                <li class="list-group-item cursor d-flex justify-content-between
                                    {{$currentCategory->id == $category->id ? 'bg-sj-gray' : ''}}"
                                    data-content="{{$i}} ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                                    <span>{{$category->name}}</span><b>></b>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 col-lg-9">
                    @if($currentCategory->contents->isEmpty())
                        Мәліметтер жоқ!
                    @else
                        @foreach($currentCategory->contents as $content)
                            <div class="card row flex-row mb-3 mt-3 mt-md-0">
                                <div class="col-md-5">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @if($content->images->isNotEmpty())
                                                @foreach($content->images as $image)
                                                    <div class="swiper-slide">
                                                        <div class="slider__image">
                                                            <img class="slider__images" src="{{asset($image->image_path)}}" alt="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="swiper-scrollbar"></div>
                                    </div>
                                </div>
                                <div class="col-md-7 guide__content d-flex flex-column justify-content-between">
                                    <h1 class="pt-3">{{$content->title}}</h1>
                                    <div>
                                        <div class="d-flex">
                                            <i class="fa fa-map-marker-alt pr-2"></i>
                                            <p>{!! $content->street !!}</p>
                                        </div>
                                        <div class="d-flex">
                                            <i class="fa fa-clock pr-2"></i>
                                            <p>{!! $content->time !!}</p>
                                        </div>
                                        <div class="d-flex">
                                            <i class="fas fa-mobile-alt pr-2"></i>
                                            <p>{!! $content->phone !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: true,
            },
        });

        function changeContent(el) {
            const newVal = el.dataset.value;
            el.dataset.value = el.innerText;
            el.innerText = newVal;
        }
    </script>
@endsection
