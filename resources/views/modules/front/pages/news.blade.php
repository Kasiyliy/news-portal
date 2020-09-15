@extends('modules.front.layouts.app-main')
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style>
    .swiper-container {
        width: 100%;
        height: 600px;
    }

    .swiper-slide {
        width: 100%;
    }

    .swiper-pagination-bullet {
        width: 20px;
        height: 20px;
        background: #FFFFFF;
    }

    .news_block_slide{
        width: 100%;
        height: 440px;

    }

    .news_block_slide p{
        font-weight: 500;
        font-size: 18px;
        line-height: 18px;
        color: #FFFFFF;
        margin: 0;
    }

    .news_more_info{
        width: 422px;
        height: 53px;
        background: #00656D;
        border-radius: 5px;
    }
    .news_more_info>h1{


        width: 200px;
        left: 30px;


        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        /* or 114% */

        text-transform: uppercase;

        color: #FFFFFF;
    }


    .news_block_slide>img {
        width: 100%;
        height: 100%;
    }

    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        margin-right: 200px;
        border-radius: 4px;
    }

    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: #00656D;
        background-color: #fff;
        border: 1px solid #ddd;
    }


</style>

@endsection
@section('content')
    <section class="news__block">
        <div class="container">
            <div class="news__block__inner">
                <h1>Жаңалықтар</h1>
                <div class="row news__block__content">
                    <div class="col-12 col-lg-5 col-md-12 mt-4 news__block__slider">
                        <h2>Соңғы жаңалықтар</h2>
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($last_news as $l_n)
                                <div class="swiper-slide">
                                    <div class="news_block_slide">
                                        <img src="{{asset($l_n->image_path)}}" alt="operator">
                                        <a class="news__block__image_content2" href="{{route('news.detail', $l_n->id)}}">
                                            <p>{{$l_n->title}}</p>
                                            <div class="d-flex">

                                                <div class="d-flex news__block__date2">
                                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                                    <p>{{$l_n->viewed_count}}</p>
                                                </div>
                                                <div class="d-flex news__block__date2">
                                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}"
                                                         alt="calendar">
                                                    <p>{{$l_n->created_at->format('Y-m-d')}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href={{route('news.detail', $l_n->id)}}>
                                    <div class="news_more_info">
                                    <h1>Толығырақ оқу          ➞ </h1>

                                    </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-4 mt-4 mx-auto news__block__image">
                        @foreach($most_viewed as $m_v)
                            <div class="news__block__image_inner">
                                <img src="{{asset($m_v->image_path)}}" alt="operator" width="232.5" height="232.5">
                                <a class="news__block__image_content" href="{{route('news.detail', $m_v->id)}}">
                                    <p>{{$m_v->title}}</p>
                                    <div class="d-flex">
                                        <div class="d-flex news__block__date">
                                            <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                            <p>{{$m_v->viewed_count}}</p>
                                        </div>
                                        <div class="d-flex news__block__date">
                                            <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}"
                                                 alt="calendar">
                                            <p>{{$m_v->created_at->format('Y-m-d')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 col-lg-4 col-md-12 mt-4 news__block__collection">
                        @foreach($news as $n)
                        <div class="d-block">
                            <a href="{{route('news.detail', $n->id)}}"><h3>{{$n->title}}</h3></a>
                            <div class="d-flex">
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/eye-icon.png')}}" alt="eye">
                                    <p>{{$n->viewed_count}}</p>
                                </div>
                                <div class="d-flex news__block__date">
                                    <img src="{{asset('modules/front/assets/img/calendar-icon.png')}}" alt="calendar">
                                    <p>{{$n->created_at->format('Y-m-d')}}</p>
                                </div>
                            </div>

                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news__bottom">
        <div class="container mt-5">
            <div class="row">
                @foreach($news as $n)
                    <div class="col-12 col-lg-4 col-md-6 mt-4">
                        <a href="{{route('news.detail', $n->id)}}">
                            <div class="news__bottom__inner-card">
                                <div class="news__bottom__image">
                                    <img src="{{asset($n->image_path)}}" alt="" >
                                </div>
                                <h5>

                                    {{strlen($n->title) > 111 ?
                                    mb_substr($n->title,0,111)."..."
                                            : $n->title}}

                                </h5>
                                <div class="d-flex">
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/eye_green-icon.png')}}" alt="eye">
                                        <p>{{$n->viewed_count}}</p>
                                    </div>
                                    <div class=" d-flex news__bottom__date">
                                        <img src="{{asset('modules/front/assets/img/calendar_green-icon.png')}}"
                                             alt="calendar">
                                        <p>{{$n->created_at->format('Y-m-d')}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
            <div class="pagination" >{{ $news->links() }}</div>



        </div>

    </section>
@endsection


@section('scripts')
    <script src="{{asset('modules/front/assets/js/swiper.min.js')}}"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,

            },
        });
    </script>

@endsection
