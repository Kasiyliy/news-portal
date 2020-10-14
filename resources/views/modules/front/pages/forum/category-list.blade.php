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

        .last__message > * {
            color: #718096;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 14px !important;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            margin-bottom: 5px !important;
        }

        .last__message-img {
            width: 50px;
            height: 50px;
        }

        .last__message-img img {
            width: 100%;
            border-radius: 50%;
            height: 100%;
            object-fit: cover;
        }

        .text-muted {
            color: #718096 !important;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .mobile__mode{
                display: none;
            }
        }
        /*@media (max-width: 767px) {*/
        /*    .last__message{*/
        /*        display: none;*/
        /*    }*/
        /*}*/

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
                @foreach($subcategories as $subcategory)
                    <div class="card-body row">
                        <div class="col-sm-12 col-md-6 align-self-center title__block">
                            <i class="fa fa-caret-right pr-2"></i>
                            <a href="{{route('forum.category.detail', $subcategory->id)}}"
                               class="card-title">{{$subcategory->name}}</a>
                        </div>
                        @if($subcategory->childCategoryLastMessage($subcategory->id))
                            <div class="mobile__mode col-6 row pr-0">
                                <div class="col-4 text-right pr-4">
                                    <h5 class="messages__count font-weight-bold mb-1">
                                        {{$subcategory->childCategoryMessages($subcategory->id)}}
                                    </h5>
                                    <p class="text-muted m-0"> хабарлама</p>
                                </div>
                                <div class=" col-8 row pr-0">
                                    <div class="col-12 row pr-0">
                                        <div class="last__message-img ">
                                            <img
                                                src="{{asset($subcategory->childCategoryLastMessage($subcategory->id)->avatar_path ? $subcategory->childCategoryLastMessage($subcategory->id)->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                                alt="default-user">
                                        </div>
                                        <div class="col-10 pr-0">
                                            <h5 class="text-truncate mb-0">{{$subcategory->childCategoryLastMessage($subcategory->id)->username}}</h5>
                                            <div class="last__message">
                                                <p>{!! $subcategory->childCategoryLastMessage($subcategory->id)->text !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="mobile__mode col-6 text-center">
                                <p class="text-muted mt-4">Бұл категорияда хабарламалар жоқ. Бірінші болыңыз!</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
