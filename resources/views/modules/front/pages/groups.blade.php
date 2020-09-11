@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жастар ұйымдары</h1>
            </div>
        </div>
    </section>

    <section class="groups__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-3">
                    <ul class="list-group bs-4">
                        @for($i = 0; $i < 4; $i++)
                            <li onclick="chooseContent(this)" class="list-group-item cursor d-flex justify-content-between bg-sj-gray"
                                data-content="{{$i}} ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                                <span>«Жас Отан» ЖҚ</span><b>></b>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="col-9">
                    <div class="card bs-4 d-flex p-3" id="list-group-content">
                        <span>
                            не выбрано
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        let currentChosenEl = null;
        const content = document.getElementById('list-group-content');

        function chooseContent(el) {
            if (currentChosenEl) {
                currentChosenEl.classList.add('bg-sj-gray');
            }
            currentChosenEl = el;
            content.innerHTML = currentChosenEl.dataset.content;
            currentChosenEl.classList.remove('bg-sj-gray');
        }
    </script>
@endsection