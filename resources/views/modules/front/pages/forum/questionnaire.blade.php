@extends ('modules.front.layouts.app-main')


@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Сауалнама</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container justify-content-center my-4">
            <div class="row col-md-12">
            </div>
        </div>
    </section>
@endsection
