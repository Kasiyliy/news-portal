@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Бизнес</h1>
            </div>
            <h5>
                Тақырыбы
            </h5>

            <select class="form-control w-50">
                <option>
                    Ауыл шаруашылығы
                </option>
            </select>
        </div>
    </section>
    <section class="min__content my-5">
        <div class="container">
            <h3 class="my-5">
                Ауыл шаруашылығы
            </h3>
            <div class="row">

                @for($i = 0; $i < 10; $i++)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 p-4">
                        <img class="business__card" src="{{asset('modules/front/assets/img/news-image.png')}}" alt="">
                        <p>
                            {{strlen('Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?') > 300 ?
                              mb_substr('Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?',0,300)."..."
                                      : 'Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?'}}

                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
