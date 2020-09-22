@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жоба туралы</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="about__inner my-5">
                <div class="row mb-5">
                    <div class="about__main-img  col-md-12 col-lg-10">
                        <img id="expandedImg" src="{{asset($about_project->images[0]->image_path)}}">
                    </div>
                    <div class="about__tab-img col-md-12 col-lg-2">
                        <div class="swiper-container">
                            <div class="swiper-wrapper about__tab-img">
                                @foreach($about_project->images as $image )
                                    <div class="about__gallery swiper-slide">
                                        <img src="{{asset($image->image_path)}}" onclick="myFunction(this);"
                                             alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="mb-4">Негізгі ақпарат</h4>
                <h5>
                    {!! $about_project->main_description !!}
                </h5>
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
