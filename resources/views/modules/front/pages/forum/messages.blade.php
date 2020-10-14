@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .categories {
            background-color: #f2f3f5;
        }

        .btn__answer {
            background-color: #F8A555;
            color: #FFFFFF !important;
        }

        .news__detail {
            background-color: #f2f3f5;
        }

        .card {
            border: none;
        }

        .card-body {
            border-bottom: 1px solid #f2f3f5;
        }

        .user__img {
            width: 90px;
            height: 90px;
        }

        .user__img img {
            width: 100%;
            border-radius: 50%;
            height: 100%;
            object-fit: cover;
        }

        .user__info {
            text-align: center;
            width: 100%;
        }

        .topic__title p {
            font-size: 13px;
            color: #718096;
        }

        .answer__date {
            font-size: 13px;
            color: #718096;
            margin: 0;
            align-self: flex-end;
        }

        .btn-label {
            padding: 4px;
            font-size: 12px;
        }

        .answer__button {
            align-self: flex-end;
        }

        .answer__button button {
            background-color: #00656D;
            color: #FFFFFF !important;
        }

        .answer__rate i {
            font-size: 18px;
            color: #718096;
            transition: 0.3s;
        }

        .answer__rate span {
            color: #718096;
        }


        .like:hover {
            color: #00656D;
            transition: 0.3s;
            cursor: pointer;
        }

        .dislike:hover {
            color: #00656D;
            transition: 0.3s;
            cursor: pointer;
        }

        .row {
            margin: 0;
        }

        .see-more {
            color: #00656D;
            text-decoration: none;
            cursor:pointer;
        }
        .see-more:hover{
            color: #00656D;
        }

        .tox.tox-tinymce {
            height: 300px !important;
        }

        @media (max-width: 767px) {
            .user__img{
                width: 30px;
                height: 30px;
            }
            .user__info h5{
                font-size: 16px;
            }
        }

    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>{{$topic->category->name}}</h1>
                <div class="mt-3 pb-3 d-flex justify-content-between">
                    <a href="{{route('forum.category.detail', $topic->forum_category_id)}}">← Қайта оралу </a>
                    <a href="{{Auth::guest() ? route('login') : '#answer'}}" class="btn btn-sm btn__answer">Жауап
                        беру</a>
                </div>

            </div>
        </div>
    </section>
    <section class="categories pb-5">
        <div class="container">
            <div class="card w-100 mb-5">
                <div class="card-body row">
                    <div class="col-sm-12 col-md-2 row flex-column align-items-center">
                        <div class="user__img mb-3">
                            <img
                                src="{{asset($topic->author->avatar_path ? $topic->author->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                alt="">
                        </div>
                        <div class="user__info">
                            <h5>{{$topic->author->name}}</h5>
                        </div>
                    </div>
                    <div class="col-sm-12  col-md-10 d-flex flex-column justify-content-between ">
                        <div class="topic__title">
                            <p>Опубликовано {{date('d-m-Y H:i', strtotime($topic->created_at))}}</p>
                            <h4>{{$topic->title}}</h4>
                        </div>
                        <div class="topic__label">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-label disabled">
                                {{$topic->category->name}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($topic->messages) == 0)
                <div class="card w-100 mt-2 pt-3 pb-3">
                    <div class="d-flex align-self-center">
                        <p class="m-0 p-0">Бұл сұраққа жауап жоқ. Бірінші болып жауап беріңіз!</p>
                    </div>
                </div>
            @endif
            <div id="boxes">
                @foreach($messages as $message)
                    <div class="card w-100 mt-2">
                        <div class="card-body row">
                            <div class="col-sm-12 col-md-2 row flex-column align-items-center">
                                <div class="user__img mb-3">
                                    <img
                                        src="{{asset($message->author->avatar_path ? $message->author->avatar_path : 'modules/front/assets/img/defaultuser.png')}}"
                                        alt="">
                                </div>
                                <div class="user__info">
                                    <h5>{{$message->author->name}}</h5>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 d-flex flex-column justify-content-between ">
                                <div class="answer__title">
                                    {!! $message->text !!}
                                </div>
                                <div class="topic__label d-flex justify-content-between">
                                    <p class="answer__date">
                                        Опубликовано {{date('d-m-Y H:i', strtotime($message->created_at))}}</p>
                                    <div class="answer__rate d-flex">
                                        <div class="answer__like">
                                            @if ($message->messageLike(Auth::id()) && $message->messageLike(Auth::id())->liked == 1)
                                                <i class="like fa fa-thumbs-up {{$message->id}}" id="likeDislike"
                                                   data-post="{{$message->likes}}" style="color: #00656D;"></i>
                                            @else
                                                <i class="like fa fa-thumbs-up {{$message->id}}" id="likeDislike"
                                                   data-post="{{$message->likes}}"></i>
                                            @endif
                                            <span id="like{{$message->id}}">{{count($message->likes)}}</span>
                                        </div>
                                        <div class="answer__dislike ml-3">
                                            @if ($message->messageLike(Auth::id()) && $message->messageLike(Auth::id())->liked == 0)
                                                <i class="dislike fa fa-thumbs-down {{$message->id}}" id="likeDislike"
                                                   style="color: #00656D;"></i>
                                            @else
                                                <i class="dislike fa fa-thumbs-down {{$message->id}}"
                                                   id="likeDislike"></i>
                                            @endif
                                            <span id="dislike{{$message->id}}">{{count($message->dislikes)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="see-more" data-div="#boxes" data-page="2" data-link="?page=">Көбірек жүктеу</a>
            <div class="card w-100 mt-5" id="answer">
                <div class="card-body row">
                    <form action="{{route('forum.category.messages.post', request()->route('id'))}}" method="post"
                          enctype="multipart/form-data" class="needs-validation w-100 d-flex flex-column p-4"
                          novalidate>
                        {{csrf_field()}}
                        <textarea id="mytextarea" placeholder="Жауап жазу" name="text" class="form-control"
                                  required></textarea>
                        <div class="invalid-tooltip">
                            Тақырыпты толтырыңыз
                        </div>
                        <div class="answer__button">
                            <button type="submit" class="btn mt-3 pr-5 pl-5" onclick="sendMessage()">Жауапты жіберу
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <script>
        $(function () {
            var $posts = $("#boxes");
            var $ul = $("ul.pagination");
            $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...

            $pages = {{$messages->lastPage()}}
            $(".see-more").click(function () {
                if ($pages >= $(this).data('page')) {
                    $div = $($(this).data('div')); //div to append

                    $link = $(this).data('link'); //current URL

                    $page = $(this).data('page'); //get the next page #
                    $href = $link + $page; //complete URL
                    $.get($href, function (response) { //append data
                        $html = $(response).find("#boxes").html();
                        $div.append($html);
                    });
                    $(this).data('page', (parseInt($page) + 1)); //update page #
                }
                else{
                    $(this).remove()
                }
            });

        });
    </script>

    <script>
        $(document).on('click', '#likeDislike', function () {


            // console.log($(this)[0].classList[3] );
            var message_id = $(this)[0].classList[3];
            var liked = 0;
            if ($(this)[0].classList[0] == "like") {
                // console.log($(this)[0].classList[0]);
                liked = 1;
            }

            $(function () {
                $.ajax({
                    method: "get",
                    url: "{{route('forum.category.message.like')}}",
                    data: {
                        liked: liked,
                        message_id: message_id

                    },
                    success: function (response) {
                        // console.log((response[0].likes).length);
                        // console.log((response[0].dislikes).length);
                        $("#like" + message_id).text((response[0].likes).length);
                        $("#dislike" + message_id).text((response[0].dislikes).length);

                        var dislike = document.getElementsByClassName("dislike fa fa-thumbs-down " + message_id);
                        var like = document.getElementsByClassName("like like fa fa-thumbs-up " + message_id);
                        if (liked == 1) {
                            like[0].style.color = "#00656D";
                            dislike[0].style.color = "#718096";
                        } else {
                            like[0].style.color = "#718096";
                            dislike[0].style.color = "#00656D";
                        }


                    }
                });
            });

        });
    </script>
@endsection
