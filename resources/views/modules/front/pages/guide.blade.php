@extends ('modules.front.layouts.app-main')

@section('content')
    <section class="news__detail">
        <div class="container">
            <div class="news__detail__inner">
                <h1>ГИД</h1>
                <a href="{{route('welcome')}}">← Қайта оралу </a>

            </div>
        </div>
    </section>

    <section class="min__content">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <ul class="list-group bs-4">
                        @foreach($categories as $category)
                            <a href="{{route('guide', ['category_id' => $category->id])}}">
                                <li class="list-group-item cursor d-flex justify-content-between
                                    {{$currentCategory->id == $category->id ? 'bg-sj-gray' : ''}}"
                                    data-content="{{$i}} ВСТАВИШЬ ОПИСАНИЕ СЮДА">
                                    <span>{{$category->name}}</span><b>></b>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="accordion card p-3" id="accordionExample">
                        <ul>
                            @foreach($currentCategory->contents as $content)
                                <li>
                                    <h2 class="mb-0 d-flex justify-content-between">
                                <span style="font-size: 20px">
                                    {{$content->title}}
                                </span>
                                        <span data-toggle="collapse"
                                              style="font-size: 25px"
                                              class="cursor"
                                              data-value="X"
                                              onclick="changeContent(this)"
                                              data-target="#collapse{{$content->id}}" aria-expanded="true"
                                              aria-controls="collapse{{$content->id}}">
                                        +
                                    </span>
                                    </h2>

                                    <div id="collapse{{$content->id}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div>
                                            {!! $content->description !!}
                                        </div>
{{--                                        <h7>{{$content->updated_at}} жанартылды</h7>--}}
                                    </div>
                                    <hr>
                                </li>
                            @endforeach
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
