@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жаңалықтар</h1>
                <a href="{{route('news')}}">← Жаңалықтар айдарына өту </a>
                <div class="news__detail__inner-header">
                    <h2>Ашықтық және есептілік. Nur Otan праймеризінде кім байқаушы болады?</h2>
                    <div class="d-flex">
                        <div class=" d-flex news__bottom__date">
                            <img src="{{asset('modules/front/assets/img/eye_green-icon.png')}}" alt="eye">
                            <p>115</p>
                        </div>
                        <div class=" d-flex news__bottom__date">
                            <img src="{{asset('modules/front/assets/img/calendar_green-icon.png')}}" alt="calendar">
                            <p>25.08.2020</p>
                        </div>
                    </div>
                </div>
                <div class="news__detail__inner-content my-5">
                    <img src="{{asset('modules/front/assets/img/news_detail-img.png')}}" alt="newsdetail">
                    <h4>1. ЖАЛПЫ ЕРЕЖЕЛЕР</h4>
                    <p>1. Осы Талаптар азаматтардың өмірі мен денсаулығын қорғау, праймеризге қатысушылардың
                        санитариялық-эпидемиологиялық саламаттылығын қамтамасыз ету мақсатында әзірленді.
                    </p>
                    <p>
                        2. Праймериздің барлық кезеңдерінде қатысушылар медициналық немесе матадан жасалған
                        бетперделерін (бұдан әрі - бетперделер), қолғаптарды, зарарсыздандыру құралдарын пайдалануға,
                        кем дегенде 2 метр әлеуметтік арақашықтықты сақтауға, қол алысуды және тікелей байланыстың басқа
                        да нысандарын болдырмауға міндетті.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
