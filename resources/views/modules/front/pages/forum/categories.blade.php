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

        .card-header{
            background-color: #00656D;
            color:#FFFFFF;
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

        .card-subtitle {
            margin-top: 7px;
            padding-left: 25px;
            position: relative;
        }

        .subtitle__img {
            position: absolute;
            left: 17px;
            top: 7px;
        }

        .messages__count {
            margin: 0;
            color: #353C41;
        }

        .category__subtitle {
            padding-left: 10px;
        }

        .subtitle__nav {
            color: #00656D;
        }

        .subtitle__nav:hover {
            color: #2981bf;
            text-decoration: none;
        }

        .fa.fa-circle {
            color: #F8A555;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Форум</h1>
                <div class="mt-3 pb-3">
                    <a href="{{route('forum.forum-questionnaire')}}">← Қайта оралу </a>
                </div>
            </div>
        </div>
    </section>
    <section class="categories pb-5">
        <div class="container">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="pl-2 m-0">Категориялар</h4>
                </div>
                @foreach($categories as $category)
                    <div class="card-body row">
                        <div class="col-6">
                            <a href="{{route('forum.category.list', $category->id)}}" class="card-title">{{$category->name}}</a>
                            <div class="card-subtitle row">
                                <img class="subtitle__img" src="{{asset('modules/front/assets/img/subtitle.png')}}"
                                     alt="subtitle">
                                @foreach($category->childCategories as $subcategory)
                                    <div class="category__subtitle">
                                        <i class="fa fa-circle"></i>
                                        <a class="subtitle__nav" href={{route('forum.category.detail', $subcategory->id)}} >{{$subcategory->name}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-6 row">
                            <div class="col-4 text-right ">
                                <h5 class="messages__count font-weight-bold">{{$category->categoryMessages($category->id)}}</h5>
                                <p class="text-muted"> сообщений</p>
                            </div>
                            <div class="col-8">
                                <div class="col-8">
                                    <h5 class="text-truncate">{{$category->categoryLastMessage($category->id)->username}}</h5>
                                    <p class="text-truncate">{{$category->categoryLastMessage($category->id)->email}}</p>
                                    <p class="text-truncate">{!! $category->categoryLastMessage($category->id)->text !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
