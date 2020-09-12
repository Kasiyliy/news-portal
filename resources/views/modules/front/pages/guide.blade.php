@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>ГИД</h1>
            </div>
        </div>
    </section>

    <section class="guide__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-3">
                    <ul class="list-group bs-4">
                        <li class="list-group-item cursor d-flex justify-content-between"
                            data-content="-1 ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                            <span>«Жас Отан» ЖҚ</span><b>></b>
                        </li>
                        @for($i = 0; $i < 4; $i++)
                            <li class="list-group-item cursor d-flex justify-content-between bg-sj-gray"
                                data-content="{{$i}} ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                                <span>«Жас Отан» ЖҚ</span><b>></b>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="col-9">
                    <div class="accordion card p-3" id="accordionExample">
                        <ul>
                            @for($i = 0; $i < 10; $i++)
                                <li>
                                    <h2 class="mb-0 d-flex justify-content-between">
                                <span style="font-size: 20px">
                                    Collapsible Group Item #1
                                </span>
                                        <span data-toggle="collapse"
                                              style="font-size: 25px"
                                              class="cursor"
                                              data-value="X"
                                              onclick="changeContent(this)"
                                              data-target="#collapse{{$i}}" aria-expanded="true"
                                              aria-controls="collapse{{$i}}">
                                        +
                                    </span>
                                    </h2>

                                    <div id="collapse{{$i}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div>
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                            tempor,
                                            sunt
                                            aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch
                                            et.
                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente
                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                                            beer
                                            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                                            of
                                            them
                                            accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                    <hr>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function changeContent(el) {
            const newVal = el.dataset.value;
            el.dataset.value = el.innerText;
            el.innerText = newVal;
        }
    </script>
@endsection