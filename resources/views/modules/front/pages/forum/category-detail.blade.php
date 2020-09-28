@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .card__info {
            margin: 1.25rem;
        }

        .card__image {
            width: 120px;
            height: 120px;
        }

        .card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card__content{
            height: 100%;
        }

        .btn__send{
            background-color: #00656D;
            color: #FFFFFF;
        }

        .card__messages i{
            color:#00656D;
            font-size: 50px;
        }
    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Форум</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('forum.categories')}}">← Қайта оралу </a>
                </div>
                <h2>Мал шаруашылығы, Ірі қара мал</h2>
                <p>автор: Жастар басқармасы, 15 қыркүйек 2020 Ауыл шаруашылығы</p>
            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container justify-content-center my-4">
            <div class="card w-100 flex-row">
                <div class="card__info text-center">
                    <p>Абеке Саке</p>
                    <div class="card__image">
                        <img src="{{asset('modules/front/assets/img/avatar.png')}}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row card__content">
                        <div class="col-10 d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">15.09.2020 жыл жарияланған</h6>
                                <h5 class="card-title">Асыл тұқымды жақсы жылқыларды қайдан сатып алуға болады? </h5>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" class="form-control form-control-sm"
                                           aria-describedby="inputGroup-sizing-sm" placeholder="Жауап жазу">
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-sm btn-block btn__send">Жіберу</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 card__messages text-center">
                            <i class="fa fa-comments"></i>
                            <p>24 жауап</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
