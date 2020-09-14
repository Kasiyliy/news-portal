@extends('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жоба туралы</h1>
            </div>
        </div>
    </section>
    <section class="resource">
        <div class="container">
            <div class="resource__inner">
                <img src="{{asset('modules/front/assets/img/resource-img.png')}}" alt="resource">
                <h4>Негізгі ақпарат</h4>
                <p>Проект включает в себя четыре компонента:
                    <br>
                    - предоставление грантов до 1 000 000 тенге и социальных стипендий группам молодежи на реализацию социальных проектов;
                    <br>
                    - обучение молодых людей по развитию жизненно важных навыков и управлению проектами;
                    <br>
                    - работа с уязвимыми группами молодежи;
                    <br>
                    - реализация эффективной информационно-разъяснительной кампании и механизма обратной связи и разрешения проблем.
                    <br>
                    Участники Проекта проходят трёхэтапное обучение программе жизненно важных навыков и управления проектами, реализуют свои социальные проекты в течение пяти месяцев, а также получают ежемесячную стипендию 60 000 тенге – выпускники вузов, 40 000 тенге – все остальные участники. Кроме этого, все участники получают поддержку менторов в период реализации своих проектов.
                    <br>
                    В рамках реализации Проекта проводится конкурс по отбору менторов и грантовый конкурс для молодёжи.
                </p>
            </div>
        </div>
    </section>
@endsection
