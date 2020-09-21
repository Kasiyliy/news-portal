@extends ('modules.front.layouts.app-main')
@section('styles')
    <style>

        h3 {
            text-align: center;
        }
        .business_content{

        }
        .business_content p {

            color: #72828c;
            margin: 0;
            font-family: Roboto, serif;
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 1.0em;
            height: 3.2em;
            display: inline-block;
            word-wrap: break-word;
            overflow: hidden;


        }

        .business_content h1 {
            font-weight: 500;
            font-size: 16px;
            line-height: 18px;
            color: #050606;
            margin: 0;

        }


        .news_pagination{
            padding-top: 50px;
        }
        .news_pagination nav{
            display:flex;

        }
        .news_pagination ul{

            margin:auto;

        }

        .news_pagination .page-link{
            border:none;
            color: #00656D;

        }
        .news_pagination .page-item{
            margin-right: 10px;
            border: none;
        }
        .news_pagination .page-item.active .page-link{
            border: none;
            background-color:#F8A555 ;
            color:#00656D;
        }
        .news_pagination .page-item:last-child .page-link{
            border: 1px solid #00656D;
            box-sizing: border-box;
            color:#00656D;
            border-radius: 0;
        }
        .news_pagination .page-item:first-child .page-link{
            border: 1px solid #00656D;
            box-sizing: border-box;
            color:#00656D;
            border-radius: 0;
        }
        .news_pagination .page-item .page-link{
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 19px;
            padding: 6px 12px 6px 12px;
        }
    </style>
@endsection
@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Бизнес</h1>
            </div>
            <h5>
                Тақырыбы
            </h5>
            <select class="form-control w-50" onchange="location = this.value;">
                @foreach($categories as $category)
                <option value="{{route('business', [$parent_category->id,'category_id' => $category->id])}}" {{$currentCategory->id == $category->id ? 'selected' : ''}}>
                    {{$category->name}}
                </option>


                    @endforeach
            </select>
        </div>
    </section>
    <section class="min__content my-5">
        <div class="container">
            <h3 class="my-5" >
                {{$currentCategory->name}}
            </h3>
            <div class="row">

                @foreach($contents as $content)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 p-4">
                        <a  href="{{route('business.detail', $content->id)}}">
                        <img class="business__card" src="{{asset($content->image_path)}}" alt="">
                        <div class="business_content">
                            <h1 class="mt-2">{{$content->title}}</h1>
                            <p class="mt-2" >{{strip_tags($content->description)}}</p>

                        </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="news_pagination">
                {{ $contents->appends(request()->input())->links() }}


            </div>
        </div>
    </section>
@endsection
