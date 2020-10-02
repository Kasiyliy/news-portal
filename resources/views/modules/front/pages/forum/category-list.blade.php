@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .categories {
            background-color: #f2f3f5;
        }

        .news__detail {
            background-color: #f2f3f5;
        }

        .card {
            border: none;
        }

        .card-header {
            background-color: #00656D;
            color: #FFFFFF;
        }

        .card-body {
            border-bottom: 1px solid #f2f3f5;
        }

        .card-title {
            color: #0e0e12;
            font-size: 20px;
            font-weight: bold;
        }

        .card-title:hover {
            color: #2981bf;
            text-decoration: none;
        }

        .messages__count {
            margin: 0;
            color: #353C41;
        }

        .fa.fa-caret-right {
            color: #F8A555;
            font-size: 22px;
        }

        .title__block {
            transition: 0.5s;
        }

        .title__block:hover {
            padding-left: 22px;
            transition: 0.5s;
        }

    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>{{$category_title->name}}</h1>
                <div class="mt-3 pb-3">
                    <a href="{{route('forum.categories')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>
    <section class="categories pb-5">
        <div class="container">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="pl-2 m-0">Тақырыптар</h4>
                </div>
                {{--                {{dd($messageQuery)}}--}}
                @foreach($subcategories as $subcategory)
                    {{--                    {{dd($subcategory)}}--}}
                    <div class="card-body row">
                        <div class="col-6 align-self-center title__block">
                            <i class="fa fa-caret-right pr-2"></i>
                            <a href="{{route('forum.category.detail', $subcategory->id)}}"
                               class="card-title">{{$subcategory->name}}</a>
                        </div>
                        <div class="col-6 row">
                            <div class="col-4 text-right ">
                                <h5 class="messages__count font-weight-bold">
                                    {{$subcategory->childCategoryMessages($subcategory->id)}}
                                </h5>
                                <p class="text-muted m-0"> сообщений</p>
                            </div>
                            <div class="col-8">
                                        <h5 class="text-truncate">{{$subcategory->childCategoryLastMessage($subcategory->id)->username}}</h5>
                                        <p class="text-truncate">{{$subcategory->childCategoryLastMessage($subcategory->id)->email}}</p>
                                <p class="text-truncate">{!! $subcategory->childCategoryLastMessage($subcategory->id)->text !!}</p>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
