@extends ('modules.front.layouts.app-main')

@section('styles')
    <style>
        .bg-whitey {
            background: #F8F9F8;
            color: black;
        }

        .bg-whitey:hover {
            color: white;
            background: #00656D;
            -webkit-transition: background 0.5s;
            -moz-transition: background 0.5s;
            -ms-transition: background 0.5s;
            -o-transition: background 0.5s;
            transition: background 0.5s;
        }

        .bg-whitey:active {
            color: #F8A555;
            background: #00656D;
            -webkit-transition: background 0.5s;
            -moz-transition: background 0.5s;
            -ms-transition: background 0.5s;
            -o-transition: background 0.5s;
            transition: background 0.5s;
        }

    </style>
@endsection

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>Мемлекеттік бағдарламалар</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="w-100 text-right mb-1">
                        Барлық Мемлекеттік бағдарламалар саны - {{count($programs)}}
                    </div>
                    <div class="accordion" id="accordionExample">
                        @foreach($programs as $program)
                            <div class="card mb-4 border-bottom">
                                <div class="card-header p-0" id="headingThree">
                                    <div class="row">
                                        <div class="col-8 cursor bg-whitey p-4 w-100 pointer-event"
                                             data-toggle="collapse"
                                             data-target="#collapse{{$program->id}}" aria-expanded="false"
                                             data-value="{{$program->description}}"
                                             onclick="changeContent({{$program->id}}, this)"
                                             aria-controls="collapseThree">
                                            <span>
                                                {{$program->name}}
                                            </span>
                                        </div>
                                        <div class="col-2 cursor bg-whitey d-flex align-items-center justify-content-center"
                                             data-toggle="collapse"
                                             data-target="#collapse{{$program->id}}" aria-expanded="false"
                                             data-value="{{$program->digital_help ?? 'Кешіріңіз, бұл бөлім әзірге дайын емес.'}}"
                                             onclick="changeContent({{$program->id}}, this)"
                                             aria-controls="collapseThree">
                                            <span class="fa fa-desktop fa-3x"></span>
                                        </div>
                                        <div class="col-2 cursor bg-whitey d-flex align-items-center justify-content-center"
                                             data-toggle="collapse"
                                             data-target="#collapse{{$program->id}}" aria-expanded="false"
                                             data-value="{{$program->traditional_help ?? 'Кешіріңіз, бұл бөлім әзірге дайын емес.'}}"
                                             onclick="changeContent({{$program->id}}, this)"
                                             aria-controls="collapseThree">
                                            <span class="fa fa-university fa-3x"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse{{$program->id}}" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p id="collapseInfo{{$program->id}}">

                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function changeContent(id, el) {
            document.getElementById(`collapseInfo${id}`).innerHTML = el.dataset.value;
        }
    </script>
@endsection
