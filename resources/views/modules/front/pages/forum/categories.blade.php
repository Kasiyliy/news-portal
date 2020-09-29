@extends ('modules.front.layouts.app-main')

@section('styles')
<style>
    .forum-btn{
        position: relative;
    }
    .forum-btn a{
        background: #00656D;
    }
    .button__messages{
        position: absolute;
        color: #ffffff;
        top: 7px;
        right: 15px;
    }
    .forum__title h5{
        font-size: 36px;
        color: #00656D;
    }
    .forum__content a{
        font-size: 20px;
        line-height: 26px;
        color: #00656D;
    }
    .forum__message i, p{
        color: #00656D;
    }
</style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Форум</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('forum.forum-questionnaire')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="forum">
        <div class="container justify-content-center my-4">
            <p class="forum-btn">
                <a class="btn btn-info btn-block text-left" type="button" data-toggle="collapse"
                   data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Ауыл шаруашылығы бойынша форум
                </a>
                <span class="button__messages">500 сообщении</span>
            </p>
            <div class="collapse mb-2" id="collapseExample">
                <div class="card card-body flex-row ">
                    <div class="col forum__title">
                        <h5>Мал шаруашылығы</h5>
                    </div>
                    <div class="col forum__content">
                        <li><a href="#">Ірі қара мал</a></li>
                        <li><a href="#">Төрт түлік мал</a></li>
                        <li><a href="#">Уақ малдар</a></li>
                    </div>
                    <div class="forum__message text-center">
                        <i class="fa fa-comments fa-3x"></i>
                        <p>300 сообщении</p>
                    </div>
                </div>
            </div>
            <div class="collapse mb-2" id="collapseExample">
                <div class="card card-body flex-row ">
                    <div class="col forum__title">
                        <h5>Егін шаруашылығы</h5>
                    </div>
                    <div class="col forum__content">
                        <li><a href="#">Дәнді дақылдар</a></li>
                        <li><a href="#">Қантты дақылдар</a></li>
                        <li><a href="#">Күздік дақылдар</a></li>
                    </div>
                    <div class="forum__message text-center">
                        <i class="fa fa-comments fa-3x"></i>
                        <p>200 сообщении</p>
                    </div>
                </div>
            </div>
            <div class="collapse mb-2" id="collapseExample">
                <div class="card card-body flex-row ">
                    <div class="col forum__title">
                        <h5>Ветеринария </h5>
                    </div>
                    <div class="col forum__content">
                        <li><a href="#">Үй жануарлары</a></li>
                        <li><a href="#">Төрт түлік мал</a></li>
                        <li><a href="#">Мал аурулары</a></li>
                    </div>
                    <div class="forum__message text-center">
                        <i class="fa fa-comments fa-3x"></i>
                        <p>100 сообщении</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
