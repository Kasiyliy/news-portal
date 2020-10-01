@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Жастар ұйымдары</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <ul class="list-group bs-4" id="groups">
                        @foreach($groups as $group)
                            <li onclick="chooseContent(this, {{$group}})" class="list-group-item cursor d-flex justify-content-between">
                                <span>{{$group->name}}</span><b>></b>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-9">
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
        start();
        function chooseContent(el, group) {
            if (currentChosenEl) {
                currentChosenEl.classList.remove('bg-sj-gray');
            }
            currentChosenEl = el;
            content.innerHTML = group.description;
            currentChosenEl.classList.add('bg-sj-gray');
        }

        function start() {
            currentChosenEl = document.getElementById('groups').children[0];
            if(currentChosenEl) {
                currentChosenEl.classList.add('bg-sj-gray');
            }
            content.innerHTML = `{!! $groups->first() ? $groups->first()->description : 'Ұйымдар жоқ!' !!}`;
        }

    </script>
@endsection
